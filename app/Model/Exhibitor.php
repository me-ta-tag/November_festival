<?php
/**
 * Created by IntelliJ IDEA.
 * User: LastyRain
 * Date: 2014/10/20
 * Time: 12:14
 */


App::uses('AppModel', 'Model');
class Exhibitor extends AppModel{
    var $name = 'Exhibitor';
    public $useTable = "exhibitors";
    var $validate = array(
        'name' => array(
            'notempty' => array(
                'rule' => array('notempty'),
            )
        )
    );
}