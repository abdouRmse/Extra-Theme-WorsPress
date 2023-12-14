<?php
/**
 * poworder by abdenou
 * custome colors
 */

    function theme_color_customize_register($wp_customize) {
        // Main Color Section
        $wp_customize->add_panel('global_section', array(
            'title' => __('Global', 'theme-name'),
            'priority' => 20,
        ));
        // Header Color Subsection
        $wp_customize->add_section('header', array(
            'title' => __('Header Settings', 'theme-name'),
            'priority' => 10,
            'panel' => 'global_section',
        ));

        /** header height */

            $wp_customize->add_setting('header_height', array(
                'default' => 200, // Set a default value
                'sanitize_callback' => 'absint',
                'transport' => 'refresh',
            ));

            $wp_customize->add_control('header', array(
                'type' => 'number',
                'label' => __('Header Height (in pixels)', 'theme-name'),
                'section' => 'header',
                'settings' => 'header_height'
            ));

        /** header height end */

        /** enable background image */

            $wp_customize->add_setting('image_header_background', array(
                'default' => true, // Set a default value
                'sanitize_callback' => '',
            ));

            $wp_customize->add_control('header_image', array(
                'type' => 'checkbox',
                'label' => __('Enable Background Image In Header', 'theme-name'),
                'section' => 'header',
                'settings' => 'image_header_background'
            ));

        /** Enable background image */

        /** Header Color , is displayed just if the header image background is disabled */
    
            $wp_customize->add_setting('header_color', array(
                'default' => '#fff',
                'sanitize_callback' => 'sanitize_hex_color',
                'transport' => 'refresh',
            ));
        
            $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'header_color', array(
                'label' => __('Header Color', 'theme-name'),
                'section' => 'header',
                'settings' => 'header_color',
                'active_callback' => 'is_header_image_enabled',

            )));

            // Callback function to check if the first setting is enabled
            function is_header_image_enabled($control) {
                return $control->manager->get_setting('image_header_background')->value() === false;
            }

        /** Header Color */

        /** Links Font Family */

            $wp_customize->add_setting('header_font_family', array(
                'default' => 'Arial, sans-serif',
                'sanitize_callback' => 'sanitize_text_field',
                'transport' => 'refresh',
            ));

            $wp_customize->add_control('font_family', array(
                'label' => __('Header Font Family', 'theme-name'),
                'section' => 'header',
                'settings' => 'header_font_family',
                'type' => 'select',
                'choices' => array(
                    'manrope'  =>  'manrope,sans-serif',
                    'Arial' => 'Arial, sans-serif',
                    'Georgia' => 'Georgia, serif',
                    'Times New Roman' => 'Times New Roman, serif',
                    // Add more font choices as needed
                ),
            ));

        /** End Links Font Family */

        /** Links header settings */
            
            $wp_customize->add_setting('links_font_size', array(
                'default' => 14, // Set a default value
                'sanitize_callback' => '',
            ));

            $wp_customize->add_control('header_links', array(
                'type' => 'number',
                'label' => __('Header Links Font Size', 'theme-name'),
                'section' => 'header',
                'settings' => 'links_font_size'
            ));

        /** End Links header settings */

        /** Links Color */

            $wp_customize->add_setting('links_color', array( // the id (name of the field used to get the value of the user)
                'default' => '#ffffff',
                'sanitize_callback' => 'sanitize_hex_color',
                'transport' => 'refresh',
            ));
            $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'li-color', array(
                'label' => __('Links Color', 'theme-name'),
                'section' => 'header',
                'settings' => 'links_color',
            )));

        /** End Links Color */

        /** Links Color activate & hover */

            $wp_customize->add_setting('link_hover', array( // the id (name of the field used to get the value of the user)
                'default' => 'black',
                'sanitize_callback' => 'sanitize_hex_color',
                'transport' => 'refresh',
            ));
            $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'li-hover-color', array(
                'label' => __('Link Current & Hover Color', 'theme-name'),
                'section' => 'header',
                'settings' => 'link_hover',
            )));

        /** Links Color activate & hover */


         /** Links Color activate & hover */

            $wp_customize->add_setting('bg_link_hover', array( // the id (name of the field used to get the value of the user)
                'default' => '',
                'sanitize_callback' => 'sanitize_hex_color',
                'transport' => 'refresh',
            ));
            $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'li-hover-bg-color', array(
                'label' => __('Current Link Background Color', 'theme-name'),
                'section' => 'header',
                'settings' => 'bg_link_hover',
            )));

        /** Links Color activate & hover */

         /** enable background image */

            $wp_customize->add_setting('header_fixed', array(
                'default' => false, // Set a default value
                'sanitize_callback' => '',
            ));

            $wp_customize->add_control('header_fixed', array(
                'type' => 'checkbox',
                'label' => __('Fixed Header', 'theme-name'),
                'section' => 'header',
                'settings' => 'header_fixed'
            ));

        /** Enable background image */

        /** Breadcrumb Settings */
        
            $wp_customize->add_section('Breadcrumb',array(
                'title'     =>      __('Breadcrumb',"theme-name"),
                'priority'  =>      20,
                'panel'     =>      'global_section'
            ));

            $wp_customize->add_setting('Bredcrumb_setting', array(
                'default' => false, // Set a default value
                'sanitize_callback' => '',
                'transport' => 'refresh',
            ));

            $wp_customize->add_control('breadcrumb_control', array(
                'type' => 'checkbox',
                'label' => __('Enable The Breadcrumb', 'theme-name'),
                'section' => 'Breadcrumb',
                'settings' => 'Bredcrumb_setting'
            ));

        /** End Breadcrumb Settings */
        

    
        // Body Settings :
        $wp_customize->add_section('body_color_section', array(
            'title' => __('Body Color', 'theme-name'),
            'priority' => 20,
            'panel' => 'global_section',
        ));
    
        // Add a setting for the body color
        $wp_customize->add_setting('body_color', array( // the id (name of the field used to get the value of the user)
            'default' => '#ffffff',
            'sanitize_callback' => 'sanitize_hex_color',
            'transport' => 'refresh',
        ));
    
        // Add a control for the body color setting
        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'bg-color', array(
            'label' => __('Body Color', 'theme-name'),
            'section' => 'body_color_section',
            'settings' => 'body_color',
        )));
    }
    add_action('customize_register', 'theme_color_customize_register');