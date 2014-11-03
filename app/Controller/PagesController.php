<?php
/**
 * Static content controller.
 *
 * This file will render views from views/pages/
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('AppController', 'Controller');

/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers/pages-controller.html
 */
class PagesController extends AppController {

/**
 * This controller does not use a model
 *
 * @var array
 */
	//public $uses = array();
    var $uses = array('Item', 'Category','Sale');
    public $components = array('RequestHandler');
/**
 * Displays a view
 *
 * @param mixed What page to display
 * @return void
 * @throws NotFoundException When the view file could not be found
 *	or MissingViewException in debug mode.
 */
	public function display() {
		$path = func_get_args();

		$count = count($path);
		if (!$count) {
			return $this->redirect('/');
		}
		$page = $subpage = $title_for_layout = null;

		if (!empty($path[0])) {
			$page = $path[0];
		}
		if (!empty($path[1])) {
			$subpage = $path[1];
		}
		if (!empty($path[$count - 1])) {
			$title_for_layout = Inflector::humanize($path[$count - 1]);
		}
		$this->set(compact('page', 'subpage', 'title_for_layout'));

		try {
			$this->render(implode('/', $path));
		} catch (MissingViewException $e) {
			if (Configure::read('debug')) {
				throw $e;
			}
			throw new NotFoundException();
		}
	}



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

}
