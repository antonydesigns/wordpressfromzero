<?php

// HTML should be 
// Timestring : <time  datetime="{{ $datetime_attr }}"> {{ $datetime_val }} </time>  
// Hyperlink: <a href="{{ $date_archive_permalink }}"  ></ Timestring></a>
// Span: <span> </ Hyperlink> </span>

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
    return $post_date;
}
