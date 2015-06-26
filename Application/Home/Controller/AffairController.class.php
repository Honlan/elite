<?php
namespace Home\Controller;
use Think\Controller;
class AffairController extends Controller {
    public function index(){
    	$this->tags = M('tag_type_boy')->select();
    	$this->tagTypeBoy = json_encode(M('tag_type_boy')->select());
    	$this->tagTypeGirl = json_encode(M('tag_type_girl')->select());
    	$this->display();
    }
}