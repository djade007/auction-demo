<?php


function rand_class() {
    $classes = [
        1 => 'default', 'warning', 'danger', 'success', 'info'
    ];

    return $classes[random_int(1, count($classes))];
}

function format_price($price) {
    return '$'.number_format($price);
}

function convert_to_dollars($price) {
    return $price / 370;
}