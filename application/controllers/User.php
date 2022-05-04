<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model','user');
    }

    public function index()
    {
        $data = array();
        $data['users'] = $this->user->getUsers();
        $this->load->view('user/user_view', $data);
    }

    public function form($user_id = null)
    {
        $data = array();
        if($user_id){
            $data['users'] = $this->user->getUserById($user_id);
        }
        $this->load->view('user/user_view_form', $data);
    }

    public function save($id = null)
    {
        $form_data = array
        (
            'id' => $id,
            'name' => $this->input->post('name'),
            'address' => $this->input->post('address'),
            
        );
        if(!$id){
            $send_form = $this->user->createUser($form_data);
        } else {
            $send_form = $this->user->updateUser($form_data);
        }

        if($send_form){
            $this->session->set_flashdata('mensagem', array('success','Operation successful'));
            redirect('user');
        }
        else
        {
            $this->session->set_flashdata('mensagem', array('danger','Ops! Some error occured!'));
            redirect('user/form');
        }
    }

    public function delete($id)
    {
        $delete = $this->user->deleteProduct($id);
        if($delete){
            $this->session->set_flashdata('mensagem', array('success','Produto deletado com sucesso!'));
            redirect('user');
        }
        else
        {
            $this->session->set_flashdata('mensagem', array('danger','Ops! Produto não encontrado!'));
            redirect('user');
        }
    }
}
