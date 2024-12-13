<?php get_header(); ?>
    <div class="content">
      <?php 
        if(have_posts()) {
          while(have_posts()) {

          the_post();
      ?>
        <section class="article-content">
            <header class="scetion_header">
              <h3 class="article-title">
                <a href="#" class="article-link"><?php the_title(); ?></a>
              </h3>
                <p class="article-date"><?php the_date(); ?></p>
            </header>
                <p class="article-excerpt">
                  <?php the_content(); ?>
                </p>
              </section>
                <?php
                }
            } else {
              echo "<p>Hittade inget på denna adress...</p> ";
            }
        ?>
      </div>
<?php get_footer(); ?>