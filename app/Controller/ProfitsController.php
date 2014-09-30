<?php
/**
 * Created by PhpStorm.
 * User: LastyRain
 * Date: 2014/08/29
 * Time: 16:00
 */

App::uses('AppController', 'Controller');

class ProfitsController extends AppController {

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
                $this->Session->setFlash('成功！');
                $this->redirect(array('action'=>'index'));
            }else{
                $this->Session->setFlash(pr($this->request->data));
                $this->Session->setFlash('失敗');

            }
            print_r(json_decode($this->request->data, true));
            print_r($this->request, true);
        }

    }

 

     public function add(){


     }

}