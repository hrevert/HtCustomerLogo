<?php
return array(
    'controllers' => array(
        'invokables' => array(
            'HtCustomerLogo' => 'HtCustomerLogo\Controller\LogoController'
        )
    ),
    'view_manager' => array(
        'template_path_stack' => array(
           'HtCustomerLogo' =>  __DIR__."/../view"
        )
    ),
    'router' => array(
        'routes' => array(
            'HtCustomerLogo' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/logo[/]',
                    'defaults' => array(
                        'controller' => 'HtCustomerLogo',
                        'action' => 'upload'
                    )
                ),
                'may_terminate' => true,
                'child_routes' => array(
                     
                )
            )
        )
    )
);
