<?php
/**
 * Created by IntelliJ IDEA.
 * User: LastyRain
 * Date: 2014/10/10
 * Time: 14:19
 */


 App::uses('AppModel', 'Model');
 class Cost extends AppModel{
     public $useTable = "costs";
     var $name = 'Cost';

     var $validate = array(
         'shop_id' => array(
            'notempty' => array(
                'rule' => array('notempty'),
            )
         ),
         'name' => array(
            'notempty' => array(
                'rule' => array('notempty'),
            )
         ),
         'price' => array(
            'notempty' => array(
                'rule' => array('notempty'),
            )
         )
     );

 }