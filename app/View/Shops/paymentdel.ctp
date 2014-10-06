<script type="text/template" id="paymentdelTemplate-1">
    <div>
        <div>日時: <%-sale_time%> </div>

        <div>カスタマー情報</div>
        <div class="btn" style="width:100px;">削除</div>
    </div>
</script>

<script type="text/javascript">
var profits = [], sales = [], ticketuses = [], customers = [];
$(function(){
//---------------------------------------------------------------------------------------
	$.get("/m_regi/profits/read",{"shop_id": shop_id},function(data){
		for(var i=0; i<data.Profits.length; i++){
		
			profits.push(data.Profits[i].Profit);
			sales.push(data.Profits[i].Sale[0]);

			for(var k=0; k<data.Profits[i].Ticketuse.length; k++){
				ticketuses.push(data.Profits[i].Ticketuse[k]);
			}

		}
		for(var i=0; i<data.customers.length; i++){
			customers.push(data.cusutomers[i]);
		}

		var tmp = _.template($("#paymentdelTemplate-1").html());
		$("body").append(tmp(profits[0]));
	});

//---------------------------------------------------------------------------------------
});
</script>