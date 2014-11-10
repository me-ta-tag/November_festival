<?php //var_dump($items['item']); ?>

<table border="1" style="margin-top: 10px;">
<tr>
    <th>ID</th>
    <th>商品名</th>
    <th>初期在庫</th>
    <th>残在庫</th>
    <th>売り上げ金額</th>
    <th>出展者</th>
</tr>
<?php foreach($items['item'] as $key => $value){ ?>
        <tr>
            <td align="center"><?php echo $value['Item']['id'];?></td>
            <td><?php echo $value['Item']['item_name'];?></td>
            <td align="center"><?php echo $value['Item']['item_stock'];?></td>
            <td align="center" <?php if($value['Item']['item_now_stock']>0){echo "style='color:red;'";}?>><?php echo $value['Item']['item_now_stock'];?></td>
            <td style="text-align: right;padding-right:20px;"><?php echo $value["Item"]["item_sale_price"]?></td>
            <td align="center"><?php echo $value['Item']['exhibitor_id'];?></td>
        </tr>
<?php } ?>

</table>