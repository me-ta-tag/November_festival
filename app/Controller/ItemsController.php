<?php
/**
 * Created by PhpStorm.
 * User: LastyRain, Zenkun
 * Date: 2014/08/14
 * Time: 16:00
 */

App::uses('AppController', 'Controller');
App::import('Vendor', 'OAuth/OAuthClient');

class ItemsController extends AppController {
//    public $scaffold;

    var $uses = array('Item', 'Category', 'ticket','Cost','Exhibitor','Sale');
    //loadModel($uses);

    public $components = array('RequestHandler','Auth');
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

                    $ticparams = array(
                        'shop_id' => array('shop_id' => $id)
                    );
                    $tickets = $this->ticket->find('all', $ticparams);

                    $cateparamas = array(
                        'conditions' => array('shop_id'=> $id),
                        'order' => 'id ASC'
                    );
                    $categorys = $this->Category->find('all',$cateparamas);

                    $costparams = array(
                        'conditions' => array('shop_id' => $id),
                        'order' => 'id ASC'
                    );
                    $costs = $this->Cost->find('all',$costparams);

                    $salparams = array(
                        'shop_id' => array('shop_id' => 1)
                    );
                    $sales = $this->Sale->find('all', $salparams);

                    $salesArray = array();
                    foreach($sales as $key => $value){
                        //var_dump($salesArray[$value['Sale']['item_id']]);
                        if(empty($salesArray[$value['Sale']['item_id']])){
                            $salesArray[$value['Sale']['item_id']] = $value['Sale']['sale_quantity'];
                        }else{
                            $salesArray[$value['Sale']['item_id']] = $value['Sale']['sale_quantity'] + $salesArray[$value['Sale']['item_id']];
                        }
                    }

                    $outItems = array();
                    $outCount = 0;
                    foreach ($items as $key => $value) {
                        if(empty($salesArray[$items[$key]["Item"]["id"]])){
                            $items[$key]["Item"]["item_stock"] = $items[$key]["Item"]["item_stock"];
                        }else{
                            $items[$key]["Item"]["item_stock"] = $items[$key]["Item"]["item_stock"] - $salesArray[$items[$key]["Item"]["id"]];
                        }
                        if($items[$key]["Item"]["item_stock"] <= 0){
                            unset($items[$key]);
                        }else{

                            $outItems[$outCount] = $items[$key];
                            $outCount++;
                            unset($items[$key]["Item"]["tweet"]);
                        }
                    }



                    if($id == 1){
                        $exhiparams = array(
                            'order' => 'id ASC'
                        );
                        $exhibitors = $this->Exhibitor->find('all',$exhiparams);

                    }


                    //var_dump($id);

                    // viewにはjson形式のファイルを表示させるように。
                    $this->layout = 'ajax';
                    $this->RequestHandler->setContent('json');
                    $this->RequestHandler->respondAs('application/json; charset=UTF-8');

                    // $studentsの配列をviewに渡す。
                    if($id == 1){
                        $this->set('items', array('item' => $outItems,'category' => $categorys,'ticket' =>$tickets,'cost'=>$costs,'exhibitor' => $exhibitors));
                    }else{
                        //var_dump('test');
                        $this->set('items', array('item' => $outItems,'category' => $categorys,'ticket' =>$tickets,'cost'=>$costs));
                    }
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
       //response.setHeader("Access-Control-Allow-Origin","*");
        //if($this->request->is('ajax')) {
            if ($this->request->is('get')) {
                $params = array(
                    //'fields' => array( compact('item_exhibitor')),
                    'conditions' => array('Item.shop_id' => 1,
                        'AND' => array(
                            'NOT' => array(
                                'Item.item_photo' => null
                            )
                        )
                    ),
                    'order' => 'Item.id DESC'
                );
                // 'fields' => array('id','item_name','item_price','item_detail','item_photo','item_photo_dir','item_stock','item_leader','category_id','category_name'),
                $pdo = $this->Item->getDatasource()->getConnection();
                $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES,FALSE);
                $items = $this->Item->find('all', $params);

                $salparams = array(
                    'shop_id' => array('shop_id' => 1)
                );
                $sales = $this->Sale->find('all', $salparams);

                $salesArray = array();
                foreach($sales as $key => $value){
                    $salesArray[$value['Sale']['item_id']] = $value['Sale']['sale_quantity'] + $salesArray[$value['Sale']['item_id']];
                }
                //var_dump($salesArray);
                foreach ($items as $key => $value) {
                    $items[$key]["Item"]["item_stock"] = $items[$key]["Item"]["item_stock"] - $salesArray[$items[$key]["Item"]["id"]];
                    unset($items[$key]["Item"]["tweet"],$items[$key]["Item"]["item_exhibitor"],$items[$key]["Item"]["shop_id"],$items[$key]["Category"]["shop_id"]);
                }

            // viewにはjson形式のファイルを表示させるように。
                $this->layout = 'ajax';
                $this->RequestHandler->setContent('json');
                $this->RequestHandler->respondAs('application/json; charset=UTF-8');

