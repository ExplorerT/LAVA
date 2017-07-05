<?php /* Template Name: Home page */ 
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package LAVA
 */

get_header(); ?>

  <div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">

    <div class="main-header-content">
      <h1> Welcome to lava!</h1>
      <hr>
      <h2>What do you want to do?</h2>
        <ul id="icon-container">
          <li id="map-icon">
            <img src="http://localhost:8888/LAVA/wp-content/uploads/2017/06/Picture1-1.png">
            <h5>Find a facility location</h5>
          </li>
          <li id="facility-icon">
            <img src="http://localhost:8888/LAVA/wp-content/uploads/2017/06/Picture2-1.png">
            <h5>Find a facility by feature</h5>
          </li>
          
        </ul>
            
</div>


    </main><!-- #main -->
  </div><!-- #primary -->

<?php
//get_sidebar();
get_footer();
