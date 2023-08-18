<?php
/**
 * Template Name: Books Template
 */

get_header();

$args = array(
    'post_type' => 'books',
    'posts_per_page' => -1, // Display all books
);

$books_query = new WP_Query( $args );

if ( $books_query->have_posts() ) :
    ?>
    <div class="book-listing">
        <?php while ( $books_query->have_posts() ) : $books_query->the_post(); ?>
            <div class="book-card">
                <?php if (has_post_thumbnail()) : ?>
                    <div class="book-thumbnail">
                        <?php the_post_thumbnail('thumbnail'); ?>
                    </div>
                <?php endif; ?>
                <div class="book-content">
                    <h2 class="book-title"><?php the_title(); ?></h2>
                    <div class="book-excerpt"><?php the_excerpt(); ?></div>
                </div>
            </div>
        <?php endwhile; ?>
    </div>
    <?php
    wp_reset_postdata();
else :
    echo 'No books found.';
endif;

get_footer();
?>
<style>
    /* Add styling for the book listing */
.book-listing {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
}

.book-card {
    border: 1px solid #ddd;
    padding: 20px;
    width: calc(33.33% - 20px);
    box-sizing: border-box;
    display: flex;
    flex-direction: column;
}

.book-thumbnail img {
    max-width: 100%;
    height: auto;
    margin-bottom: 10px;
}

.book-title {
    font-size: 1.2rem;
    margin: 0;
}

.book-excerpt {
    margin-top: 10px;
}

    </style>