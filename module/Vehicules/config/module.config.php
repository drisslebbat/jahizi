<?php
return array(
    'controllers' => array(
        'invokables' => array(
            'Vehicules\Controller\Vehicules' => 'Vehicules\Controller\VehiculesController',
        		'Vehicules\Controller\option' => 'Vehicules\Controller\optionController',
        		'Vehicules\Controller\depenses' => 'Vehicules\Controller\depensesController', 
        		'Vehicules\Controller\categorie' => 'Vehicules\Controller\categorieController',
        		'Vehicules\Controller\marque' => 'Vehicules\Controller\marqueController',
        		'Vehicules\Controller\modele' => 'Vehicules\Controller\modeleController',
        ),
    ),
    'router' => array(
        'routes' => array(
            'vehicules' => array(
                'type'    => 'Literal',
                'options' => array(
                    // Change this to something specific to your module
                    'route'    => '/vehicules',
                    'defaults' => array(
                        // Change this value to reflect the namespace in which
                        // the controllers for your module are found
                        '__NAMESPACE__' => 'Vehicules\Controller',
                        'controller'    => 'Vehicules',
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
                            'route'    => '/[:controller[/:action][/:id]]',
                            'constraints' => array(
                                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                            		'id'         => '[a-zA-Z0-9]+',
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
            'Vehicules' => __DIR__ . '/../view',
        ),
    ),
		
		'doctrine' => array(
				'driver' => array(
						'Vehicules_driver' => array(
								'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
								'cache' => 'array',
								'paths' => array(__DIR__ . '/../src/Vehicules/Entity')
						),
						'orm_default' => array(
								'drivers' => array(
										'Vehicules\Entity' => 'Vehicules_driver'
								)
						)
				)
		
		)
);
