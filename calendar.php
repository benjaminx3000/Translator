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
<div class="calendar">
	<div class="title">
		
		<div class="svg-container arrow">
			<a href="<?php echo $base_link . '?month=' . $back_in_time; ?>">
				<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
					 width="35px" height="35px" viewBox="0 0 35 35" enable-background="new 0 0 35 35" xml:space="preserve">
				<g>
					<polygon points="26.817,4.604 15.309,17.561 26.869,30.345 22.841,34.125 8.131,17.471 22.907,0.875 	"/>
				</g>
				</svg>
			</a>
		</div>
		
		<h2><?php echo "$title"; ?></h2>
		
		<div class="svg-container arrow">
			<a href="<?php echo $base_link . '?month=' . $back_to_the_future; ?>">
				<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
					 width="35px" height="35px" viewBox="0 0 35 35" enable-background="new 0 0 35 35" xml:space="preserve">
				<g>
					<polygon points="8.183,30.397 19.692,17.44 8.131,4.655 12.159,0.875 26.869,17.53 12.093,34.125 	"/>
				</g>
				</svg>
			</a>
		</div>

	</div><!-- end .title -->

<div id="ContentTop" class="interior-page">
	<div class="container">
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
					
					<?php 
					/**
					 * check if theer is an event today
					 * if not, display default open lab
					 */
					if( $day_count == 3 && !event_is_today($month, $day_num, $year) || $day_count == 5 && !event_is_today($month, $day_num, $year) ) { ?>
						<a href="<?php echo get_bloginfo('url'); ?>/open-lab" class="fancy-link"><strong>Open Lab:</strong><br>
							8:00 - 10:00am</a>
					<?php } ?>

					<?php if( $events_loop->have_posts() ) { ?>
						<?php while(event_is_today($month, $day_num, $year)){ ?>
							<a href="<?php the_permalink(); ?>" class="fancy-link">
								<?php
								$title = explode(':', get_the_title());
								if( count($title) > 1 ) {
									echo "<strong>$title[0]:</strong><br>";
									echo "$title[1]";
								} else {
									the_title();
								} ?>
								
							</a>
							<?php $events_loop->the_post(); ?>
						<?php } //end event_is_today() ?>
					<?php } //end if have_posts() ?>
	
				</div>
	
				<?php if($day_count == 7){ //end the .week div ?>
					</div> <!-- end .week -->
				<?php } ?>
	
				<?php $day_num++; $day_count++; ?>
				
				<?php if($day_count > 7) { $day_count = 1; } //reset week counter ?>
	
			<?php } //end month loop ?>
			
			<?php while($day_count > 1 && $day_count <=7) { ?>
				<?php $day_classes .= ($day_count == 7 || $day_count == 1)? ' weekend' : ''; ?>
				<div class="day blank <?php echo "$day_classes"; ?>"></div>
			<?php $day_count++; } ?>
		</div> <!-- end .week -->
	</div> <!-- end .container -->
</div> <!-- end #ContentTop -->
</div> <!-- end .calendar -->

<?php 
	/**
	 * look to see if the post has an event on the given day
	 * @param  int $m month
	 * @param  int $d day
	 * @param  int $y year
	 * @return boolean
	 */
	function event_is_today($m, $d, $y) {
		$event_time_stamp = intval(get_post_meta(get_the_id(), '_time_stamp', true));
		$day_start = strtotime($m . '/' . $d . '/' . $y);
		$day_end = strtotime($m . '/' . $d . '/' . $y . '+ 23 hours 59 minutes');

		if( $event_time_stamp >= $day_start && $event_time_stamp <= $day_end ){
			return true;
		} else {
			return false;
		}
	}
?>

