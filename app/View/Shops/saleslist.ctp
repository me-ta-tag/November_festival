<?php //var_dump($items['item']); ?>

<table>
<tr>
    <th>商品名</th>
    <th>初期在庫</th>
    <th>残在庫</th>
    <th>売り上げ金額</th>
    <th>出展者</th>
</tr>
<?php foreach($items['item'] as $key => $value){ ?>
        <tr>
            <td><?php echo $value['Item']['item_name'];?></td>
            <td><?php echo $value['Item']['item_stock'];?></td>
            <td <?php if($value['Item']['item_now_stock']>0){echo "style='color:red;'";}?>><?php echo $value['Item']['item_now_stock'];?></td>
            <td style="text-align: right;padding-right:20px;"><?php echo $value["Item"]["item_sale_price"]?></td>
            <td><?php echo $value['Item']['exhibitor_id'];?></td>
        </tr>
<?php } ?>

</table>

?>