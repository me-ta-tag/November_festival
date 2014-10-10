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
    var $uses = array('Item', 'Category', 'ticket','Cost');


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
                    $pdo = $this->Item->getDatasource()->getConnection();
                    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES,FALSE);
                    $items = $this->Item->find('all',$params);

                    $ticparams = [
                    ];
                    $tickets = $this->ticket->find('all', $ticparams);

                    $cateparamas = [
                        'conditions' => array('shop_id'=> $id),
                        'order' => 'id ASC'
                    ];
                    $categorys = $this->Category->find('all',$cateparamas);

                    $costparams = [
                        'conditions' => array('shop_id' => $id),
                        'order' => 'id ASC'
                    ];
                    $costs = $this->Cost->find('all',$costparams);
                    // viewにはjson形式のファイルを表示させるように。
                    $this->layout = 'ajax';
                    $this->RequestHandler->setContent('json');
                    $this->RequestHandler->respondAs('application/json; charset=UTF-8');

                    // $studentsの配列をviewに渡す。
                    $this->set('items', ['item' => $items,'category' => $categorys,'ticket' =>$tickets,'cost'=>$costs]);
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

        if($this->request->is('ajax')){
            if($this->request->is('post')){
                try{
                    //var_dump($this->request->data);
                    $data = $this->request->data['Item'];
                    $insertArray = [];
                    foreach($data as $value){
                        array_push($insertArray,$value);
                    }

                    if ($this->Item->saveAll($insertArray)){
                        //echo "true";

                    }else{
                        echo "error";
                        //$this->log("validationErrors=" . var_export($this->Item->validationErrors, true));
                    }
                    $this->response->header('Location', "../shops/registration");
                }catch (Exception $e){
                    echo $e;
                }
            }
        }else{
            if($this->request->is('post')){
                try{
                    //var_dump($this->request->data);
                    $data = $this->request->data['Item'];

                    if ($this->Item->saveAll($data)){
                        //echo "true";


                    }else{
                        echo "error";
                        //$this->log("validationErrors=" . var_export($this->Item->validationErrors, true));
                    }
                }catch (Exception $e){
                    echo $e;
                }
            }
        }
    }


    // 該当するIDのカラムを削除する
    public function delete(){
       if($this-> request -> is('ajax')){
            if ($this -> request -> is('post') ){
                $items_id = $this -> request -> data['id'];
                $this->Item->delete($items_id);
            }
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

    public function testupload(){
        die(json_encode($_FILES));
    }

}
