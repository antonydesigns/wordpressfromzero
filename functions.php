<?php
/* 
Theme functions

@package CryptoExplainer
*/

// Theme classes and autoloader

require_once(get_template_directory() . "./inc/helpers/autoloader.php");
require_once(get_template_directory() . "./a-user-defined-vars.php");

use CryptoExplainer\Inc\Classes as Classes;

// Load the Theme, styles and scripts

function instantiate_theme()
{
    Classes\ThemeControl::instantiate();
}

instantiate_theme();

// Functions

/**
 * Custom template tags for the theme.
 * Referenced from Imran Sayed
 *
 * @package CryptoExplainer
 */

/**
 * Gets the thumbnail with Lazy Load.
 * Should be called in the WordPress Loop.
 *
 * @param int|null $post_id               Post ID.
 * @param string   $size                  The registered image size.
 * @param array    $additional_attributes Additional attributes.
 *
 * @return string
 */
function get_the_post_custom_thumbnail($post_id, $size = 'featured-thumbnail', $additional_attributes = [])
{
    $custom_thumbnail = '';

    if (null === $post_id) {
        $post_id = get_the_ID();
    }

    if (has_post_thumbnail($post_id)) {
        $default_attributes = [
            'loading' => 'lazy'
        ];

        $attributes = array_merge($additional_attributes, $default_attributes);

        $custom_thumbnail = wp_get_attachment_image(
            get_post_thumbnail_id($post_id),
            $size,
            false,
            $attributes
        );
    }

    return $custom_thumbnail;
}

/**
 * Renders Custom Thumbnail with Lazy Load.
 *
 * @param int    $post_id               Post ID.
 * @param string $size                  The registered image size.
 * @param array  $additional_attributes Additional attributes.
 */
function the_post_custom_thumbnail($post_id, $size = 'featured-thumbnail', $additional_attributes = [])
{
    echo get_the_post_custom_thumbnail($post_id, $size, $additional_attributes);
}

/**
 * Prints array with meta information for the current post-date/time.
 *
 * @return void
 */
function cryptoexplainer_post_time(): array
{

    $year                        = get_the_date('Y');
    $month                       = get_the_date('n');
    $day                         = get_the_date('j');
    $post_date_archive_permalink = get_day_link($year, $month, $day);
    $post_date = [
        'datetime_attr' => esc_attr(get_the_date(DATE_W3C)),
        'datetime_val' => esc_attr(get_the_date()),
        'updated_datetime_attr' => esc_attr(get_the_modified_date(DATE_W3C)),
        'updated_datetime_val' => esc_attr(get_the_modified_date()),
        'date_archive_permalink' => esc_url($post_date_archive_permalink)
    ];

    // HTML should be 
    // Timestring : <time  datetime="{{ $datetime_attr }}"> {{ $datetime_val }} </time>  
    // Hyperlink: <a href="{{ $date_archive_permalink }}"  ></ Timestring></a>
    // Span: <span> </ Hyperlink> </span>

    return $post_date;
}

/**
 * Prints HTML with meta information for the current author.
 *
 * @return void
 */
function cryptoexplainer_post_author()
{
    $post_author = [
        'author_url' => esc_url(get_author_posts_url(get_the_author_meta('ID'))),
        'author_name' => esc_html(get_the_author())
    ];

    /*     $byline = sprintf(
        esc_html_x(' by %s', 'post author', 'cryptoexplainer'),
        '<span class="author vcard"><a href="' . esc_url(get_author_posts_url(get_the_author_meta('ID'))) . '">' . esc_html(get_the_author()) . '</a></span>'
    ); */

    return $post_author;
}


function get_cryptoexplainer_title($trim_character_count = null)
{
    $post_ID = get_the_ID();

    $title = wp_html_excerpt(get_the_title($post_ID), $trim_character_count, '...');

    if (empty($post_ID)) {
        return null;
    }

    if ($trim_character_count = null) {

        return $title;
    }

    return $title;
}

/**
 * Get the trimmed version of post excerpt.
 *
 * This is for modifing manually entered excerpts,
 * NOT automatic ones WordPress will grab from the content.
 *
 * It will display the first given characters ( e.g. 100 ) characters of a manually entered excerpt,
 * but instead of ending on the nth( e.g. 100th ) character,
 * it will truncate after the closest word.
 *
 * @param int $trim_character_count Charter count to be trimmed
 *
 * @return bool|string
 */
function get_cryptoexplainer_excerpt($trim_character_count = null)
{
    $post_ID = get_the_ID();

    $excerpt = wp_html_excerpt(get_the_excerpt($post_ID), $trim_character_count, '...');

    if (empty($post_ID)) {
        return null;
    }

    if (has_excerpt() || $trim_character_count = null) {

        return $excerpt;
    }

    return $excerpt;
}

/**
 * Filter the "read more" excerpt string link to the post.
 *
 * @param string $more "Read more" excerpt string.
 *
 * @return string (Maybe) modified "read more" excerpt string.
 */
function cryptoexplainer_excerpt_more($more = '')
{

    if (!is_single()) {
        $more = sprintf(
            '<a class="read-more" href="%1$s">%2$s</a>',
            get_permalink(get_the_ID()),
            __('Read more', 'cryptoexplainer')
        );
    }

    return $more;
}
