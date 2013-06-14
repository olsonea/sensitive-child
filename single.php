<?php get_header(); ?>     
<div class="container">
<div class="row-fluid">
<div class="span8">
<div  id="post-<?php the_ID(); ?>" <?php post_class(); ?>> 
<?php 

while(have_posts()): the_post(); ?>
 
<div  <?php post_class('post'); ?>>
<div class="clear"></div>
<h1 class="entry-title"><?php the_title(); ?></h1>
<div class="entry-content">
<?php sensitive_post_thumb('wpeden-responsive-post-thumb'); ?>  
<?php the_content(); ?>
</div>
<?php wp_link_pages( ); ?>
</div>
<div class="well tags">
<?php the_tags('Tags: ',' , '); ?>
<div class="clear"></div>
</div>
<div class="well social-box">
<span class="txt">
 Social Share <i class="icon icon-chevron-right"></i>
 </span>
 <div class="pull-right">
 <a href="http://www.facebook.com/sharer/sharer.php?u=<?php the_permalink();?>" class="btn btn-info btn-mini"><i class="icon icon-share icon-white"></i> Share on Facebook</a>
 <a href="https://twitter.com/share?url=<?php the_permalink();?>" class="btn btn-info btn-mini"><i class="icon icon-share icon-white"></i> Tweet</a>
 </div>
</div>
 <div class="mx_comments"> 
<?php comments_template(); ?>
</div>
<?php endwhile; ?>
</div>
</div>
</div>
</div>

         

<?php get_footer(); ?>
