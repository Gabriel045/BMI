<?php

//ACF Blocks
add_action('init', 'register_acf_blocks');

function register_acf_blocks()
{
    register_block_type(__DIR__ . '/blocks/hero-home');
    register_block_type(__DIR__ . '/blocks/hero');
    register_block_type(__DIR__ . '/blocks/comments');
    register_block_type(__DIR__ . '/blocks/steps');
    register_block_type(__DIR__ . '/blocks/steps-products');
    register_block_type(__DIR__ . '/blocks/steps-image');
    register_block_type(__DIR__ . '/blocks/products');
    register_block_type(__DIR__ . '/blocks/text-image');
    register_block_type(__DIR__ . '/blocks/testimonial');
    register_block_type(__DIR__ . '/blocks/accordion');
    register_block_type(__DIR__ . '/blocks/blue-colunms');
    register_block_type(__DIR__ . '/blocks/numbers');
    register_block_type(__DIR__ . '/blocks/product-weight');
    register_block_type(__DIR__ . '/blocks/product-static');
}