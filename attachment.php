<?php
get_header(); ?>

<section class="" id="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <?php if ( have_posts() ) : ?>
                    <?php while ( have_posts() ) : the_post(); ?>
                        <?php get_template_part( 'template-parts/content-attachment' ); ?>
                    <?php endwhile; ?>
                <?php else : ?>
                    <p><?php _e( 'Sorry, no posts matched your criteria.', 'crcesolutions' ); ?></p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>                

<?php get_footer(); ?>