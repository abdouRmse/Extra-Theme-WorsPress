<?php
  $custom_logo_id = get_theme_mod('custom_logo');
  $logo_width = get_theme_mod('logo_width', '100'); // Get the custom width or use a default
  $logo_height = get_theme_mod('logo_height', '100'); // Get the custom height or use a default
  
  $logo_url = wp_get_attachment_image_url($custom_logo_id, 'full');

  // get background body color from user
  $bgcolor = get_theme_mod( 'body_color', "#fff" );

  // header settings:
  $header_color = get_theme_mod( 'header_color', "var(--primary-bg-color)" );
  $header_height = get_theme_mod('header_height', '200');
  $header_image_is_enabled = get_theme_mod( 'image_header_background',true );

  // header links settings:
  $font_size_links = get_theme_mod( 'links_font_size', 14 );
  $color_links = get_theme_mod('links_color', "#fff");
  $hover_link = get_theme_mod( "link_hover", "black" );
  $bg_link_hover = get_theme_mod("bg_link_hover","transparent");
  $header_font_family = get_theme_mod('header_font_family');

  // fixed Header:
  $fixed_header = get_theme_mod( "header_fixed", false )

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
    font-family: <?php echo $header_font_family ?>;
    <?php if(!is_single() && !is_author()) : ?>
      <?php if($header_image_is_enabled) :  ?>
        <?php if (get_header_image()) : ?>
            background:linear-gradient(0deg, rgba(12, 8, 8, 0.8), rgba(12, 8, 8, 0.8)), url("<?php echo header_image(); ?>");
        <?php else: ?>
          background-image: url("layouts/images/header-image.jpg");
        <?php endif; ?>
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        width: 100%;
      <?php endif ?>
    <?php endif; ?>
    height: <?php echo $header_height; ?>px;

    <?php
      if($fixed_header):?>
        position: fixed;
        top: 0px;
        width: 100%;
    <?php endif; ?>
  }

  header .left-side .post-title{
    padding: 10px 0px 0 20px;
    background-color: #141414;
    border-left: 10px solid <?php echo $header_color; ?>;
  }

  .header_container{
    height: 100%;
    margin: auto;
    display: flex;
    align-items: center;
  }

  #menu-header-menu:nth-child(1) li a{
    font-size: <?php echo $font_size_links; ?>px;
    color: <?php echo $color_links; ?>;
    padding: 10px;
    font-weight: bold;
    text-transform: capitalize;
  }

  @media  screen and (max-width:991px) {
    #menu-header-menu:nth-child(1) li a{
      color: <?php echo $header_color; ?>;
    }
    .dropdown-menu li a{
      color: white !important;
    }
    .dropdown-menu li a:hover{
      color: <?php echo $header_color; ?> !important;
    }
  }

  #menu-header-menu li a:hover,
  .current-menu-item{
      background-color: white;
      color: <?php echo $header_color; ?>;
      text-decoration: none;
  }
  .current-menu-item a span{
      color:<?php echo $hover_link; ?>;
  }
 
  .main-nav{
    margin: auto;
  }

  .header-main-container > div img{
    width: <?php echo $logo_width; ?>px;
    height: <?php echo $logo_height; ?>px;
  }

  .active-toggle::before{
    content: "";
    border-width: 9px;
    border-style: solid;
    border-color: transparent transparent <?php echo $header_color ;?> transparent;
    position: absolute;
    bottom: -16px;
    right: 11px;
  }

  .dropdown-menu{
      padding: 0;
  }

  /** body dynamic styling */

  i{
      color: <?php echo $hover_link; ?>;
  }

  h1,h2,h3,h4,h5,h6{
    font-family:<?php echo get_theme_mod( 'heading_font_family', 'manrope,sans-serif' ); ?> ;
  }

  .read-more{
    border:1px solid <?php echo $header_color; ?>;
  }
  .post-edit-link{
    border: solid <?php echo $header_color; ?> 2px;
  }
  
  .post-container >a:nth-child(1):hover,
  .post-container .infos-container .infos,
  .category_page>:first-child,
  a
  {
    color: <?php echo $header_color; ?>;
    font-size: 11px;
  }

  .numbering-pagination .current,
  .read-more:hover,
  .dropdown-menu,
  .header-main-container,
  .footer{
    background-color: <?php echo $header_color; ?>;
  }

  /** logo tite */
  .logo-title{
    display: none;
  }

  /** end logo title */

.single-post-page .h1,
.single-post-page .h2,
.single-post-page .h3,
.single-post-page .h4,
.single-post-page .h5,
.single-post-page .h6,
.single-post-page h1,
.single-post-page h2,
.single-post-page h3,
.single-post-page h4,
.single-post-page h5,
.single-post-page h6,
.single-post-page .all-posts h3:nth-child(1),
.comment .comment-body .reply
{
    color: <?php echo $header_color; ?>;
}
  /** End body dynamic styling */

  /** calender widget */
    .wp-calendar-table :where(td,th){
        border-color: <?php echo $header_color; ?> !important;
    }
    #wp-calendar thead tr th,
    #today
    {
        background-color: <?php echo $header_color; ?>;
        color: white;
    }
  /** end calender widget */

  /** toggle button */
  @media (max-width: 991px) {
    .open{
      top: <?php echo $header_height + 10; ?>px;
    }
  }

  /** calender end widget */

  /** footer */
  .footer{
    color: white;
    font-size: 13px;
  }
  /** end footer */
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




