<style type="text/css">
    .item{
        background-color: lightgray;
        margin: 30px;
        width: 300px;
        height: 40px;
    }
    .item > *{
        float: left;
        text-align: center;
    }
    .item > .id{
        width: 20px;
        margin-left: 15px;
    }
    .item > .name{
		width: 100px;
		margin-right: 70px;
    }
    .item > .price{
		width:50px;
    }
    .selected_btn{
        background-color: lightblue;
    }

    #selected_list > div{
        background-color: lightblue;
        width: 400px;
        height: 50px;
        margin: 30px;
    }
    [class^="item_"] > *{
        float: left;
        text-align: center;
    }
    [class^="ticket_"] > *{
        float: left;
        text-align: center;
    }
    .negiri_item{
    }
</style>
    <div class="all_container">
        <div class = "left_container">
            <div class = "left_category">
                <p> カテゴリ:
                <select name="left_category" id="category_list">
                <option value="">すべて</option>
                    <script id="category_tmp" type="text/template">
                    <option value="<%-id%>"><%-category_name%></option>
                    </script>
                </select>
                </p>
            </div><!-- category -->

            <p class="left_id">ID</p>
            <p class="left_item_name">商品名</p>
            <p class="left_yen">単価</p>

            <div class = "left_contents" id="item_list">
            <!--              
                <p class = "item">
                <input type="button" value = "***">
                </p>
             -->
                <script id="item_tmp" type="text/template">
                    <div class="item" data-metatag_regiapp_cat_id="<%-category_id%>" data-metatag_regiapp_item_id="<%-id%>">
                        <div class="id"><%-id%></div>
                        <span class="colon">:</span>
                        <div class="name"><%-item_name%></div>
                        <span class="yen_mark">¥</span>
                        <div class="price"><%-item_price%></div>
                    </div>
                </script>

            </div><!-- #item_list -->
            <ul class = "sell">
                <li class = "today_sell">本日の売り上げ：</li>
                <li class = "total_sell">総売り上げ：</li>
                <li class = "profit">採算：</li>
            </ul>
        </div><!-- left_container -->

        <div class = "right_container">
            <ul>
                <li class="right_id">ID</li>
                <li class="right_item_name">商品名</li>
                <li class="right_yen">単価</li>
                <li class="right_number">個数</li>
                <li class="right_total_yen">価格</li>
            </ul>

            <div class="right_contents" id="selected_list">
            <script id="selected_item_tmp" type="text/template">
                <div class="item_<%-id%>" data-metatag_regiapp_item_id="<%-id%>">
                    <input type="checkbox">
                    <div class="id"><%-id%></div>
                    <div class="colon">:</div>
                    <div class="name"><%-item_name%></div>
                    <div class="yen_mark">¥</div>
                    <div class="price"><%-item_price%></div>
                    <div class=""><input type="button" class="minus" value="▼"></div>
                    <div class=""><input type="text" size="1" class="qty" value=1></div>
                    <div class=""><input type="button" class="plus" value="▲"></div>
                    <div class="yen_mark">¥</div>
                    <div class="sum_price"><%-item_price%></div>
                    <div class="negiri_price" style="display:none;"><input type="text" size="3" value=""></div>
                </div>
            </script>
            <script id="selected_ticket_tmp" type="text/template">
                <div class="ticket_<%-ticket_price%>" data-metatag_regiapp_ticket_price="<%-id%>">
                    <input type="checkbox">
                    <span>券</span>
                    <span>:</span>
                    <div class="name"><%-ticket_name%></div>
                    <span>¥</span>
                    <div class="price">-<%-ticket_price%></div>
                    <div><input type="button" class="minus" value="▼"></div>
                    <div><input type="text" size="1" class="qty" value=1></div>
                    <div><input type="button" class="plus" value="▲"></div>
                    <span>¥</span>
                    <div class="sum_price">-<%-ticket_price%></div>
                </div>
            </script>
            </div><!--#selected_list-->

            <div class = "option">
                <ul>
                <li class = "reset">
                    <input type = "button" value = "リセット" class="btn">
                </li>
                <li class = "check_reset">
                    <input type = "button" value = "チェックを削除" class="btn">
                </li>
                <li class = "pay_down">
                    <input type = "button" value = "値切り" class="btn">
                </li>
                </ul>
            </div><!-- option -->
            <div class = "ticket">
                <select name="ticket" class="ticket_sentaku" id="ticket_list">
                    <option value="">金券を選択</option>
                    <script id="ticket_tmp" type="text/template">
                        <option value="<%-ticket_price%>"><%-ticket_name%></option>
                    </script>
                </select>
                <input type = "button" value = "使用" class="ticket_use">
            </div>
				<div class="total">
					<p class = "total_item">
						計 <span>0</span> 点
					</p>
					<p class = "total_yen">
						￥<span>0</span>
					</p>
				</div>
				<div class = "take_pay">
						<p>お預かり</p>
						<input type="text" name="take_pay" class="pay_text" value="0">
				</div>
				 <div class = "exchange">
					<p>お釣り</p>
					<input type="text" name="exchange" class="exchange_text" value="0">
				</div>
            <div class = "decide">
                <div class = "decide2">
                   <p>清算確定</p>
                </div>
                <div class="decide_case">
					<div class = "decide_men">
						<input type = "button" value = "~20代" class ="men" data-metatag_regiapp_customer_id = "1">
                        <input type = "button" value = "30~50代" class ="men" data-metatag_regiapp_customer_id = "2">
                        <input type = "button" value = "50代~" class ="men" data-metatag_regiapp_customer_id = "3">
					</div>
					<div class = "decide_women">
						<input type = "button" value = "~20代" class ="women" data-metatag_regiapp_customer_id = "4">
                        <input type = "button" value = "30~50代" class ="women" data-metatag_regiapp_customer_id = "5">
                        <input type = "button" value = "50代~" class ="women" data-metatag_regiapp_customer_id = "6">
					</div>
           		</div>
            </div>
    </div>
