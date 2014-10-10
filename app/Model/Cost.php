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

     var $validate = [
             'shop_id' => [
                 'notempty' => [
                     'rule' => ['notempty'],
                 ]
             ],
             'price' => [
                 'notempty' => [
                     'rule' => ['notempty'],
                 ]
             ]
         ];

 }