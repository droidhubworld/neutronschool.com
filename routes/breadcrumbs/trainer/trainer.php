<?php

Breadcrumbs::for('admin.dashboard', function ($trail) {
    $trail->push(__('strings.backend.dashboard.title'), route('admin.dashboard'));
});

Breadcrumbs::for('trainer.address.index', function ($trail) {
    $trail->push('Address', route('trainer.address.index'));
});

require __DIR__.'/myaccount.php';
require __DIR__.'/videos.php';
