<script type="text/template" id="paymentdelTemplate">
    <div>
        <div>日時</div>
        <div>カスタマー情報</div>
        <div class="btn">削除</div>
    </div>
</script>
<?php
    $readProfits = $this->Html->url("/profits/read", true);
?>
<script type="text/javascript">
var profits = [], sales = [], ticketuses = [];
$(function(data){
//---------------------------------------------------------------------------------------
	$.get("<?php echo $readProfits; ?>",{"shop_id": shop_id},function(data){
		for(var i=0; i<data.Profits.length; i++){
			profits.push(data.Profits[i].Profit);
			sales.push(data.Profits[i].Sale);
			ticketuses.push(data.Profits[i].ticketuse);
		}
		debugger;
	});
	var tmp = $("#paymentdelTemplate").html();

//---------------------------------------------------------------------------------------
});
</script>