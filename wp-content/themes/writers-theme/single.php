<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package writers_theme
 */

get_header();
?>


<style type="text/css">
.single-writer-card img{
   width: 200px !important;
    margin: -100px auto;	
}
 
.single-writer-card {
    margin-top: 140px;
}

   .card-text span {
   font-weight: bold;
   }
   .title {
   margin-bottom: 30px;
   margin-top: 30px;
   border-bottom: 1px solid #e2dfdf;
   padding-bottom: 20px;
   }

   .card-text {
display: block;
float: left;
margin-right: 50px;
margin-top: 30px;
   }

   .card-text:first-child{
   	margin-top: 120px;
   	text-align: center;
   	float: initial;
   	margin-right: 0px;

   }
   .writer-card {
          margin-bottom: 15px;
   }
</style>

<?php 
   $id=get_the_id();
   $postId = get_the_id();
   $title=get_the_title($id);
   $mypostNews=get_post($id);
    $featurednewimg= wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); $permalink=get_the_permalink($ID);
         $first_name = get_field('first_name');
         $last_name = get_field('last_name');
         $biography = get_field('biography');
         $facebook_url = get_field('facebook_url');
         $linkedin_url = get_field('linkedin_url');

    //the_author_meta( 'user_nicename' , $authorname ); 
    $category_detail=get_the_category($id);//$post->ID
   foreach($category_detail as $cd){
    $cate_name =$cd->name;
    $cate_id=$cd->term_id;
   }

    global $wp_query;
    $curauth = $wp_query->get_queried_object();
    //die(json_encode($curauth));
    ?>

<div class="container single_writer">
   <h2 class="title"><?php echo  $first_name ." ".$last_name ?></h2>
   <div class="row">

      <div class="col-md-12 single-writer-card">
         <div class="card">
            <img class="card-img-top" src="<?=$featurednewimg?>" alt="Card image" style="width:100%">
            <div class="card-body">
               <p class="card-text"><span>Biography : </span><?php echo $biography?></p>
               <p class="card-text"><span>facebook : </span><a href="<?php echo $facebook_url?>" target="_blank"><?php echo $facebook_url?></a></p>
               <p class="card-text"><span>linkedin : </span><a href="<?php echo $linkedin_url?>" target="_blank"><?php echo $linkedin_url?></a></p>
            </div>
         </div>
      </div>

   </div>


<h2 class="title">More Writers</h2>
   <div class="row">
      <?php 
         global $post;
         
         $args = array(
         'post_type' => 'Writers',
         'post_status'=>'publish',
         'posts_per_page' => 3
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
            </div>
                           <a href="<?php echo $permalink?>" class="btn btn-primary">See Profile</a>
         </div>
      </div>
      <?php endwhile; endif; ?>
   </div>
</div>

<?php

get_footer();
