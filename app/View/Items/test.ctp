<?php echo $this->Form->create('Item', array('type' => 'file')); ?>
<?php echo $this->Form->input('Item.0.item_name'); ?>
<?php echo $this->Form->input('Item.0.item_price'); ?>
<?php echo $this->Form->input('Item.0.item_detail', array('type' => 'textarea')); ?>
<?php echo $this->Form->input('Item.0.item_photo', array('type' => 'file')); ?>
<?php echo $this->Form->input('Item.0.item_photo_dir', array('type' => 'hidden')); ?>
<?php echo $this->Form->input('Item.0.item_leader'); ?>
<?php echo $this->Form->input('Item.0.shop_id' , array('type'=> 'text')); ?>
<?php echo $this->Form->input('Item.0.category_id' , array('type'=> 'text')); ?>
<?php echo $this->Form->input('Item.1.item_name'); ?>
<?php echo $this->Form->input('Item.1.item_price'); ?>
<?php echo $this->Form->input('Item.1.item_detail', array('type' => 'textarea')); ?>
<?php echo $this->Form->input('Item.1.item_photo', array('type' => 'file')); ?>
<?php echo $this->Form->input('Item.1.item_photo_dir', array('type' => 'hidden')); ?>
<?php echo $this->Form->input('Item.1.item_leader'); ?>
<?php echo $this->Form->input('Item.1.shop_id' , array('type'=> 'text')); ?>
<?php echo $this->Form->input('Item.1.category_id' , array('type'=> 'text')); ?>
<?php echo $this->Form->end('Submit'); ?>

