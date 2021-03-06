<?php
/**
 * FAQ
 * @package Wordpress
 * @subpackage one-theme
 * @since 1.0
 * @author Matthew Hansen
 */

 namespace oneTheme;

 require_once get_template_directory() . '/lib/module.class.php';

 class FAQ extends Module {
     use assetManager;

     public function init(){
         $this->customPostType();
         add_shortcode("faq", array($this, 'shortCode'));
     }

     public function customPostType() {
         $this->faq = new \Super_Custom_Post_Type('faq_cpt', 'FAQ', 'Frequently Asked Questions');
         $this->faq->set_icon('list');
     }

     public function shortCode($content = null) {
         global $wp_query;
         $temp = $wp_query;
         $wp_query= null;
         $mypost = array(
             'post_type' => 'faq_cpt',
             'orderby' => 'menu_order',
             'posts_per_page' => '-1',
             'order' => 'ASC'
         );

         $wp_query = new \WP_Query( $mypost );

         ob_start();
         ?>
         <?php $i = 1; ?>
         <div class="panel-group" id="accordion">
             <?php while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
                 <div>
                     <div>
                         <h4 class="panel-title">
                             <a data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $i; ?>">
                                 <i class="indicator fa fa-caret-right fa-lg"></i> <?php the_title(); ?>
                             </a>
                         </h4>
                     </div>
                     <div id="collapse<?php echo $i; ?>" class="panel-collapse collapse">
                         <div class="panel-body">
                             <?php the_content(); ?>
                         </div>
                     </div>
                 </div>
                 <?php $i++; ?>
             <?php endwhile; ?>
         </div>

         <?php $wp_query = null; $wp_query = $temp;
         $content = ob_get_contents();
         ob_end_clean();
         return $content;
     }

 }

 new FAQ();
