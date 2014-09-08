<h2>ショップ一覧</h2>　
ログイン済み：<?php print(h($shop['shop_name'])); ?>さん<br />
<?php print($this->Html->link('ログアウト', 'logout')); ?>

<ul>
    <?php //var_dump($shops); ?>
    <?php foreach($shops as $shop) : ?>
    <!-- shopsという配列の中身をshopという変数に渡している -->
    <li>
        <?php //echo $shop['Shop']['shop_name'];
        echo $this->Html->link($shop['Shop']['shop_name'],'/shops/view/'.$shop['Shop']['id']);

        ?>
    </li>
    <?php endforeach; ?>
</ul>

<h2>Add Shop</h2>
    <?php
        echo $this->Html->link('Add Shop',array('controller'=>'shops','action'=>'add'));
    ?>