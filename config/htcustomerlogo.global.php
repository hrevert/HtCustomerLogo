<?php
    
/**
 * HtCustomerLogo Configuration
 *
 * If you have a ./config/autoload/ directory set up for your project, you can
 * drop this config file in it and change the values as you wish.
 */
    
$options = array(
    /**
     * Upload Directory
     *
     * Please set directory where user logo will be uploaded.
     * Donot forget to set appropriate permission for that directory
     * The logo will be downloaded to this directory with filename, 'logo.png'
     * Optional
     * This is useful when the upload directory is fixed. Else see the LogoDirectoryProvider in $settings
     */
    //'upload_directory' => null,

    /**
     * Post Upload Route
     *
     * Route to redirect after a user has uploaded his/her logo 
     * Optional
     * If not provided, user is not redirected
     */
    //'post_upload_route' => null,

    /**
     * Delete Old Image
     *
     * Do you want to delete old(previously uploaded) images?
     * Default: true
     * Accepted Values boolean true and false
     */
    //'delete_old_image' => true,

    /**
    * Resizing Image for storage
    *
    * How do you want to store a newly uploaded image? Store as it is?
    * If you want to resize, this options allows to resize newly uploaded images
    *
    */
    'storage_resizer' => array(
        /*
        * Resizer Name
        *
        * Fully Qualified ClassName of Resizer
        * It should implement HtCustomerLogo\Image\ResizingInterface
        * 
        * Available Resizers
        * 1) HtCustomerLogo\Image\BasicResizing
        * 2) HtCustomerLogo\Image\Crop
        * 3) HtCustomerLogo\Image\CropFromCenter
        * 4) HtCustomerLogo\Image\AdaptiveResizing
        *
        */
        //'name' => '',// 


        /*'options' => array(
        
        )*/
    )

    
);

$settings = array(
    /**
    * Upload Directory Provider
    *
    * Please specify the DI alias for the configured LogoDirectoryProvider
    * instance that HtCustomerLogo should use. 
    * Useful when upload directory is not fixed
    * The class should implement HtCustomerLogo\Model\LogoDirectoryProviderInterface
    *
    * If this class also implements HtCustomerLogo\Model\LogoPathProviderInterface,
    * the upload target is set to value from method, 'getLogoPath',
    * Else, value returned from method 'getUploadDirectory' is suffixed with 'logo.png' to provide logo path
    *
    */
    //'logo_directory_provider' => '',
);



/**
 * You do not need to edit below this line
 */

$return = array(
    'htcustomerlogo' => $options
);

if (isset($settings['logo_directory_provider'])) {
    $return['service_manager'] = array(
        'aliases' => array(
            'HtCustomerLogo\LogoDirectoryProvider' => $settings['logo_directory_provider']
        )
    );
}

return $return;
