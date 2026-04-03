<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Theme Palette
    |--------------------------------------------------------------------------
    |
    | Edit these values to restyle the landing page without touching Blade.
    |
    */
    'palette' => [
        'light' => [
            'body_from' => '#fff2f2',
            'body_via' => '#FDFDFC',
            'body_to' => 'rgba(243,190,199,0.35)',

            'text' => '#1b1b18',

            'primary' => '#F8B803',
            'primary_text' => '#1b1b18',

            'secondary_border' => '#F3BEC7',
            'secondary_bg' => 'rgba(255,255,255,0.90)',
            'secondary_text' => '#1b1b18',

            'circle_1' => '#fff2f2',
            'circle_2' => '#fff2f2',
        ],
        'dark' => [
            'body_from' => '#1D0002',
            'body_via' => '#0a0a0a',
            'body_to' => 'rgba(75,6,0,0.25)',

            'text' => '#ededec',

            'primary' => '#F8B803',
            'primary_text' => '#1b1b18',

            'secondary_border' => '#4B0600',
            'secondary_bg' => 'rgba(22,22,21,0.90)',
            'secondary_text' => '#ededec',

            'circle_1' => '#1D0002',
            'circle_2' => '#1D0002',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Floating Hearts
    |--------------------------------------------------------------------------
    |
    | Position each heart using CSS percentage values (or bottom/top).
    | Only light heart colors are supported for now (to keep it simple).
    |
    */
    'hearts' => [
        'enabled' => true,
        'items' => [
            [
                'top' => '16%',
                'left' => '8%',
                'color' => '#F8B803',
                'font_size' => '1.5rem', // ~text-2xl
                'duration' => '6.2s',
                'delay' => '0s',
            ],
            [
                'top' => '42%',
                'right' => '12%',
                'color' => '#F53003',
                'font_size' => '1.25rem', // ~text-xl
                'duration' => '5.2s',
                'delay' => '0.7s',
            ],
            [
                'bottom' => '18%',
                'left' => '16%',
                'color' => '#F3BEC7',
                'font_size' => '1.5rem',
                'duration' => '6.8s',
                'delay' => '0.4s',
            ],
            [
                'top' => '30%',
                'right' => '40%',
                'color' => '#F3BEC7',
                'font_size' => '1.25rem',
                'duration' => '7.2s',
                'delay' => '1.1s',
            ],
            [
                'top' => '8%',
                'right' => '18%',
                'color' => '#F3BEC7',
                'font_size' => '1.125rem', // ~text-lg
                'duration' => '6.5s',
                'delay' => '0.2s',
            ],
            [
                'top' => '58%',
                'left' => '10%',
                'color' => '#F8B803',
                'font_size' => '1.125rem',
                'duration' => '7.5s',
                'delay' => '0.9s',
            ],
            [
                'top' => '26%',
                'left' => '22%',
                'color' => '#F53003',
                'font_size' => '1.125rem',
                'duration' => '5.9s',
                'delay' => '1.4s',
            ],
            [
                'bottom' => '12%',
                'right' => '22%',
                'color' => '#F8B803',
                'font_size' => '1.25rem',
                'duration' => '6.9s',
                'delay' => '0.6s',
            ],
            [
                'top' => '36%',
                'left' => '44%',
                'color' => '#F3BEC7',
                'font_size' => '1.5rem',
                'duration' => '8.2s',
                'delay' => '1.8s',
            ],
            [
                'top' => '64%',
                'right' => '36%',
                'color' => '#F53003',
                'font_size' => '1.125rem',
                'duration' => '6.3s',
                'delay' => '0.1s',
            ],
        ],
    ],
];
