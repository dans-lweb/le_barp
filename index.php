<?php get_header(); ?>

			<div id="content">
				<div id="inner-content" class="wrap cf">

					<div class="col-md-7 col-sm-12 home_slider">

					<?php 
					    echo do_shortcode("[metaslider id=15]"); 
					?>
					</div>

					<div class="col-md-5 col-sm-12 sub-menu">
						<ul >
							<li> <i class="fa fa-fort-awesome"></i></br>MENU </li>
							<li> <i class="fa fa-fort-awesome"></i></br>MENU </li>
							<li> <i class="fa fa-fort-awesome"></i></br>MENU </li>
							<li> <i class="fa fa-fort-awesome"></i></br>MENU </li>
							<li> <i class="fa fa-fort-awesome"></i></br>MENU </li>
							<li> <i class="fa fa-fort-awesome"></i></br>MENU </li>
							<li> <i class="fa fa-fort-awesome"></i></br>MENU </li>
							<li> <i class="fa fa-fort-awesome"></i></br>MENU </li>
							<li> <i class="fa fa-fort-awesome"></i></br>MENU </li>
						</ul>
					</div>
					<div class="clearfix"></div>
				</div>
				<div id="inner-content" class="wrap cf">

					<div class="col-md-4 agenda">
						<h3> Agenda </h3>
						<ul>
							<?php

							$events = tribe_get_events( array(
							    'posts_per_page' => 5,
							    'start_date' => current_time( 'Y-m-d' ),
							) );
							 
							// Loop through the events: set up each one as
							// the current post then use template tags to
							// display the title and content
							foreach ( $events as $post ) {
							    setup_postdata( $post );
							 
							    // This time, let's throw in an event-specific
							    // template tag to show the date after the title!
							    ?>
							    <li>
									<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
									<p><?php
							    echo tribe_get_start_date() .' '. tribe_get_venue(); } ?></p>
								</li> 
							    
							 
								

							</ul>

							<p><a href="http://localhost/le_barp/index.php/events/"> <span style="font-family:'Arial';"> > </span> Voir tout l'agenda </a> </p>
					</div>

					<div class="col-md-8 articles">

						<main id="main" class="cf" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
							
							<!--  <?php if (in_category('enfance_jeunesse')) {?> -->

							<!-- <div class="home-post"> -->

							<!--  <?php } else { ?> -->

							           <!-- <div style="display:none;"> -->
							<!-- <?php } ?> -->

							<article class="col-md-6" id="post-<?php the_ID(); ?>" <?php post_class( 'cf' ); ?> role="article">

								<header class="article-header">
									<?php if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.

									  the_post_thumbnail('', array(

									    'alt' => $title,

									    'title' => $title));

									}?>

									<h1 class="h2 entry-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
									

								</header>

								<section class="entry-content cf">
									
									<?php the_excerpt(); ?>

								</section>

								<footer class="article-footer cf">
									<p class="byline entry-meta vcard"> <i class="fa fa-calendar"></i>

                                                                        <?php printf('Le'.' '.' %1$s %2$s',
                       								/* the time the post was published */
                       								'<time class="updated entry-time" datetime="' . get_the_time('Y-m-d') . '" itemprop="datePublished">' . get_the_time(get_option('date_format')) . '</time>',
                       								/* the author of the post */
                       								'<span style="display:none;" class="by">'.__( 'by', 'bonestheme').'</span> <span style="display:none;" class="entry-author author" itemprop="author" itemscope itemptype="http://schema.org/Person">' . get_the_author_link( get_the_author_meta( 'ID' ) ) . '</span>'
                    							); ?>
                    				<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"> <i class="fa fa-arrow-circle-o-right"></i>Voir la suite de l'article</a>
									</p>
									

								</footer>

							</article>

							<?php endwhile; ?>

									<?php bones_page_navi(); ?>

							<?php else : ?>

									<article id="post-not-found" class="hentry cf">
											<header class="article-header">
												<h1><?php _e( 'Oops, Post Not Found!', 'bonestheme' ); ?></h1>
										</header>
											<section class="entry-content">
												<p><?php _e( 'Uh Oh. Something is missing. Try double checking things.', 'bonestheme' ); ?></p>
										</section>
										<footer class="article-footer">
												<p><?php _e( 'This is the error message in the index.php template.', 'bonestheme' ); ?></p>
										</footer>
									</article>

							<?php endif; ?>


						</main>

					

				</div>

			</div>


<?php get_footer(); ?>
