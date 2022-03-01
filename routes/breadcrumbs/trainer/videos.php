<?php

Breadcrumbs::for('trainer.video-upload.index', function ($trail) {
    $trail->push('Upload Video', route('trainer.video-upload.index'));
});