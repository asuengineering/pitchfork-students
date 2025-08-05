<?php
/**
 *
 * The default template for displaying single posts.
 * Inspired by a discarded design for Inner Circle that was deemed too complicated for stories of that nature.
 *
 * @package pitchfork
 */


// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
get_header();

$fields = get_fields();

// Occasionally, ACF will return false if there are no values stored in the fields.
// Object not created just yet in the DB? In any case, handle by manually creating empty array.
if (! $fields) {
	$fields = array();
	$fields['studentorg_website_url'] = '';
	$fields['studentorg_email'] = '';
	$fields['studentorg_sundevil_sync'] = '';
	$fields['studentorg_social'] = '';
}
?>

	<article id="skip-to-content post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php while ( have_posts() ) {

		the_post();

		?>

		<header class="entry-header">
			<?php echo get_the_post_thumbnail($post_id, 'full', array( 'class' => 'img-fluid' )); ?>
			<div class="title-lockup">
				<?php the_title( '<h1 class="entry-title article">', '</h1>' ); ?>

				<?php
				if ( $fields['studentorg_website_url'] ) {
					echo '<p class="lead website"><span class="fa-solid fa-globe fa-fw" title="Website:"></span>';
					echo '<a href="' . esc_attr( $fields['studentorg_website_url'] ) . '">' . esc_attr( $fields['studentorg_website_url'] ) . '</a>';
					echo '</p>';
				}

				if ( $fields['studentorg_email'] ) {
					echo '<p class="lead email"><span class="fa-solid fa-envelope fa-fw" title="Email:"></span>';
					echo '<a href="mailto:' . $fields['studentorg_email'] . '">' . $fields['studentorg_email'] . '</a>';
					echo '</p>';
				}

				?>
			</div>
		</header>

		<div class="content-wrap">
			<aside class="secondary">
				<div class="sidebar-wrap">

					<?php
					// Category list as button-tags from the card spec.
					$terms = get_the_terms( $post->ID, 'orgtype' );
					$termlist = '';
					if ( ! empty( $terms ) ) {
						$termlist = '<div class="orgtype-list"><h3><span class="fa-solid fa-tag fa-fw"></span>Categories</h3>';
						$termlist .= '<div class="card-tags">';
						foreach( $terms as $term ) {
							$termlist .= '<span class="badge badge-pill text-bg-gray-2">' . esc_html( $term->name ) . '</span>';
						}
						$termlist .= '</div>';
					}
					echo $termlist;
					?>

					<div class="external-links">

						<?php
						if ( $fields['studentorg_sundevil_sync'] ) {
							?>
							<h3>
							<svg version="1.0" xmlns="http://www.w3.org/2000/svg"
							width="17.5pt" height="25.5pt" viewBox="0 0 312.000000 453.000000"
							preserveAspectRatio="xMidYMid meet">

							<g transform="translate(0.000000,453.000000) scale(0.100000,-0.100000)"
							fill="#000000" stroke="none">
							<path d="M565 4510 c-62 -9 -129 -42 -151 -75 -38 -58 -37 -71 67 -648 54
							-304 102 -572 107 -596 l7 -44 205 -88 c113 -48 208 -88 213 -88 13 -1 7 52
							-38 344 -25 160 -72 466 -105 680 -44 288 -65 401 -80 431 -36 69 -117 100
							-225 84z"/>
							<path d="M1762 4504 c-18 -10 -44 -31 -56 -48 -15 -20 -68 -180 -149 -451 -70
							-231 -174 -577 -232 -769 -58 -193 -102 -353 -98 -357 12 -9 368 -159 380
							-159 6 0 17 24 26 53 8 28 62 210 120 402 210 696 337 1141 337 1180 0 58 -29
							98 -95 130 -73 36 -183 45 -233 19z"/>
							<path d="M2842 3268 c-52 -29 -284 -314 -781 -958 -238 -309 -243 -315 -307
							-346 -78 -38 -170 -44 -235 -16 -119 51 -179 114 -200 207 l-12 53 -56 11
							c-82 16 -238 95 -385 195 -71 47 -130 85 -131 84 -8 -11 -75 -136 -75 -141 0
							-3 47 -28 105 -56 58 -27 140 -74 182 -103 168 -115 328 -310 427 -518 49
							-103 106 -265 106 -299 0 -22 -34 -42 -57 -34 -6 2 -28 52 -48 111 -74 217
							-172 387 -302 523 -128 134 -240 209 -435 289 -42 17 -79 38 -82 47 -4 10 25
							72 75 159 l81 144 56 -41 c186 -135 376 -245 471 -273 111 -33 285 -14 361 39
							52 36 94 120 95 188 l0 49 -585 249 c-322 137 -597 249 -611 249 -14 0 -33 -8
							-41 -17 -21 -26 -427 -797 -444 -845 -30 -84 -14 -133 93 -286 181 -260 407
							-545 574 -724 l99 -106 0 -59 c0 -32 -11 -126 -24 -208 -35 -214 -62 -416 -80
							-600 -9 -88 -19 -177 -21 -197 l-5 -38 628 0 629 0 7 61 c10 96 7 460 -5 654
							-7 112 -7 186 -1 203 5 15 35 63 67 107 136 189 244 477 309 824 20 104 33
							147 57 186 59 98 213 311 364 505 349 449 398 518 402 569 5 54 -16 94 -69
							133 -69 52 -133 60 -196 26z"/>
							<path d="M1975 2996 c-16 -7 -49 -33 -71 -57 -62 -66 -214 -249 -214 -257 0
							-5 17 -16 39 -25 49 -22 66 -59 58 -130 -13 -124 -83 -234 -180 -281 -29 -14
							-87 -31 -129 -38 -75 -12 -77 -13 -71 -38 11 -47 36 -77 90 -110 89 -54 184
							-51 254 7 30 26 495 627 518 672 21 38 9 116 -25 164 -61 86 -189 131 -269 93z"/>
							<path d="M1994 98 c-15 -19 -16 -20 -1 -9 16 12 17 10 17 -28 0 -26 -5 -41
							-12 -41 -22 0 15 -20 38 -20 20 0 54 28 54 45 0 5 -7 0 -15 -11 -15 -20 -17
							-18 -19 35 -1 18 -8 27 -26 31 l-25 7 25 5 c21 4 22 5 4 7 -11 0 -29 -9 -40
							-21z m46 -28 c0 -5 -2 -10 -4 -10 -3 0 -8 5 -11 10 -3 6 -1 10 4 10 6 0 11 -4
							11 -10z m0 -34 c0 -8 6 -17 13 -19 6 -3 0 -6 -15 -6 -21 -1 -25 3 -21 19 6 23
							23 27 23 6z"/>
							<path d="M2071 93 c7 -12 15 -20 18 -17 3 2 -3 12 -13 22 -17 16 -18 16 -5 -5z"/>
							</g>
							</svg>Learn More</h3>

							<p><a class="btn btn-md btn-maroon" href="<?php echo $fields['studentorg_sundevil_sync']; ?>">Sun Devil Sync</a></p>
							<?php
						}
						?>

						<?php
						// Test for anything in the studentorg_social array, then output links if present.

						if (is_array( $fields['studentorg_social'] )) {
							echo '<h3><span class="fa-solid fa-people-arrows fa-fw"></span>Get social</h3>';
							$social_links = '<ul class="social-links">';

							foreach ($fields['studentorg_social'] as $icon) {

								$markup = '<li><a href="' . $icon['studentorg_social_url'] . '">';
								$markup .= $icon['studentorg_social_icon'] . '</a></li>';

								$social_links .= $markup;
							}

							$social_links .= '</ul>';
							echo $social_links;
						}
						?>

					</div>

				</div>
			</aside>

			<section class="content">
				<?php the_content(); ?>
			</section>

		<footer class="entry-footer default-max-width">

			<p class="lead"><a href="<?php echo get_post_type_archive_link( 'studentorg' ); ?>">Back to student org directory</a></p>

		</footer>

		<?php  // Comments template would go here.

	} // end while_have_posts

	echo '</article>';

get_footer();
