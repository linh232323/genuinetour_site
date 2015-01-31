<?php
class ItLibrary_View_Helper_CmsEditor extends Zend_View_Helper_Abstract{
      
       public function cmsEditor($name,$value,$options = null){
              require_once(SCRIPT_PATH . '/ckeditor/ckeditor.php');//SCRIPT được đn trong Index.php
              $config = array();
              $basePath = SCRIPT_PATH . "/ckeditor/";
              $CKEditor = new CKEditor();
              $CKEditor->returnOutput = true;
              $CKEditor->basePath = $basePath;
             
              if(!isset($options['width'])){
                     $CKEditor->config['width'] = 500;
              }else{
                     $CKEditor->config['width'] = $options['width'];
              }
             
              if(!isset($options['height'])){
                     $CKEditor->config['height'] = 350;
              }else{
                     $CKEditor->config['height'] = $options['height'];
              }
             
              if(!isset($options['language'])){
                     $CKEditor->config['language'] = 'en';
              }else{
                     $CKEditor->config['language'] = $options['language'];
              }
             
              if(!isset($options['toolbar'])){
                     $CKEditor->config['toolbar'] = 'Full';
              }else{
                     $CKEditor->config['toolbar'] = $options['toolbar'];
              }
             
              return $CKEditor->editor($name,$value,$config);
       }
      
      
       }// the  end  class
?>