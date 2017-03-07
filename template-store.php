<?php
/*
 Template Name: Page EDD Store
 */
?>
<?php
get_header(); ?>

<section class="">
    <div class="container-fluid">
        <div class="row">
            <?php if ( have_posts() ) : ?>
                <?php while ( have_posts() ) : the_post(); ?>
                    <div class="col-md-12">
                        <h2><?php the_title(); ?></h2>
                        <?php the_content(); ?>
                    </div>
                <?php endwhile; ?>
            <?php else : ?>
                <p><?php _e( 'Sorry, no posts matched your criteria.', 'crcesolutions' ); ?></p>
            <?php endif; ?>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <?php
                $paged_args = array(
                    'post_type' => 'download'
                )
            ?>
            <?php $paged = new WP_Query( $paged_args ); ?>
            <?php if ( $paged->have_posts() ) : ?>
                <?php $paged_item_number = 0; ?>
                <?php while ( $paged->have_posts() ) : $paged->the_post(); ?>
                    <div class="col-md-3 col-sm-4">
                        <div>
                            <article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
                                <div class="edd_download_inner">
                                    <div class="entry-image">
                                        <a href="<?php echo esc_url( the_permalink() ); ?>"><?php
                                                if ( has_post_thumbnail() ) {
                                                    the_post_thumbnail( 'edd-thumbnail' );
                                                }
                                             ?></a>
                                        <?php edd_price(get_the_ID()) ?>
                                    </div>
                                    <header class="entry-header" id="edd">
                                        <h2 class="entry-title"><a href="<?php echo esc_url( the_permalink() ); ?>"><?php the_title(); ?></a></h2>
                                        <div class="entry-excerpt">
                                            <?php if ( has_excerpt() ) : ?>
                                                <?php the_excerpt( ); ?>
                                            <?php endif; ?>
                                        </div>
                                    </header>
                                </div>
                            </article>
                        </div>
                    </div>
                    <?php $paged_item_number++; ?>
                    <?php if( $paged_item_number % 4 == 0 ) echo '<div class="clearfix visible-md-block visible-lg-block"></div>'; ?>
                    <?php if( $paged_item_number % 3 == 0 ) echo '<div class="clearfix visible-sm-block"></div>'; ?>
                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
            <?php else : ?>
                <p><?php _e( 'Sorry, no posts matched your criteria.', 'crcesolutions' ); ?></p>
            <?php endif; ?>
        </div>
    </div>
</section>                

<?php get_footer(); ?>