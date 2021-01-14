<?php

/**
 * Wrapper function for PHP's print_r() function
 * Prints arrays in a nice readable format
 *
 * @param mixed $var
 *
 */
function pr($var)
{
    echo "<pre>";
    print_r($var);
    echo "</pre><style> pre {display: block; padding: 9.5px; margin: 0 0 10px; font-size: 13px; line-height: 1.42857143; color: #333; word-break: break-all; word-wrap: break-word; background-color: #f5f5f5; border: 1px solid #ccc; border-radius: 4px;}</style>";
}

/**
 * Helper function for displaying ACF Flexible Content fields.
 *
 * @param array $contents
 *
 */
function flexible_content($contents = null)
{
    if ($contents === null) {
        $contents = get_field('content');
    }

    if ($contents) {
        foreach ($contents as $content) {
            include locate_template('flexible-content/' . str_replace('_', '-', $content['acf_fc_layout']) . '.php');
        }
    }

}

/**
 * Character limiter function, does not break the words at the end of the sentence
 *
 * @param string $str
 * @param int $n
 * @param string $end_char
 *
 * @return string
 *
 */
function character_limiter($str, $n = 500, $end_char = '...')
{
    if (strlen($str) < $n) {
        return $str;
    }
    $str = preg_replace("/\s+/", ' ', preg_replace("/(\r\n|\r|\n)/", " ", $str));
    if (strlen($str) <= $n) {
        return $str;
    }
    $out = "";
    foreach (explode(' ', trim($str)) as $val) {
        $out .= $val . ' ';
        if (strlen($out) >= $n) {
            return trim($out) . $end_char;
        }
    }
}

/**
 * Helper function to get the top parent page based on a post ID.
 *
 * @param int $id
 *
 * @return int
 *
 */
function get_top_parent_page_id($id)
{
    $post = get_post($id);
    $ancestors = $post->ancestors;
    if ($ancestors) {
        return end($ancestors);
    } else {
        return $post->ID;
    }
}

/**
 * Get a <picture> image with normal and retina sizes
 * 
 * @param int $id
 * @param string $size
 * @param array $atts
 * 
 * @return string
 *
 */
function get_image($id, $size, $atts = array())
{

    $x1 = wp_get_attachment_image_src($id, $size);
    $x2 = wp_get_attachment_image_src($id, $size . '@x2');

    if($x1 === false){
        return false;
    }

    $attributes = '';
    foreach ($atts as $att => $value) {
        $attributes .= $att . '="' . $value . '" ';
    }

    $attributes = trim($attributes);

    $output = '';
    $output .= '<picture>';
    $output .= '<source srcset="' . $x2[0] . ' 2x, ' . $x1[0] . ' 1x" />';
    $output .= '<noscript><img src="' . $x1[0] . '" ' . $attributes . '></noscript>';
    $output .= '<img src="' . $x1[0] . '" ' . $attributes . '>';
    $output .= '</picture>';

    return $output;
}