<?php

Breadcrumbs::for('admin.auth.category.index', function ($trail) {
    $trail->push(__('menus.backend.access.category.management'), route('admin.auth.category.index'));
});

Breadcrumbs::for('admin.auth.category.create', function ($trail) {
    $trail->parent('admin.auth.category.index');
    $trail->push(__('menus.backend.access.category.create'), route('admin.auth.category.create'));
});

Breadcrumbs::for('admin.auth.category.edit', function ($trail, $id) {
    $trail->parent('admin.auth.category.index');
    $trail->push(__('menus.backend.access.category.edit'), route('admin.auth.category.edit', $id));
});