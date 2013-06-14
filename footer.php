<div class="footer">
<div class="container">
<div class="row">
<div class="header">
<?php  
  $args = array( 'post_type' => 'page',
		 'post_status' => 'publish'
	       );
  foreach( get_pages( $args ) as $page) {
    if ($page->post_title == 'Search')
      continue;
?>
    <div class="span4">
      <a href="<?php echo get_page_link( $page->ID );?>"><br /><?php echo $page->post_title;?></a></div>
<?php
  }
?>
</div>
<div class="clear"></div>
</div>
</div> 
<div class="content"><?php echo sensitive_get_theme_opts('footer_text','Copyright &copy; The Tasty, Tasty Bacon Team'); ?></div>
</div>
 
<!-- <?php wp_footer(); ?> -->
</div>
</body>
</html>