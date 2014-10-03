<?php
/**
 * Created by PhpStorm.
 * User: LastyRain, Zenkun
 * Date: 2014/08/14
 * Time: 16:00
 */

App::uses('AppController', 'Controller');

class ItemsController extends AppController {
//    public $scaffold;
    var $uses = array('Item', 'Category', 'ticket');


    public $components = array('RequestHandler');
    //読み込むコンポーネントの指定

    //どのアクションが呼ばれてもはじめに実行される関数
    public function beforeFilter()
    {

//        parent::beforeFilter();

        //未ログインでアクセスできるアクションを指定
        //これ以外のアクションへのアクセスはloginにリダイレクトされる規約になっている
//        $this->Auth->allow('register', 'login');
    }

    /**
     * 商品リスト取得
     * $_GET['shop_id']を取得し、それに該当するデータを取得する
     */
    public function read(){


        $id = $_GET['shop_id'];
        if ($this->request->is('ajax')) {
            if (isset($id)){
                if($id != 0){

                    $params = array(
                        'conditions' => array('Item.shop_id'=> $id),
                        'order' => 'Item.id ASC'
                    );
                    $items = $this->Item->find('all',$params);

                    $ticparams = [
                    ];
                    $tickets = $this->ticket->find('all', $ticparams);

                    $cateparamas = [
                        'conditions' => array('shop_id'=> $id),
                        'order' => 'id ASC'
                    ];
                    $categorys = $this->Category->find('all',$cateparamas);
                    // viewにはjson形式のファイルを表示させるように。
                    $this->layout = 'ajax';
                    $this->RequestHandler->setContent('json');
                    $this->RequestHandler->respondAs('application/json; charset=UTF-8');

                    // $studentsの配列をviewに渡す。
                    $this->set('items', ['item' => $items,'category' => $categorys,'ticket' =>$tickets]);
                }
            }
//            $this->disableCache();
        }else{
            throw new NotFoundException();
        }
    }
//        var_dump($this->Auth->user());
//        $this->set('shop', $this->Auth->user());
        //var_dump($this->Auth->user()['id']);

//        $shop_id = $this->Auth->user()->id;

   public function metaread(){
        if($this->request->is('ajax')) {
            if ($this->request->is('get')) {
                $params = array(
                    'conditions' => array('Item.shop_id' => 1),
                    'order' => 'Item.id DESC'
                );
                $items = $this->Item->find('all', $params);
                // viewにはjson形式のファイルを表示させるように。
                $this->layout = 'ajax';
                $this->RequestHandler->setContent('json');
                $this->RequestHandler->respondAs('application/json; charset=UTF-8');

                // $studentsの配列をviewに渡す。
                $this->set('items', $items);
            } else {
                throw new NotFoundException();
            }
        }else{
            throw new NotFoundException();
        }
    }


    // POSTされた内容を追加する処理
    public function add(){
        //$items_base = array();
        // アイテム取得処理
        if($this -> request -> is('ajax') ){
            if ($this -> request -> is('post') ){

                $addArray = [
                    item_name => 1,
                    item_price => 1,
                    item_detail => 0,
                    item_photo => 0,
                    item_stock => 0,
                    item_leader => 0,
                    shop_id => "shop_id",
                    category_id => "category_id"
                ];//1はNot Null 0は Nullあり、その他はその他の処理
            
                // 試験運転のGET版 : 上記isをgetにした際に用いれる
                //var_dump($this -> request -> data['item_name']);
                // POST版
                $items_base = $this->checkList($addArray,$this -> request -> data,'Item');




                // デ―タをInsert
                /*$items_data = array('Item' => $items_base);
                $items_fields = array();
                foreach ($items_base as $items_key => $items_value) {
                     array_push($items_fields, $items_key);
                }*/
                //$this->Item->save($items_data, false, $items_fields);
                $this->Item->saveAll($items_base);
            }   
        }
    }



    // POSTされたIDの内容を変更する
//    public function update(){
//        $items_base = array();
//        if($this->request->is('ajax')) {
//            if ($this->request->is('post')) {
//                // 変更対象のID
//                if(isset($this -> request -> data['item_name'])){
//                    $items_base['item_name'] = $this -> request -> data['item_name'];
//                }
//                if(isset($this -> request -> data['item_price'])){
//                    $items_base['item_price'] = $this -> request -> data['item_price'];
//                }
//                if(isset($this -> request -> data['item_detail'])){
//                    $items_base['item_detail'] = $this -> request -> data['item_detail'];
//                }
//                if(isset($this -> request -> data['item_photo'])){
//                    $items_base['item_photo'] = $this -> request -> data['item_photo'];
//                }
//                if(isset($this -> request -> data['item_stock'])){
//                    $items_base['item_stock']= $this -> request -> data['item_stock'];
//                }
//                if(isset($this -> request -> data['item_leader'])){
//                    $items_base['item_leader'] = $this -> request -> data['item_leader'];
//                }
//                if(isset($this -> request -> data['shop_id'])){
//                    $items_base['shop_id']= $this -> request -> data['shop_id'];
//                    // 該当IDがあるかチェック
//                    $shop_id_is_found = $this->Shop->find(
//                            'first', array(
//                                    'fields' => array('id'),
//                                    'conditions' => array('id' => $items_base['shop_id'])
//                                    )
//                            );
//                    // 対応するIDが見当たらない場合終了
//                    if(empty($shop_id_is_found)){
//                        echo("対応するshop_idはありません。<br/>");
//                        return;
//                    }
//                }
//                if(isset($this -> request -> data['category_id'])){
//                    $items_base['category_id']= $this -> request -> data['category_id'];
//                    // Categoryモデルの呼び出し
//                    $this->loadModel('Category');
//                    $this->Category = new Category();
//                    // 該当IDがあるかチェック
//                    $category_id_is_found = $this->Category->find(
//                            'first', array(
//                                    'fields' => array('category_name'),
//                                    'conditions' => array('category_name' => $items_base['category_id'])
//                                    )
//                            );
//                    // 対応するIDが見当たらない場合終了
//                    if(empty($category_id_is_found)){
//                        return;
//                    }
//                }
//                //update対象のデータを探す
//                if(isset($this -> request -> data['id'])){
//                    $items_base['id'] = $this -> request -> data['id'];
//                    $items_id_is_found = $this->Item->find(
//                                    'first', array(
//                                        'fields' => array('Item.id'),
//                                        'conditions' => array('Item.id' => $items_base['id'])
//                                    )
//                            );
//                    if(empty($items_id_is_found)){
//                        echo("対応するidはありません。<br/>");
//                        return;
//                    }
//                    // デ―タをUpdate
//                    $items_data = array('Item' => $items_base);
//                    $items_fields = array();
//                    foreach ($items_base as $items_key => $items_value) {
//                        array_push($items_fields, $items_key);
//                    }
//                    $this->Item->save($items_data, false, $items_fields);
//                }
//            }
//        }
//    }


