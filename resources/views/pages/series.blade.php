@extends('layouts.master')

@section('content')
</div>

<article class="container-fluid" style="margin-bottom: 30px">
    <section class="row" style="background-image:  linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url(/app/themes/compasshb-theme/images/header-sermon.jpg); background-size: cover; background-position: center">
        <div class="col-xs-11 col-xs-offset-1" style="padding-top: 60px;" >
            <h1 class="tk-seravek-web" style='color: #fff; padding: 10px 3px; text-transform: uppercase '>SERMON Series</h1>
            <p class="lead" style="color: #fff; margin-top: -20px">Teaching</p>
        </div>
    </section>

    <section class="row">
        <div class="col-md-7 col-md-offset-1" style="background-color: #fff; border: 1px solid #E4E4E4; padding: 20px; margin-top: 20px">
            <h1>Sermon Series</h1>
            <p>Coming soon.</p>
            <ul>
                <?php
                $args = array('post_type' => 'post', 'posts_per_page' => 20, 'format' => 'Series');
                $loop = new WP_Query($args);
                while ($loop->have_posts()) : $loop->the_post();
                    ?>
                    <li>#<?= get_post_meta(get_the_ID(), 'sermon_number', true); ?>. <a
                            href="<?= get_permalink(); ?>"><?= get_the_title(); ?></a> - <?= get_post_meta(get_the_ID(),
                            'sermon_text', true); ?></li>
                <?php
                endwhile;
                ?>
            </ul>
            <br/><br/>
        </div>

        <aside class="col-md-2 col-md-offset-1" role="complementary" style="background-color: #fff; border: 1px solid #E4E4E4; margin-top: 20px; padding: 20px;">
            <?php
                get_template_part('templates/aside', 'sermon');
            ?>
        </aside>
    </section>
</article><!-- .container -->
@stop
