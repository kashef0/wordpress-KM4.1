<div class="sidebar">
        <h2 class="highlight-news">Senaste Nytt</h2>
        <?php 
        // Skapar en WP_Query för att hämta inlägg från kategorin "aside-nyheter"
        $sidebar_posts = new WP_Query("category_name=aside-nyheter&posts_per_page=4&orderby=date&order=DESC");
        if ($sidebar_posts->have_posts()) {
            // Loopar genom alla de senaste inläggen
            while ($sidebar_posts->have_posts()) {
                $sidebar_posts->the_post(); // Sätter upp data för varje inlägg
                ?>
                <aside class="aside_bar">
                    <article class="news-item">
                        <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                        <p><?php echo get_the_date(); ?></p>
                        <!-- Visar ett förkortad inlägget -->
                        <p><?php echo wp_trim_words(get_the_excerpt(), 22, ' '); ?><a href="<?php the_permalink(); ?>" class="read-more">läs mer</a></p> 
                    </article>
                </aside>
                <?php
            }
            wp_reset_postdata();
        } else {
            echo '<p>Inga nyheter tillgängliga.</p>';
        }
        ?>
            <?php if (is_active_sidebar('sidebar')) : ?> <!-- Kollar om en widget för sidopanelen är aktiv -->
                <br />
                <hr/>
            <aside id="sidebar" class="widget-area">
                <?php get_sidebar('sidebar'); ?> <!-- Visar innehållet från aktiva widgets -->
            </aside>
        <?php endif; ?>
    </div>

