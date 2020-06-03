<?php
get_header();
$edit_text = '<span class="fa fa-pencil-alt mr-2 bg-primary p-2 text-white"></span>';
(get_bloginfo('language') == "ar") ? $edit_text .= '  تعديل  ' : $edit_text .= "Edit";
?>

    <main class="main m-md-0 pt-4">
        <section class="post">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-sm-12">
                        <div class="white p-4">
                            <?php if (have_posts()): while (have_posts()):
                                the_post(); ?>
                                <div class="row">
                                    <div class="col-md-12 d-md-flex">
                                        <p class="cat-p <?php if (get_bloginfo('language') == 'ar'): ?> ml-4 <?php else: echo ' mr-4'; endif; ?> text-decoration-none">
                                            <span class="fa fa-tag <?php if (get_bloginfo('language') == 'ar'): ?> ml-2 <?php else: echo ' mr-2'; endif; ?> bg-dark p-2 text-white"></span>
                                            <?php the_category(','); ?>
                                        </p>
                                        <p class="cat-p <?php if (get_bloginfo('language') == 'ar'): ?> ml-auto <?php else: echo ' mr-auto'; endif; ?> m-0 text-decoration-none">
                                            <?php edit_post_link($edit_text); ?>
                                        </p>
                                    </div>
                                    <div class="col-md-12">
                                        <a class="text-decoration-none" href="<?php permalink_link(); ?>">
                                            <h2 class="card-title mt-2"><?php the_title(); ?></h2>
                                        </a>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <?php echo get_the_post_thumbnail('', 'full', ['class' => "img-thumbnail"]); ?>
                                    </div>
                                </div>
                                <div class="post-content mt-4">
                                    <?php the_content(); ?>
                                </div>
                            <?php endwhile;
                            endif; ?>
                        </div>
                        <div class="">
                            <div class="row mt-4 mb-4">
                                <div class="col-md-12">
                                    <?php single_pagination(); ?>
                                </div>
                            </div>
                        </div>
                        <div class="row p-4 white mb-4">
                            <?php
                            $post_id = get_queried_object_id();
                            $cats = wp_get_post_categories($post_id);
                            $rand_posts_args = [
                                "posts_per_page" => 5,
                                "orderby" => "rand",
                                "category__in" => $cats,
                                "post__not_in" => array($post_id),
                            ];
                            $rand_posts = new WP_Query($rand_posts_args);
                            while ($rand_posts->have_posts()) {
                                $rand_posts->the_post();
                                ?>
                            <div class="col-lg-4 col-md-6 mb-lg-0 mb-4">
                                <!-- Card -->
                                <div class="card hoverable">
                                    <!-- Card image -->
                                    <img class="card-img-top" src="<?php echo get_the_post_thumbnail_url(); ?>" alt="Card image cap">
                                    <!-- Card content -->
                                    <div class="card-body">
                                        <!-- Title -->
                                        <a href="<?php echo permalink_link(); ?>" class="card-title text-muted text-uppercase font-small mt-1 mb-3">
                                            <?php echo get_the_title(); ?>
                                        </a>
                                        <!-- Text -->
                                    </div>
                                </div>
                            </div>
                                <?php
                            }
                            ?>
                        </div>
                        <?php if (comments_open()): ?>
                            <div class="container p-4 white">
                                <?php comments_template(); ?>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <?php get_sidebar(); ?>
                    </div>
                </div>
            </div>
        </section>
    </main>
<?php get_footer(); ?>