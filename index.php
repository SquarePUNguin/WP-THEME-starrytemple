<html>
<!DOCTYPE html>

<head>
	<?php wp_head(); ?>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>

<body>
	<div>
		<?php get_header(); ?>
		<div class="main proportionized">
			<div></div>
			<div>
				<div class="navbar">
					<H1><?php echo get_bloginfo("name")?></H1>
					<?php wp_nav_menu([
						'theme_location' => 'Header',
						'container' => 'div',
						'menu_class' => 'navbar-menu',
						'menu_id' => '',
						'echo' => true,
						'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
					]); ?>
					<div class="subnavbar"></div>
				</div>
				
				<div>
					<?php the_content() ?>
				</div>
			</div>
			<div></div>

		</div>
		<?php get_footer(); ?>
		<?php wp_footer(); ?>
	</div>
</body>

</html>