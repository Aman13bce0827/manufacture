<?php
if( has_nav_menu('manufactory_primary_nav') ) :
	wp_nav_menu( array(
		'theme_location' => 'manufactory_primary_nav',
		'container' => false,
		'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
		'depth' => 10,
		'menu_class' => 'nav navbar-nav menubar',
		'walker' => new  manufactory_nav_walker
	));
else :
	echo '<ul class="nav navbar-nav menubar">'
		.wp_list_pages(array(
		'echo'            => 0,
		'walker'          => new manufactory_wp_page_walker,
		'title_li'        => ''
	)).'</ul>';
endif;
?>