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

    public function read(){
        $id = $_GET['shop_id'];
        if ($this->request->is('ajax')) {
            if ($this -> request -> is('get') ) {
                if (isset($id)) {
                    if ($id != 0) {

                        $params = [
                            'conditions' => [
                                'Profit.shop_id' => $id
                            ]
                        ];
                        $profits = $this->Profit->find('all', $params);


                        // viewにはjson形式のファイルを表示させるように。
                        $this->layout = 'ajax';
                        $this->RequestHandler->setContent('json');
                        $this->RequestHandler->respondAs('application/json; charset=UTF-8');

                        // $studentsの配列をviewに渡す。
                        $this->set('profit', $profits);
                    } else {
                        throw new NotFoundException();
                    }
                } else {
                    throw new NotFoundException();
                }
            }else{
                throw new NotFoundException();
            }
            //$this->disableCache();
        }else{
            throw new NotFoundException();
        }
    }
}