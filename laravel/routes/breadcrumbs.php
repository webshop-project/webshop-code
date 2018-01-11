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
    $breadcrumbs->push($product->category->name, route('products.show', $product->category->name));
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

// Admin Home
Breadcrumbs::register('admin home', function ($breadcrumbs) {
    $breadcrumbs->push('home', route('admin.index'));
});

// Admin Home > LowStockList
Breadcrumbs::register('lowStockList', function ($breadcrumbs) {
    $breadcrumbs->parent('admin home');
    $breadcrumbs->push('lowStockList', route('lowStockList'));
});