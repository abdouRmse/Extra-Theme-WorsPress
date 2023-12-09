<?php 

 /**
     * add the customizing logo
     */

    //function theme_name_setup() {
        //add_theme_support('custom-logo');
    //}

    function theme_logo_customize_register($wp_customize) {
        // Add a section for logo settings, this is optional to give it the title and the order
        $wp_customize->add_section('logo_section', array(
            'title' => __('Logo', 'theme-name'),
            'priority' => 30,
        ));
    
        // Add a setting for the custom logo
        $wp_customize->add_setting('custom_logo', array(
            'transport' => 'refresh', // to show the update immidiatly during the changes without reload
        ));
    
        // Add a control for the custom logo setting
        $wp_customize->add_control(new WP_Customize_Cropped_Image_Control($wp_customize, 'custom_logo', array(
            'label' => __('Custom Logo', 'theme-name'),
            'section' => 'logo_section',
            'settings' => 'custom_logo', // tells the Customizer that this control is associated with the 'custom_logo' setting.
            'height'=>100, // cropper Height
			'width'=>200, // Cropper Width
			'flex_width'=>true, //Flexible Width
			'flex_height'=>true, // Flexible Heiht
        )));

        // Add a setting for logo width
        $wp_customize->add_setting('logo_width', array(
            'default' => '100', // Set a default value
            'sanitize_callback' => 'absint',
        ));

        // Add a control for logo width
        $wp_customize->add_control('logo_width', array(
            'type' => 'number',
            'label' => __('Logo Width (in pixels)', 'theme-name'),
            'section' => 'logo_section',
        ));

        // Add a setting for logo height
        $wp_customize->add_setting('logo_height', array(
            'default' => '100', // Set a default value
            'sanitize_callback' => 'absint',
        ));

        // Add a control for logo height
        $wp_customize->add_control('logo_height', array(
            'type' => 'number',
            'label' => __('Logo Height (in pixels)', 'theme-name'),
            'section' => 'logo_section',
        ));
    }  

    add_action('customize_register', 'theme_logo_customize_register');

    
