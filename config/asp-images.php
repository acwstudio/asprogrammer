<?php

return [

    'preset' => [
        'about' => [
            'prefix' => 'about-',
            'path' => 'dim/images/abouts/',
            'temp' => 'dim/images/temp-files/abouts/',
            'dummy' => 'dim/images/dummies/',
            'height' => 320,
            'width' => 960,
            'manipulation' => Spatie\Image\Manipulations::FIT_CROP,
        ],
        'intro' => [
            'prefix' => 'intro-',
            'path' => 'dim/images/intros/',
            'temp' => 'dim/images/temp-files/intros/',
            'dummy' => 'dim/images/dummies/',
            'height' => 320,
            'width' => 960,
            'manipulation' => Spatie\Image\Manipulations::FIT_CROP,
        ],
        'work' => [
            'prefix' => 'work-',
            'path' => 'dim/images/works/',
            'temp' => 'dim/images/temp-files/works/',
            'dummy' => 'dim/images/dummies/',
            'height' => 320,
            'width' => 960,
            'manipulation' => Spatie\Image\Manipulations::FIT_CROP,
        ],
        'summernote' => [
            'prefix' => 'summernote-',
            'path' => 'dim/images/summernote/',
            'temp' => 'dim/images/temp-files/summernote',
            'height' => 0,
            'width' => 0,
            'manipulation' => Spatie\Image\Manipulations::FIT_CONTAIN,
        ],
    ]

];
