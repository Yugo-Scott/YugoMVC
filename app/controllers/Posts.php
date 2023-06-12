<?php
class Posts extends Controller {
  public function __construct(){
    if(!isLoggedIn()){
      redirect('users/login');
    }

    $this->postModel = $this->model('Post');
    $this->userModel = $this->model('User');
  }

  public function index(){
    // Get posts
    $posts = $this->postModel->getPosts();

    $data = [
      'posts' => $posts
    ];
    $this->view('posts/index',$data);
  }
 
 public function add(){
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
      // Sanitize POST array
      $data = [
        'title' => trim($_POST['title']),
        'user_id' => $_SESSION['user_id'],
        'body' => trim($_POST['body']),
        'post_url' => trim($_POST['post_url']),
        'title_err' => '',
        'body_err' => '',
        'post_url_err' => ''
      ];

      // Validate data
      if(empty($data['title'])){
        $data['title_err'] = 'Please enter title';
      }
      if(empty($data['body'])){
        $data['body_err'] = 'Please enter body text';
      }
      if(empty($data['post_url'])){
        $data['post_url_err'] = 'Please enter post url';
      }

      // Make sure no errors
      if(($data['title']) && ($data['body']) && ($data['post_url'])){
        // Validated
        if($this->postModel->addPost($data)){
          // flash('post_message', 'Post Added');
          redirect('posts');
        } else {
          die('Something went wrong');
        }
      } else {
        // Load view with errors
        $this->view('posts/add',$data);
      }

    } else {
      $data = [
        'title' => '',
        'body' => '',
        'post_url' => ''
      ];
      $this->view('posts/add',$data);
    }
  }

  public function show($id){
    $post = $this->postModel->getPostById($id);
    $user = $this->userModel->getUserById($post->user_id);

    $data = [
      'post' => $post,
      'user' => $user
    ];
    $this->view('posts/show',$data);
  }

  public function edit($id){
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
      // Sanitize POST array
      $data = [
        'id' => $id,
        'title' => trim($_POST['title']),
        'user_id' => $_SESSION['user_id'],
        'body' => trim($_POST['body']),
        'post_url' => trim($_POST['post_url']),
        'title_err' => '',
        'body_err' => '',
        'post_url_err' => ''
      ];

      // Validate data
      if(empty($data['title'])){
        $data['title_err'] = 'Please enter title';
      }
      if(empty($data['body'])){
        $data['body_err'] = 'Please enter body text';
      }
      if(empty($data['post_url'])){
        $data['post_url_err'] = 'Please enter post url';
      }

      // Make sure no errors
      if(($data['title']) && ($data['body']) && ($data['post_url'])){
        // Validated
        if($this->postModel->updatePost($data)){
          // flash('post_message', 'Post Added');
          redirect('posts');
        } else {
          die('Something went wrong');
        }
      } 
    } else {
      if($post = $this->postModel->getPostById($id)
      ){
        $data = [
          'id' => $id,
          'title' => $post->title,
          'body' => $post->body,
          'post_url' => $post->post_url
        ];
        $this->view('posts/edit',$data);
      } 
    }
  }

  public function delete($id){
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
      if($this->postModel->deletePost($id)){
        // flash('post_message', 'Post Removed');
        redirect('posts');
      } else {
        die('Something went wrong');
      }
    } else {
      redirect('posts');
    }
  }

}