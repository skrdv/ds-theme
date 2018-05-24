<?php
//Template Name: ACF-FORM

acf_form_head();
get_header();
?>

<main role="main">

<?php
	$args = array(
    'post_id' => 'new_post',
    'new_post' => array(
        'post_type' => 'post',
        'post_status' => 'publish',
    ),
    'post_title' => true,
    'submit_value' => 'Upload Article',
    'updated_message' => 'Article sent successfully',
    'label_placement' => 'left',
	);
	acf_form($args);
?>

</main>

<?php get_footer(); ?>
