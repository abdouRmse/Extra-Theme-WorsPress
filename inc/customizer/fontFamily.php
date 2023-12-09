<?php 

function theme_font_family_customize_register($wp_customize) {
    // Add a section for typography settings
    $wp_customize->add_section('typography_section', array(
        'title' => __('Typography Settings', 'theme-name'),
        'priority' => 40,
    ));

    // Add a setting for the body font family
    $wp_customize->add_setting('body_font_family', array(
        'default' => 'Arial, sans-serif',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'refresh',
    ));

    // Add a control for the body font family setting
    $wp_customize->add_control('body_font_family', array(
        'label' => __('Body Font Family', 'theme-name'),
        'section' => 'typography_section',
        'type' => 'select',
        'choices' => array(
            'manrope'  =>  'manrope,sans-serif',
            'Arial' => 'Arial, sans-serif',
            'Georgia' => 'Georgia, serif',
            'Times New Roman' => 'Times New Roman, serif',
            // Add more font choices as needed
        ),
    ));

    // Add a setting for the heading font family
    $wp_customize->add_setting('heading_font_family', array(
        'default' => 'Helvetica, sans-serif',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'refresh',
    ));

    // Add a control for the heading font family setting
    $wp_customize->add_control('heading_font_family', array(
        'label' => __('Heading Font Family', 'theme-name'),
        'section' => 'typography_section',
        'type' => 'select',
        'choices' => array(
            'manrope'  =>  'manrope,sans-serif',
            'Helvetica' => 'Helvetica, sans-serif',
            'Arial' => 'Arial, sans-serif',
            'Verdana' => 'Verdana, sans-serif',
            // Add more font choices as needed
        ),
    ));

    // You can add more settings and controls for various typography options as needed
}
add_action('customize_register', 'theme_font_family_customize_register');
