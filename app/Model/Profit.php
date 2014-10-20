<?php
/**
 * Created by PhpStorm.
 * User: LastyRain
 * Date: 2014/08/14
 * Time: 15:59
 */

App::uses('AppModel', 'Model');
class Profit extends AppModel{
    var $name = 'Profit';
    var $hasMany = array(
        'Sale' => array(
                'className' => 'Sale',
                'conditions' => '',
                'order' => '',
                'foreignKey' => 'profit_id',
                'dependent' => true,
                'exclusive' => false,
                'finderQuery' => ''
        ),
        'Ticketuse' => array(
                'className' => 'Ticketuse',
                'conditions' => '',
                'order' => '',
                'foreignKey' => 'profit_id',
                'dependent' => true,
                'exclusive' => false,
                'finderQuery' => ''
        )
    );
    var $validate = array(
        'customer_id' => array(
            'notempty' => array(
                'rule' => array('notempty'),
            )
        )
    );
}