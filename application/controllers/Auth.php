<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('auth_model');

        if(isset($_COOKIE["AccessToken"])){
            $token= $_COOKIE["AccessToken"];
            $verify_token = verifyAuthToken($token);
            if($verify_token){
                redirect(site_url('home/dashboard'));
            }
        }
       
        
    }

    public function index(){
        $this->load->view('includes/header');
        $this->load->view('landing');
    }

    public function createProfile(){
        $this->load->view('includes/header');
        $this->load->view('createProfile');
    }

    public function create_profile(){
        $this->load->view('includes/header');
        $this->load->view('create_profile');
    }

    public function login(){
        $this->load->view('includes/header');
        $this->load->view('login_view');
    }

    public function org_ajax(){
        $status=[];
        if($this->input->post() || $this->input->is_ajax_request()){
            // var_dump($this->input->post());
            // die;
            $hashed_pwd = password_hash($this->input->post('password'), PASSWORD_BCRYPT);

            $data=[
                'name'=>$this->input->post('name'),
                'college'=>$this->input->post('clg'),
                'from_date'=>$this->input->post('from_date'),
                'to_date'=>$this->input->post('to_date'),
                'phone'=>$this->input->post('phone'),
                'email'=>$this->input->post('email'),
                'role'=>$this->input->post('role'),
                'password'=>$hashed_pwd
            ];

            $user_id=$this->auth_model->insertUser($data);
            $res=$this->auth_model->getByUserId($user_id);
            if($res){
                $token=$this->generate_token($res);
               //setcookie('AccessToken',$token,time() + 3600,'/','localhost',true,true);
               $arr_cookie_options = array (
                'expires' => time() + 60*60,
                 'path' => '/',
                 'domain' => null, 
                 'secure' => false,    
                 'httponly' => true,  
                  // 'samesite' => 'Strict' // None || Lax  || Strict
                 );

             setcookie('AccessToken',$token,$arr_cookie_options); 
                $decoded_token=$this->decode_token($token);
                          
                $this->session->set_userdata('user_id', $decoded_token->id);
                $this->session->set_userdata('role', $decoded_token->role);
                $this->session->set_userdata('email', $decoded_token->email);
                $this->session->set_userdata('name', $decoded_token->name);

                $status=['code'=>200];
            }
            echo json_encode($status);
        }
    }

    public function ptc_ajax(){
        $status=[];
        if($this->input->post() || $this->input->is_ajax_request()){

            $hashed_pwd = password_hash($this->input->post('password'), PASSWORD_BCRYPT);

            $data=[
                'name'=>$this->input->post('name'),
                'phone'=>$this->input->post('phone'),
                'email'=>$this->input->post('email'),
                'password'=>$hashed_pwd,
                'college'=>$this->input->post('clg'),
                'dob'=>$this->input->post('dob'),
                'role'=>$this->input->post('role')
            ];

            $user_id=$this->auth_model->insertUser($data);
            $res=$this->auth_model->getByUserId($user_id);
            if($res){
                $token=$this->generate_token($res);
               //setcookie('AccessToken',$token,time() + 3600,'/','localhost',true,true);
               $arr_cookie_options = array (
                'expires' => time() + 60*60,
                 'path' => '/',
                 'domain' => null, 
                 'secure' => false,    
                 'httponly' => true,   
                  // 'samesite' => 'Strict' // None || Lax  || Strict
                 );

             setcookie('AccessToken',$token,$arr_cookie_options); 
                $decoded_token=$this->decode_token($token);
                          
                $this->session->set_userdata('user_id', $decoded_token->id);
                $this->session->set_userdata('role', $decoded_token->role);
                $this->session->set_userdata('email', $decoded_token->email);
                $this->session->set_userdata('name', $decoded_token->name);

                $status=['code'=>200];
            }
            echo json_encode($status);
        }
    }




    public function check_login(){
        $status=[];
        if($this->input->post() || $this->input->is_ajax_request()){
            // $jwt = new JWT();
            // $JwtSecretKey ="Mysecretwordshere";

            $email = $this->input->post('email');
            $password = $this->input->post('password');
            $res= $this->auth_model->loginUser($email,$password);
            
            
            if($res){
               
                $token=$this->generate_token($res);
               // setcookie('AccessToken',$token,time() + 3600,'/','localhost',true,true);
               $arr_cookie_options = array (
                'expires' => time() + 60*60,
                 'path' => '/',
                 'domain' => null, 
                 'secure' => false,     
                 'httponly' => true,    
                  // 'samesite' => 'Strict' // None || Lax  || Strict
                 );

             setcookie('AccessToken',$token,$arr_cookie_options);  
                $decoded_token=$this->decode_token($token);
                          
                $this->session->set_userdata('user_id', $decoded_token->id);
                $this->session->set_userdata('role', $decoded_token->role);
                $this->session->set_userdata('email', $decoded_token->email);
                $this->session->set_userdata('name', $decoded_token->name);

                $status=['code'=>200];
            }
            else{
                $status=['code'=>210];
            }
            echo json_encode($status);
        }
       
    }

    

    public function generate_token($data){
        $jwt = new JWT();
        $JwtSecretKey ="Mysecretwordshere";
        $token = $jwt->encode($data,$JwtSecretKey,'HS256');
        return $token;
    }

    public function decode_token($token){
        $jwt = new JWT();
        $JwtSecretKey ="Mysecretwordshere";
        $decoded_token = $jwt->decode($token,$JwtSecretKey,'HS256');
        // echo "<pre>";
        // var_dump($decoded_token);
        // $token1=$jwt->jsonEncode($decoded_token);
        return $decoded_token[0];
    }


}