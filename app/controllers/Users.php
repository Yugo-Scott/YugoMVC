<?php 
class Users extends Controller{
  public function __construct(){
    // echo 'Users loaded';
    $this->userModel = $this->model('User');
  }

  public function register(){
    // Check for POST
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
    //   // die('submitted');
    //   // sanitaze POST data
      $firstname = filter_input( INPUT_POST, "firstname" );
      $lastname = filter_input( INPUT_POST, "lastname" );
      $email = filter_input( INPUT_POST, "email" );
      $password = filter_input( INPUT_POST, "password");
      $confirm_password = filter_input( INPUT_POST, "confirm_password");
      // if(isset($_POST['register'])){
      //   echo 'submitted';
      $data = [
        'firstname' => trim($firstname),
        'lastname' => trim($lastname),
        'email' => trim($email),
        'password' => trim($password),
        'confirm_password' => trim($confirm_password),
        'firstname_err' => '',
        'lastname_err' => '',
        'email_err' => '',
        'password_err' => '',
        'confirm_password_err' => ''
      ];
      // Validate Email
      if(empty($data['email'])){
        $data['email_err'] = 'Please enter email';
      } else {
        // check email
        if($this->userModel->findUserByEmail($data['email'])){
          $data['email_err'] = 'Email is already taken';
        }
      }
      // validate first name
      if(empty($data['firstname'])){
        $data['firstname_err'] = 'Please enter firstname';
      }
      // validate last name
      if(empty($data['lastname'])){
        $data['lastname_err'] = 'Please enter lastname';
      }
      // validate password
      if(empty($data['password'])){
        $data['password_err'] = 'Please enter password';
      } elseif(strlen($data['password']) < 6){
        $data['password_err'] = 'Password must be at least 6 characters';
      }

      // validate confirm password
      if(empty($data['confirm_password'])){
        $data['confirm_password_err'] = 'Please confirm password';
      } else {
        if($data['password'] != $data['confirm_password']){
          $data['confirm_password_err'] = 'Passwords do not match';
        }
      }
      // Make sure errors are empty
      if(empty($data['email_err']) && empty($data['firstname_err']) && empty($data['lastname_err']) && empty($data['password_err']) && empty($data['confirm_password_err'])){
        // Hash Password
        $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
        if($this->userModel->register($data)){
          // flash('register_success', 'You are registered and can log in');
          redirect('users/login');
        } else {
          echo 'Something went wrong';
          die('Something went wrong');
        }
      } else {
        // Load view with errors
        $this->view('users/register', $data);
      }
    } else {
      // echo 'load form';
      // // Init data
      $data = [
        'firstname' => '',
        'lastname' => '',
        'email' => '',
        'password' => '',
        'confirm_password' => '',
        'firstname_err' => '',
        'lastname_err' => '',
        'email_err' => '',
        'password_err' => '',
        'confirm_password_err' => ''
      ];

      // Load view
      $this->view('users/register', $data);
    }
  }



  public function login(){
    // Check for POST
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
    //   // die('submitted');
    //   // sanitaze POST data
      $email = filter_input( INPUT_POST, "email" );
      $password = filter_input( INPUT_POST, "password");
      // if(isset($_POST['register'])){
      //   echo 'submitted';
      $data = [
        'email' => trim($email),
        'password' => trim($password),
        'email_err' => '',
        'password_err' => '',
      ];
      // Validate Email
      if(empty($data['email'])){
        $data['email_err'] = 'Please enter email';
      }
      if(!$this->userModel->findUserByEmail($data['email'])){
        $data['email_err'] = 'No user found';
      }

      // validate password
      if(empty($data['password'])){
        $data['password_err'] = 'Please enter password';
      }
      // Make sure errors are empty
      if(empty($data['email_err']) && empty($data['password_err'])){
        // Validated
        // echo 'SUCCESS';
        $loggedInUser = $this->userModel->login($data['email'], $data['password']);
          // Create Session
        if($loggedInUser){
          // echo 'SUCCESS';
          echo $loggedInUser->id;
          echo $loggedInUser->email;
          echo $loggedInUser->firstname;
          echo $loggedInUser->lastname;

          $this->createUserSession($loggedInUser);
          echo $_SESSION['user_id'];
          echo $_SESSION['user_email'];
          echo $_SESSION['user_firstname'];
          echo $_SESSION['user_lastname'];
        } else {
          $data['password_err'] = 'Password incorrect';
          $this->view('users/login', $data);
        }
      } else {
        // Load view with errors
        $this->view('users/login', $data);
      }
    } else {
      // echo 'load form';
      // // Init data
      $data = [
        'email' => '',
        'password' => '',
        'email_err' => '',
        'password_err' => '',
      ];

      // Load view
      $this->view('users/login', $data);
    }
  }


  public function createUserSession($user){
    session_start();
    $_SESSION['user_id'] = $user->id;
    $_SESSION['user_email'] = $user->email;
    $_SESSION['user_firstname'] = $user->firstname;
    $_SESSION['user_lastname'] = $user->lastname;
    redirect('pages/index');
  //   redirect('posts');
}
  
    public function logout(){
      unset($_SESSION['user_id']);
      unset($_SESSION['user_email']);
      unset($_SESSION['user_firstname']);
      unset($_SESSION['user_lastname']);
      session_destroy();
      redirect('users/login');
    }
  }