<?php echo $this->Form->create('Item', array('type' => 'file')); ?>
<?php echo $this->Form->input('Item.item_name'); ?>
<?php echo $this->Form->input('Item.item_price'); ?>
<?php echo $this->Form->input('Item.item_detail', array('type' => 'textarea')); ?>
<?php echo $this->Form->input('Item.item_photo', array('type' => 'file')); ?>
<?php echo $this->Form->input('Item.item_photo_dir', array('type' => 'hidden')); ?>
<?php echo $this->Form->input('Item.shop_id' , array('type'=> 'text')); ?>
<?php echo $this->Form->input('Item.category_id' , array('type'=> 'text')); ?>
<?php echo $this->Form->end('Submit'); ?>