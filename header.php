<?php
  $custom_logo_id = get_theme_mod('custom_logo');
  $logo_width = get_theme_mod('logo_width', '100'); // Get the custom width or use a default
  $logo_height = get_theme_mod('logo_height', '100'); // Get the custom height or use a default
  
  $logo_url = wp_get_attachment_image_url($custom_logo_id, 'full');

  // get background body color from user
  $bgcolor = get_theme_mod( 'body_color', "#fff" );

  // get the background header color
  $header_color = get_theme_mod( 'header_color', "var(--primary-bg-color)" );
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ) ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php bloginfo( "name" ); echo wp_title('|','true','left') ;?></title>
    <link rel='pingback' href="<?php bloginfo( 'pingback_url' ) ?>"/>
    <?php wp_head() /* importante to import the file css,script and links that wordpress need 
                        nb: i can add my file */  
    ?>
    <!--<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">-->
</head>

<style type="text/css">

  body{
    background-color: <?php echo  $bgcolor ;?>;
    font-family: <?php echo get_theme_mod( 'body_font_family', 'manrope,sans-serif' ); ?>;
  }

  .header-main-container{
      <?php if (get_header_image()) : ?>
          background-image: url("<?php echo header_image(); ?>");
      <?php else: ?>
        background-image: url("layouts/images/header-image.jpg");
      <?php endif; ?>
      background-position: center;
      background-repeat: no-repeat;
      background-size: cover;
      width: 100%;
      height: 650px;
    background-color:<?php echo $header_color; ?>;
  }

  .header-container{
    height: 100px;
    margin: auto;
    display: flex;
    align-items: center;
  }

  #menu-header-menu li a:hover,
  .current-menu-item{
      background-color: transparent;
      color:<?php echo $header_color; ?>;
      text-decoration: none;
  }
  .current-menu-item a span{
      color:<?php echo $header_color; ?>;
  }
  h1,h2,h3,h4,h5,h6{
    font-family:<?php echo get_theme_mod( 'heading_font_family', 'manrope,sans-serif' ); ?> ;
  }
  .main-nav{
    margin: auto;
  }

  .header-main-container > div img{
    width: <?php echo $logo_width; ?>px;
    height: <?php echo $logo_height; ?>px;
  }

</style>
<body>
    <header class="header-main-container">
      <div class="container d-flex justify-content-end main-nav header_container">
      <div class="logo">
          <?php // show the logo choos by the user
            if ($logo_url) {
                echo '<img src="' . esc_url($logo_url) . '" alt="' . get_bloginfo('name') . '" width="' . esc_attr($logo_width) . '" height="' . esc_attr($logo_height) . '">';
                if(get_bloginfo('name') != ""){
                  echo '<h3 class="logo-title">'. get_bloginfo('name').'</h3>';
                }
            } else {
                echo '<h1>' . get_bloginfo('name') . '</h1>';
            } ?>
        </div>
        <nav class="navbar navbar-expand-lg navbar-light">
          <div class="container">
            <button class="button-toggle" id="button-toggle" type="button">
              <span></span>
              <span></span>
              <span></span>
            </button>
            <div class="menu" id="menu">
              <?php ak_select_menu("main-nav-menu") ?>
              <?php //get_search_form(); ?>
              
            </div>
          </div>
        </nav>
      </div>   
    </header>




