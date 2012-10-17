<?php 
//This gets today's date 
$date =time (); 
//This puts the day, month, and year in seperate variables 
$day = date('d', $date); 
$month = date('m', $date); 
$year = date('Y', $date);

//nav vars & logic
$base_link = get_permalink();
$month_offset = 0;

if(isset($_GET['month'])){
	$month_offset = $_GET['month'];
	$month += $_GET['month'];
}

$back_in_time = $month_offset - 1;
$back_to_the_future = $month_offset + 1;

if ($month > 12) {
	$year += floor($month / 12);
	$month = $month % 12;
} elseif ($month < 1) {
	$year += floor($month / 12);
	$month = 12 + ($month % 12);
}

 //Here we generate the first day of the month 
 $first_day = mktime(0,0,0,$month, 1, $year); 

 //This gets us the month name 
 $title = date('F', $first_day) . ' ' . $year; 
$loop_count = 0;

 $day_of_week = date('D', $first_day);
  switch($day_of_week){ 
	 case "Sun":
	 	$blank = 0;
	 	break; 
	 case "Mon":
	 	$blank = 1;
	 	break; 
	 case "Tue":
	 	$blank = 2;
	 	break;
	 case "Wed":
	 	$blank = 3;
	 	break; 
	 case "Thu":
	 	$blank = 4;
	 	break; 
	 case "Fri":
	 	$blank = 5;
	 	break; 
	 case "Sat":
	 	$blank = 6;
	 	break; 
 }
  $days_in_month = cal_days_in_month(0, $month, $year);

  //set up the loop
	
  	$query = array('t_event');
  	$meta_query = array(array('key' => '_time_stamp',
  		'value' => intval($first_day),
  		'compare' => '>='));
  	$args = array('post_type' => $query,
  		'posts_per_page' => 100,
  		'meta_key' => '_time_stamp',
  		'orderby' => 'meta_value_num',
  		'order' => 'ASC',
  		'meta_query' => $meta_query);
  	$events_loop = new WP_Query( $args );

  	//get things stated for the events loop
  	if($events_loop->have_posts()){
  		$events_loop->the_post();
  	}
  	
?>
<div id="calendar">
	<div class="title">
		
		<h2>
			<a class="nav" href="<?php echo $base_link . '?month=' . $back_in_time; ?>">&lt;</a>
			<?php echo "$title"; ?>
			<a class="nav" href="<?php echo $base_link . '?month=' . $back_to_the_future; ?>">&gt;</a>
		</h2>
		
	</div>
	<div class="week">
		<div class="header">Sunday</div>
		<div class="header">Monday</div>
		<div class="header">Tuesday</div>
		<div class="header">Wednesday</div>
		<div class="header">Thursday</div>
		<div class="header">Friday</div>
		<div class="header">Saturday</div>
	</div>
	<div class="week">
		<?php $day_count = 1; while ($blank > 0) { //loop thru thru blank days ?>
		 	<?php $day_classes = ($day_count == 7 || $day_count == 1)? ' weekend' : ''; ?>
			<div class="day blank <?php echo "$day_classes"; ?>"></div>
		<?php $blank--; $day_count++; } ?>
		
		<?php $day_num = 1; while ( $day_num <= $days_in_month ) { ?>
			
			<?php if($day_count == 1){ //start the .week div ?>
				<div class="week">
			<?php } ?>
			<?php 
				//set day classes
				$day_classes = ($day == $day_num && $month == date('m', $date))? ' today' : '';
				$day_classes .= ($day_count == 7 || $day_count == 1)? ' weekend' : '';
			 ?>
			<div class="day <?php echo "$day_classes"; ?>">
				<span class="day-num"><?php echo "$day_num"; ?></span>
				<?php if( $events_loop->have_posts() ) { ?>
					<?php while(event_is_today($month, $day_num, $year)){ ?>
						<a href="<?php the_permalink(); ?>" class="fancy-link"><?php the_title(); ?></a>
						<?php $events_loop->the_post(); ?>
					<?php } //end event_is_today() ?>
				<?php } //end if have_posts() ?>

			</div>

			<?php if($day_count == 7){ //end the .week div ?>
				</div>
			<?php } ?>

			<?php $day_num++; $day_count++; ?>
			
			<?php if($day_count > 7) { $day_count = 1; } //reset week counter ?>

		<?php } //end month loop ?>
		
		<?php while($day_count > 1 && $day_count <=7) { ?>
			<?php $day_classes .= ($day_count == 7 || $day_count == 1)? ' weekend' : ''; ?>
			<div class="day blank <?php echo "$day_classes"; ?>"></div>
		<?php $day_count++; } ?>
	</div>
</div>

<?php 
	function event_is_today($m, $d, $y)
	{
		//echo get_post_meta(get_the_id(), '_time_stamp', true) . ' :: ' .  strtotime($m . '/' . $d);
		if( intval(get_post_meta(get_the_id(), '_time_stamp', true)) == strtotime($m . '/' . $d . '/' . $y) ){
			return true;
		} else {
			//echo (get_post_meta(get_the_id(), '_event_full_date', true) . '::' . $m . '/' . $d . '/' . $y);
			return false;
		}
	}
?>

