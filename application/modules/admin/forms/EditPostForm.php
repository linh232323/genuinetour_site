<?php

class Admin_Form_EditPostForm extends Zend_Form {

    public function init() {
        $this->setAction('');
        $this->setMethod('post');

        $id = $this->createElement("hidden", "id");
        $this->addElement($id);

        $title = $this->createElement("text", "title");
        $title->setAttrib("class", "text-input small-input");
        $title->setLabel("Tiêu đề");
        $this->addElement($title);

        $url = $this->createElement("text", "thumbnail_url");
        $url->setAttrib("class", "text-input small-input browse");
        $url->setLabel("URL Thumbnail");
        $this->addElement($url);
        
        $description = $this->createElement("textarea", "description");
        $description->setAttrib("class", "text-input small-input");
        $description->setLabel("Mô tả chung (ít hơn 255 kí tự)");
        $this->addElement($description);
        
        $content = $this->createElement("textarea", "content");
        $content->setAttrib("class", "ckeditor");
        $content->setLabel("Nội dung");
        $this->addElement($content);

       

        $model = new Admin_Model_PostCategory();
        $data = $model->PostCategory_listall();
        $post_cat_id = $this->createElement("select", "post_cat_id");
        $post_cat_id->setAttrib("class", "text-input small-input");
        foreach ($data as $d){
        	$post_cat_id->addMultiOption($d['id'],$d['name']);
        }
        $post_cat_id->setLabel("Thư mục");
        $this->addElement($post_cat_id);
        
        $submit = $this->createElement("submit", "save");
        $submit->setLabel("Lưu");
        $submit->setAttrib("class", "button");
        $this->addElement($submit);
    }

}

?>