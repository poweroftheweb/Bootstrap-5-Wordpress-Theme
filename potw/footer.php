			

</div> <!-- /.main-container -->

		<footer id="footer">
			<div class="container">
				<div class="row">
					
						<div class="col-md-3">
							<?php
								dynamic_sidebar( 'first_widget_area' );

								if ( current_user_can( 'manage_options' ) ) :
							?>
								<span class="edit-link"><a href="<?php echo esc_url( admin_url( 'widgets.php' ) ); ?>" class="badge badge-secondary"><?php esc_html_e( 'Edit', 'potw' ); ?></a></span><!-- Show Edit Widget link -->
							<?php
								endif;
							?>
						</div>
						<div class="col-md-3">
							<?php
								dynamic_sidebar( 'second_widget_area' );

								if ( current_user_can( 'manage_options' ) ) :
							?>
								<span class="edit-link"><a href="<?php echo esc_url( admin_url( 'widgets.php' ) ); ?>" class="badge badge-secondary"><?php esc_html_e( 'Edit', 'potw' ); ?></a></span><!-- Show Edit Widget link -->
							<?php
								endif;
							?>
						</div>
						<div class="col-md-3">
							<?php
								dynamic_sidebar( 'third_widget_area' );

								if ( current_user_can( 'manage_options' ) ) :
							?>
								<span class="edit-link"><a href="<?php echo esc_url( admin_url( 'widgets.php' ) ); ?>" class="badge badge-secondary"><?php esc_html_e( 'Edit', 'potw' ); ?></a></span><!-- Show Edit Widget link -->
							<?php
								endif;
							?>
						</div>
						<div class="col-md-3">
							<?php
								dynamic_sidebar( 'fourth_widget_area' );

								if ( current_user_can( 'manage_options' ) ) :
							?>
								<span class="edit-link"><a href="<?php echo esc_url( admin_url( 'widgets.php' ) ); ?>" class="badge badge-secondary"><?php esc_html_e( 'Edit', 'potw' ); ?></a></span><!-- Show Edit Widget link -->
							<?php
								endif;
							?>
						</div>						
				
				</div><!-- /.row -->
			</div><!-- /.container -->
			<div class="container">
				<div class="row">
					<div class="col-md-10">
					<?php
						
							/*
								Loading WordPress Custom Menu (theme_location) ... remove <div> <ul> containers and show only <li> items!!!
								Menu name taken from functions.php!!! ... register_nav_menu( 'footer-menu', 'Footer Menu' );
								!!! IMPORTANT: After adding all pages to the menu, don't forget to assign this menu to the Footer menu of "Theme locations" /wp-admin/nav-menus.php (on left side) ... Otherwise the themes will not know, which menu to use!!!
							*/
						// wp_nav_menu(
						//		array(
						//			'theme_location'  => 'footer-menu',
						//			'container'       => 'nav',
						//			'container_class' => 'col-md-12',
						//			'fallback_cb'     => '',
						//			'items_wrap'      => '<ul class="menu nav ">%3$s</ul>',
						//			//'fallback_cb'    => 'WP_Bootstrap4_Navwalker_Footer::fallback',
						//			'walker'          => new WP_Bootstrap4_Navwalker_Footer(),
						//		)
						//	);
						

					?>
						<p><?php printf( esc_html__( '&copy; %1$s %2$s. All rights reserved.', 'potw' ), date_i18n( 'Y' ), get_bloginfo( 'name', 'display' ) ); ?></p>
					</div>
				</div>
			</div>
			<div class="return-top default"><i class="fa fa-arrow-up"></i></div> 
		</footer><!-- /#footer -->
	</div><!-- /#wrapper -->
	<?php
		wp_footer();
	?>
</body>
</html>
