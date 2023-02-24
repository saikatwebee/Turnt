<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ProShow extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('customer_model');
        $this->load->model('proshow_model');

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

    public function index()
    {
        //only for O
        $role = $this->session->userdata('role');
        if ($role == 'O') {
            $org_id = $this->session->userdata('user_id');
            $data['org_id'] = $org_id;
            $data['desc'] = $this->customer_model->getOrgById($org_id);
            $data['role'] = $role;
            $data['pro_shows'] = $this->proshow_model->getProshowById($org_id);
            $this->load->view('includes/header');
            $this->load->view('includes/nav');
            $this->load->view('pro_show', $data);
            $this->load->view('includes/footer');
        } else {
            $this->load->view('turnt_404');
        }
    }

    public function list()
    {
        //only for p
        $role = $this->session->userdata('role');

        if ($role == 'P') {
            $org_id = $this->uri->segment(3);
            if (is_numeric($org_id) && $org_id > 0) {
                $data['desc'] = $this->customer_model->getOrgById($org_id);
                $data['org_id'] = $org_id;
                $data['role'] = $role;
                $data['pro_shows'] = $this->proshow_model->getProshowById(
                    $org_id
                );
                if ($data['desc'] != null) {
                    $this->load->view('includes/header');
                    $this->load->view('includes/nav');
                    $this->load->view('pro_show', $data);
                    $this->load->view('includes/footer');
                } else {
                    $this->load->view('turnt_404');
                }
            } else {
                $this->load->view('turnt_404');
            }
        } else {
            $this->load->view('turnt_404');
        }
    }

    public function details()
    {
        $pro_id = $this->uri->segment(3);
        $data['pro_id'] = $pro_id;
        if (is_numeric($pro_id) && $pro_id > 0) {
            $role = $this->session->userdata('role');
            if ($role == 'O') {
                $org_id = $this->session->userdata('user_id');
                $data['org_id'] = $org_id;
                $data['desc'] = $this->customer_model->getOrgById($org_id);
                $data['details'] = $this->proshow_model->getProDetails(
                    $org_id,
                    $pro_id
                );
                $data['edit'] = true;
                if ($data['desc'] != null) {
                    $this->load->view('includes/header');
                    $this->load->view('includes/nav');
                    $this->load->view('pro_show_details', $data);
                    $this->load->view('includes/footer');
                } else {
                    $this->load->view('turnt_404');
                }
            } elseif ($role == 'P') {
                $org_id = $this->proshow_model->getOrgByProId($pro_id);
                $data['org_id'] = $org_id;
                $data['desc'] = $this->customer_model->getOrgById($org_id);
                $data['details'] = $this->proshow_model->getProDetails(
                    $org_id,
                    $pro_id
                );
                $data['edit'] = false;

                if ($data['desc'] != null) {
                    $this->load->view('includes/header');
                    $this->load->view('includes/nav');
                    $this->load->view('pro_show_details', $data);
                    $this->load->view('includes/footer');
                } else {
                    $this->load->view('turnt_404');
                }
            }
        } else {
            $this->load->view('turnt_404');
        }
    }

    public function getProDet(){
        if($this->input->post() || $this->input->is_ajax_request()){
            $pro_id = $this->input->post('pro_id');
            $org_id = $this->session->userdata('user_id');
            $res=$this->proshow_model->getProDetails($org_id,$pro_id);
            if($res)
            echo json_encode($res);
        }
    }

    public function updateProshow(){
       
        if($this->input->post() || $this->input->is_ajax_request()){
            $pro_id = $this->input->post('pro_id');
            $org_id = $this->session->userdata('user_id');

            $data['venue']=$this->input->post('venue');
            $data['location']=$this->input->post('location');
            $data['date']=$this->input->post('date');
            $data['from_time']=$this->input->post('from_time');
            $data['to_time']=$this->input->post('to_time');

            $res=$this->proshow_model->updateProDetails($data,$pro_id);
            // var_dump($res);
            // die;
            if($res){
                $status=['code'=>200,'msg'=>'Update Successfull' ];
                echo json_encode($status);
            }
        }
    }


    public function addPro()
    {
        $role = $this->session->userdata('role');
        if ($role == 'O') {
            //only for O
            $status = [];
            if ($this->input->post || $this->input->is_ajax_request()) {
                $data['user_id'] = $this->input->post('user_id');
                $data['celeb_name'] = $this->input->post('celeb_name');
                $data['venue'] = $this->input->post('venue');
                $data['location'] = $this->input->post('location');
                $data['date'] = $this->input->post('date');
                $data['from_time'] = $this->input->post('from_time');
                $data['to_time'] = $this->input->post('to_time');

                if (isset($_FILES['pro_img']['name'])) {
                    $dir_website = $this->config->item('dir_website');
                    if (!is_dir($dir_website . 'assets/proshow')) {
                        mkdir($dir_website . 'assets/proshow', 0777, true);
                    }
                    $config = [
                        'upload_path' => $dir_website . 'assets/proshow',
                        'allowed_types' => 'jpg|png|jpeg',
                        'max_size' => '5500',
                    ];

                    $this->upload->initialize($config);
                    if (!$this->upload->do_upload('pro_img')) {
                        $status = [
                            'upload_error' => $this->upload->display_errors(),
                            'code'=>403
                        ];
                    } else {
                        $data['pro_img'] = $this->upload->data('file_name');
                    }
                    
                }

                $res = $this->proshow_model->addProShow($data);
                    if ($res) {
                        $status = ['code' => 200];
                    }
            }
            echo json_encode($status);
        } else {
            $this->load->view('turnt_404');
        }
    }
}
?>
