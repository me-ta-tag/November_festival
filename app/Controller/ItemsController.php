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
    public function index(){
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

}