<?php get_header(); ?> <!-- Inkluderar sidhuvudet för webbplatsen -->
<div class="main_content">
    <div class="content">
        <?php 
            if(have_posts()) {
              // Loopar genom alla inlägg
                while(have_posts()) {
                    the_post();
                ?>
                <section class="article-content">
                <figure class="article-image-container">
                    <?php 
                    // Kollar om inlägget har en utvald bild och visar den
                    if (has_post_thumbnail()) {
                        the_post_thumbnail('full',['class' => 'article-image-full']);
                    }
                    ?>
                </figure>
                <header class="scetion_header">
                  <h3 class="article-title">
                    <a href="#" class="article-link"
                      ><?php the_title(); ?></a
                    >
                  </h3>
                  <p class="article-date"><?php the_date(); ?></p>
                </header>
                <p class="article-excerpt">
                  <?php the_content(); ?> <!-- Visar hela innehållet för artikeln -->
                </p>
              </section>
                <?php
                }
            } else {
                echo "<p>Hittade inget på denna adress...</p> ";
            }
        ?>
    </div> 
    <div class="content comments">
    <?php 
        if ( is_single() && 'post' == get_post_type() ) {
            // Output the comments template
            comments_template(); 
        }
        ?>
    </div>
</div>

<?php get_footer(); ?>  <!-- Inkluderar sidfoten för webbplatsen -->