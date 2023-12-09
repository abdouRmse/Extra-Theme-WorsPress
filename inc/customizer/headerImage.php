<?php

function extra_custom_header_setup() {
        $args = array(
            'default-image'      => '', // Default header image
            'default-text-color' => '000', // Default text color
            'width'              => 1200, // Default header image width
            'height'             => 400,  // Default header image height
            'flex-width'         => true,
            'flex-height'        => true,
            'header-text'        => true, // Display header text (site title and tagline)
            'uploads'            => true, // Allow users to upload their own header image
            'wp-head-callback'   => 'extra_header_style', // Callback function for styling in the head
        );
    
        add_theme_support('custom-header', $args);
    }
    add_action('after_setup_theme', 'extra_custom_header_setup');
    
    function extra_header_style() {
        // Additional styles for the header output in the head of the document
        // You can customize this function to add any additional styles you need
    }