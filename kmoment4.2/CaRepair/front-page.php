<?php get_header(); ?>
<div class="main_content">
    <div class="content">
        <section class="presentation_content">
            <h2 class="presentation_content_info"><?php echo get_bloginfo('name'); ?></h2>
            <p class="presentation_content_info paragraph"><?php echo get_bloginfo('description'); ?></p>
        </section>
        <section class="cars-for-sale">
            <header class="main-header">
                <h1>Allt om bil reparering</h1>
            </header>
            <div class="car-items">
            <?php           
                $recent_posts = new WP_Query("category_name=nyheter&posts_per_page=4&orderby=date&order=DESC");

                if ($recent_posts->have_posts()) {
                    while ($recent_posts->have_posts()) {
                        $recent_posts->the_post();
                        ?>
                        <article class="car-item">
                            <figure class="article-image-container">
                                <?php 
                                if (has_post_thumbnail()) {
                                ?>
                                <a href="<?php the_permalink(); ?>">
                                    <?php
                                    the_post_thumbnail('medium', ['class' => 'article-image', 'alt' => esc_attr(get_the_title())]);
                                    ?>
                                </a>
                                <?php
                                } 
                                ?>
                            </figure>
                            <section class="article-content">
                                <header class="section-header">
                                    <h3 class="article-title">
                                        <a href="<?php the_permalink(); ?>" class="article-link">
                                            <?php the_title(); ?>
                                        </a>
                                    </h3>
                                    <p class="article-date"><?php the_author_posts_link(); ?> | <?php echo get_the_date(); ?></p>
                                </header>
                                <p class="article-excerpt">
                                    <?php echo wp_trim_words(get_the_excerpt(), 50, '') ?>
                                    <a href="<?php the_permalink(); ?>" class="read-more">Läs mer</a>
                                </p>
                            </section>
                        </article>
                        <?php
                    }
                    wp_reset_postdata(); // Reset the query to avoid conflicts
                } else {
                    echo "<p>Inga inlägg hittades.</p>";
                }
                ?>
            </div>
        </section>
    </div>
    <?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>