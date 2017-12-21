<?php
/**
 * Created by PhpStorm.
 * User: Youri
 * Date: 12/19/2017
 * Time: 10:41 AM
 */

// Home
Breadcrumbs::register('home', function ($breadcrumbs) {
    $breadcrumbs->push('Home', route('home'));
});

// Home > Shop
Breadcrumbs::register('shop', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Shop', route('shop'));
});

// Home > Shop > [Product]
Breadcrumbs::register('product', function ($breadcrumbs, $product) {
    $breadcrumbs->parent('shop');
    $breadcrumbs->push($product->name, route('products.show', $product->id));
});

// Home > About
Breadcrumbs::register('about', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('About', route('about'));
});

// Home > About > [House]
Breadcrumbs::register('house', function ($breadcrumbs, $house) {
    $breadcrumbs->parent('about');
    $breadcrumbs->push($house->name, route('house.index', $house->id));
});

// Contact
Breadcrumbs::register('contact', function ($breadcrumbs) {
   $breadcrumbs->parent('home');
   $breadcrumbs->push('Contact', route('contact'));
});