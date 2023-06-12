<?php
class Pages extends Controller {
  public function __construct(){
    // echo 'Pages loaded';
    // $this->postModel = $this->model('Post');
  }
  
  public function index(){

    $data=['title'=>'hello I am YugoMVC',
    'description'=>'an open-source PHP web framework, simplifies robust web application development with advanced features, frequent updates, and strong demand for its developers',
    // 'posts'=>$posts
  ];

    // echo 'index';
    $this->view('pages/index',$data);
  }
}