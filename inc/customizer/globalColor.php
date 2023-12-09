<?php
/**
 * poworder by abdenou
 * custome colors
 */

    function theme_color_customize_register($wp_customize) {
        // Main Color Section
        $wp_customize->add_panel('color_section', array(
            'title' => __('Color Settings', 'theme-name'),
            'priority' => 30,
        ));
        // Header Color Subsection
        $wp_customize->add_section('header_color_section', array(
            'title' => __('Header Color', 'theme-name'),
            'priority' => 40,
            'panel' => 'color_section',
        ));
    
        // Add a setting for the header color
        $wp_customize->add_setting('header_color', array(
            'default' => '#fff',
            'sanitize_callback' => 'sanitize_hex_color',
            'transport' => 'refresh',
        ));
    
        // Add a control for the header color setting
        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'header_color', array(
            'label' => __('Header Color', 'theme-name'),
            'section' => 'header_color_section',
            'settings' => 'header_color',
        )));
    
        // Body Color Subsection
        $wp_customize->add_section('body_color_section', array(
            'title' => __('Body Color', 'theme-name'),
            'priority' => 20,
            'panel' => 'color_section',
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