ログイン画面
<?php echo $this->Session->flash('auth'); ?>
<?php echo $this->Form->create('Shop');?>
<?php
echo $this->Form->input('shop_name');
echo $this->Form->input('shop_password');
?>
<?php echo $this->Form->end('Login');?>