<?php

get_header(); ?>

  <div id="content-wrap" class="container clr full-screen">
    <div id="content" class="clr site-content" role="main">
      <div class="entry-content entry clr">
        <div class="vc_row wpb_row vc_row-fluid">
          <div class="vcex-row-bg-container clr" style="background-color: #3c3d41;">
            <div class="vc_col-sm-12 wpb_column clr column_container">
              <div class="wpb_single_image clr wpb_content_element vc_align_none">
                <div class="wpb_wrapper"><img width="2458" height="1260" src=
                "http://www.compasshb.com/wp-content/uploads/2014/07/ournewhome.jpg"
                class="vc_box_border_grey attachment-full" alt="Our New Home" /></div>
                <!-- .wpb_wrapper -->
              </div><!-- .wpb_single_image -->

              <div class="wpb_single_image clr wpb_content_element vc_align_none">
                <div class="wpb_wrapper"><img width="2448" height="1268" src=
                "http://www.compasshb.com/wp-content/uploads/2014/07/weekofwelcome.jpg"
                class=" vc_box_border_grey attachment-full" alt=
                "Week of Welcome" /></div><!-- .wpb_wrapper -->
              </div><!-- .wpb_single_image -->
            </div>
          </div>
        </div>

        <div class="vc_row wpb_row vc_row-fluid">
          <div class="vcex-background-repeat vcex-row-bg-container clr" style=
          "background-image: url(http://www.compasshb.com/wp-content/uploads/2014/10/hbwebsitetileGRAY.jpg);padding-top: 10px;padding-bottom: 30px;">
          <div class="container clr">
              <div class="center-row-inner clr">
                <div class="vc_col-sm-12 wpb_column clr column_container">
                  <hr class="vcex-spacing" style="height: 20px" />

                  <div class="wpb_text_column wpb_content_element">
                    <div class="wpb_wrapper">
                      <p style="text-align: center;"><a href=
                      "http://www.evangelismeveryday.com/church-jesus-building/" target=
                      "_blank">Exciting announcement about a new 24/7 facility for
                      Compass Bible Church Huntington Beach &#8211; Click Here</a></p>

                      <p style="text-align: center;"></p>
                    </div>
                  </div>

 				<?php 
				rewind_posts();
				query_posts( 'post_type=sermon&posts_per_page=5' );
				if ( have_posts() ) : while ( have_posts() ) : the_post();

				if (get_field('video_oembed')) {
					$worksheet = get_field("sermon_worksheet");
					echo "<center>";
					if (wp_is_mobile()) {
						echo wp_oembed_get(get_field('video_oembed'), array('height' => '205'));
					} else {
						echo wp_oembed_get(get_field('video_oembed'), array('height' => '500'));

					}
					echo "</center>";
					echo '<div class="vc_text_separator wpb_content_element separator_align_center vc_text_separator_one" ><span  style="color: #ffffff;">Latest Sermon: ';
					echo '<a href="' . get_the_permalink() . '">' . get_the_title() . '</a>';
					if ($worksheet) {
						echo ' - <a href="' . $worksheet['url'] . '" target="_blank">Download Worksheet</a>';
						echo ' - <a href="https://itunes.apple.com/us/podcast/sermon-video/id938965423?mt=2">Download Video</a>';
					}
					echo '</span></div>';
					break;
				}

				endwhile; endif; ?>
				
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="vc_row wpb_row vc_row-fluid">
          <div class=" vcex-row-bg-container clr" style="background-color: #ffffff;">
            <div class="vc_col-sm-8 column-no-padding wpb_column clr column_container">
              <div class="clr vcex-background-stretch" style=
              "background-image: url(http://www.compasshb.com/wp-content/uploads/2014/07/TabletPad-1Thessalonians5-r1.jpg);padding-top: 440px;">
              </div>
            </div>

            <div class="vc_col-sm-4 wpb_column clr column_container">
              <div class="clr" style="padding-top: 40px;">
                <div class="wpb_text_column wpb_content_element">
                  <div class="wpb_wrapper">
                    <h1 style="text-align: center;"><span style=
                    "font-size: 36px;">Scripture of the Day</span></h1>

                    <p style="text-align: center;"><span style="font-size: medium;">Get
                    energized by reading a passage of scripture each day with our church!
                    Be encouraged by what other people have to say about the passage and
                    share your thoughts!</span></p>
                  </div>
                </div>

                <div class="vc_empty_space" style="height: 32px"></div>

                <div class="textcenter clr">
                  <a href="/read" class="vcex-button clean align-center medium black"
                  title="Read Scripture of the Day"><span class="vcex-button-inner"> Read
                  Now</span></a>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="vc_row wpb_row vc_row-fluid row-with-parallax">
          <div class="vcex-background-parallax vcex-row-bg-container clr" style=
          "background-image: url(http://www.compasshb.com/wp-content/uploads/2014/10/PastorBobbyHBSideview-e1413911637294.png);padding-top: 250px;">
          <div class="vc_col-sm-12 wpb_column clr column_container"></div>
          </div>
        </div>

        <div class="vc_row wpb_row vc_row-fluid">
          <div class=" vcex-row-bg-container clr" style=
          "background-color: #f7f7f7;padding-top: 30px;padding-bottom: 30px;">
            <div class="container clr">
              <div class="center-row-inner clr">
                <div class="vc_col-sm-6 wpb_column clr column_container">
                  <div class="wpb_single_image clr wpb_content_element vc_align_none">
                    <div class="wpb_wrapper">
						<h2>Directions</h2>
                    	<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d26542.154928917666!2d-118.04023219999998!3d33.7407795!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80dd25f2e1f15bbd%3A0x2b2a43000587dfc0!2s5082+Argosy+Ave%2C+Huntington+Beach%2C+CA+92649!5e0!3m2!1sen!2sus!4v1420493991035" width="400" height="300" frameborder="0" style="border:0"></iframe>
					</div><!-- .wpb_wrapper -->
                  </div><!-- .wpb_single_image -->
                </div>

                <div class="vc_col-sm-6 wpb_column clr column_container">
                  <div class="wpb_text_column wpb_content_element">
                    <div class="wpb_wrapper">
                      <h2 style="text-align: center;">Sundays 11am at our new building</h2>

                      <p style="text-align: center;">5082 Argosy Avenue</p>

                      <p style="text-align: center;">Huntington Beach, CA 92649</p>

                      <p style="text-align: center;"><a href=
                      "https://www.google.com/maps/place/5082+Argosy+Ave,+Huntington+Beach,+CA+92649/@33.7407795,-118.0402322,17z/data=!3m1!4b1!4m2!3m1!1s0x80dd25f2e1f15bbd:0x2b2a43000587dfc0"
                      target="_blank">Map</a></p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="vc_row wpb_row vc_row-fluid">
          <div class=" vcex-row-bg-container clr" style="background-color: #dddddd;">
            <div class="container clr">
              <div class="center-row-inner clr">
                <div class="vc_col-sm-12 wpb_column clr column_container">
	
					<?php 
					rewind_posts();
					query_posts( 'post_type=sermon&posts_per_page=4&post_status=publish' );
					$count = 1;  ?>

					<div class="wpb_wrapper"><h2>Recent Sermons</h2><a href="/sermon/">View All</a></div>
					<div class="wpex-row vcex-portfolio-grid vcex-clearfix"> 

					<?php while ( have_posts() ) : the_post(); ?>

						<article class="portfolio-entry col span_1_of_4 col-<?= $count; ?> cat-8">
							<div class="portfolio-entry-media clr">
								<div class="portfolio-featured-video responsive-video-wrap clr">
									<?php // Display default thumbnail until video is available
									if (get_field('video_oembed') != '') {
										echo wp_oembed_get(get_field("video_oembed"), array('width'=>640));
									} else { 
										echo '<img src="/wp-content/uploads/2014/10/sermon-video-thumbnail.jpg"/>';
									} ?>
								</div>
							</div>
							<div class="portfolio-entry-details clr" >
								<h2 class="portfolio-entry-title" >
									<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" ><?php $sermon_number = get_field('sermon_number'); if ($sermon_number) { echo '#' . $sermon_number . '. '; } the_title(); ?></a>
								</h2>
								<?php the_time('l, F j, Y', '<p>', '</p>'); ?>
								<div class="portfolio-entry-excerpt clr">
									<a href="<?php the_permalink(); ?>" title="See More" rel="bookmark" class="vcex-readmore theme-button"> See More <span class="vcex-readmore-rarr">&rarr;</span></a>
								</div>
							</div><!-- .portfolio-entry-details -->
						</article><!-- .portfolio-entry -->

					<?php $count++; endwhile; wp_reset_query(); ?>

					</div><!-- .vcex-portfolio-grid -->
					
								<?php 
								rewind_posts();
								query_posts( 'post_type=video&posts_per_page=2&post_status=publish' );
								$count = 1;  ?>

								<div class="wpb_wrapper"><h2>Recent Videos</h2><a href="/video/">View All</a></div>
								<div class="wpex-row vcex-portfolio-grid vcex-clearfix"> 

								<?php while ( have_posts() ) : the_post(); ?>

									<article class="portfolio-entry col span_1_of_2 col-<?= $count; ?> cat-8">
										<div class="portfolio-entry-media clr">
											<div class="portfolio-featured-video responsive-video-wrap clr">
												<?php // Display default thumbnail until video is available
												if (get_field('video_oembed') != '') {
													echo wp_oembed_get(get_field("video_oembed"), array('width'=>640));
												} else { 
													echo '<img src="/wp-content/uploads/2014/10/sermon-video-thumbnail.jpg"/>';
												} ?>
											</div>
										</div>
										<div class="portfolio-entry-details clr" >
											<h2 class="portfolio-entry-title" >
												<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" ><?php $sermon_number = get_field('sermon_number'); if ($sermon_number) { echo '#' . $sermon_number . '. '; } the_title(); ?></a>
											</h2>
											<?php the_time('l, F j, Y', '<p>', '</p>'); ?>
											<div class="portfolio-entry-excerpt clr">
												<a href="<?php the_permalink(); ?>" title="See More" rel="bookmark" class="vcex-readmore theme-button"> See More <span class="vcex-readmore-rarr">&rarr;</span></a>
											</div>
										</div><!-- .portfolio-entry-details -->
									</article><!-- .portfolio-entry -->

								<?php $count++; endwhile; wp_reset_query(); ?>

								</div><!-- .vcex-portfolio-grid -->
				

                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="vc_row wpb_row vc_row-fluid">
          <div class="container clr">
            <div class="center-row-inner clr">
              <div class="vc_col-sm-12 wpb_column clr column_container">
                <div class="wpb_text_column wpb_content_element">
                  <div class="wpb_wrapper">
                    <h3>New Compass HB Photographs</h3>

					<?= do_shortcode('[alpine-phototile-for-smugmug src="user_recent" uid="compasshb" imgl="smugmug" style="bookshelf" row="5" num="5" size="M" shadow="1" border="1" highlight="1" align="center" max="100" nocredit="1"]'); ?>

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="vc_row wpb_row vc_row-fluid">
          <div class=" vcex-row-bg-container clr" style=
          "background-color: #f7f7f7;padding-top: 20px;padding-bottom: 20px;">
            <div class="container clr">
              <div class="center-row-inner clr">
                <div class="vc_col-sm-12 wpb_column clr column_container">
                  <div class="wpb_text_column wpb_content_element">
                    <div class="wpb_wrapper">
                      <h2>Follow Compass HB on Instagram</h2>

						<?= do_shortcode('[alpine-phototile-for-instagram id=751 user="compasshb" src="user_recent" imgl="instagram" style="cascade" col="5" size="L" num="5" shadow="1" border="1" highlight="1" curve="1" align="center" max="100" nocredit="1"]'); ?>
 
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div><!-- .entry-content -->
      <!-- #post -->
    </div><!-- #content -->
    <!-- #primary -->
  </div><!-- #content-wrap -->
  <?php get_footer(); ?>