<?php get_header(); ?>

    <main class="main m-md-4 pt-4 mt-4 row">
        <section class="single-post col-md-12">
            <div class="container white p-4">
                <?php if (have_posts()): while (have_posts()):
                    the_post(); ?>
                    <div class="row">
                        <div class="col-md-12 d-md-flex">
                            <a class="text-decoration-none" href="<?php permalink_link(); ?>">
                                <h2 class="card-title mt-2"><?php the_title(); ?></h2>
                            </a>
                            <p class="cat-p ml-auto mt-2 text-decoration-none">
                                <?php edit_post_link('<span class="fa fa-pencil-alt mr-2 bg-primary p-2 text-white"></span> Edit '); ?>
                            </p>
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

        </section>
    </main>
<?php get_footer(); ?>

