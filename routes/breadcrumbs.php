<?php // routes/breadcrumbs.php

// Note: Laravel will automatically resolve `Breadcrumbs::` without
// this import. This is nice for IDE syntax and refactoring.
use Diglactic\Breadcrumbs\Breadcrumbs;

// This import is also not required, and you could replace `BreadcrumbTrail $trail`
//  with `$trail`. This is nice for IDE type checking and completion.
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

// Home
Breadcrumbs::for('admin.dashboard', function (BreadcrumbTrail $trail) {
    $trail->push('Beranda', route('admin.dashboard'));
});

// Beranda > Author index
Breadcrumbs::for('admin.author.index', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.dashboard');
    $trail->push('Penulis', route('admin.author.index'));
});

// Beranda > Author create
Breadcrumbs::for('admin.author.create', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.dashboard');
    $trail->push('Penulis', route('admin.author.index'));
    $trail->push('Tambah Penulis', route('admin.author.create'));
});

// Beranda > Author edit
Breadcrumbs::for('admin.author.edit', function (BreadcrumbTrail $trail, $author) {
    $trail->parent('admin.dashboard');
    $trail->push('Penulis', route('admin.author.index'));
    $trail->push('Edit Penulis', route('admin.author.edit', $author));
});


// // Home > Blog > [Category]
// Breadcrumbs::for('category', function (BreadcrumbTrail $trail, $category) {
//     $trail->parent('blog');
//     $trail->push($category->title, route('category', $category));
// });