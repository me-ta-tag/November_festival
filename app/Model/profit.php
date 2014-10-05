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
    var $hasMany = [
        'Sale' =>
            [
                'className' => 'Sale',
                'conditions' => '',
                'order' => '',
                'foreignKey' => 'profit_id',
                'dependent' => true,
                'exclusive' => false,
                'finderQuery' => ''
            ],
        'Ticketuse' =>
            [
                'className' => 'Ticketuse',
                'conditions' => '',
                'order' => '',
                'foreignKey' => 'profit_id',
                'dependent' => true,
                'exclusive' => false,
                'finderQuery' => ''
            ]
    ];
}