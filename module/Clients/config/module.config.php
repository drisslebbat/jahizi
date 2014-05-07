<?php
use Clients;
return array(
    'controllers' => array(
    		'invokables' => array(
    				'Clients\Controller\Unclient' => 'Clients\Controller\UnclientController',
    				'Clients\Controller\clients' => 'Clients\Controller\clientsController',
    		),
    	),
		'doctrine' => array(
				'driver' => array(
						'Clients_driver' => array(
								'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
								'cache' => 'array',
								'paths' => array(__DIR__ . '/../src/Clients/Entity')
						),
						'orm_default' => array(
								'drivers' => array(
										'Clients\Entity' =>  'Clients_driver'
								),
						),
				),
		),
		
    'router' => array(
        'routes' => array(
            'clients' => array(
                'type'    => 'Literal',
                'options' => array(
                    // Change this to something specific to your module
                    'route'    => '/clients',
                    'defaults' => array(
                        // Change this value to reflect the namespace in which
                        // the controllers for your module are found
                        '__NAMESPACE__' => 'Clients\Controller',
                        'controller'    => 'Unclient',
                        'action'        => 'index',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    // This route is a sane default when developing a module;
                    // as you solidify the routes for your module, however,
                    // you may want to remove it and replace it with more
                    // specific routes.
                    'default' => array(
                        'type'    => 'Segment',
                        'options' => array(
                            'route'    => '/[:controller[/:action]]',
                            'constraints' => array(
                                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                            ),
                            'defaults' => array(
                            ),
                        ),
                    ),
                ),
            ),
        ),
    ),
    'view_manager' => array(
        'template_path_stack' => array(
            'Clients' => __DIR__ . '/../view',
        ),
    ),
);
