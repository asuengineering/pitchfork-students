<?php
/**
 * Search & Filter Pro
 *
 * Results Template - students.engineering, Student Org Directory
 *
 * @package   Search_Filter
 * @author    Steve Ryan
 * @link      https://github.com/asuengineering/pitchfork-students
 *
 * For more customisation see the WordPress docs
 * and using template tags - http://codex.wordpress.org/Template_Tags
 */

// If this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
if ( $query->have_posts() ) {
	?>
	<div class="result-orgs">
	<div class="alert alert-info" role="alert">
		<div class="alert-icon">
            <span title="Information" class="fa fa-icon fa-info-circle"></span>
        </div>
        <div class="alert-content">
            <p style="margin-bottom:0px;">There are <?php echo $query->found_posts; ?> organizations that match your query.</p>
        </div>
    </div>

	<?php

	while ( $query->have_posts() ) {

		$query->the_post();

		?>
		<div class="result-org">

			<?php
				if ( has_post_thumbnail() ) {
					the_post_thumbnail( 'medium', array( 'class' => 'result-org-thumbnail img-fluid' ) );
				}
			?>

			<h3 class="result-org-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>

			<div class="result-org-excerpt"><?php the_excerpt(); ?></div>

			<?php
				$orgtypes = get_the_terms( $query->ID, 'orgtype' );
				do_action('qm/debug', $orgtypes);

				if ( $orgtypes && ! is_wp_error( $orgtypes ) ) {
					$orgbadges = '';
					foreach ( $orgtypes as $orgtype ) {
						$orgbadges .= '<span class="badge text-bg-gray-2">' . $orgtype->name . '</span>';
					}

					echo '<div class="result-org-badges">' . $orgbadges . '</div>';
				}
			?>

		</div>
		<?php
	}
	echo '</div>'; // Closes results wrap.
} else {
	echo 'No Results Found';
}
?>
