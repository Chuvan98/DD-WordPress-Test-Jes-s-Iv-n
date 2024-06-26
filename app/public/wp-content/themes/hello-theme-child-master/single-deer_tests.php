<?php get_header(); ?>

<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">

    <?php
    while ( have_posts() ) :
        the_post();

        // Display the post title and content
        the_title( '<h1 class="entry-title">', '</h1>' );
        the_content();

        // Get custom fields values
        $start_date = get_post_meta( get_the_ID(), '_deer_tests_start_date', true );
        $end_date = get_post_meta( get_the_ID(), '_deer_tests_end_date', true );
        $description = get_post_meta( get_the_ID(), '_deer_tests_description', true );
        $cover_image = get_post_meta( get_the_ID(), '_deer_tests_cover_image', true );
        $application_link = get_post_meta( get_the_ID(), '_deer_tests_application_link', true );
    ?>

        <div class="deer-test-details">
            <?php if ( $cover_image ) : ?>
                <div class="deer-test-cover-image">
                    <img src="<?php echo esc_url( $cover_image ); ?>" alt="<?php the_title(); ?>">
                </div>
            <?php endif; ?>

            <?php if ( $start_date ) : ?>
                <p><strong>Start Date:</strong> <?php echo esc_html( $start_date ); ?></p>
            <?php endif; ?>

            <?php if ( $end_date ) : ?>
                <p><strong>End Date:</strong> <?php echo esc_html( $end_date ); ?></p>
            <?php endif; ?>

            <?php if ( $description ) : ?>
                <div class="deer-test-description">
                    <p><strong>Description:</strong> <?php echo esc_html( $description ); ?></p>
                </div>
            <?php endif; ?>

            <?php if ( $application_link ) : ?>
                <p><strong>Application Link:</strong> <a href="<?php echo esc_url( $application_link ); ?>"><?php echo esc_html( $application_link ); ?></a></p>
            <?php endif; ?>

    <?php
    endwhile; // Fin del bucle de WordPress
    ?>

    </div><!-- .deer-test-details -->

    </main><!-- #main -->
</div><!-- #primary -->

<?php get_footer(); ?>
