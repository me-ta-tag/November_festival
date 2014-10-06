<?php
/**
 * Created by PhpStorm.
 * User: LastyRain
 * Date: 2014/08/29
 * Time: 16:00
 */

App::uses('AppController', 'Controller');

class ProfitsController extends AppController {

    var $uses = array('Profit', 'Customer');
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
        if($this->request->is('post')){
            if($this->Profit->saveAssociated($this->request->data)){
            }else{
                throw new NotFoundException();
                return false;
            }
        }
    }

 

     public function add(){
         // アイテム取得処理
         if($this -> request -> is('ajax') ){
             if($this->request->is('post')){
                 if($this->Profit->saveAssociated($this->request->data)){
                 }else{
                     throw new NotFoundException();
                     return false;
                 }
             }
         }

     }
    function insertError(){
        echo("異常なデータを検知しました");
        return;
    }

    public function read(){
        $id = $_GET['shop_id'];
        if ($this->request->is('ajax')) {
            if ($this -> request -> is('get') ) {
                if (isset($id)) {
                    if ($id != 0) {
                       //echo "test";
                       $params = [
                            'conditions' => [
                                'Profit.shop_id' => $id
                            ]
                        ];
                        $output = [];
                        $output['Profits'] = $this->Profit->find('all', $params);
                        $output['customers'] = $this->Customer->find('all');
                        // viewにはjson形式のファイルを表示させるように。
                        $this->layout = 'ajax';
                        $this->RequestHandler->setContent('json');
                        $this->RequestHandler->respondAs('application/json; charset=UTF-8');

                        $this->set('profit',$output) ;
                    } else {
                        throw new NotFoundException();
                    }
                } else {
                    throw new NotFoundException();
                }
            }else{
                throw new NotFoundException();
            }
        }else{
            throw new NotFoundException();
        }
    }


    // 該当するIDのカラムを削除する
    public function delete(){
        if($this-> request -> is('ajax')){
            if ($this -> request -> is('post') ){
                $id = $this -> request -> data['id'];
                $this->Profit->delete($id);
            }
        }
    }
}