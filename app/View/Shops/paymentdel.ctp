<div class="paymentdel_container" style="margin: 30px 50px;">
<script type="text/template" id="paymentdelTemplate-1">
    <div style="margin-bottom: 20px;" data-metatag_regiapp_profit_id="<%-id%>">
        <div>日時: <b><%-sale_time%></b> </div>
        <div>客層: <%-customer_name%> </div>
        <div class="btn delete_btn" style="width:100px;">削除</div>
    </div>
</script>
</div>
<?php
    $readProfits = $this->Html->url("/profits/read", true);
    $deleteProfits = $this->Html->url("/profits/delete", true);
?>
<script type="text/javascript">
var profits = [], sales = [], ticketuses = [], customers = [];
$(function(){
//---------------------------------------------------------------------------------------
	$.get("<?php echo $readProfits; ?>",{"shop_id": shop_id},function(data){
		for(var i=0; i<data.customers.length; i++){
			customers.push( _.pick(data.customers[i].Customer, 'customer_name') );
		}
		for(var i=0; i<data.Profits.length; i++){
			profits[i] = _.extend(data.Profits[i].Profit, customers[data.Profits[i].Profit.customer_id -1]);
		}
		var tmp = _.template($("#paymentdelTemplate-1").html());
		for(var i=profits.length -1; i>=0; i--){
			$(".paymentdel_container").append(tmp(profits[i]));
		}
	});

	$(document).on("click touchstart", ".delete_btn", function(){
		var cfm = confirm("売り上げを削除しますか？");
		if(cfm){
			var profit_id = $(this).closest("[data-metatag_regiapp_profit_id]").attr("data-metatag_regiapp_profit_id");
			$.post("<?php echo $deleteProfits; ?>", { "shop_id": shop_id, "key": shop_key , "id": profit_id}, function(data){
				$.get("<?php echo $readProfits; ?>",{"shop_id": shop_id},function(data){
					profits = [], customers = [];
					$(".paymentdel_container > div").remove();
					for(var i=0; i<data.customers.length; i++){
						customers.push( _.pick(data.customers[i].Customer, 'customer_name') );
					}
					for(var i=0; i<data.Profits.length; i++){
						profits[i] = _.extend(data.Profits[i].Profit, customers[data.Profits[i].Profit.customer_id -1]);
					}
					var tmp = _.template($("#paymentdelTemplate-1").html());
					for(var i=profits.length -1; i>=0; i--){
						$(".paymentdel_container").append(tmp(profits[i]));
					}
				});
			});
		}
	});
//---------------------------------------------------------------------------------------
});
</script>