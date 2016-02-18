<?php
/*
 * CUSTOM POST TYPE TEMPLATE
 *
 * This is the custom post type post template. If you edit the post type name, you've got
 * to change the name of this template to reflect that name change.
 *
 * For Example, if your custom post type is "register_post_type( 'bookmarks')",
 * then your single template should be single-bookmarks.php
 *
 * Be aware that you should rename 'custom_cat' and 'custom_tag' to the appropiate custom
 * category and taxonomy slugs, or this template will not finish to load properly.
 *
 * For more info: http://codex.wordpress.org/Post_Type_Templates
*/
?>

<?php get_header(); ?>

			<div id="content">

				<div id="inner-content" class="wrap cf">

						<main id="main" class=" col-md-9 col-sm-12 cf" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							<article class="article_body" id="post-<?php the_ID(); ?>" <?php post_class('cf'); ?> role="article">

								<header class="article-header">

									<h1 class="single-title custom-post-type-title"><?php the_title(); ?></h1>
									<p class="byline vcard"><?php
										printf( __( 'Posted <time class="updated" datetime="%1$s" itemprop="datePublished">%2$s</time> by <span class="author">%3$s</span> <span class="amp">&</span> filed under %4$s.', 'bonestheme' ), get_the_time( 'Y-m-j' ), get_the_time(get_option('date_format')), get_the_author_link( get_the_author_meta( 'ID' ) ), get_the_term_list( $post->ID, 'custom_cat', ' ', ', ', '' ) );
									?></p>

								</header>

								<section class="entry-content cf">
									<?php
										// the content (pretty self explanatory huh)
										the_content();

										/*
										 * Link Pages is used in case you have posts that are set to break into
										 * multiple pages. You can remove this if you don't plan on doing that.
										 *
										 * Also, breaking content up into multiple pages is a horrible experience,
										 * so don't do it. While there are SOME edge cases where this is useful, it's
										 * mostly used for people to get more ad views. It's up to you but if you want
										 * to do it, you're wrong and I hate you. (Ok, I still love you but just not as much)
										 *
										 * http://gizmodo.com/5841121/google-wants-to-help-you-avoid-stupid-annoying-multiple-page-articles
										 *
										*/
										wp_link_pages( array(
											'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'bonestheme' ) . '</span>',
											'after'       => '</div>',
											'link_before' => '<span>',
											'link_after'  => '</span>',
										) );
									?>
								</section> <!-- end article section -->

						

								<footer class="article-footer">
									<p class="tags"><?php echo get_the_term_list( get_the_ID(), 'custom_tag', '<span class="tags-title">' . __( 'Custom Tags:', 'bonestheme' ) . '</span> ', ', ' ) ?></p>

								</footer>

								<?php comments_template(); ?>

							</article>

							<?php endwhile; ?>

							<?php else : ?>

									<article id="post-not-found" class="hentry cf">
										<header class="article-header">
											<h1><?php _e( 'Oops, Post Not Found!', 'bonestheme' ); ?></h1>
										</header>
										<section class="entry-content">
											<p><?php _e( 'Uh Oh. Something is missing. Try double checking things.', 'bonestheme' ); ?></p>
										</section>
										<footer class="article-footer">
											<p><?php _e( 'This is the error message in the single-custom_type.php template.', 'bonestheme' ); ?></p>
										</footer>
									</article>

							<?php endif; ?>

						</main>

						<div class="col-md-3 col-xs-12 sec-menu">
						
							<div class="col-md-4 col-xs-4"> <a href="">
								<svg version="1.1" id="write" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
									 width="31.622px" height="31.622px" viewBox="0 0 31.622 31.622" enable-background="new 0 0 31.622 31.622" xml:space="preserve">
								<g>
									<path fill="#FFFFFF" d="M22.511,8.02c0.378,0.238,0.702,0.375,0.936,0.604c1.3,1.271,2.578,2.566,3.863,3.854
										c0.527,0.527,0.528,0.928,0.003,1.453c-1.522,1.525-3.05,3.045-4.561,4.58c-0.134,0.135-0.23,0.373-0.231,0.563
										c-0.014,3.6-0.01,7.199-0.01,10.799c0,0.828-0.256,1.084-1.085,1.084c-6.489,0-12.978,0-19.467,0c-0.891,0-1.121-0.23-1.121-1.119
										c0-8.463,0-16.924,0-25.387c0-0.861,0.236-1.096,1.105-1.096c6.488,0,12.978,0,19.466,0c0.857,0,1.102,0.246,1.102,1.107
										C22.511,5.686,22.511,6.91,22.511,8.02z M20.868,20.365c-0.654,0.658-1.229,1.246-1.813,1.824
										c-0.824,0.818-1.572,1.742-2.501,2.416c-1.518,1.102-3.281,1.732-5.144,1.975c-0.642,0.082-1.194,0.137-1.641,0.68
										c-0.281,0.342-0.801,0.268-1.106-0.049c-0.304-0.314-0.31-0.77-0.001-1.117c0.153-0.174,0.33-0.326,0.484-0.5
										c0.063-0.07,0.136-0.174,0.131-0.258c-0.066-1.408,0.434-2.684,0.931-3.957c0.439-1.125,1.004-2.172,1.938-2.984
										c0.323-0.281,0.6-0.615,0.945-0.975c-1.068,0-2.09-0.004-3.111,0c-1.586,0.006-3.172,0.016-4.758,0.021
										c-0.09,0-0.215,0.02-0.262-0.029c-0.149-0.152-0.375-0.334-0.371-0.5c0.004-0.164,0.236-0.342,0.4-0.473
										c0.072-0.059,0.225-0.023,0.34-0.023c2.785-0.002,5.569,0,8.354-0.008c0.198-0.002,0.458-0.004,0.582-0.119
										c0.561-0.521,1.083-1.084,1.683-1.697c-0.229,0-0.367,0-0.504,0c-3.354,0-6.708,0-10.061,0c-0.573,0-0.831-0.164-0.824-0.523
										c0.006-0.352,0.236-0.494,0.803-0.494c3.754,0,7.508,0.004,11.261-0.008c0.185,0,0.418-0.07,0.545-0.193
										c1.18-1.154,2.346-2.324,3.501-3.502c0.118-0.121,0.2-0.332,0.202-0.502c0.017-1.34,0.01-2.682,0.009-4.023
										c0-0.111-0.015-0.223-0.022-0.334c-6.144,0-12.251,0-18.373,0c0,8.107,0,16.188,0,24.279c6.138,0,12.254,0,18.383,0
										C20.868,26.334,20.868,23.41,20.868,20.365z M16.282,21.395c-0.066-0.113-0.161-0.328-0.303-0.504
										c-0.168-0.209-0.411-0.363-0.562-0.582c-0.469-0.68-1.082-0.734-1.829-0.566c-0.413,0.092-0.77,0.199-0.997,0.559
										c-0.791,1.238-1.29,2.596-1.609,4.023c-0.057,0.252,0.364,0.648,0.615,0.594c1.379-0.303,2.687-0.797,3.892-1.535
										c0.229-0.141,0.48-0.363,0.564-0.604C16.191,22.387,16.199,21.949,16.282,21.395z"/>
									<path fill="#FFFFFF" d="M30.854,9.252c-0.024,0.625-0.188,1.219-0.608,1.705c-0.337,0.389-0.702,0.756-1.08,1.105
										c-0.337,0.314-0.784,0.307-1.115-0.021c-1.402-1.387-2.798-2.781-4.186-4.184c-0.354-0.357-0.342-0.807,0.006-1.174
										c0.293-0.309,0.593-0.611,0.904-0.9c1.077-0.998,2.723-0.984,3.783,0.037c0.511,0.49,1.006,0.998,1.504,1.504
										C30.587,7.855,30.823,8.506,30.854,9.252z"/>
									<path fill="#FFFFFF" d="M11.606,8.883c-2.076,0-4.153,0-6.229,0c-0.117,0-0.233,0.006-0.349-0.006
										C4.743,8.85,4.579,8.684,4.563,8.402C4.548,8.115,4.717,7.945,4.984,7.881c0.11-0.025,0.23-0.012,0.347-0.012
										c4.192,0,8.385,0,12.577,0c0.128,0.002,0.263-0.01,0.384,0.025c0.253,0.07,0.387,0.252,0.366,0.52
										c-0.02,0.266-0.167,0.428-0.435,0.461c-0.114,0.016-0.231,0.008-0.348,0.008C15.786,8.883,13.696,8.883,11.606,8.883z"/>
									<path fill="#FFFFFF" d="M11.603,11.736c-2.09,0-4.18,0-6.27,0c-0.116,0-0.235,0.014-0.347-0.01
										c-0.273-0.059-0.475-0.248-0.408-0.514c0.045-0.184,0.251-0.342,0.417-0.473c0.073-0.057,0.225-0.016,0.341-0.016
										c4.192-0.002,8.385-0.002,12.577,0c0.104,0,0.208-0.008,0.309,0.008c0.283,0.041,0.437,0.213,0.438,0.498
										c0.001,0.289-0.16,0.455-0.44,0.498c-0.113,0.018-0.231,0.008-0.348,0.008C15.782,11.736,13.692,11.736,11.603,11.736z"/>
									<path fill="#FFFFFF" d="M7.443,20.279c-0.748,0-1.494,0.004-2.241-0.002c-0.417-0.002-0.641-0.184-0.644-0.5
										c-0.002-0.314,0.234-0.516,0.635-0.518c1.507-0.004,3.014-0.004,4.521,0c0.402,0.002,0.638,0.197,0.642,0.51
										c0.004,0.32-0.217,0.506-0.633,0.508C8.963,20.283,8.203,20.279,7.443,20.279z"/>
								</g>
								</svg></br>DÉMARCHES </br> EN LIGNE </a></div>

								<div class="col-md-4 col-xs-4"> <a href="">
								<svg version="1.1" id="card" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
									 width="31.622px" height="31.622px" viewBox="0 0 31.622 31.622" enable-background="new 0 0 31.622 31.622" xml:space="preserve">
								<g>
									<g>
										<path fill="#FFFFFF" d="M26.988,10.505h0.171L25.88,5.559c-0.342-1.45-1.876-2.303-3.241-1.877L3.701,8.714
											c-1.448,0.34-2.302,1.876-1.876,3.241l1.622,6.142v-3.668c0-2.216,1.79-4.007,4.009-4.007h19.532V10.505z M26.988,10.505"/>
									</g>
									<path fill="#FFFFFF" d="M26.988,11.87H7.37c-1.45,0-2.645,1.194-2.645,2.644v12.454c0,1.45,1.194,2.644,2.645,2.644h19.618
										c1.45,0,2.644-1.195,2.644-2.644V14.514C29.634,13.063,28.438,11.87,26.988,11.87L26.988,11.87z M27.842,26.968
										c0,0.511-0.426,0.854-0.852,0.854H7.37c-0.512,0-0.852-0.428-0.852-0.854v-3.155h21.408v3.155H27.842z M27.842,17.669H6.519v-3.155
										c0-0.511,0.426-0.852,0.852-0.852h19.618c0.514,0,0.854,0.425,0.854,0.852V17.669z M27.842,17.669"/>
								</g>
								</svg></br>CARTE + </a></div>

								<div class="col-md-4 col-xs-4"> <a href="">
									<svg version="1.1" id="plate" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
										 width="31.622px" height="31.622px" viewBox="0 0 31.622 31.622" enable-background="new 0 0 31.622 31.622" xml:space="preserve">
									<g>
										<path fill="#FFFFFF" d="M31.225,10.331c-0.069,2.119-0.162,3.712-0.165,5.306c-0.006,2.498,0.048,4.996,0.076,7.493
											c0.002,0.146,0.01,0.292,0.005,0.436c-0.026,0.677-0.297,0.904-0.968,0.821c-0.527-0.066-0.707-0.288-0.684-0.872
											c0.064-1.622,0.14-3.243,0.2-4.864c0.029-0.788,0.082-1.581,0.041-2.365c-0.051-0.943-0.218-1.878-0.285-2.82
											c-0.161-2.214-0.044-4.417,0.42-6.589c0.084-0.393,0.343-0.764,0.584-1.101c0.089-0.125,0.39-0.208,0.532-0.152
											c0.126,0.05,0.23,0.318,0.233,0.491C31.232,7.694,31.225,9.274,31.225,10.331z"/>
										<path fill="#FFFFFF" d="M1.082,9.937c0.068-1.367,0.134-2.733,0.202-4.1c0.03,0,0.059,0,0.089,0
											c0.053,1.355,0.106,2.711,0.159,4.067C1.595,9.907,1.66,9.911,1.725,9.915c0.016-0.444,0.032-0.887,0.048-1.332
											c0.018-0.486,0.042-0.972,0.051-1.458c0.008-0.469,0.001-0.938,0.001-1.408c0.039-0.001,0.076-0.002,0.115-0.002
											C2.018,7.121,2.094,8.528,2.17,9.936c0.059,0,0.117-0.001,0.176-0.001c0-1.392,0-2.784,0-4.176c0.046,0,0.091-0.001,0.136-0.002
											c0.214,1.651,0.495,3.302,0.343,4.972c-0.039,0.414-0.346,0.828-0.604,1.188c-0.227,0.316-0.325,0.589-0.279,0.995
											c0.086,0.779,0.06,1.569,0.09,2.355c0.095,2.4,0.192,4.8,0.293,7.2c0.016,0.391,0.118,0.785,0.069,1.165
											C2.319,24.221,1.972,24.466,1.47,24.4c-0.436-0.058-0.828-0.594-0.792-1.073c0.09-1.194,0.195-2.388,0.26-3.583
											c0.101-1.852,0.174-3.705,0.262-5.559c0.023-0.495,0.1-0.993,0.073-1.486c-0.015-0.264-0.144-0.566-0.317-0.769
											c-0.378-0.44-0.583-0.92-0.558-1.495c0.065-1.562,0.136-3.123,0.204-4.684c0.073,0,0.146,0,0.219,0c0,1.388,0,2.775,0,4.163
											C0.907,9.923,0.995,9.93,1.082,9.937z"/>
										<circle fill="#FFFFFF" cx="16.034" cy="15.497" r="7.524"/>
										<circle fill="none" stroke="#FFFFFF" stroke-miterlimit="10" cx="16.034" cy="15.063" r="10.924"/>
									</g>
									</svg></br>MENUS </a></div>

							<div class="col-md-4 col-xs-4"> <a href="">
								<svg version="1.1" id="shovel" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
									 width="31.622px" height="31.622px" viewBox="0 0 31.622 31.622" enable-background="new 0 0 31.622 31.622" xml:space="preserve">
								<path fill="#FFFFFF" d="M25.233,17.758l-2.063,2.063l-8.125-8.625l-1-5.875l-3.375-3.875L2.421,9.57l4.25,3.875l5,0.125l8.625,9.5
									l-2.75,2.5c0,0,5.5,7,12.125,4.75C31.796,24.195,25.233,17.758,25.233,17.758z M10.546,11.445l-3.5-0.25l-1.5-1.375l5.25-5.5
									l1.25,1.25l0.625,3.625L10.546,11.445z"/>
								</svg></br>PLU </a></div>

							<div class="col-md-4 col-xs-4"> <a href="">
								<svg version="1.1" id="bin" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
									 width="31.622px" height="31.622px" viewBox="0 0 31.622 31.622" enable-background="new 0 0 31.622 31.622" xml:space="preserve">
								<g>
									<path fill="#FFFFFF" d="M14.066,30.164c1.885-3.193-0.559-6.76-4.373-5.867c0-5.249,0-10.479,0-15.821
										c-1.024,0-1.973-0.007-2.92,0.003C6.307,8.483,5.819,8.45,5.806,7.868C5.791,7.229,6.308,7.191,6.801,7.191
										c5.651,0.001,11.302-0.007,16.953,0.019c0.319,0.001,0.638,0.277,0.957,0.425c-0.151,0.278-0.315,0.55-0.45,0.836
										c-0.086,0.184-0.172,0.385-0.187,0.583c-0.443,6.179-0.878,12.357-1.316,18.537c-0.038,0.543-0.081,1.088-0.136,1.631
										c-0.101,0.988-0.833,1.703-1.809,1.621C18.591,30.656,16.375,30.4,14.066,30.164z"/>
									<path fill="#FFFFFF" d="M23.808,5.021c0.468,0,0.926-0.085,1.328,0.028c0.293,0.083,0.511,0.428,0.762,0.656
										c-0.264,0.204-0.524,0.58-0.793,0.585c-2.428,0.045-4.856,0.026-7.285,0.026c-2.564,0-5.13-0.002-7.694-0.001
										c-0.438,0-0.947,0.07-1.05-0.511C8.974,5.23,9.389,5.078,9.871,4.998c0.143-0.023,0.291-0.208,0.372-0.355
										c0.132-0.236,0.206-0.504,0.311-0.755c0.653-1.578,1.062-1.787,2.742-1.615c2.713,0.277,5.429,0.523,8.146,0.752
										C22.981,3.155,23.398,3.463,23.808,5.021z"/>
									<path fill="#FFFFFF" d="M11.028,30.738c-1.614,0.004-2.852-1.217-2.858-2.818c-0.007-1.596,1.238-2.883,2.802-2.898
										c1.619-0.016,2.918,1.264,2.922,2.881C13.897,29.471,12.624,30.732,11.028,30.738z M12.575,27.895
										c0.005-0.826-0.736-1.564-1.569-1.563c-0.803,0.004-1.501,0.695-1.521,1.508c-0.022,0.873,0.644,1.572,1.509,1.586
										C11.845,29.438,12.571,28.736,12.575,27.895z"/>
								</g>
								</svg></br>DÉCHETS </a></div>

							<div class="col-md-4 col-xs-4"> <a href=""><svg version="1.1" id="balloon" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
												 width="31.622px" height="31.622px" viewBox="0 0 31.622 31.622" enable-background="new 0 0 31.622 31.622" xml:space="preserve">
											<g>
												<g>
													<path fill="#FFFFFF" d="M11.828,19.514c0,0-6.723-6.946-6.723-10.936c0-3.99,2.586-7.904,6.871-8.126s6.723,4.507,6.723,8.126
														C18.698,12.199,11.828,19.514,11.828,19.514z"/>
													<path fill="#FFFFFF" d="M11.828,19.957c-0.121,0-0.235-0.049-0.319-0.137c-0.28-0.289-6.847-7.122-6.847-11.242
														c0-3.971,2.556-8.324,7.292-8.569C12.057,0.003,12.162,0,12.265,0c4.487,0,6.877,4.981,6.877,8.578
														c0,3.752-6.706,10.936-6.991,11.238c-0.083,0.088-0.198,0.139-0.319,0.141C11.83,19.957,11.828,19.957,11.828,19.957z
														 M12.265,0.887c-0.087,0-0.177,0.003-0.267,0.007c-4.189,0.218-6.45,4.121-6.45,7.685c0,3.279,4.949,8.85,6.275,10.281
														c1.339-1.48,6.432-7.31,6.432-10.281C18.255,5.354,16.173,0.887,12.265,0.887z"/>
												</g>
												<g>
													<path fill="#FFFFFF" stroke="#FFFFFF" stroke-linejoin="round" stroke-miterlimit="10" d="M26.53,10.647
														c0-3.621-2.439-8.348-6.725-8.126c-0.361,0.019-0.707,0.073-1.047,0.142c1.127,1.849,1.713,4.043,1.713,5.915
														c0,2.543-2.332,6.074-4.407,8.715c1.755,2.383,3.595,4.289,3.595,4.289S26.53,14.268,26.53,10.647z"/>
												</g>
												<path class="balloon-queue" fill="none" stroke="#FFFFFF" stroke-linecap="round" stroke-miterlimit="10" d="M11.865,20.768c0,0-0.277,1.746,1.607,3.381
													s1.523,3.24,0.388,4.654"/>
												<path class="balloon-queue" fill="none" stroke="#FFFFFF" stroke-linecap="round" stroke-miterlimit="10" d="M19.649,22.791c0,0-0.277,1.744,1.607,3.379
													c1.883,1.635,1.523,3.242,0.387,4.654"/>
											</g>
											</svg></br>LOUER </br> UNE SALLE </a></div>

								<div class="col-md-4 col-xs-4"> <a href="">
									<svg version="1.1" id="cinema" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
										 width="31.622px" height="31.622px" viewBox="0 0 31.622 31.622" enable-background="new 0 0 31.622 31.622" xml:space="preserve">
									<g>
										<g>
											<path fill="#FFFFFF" d="M31.136,13.894l-1.492-2.13c-0.008,0.006-0.018,0.013-0.025,0.019c-1.689,1.184-4.018,0.773-5.201-0.916
												c-1.184-1.689-0.773-4.018,0.916-5.201c0.01-0.006,0.02-0.012,0.027-0.019l-1.49-2.13c-0.361-0.513-1.068-0.637-1.582-0.278
												l-5.901,4.134l1.292,1.844l-1.4,0.98l-1.292-1.844L0.764,18.318c-0.514,0.359-0.639,1.066-0.278,1.58l7.269,10.375
												c0.358,0.514,1.066,0.639,1.578,0.279l14.223-9.965l-1.275-1.82l1.4-0.98l1.275,1.82l5.902-4.133
												C31.37,15.114,31.495,14.407,31.136,13.894L31.136,13.894z M17.274,11.553l1.4-0.98l1.676,2.393l-1.4,0.98L17.274,11.553z
												 M21.378,17.479l-1.547-2.208l1.4-0.98l1.547,2.207L21.378,17.479z M21.378,17.479"/>
										</g>
									</g>
									</svg></br>CINEMAS</br>7<sup>e</sup> ART </a></div>

							<div class="col-md-4 col-xs-4"> <a href="">
								<svg version="1.1" id="pool" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
									 width="31.622px" height="31.622px" viewBox="0 0 31.622 31.622" enable-background="new 0 0 31.622 31.622" xml:space="preserve">
								<g>
									<path fill="#FFFFFF" d="M29.783,10.974h-1.382l0.034-0.175c0-2.611-2.125-4.733-4.733-4.733c-0.808,0-1.56,0.223-2.225,0.583
										c-0.664-0.36-1.416-0.583-2.226-0.583c-2.606,0-4.732,2.122-4.732,4.733v0.175H2.189c-0.242,0-0.442,0.199-0.442,0.443v15.02
										c0,0.249,0.2,0.447,0.442,0.447h27.594c0.248,0,0.448-0.198,0.448-0.447v-15.02C30.231,11.173,30.031,10.974,29.783,10.974
										L29.783,10.974z M23.702,7.402c1.874,0,3.399,1.525,3.399,3.397l0.034,0.175h-3.185l0.034-0.175c0-1.251-0.5-2.381-1.291-3.224
										C23.017,7.471,23.352,7.402,23.702,7.402L23.702,7.402z M19.252,7.402c0.354,0,0.688,0.069,1.01,0.173
										c-0.183,0.191-0.353,0.395-0.501,0.618h-2.654C17.692,7.706,18.432,7.402,19.252,7.402L19.252,7.402z M16.341,9.083h2.964
										c-0.156,0.4-0.244,0.827-0.287,1.269h-3.115C15.963,9.892,16.115,9.465,16.341,9.083L16.341,9.083z M20.31,10.799
										c0-1.017,0.46-1.92,1.168-2.546c0.713,0.626,1.174,1.53,1.174,2.546l0.034,0.175h-2.381v-0.175H20.31z M15.859,13.916h3.11v1.778
										h-3.11V13.916z M15.859,13.024v-1.16h3.11v1.16H15.859z M14.52,11.864v6.719c0.444-0.069,0.887-0.144,1.34-0.222v-1.776h3.11v1.277
										c0.448-0.07,0.896-0.14,1.34-0.196v-5.802h9.03v6.827c-7.728-1.981-20.943,3.621-26.701,0.393v-7.22H14.52z M14.52,11.864"/>
								</g>
								</svg></br>PISCINE </a></div>

							
							<div class="col-md-4 col-xs-4"> <a href="">
								<svg version="1.1" id="bus" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
									 width="53.684px" height="31.622px" viewBox="0 0 53.684 31.622" enable-background="new 0 0 53.684 31.622" xml:space="preserve">
								<g>
									<path fill="#FFFFFF" d="M50.306,12.618c0.287,2.033,0.57,4.043,0.857,6.051c0.152,1.061,0.326,2.119,0.473,3.18
										c0.148,1.051-0.49,1.836-1.553,1.873c-0.93,0.033-1.861,0.008-2.889,0.008c0-1.721,0-3.385,0-5.166
										c0.775,0,1.527-0.014,2.279,0.006c0.781,0.018,1.043-0.332,0.938-1.098c-0.281-2.021-0.535-4.045-0.773-6.072
										c-0.17-1.428-1.26-0.832-2.016-0.928c-0.83-0.107-0.947,0.434-0.943,1.111c0.014,3.635,0.006,7.27,0.006,10.904
										c0,0.371,0,0.744,0,1.18c-1.195,0-2.281,0-3.365,0c-0.242-2.525-1.18-3.6-3.031-3.506c-1.65,0.086-2.572,1.33-2.572,3.512
										c-4.65,0-9.303,0-14.066,0c0-2.807,0-5.559,0-8.379c-1.305,0-2.5,0-3.846,0c0,2.773,0,5.555,0,8.383c-1.45,0-2.751,0-4.142,0
										c0.043-1.137-0.054-2.285-1.104-2.93c-0.554-0.34-1.281-0.557-1.928-0.551c-1.58,0.012-2.426,1.225-2.529,3.463
										c-0.257,0.023-0.522,0.068-0.788,0.068c-2.25,0.006-4.5,0.012-6.75,0c-1.17-0.008-1.717-0.531-1.774-1.688
										c-0.175-3.525-0.348-7.051-0.501-10.576c-0.056-1.268,0.524-1.879,1.782-1.879c15.403-0.006,30.807,0,46.211-0.01
										c0.771,0,1.479,0.219,1.635,0.975c0.162,0.775,0.613,0.955,1.238,1.119c1.621,0.422,1.617,0.436,1.617,2.129
										c0,0.52,0.037,1.043-0.02,1.557c-0.023,0.219-0.242,0.418-0.373,0.625c-0.162-0.215-0.412-0.41-0.465-0.646
										c-0.078-0.365-0.021-0.758-0.021-1.139C51.892,12.808,51.892,12.808,50.306,12.618z M5.749,10.407c-0.83,0-1.661,0.016-2.491-0.006
										c-0.605-0.014-0.91,0.258-0.914,0.855c-0.007,0.865-0.074,1.74,0.038,2.59c0.041,0.311,0.509,0.793,0.801,0.807
										c1.691,0.076,3.389,0.039,5.084,0.037c0.606,0,0.865-0.322,0.857-0.916c-0.013-0.83-0.009-1.66-0.002-2.49
										c0.004-0.6-0.268-0.891-0.882-0.881C7.41,10.419,6.579,10.407,5.749,10.407z M42.669,10.407c-0.795,0-1.59,0.021-2.385-0.008
										c-0.686-0.023-1.043,0.223-1.021,0.951c0.021,0.795,0.023,1.592,0,2.385c-0.023,0.73,0.348,0.979,1.021,0.965
										c0.865-0.018,1.729,0.012,2.594-0.006c3.684-0.076,3.09,0.67,3.143-3.293c0.002-0.035-0.002-0.07,0-0.105
										c0.016-0.662-0.316-0.92-0.967-0.896C44.261,10.429,43.464,10.407,42.669,10.407z M35.332,10.407
										c-4.057,0.102-3.365-0.762-3.438,3.295c0,0.035,0.002,0.068,0.002,0.104c-0.006,0.594,0.273,0.893,0.881,0.891
										c1.656-0.008,3.314-0.006,4.971-0.002c0.59,0,0.898-0.26,0.891-0.873c-0.01-0.828-0.014-1.658,0.002-2.486
										c0.014-0.648-0.258-0.953-0.926-0.934C36.921,10.427,36.126,10.407,35.332,10.407z M27.904,10.407
										c-0.827,0-1.656,0.014-2.484-0.004c-0.596-0.014-0.907,0.225-0.9,0.846c0.01,0.863,0.015,1.725-0.001,2.588
										c-0.011,0.629,0.316,0.859,0.898,0.857c1.656-0.004,3.313-0.006,4.969,0c0.623,0.004,0.852-0.314,0.838-0.908
										c-0.018-0.828-0.023-1.656,0.002-2.484c0.02-0.676-0.291-0.924-0.941-0.9C29.492,10.427,28.699,10.407,27.904,10.407z
										 M20.557,10.407c-3.568,0-3.568,0-3.408,3.305c0.002,0.033,0.002,0.068,0.001,0.104c-0.027,0.609,0.272,0.883,0.874,0.881
										c1.657-0.008,3.314-0.006,4.972-0.004c0.595,0.002,0.895-0.279,0.891-0.883c-0.005-0.828-0.008-1.656,0.002-2.486
										c0.008-0.65-0.292-0.939-0.949-0.922C22.146,10.425,21.351,10.407,20.557,10.407z M13.092,10.407c-0.794,0-1.589,0.02-2.383-0.006
										c-0.638-0.02-0.979,0.209-0.963,0.893c0.019,0.828,0.021,1.656-0.001,2.484c-0.018,0.678,0.322,0.922,0.953,0.918
										c1.623-0.008,3.246-0.01,4.869,0.002c0.664,0.004,0.932-0.322,0.921-0.957c-0.012-0.795-0.018-1.59,0.002-2.383
										c0.018-0.719-0.321-0.986-1.016-0.959C14.682,10.431,13.886,10.407,13.092,10.407z"/>
									<path fill="#FFFFFF" d="M23.158,23.696c-1.006,0-1.898,0-2.87,0c0-2.668,0-5.299,0-7.967c0.981,0,1.896,0,2.87,0
										C23.158,18.39,23.158,20.993,23.158,23.696z"/>
									<path fill="#FFFFFF" d="M10.558,22.95c-0.009-1.371,1.054-2.432,2.42-2.414c1.287,0.016,2.351,1.123,2.325,2.42
										c-0.025,1.301-1.09,2.348-2.397,2.357C11.586,25.323,10.565,24.296,10.558,22.95z"/>
									<path fill="#FFFFFF" d="M40.46,20.575c1.338-0.014,2.352,0.988,2.363,2.334s-0.992,2.389-2.311,2.402
										c-1.307,0.016-2.369-1.029-2.387-2.348C38.107,21.646,39.14,20.589,40.46,20.575z"/>
								</g>
								</svg></br>TRANSPORT </a></div>
							
						
					</div>
								<aside class="col-md-3 col-xs-12">
									<div> 
									<?php $lebarp_group = get_post_meta( get_the_ID(), '_le_barp_group_demo', true ); ?>

										<ul>
											<?php foreach ( $lebarp_group as $value ) { ?>

												<li>
													<h1 class="side_title"><?php echo $value['title'] ?></h1>
													<a href="<?php echo $value['file_link'] ?>" target="_blank" class="side_link"><?php echo $value['description'] ?></a>
														<?php } ?>

												</li>
										</ul>
									</div>
								</aside>

				</div>

			</div>

<?php get_footer(); ?>
