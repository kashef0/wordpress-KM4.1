
<?php get_header(); ?>
    <?php 
    // Hämta den aktuella sidans slug
    $page_slug = strtolower(get_post_field('post_name', get_the_ID()));
    $pages_name = in_array($page_slug, ['om-oss', 'about', 'om', 'about us', 'om oss']);
    // Kollar om sidan är "om-oss about om"
    if ($pages_name) {
        // Hämtar inlägg från kategorin "about"
        $about_post = new WP_Query("category_name=about&posts_per_page=5");
        
        // Hämtar inlägg från kategorin "vara-personal"
        $personal = new WP_Query("category_name=vara-personal&posts_per_page=5");
        ?>
        <section id="about">
            <?php
            // Visar inlägg från kategorin "about"
            if ($about_post->have_posts()) :
                while ($about_post->have_posts()) : $about_post->the_post();
            ?>
                <section class="about_carpaier">
                    <h1><?php the_title(); ?></h1>
                    <p><?php the_content(); ?></p>
                </section>
            <?php endwhile; wp_reset_postdata(); endif; ?>

            <!-- Visar inlägg från kategorin "vara-personal" -->
            <?php if ($personal->have_posts()) { ?>
                <section class="team">
                    <h2>Vår Personal</h2>
                    <div class="team-members">
                        <?php
                        while ($personal->have_posts()) : $personal->the_post();
                        ?>
                            <article class="team-member">
                                <!-- Visar miniatyrbild med länk -->
                                <?php 
                                if (has_post_thumbnail()) :
                                ?>
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_post_thumbnail('medium', ['class' => 'article-image', 'alt' => esc_attr(get_the_title())]); ?>
                                    </a>
                                <?php endif; ?>
                                <h3><?php the_title(); // visa tittle?> </h3> 
                                <p>
                                    <?php the_excerpt(); // visa utdrag ?>
                                </p>
                            </article>
                        <?php endwhile; wp_reset_postdata(); ?>
                    </div>
                </section>
            <?php  wp_reset_postdata();
                } else {
                    echo '<p>Inga beskrivning tillgängliga just nu.</p>';
                } ?>
        </section>
        <?php
    }  elseif (is_page() && !$pages_name) {
        // Hämta den aktuella sidans slug
        $page_slug = get_post_field('post_name', get_the_ID());
        
        // Använd sluggen som kategorinamn
        $page_posts = new WP_Query([
            'category_name' => $page_slug,
            'posts_per_page' => 10,
        ]);
        ?>
        <div class="main_content">
            <div class="content">
                <section class="presentation_content">
                    <h2 class="presentation_content_info"> <?php echo $page_slug ?></h2>
                </section>
                <section id="car-repair-services">
                    <?php
                    if ($page_posts->have_posts()) {
                        while ($page_posts->have_posts()) {
                            $page_posts->the_post(); ?>
                            <article class="car-item">
                                <h3 class="kontakt_title"><?php the_title(); ?></h3>
                            <?php
                                if (str_word_count(strip_tags(get_the_content())) > 25) {
                                    // forkorta innehållet
                                    $trimmed_content = wp_trim_words(get_the_content(), 25, ' ');
                                    ?>
                                    <p>
                                        <?php echo $trimmed_content; ?> 
                                        <a class="read-more" href="<?php echo esc_url(get_permalink()); ?>">Läs mer...</a>
                                    </p>
                                <?php
                                } else {
                                    // visa alla innehåll istället
                                    ?>
                                    <p><?php echo the_content(); ?></p>
                                <?php
                                }
                                ?>
                            </article>
                            <?php
                        }
                        wp_reset_postdata(); // återställa post data
                    } else {
                        echo '<p>Inga inlägg tillgängliga för kategorin ' . esc_html($page_slug) . '.</p>';
                    }
                    ?>
                </section>
            </div>
        </div>
        <?php
    } else {
            ?>
            <div class="main_content">
                <div class="content">
                    <section class="page-content">
                            <p>No content found for this page.</p>
                    </section>
                </div>
            </div>
         <?php
        }
    ?>

<?php get_footer(); ?>
