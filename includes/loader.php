<?php

//function for meta box citation
function citacion_meta_box()
{
    add_meta_box(
        'citacion-meta-box',
        'Citacion',
        'wpcitacion_meta_box_callback'
    );
}

//add wysiwyg editor in meta box Citation
function wpcitacion_meta_box_callback($post)
{
    $text = get_post_meta($post->ID, 'CITACION_METANAME', true);
    wp_editor($text, 'CITACION_ID', $settings = array('textarea_name' => 'Citacion'));
}

//creation function of shortcode
function ShortCodeCitation($attr)
{
    $args = shortcode_atts(array(

        'post_id' => '',

    ), $attr);

    if ($args['post_id']) {
        $data = get_post_meta($args['post_id'], 'CITACION_METANAME', true);
        return $data;
    } else {
        $data = get_post_meta(get_the_ID(), 'CITACION_METANAME', true);
        return $data;
    }
}
