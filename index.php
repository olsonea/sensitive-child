<?php get_header(); ?>    
    
<div class="container">
<div class="row-fluid">
<div class="span8">

<?php 
$last_date = time();
while(have_posts()): the_post(); ?> 
<div  <?php post_class('post box arc'); ?>>
<?php
  if ($last_date != strtotime( get_the_date('F j, Y') )) {
?>
    <div class="breadcrumb">Posted on <?php echo get_the_date(); ?></div>
<?php
  }
  $last_date = strtotime( get_the_date('F j, Y') );
?>
<h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>&nbsp;</h2>
<?php 
if (!is_tag()) {
$posttags = get_the_tags();
if ($posttags) {
the_tags(); } else { echo( '<strong>No Tags</strong>' ); } }?>
<?php sensitive_post_thumb('wpeden-responsive-blog-thumb'); ?>  
<div class="entry-content"><?php the_excerpt(); ?>
</div> 
</div> 
<?php endwhile; ?>               

<?php 
global $wp_query;
if (  $wp_query->max_num_pages > 1 ) : ?>
<div class="clear"></div>
                <div id="nav-below" class="navigation post box arc breadcrumb">
                    <div class="btn"><?php next_posts_link( '<span class="meta-nav">&#9668;</span> Older posts'  ); ?>&nbsp;</div>
                    <div class="btn next-link"><?php previous_posts_link(  'Newer posts <span class="meta-nav">&#9658;</span>'  ); ?>&nbsp;</div>  
                </div><!-- #nav-below -->
<?php endif; ?>

</div>
<div class="span4">
 
<?php dynamic_sidebar('Archive Page'); ?>
</div>
</div>
</div>
      
<?php get_footer(); ?>