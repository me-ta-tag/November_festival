<h1>upload test</h1>
<?php echo $this->Form->create('Item',array('name'=>'uploadForm','id'=>'uploadForm','type'=>'file'));?>
<?php echo $this->Form->input('Item.item_photo',
        array(
            'label'=>'Upload Text File ',
            'type'=>'file'
        )
    );?>
<?php echo $this->Form->button('アップロード',
    array('onClick'=>'$("#uploadForm").ajaxSubmit({target: "#uploadFile",url: "/items/upload"});debugger;return false;')
    );?>
</form>
<div id="uploadFile"></div>