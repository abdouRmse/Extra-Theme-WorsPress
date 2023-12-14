
<?php 
    $category = get_the_category();
    
    /** breadcrumb handle */
    $breadcrumb_enable = get_theme_mod( "Bredcrumb_setting", false );
?>
<?php if($breadcrumb_enable): ?>
    <div class="breadcrumb-holder">
        <div class="container">
            <ol class="breadcrumb">
                <li>
                    <a href="<?php echo get_site_url() ?>">Home</a>          
                </li>
                <i class="fa-solid fa-angles-right"></i>  
                <li>
                    <a href="<?php echo get_category_link( $category[0]->term_id ); ?>"><?php echo $category[0]->name; ?></a>
                </li>
                <i class="fa-solid fa-angles-right"></i>  
                <li>
                    <span class="active"><?php the_title() ?></span>
                </li>
            </ol>
        </div>
    </div>
<?php endif; ?>
