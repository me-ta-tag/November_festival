<?php //var_dump($items['item']); ?>


<?php $allsum = 0;?>
<?php foreach($items['item'] as $k => $v){ ?>
<?php $sum = 0 ;?>
<h2 style="text-align: center;padding-top: 30px;"><?php echo $k; ?></h2>
<table border="1" style="margin-top: 10px;">
    <tr>
        <th>ID</th>
        <th>商品名</th>
        <th>初期在庫</th>
        <th>残在庫</th>
        <th>売り上げ金額</th>
        <th>手数料差し引き</th>
    </tr>
    <?php foreach($v as $key => $value){ ?>
        <tr>
            <td align="center"><?php echo $value['Item']['id'];?></td>
            <td><?php echo $value['Item']['item_name'];?></td>
            <td align="center"><?php echo $value['Item']['item_stock'];?></td>
            <td align="center" <?php if($value['Item']['item_now_stock']>0){echo "style='color:red;'";}?>><?php echo $value['Item']['item_now_stock'];?></td>
            <td style="text-align: right;padding-right:20px;"><?php echo $value["Item"]["item_sale_price"]?></td>
            <?php $sum = $sum + $value["Item"]["item_sale_price"]; ?>
            <td style="text-align: right;padding-right: 20px;"><?php echo ($value["Item"]["item_sale_price"] * 0.8);?></td>
        </tr>
    <?php } ?>

</table>
<br />
<p style="text-align: center">合計：¥<?php echo $sum;?>- 手数料差し引き合計：¥<?php echo ($sum * 0.8); ?>-</p>
<?php $allsum = $allsum + $sum; ?>
<?php } ?>

<br />
<p style="text-align: center; padding-top: 50px">全合計：¥<?php echo $allsum;?>- 全手数料差し引き合計：¥<?php echo ($allsum * 0.8); ?>- </p>
<p style="text-align: center; padding-top: 20px;">めたたぐ収入：¥<?php echo ($allsum * 0.2);?>-</p>
<p style="text-align: center; padding-top: 20px;">報告が来ている費用差し引き残高：¥<?php echo (($allsum * 0.2) - 4490 - 108); ?>-</p>