    public function update(){
        // アイテム取得処理
        if($this-> request -> is('ajax')){
            if ($this -> request -> is('post') ){

                $addArray = [
                    id => 1,
                    item_name => 1,
                    item_price => 1,
                    item_detail => 0,
                    item_photo => 0,
                    item_stock => 0,
                    item_leader => 0,
                    shop_id => "shop_id",
                    category_id => "category_id"
                ];//1はNot Null 0は Nullあり、その他はその他の処理


                // POST版
                $items_base = $this->checkList($addArray,$this -> request -> data,'Item');

                // デ―タをInsert
                /*$items_data = array('Item' => $items_base);
                $items_fields = array();
                foreach ($items_base as $items_key => $items_value) {
                    array_push($items_fields, $items_key);
                }*/
                foreach($items_base as $val){

                    $this->Item->updateAll(
                        [
                            'item_name' =>  $val['item_name'],
                            'item_price' =>  $val['item_price'],
                            'item_detail' =>  $val['item_detail'],
                            'item_photo' =>  $val['item_photo'],
                            'item_stock' =>  $val['item_stock'],
                            'item_leader'=>  $val['item_lender'],
                            'shop_id' =>  $val['shop_id'],
                            'category_id' =>  $val['category_id'],
                        ],
                        [
                                'id'   =>  $val['id']
                        ]
                    );

                }
            }
        }

    }


    public function checkList($list,$data,$exportKey){
        $export = [$exportKey];
        $export[$exportKey] = [];
        foreach($data as $array){
            $items_base = [];
            foreach ($list as $key => $value){
                if(ctype_digit($value)){
                    switch ($value) {
                        case 0:
                            if(isset($array[$key])){
                                $items_base[$key] = $array[$key];
                            }
                            break;
                        case 1:
                            if(isset($array[$key])){
                                $items_base[$key] = $array[$key];
                            }else{
                                throw new NotFoundException();
                                return false;
                            }
                            break;
                        case 'shop_id':
                            if(isset($array[$key])){
                                $items_base[$key]= $array[$key];
                                // 該当IDがあるかチェック
                                $shop_id_is_found = $this->Shop->find(
                                    'first', array(
                                        'fields' => array('id'),
                                        'conditions' => array('id' => $items_base[$key])
                                    )
                                );
                                // 対応するIDが見当たらない場合終了
                                if(empty($shop_id_is_found)){
                                    throw new NotFoundException();
                                    return false;
                                }
                            }
                            break;
                        case 'category_id':
                            if(isset($array[$key])){
                                $items_base[$key]= $array[$key];
                                // Categoryモデルの呼び出し
                                $this->loadModel('Category');
                                $this->Category = new Category();
                                // 該当IDがあるかチェック
                                $category_id_is_found = $this->Category->find(
                                    'first', array(
                                        'fields' => array('id'),
                                        'conditions' => array('id' => $items_base[$key])
                                    )
                                );
                                // 対応するIDが見当たらない場合終了
                                if(empty($category_id_is_found)){
                                    throw new NotFoundException();
                                    return false;
                                }
                            }
                            else{
                                throw new NotFoundException();
                                return false;
                            }
                            break;
                    }
                }
            }
            array_push($export[$exportKey],$items_base);

        }
        return $export;
    }



    public function upload(){
//        var_dump( $_FILES['files']['name'] );
        $uploadfile = "../webroot/img/"  .  $_FILES['file']['name'] ;
        if (move_uploaded_file( $_FILES['file']['tmp_name'] , $uploadfile) == false ) {
            $response = array('ret'=> "0");
            echo json_encode($response );
            exit();
        }else{
            $response = array('ret'=> "1");
            echo json_encode($response );
            exit();
        }
    }

    public function test(){
        try{
            //if($this->request->is('ajax')){
                if($this->request->is('post')){
                    //var_dump($this->request->data);
                    $data = $this->request->data;
//            var_dump($data);
                    if ($this->Item->saveAll($data)){
                        echo "true";
                    }else{
                        echo "error";
                        //$this->log("validationErrors=" . var_export($this->Item->validationErrors, true));
                    }

                    //$this->Item->save($this->request->data);
                }
            //}
        }catch (Exception $e){
            echo $e;
        }

    }
    public function test2(){
        if($this->request->is('post')){
            var_dump($this->request->data);
            $this->Item->save($this->request->data);
        }
    }

    public function testupload(){
        die(json_encode($_FILES));
    }

}
