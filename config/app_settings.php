<?php

return [

    // All the sections for the settings page
    'sections' => [
        'app' => [
            'title' => 'Configuraciones General',
            'descriptions' => 'Configuración general de la aplicación.', // (optional)
            'icon' => 'fa fa-cog', // (optional)

            'inputs' => [
                [
                    'name' => 'app_name', // unique key for setting
                    'type' => 'text', // type of input can be text, number, textarea, select, boolean, checkbox etc.
                    'label' => 'Nombre del sitio', // label for input
                    // optional properties
                    'placeholder' => 'Nombre de la aplicación', // placeholder for input
                    'class' => 'form-control', // override global input_class
                    'style' => '', // any inline styles
                    'rules' => 'required|min:2|max:20', // validation rules for this input
                    'value' => 'Laravel', // any default value
                    'hint' => 'Puedes establecer el nombre del sitio aquí.' // help block text for input
                ],
                [
                    'name' => 'logo',
                    'type' => 'image',
                    'label' => 'Logo',
                    'hint' => 'Debe ser una imagen y recortada en el tamaño deseado',
                    'rules' => 'image|max:500',
                    'disk' => 'public', // which disk you want to upload
                    'path' => 'app', // path on the disk,
                    'preview_class' => 'thumbnail',
                    'preview_style' => 'height:40px'
                ],
                [
                    'name' => 'favicon',
                    'type' => 'image',
                    'label' => 'Favicon',
                    'hint' => 'Debe ser una imagen y recortada en el tamaño deseado',
                    'rules' => 'image|max:500',
                    'disk' => 'public', // which disk you want to upload
                    'path' => 'app', // path on the disk,
                    'preview_class' => 'thumbnail',
                    'preview_style' => 'height:40px'
                ]
            ]
        ],
        'maintenance' => [
            'title' => 'Modo Mantenimiento [No habilitado]',
            'descriptions' => 'El modo mantenimiento se usa para suspender el acceso a ingresar al sitio',
            'icon' => 'fa fa-cog',

            'inputs' => [
                [
                    'type' => 'checkbox',
                    'label' => 'Activar el modo mantenimiento',
                    'name' => 'maintenance_check',
                    'value' => '0'
                ],
                [
                    'type' => 'textarea',
                    'name' => 'maintenance_note',
                    'label' => 'Nota sobre el mantenimiento',
                    'class' => 'ckeditor',
                    'rows' => 4,
                    'cols' => 10
                ]
            ]

        ],
        'about' => [
            'title' => 'Información sobre el sitio',
            'descriptions' => 'Esta información será mostrada en diferentes partes del sitio',
            'icon' => 'fa fa-cog',

            'inputs' => [
                [
                    'type' => 'textarea',
                    'name' => 'about_short',
                    'label' => 'Breve descripción del sitio',
                    'rules' => 'max:240',
                    'rows' => 4,
                    'cols' => 10,
                    'hint' => 'La información aquí suministrada será mostrada en el footer'
                ],
                [
                    'name' => 'about_title',
                    'type' => 'text',
                    'label' => 'Título sobre Nosotros',
                    // optional fields
                    'data_type' => 'string',
                    'rules' => 'required|min:4|max:100',
                    'placeholder' => 'Título',
                    'class' => 'form-control',
                    'value' => 'Este título es un ejemplo',
                    'hint' => 'El título suministrado aquí será mostrado en la sección "Nosotros"'
                ],
                [
                    'name' => 'about_img',
                    'type' => 'image',
                    'label' => 'Imagen sobre Nosotros',
                    'hint' => 'Debe ser una imagen y recortada en el tamaño deseado',
                    'rules' => 'image|max:1000',
                    'disk' => 'public', // which disk you want to upload
                    'path' => 'app', // path on the disk,
                    'preview_class' => 'thumbnail',
                    'preview_style' => 'height:60px'
                ],
                [
                    'type' => 'textarea',
                    'name' => 'about_us',
                    'label' => 'Descripción completa del sitio',
                    'class' => 'ckeditor',
                    'rows' => 8,
                    'cols' => 10,
                    'hint' => 'La información suministrada será mostrada en la sección "Nosotros"'
                ],
            ]
        ]
        // 'email' => [
        //     'title' => 'Email Settings',
        //     'descriptions' => 'How app email will be sent.',
        //     'icon' => 'fa fa-envelope',

        //     'inputs' => [
        //         [
        //             'name' => 'from_email',
        //             'type' => 'email',
        //             'label' => 'From Email',
        //             'placeholder' => 'Application from email',
        //             'rules' => 'required|email',
        //         ],
        //         [
        //             'name' => 'from_name',
        //             'type' => 'text',
        //             'label' => 'Email from Name',
        //             'placeholder' => 'Email from Name',
        //         ]
        //     ]
        // ]
    ],

    // Setting page url, will be used for get and post request
    'url' => 'admin/settings',

    // Any middleware you want to run on above route
    'middleware' => ['auth'],

    // View settings
    'setting_page_view' => 'app_settings::settings_page',
    'flash_partial' => 'app_settings::_flash',

    // Setting section class setting
    'section_class' => 'card card-nav-tabs',
    'section_heading_class' => 'card-header card-header-info',
    'section_body_class' => 'card-body',

    // Input wrapper and group class setting
    'input_wrapper_class' => 'form-group',
    'input_class' => 'form-control',
    'input_error_class' => 'has-error',
    'input_invalid_class' => 'is-invalid',
    'input_hint_class' => 'form-text text-muted',
    'input_error_feedback_class' => 'text-danger',

    // Submit button
    'submit_btn_text' => 'Guardar configuración',
    'submit_success_message' => 'La configuración ha sido guardada.',

    // Remove any setting which declaration removed later from sections
    'remove_abandoned_settings' => false,

    // Controller to show and handle save setting
    'controller' => '\QCod\AppSettings\Controllers\AppSettingController',
    // 'controller' => '\Modules\Admin\Http\Controllers\SettingsController',

    // settings group
    'setting_group' => function () {
        // return 'user_'.auth()->id();
        return 'default';
    }
];
