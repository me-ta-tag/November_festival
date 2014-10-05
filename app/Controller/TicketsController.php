<?php
/**
 * Created by PhpStorm.
 * User: LastyRain, Zenkun
 * Date: 2014/08/14
 * Time: 16:00
 */

App::uses('AppController', 'Controller');

class TicketsController extends AppController {
//    public $scaffold;
    //var $uses = array('Item', 'Category', 'ticket');


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


    // POSTされた内容を追加する処理
    public function add(){
        //$items_base = array();
        // アイテム取得処理

        if($this->request->is('ajax')){
            if($this->request->is('post')){
                try{
                    //var_dump($this->request->data);
                    $data = $this->request->data['Ticket'];
                    if ($this->Ticket->saveAll($data)){
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
                $this->Ticket->delete($items_id);
            }
        }
    }


}