                // $studentsの配列をviewに渡す。
                $this->set('items', $items);
            } else {
                throw new NotFoundException();
            }
        //}else{
          //  throw new NotFoundException();
        //}
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
                    if($data['Shop_id'] == 1){
                        //throw new MethodNotAllowedException();
                        return false;
                    }
                    $insertArray = array();
                    foreach($data as $value){
                        array_push($insertArray,$value);
                    }

                    if ($this->Item->saveAll($insertArray)){
                        //echo "true";

                    }else{
                        echo "error";
                        //$this->log("validationErrors=" . var_export($this->Item->validationErrors, true));
                    }
                    //$this->response->header('Location', "../shops/registration");
                }catch (Exception $e){
                    echo $e;
                }
            }
        }
    }


    // 該当するIDのカラムを削除する
    public function delete($id = null){
       if($this-> request -> is('ajax')){
            if ($this -> request -> is('post') ){
                $items_id = $this -> request -> data['id'];
                $this->Item->delete($items_id);
            }
        }else{
           if($this-> request -> is('get')){
               throw new MethodNotAllowedException();
           }else{
               if($this->Item->delete($id)){
                    $this->redirect('/shops/registration');
               }
           }
       }
    }


    public function edit($id = null){
        //未認証なら弾く
        $this->Auth->allow('register', 'login');

        $this->Item->id = $id;
        if($this->request->is("get")){
            //if($shop_id == 1){
            $params = array(
                'conditions' => array('Item.shop_id'=> 1,
                    'AND' => array(
                        'Item.id' => $id
                    )),
                'order' => 'Item.id ASC'
            );
            $pdo = $this->Item->getDatasource()->getConnection();
            $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES,FALSE);
            $items = $this->Item->find('all',$params);
                $exhiparams = array(
                    'order' => 'id ASC'
                );
                $exhibitors = $this->Exhibitor->find('all',$exhiparams);
                $cateparamas = array(
                    'conditions' => array('shop_id'=> 1),
                    'order' => 'id ASC'
                );
                $categorys = $this->Category->find('all',$cateparamas);
                $this->set('items', array('item'=>$items,'category' => $categorys,'exhibitor' => $exhibitors));

            //}
            $this->request->data = $this->Item->read();
        }else{
            if($this->Item->save($this->request->data)){
                $this->redirect('/shops/registration');
            }else{

            }
        }
    }

// POSTされた内容を追加する処理
    public function append(){
        //$items_base = array();
        // アイテム取得処理
        $exhiparams = array(
            'order' => 'id ASC'
        );
        $exhibitors = $this->Exhibitor->find('all',$exhiparams);
        $cateparamas = array(
            'conditions' => array('shop_id'=> 1),
            'order' => 'id ASC'
        );
        $categorys = $this->Category->find('all',$cateparamas);
        $this->set('items', array('category' => $categorys,'exhibitor' => $exhibitors));

        if($this->request->is('post')){
            try{
                //var_dump($this->request->data);
                $data = $this->request->data['Item'];

                if ($this->Item->save($data)){
                    $id_list = $this->Item->id_list;
                    //var_dump($id_list);
                    $act = 'act'; //Access token
                    $ats = 'ats'; //Access token secret
                    if(count($id_list) > 1){

                        $tweet = "バザー商品".count($id_list).'品、バザーに追加登録しました。詳細はこちら→ http://kcg-furumono-2014.me-ta-tag.com/';

                        $client = $this->_createClient();
                        $client->post(
                            $act,
                            $ats,
                            'https://api.twitter.com/1.1/statuses/update.json',
                            array(
                                'status' => $tweet
                            )
                        );
                    }else{
                        if(count($id_list)){
                            //var_dump($id_list);
                            $params = array(
                                'conditions' => array('Item.id'=> $id_list[0]),
                                'order' => 'Item.id ASC'
                            );
                            $pdo = $this->Item->getDatasource()->getConnection();
                            $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES,FALSE);
                            $items = $this->Item->find('all',$params);

                            $tweet = "商品名『".$items[0]['Item']['item_name'].'』価格：'.$items[0]['Item']['item_price'].'円でバザーに登録しました。詳細はこちら→ http://kcg-furumono-2014.me-ta-tag.com/';

                            $client = $this->_createClient();
                            $client->post(
                                $act,
                                $ats,
                                'https://api.twitter.com/1.1/statuses/update.json',
                                array(
                                    'status' => $tweet
                                )
                            );

                        }else{

                        }
                    }
                    //echo "true";

                }else{
                    echo "error";
                    //$this->log("validationErrors=" . var_export($this->Item->validationErrors, true));
                }
            }catch (Exception $e){
                echo $e;
            }
            $this->redirect('/shops/registration');

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
    protected function _createClient() {
       return new OAuthClient(
           'cmk', //Consumer key
           'cms' //Consumer secret
       );
    }


}
