<?php
return array(
    'controllers' => array(
        'invokables' => array(
            'Authentification\Controller\Authentification' => 'Authentification\Controller\AuthentificationController',
        ),
    ),
    'router' => array(
        'routes' => array(
            'authentification' => array(
                'type'    => 'Literal',
                'options' => array(
                    // Change this to something specific to your module
                    'route'    => '/authentification',
                    'defaults' => array(
                        // Change this value to reflect the namespace in which
                        // the controllers for your module are found
                        '__NAMESPACE__' => 'Authentification\Controller',
                        'controller'    => 'Authentification',
                        'action'        => 'login',
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
                            'route'    => '/[:controller[/:action[/:id]]]',
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
            'Authentification' => __DIR__ . '/../view',
        ),
    		
    ),
		// extra for Doctrine Put the namespace on top!!!!!!!
		// http://stackoverflow.com/questions/13007477/doctrine-2-and-zf2-integration
		// put namespace User; in the first line of your module.config.php. a namespace should be defined as you use the __NAMESPACE__ constant...
		// from DoctrineModule
		'doctrine' => array(
				// 1) for Aithentication
				'authentication' => array( // this part is for the Auth adapter from DoctrineModule/Authentication
						'orm_default' => array(
								'object_manager' => 'Doctrine\ORM\EntityManager',
								// object_repository can be used instead of the object_manager key
								'identity_class' => 'Parc\Entity\Agent', //'Application\Entity\User',
								'identity_property' => 'email', // 'username', // 'email',
								'credential_property' => 'password', // 'password',
								'credential_callable' => function(Parc\Entity\Agent $agent, $passwordGiven) { // not only User
								// return my_awesome_check_test($user->getPassword(), $passwordGiven);
						// echo '<h1>callback user->getPassword = ' .$user->getPassword() . ' passwordGiven = ' . $passwordGiven . '</h1>';
						//- if ($user->getPassword() == md5($passwordGiven)) { // original
						// ToDo find a way to access the Service Manager and get the static salt from config array
						if ($agent->getPassword() == md5('aFGQ475SDsdfsaf2342' . $passwordGiven . $agent->getUsrPasswordSalt()) &&
						$agent->getUsrActive() == true) {
							return true;
						}
						else {
							return false;
						}
						},
						),
		),
		
		// 2) standard configuration for the ORM from https://github.com/doctrine/DoctrineORMModule
						// http://www.jasongrimes.org/2012/01/using-doctrine-2-in-zend-framework-2/
						// ONLY THIS IS REQUIRED IF YOU USE Doctrine in the module
						'driver' => array(
								// defines an annotation driver with two paths, and names it `my_annotation_driver`
						//            'my_annotation_driver' => array(
								__NAMESPACE__ . '_driver' => array(
										'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
										'cache' => 'array',
										'paths' => array(
												// __DIR__ . '/../module/Parc/src/Parc/Entity' // 'path/to/my/entities',
												//,__DIR__ . '/../src/' . __NAMESPACE__ . '/Entity',
												// 'H:\PortableApps\PortableGit\projects\btk\module\Auth\src\Auth\Entity' // Stoyan added to use doctrine in Auth module
												__DIR__ . '/../../Parc/src/Parc/Entity', // Stoyan added to use doctrine in Auth module
												// 'another/path'
										),
								),
		
								// default metadata driver, aggregates all other drivers into a single one.
								// Override `orm_default` only if you know what you're doing
								'orm_default' => array(
										'drivers' => array(
												// register `my_annotation_driver` for any entity under namespace `My\Namespace`
												// 'My\Namespace' => 'my_annotation_driver'
												// 'Parc' => 'my_annotation_driver'
												__NAMESPACE__ . '\Entity' => __NAMESPACE__ . '_driver',
								//-					'Auth\Entity' => __NAMESPACE__ . '_driver' // Stoyan added to allow the module Auth also to use Doctrine
										)
								)
						)
		),
		);

