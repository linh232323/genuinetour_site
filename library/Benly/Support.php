<?php

class Benly_Support {

    public static function renderMenu($data, $lang = "", $parent = 0, $text = "") {
        $result = '';
        
        foreach ($data as $k => $menu) {
            if ($menu['parent_id'] == $parent) {
                $is_parent = self :: is_parent($data, $menu['id']);
                
                if ($is_parent) {
                    $result .= " <li class='nav-item'><div><a href='" . $menu['link' . $lang] . "'>" . $menu['name' . $lang] . "</a> <ul class='sub-menu'>";
                } else {
                    if ($parent != 0)
                        $result .= "<li><a href='" . $menu['link' . $lang] . "'>" . $menu['name' . $lang] . "</a></li>";
                    else {
                        $result .= "<li class='nav-item'><div><a href='" . $menu['link' . $lang] . "'>" . $menu['name' . $lang] . "</a></div></li>";
                    }
                }
                unset($data[$k]);
                self :: renderMenu($data, $lang, $menu['id'], $text . "<ul>\n");
                if ($is_parent) {
                    $result .= "</ul></div></li>";
                }
            }
        }
        return $result;
    }

    public static function get_time($id) {
        return $id['date'];
    }

    public static function is_parent($data, $id) {
        foreach ($data as $val) {
            if ($val['parent_id'] == $id) {
                return 1;
                break;
            }
        }
        return 0;
    }
   
    public static function getCrtLanguage(){
        
        if(isset($_SESSION['lang']))
            return $_SESSION['lang'];
        
        return 'vi';
    }
    public static function getLanguages($lang = null){
        if($lang == ""){
            $lang = "vi";
        }
        
        $langs  = array(
            "vi" => array(
                "code" => "vi",
                "name" => "Tiếng Việt"
            ),
            "en" => array(
                "code" => "en",
                "name" => "English"
            ));
        
        if(!isset($lang))
            return $langs;
        
        return $langs[$lang];
    }
    
    static $_localize = null;
    
    public static function getLocalize($lang){
        if(empty($lang)){
            $lang = "vi";
        }
        
        if(isset(self ::  $_localize)){
            if(isset(self :: $_localize[$lang]))
                return self :: $_localize[$lang];
            else
                self :: $_localize[$lang] = array();
        }
        else{
            self :: $_localize = array();
        }
        
        $row = 1;
        if (($handle = fopen(APPLICATION_PATH . "/configs/lang_$lang.csv", "r")) !== FALSE) {
            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                $key = $data[0];
                $value = $data[1];
                
                self :: $_localize[$lang][$key]["name".$lang] = $value;
                
            }
            fclose($handle);
        }
        
        return self :: $_localize[$lang];
        
    }
}

?>