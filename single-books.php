<?php
$args = array(
    'post_type' => 'books',
    'post_status' => 'publish',
    'p' => get_the_ID(),

);

$query = new WP_Query($args);

if ($query->have_posts()):
    while ($query->have_posts()):
        $query->the_post();
        ?>
        <div class="single-book">
            <?php if (has_post_thumbnail()) : ?>
                <div class="book-thumbnail">
                    <?php the_post_thumbnail('thumbnail'); ?>
                </div>
            <?php endif; ?>
            <div class="book-info">
                <div class="book-author">
                    Author: <?php the_author(); ?>
                </div>
                <div class="book-date">
                    Publish Date: <?php the_date(); ?>
                </div>
            </div>
            <h1><?php the_title();?></h1>
            <?php
                $facebook_url = get_post_meta(get_the_ID(), 'facebook', true);
                if (!empty($facebook_url)) :
                ?>
                    <div class="book-facebook">
                        <a href="<?php echo esc_url($facebook_url); ?>" target="_blank">
                            <i class="fab fa-facebook"></i> Facebook
                        </a>
                    </div>
                <?php endif; ?>
            <div class="book-content">
                <?php the_content(); ?>
            </div>
        </div>
        <?php
    endwhile;
else :
    echo 'No books found.';
endif;

get_footer();
?>

<style>
/* Add styling for the single book template */
.single-book {
    margin: 20px;
    padding: 20px;
    border: 1px solid #ddd;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    background-color: #fff;
}

.book-info {
    margin-bottom: 15px;
}

.book-author, .book-date {
    font-size: 0.9rem;
    color: #888;
}

.book-content {
    font-size: 1rem;
    line-height: 1.6;
}

</style>