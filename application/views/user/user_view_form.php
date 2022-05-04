<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="pt-BR">
<?php $this->load->view('_partials/head'); ?>
<body>
<?php $this->load->view('_partials/header'); ?>
<div class="container container-person mt-5 p-5">
    <?=write_message()?>
    <?php

    $action_form = '/user/save/';
    if(isset($users) ){
        foreach ($users as $User);
        $action_form = $action_form.$User->id ?>
        <h1>Edit User: <?= $User->name ?></h1>
    <?php } else { ?>
        <h1>Add User</h1>
    <?php } ?>
    <form id="form_product" method="post" enctype="multipart/form-data" action="<?=site_url($action_form)?>">
        <div class="form-row">
            <div class="col-md-4 mb-3">
                <label for="nome">Name *</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Name" required value="<?= (isset($User) ? $User->name : '') ?>">
            </div>
            <div class="col-md-4 mb-3">
                <label for="sku">Address *</label>
                <input type="text" class="form-control" id="address" name="address" placeholder="SKU" required value="<?= (isset($User) ? $User->address : '') ?>">
            
       
        <button class="btn btn-primary" type="submit">Save</button>
        <?= (isset($produto) ? '<a href="#" data-id="'.base_url('product/delete/'.$produto->id).'" class="btn btn-danger delete-product" data-toggle="modal" data-target="#deleteProductModal">Excluir</a>' : '') ?>
    </form>
</div>
<?php $this->load->view('_partials/product/delete_product_confirm_modal'); ?>
<?php $this->load->view('_partials/scripts'); ?>
</body>

</html>