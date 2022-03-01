<?php



Breadcrumbs::for('trainer.dashboard', function ($trail) {
    $trail->push(__('labels.backend.access.users.management'), route('trainer.dashboard'));
});

Breadcrumbs::for('trainer.myaccount.profile', function ($trail) {
    // $trail->parent('trainer.dashboard');
    $trail->push('Title Here', route('trainer.myaccount.profile'));
});

Breadcrumbs::for('trainer.myaccount.setting', function ($trail) {
    $trail->push('Title Here', route('trainer.myaccount.setting'));
});

Breadcrumbs::for('trainer.myaccount.pages.get', function ($trail) {
    $trail->push('Title Here', route('trainer.myaccount.setting'));
});
