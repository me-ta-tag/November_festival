<?php
/**
 * Created by PhpStorm.
 * User: LastyRain
 * Date: 2014/08/14
 * Time: 15:59
 */

App::uses('AppModel', 'Model');
class Item extends AppModel{
    var $name = 'Item';

    var $belongsTo = array(
    'Category' => array (               // ここから追加
        'className' => 'Category',
            'conditions' => 'Item.category_id = Category.id',
            'order' => 'Item.id ASC',
            'foreignKey' => ''
        )
    );
    public $actsAs = [
        'Upload.Upload' => [
            'item_photo' => [
                'fields' => [
                    'dir' => 'item_photo_dir',
                    'type' => 'type',
                    'size' => 'size'
                ],
                'thumbnailSizes' => [
                    'thumb150' => '150x150',
                    'normal' => '400x400',
                    'big' => '960x350'
                ],
                'extensions' => [
                    'jpg',
                    'jpeg',
                    'JPG',
                    'JPEG',
                    'gif',
                    'GIF',
                    'png',
                    'PNG'
                ],
                'mimetypes' => ['image/jpeg', 'image/gif', 'image/png'],
                'path' => '{ROOT}tmp{DS}files{DS}{model}{DS}{field}{DS}',
                'thumbnailMethod' => 'php'
            ]
        ]
    ];
//    public $actsAs = [
//        'Upload.Upload' => [
//            'item_photo' => [
//                'fields' => [
//                    'dir' => 'dir', 'type' => 'type', 'size' => 'size'
//                ],
//                'thumbnailSizes' => [
//                    'thumb150' => '150x150',
//                    'normal' => '200x200',
//                    'big' => '500x500'
//                ],
//                'path' => '{ROOT}tmp{DS}files{DS}{model}{DS}{field}{DS}',
//                'thumbnailMethod' => 'php',
//                'resizeToMaxWidth' => true,
//                'mimetypes' => array('image/jpeg', 'image/gif', 'image/png'),
//                'extensions' => array('jpg', 'jpeg', 'JPG', 'JPEG', 'gif', 'GIF', 'png', 'PNG'),
//                'quality' => 100
//            ]
//        ]
//    ];

}