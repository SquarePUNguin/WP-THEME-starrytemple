<html>
<!DOCTYPE html>

<head>
	<?php wp_head(); ?>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>

<body>
	<div>
		<?php get_header("blog"); ?>
		<div class="main"><?php the_content()?></div>
		
		<?php get_footer("blog"); ?>
	</div>

	<?php wp_footer(); ?>
</body>
<style>
	body>div{
		display:grid;
		grid-template-columns: 1fr;
	}
	.main{
		margin:2vw;
	}
</style>
    
</html>