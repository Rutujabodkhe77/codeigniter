

<?php if($this->session->userdata('logged_in')):?>
<h2>Logout</h2>
<?php echo form_open('users/logout');?>
<p>
<?php if ($this->session->userdata('username')):?>
<?php echo "You are logged in as " .  $this->session->userdata('username');?>
<?php endif;?>
</p>
<?php
$data=array(
    'class'=>'btn btn-primary',
    'name'=>'submit',
    'value'=>'Logout' 
); 
?>
<?php echo form_submit($data)?>

<?php echo form_close();?>


<?php else:?>


<h2> Login Form </h2>

<?php $attributes = array('id'=>'login_form','class'=>'form-horizontal');?>
<?php if($this->session->flashdata('errors')):?>
<?php echo $this->session->flashdata('errors');?>
<?php endif;?>
<?php echo form_open('users/login',$attributes);?>

<div class="form-group mt-3">

<?php echo form_label('Username :');?>


<?php 
$data =array(
    'class'=>'form-control',
    'name'=>'username',
    'placeholder'=>'Enter username',
    
);
?>

<?php echo form_input($data);?>

</div>

<div class="form-group mt-3">

<?php echo form_label('Password :');?>


<?php 
$data =array(
    'class'=>'form-control',
    'name'=>'password',
    'placeholder'=>'Enter password',
    
);
?>

<?php echo form_password($data);?>

</div>
<div class="form-group mt-3">

<?php echo form_label(' Confirm Password :');?>


<?php 
$data =array(
    'class'=>'form-control',
    'name'=>' confirm password',
    'placeholder'=>'confirm  password',
    
);
?>

<?php echo form_password($data);?>

</div>


<div class="form-group mt-3">




<?php 
$data =array(
    'class'=>'btn btn-primary ',
    'name'=>'submit',
    'value'=>'Login',
    
);
?>

<?php echo form_submit($data);?>
</div>
<?php echo form_close();?>

<?php endif;?>


