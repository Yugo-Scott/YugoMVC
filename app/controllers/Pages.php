<?php
class Pages extends Controller {
  public function __construct(){
    // echo 'Pages loaded';
    $this->postModel = $this->model('Post');
  }
  
  public function index(){
    $posts = $this->postModel->getPosts();
    $data=['title'=>'hello I am YugoMVC',
    'description'=>'Simple social network built on the YugoMVC PHP framework, version 1.0.0',
    'posts'=>$posts];

    // echo 'index';
    $this->view('pages/index',$data);
  }
  public function about($id){
    // echo $id;
    $data=['title'=>'About Us'];
    $this->view('pages/about',$data);
    }
}