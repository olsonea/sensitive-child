<?php 

if ( !defined('ABSPATH')) exit; 

 

get_header(); 

?>


<div class="container">
<?php if(is_front_page()): ?>
    <div class="row wpeden-bs-services">
      <?php 
	$args=array(
	  'orderby' => 'name',
	  'order' => 'ASC',
	  'child_of' => get_cat_ID('Field of Study'),
	  'hide_empty' => 0
	);
	foreach(get_categories($args) as $cat){ ?>
        <div class="span3">
        <div class="about well">
          <div class="entry-content">
	    <a href="<?php echo get_category_link( $cat->term_id ); ?>" class="btn <?php echo sensitive_get_theme_opts('button_style','btn-info'); ?> btn-block"><h2><?php echo $cat->name; ?></h2></a>
          </div>
        </div>  
        </div>
        <?php } ?>
       
        <!-- /.span4 -->
           
 
 
<div class="clear"></div>
<div>
</div>          

</div><!-- /.span4 -->
         
    </div>
<?php endif; ?> 
 
 

        
<?php get_footer(); ?>