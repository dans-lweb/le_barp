			<footer class="footer" role="contentinfo" itemscope itemtype="http://schema.org/WPFooter">

				<div id="inner-footer" class="wrap cf">

					<!-- <nav role="navigation">
						<?php wp_nav_menu(array(
    					'container' => '',                           // enter '' to remove nav container (just make sure .footer-links in _base.scss isn't wrapping)
    					'container_class' => 'footer-links cf',         // class of container (should you choose to use it)
    					'menu' => __( 'Footer Links', 'bonestheme' ),   // nav name
    					'menu_class' => 'nav footer-nav cf',            // adding custom nav class
    					'theme_location' => 'footer-links',             // where it's located in the theme
    					'before' => '',                                 // before the menu
    					'after' => '',                                  // after the menu
    					'link_before' => '',                            // before each link
    					'link_after' => '',                             // after each link
    					'depth' => 0,                                   // limit the depth of the nav
    					'fallback_cb' => 'bones_footer_links_fallback'  // fallback function
						)); ?>
					</nav> -->

					<div class="col-sm-2 col-sm-offset-1  col-xs-6 footer-menu">

						<h6>Votre mairie</h6>
						<ul>
							<li><a href="">Contact</a></li>
							<li><a href="">Services municipaux</a></li>
							<li><a href="">Démarches administratives</a></li>
							<li><a href="">Vos élus</a></li>
							<li><a href="">Conseils municipaux</a></li>
							<li><a href="">Participation citoyenne</a></li>
							<li><a href="">Budget</a></li>
						</ul>
					</div>

					<div class="col-sm-2  col-xs-6 footer-menu">

						<h6>Découvrir Le Barp</h6>
						<ul>
							<li><a href="">Présentation</a></li>
							<li><a href="">Histoire</a></li>
							<li><a href="">Patrimoine</a></li>
							<li><a href="">Temps forts</a></li>
						</ul>

						<h6>Solidarité emploi</h6>
						<ul>
							<li><a href="">Emploi</a></li>
							<li><a href="">Point CAF</a></li>
						</ul>

					</div>

					<div class="col-sm-3 col-xs-6 footer-menu">

						<h6>Vie culturelle & associative</h6>
						<ul>
							<li><a href="">Association</a></li>
							<li><a href="">Bibliothèque</a></li>
						</ul>

						<h6>Enfance jeunesse</h6>
						<ul>
							<li><a href="">Petite Enfance 0-3 ans</a></li>
							<li><a href="">Accueil de loisirs 3-17 ans</a></li>
							<li><a href="">Vie scolaire et périscolaire</a></li>
						</ul>

					</div>

					<div class="col-sm-3 col-xs-6 last-footer-menu">

						<h4> Mairie du Barp</h4>
						<p>37, avenue des Pyrénnées </br>
							33114 Le Barp</br>
							Tél. 05 57 71 90 90</br>
							Fax. 05 57 71 90 99</br>
							Mail : mairie@ville-le-barp.fr
						</p>

						<ul class="social">
							<!-- <li> <a href=""><i class="fa fa-rss"></i> -->
							<li> <a href=""><i class="fa fa-facebook"></i>
							<!-- <li> <a href=""><i class="fa fa-twitter"></i>
							<li> <a href=""><i class="fa fa-dribbble"></i>
							<li> <a href=""><i class="fa fa-pinterest"></i>
							<li> <a href=""><i class="fa fa-linkedin"></i> -->
						</ul>
					</div>

					<div class="clearfix"></div>

					<div class="col-xs-12 last-nav">
						<ul>
							<li><a href="">Contact</a>
							<li><a href="">Plan du site</a>
							<li><a href="">Mentions légales</a>
							<li><a href="">Accessibilité</a>
						</ul>
					</div>
					<div class="clearfix"></div>
							

				</div>

			</footer>

				<div class="col-sm-12">
					<p class="source-org copyright">2016 - Création : <a href="">Agence ComTogether</a></p>
				</div>
		</div>

		<?php // all js scripts are loaded in library/bones.php ?>
		<?php wp_footer(); ?>

	</body>

</html> <!-- end of site. what a ride! -->
