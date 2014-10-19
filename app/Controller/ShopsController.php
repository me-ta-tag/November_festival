<?php
/**
 * Created by PhpStorm.
 * User: LastyRain
 * Date: 2014/08/14
 * Time: 16:00
 */

App::uses('AppController', 'Controller');

class ShopsController extends AppController {
//    public $scaffold;

    var $uses = array('Item', 'Category', 'ticket','Shop');

    //読み込むコンポーネントの指定
    public $components = array('Session', 'Auth');

    //どのアクションが呼ばれてもはじめに実行される関数
    public function beforeFilter()
    {

        parent::beforeFilter();

        //未ログインでアクセスできるアクションを指定
        //これ以外のアクションへのアクセスはloginにリダイレクトされる規約になっている
        $this->Auth->allow('register', 'login');
    }

    //ログイン後にリダイレクトされるアクション
    public function index(){
        $this->set('shop', $this->Auth->user());

    }
    public function logout(){
        $this->Auth->logout();
        $this->response->header('Location', "../users/login");
    }

    public function register(){
        //$this->requestにPOSTされたデータが入っている
        //POSTメソッドかつユーザ追加が成功したら
        if($this->request->is('post') ){

            $this->request->data["Shop"]["key"] = $this->makeRandStr(16);
            if( $this->Shop->save($this->request->data)){
                //ログイン
                //$this->request->dataの値を使用してログインする規約になっている
                $this->Auth->login();
                $this->Session->setFlash(__('ユーザーの新規登録が完了しました。'));
                $this->redirect('index');
            }
        }
    }
    
    // 会計ページ
    public function payment(){
        $this->set('shop', $this->Auth->user());
    }
    // 商品登録ページ
    public function registration(){
        $this->set('shop', $this->Auth->user());
        $user = $this->Auth->user();
        if($user['id'] == 1 ){
            $params = array(
                'conditions' => array('Item.shop_id'=> $user['id']),
                'order' => 'Item.id ASC'
            );
            $pdo = $this->Item->getDatasource()->getConnection();
            $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES,FALSE);
            $items = $this->Item->find('all',$params);

            $ticparams = array();
            $tickets = $this->ticket->find('all', $ticparams);

            $cateparamas = array(
                'conditions' => array('shop_id'=> $user['id']),
                'order' => 'id ASC'
            );
            $categorys = $this->Category->find('all',$cateparamas);
            // viewにはjson形式のファイルを表示させるように。
//            $this->layout = 'ajax';
//            $this->RequestHandler->setContent('json');
//            $this->RequestHandler->respondAs('application/json; charset=UTF-8');

            // $studentsの配列をviewに渡す。
            $this->set('items', array('item' => $items,'category' => $categorys,'ticket' =>$tickets));
        }
    }
    // 売上詳細ページ
    public function sales(){
        $this->set('shop', $this->Auth->user());
    }
    public function paymentdel(){
        $this->set('shop', $this->Auth->user());
    }

    /**
     * ランダム文字列生成 (英数字)
     * $length: 生成する文字数
     */
    function makeRandStr($length = 8) {
        static $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJLKMNOPQRSTUVWXYZ0123456789';
        $str = '';
        for ($i = 0; $i < $length; ++$i) {
            $str .= $chars[mt_rand(0, 61)];
        }
        return $str;
    }
    /*public function login(){
        if($this->request->is('post')) {
            if($this->Auth->login())
                $this->Session->setFlash(__('ログイン成功'), 'default', array(), 'auth');
                //return $this->redirect('index');
            else
                $this->Session->setFlash('ログイン失敗');
        }
    }

    public function logout(){
        $this->Auth->logout();
        $this->redirect('login');
    }*/
    /*
    public $helpers = array('Html','Form');

    public function index(){
        $params = array(
            'conditions' => array('id'=> '1'),
            'order' => 'id DESC',
            'limit' => 2
        );
        //find(条件,条件{Object}@param)
        //$this->set('shops', $this->Shop->find('all',$params));
        $this->set('shops', $this->Shop->find('all'));
        //shopsというphp変数にいれそれを入れる。
        $this->set('title_for_layout','店舗一覧');
    }

    public function view($id = null){
        $this->Shop->id = $id;
        //var_dump($this->Shop);
        $this->set('shop', $this->Shop->read());
        //shopというphp変数に、Shop->idを設定した、物に該当する物を表示する。

    }
    public function add(){
        //var_dump($this->request);
        if ($this->request->is('post')){
            if ($this->Shop->save($this->request->data)){
                $this->Session->setFlash('Success');
                $this->redirect(array('action'=>'index'));
            }else{
                $this->Session->setFlash('failed');
            }
        }else{
            //$this->Session->setFlash('error');
        }
    }
    */
}