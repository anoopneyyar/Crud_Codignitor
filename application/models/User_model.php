<?php
class User_model extends CI_Model {

    public function getUsers(){
        $this->db->order_by('id');
      //  $this->db->where('status', 1);
        $query = $this->db->get('user');
        return $query->result();
    }

    public function getProductsByOrderId($id){
        $this->db->join('product_order', 'product_order.product_id = product.id');
        $this->db->join('order', 'product_order.order_id = order.id');
        $this->db->select('product.nome, product.sku, product.preco, product_order.product_qtd');
        $this->db->order_by('product.id');
        $this->db->where('product_order.order_id', $id);
        $this->db->where('order.status', 1);
        $query = $this->db->get('product');
        return $query->result();
    }

    public function getUserById($id){
        $this->db->where('id', $id);
       // $this->db->where('status', 1);
        $query = $this->db->get('user');
        return $query->result();
    }

    public function createUser($form_data){
        $this->db->insert('user', $form_data);
        return ($this->db->affected_rows() != 1) ? false : true;
    }

    public function updateUser($form_data){
        $this->db->where('id', $form_data['id']);
        $this->db->update('user', $form_data);
        return ($this->db->affected_rows() != 1) ? false : true;
    }

    public function deleteProduct($id){
        $this->db->set('status', 0);
        $this->db->where('id', $id);
        $this->db->where('status', 1);
        $this->db->update('product');
        return ($this->db->affected_rows() != 1) ? false : true;
    }
}