	</div><!-- #main -->

	<footer id="colophon" role="contentinfo">
				<div id="contact-footer">
					<span id="copyright">&copy; Copyright <?php echo date('Y'); ?> Translator, LLC</span>
					<div id="social">
						<a href="http://www.facebook.com/translatordigitalcafe" target="_blank" class="facebook"></a>
						<a href="https://twitter.com/translatorxd" target="_blank" class="twitter"></a>
						<p>
							Translator<br>
							415 E. Menomonee St. <br>
							Milwaukee, WI 53202 <br>
							<a href="mailto:experience@translatordigitalcafe.com">experience@translatordigitalcafe.com</a><br>
							414.810.1032 
						</p>
					</div>
				</div>
			<?php
				/* A sidebar in the footer? Yep. You can can customize
				 * your footer with three columns of widgets.
				 */
				if ( ! is_404() )
					get_sidebar( 'footer' );
			?>
			<div id="ajax-container"></div>
			<div id="SignupForm" style="width: 380px">
				<form action="http://translatordigitalcafe.us2.list-manage.com/subscribe/post?u=4f0df1102a56ea0f4cc811f93&amp;id=af6fec3b20" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank">
					<label for="mce-EMAIL">Stay informed of upcoming lab topics, events and other activities and projects. Don't worry, we promise not to bombard you with awesomeness.</label>
					<p>
						email<sup>*</sup><br>
						<input type="email" value="" name="EMAIL" class="email" id="mce-EMAIL" placeholder="email address" required>
					</p>
					
					<p>
						first name<br> 
						<input type="text" value="" name="FNAME" class="fname" id="mce-FNAME"  placeholder="first name">
					</p>
					
					<p>
						last name<br>
						<input type="text" value="" name="LNAME" class="lname" id="mce-LNAME" placeholder="last name">
					</p>
					
					<div class="hidden">
						<input type="checkbox" checked="checked" id="group_131072" name="group[12729][131072]" value="1">
					</div>

					<div class="clear">
						<input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button">
					</div>
				</form>
			</div>

	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>