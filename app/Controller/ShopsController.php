<?php
/**
 * Created by PhpStorm.
 * User: LastyRain
 * Date: 2014/08/14
 * Time: 16:00
 */

class ShopsController extends AppController {
//    public $scaffold;
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
}