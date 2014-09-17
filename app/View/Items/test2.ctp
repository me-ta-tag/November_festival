<h1>upload test</h1>
<?php echo $form->create('Item',array('name'=>'uploadForm','id'=>'uploadForm','type'=>'file'));?>
<?php echo $form->input('Item.item_photo',
        array(
            'label'=>'Upload Text File ',
            'type'=>'file'
        )
    );?>
<?php echo $form->button('アップロード',
    array(
        'onClick'=>'$("#uploadForm").ajaxSubmit({target: "#uploadFile",url: "/users/upload"});
        return false;'
    )
    );?>
</form>
<div id="uploadFile"></div>