<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('customer_model');

        if (isset($_COOKIE['AccessToken'])) {
            $token = $_COOKIE['AccessToken'];
            $verify_token = verifyAuthToken($token);
            if (!$verify_token) {
                redirect(site_url('auth/login'));
            }
        } else {
            redirect(site_url('auth/login'));
        }
    }

    public function dashboard()
    {
        $user_id = $this->session->userdata('user_id');
        $role =  $this->session->userdata('role');

        if ($role == 'O') {
            $data['org_id'] = $user_id;
            $data['desc'] = $this->customer_model->getOrgById($user_id);
            $data['role'] = $role;
            $this->load->view('includes/header');
            $this->load->view('includes/nav');
            $this->load->view('org-dashboard', $data);
            $this->load->view('includes/footer');
        } 
        elseif ($role == 'P') {
            //list of active organizer
            $list = $this->customer_model->getOranizer();
            $data['listCount'] = count($list);
            $data['list'] = $list;
            //perticipant id
            $data['user_id'] = $user_id;
            $data['role'] = $role;

            $this->load->view('includes/header');
            $this->load->view('includes/nav');
            $this->load->view('ptc-dashboard', $data);
            $this->load->view('includes/footer');
        }
    }

    public function active_fest()
    {
        //only for P 
        $role =  $this->session->userdata('role');
        if($role == 'P'){
            $data['list'] = $this->customer_model->getOranizer();
            $this->load->view('includes/header');
            $this->load->view('includes/nav');
            $this->load->view('active_fest', $data);
            $this->load->view('includes/footer');
        }
        else{
            $this->load->view('turnt_404');
        }
       
    }
    public function org_list()
    {
        //only for  P
        $role =  $this->session->userdata('role');
        if($role == 'P'){
        $org_id = $this->uri->segment(3);
        if(is_numeric($org_id) && $org_id > 0){
            $data['org_id'] = $org_id;
            $data['desc'] = $this->customer_model->getOrgById($org_id);
            $data['role'] = $this->session->userdata('role');
          
            if($data['desc']!=null){
                $this->load->view('includes/header');
                $this->load->view('includes/nav');
                $this->load->view('org-dashboard', $data);
                $this->load->view('includes/footer');
            }
           else{
            $this->load->view('turnt_404');
           }    
        }
        else{
            $this->load->view('turnt_404');
        }
       
        }
        else{
            $this->load->view('turnt_404');
        }
      
    }
    public function profile()
    {
        //for all
        $data = [];
        $user_id = $this->session->userdata('user_id');
        $res = $this->customer_model->get_profile($user_id);
        $data['name'] = $res->name;
        if ($res->role == 'P') {
            $data['dob'] = $res->dob;
            $data['clg'] = $res->college;
        }
        $data['email'] = $res->email;
        $data['phone'] = $res->phone;
        $data['role'] = $res->role;
        $data['profile_img'] = $res->profile_img;

        $this->load->view('includes/header');
        $this->load->view('includes/nav');
        $this->load->view('profile_view', $data);
        $this->load->view('includes/footer');
    }

    public function profile_ajax()
    {
        //for all
        $data = [];
        $status = [];
        if($this->input->post || $this->input->is_ajax_request()) {
            $user_id = $this->input->post('user_id');
            $role = $this->session->userdata('role');

            $data['name'] = $this->input->post('name');
            $data['phone'] = $this->input->post('phone');
            $data['email'] = $this->input->post('email');

            if ($role == 'P') {
                $data['college'] = $this->input->post('clg');
                $data['dob'] = $this->input->post('dob');
            }

            if (isset($_FILES['profile_img']['name'])) {
                
                $dir_website = $this->config->item('dir_website');
                if (!is_dir($dir_website . 'assets/profile')) {
                    mkdir($dir_website . 'assets/profile', 0777, true);
                }
                $config = [
                    'upload_path' => $dir_website . 'assets/profile',
                    'allowed_types' => 'jpg|png|jpeg',
                    'max_size' => '5500',
                ];

                $this->upload->initialize($config);
                if (!$this->upload->do_upload('profile_img')) {
                    $status = [
                        'upload_error' => $this->upload->display_errors(),
                        'code'=>403
                    ];
                } else {
                    $data['profile_img'] = $this->upload->data('file_name');
                }
                
            }

            $res = $this->customer_model->update_profile($data, $user_id);
            if ($res) {
                $status = ['code' => 200];
            }
        }
        echo json_encode($status);
    }

    public function updateDesc(){
        //only for O
        $role =  $this->session->userdata('role');
        if($role == 'O'){
        $status = [];
        if ($this->input->post || $this->input->is_ajax_request()) {
            $data['desc']=$this->input->post('desc');
            $user_id = $this->session->userdata('user_id');
            $res = $this->customer_model->update_profile($data, $user_id);
            if ($res) {
                $status = ['code' => 200];
            }
        }
        echo json_encode($status);
    }
    else{
        $this->load->view('turnt_404');
    }
}

public function logout(){
        $arr_cookie_options = [
            'expires' => time() - 60 * 60,
            'path' => '/',
            'domain' => null,
            'secure' => false,
            'httponly' => true,
            // 'samesite' => 'Strict' // None || Lax  || Strict
        ];

        setcookie('AccessToken', false, $arr_cookie_options);
        $this->session->sess_destroy();
        redirect('Auth/login');
    }

    public function chatbot(){
        $this->load->view('includes/header');
        $this->load->view('includes/nav');
        $this->load->view('chat-box');
        $this->load->view('includes/footer');
    }
}

?>