<!-- ------------------------------ 以下JavaScript ------------------------------ -->
<script type="text/javascript">
// グローバル変数
var items=[], categorys=[], tickets=[];
var selected_item_id = [], selected_ticket_price = [];

$(function(){
//---------------------------------------------------------------------------------------
// 商品，カテゴリ，金券取得
    $.get("/m_regi/items/read",{"shop_id" : shop_id}, function(data){
        var tmp_c = _.template($("#category_tmp").html()),
            tmp_i = _.template($("#item_tmp").html()),
            tmp_t = _.template($("#ticket_tmp").html()),
            i, ary = [];

        for(i=0; i<data.category.length; i++){
            categorys.push(data.category[i].Category);
            $("#category_list").append(tmp_c(categorys[i]));
        }
        for(i=0; i<data.item.length; i++){
            items.push(data.item[i].Item);
            $("#item_list").append(tmp_i(items[i]));
        }
        for(i=0; i<data.ticket.length; i++){
            tickets.push(data.ticket[i].ticket);
            // $("#ticket_list").append(tmp_t(tickets[i]));
            ary[i] = [ tickets[i].ticket_price, tickets[i] ];
        }
        ary = _.sortBy(ary);
        tickets = [];
        for(i=0; i<ary.length; i++){
            tickets.push(ary[i][1]);
            $("#ticket_list").append(tmp_t(tickets[i]));
        }
    });
//---------------------------------------------------------------------------------------
    // カテゴリ別に商品一覧を表示
    $("#category_list").on("change",function(){
        var selected = $("option:selected", this).val();
        if(selected == ""){
            $(".item").show();
        }else{
            $('.item[data-metatag_regiapp_cat_id != '+selected+']').hide();
            $('.item[data-metatag_regiapp_cat_id = '+selected+']').show();
        }
    });

    // 会計へ商品を追加する
    $(document).on("click",".item",function(){
        var item_id = $(this).data("metatag_regiapp_item_id"),
            // 取ってきたアイテムの何番目か
            num = $("#item_list > .item").index(this),
            tmp = _.template($("#selected_item_tmp").html());
        // 既にその商品が選択されているかどうかを調べる
        var flag = _.contains(selected_item_id, item_id);
        if(flag){
            // 既に登録されているものはqryを（値が消されてしまっていたら0にして）プラス1
            var qty = $("#selected_list > .item_"+item_id+" .qty");
            if(qty.val() == ""){qty.val(0);}
            qty.val(parseInt(qty.val())+1).trigger("change",true);
        }else{
            // 登録
            selected_item_id.push(item_id);
            $(this).toggleClass("selected_btn");
            $("#selected_list").append(tmp(items[num]));
            selected_sort();
        }
        chg_qty();
        chg_price();
    });
    // 会計へ金券を追加する
    $(".ticket_use").on("click",function(){
        var ticket_price = $("#ticket_list option:selected").val(),
            num = $("#ticket_list option").index($("#ticket_list option:selected")) -1,
            tmp = _.template($("#selected_ticket_tmp").html());
        if(ticket_price !== ""){
            var flag = _.contains(selected_ticket_price, ticket_price)
            if(flag){
                var qty = $("#selected_list > .ticket_"+ticket_price+" .qty");
                if(qty.val() == ""){qty.val(0);}
                qty.val(parseInt(qty.val())+1).trigger("change",true);
            }else{
                selected_ticket_price.push(ticket_price);
                $("#selected_list").append(tmp(tickets[num]));
                selected_sort();
            }
        }
        chg_qty();
        chg_price();
    });

    // 選択商品一覧をソート
    function selected_sort(){
        // ソート
        selected_item_id = _.sortBy(selected_item_id);
        selected_ticket_price = _.sortBy(selected_ticket_price);
        // ソート順に一時退避
        var shelter_i = [],
            shelter_t = [];
        for(var i=0; i<selected_item_id.length; i++){
            shelter_i.push($("#selected_list .item_"+selected_item_id[i]));
        }
        for(var i=0; i<selected_ticket_price.length; i++){
            shelter_t.push($("#selected_list .ticket_"+selected_ticket_price[i]));
        }
        // 消去
        $("#selected_list > div").remove();
        // 書込み
        for(var i=0; i<shelter_i.length; i++){
            $("#selected_list").append(shelter_i[i]);
        }
        for(var i=0; i<shelter_t.length; i++){
            $("#selected_list").append(shelter_t[i]);
        }
    }

    // 上下ボタンで個数を変更
    $(document).on("click","#selected_list .minus",function(){
        var minus = parseInt($("input:text", $(this).parent().next()).val()) -1;
        // 0以下にさせない
        if(minus <= 0){minus = 1;}
        $("input:text", $(this).parent().next()).val(minus).trigger("change", true);
        chg_qty();
    });
    $(document).on("click","#selected_list .plus",function(){
        $("input:text", $(this).parent().prev()).val(parseInt($("input:text", $(this).parent().prev()).val())+1).trigger("change", true);
        chg_qty();
    });

    // 個数が変更されたら価格を変更
    $(document).on("change","#selected_list .qty",function(){
        // 値切りでなければ（.negiri_itemでなければ）
        // if(!$(this).parent().nextAll(".negiri_price").is(":visible")){
            if(!$(this).parents("[class^=item_]").hasClass("negiri_item")){
                $(this).parent().nextAll(".sum_price").html(parseInt($(this).parent().prevAll(".price").html()) * parseInt($(this).val()));
        }
        chg_price();
    });
//---------------------------------------------------------------------------------------
    // 会計に追加された商品を全消去
    $(".reset").click(function(){
        $("#selected_list > div").remove();
        for(var i=0; i<selected_item_id.length; i++){
            $("#item_list [data-metatag_regiapp_item_id="+selected_item_id[i]+"]").toggleClass("selected_btn");
        }
        // 配列リセット
        selected_item_id = [];
        selected_ticket_price = [];
        chg_qty();
        chg_price();
    });

    // チェックされているものを消去する
    $(".check_reset").click(function(){
        var rm_i = [];
        var rm_t = [];
        $("#selected_list > [class^=item]").each(function(i){
            if($("input:checkbox",this).prop("checked")){
                $(this).remove();
                rm_i.push(selected_item_id[i]);
                $("#item_list [data-metatag_regiapp_item_id="+selected_item_id[i]+"]").toggleClass("selected_btn");
            }
        });
        $("#selected_list > [class^=ticket]").each(function(i){
            if($("input:checkbox",this).prop("checked")){
                $(this).remove();
                rm_t.push(selected_ticket_price[i]);
            }
        });
        // 第２引数にはない第１引数の要素
        selected_item_id = _.difference(selected_item_id,rm_i);
        selected_ticket_price = _.difference(selected_ticket_price,rm_t);
        chg_qty();
        chg_price();
    });

    // チェックされているものの価格部分をtextと取り替える（値切り）
    $(".pay_down").on("click",function(){
        $("#selected_list > [class^=item_]").each(function(){
            if($("input:checkbox", this).prop("checked")){
                $(".sum_price",this).hide();
                // $(".price",this).html("---");
                $(".negiri_price > input:text",this).val($(".sum_price",this).html());
                $(".negiri_price",this).show();
            }
        });
    });
    // 入力が終了したらHTMLに戻す
    $(document).on("change","#selected_list .negiri_price > input:text",function(){
        var this_item = $(this).parents("[class^=item_]");
        this_item.addClass("negiri_item");
        $(this).parent().hide();
        $(".sum_price", this_item).html($(this).val()).show().css("color","#FF6600");
        $("input:checkbox",this_item).prop("checked",false);
        chg_price();
    });
//---------------------------------------------------------------------------------------
    // 計何商品か
    function chg_qty(){
        var count = $("#selected_list [class^=item]").length;
        $(".total_item > span").html(count);
    }
    // 計何円か
    function chg_price(){
        var sum = 0;
        $("#selected_list .sum_price").each(function(){
            sum += parseInt($(this).html());
        });
        if(sum < 0){sum = 0;}
        $(".total_yen > span").html(sum).trigger("change",true);
    }
    // おつり表示
    $(".total_yen > span, .pay_text").change(function(){
        if(parseInt($(".pay_text").val()) !== 0){
            var oturi = parseInt($(".pay_text").val()) - parseInt($(".total_yen > span").html());
            if(!isNaN(oturi) && oturi !== parseInt($(".pay_text").val())){
                $(".exchange_text").val(oturi);
                if(oturi < 0){
                    $(".exchange_text").css("color","red")
                }else{
                    $(".exchange_text").css("color","black")
                }
            }else{
                $(".exchange_text").val(0);
            }
        }
    });

    // phpにデータ送信
    $(".decide_case input:button").on("click",function(){
        if($("#selected_list > div").length){
            var customer_id = $(this).data("metatag_regiapp_customer_id");
            var name, qty, sum_price, msg = "";
            $("#selected_list > div").each(function(){
                name = $(".name", this).html();
                qty = parseInt($(".qty", this).val());
                sum_price = parseInt($(".sum_price", this).html());
                if(!$(this).hasClass("negiri_item")){
                    msg += name + "    " + qty + "  個\n";
                }else{
                    msg += name + "    " + qty + "  個    " + sum_price + "  円\n";                    
                }
            });
            msg += "\n客層"+ customer_id +"\n\nでよろしいですか？"
            var cfm = confirm(msg);
            if(cfm){

                var sale_ary = [], ticket_ary = [], sale_price;
                $("#selected_list > [class^=item_]").each(function(i){
                    sale_price = parseInt($(".sum_price", this).html());
                    sale_ary[i] = {
                        "item_id": $(this).data("metatag_regiapp_item_id"),
                        "sale_price": sale_price,
                        "sale_quantity": parseInt($(".qty", this).val())
                    }
                });
                $("#selected_list > [class^=ticket_]").each(function(i){
                    ticket_ary[i] = {
                        "ticket_id": $(this).data("metatag_regiapp_ticket_id"),
                        "ticketuse_quantity": parseInt($(".qty", this).val())
                    }
                });
                var customer_id = 1;
                var json = {
                    "Profit": {"shop_id": shop_id, "customer_id": customer_id},
                    "Sale": sale_ary,
                    "Ticketuse": ticket_ary
                }
                console.log(json);
                $.post("/m_regi/profits/add", json, function(data){
                    $(".reset").trigger("click");
                    $(".pay_text").val(0);
                    $("select option").eq(0).prop("selected", true);
                    $("select[name=left_category] option").eq(0).prop("selected", true);
                    $("select[name=ticket] option").eq(0).prop("selected", true);
                });
            }
        }
    });

});
</script>