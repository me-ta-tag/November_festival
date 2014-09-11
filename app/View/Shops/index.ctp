<h2>ショップ一覧</h2>
ログイン済み：<?php print(h($shop['shop_name'])); ?>さん<br />
ショップID：<?php print(h($shop['id'])); ?><br />
        <?php //var_dump($shop) ?>
目標金額：<?php print(h($shop['shop_goal'])); ?><br />
<?php print($this->Html->link('ログアウト', 'logout')); ?>

