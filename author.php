<?php
get_header(); ?>

<section class="">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-9">
                <div class="author-bio">
                    <?php echo get_avatar( get_the_author_meta( 'ID' ) ); ?>
                    <h2><span><?php the_author(); ?></span></h2>
                    <?php the_author_meta( 'description' ); ?>
                </div>
                <?php if ( is_author() ) : ?>
                    <div class="">
                        <h2><?php _e( 'All posts by', 'crcesolutions' ); ?> <span><?php the_author(); ?></span></h2>
                        <?php if ( have_posts() ) : ?>
                            <?php while ( have_posts() ) : the_post(); ?>
                                <?php get_template_part( 'template-parts/content-home' ); ?>
                            <?php endwhile; ?>
                        <?php else : ?>
                            <p><?php _e( 'Sorry, no posts matched your criteria.', 'crcesolutions' ); ?></p>
                        <?php endif; ?>
                        <ul class="pager posts-navigation text-uppercase">
                            <?php if ( get_next_posts_link() ) : ?>
                                <li class="previous">
                                    <?php next_posts_link( 'Older Posts' ); ?>
                                </li>
                            <?php endif; ?>
                            <?php if ( get_previous_posts_link() ) : ?>
                                <li class="next">
                                    <?php previous_posts_link( __( 'Newer Posts', 'crcesolutions' ) ); ?>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </div>
                <?php endif; ?>
            </div>
            <div class="col-sm-3">
                <?php if ( is_active_sidebar( 'right_sidebar' ) ) : ?>
                    <aside id="main_sidebar">
                        <?php dynamic_sidebar( 'right_sidebar' ); ?>
                    </aside>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>                

<?php get_footer(); ?>