<?php
/**
 * Homepage functions.
 *
 * @package MediaSphere
 */

function ms_homepage() {

	echo ms_top_menu();

	echo ms_featured();

	echo ms_categories();

	echo ms_search();

	echo ms_social_network();

}

/**
*
* Menu top
*
* Show top menu
*
**/
function ms_top_menu( ) {
	echo'<!-- Head Menu  -->';

	echo'<!-- END Head Menu  -->';
}

function ms_featured( ) {

	echo'<!-- Featured  -->';
	?>
	<section id="ms_featured">
		<h2 class="ms_title">A la une</h2>
		<div class="clear">
			<div class="ms_featured_section ">
				<figure>
					<img src="http://www.mairie-villetaneuse.fr/images/villetaneuse/actus/2014_10/cap_quartiers.jpg" alt="">
					<figcaption>Proposition pour le thème</figcaption>
				</figure>
			</div>
		</div>
	</section>
	<?php
	echo '<!-- Featured  -->';
}


function ms_categories( ) {

	echo'<!-- Categories  -->';
	?>
	<section id="ms_categories">
		<h2 class="ms_title">Catégories</h2>
		<div class="clear">
			<a href="" title="" class="redBG">Catégorie 1</a>
			<a href="" title="" class="redBG">Catégorie 2</a>
			<a href="" title="" class="redBG">Catégorie 3</a>
			<a href="" title="" class="redBG">Catégorie 4</a>
			<a href="" title="" class="redBG">Catégorie 5</a>
			<a href="" title="" class="redBG">Catégorie 6</a>
		</div>
	</section>

	<?php
	echo'<!-- END Categories  -->';
}


function ms_search( ) {
	echo'<!-- Categories  -->';

	echo'<!-- END Categories  -->';

}

function ms_social_network( ) {
	echo'<!-- Categories  -->';

	echo'<!-- END Categories  -->';

}