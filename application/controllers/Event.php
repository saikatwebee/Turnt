<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Event extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('customer_model');
        $this->load->model('event_model');

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
            $data['events'] = $this->event_model->getEventById($org_id);

            $this->load->view('includes/header');
            $this->load->view('includes/nav');
            $this->load->view('event', $data);
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
                $data['events'] = $this->event_model->getEventById($org_id);

                if ($data['desc'] != null) {
                    $this->load->view('includes/header');
                    $this->load->view('includes/nav');
                    $this->load->view('event', $data);
                    $this->load->view('includes/footer');
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
        $event_id = $this->uri->segment(3);
        if (is_numeric($event_id) && $event_id > 0) {
            $data['event_id'] = $event_id;
            $role = $this->session->userdata('role');
            if ($role == 'O') {
                $org_id = $this->session->userdata('user_id');
                $data['org_id'] = $org_id;
                $data['edit'] = true;
                $data['details'] = $this->event_model->getEventDetails(
                    $org_id,
                    $event_id
                );

                if ($data['details'] != null) {
                    $this->load->view('includes/header');
                    $this->load->view('includes/nav');
                    $this->load->view('event_details', $data);
                    $this->load->view('includes/footer');
                } else {
                    $this->load->view('turnt_404');
                }
            } elseif ($role == 'P') {
                $org_id = $this->event_model->getOrgByEventId($event_id);
                $data['org_id'] = $org_id;
                $data['edit'] = false;
                $data['details'] = $this->event_model->getEventDetails(
                    $org_id,
                    $event_id
                );
                if ($data['details'] != null) {
                    $this->load->view('includes/header');
                    $this->load->view('includes/nav');
                    $this->load->view('event_details', $data);
                    $this->load->view('includes/footer');
                } else {
                    $this->load->view('turnt_404');
                }
            }
        } else {
            $this->load->view('turnt_404');
        }
    }

    public function getEvent(){
        if($this->input->post() || $this->input->is_ajax_request()){
            $role = $this->session->userdata('role');
            if ($role == 'O') {
                $org_id = $this->session->userdata('user_id');
                $event_id = $this->input->post('id');
               // var_dump( $event_id );
                $details=$this->event_model->getEventDetails($org_id,$event_id);
                echo json_encode($details);
            }
        }
    }

    public function updateEvent(){
        if($this->input->post() || $this->input->is_ajax_request()){
            $role = $this->session->userdata('role');
            if ($role == 'O') {
                $org_id = $this->session->userdata('user_id');
                $event_id = $this->input->post('event_id');
                $data['venue']= $this->input->post('venue');
                $data['location']= $this->input->post('location');
                $data['date']= date('Y-m-d',strtotime($this->input->post('date')));
                $data['event_time']= $this->input->post('event_time');
                $res=$this->event_model->updateEvents($org_id,$event_id,$data);
                if($res){
                    $status=['code'=>200, 'msg'=>'Update Successfull'];
                    echo json_encode($status);
                }

            }
        }
    }

    public function getCat(){
        if($this->input->post() || $this->input->is_ajax_request()){
            $role = $this->session->userdata('role');
            if ($role == 'O') {
                $id = $this->input->post('id');
                $event_id = $this->input->post('event_id');
                $details=$this->event_model->getCatDetails($id,$event_id);
                echo json_encode($details);

            }
    }
}

 public function updateCat(){
    if($this->input->post() || $this->input->is_ajax_request()){
        $role = $this->session->userdata('role');
        if ($role == 'O') {
            $id = $this->input->post('cat_id');
            $event_id = $this->input->post('event_id');
            $data['name'] = $this->input->post('name');
            $res=$this->event_model->updateCatss($event_id,$id,$data);
            if($res){
                $status=['code'=>200, 'msg'=>'Update Successfull'];
                echo json_encode($status);
            }


        }
    }
 }

    public function add_event(){
        //only for O
        $role = $this->session->userdata('role');
        if ($role == 'O') {
            //only for O
            $status = [];
            if ($this->input->post || $this->input->is_ajax_request()) {
                $data['user_id'] = $this->input->post('user_id');
                $data['event_name'] = $this->input->post('event_name');
                $data['venue'] = $this->input->post('venue');
                $data['location'] = $this->input->post('location');
                $data['date'] = $this->input->post('date');
                $data['event_time'] = $this->input->post('event_time');
             

                if (isset($_FILES['event_img']['name'])) {
                    $dir_website = $this->config->item('dir_website');
                    if (!is_dir($dir_website . 'assets/event')) {
                        mkdir($dir_website . 'assets/event', 0777, true);
                    }
                    $config = [
                        'upload_path' => $dir_website . 'assets/event',
                        'allowed_types' => 'jpg|png|jpeg',
                        'max_size' => '5500',
                    ];

                    $this->upload->initialize($config);
                    if (!$this->upload->do_upload('event_img')) {
                        $status = [
                            'upload_error' => $this->upload->display_errors(),
                            'code' => 430
                        ];
                    } else {
                        $data['event_img'] = $this->upload->data('file_name');
                    }
                }
                $event_id = $this->event_model->addEvent($data);
                if ($event_id > 0) {
                    //$status = ['code' => 200];
                    $cat_str = $this->input->post('category');
                    $cat_arr=explode(",",$cat_str);
                    for($i=0;$i<count($cat_arr);$i++){
                        $cat_data=['event_id'=>$event_id,'name'=>$cat_arr[$i]];
                        $res = $this->event_model->addEventCategory($cat_data);
                        if($res)
                        $status=['code'=>200];
                    }

                }
            }
            echo json_encode($status);
        }
        else{
            $this->load->view('turnt_404');
        }
    }
}
?>
