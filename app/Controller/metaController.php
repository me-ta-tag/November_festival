<?php
/**
 * Created by IntelliJ IDEA.
 * User: LastyRain
 * Date: 2014/11/03
 * Time: 14:18
 */


class metaController extends AppController{
    var $uses = array('Item', 'Category','Sale');
    //loadModel($uses);

    public $components = array('RequestHandler');

    public function metaread(){
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
    }
}