<?php // routes/breadcrumbs.php

use Diglactic\Breadcrumbs\Breadcrumbs;
// dashboard
Breadcrumbs::for('dashboard', function ($trail){
    $trail->push('Dashboard', route('dashboard'));
});

Breadcrumbs::for('Provinsi', function ($trail){
    $trail->parent('dashboard');
    $trail->push('Provinsi', route('province.index'));
});

Breadcrumbs::for('Tambah Data Provinsi', function ($trail){
    $trail->parent('dashboard');
    $trail->push('Provinsi', route('province.index'));
    $trail->push('Tambah Data', route('province.create'));
});

Breadcrumbs::for('Edit Data Provinsi', function ($trail, $province){
    $trail->parent('dashboard');
    $trail->push('Provinsi', route('province.index'));
    $trail->push('Edit Data', route('province.edit', $province));
});

Breadcrumbs::for('Kabupaten/Kota', function ($trail, $province){
    $trail->parent('dashboard');
    $trail->push('Provinsi', route('province.index'));
    $trail->push('Kabupaten/Kota', route('city.index', $province));
});

Breadcrumbs::for('Tambah Data', function ($trail, $province){
    $trail->parent('dashboard');
    $trail->push('Provinsi', route('province.index'));
    $trail->push('Kabupaten/Kota', route('city.index', $province));
    $trail->push('Tambah Data', route('city.create', $province));
});

Breadcrumbs::for('Edit Data', function ($trail, $province, $city){
    $trail->parent('dashboard');
    $trail->push('Provinsi', route('province.index'));
    $trail->push('Kabupaten/Kota', route('city.index', $province));
    $trail->push('Edit Data', route('city.edit', [$province, $city]));
});

Breadcrumbs::for('Wisata', function ($trail){
    $trail->parent('dashboard');
    $trail->push('Wisata', route('content.index'));
});

Breadcrumbs::for('Tambah Data Wisata', function ($trail){
    $trail->parent('dashboard');
    $trail->push('Wisata', route('content.index'));
    $trail->push('Tambah Data', route('content.create'));
});

Breadcrumbs::for('Edit Data Wisata', function ($trail, $content){
    $trail->parent('dashboard');
    $trail->push('Wisata', route('content.index'));
    $trail->push('Edit Data', route('content.edit', $content));
});

Breadcrumbs::for('Edit Status', function ($trail, $content){
    $trail->parent('dashboard');
    $trail->push('Wisata', route('content.index'));
    $trail->push('Edit Status', route('content.editStatus', $content));
});

Breadcrumbs::for('Lihat Data Wisata', function ($trail, $content){
    $trail->parent('dashboard');
    $trail->push('Wisata', route('content.index'));
    $trail->push('Lihat Data', route('content.show', $content));
});

Breadcrumbs::for('User', function ($trail){
    $trail->parent('dashboard');
    $trail->push('User', route('user.index'));
});

Breadcrumbs::for('Tambah Data User', function ($trail){
    $trail->parent('dashboard');
    $trail->push('User', route('user.index'));
    $trail->push('Tambah Data', route('user.create'));
});

Breadcrumbs::for('Edit Data User', function ($trail, $user){
    $trail->parent('dashboard');
    $trail->push('User', route('user.index'));
    $trail->push('Edit Data', route('user.edit', $user));
});

Breadcrumbs::for('Budaya', function ($trail){
    $trail->parent('dashboard');
    $trail->push('Budaya', route('budaya.index'));
});

Breadcrumbs::for('Tambah Data Budaya', function ($trail){
    $trail->parent('dashboard');
    $trail->push('Budaya', route('budaya.index'));
    $trail->push('Tambah Data', route('budaya.create'));
});

Breadcrumbs::for('Edit Data Budaya', function ($trail, $budaya){
    $trail->parent('dashboard');
    $trail->push('Budaya', route('budaya.index'));
    $trail->push('Edit Data', route('budaya.edit', $budaya));
});

Breadcrumbs::for('Edit Status Budaya', function ($trail, $budaya){
    $trail->parent('dashboard');
    $trail->push('Budaya', route('budaya.index'));
    $trail->push('Edit Status', route('budaya.editStatus', $budaya));
});

Breadcrumbs::for('Lihat Data Budaya', function ($trail, $budaya){
    $trail->parent('dashboard');
    $trail->push('Budaya', route('budaya.index'));
    $trail->push('Lihat Data', route('budaya.show', $budaya));
});

Breadcrumbs::for('Penginapan', function ($trail){
    $trail->parent('dashboard');
    $trail->push('Penginapan', route('penginapan.index'));
});

Breadcrumbs::for('Tambah Data Penginapan', function ($trail){
    $trail->parent('dashboard');
    $trail->push('Penginapan', route('penginapan.index'));
    $trail->push('Tambah Data', route('penginapan.create'));
});

Breadcrumbs::for('Edit Data Penginapan', function ($trail, $penginapan){
    $trail->parent('dashboard');
    $trail->push('Penginapan', route('penginapan.index'));
    $trail->push('Edit Data', route('penginapan.edit', $penginapan));
});

Breadcrumbs::for('Edit Status Penginapan', function ($trail, $penginapan){
    $trail->parent('dashboard');
    $trail->push('Penginapan', route('penginapan.index'));
    $trail->push('Edit Status', route('penginapan.editStatus', $penginapan));
});

Breadcrumbs::for('Lihat Data Penginapan', function ($trail, $penginapan){
    $trail->parent('dashboard');
    $trail->push('Penginapan', route('penginapan.index'));
    $trail->push('Lihat Data', route('penginapan.show', $penginapan));
});