<?php
/**
 * Help Panel.
 *
 * @package coffee_bistro
 */
?>

<div id="help-panel" class="panel-left visible">

    <div id="#help-panel" class="steps">  
        <h4>
            <?php esc_html_e( 'Quick Setup for Home Page', 'coffee-bistro' ); ?>
            <a href="<?php echo esc_url( 'https://demo.asterthemes.com/docs/coffee-bistro-free' ); ?>" class="button button-primary" style="margin-left: 5px; margin-right: 10px;" target="_blank"><?php esc_html_e( 'Free Documentation', 'coffee-bistro' ); ?></a>
        </h4>
        <hr class="quick-set">
        <p><?php esc_html_e( '1) Go to the dashboard. navigate to pages, add a new one, and label it "home" or whatever else you like.The page has now been created.', 'coffee-bistro' ); ?></p>
        <p><?php esc_html_e( '2) Go back to the dashboard and then select Settings.', 'coffee-bistro' ); ?></p>
        <p><?php esc_html_e( '3) Then Go to readings in the setting.', 'coffee-bistro' ); ?></p>
        <p><?php esc_html_e( '4) There are 2 options your latest post or static page.', 'coffee-bistro' ); ?></p>
        <p><?php esc_html_e( '5) Select static page and select from the dropdown you wish to use as your home page, save changes.', 'coffee-bistro' ); ?></p>
        <p><?php esc_html_e( '6) You can set the home page in this manner.', 'coffee-bistro' ); ?></p>
        <hr>
        <h4><?php esc_html_e( 'Setup Banner Section', 'coffee-bistro' ); ?></h4>
        <hr class="quick-set">
         <p><?php esc_html_e( '1) Go to Appereance > then Go to Customizer.', 'coffee-bistro' ); ?></p>
         <p><?php esc_html_e( '2) In Customizer > Go to Front Page Options > Go to Banner Section.', 'coffee-bistro' ); ?></p>
         <p><?php esc_html_e( '3) For Setup Banner Section you have to create post in dashboard first.', 'coffee-bistro' ); ?></p>
         <p><?php esc_html_e( '4) In Banner Section > Enable the Toggle button > and fill the following details.', 'coffee-bistro' ); ?></p>
         <p><?php esc_html_e( '5) In this way you can set Banner Section.', 'coffee-bistro' ); ?></p>
         <hr>
        <h4><?php esc_html_e( 'Setup Service Section', 'coffee-bistro' ); ?></h4>
        <hr class="quick-set">
         <p><?php esc_html_e( '1) Go to dashboard > Go to Page > then add new page', 'coffee-bistro' ); ?></p>
         <p><?php esc_html_e( '2) In Customizer > Go to Front Page Options > Go to Service Section.', 'coffee-bistro' ); ?></p>
         <p><?php esc_html_e( '3) In Service Section > Enable the Toggle button > and fill the following details and select the pages and posts whick you want display.', 'coffee-bistro' ); ?></p>
         <p><?php esc_html_e( '5) In this way you can set Service Section.', 'coffee-bistro' ); ?></p>
    </div>
    <hr>

    <div class="custom-setting">
        <h4><?php esc_html_e( 'Quick Customizer Settings', 'coffee-bistro' ); ?></h4>
        <span><a href="<?php echo esc_url( admin_url( 'customize.php' ) ); ?>" target="_blank" class=""><?php esc_html_e( 'Customize', 'coffee-bistro' ); ?></a></span>
    </div>
    <hr>
   <div class="setting-box">
        <div class="custom-links">
            <div class="icon-box">
                <span class="dashicons dashicons-admin-site-alt3"></span>
            </div>
            <h5><?php esc_html_e( 'Site Logo', 'coffee-bistro' ); ?></h5>
            <a href="<?php echo esc_url( admin_url( 'customize.php?autofocus[control]=custom_logo' ) ); ?>" target="_blank" class=""><?php esc_html_e( 'Customize', 'coffee-bistro' ); ?></a>
            
        </div>
        <div class="custom-links">
            <div class="icon-box">
                <span class="dashicons dashicons-color-picker"></span>
            </div>
            <h5><?php esc_html_e( 'Color', 'coffee-bistro' ); ?></h5>
            <a href="<?php echo esc_url( admin_url( 'customize.php?autofocus[control]=primary_color' ) ); ?>" target="_blank" class=""><?php esc_html_e( 'Customize', 'coffee-bistro' ); ?></a>
            
        </div>
        <div class="custom-links">
            <div class="icon-box">
                <span class="dashicons dashicons-screenoptions"></span>
            </div>
            <h5><?php esc_html_e( 'Theme Options', 'coffee-bistro' ); ?></h5>
            <a href="<?php echo esc_url( admin_url( 'customize.php?autofocus[panel]=coffee_bistro_theme_options' ) ); ?>"target="_blank" class=""><?php esc_html_e( 'Customize', 'coffee-bistro' ); ?></a>
            
        </div>
    </div>
    <div class="setting-box">
        <div class="custom-links">
            <div class="icon-box">
                <span class="dashicons dashicons-format-image"></span>
            </div>
            <h5><?php esc_html_e( 'Header Image ', 'coffee-bistro' ); ?></h5>
            <a href="<?php echo esc_url( admin_url( 'customize.php?autofocus[control]=header_image' ) ); ?>" target="_blank" class=""><?php esc_html_e( 'Customize', 'coffee-bistro' ); ?></a>
            
        </div>
        <div class="custom-links">
            <div class="icon-box">
                <span class="dashicons dashicons-align-full-width"></span>
            </div>
            <h5><?php esc_html_e( 'Footer Options ', 'coffee-bistro' ); ?></h5>
            <a href="<?php echo esc_url( admin_url( 'customize.php?autofocus[control]=coffee_bistro_footer_copyright_text' ) ); ?>" target="_blank" class=""><?php esc_html_e( 'Customize', 'coffee-bistro' ); ?></a>
            
        </div>
        <div class="custom-links">
            <div class="icon-box">
                <span class="dashicons dashicons-admin-page"></span>
            </div>
            <h5><?php esc_html_e( 'Front Page Options', 'coffee-bistro' ); ?></h5>
            <a href="<?php echo esc_url( admin_url( 'customize.php?autofocus[panel]=coffee_bistro_front_page_options' ) ); ?>" target="_blank" class=""><?php esc_html_e( 'Customize', 'coffee-bistro' ); ?></a>
            
        </div>
    </div>
</div>