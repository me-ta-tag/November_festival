<h2>Edit Items</h2>
<?php
    //var_dump($items);
    $exh = $items['exhibitor'];
    $category = $items['category'];
    $it = $items['item'];


    $exhibitor = array();
    array_push($exhibitor,"");
    foreach($exh as $k => $v){
        foreach($v['Exhibitor'] as $key => $value){
            if($key == "name"){
                array_push($exhibitor,$value);
            }
        }
    }

    $categorys = array();
    array_push($categorys,"");
    foreach($category as $k => $v){
        foreach($v['Category'] as $key => $value){
            if($key == "category_name"){
                array_push($categorys,$value);
            }
        }
    }
    $item = $items['item'][0]['Item'];
    //var_dump($item);

?>
<?php
echo $this->Form->create("Item", array('action'=>'edit','type' => 'file'));


$option = array(
    'item_name' => array(),
    'item_price' => array(),
    'item_detail' => array('type' => 'textarea'),
    'item_photo' => array('type' => 'file'),
    'item_photo_dir' => array('type' => 'hidden'),
    'item_leader' => array('type'=>'text','class' => 'checkChange'),
    'item_stock' => array(),
    'exhibitor_id' => array('type' => 'select','options' => $exhibitor),
    'shop_id' => array('type' => 'text'),
    'category_id' => array( 'type' => 'select','options' => $categorys),
    'tweet' => array('type'=>'text')
);

foreach($option as $k => $val){
    if($k == 'item_leader'){
        echo $this->Form->input($k,listSetting($val,$option[$k],false));
    }else{
        echo $this->Form->input($k,listSetting($val,$option[$k]));
    }
}

echo $this->html->image('item/item_photo/'.$item['item_photo_dir'].'/'.$item['item_photo'],array('alt' =>'img','width' => '200','height' => '200'));

echo $this->Form->end('Save!');
echo ("<a href='/regi/shops/registration'>Back</a>");

function listSetting($value,$option,$boolean = false){
    $ret = array();
    if(isset($value)){
        //var_dump($value);
        if($boolean){
            if($value==1){
                $ret['checked'] = "checked";
                //$ret['value'] = 1;
            }else{
                    //$ret['value'] = 0;
            }
        }else{
                //$ret['value'] = $value;
        }
    }
    foreach($option as $key => $value){
        $ret[$key] = $value;
    }
        //var_dump($ret);
    return $ret;
}