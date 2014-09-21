<?php
/**
 * Created by PhpStorm.
 * User: LastyRain
 * Date: 2014/08/14
 * Time: 16:00
 */

App::uses('AppController', 'Controller');

class ItemsController extends AppController {
//    public $scaffold;

    public $item = ['Item'];
    public $helpers= array('html' ,'Form');


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

    //ログイン後にリダイレクトされるアクション
    public function read(){
        $id = $_GET['shop_id'];
        if ($this->request->is('ajax')) {
            if (isset($id)){
                if($id != 0){
                    $params = array(
                        'conditions' => array('Item.shop_id'=> $id),
                        'order' => 'Item.id DESC'
                    );
                    $items = $this->Item->find('all',$params);
                    // viewにはjson形式のファイルを表示させるように。
                    $this->layout = 'ajax';
                    $this->RequestHandler->setContent('json');
                    $this->RequestHandler->respondAs('application/json; charset=UTF-8');

                    // $studentsの配列をviewに渡す。
                    $this->set('items', $items);
                }
            }
//            $this->disableCache();
        }
    }
//        var_dump($this->Auth->user());
//        $this->set('shop', $this->Auth->user());
        //var_dump($this->Auth->user()['id']);

//        $shop_id = $this->Auth->user()->id;


    public function getList(){

        $params = array(
            'conditions' => array('Item.shop_id'=> $this->Auth->user()['id']),
            'order' => 'Item.id DESC'
        );
        echo json_encode($this->Shop->itemsLoad($params));
    }


    // POSTされた内容を追加する処理
    public function add(){
        $items_base = array();
        // アイテム取得処理
        if ($this -> request -> is('post') ){
        
            // 試験運転のGET版 : 上記isをgetにした際に用いれる
            // $items_base['item_name']  = $this -> request -> query['item_name'];

            // POST版
            if(isset($this -> request -> data['item_name'])){
                $items_base['item_name'] = $this -> request -> data['item_name'];
            }
            if(isset($this -> request -> data['item_price'])){
                $items_base['item_price'] = $this -> request -> data['item_price'];
            }
            if(isset($this -> request -> data['item_detail'])){
                $items_base['item_detail'] = $this -> request -> data['item_detail'];
            }
            if(isset($this -> request -> data['item_photo'])){
                $items_base['item_photo'] = $this -> request -> data['item_photo'];
            }
            if(isset($this -> request -> data['item_stock'])){
                $items_base['item_stock']= $this -> request -> data['item_stock'];
            }
            if(isset($this -> request -> data['shop_id'])){
                $items_base['shop_id']= $this -> request -> data['shop_id'];
            }
            if(isset($this -> request -> data['category_id'])){
                $items_base['category_id']= $this -> request -> data['category_id'];
            }
        }
        
        $items_data = array('Item' => $items_base);
        $items_fields = array();
        foreach ($items_base as $items_key => $items_value) {
             array_push($items_fields, $items_key);
        }
        $this->Item->save($items_data, false, $items_fields);
    }
    public function update(){
        if ($this -> request -> is('post') ){
            // 試験運転のGET版 : 上記isをgetにした際に用いれる
            // $items_base['item_name']  = $this -> request -> query['item_name'];

            // POST版
            if(isset($this -> request -> data['item_name'])){
                $items_base['item_name'] = $this -> request -> data['item_name'];
            }
            if(isset($this -> request -> data['item_price'])){
                $items_base['item_price'] = $this -> request -> data['item_price'];
            }
            if(isset($this -> request -> data['item_detail'])){
                $items_base['item_detail'] = $this -> request -> data['item_detail'];
            }
            if(isset($this -> request -> data['item_photo'])){
                $items_base['item_photo'] = $this -> request -> data['item_photo'];
            }
            if(isset($this -> request -> data['item_stock'])){
                $items_base['item_stock']= $this -> request -> data['item_stock'];
            }
            if(isset($this -> request -> data['shop_id'])){
                $items_base['shop_id']= $this -> request -> data['shop_id'];
            }
            if(isset($this -> request -> data['category_id'])){
                $items_base['category_id']= $this -> request -> data['category_id'];
            }
            $items_data = array('Item' => $items_base);
            $items_fields = array();
            foreach ($items_base as $items_key => $items_value) {
                array_push($items_fields, $items_key);
            }
            $this->Item->save($items_data, false, $items_fields);
        }
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

        if($this->request->is('post')){
            var_dump($this->request->data);
            $this->Item->save($this->request->data);
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
