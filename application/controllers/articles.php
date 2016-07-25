<?php

class Articles extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('m_db');
    }

    function index($start = 0)//index page
    {
        $data['posts'] = $this->m_db->get_posts(5, $start);

        //pagination
        $this->load->library('pagination');
        $config['base_url'] = base_url().'articles/index/';//url to set pagination
        $config['total_rows'] = $this->m_db->get_post_count();
        $config['per_page'] = 5;

        $this->pagination->initialize($config);
        $data['pages'] = $this->pagination->create_links(); //Links of pages

        $this->load->view('articles/header');
        $this->load->view('articles/content', $data);
        $this->load->view('articles/footer');

    }

    function post($slug)//single post page
    {
        $this->load->model('m_comment');
        $data['comments'] = $this->m_comment->get_comment($slug);

        $data['post'] = $this->m_db->get_post($slug);

        $this->load->view('articles/header');
        $this->load->view('articles/post', $data);
        $this->load->view('articles/footer');
    }

    function new_post()//Creating new post page
    {
        if(!$this->check_permissions('author'))//when the user is not an andmin and author
        {
            redirect(base_url().'users/login');
        }
        if($this->input->post())
        {
            $data = array(
                'post_title' => $this->input->post('post_title'),
                'content' => $this->input->post('content'),
                'active' => 1,
                'slug' => url_title($post_title, 'dash', true),
            );

            $this->m_db->insert_post($data);
            redirect(base_url().'articles/');
        }
        else {

            $this->load->view('header');
            $this->load->view('v_new_post');
            $this->load->view('footer');
        }
    }
    function editpost($post_id)//Edit post page
    {
        if(!$this->check_permissions('author'))//when the user is not an andmin and author
        {
            redirect(base_url().'users/login');
        }
        $data['success'] = 0;

        if($this->input->post())
        {
            $data = array(
                'post_title' => $this->input->post('post_title'),
                'content' => $this->input->post('content'),
                'active' => 1
            );
            $this->m_db->update_post($post_id, $data);
            $data['success'] = 1;
        }
        $data['post'] = $this->m_db->get_post($post_id);

        $this->load->view('header');
        $this->load->view('v_edit_post',$data);
        $this->load->view('footer');
    }
    function deletepost($post_id)//delete post page
    {
        if(!$this->check_permissions('author'))//when the user is not an andmin and author
        {
            redirect(base_url().'users/login');
        }
        $this->m_db->delete_post($post_id);
        redirect(base_url().'articles/');
    }

    function check_permissions($required)//checking current user's permission
    {
        $user_type = $this->session->userdata('user_type');//curren user
        if($required == 'user')//requirment is user
        {
            if($user_type){return TRUE;}//all user have permission
        }
        elseif($required == 'author')//when requirement is author
        {
            if($user_type == 'author' || $user_type == 'admin')//author and admin have the permission
            {
                return TRUE;
            }
        }
        elseif($required == 'admin')//when required is admin
        {
            if($user_type == 'admin'){return TRUE;}//only admin have the permission
        }
    }
}