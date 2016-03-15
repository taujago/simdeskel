 <?php
if (! defined('BASEPATH'))
    exit('No direct script access allowed');
    
/**
 * Handle common image manipulation using the CI image_lib class.
 * 
 * @category   Webcoding.CMS
 * @package    Webcoding_Library
 * @name Images.php
 * @version 1.0
 * @author Jarolewski Piotr
 * @copyright Webcoding Jarolewski Piotr
 * @created: 13.01.2011
 */
 
 class Images
 {
     private $CI;
     
     public function __construct()
     {
         $this->CI = & get_instance();
     }
     
     /**
     * Resize Images and Crop width and height
     * 
     * @param $oldFile Full path and filename of original image
     * @param $newFile The full destination path and filename
     * @param $width The new width new image
     * @param $height The new height new image     
     * @return void
     */
     
     public function resize($oldFile, $newFile, $width, $height)
     {
         /*
         *    Resie image 
         */              
         $config['image_library'] = 'gd2';
        $config['source_image'] = $oldFile;
        $config['new_image'] = $newFile;
        $config['maintain_ratio'] = TRUE;
        $config['master_dim'] = 'width';
        $config['width'] = $width + 2;
        $config['height'] = $height + 2;
        
        $this->CI->load->library('image_lib', $config);
        
        $this->CI->image_lib->resize();
        
        $size = $this->_get_size($newFile);

        unset($config); // clear $config
        
        /*
         *    Crop image  in weight, height
         */
         
        $config['image_library'] = 'gd2';
        $config['source_image'] = $newFile;
        $config['maintain_ratio'] = FALSE;
        $config['width'] = $width;
        $config['height'] = $height;
        $config['y_axis'] = round(($size['height'] - $height) / 2);
        $config['x_axis'] = 0;

        $this->CI->image_lib->clear();
        $this->CI->image_lib->initialize($config);
        if ( ! $this->CI->image_lib->crop())
        {
            echo $this->CI->image_lib->display_errors();
        }
     }
     
     private function _get_size($image)
     {
         $img = getimagesize($image);
         return Array('width'=>$img['0'], 'height'=>$img['1']);
    }
     
 }  
