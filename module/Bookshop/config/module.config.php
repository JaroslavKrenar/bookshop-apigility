<?php
return array(
    'service_manager' => array(
        'factories' => array(
            'Bookshop\\V1\\Rest\\Book\\BookResource' => 'Bookshop\\V1\\Rest\\Book\\BookResourceFactory',
        ),
    ),
    'router' => array(
        'routes' => array(
            'bookshop.rest.book' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/books[/:book_id]',
                    'defaults' => array(
                        'controller' => 'Bookshop\\V1\\Rest\\Book\\Controller',
                    ),
                ),
            ),
        ),
    ),
    'zf-versioning' => array(
        'uri' => array(
            0 => 'bookshop.rest.book',
        ),
    ),
    'zf-rest' => array(
        'Bookshop\\V1\\Rest\\Book\\Controller' => array(
            'listener' => 'Bookshop\\V1\\Rest\\Book\\BookResource',
            'route_name' => 'bookshop.rest.book',
            'route_identifier_name' => 'book_id',
            'collection_name' => 'book',
            'entity_http_methods' => array(
                0 => 'GET',
                1 => 'POST',
            ),
            'collection_http_methods' => array(
                0 => 'GET',
                1 => 'POST',
            ),
            'collection_query_whitelist' => array(
                0 => 'isbn',
                1 => 'author',
                2 => 'title',
                3 => 'release_date',
                4 => 'minimum_rating',
            ),
            'page_size' => 25,
            'page_size_param' => null,
            'entity_class' => 'Bookshop\\V1\\Rest\\Book\\BookEntity',
            'collection_class' => 'Bookshop\\V1\\Rest\\Book\\BookCollection',
            'service_name' => 'Book',
        ),
    ),
    'zf-content-negotiation' => array(
        'controllers' => array(
            'Bookshop\\V1\\Rest\\Book\\Controller' => 'HalJson',
        ),
        'accept_whitelist' => array(
            'Bookshop\\V1\\Rest\\Book\\Controller' => array(
                0 => 'application/vnd.bookshop.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ),
        ),
        'content_type_whitelist' => array(
            'Bookshop\\V1\\Rest\\Book\\Controller' => array(
                0 => 'application/vnd.bookshop.v1+json',
                1 => 'application/json',
            ),
        ),
    ),
    'zf-hal' => array(
        'metadata_map' => array(
            'Bookshop\\V1\\Rest\\Book\\BookEntity' => array(
                'entity_identifier_name' => 'id',
                'route_name' => 'bookshop.rest.book',
                'route_identifier_name' => 'book_id',
                'hydrator' => 'Zend\\Hydrator\\ArraySerializable',
            ),
            'Bookshop\\V1\\Rest\\Book\\BookCollection' => array(
                'entity_identifier_name' => 'id',
                'route_name' => 'bookshop.rest.book',
                'route_identifier_name' => 'book_id',
                'is_collection' => true,
            ),
        ),
    ),
    'zf-content-validation' => array(
        'Bookshop\\V1\\Rest\\Book\\Controller' => array(
            'input_filter' => 'Bookshop\\V1\\Rest\\Book\\Validator',
        ),
    ),
    'input_filter_specs' => array(
        'Bookshop\\V1\\Rest\\Book\\Validator' => array(
            0 => array(
                'required' => true,
                'validators' => array(
                    0 => array(
                        'name' => 'Zend\\Validator\\Isbn',
                        'options' => array(),
                    ),
                ),
                'filters' => array(
                    0 => array(
                        'name' => 'Zend\\Filter\\StringTrim',
                        'options' => array(),
                    ),
                ),
                'name' => 'isbn',
                'description' => 'Book ISBN',
            ),
            1 => array(
                'required' => true,
                'validators' => array(
                    0 => array(
                        'name' => 'Zend\\Validator\\StringLength',
                        'options' => array(
                            'max' => '100',
                        ),
                    ),
                    1 => array(
                        'name' => 'Zend\\I18n\\Validator\\Alpha',
                        'options' => array(
                            'allowwhitespace' => '',
                        ),
                    ),
                ),
                'filters' => array(
                    0 => array(
                        'name' => 'Zend\\Filter\\StringTrim',
                        'options' => array(),
                    ),
                ),
                'name' => 'author',
                'description' => 'Book author',
            ),
            2 => array(
                'required' => true,
                'validators' => array(
                    0 => array(
                        'name' => 'Zend\\Validator\\StringLength',
                        'options' => array(
                            'max' => '100',
                        ),
                    ),
                    1 => array(
                        'name' => 'Zend\\I18n\\Validator\\Alpha',
                        'options' => array(
                            'allowwhitespace' => '',
                        ),
                    ),
                ),
                'filters' => array(
                    0 => array(
                        'name' => 'Zend\\Filter\\StringTrim',
                        'options' => array(),
                    ),
                ),
                'name' => 'title',
                'description' => 'Book title',
            ),
            3 => array(
                'required' => false,
                'validators' => array(
                    0 => array(
                        'name' => 'Zend\\I18n\\Validator\\IsFloat',
                        'options' => array(),
                    ),
                ),
                'filters' => array(),
                'name' => 'rating',
                'description' => 'Book rating',
                'continue_if_empty' => true,
                'allow_empty' => true,
            ),
            4 => array(
                'required' => true,
                'validators' => array(
                    0 => array(
                        'name' => 'Zend\\Validator\\Date',
                        'options' => array(),
                    ),
                ),
                'filters' => array(),
                'name' => 'release_date',
                'description' => 'Book release date',
            ),
        ),
    ),
);
