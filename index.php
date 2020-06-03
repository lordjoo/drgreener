<?php get_header(); ?>


<main class="main m-md-0 pt-4  row">
    <section class="posts col-md-12">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="container mt-4">
                        <!--Section: Content-->
                        <section class="posts-section">
                            <!-- Grid row -->
                            <div class="row">
                                <?php if (have_posts()): while (have_posts()): the_post(); ?>
                                <!-- Grid column -->
                                <div class="col-lg-6 col-md-12 mb-lg-3 mb-4">
                                    <!-- Card -->
                                    <div class="card hoverable">

                                        <!-- Card image -->
                                        <img class="card-img-top"
                                             src="<?php echo get_the_post_thumbnail_url(); ?>"
                                             alt="Card image cap">

                                        <!-- Card content -->
                                        <div class="card-body">
                                            <!-- Title -->
                                            <a href="<?php echo permalink_link(); ?>" class="black-text">
                                            <?php echo get_the_title(); ?>
                                            </a>
                                            <!-- Text -->
                                            <p class="card-title text-muted font-small mt-3 mb-2">
                                                <?php
                                                $t = get_the_excerpt();
                                                echo substr($t, 0, 50) ?>
                                            </p>
                                            <a href="<?php echo permalink_link(); ?>"
                                               class="btn btn-flat text-primary p-1 mx-0">Read more<i
                                                        class="fa fa-angle-right ml-2"></i></a>
                                        </div>

                                    </div>
                                    <!-- Card -->
                                </div>
                                <?php endwhile; endif; ?>
                                <div class="row mt-4">
                                    <div class="col-md-12 d-flex justify-content-center">
                                        <?php echo wp_bootstrap_pagination(); ?>
                                    </div>
                                </div>

                            </div>
                            <!-- Grid row -->
                        </section>
                        <!--Section: Content-->
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mt-4">
                        <?php
                        get_sidebar();
                        // if (is_active_sidebar('sidebar')):
                        //   dynamic_sidebar('sidebar');
                        // endif;
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>
