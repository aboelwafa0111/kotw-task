<?php /*Template Name: All Writers */ ?>
<?php get_header(); ?>
<style type="text/css">
   .card-text span {
   font-weight: bold;
   }
   .title {
   margin-bottom: 30px;
   margin-top: 15px;
   border-bottom: 1px solid #e2dfdf;
   padding-bottom: 20px;
   }
   .writer-card {
          margin-bottom: 15px;
   }
</style>
<div class="container">
   <h2 class="title">All Writers</h2>
   <div class="row">
      <?php 
         global $post;
         
         $args = array(
         'post_type' => 'Writers',
         'post_status'=>'publish',
         'posts_per_page' => -1
         );
         
         $the_query = new WP_Query($args);
         ?>
      <?php if ( $the_query->have_posts() ) : 
         while ( $the_query->have_posts() ) : $the_query->the_post();
            // Post content goes here...
            $id = get_the_id();
            $featuredimg= wp_get_attachment_image_src( get_post_thumbnail_id($id), 'single-post-thumbnail' );
            $permalink=get_the_permalink($id);
            $title=get_the_title($id);
         $first_name = get_field('first_name');
         $last_name = get_field('last_name');
         $biography = get_field('biography');
         $facebook_url = get_field('facebook_url');
         $linkedin_url = get_field('linkedin_url');
         
         ?>
      <div class="col-md-4 writer-card">
         <div class="card">
            <img class="card-img-top" src="<?php echo $featuredimg[0]; ?>" alt="Card image" style="width:100%">
            <div class="card-body">
               <h4 class="card-title"><?php echo  $first_name ." ".$last_name ?></h4>
               <p class="card-text"><span>Biography : </span><?php echo $biography?></p>
               <p class="card-text"><span>facebook : </span><a href="<?php echo $facebook_url?>" target="_blank"><?php echo $facebook_url?></a></p>
               <p class="card-text"><span>linkedin : </span><a href="<?php echo $linkedin_url?>" target="_blank"><?php echo $linkedin_url?></a></p>
               <a href="<?php echo $permalink?>" class="btn btn-primary">See Profile</a>
            </div>
         </div>
      </div>
      <?php endwhile; endif; ?>
   </div>
</div>
<?php get_footer();  ?>