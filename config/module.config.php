<?php
return [
    'controllers' => [
        'factories' => [
            'HtCustomerLogo' => 'HtCustomerLogo\Controller\Factory\LogoControllerFactory'
        ]
    ],
    'view_manager' => [
        'template_path_stack' => [
           'HtCustomerLogo' =>  __DIR__ . '/../view'
        ]
    ],
    'router' => [
        'routes' => [
            'HtCustomerLogo' => [
                'type' => 'Literal',
                'options' => [
                    'route' => '/upload-logo',
                    'defaults' => [
                        'controller' => 'HtCustomerLogo',
                        'action' => 'upload'
                    ]
                ],
            ]
        ]
    ],
    'htcustomerlogo' => [],
    'htimg' => [
        'filters' => [
            'htcustomerlogo_display' => [
                'type' => 'thumbnail',
                'options' => [
                    'width' => 75,
                    'height' => 32,
                    'mode'  => 'outbound',
                    'image_loader' => 'htcustomerlogo',
                ]
            ]
        ],
        'loaders' => [
            'factories' => [
                'htcustomerlogo' => 'HtCustomerLogo\Imagine\Loader\Factory\LogoLoaderFactory',
            ]
        ]
    ]
];
