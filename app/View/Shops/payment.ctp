<?php
    $ItemsRead = $this->Html->url("/Items/read", true);
    $ProfitsRead = $this->Html->url("/profits/read", true);
    $ProfitsAdd = $this->Html->url("/profits/add", true);

    echo $this->Html->script( 'cheet.min.js' );
?>
    <div class="all_container">
        <div class = "left_container">
            <div class = "left_category">
                <p> カテゴリ:

                <select name="left_category" id="category_list">
                <option value="">すべて</option>
                </select>
                <script id="category_tmp" type="text/template">
                <option value="<%-id%>"><%-category_name%></option>
                </script>

                </p>
            </div><!-- category -->

            <div class = "left_contents" id="item_list">
                <script id="item_tmp" type="text/template">
                <div class="regi_item divButtonOff" data-metatag_regiapp_cat_id="<%-category_id%>" data-metatag_regiapp_item_id="<%-id%>">
                    <div class="name"><%-item_name%></div>
                    <div class="price">¥ <%-item_price%></div>
                </div>
                </script>
            </div><!-- #item_list -->

            <ul class = "sell shop_profit">
                <script id="profit_tmp" type="text/template">
                <li class = "today_sell">本日の売り上げ：<%- today_sale %></li>
                <li class = "total_sell">総売り上げ：<%- total_sale %></li>
                <li class = "profit">採算：<%- profit %></li>
                </script>
            </ul>

        </div><!-- left_container -->

        <div class = "right_container">

            <div class="right_contents" id="selected_list">

                <script id="selected_item_tmp" type="text/template">
                <div class="selected_item pay_item" data-metatag_regiapp_item_id="<%-id%>">
                    <div class="pay_item0"><input type="checkbox"></div>
                    <div class="pay_item1 name"><%-item_name%></div>
                    <div class="pay_item2 price">¥ <span><%-item_price%></span></div>

                    <div class="pay_item3">
                        <input type="button" class="minus" value="▼">
                        <input type="text" size="1" class="qty" value=1>
                        <input type="button" class="plus" value="▲">
                    </div>

                    <div class="sum_price pay_item4">¥ <span><%-item_price%></span></div>
                    <div class="negiri_price pay_item4" style="display:none;">¥ <input type="text" size="3" value=""></div>
                </div>
                </script>

                <script id="selected_ticket_tmp" type="text/template">
                <div class="selected_ticket pay_item" data-metatag_regiapp_ticket_id="<%-id%>" data-metatag_regiapp_ticket_num="<%-num%>">
                    <div class="pay_item0"><input type="checkbox"></div>
                    <div class="pay_item1 name">券: <%-ticket_name%></div>
                    <div class="pay_item2 price">¥ <span>-<%-ticket_price%></span></div>

                    <div class="pay_item3">
                        <input type="button" class="minus" value="▼">
                        <input type="text" size="1" class="qty" value=1>
                        <input type="button" class="plus" value="▲">
                    </div>

                    <div class="sum_price money">¥ <span>-<%-ticket_price%></span></div>
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
                </select>
                <script id="ticket_tmp" type="text/template">
                    <option value="<%-ticket_price%>"><%-ticket_name%></option>
                </script>

                <input type = "button" value = "使用" class="ticket_use">
            </div>
			<div class="total">
				<p class = "total_item">
					計 <span>0</span> 点
				</p>
				<p class = "total_yen">
					￥ <span>0</span>
				</p>
			</div>
			<div class = "take_pay">
					<p>お預かり</p>
					<input type="text" name="take_pay" class="pay_text" value="">
			</div>
			 <div class = "exchange">
				<p>お釣り</p>
				<!-- <input type="text" name="exchange" class="exchange_text" value="0"> -->
                <div class="exchange_text">
                    ￥ <span>0</span>
                </div>
			</div>
            <div class = "decide">
               <div class="indecide">
                    <span style="margin-left:83px;">清算確定</span>
                    <div class="decide_case">
                        <div class = "decide_men">
                            <input type = "button" value = "~10代" class ="men" data-metatag_regiapp_customer_id="1"><input type = "button" value = "20~30代" class ="men" data-metatag_regiapp_customer_id="2"><input type = "button" value = "40代~" class ="men" data-metatag_regiapp_customer_id="3">
                        </div>
                        <div class = "decide_women">
                            <input type = "button" value = "~10代" class ="women" data-metatag_regiapp_customer_id="4"><input type = "button" value = "20~30代" class ="women" data-metatag_regiapp_customer_id="5"><input type = "button" value = "40代~" class ="women" data-metatag_regiapp_customer_id="6">
                        </div>
                    </div>
                    <p style="font-size:50%;">※性別、推定される客の年齢を押してください。</p>
                    <p style="font-size:50%;">※上記のいずれかのボタンを押した時点で1回の会計が終了します</p>
                </div>
            </div>
        </div>
    </div>
<!-- ------------------------------ 以下JavaScript ------------------------------ -->
<script type="text/javascript">
// グローバル変数
var items=[], categorys=[], tickets=[];
var selected_item_id = [], selected_ticket_num = [];
var total_cost_price = 0;

$(function(){
//---------------------------------------------------------------------------------------
// 商品，カテゴリ，金券取得
    $.get("<?php echo $ItemsRead ?>", {"shop_id" : shop_id}, function(data){
        var tmp_c = _.template($("#category_tmp").html()),
            tmp_i = _.template($("#item_tmp").html()),
            tmp_t = _.template($("#ticket_tmp").html()),
            i, ary = [], data_costs = [];

        for(i=0; i<data.category.length; i++){
            categorys.push(data.category[i].Category);
            $("#category_list").append(tmp_c(categorys[i]));
        }
        for(i=0; i<data.item.length; i++){
            items.push(data.item[i].Item);
            if(countLength(items[i].item_name) > 24){
                items[i].item_name = trimStr(items[i].item_name, 25);
            }
            $("#item_list").append(tmp_i(items[i]));
        }
        // 金券は値段順にソート
        for(i=0; i<data.ticket.length; i++){
            tickets.push(data.ticket[i].ticket);
            if(countLength(tickets[i].ticket_name) > 24){
                tickets[i].ticket_name = trimStr(tickets[i].ticket_name, 25);
            }
            ary[i] = [ tickets[i].ticket_price, tickets[i] ];
        }
        ary = _.sortBy(ary);
        tickets = [];
        for(i=0; i<ary.length; i++){
            tickets.push(ary[i][1]);
            $("#ticket_list").append(tmp_t(tickets[i]));
        }
        for(i=0; i<data.cost.length; i++){
            total_cost_price += parseInt(data.cost[i].Cost.price, 10);
        }
        append_profit();
    });
//---------------------------------------------------------------------------------------
    // カテゴリ別に商品一覧を表示
    $("#category_list").on("change",function(){
        var selected = $("option:selected", this).val();
        if(selected == ""){
            $(".regi_item").show();
        }else{
            $('.regi_item[data-metatag_regiapp_cat_id!='+selected+']').hide();
            $('.regi_item[data-metatag_regiapp_cat_id='+selected+']').show();
        }
    });

    // 会計へ商品を追加する
    $(document).on("click touchstart",".regi_item",function(){
        var item_id = $(this).data("metatag_regiapp_item_id"),
            // 取ってきたアイテムの何番目か
            num = $(".regi_item").index(this),
            tmp = _.template($("#selected_item_tmp").html());
        // 既にその商品が選択されているかどうかを調べる
        var flag = _.contains(selected_item_id, item_id);
        if(flag){
            // 既に登録されているものはqtyを（値が消されてしまってたりしたら0にして）プラス1
            var qty = $("#selected_list > [data-metatag_regiapp_item_id="+item_id+"] .qty");
            if(qty.val() == "" || !qty.val().match(/^[0-9]+$/)){qty.val(0);}
            qty.val(parseInt(qty.val())+1, 10).trigger("change",true);
        }else{
            // 登録
            selected_item_id.push(item_id);
            $(this).removeClass("divButtonOff").addClass("divButtonOn");
            $("#selected_list").append(tmp(items[num]));
            selected_sort();
        }
        chg_qty();
        chg_price();
    });
    // 会計へ金券を追加する
    $(".ticket_use").on("click touchstart",function(){
        var num = $("#ticket_list option").index($("#ticket_list option:selected")) -1,
            tmp = _.template($("#selected_ticket_tmp").html());
        if(num !== -1){
            var flag = _.contains(selected_ticket_num, num);
            if(flag){
                var qty = $("#selected_list > [data-metatag_regiapp_ticket_num="+num+"] .qty");
                if(qty.val() == "" || !qty.val().match(/^[0-9]+$/)){qty.val(0);}
                qty.val(parseInt(qty.val())+1, 10).trigger("change",true);
            }else{
                selected_ticket_num.push(num);
                tickets[num].num = num;
                $("#selected_list").append(tmp(tickets[num]));
                selected_sort();
            }
            chg_qty();
            chg_price();
        }
    });

    // 選択商品一覧をソート
    function selected_sort(){
        // ソート
        selected_item_id = _.sortBy(selected_item_id);
        selected_ticket_num = _.sortBy(selected_ticket_num);
        // ソート順に一時退避
        var shelter_i = [],
            shelter_t = [];
        for(var i=0; i<selected_item_id.length; i++){
            shelter_i.push($("#selected_list > [data-metatag_regiapp_item_id="+selected_item_id[i]+"]"));
        }
        for(var i=0; i<selected_ticket_num.length; i++){
            shelter_t.push($("#selected_list > [data-metatag_regiapp_ticket_num="+selected_ticket_num[i]+"]"));
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
    $(document).on("click touchstart","#selected_list .minus",function(){
        var minus;
        (!$(this).next().val().match(/^[0-9]+$/)) ? minus = 1 : minus = parseInt($(this).next().val(), 10) -1 ;
        // 0以下にさせない
        if(minus <= 0){minus = 1;}
        $(this).next().val(minus).trigger("change", true);
        chg_qty();
    });
    $(document).on("click touchstart","#selected_list .plus",function(){
        var plus;
        (!$(this).prev().val().match(/^[0-9]+$/)) ? plus = 1 : plus = parseInt($(this).prev().val(), 10) +1 ;
        $(this).prev().val(plus).trigger("change", true);
        chg_qty();
    });

    // 個数が変更されたら価格を変更
    $(document).on("change","#selected_list .qty",function(){
        // 値切りでなければ
        if(!$(this).closest(".selected_item").hasClass("negiri_item")){
            $( ">span", $(this).parent().nextAll(".sum_price") ).html(parseInt($(">span", $(this).parent().prevAll(".price")).html(), 10) * parseInt($(this).val(), 10));
        }
        chg_price();
    });
//---------------------------------------------------------------------------------------
    // 会計に追加された商品を全消去
    $(".reset").click(function(){
        $("#selected_list > div").remove();
        // ボタンの色を未選択に戻す
        for(var i=0; i<selected_item_id.length; i++){
            $("#item_list [data-metatag_regiapp_item_id="+selected_item_id[i]+"]").removeClass("divButtonOn").addClass("divButtonOff");
        }
        // 配列リセット
        selected_item_id = [];
        selected_ticket_num = [];
        chg_qty();
        chg_price();
    });

    // チェックされているものを消去する
    $(".check_reset").click(function(){
        var rm_i = [];
        var rm_t = [];
        $("#selected_list > .selected_item").each(function(i){
            if($("input:checkbox",this).prop("checked")){
                $(this).remove();
                rm_i.push(selected_item_id[i]);
                $("#item_list [data-metatag_regiapp_item_id="+selected_item_id[i]+"]").removeClass("divButtonOn").addClass("divButtonOff");
            }
        });
        $("#selected_list > .selected_ticket").each(function(i){
            if($("input:checkbox",this).prop("checked")){
                $(this).remove();
                rm_t.push(selected_ticket_num[i]);
            }
        });
        // 第２引数にはない第１引数の要素
        selected_item_id = _.difference(selected_item_id,rm_i);
        selected_ticket_num = _.difference(selected_ticket_num,rm_t);
        chg_qty();
        chg_price();
    });

    // チェックされているものの価格部分をtextと取り替える（値切り）
    $(".pay_down").on("click touchstart",function(){
        $("#selected_list > .selected_item").each(function(){
            if($("input:checkbox", this).prop("checked")){
                $(".sum_price", this).hide();
                $(".negiri_price > input:text", this).val( $(".sum_price > span", this).html() );
                $(".negiri_price",this).show();
            }
        });
    });
    // 入力が終了したらHTMLに戻す
    $(document).on("change","#selected_list .negiri_price > input:text",function(){
        var this_item = $(this).closest(".selected_item");
        $(this_item).addClass("negiri_item");
        $(".price > span", this_item).html("-----");
        $(this).parent().hide();
        $(".sum_price > span", this_item).html($(this).val());
        $(".sum_price", this_item).show();
        $("input:checkbox",this_item).prop("checked",false);
        chg_price();
    });
//---------------------------------------------------------------------------------------
    // 計何商品か
    function chg_qty(){
        var count = $("#selected_list > .selected_item").length;
        $(".total_item > span").html(count);
    }
    // 計何円か
    function chg_price(){
        var sum = 0;
        $("#selected_list .sum_price > span").each(function(){
            sum += parseInt($(this).html(), 10);
        });
        if(sum < 0){sum = 0;}
        $(".total_yen > span").html(sum).trigger("change", true);
    }
    // おつり表示
    $(".total_yen > span, .pay_text").on("change",function(){
        var oturi = parseInt($(".pay_text").val(), 10) - parseInt($(".total_yen > span").html(), 10);
        if(!isNaN(oturi)){
            $(".exchange_text > span").html(oturi);
            if(oturi < 0){
                $(".exchange_text > span").css("color","red");
            }else{
                $(".exchange_text > span").css("color","");
            }
        }else{
            $(".exchange_text > span").html("0");
        }
        if(parseInt($(".pay_text").val(), 10) === oturi){
            $(".pay_text").val(0);
            $(".exchange_text > span").html("0");
        }
    });
//---------------------------------------------------------------------------------------
    // 費用表示
    function append_profit(){
        $.get("<?php echo $ProfitsRead ?>", {"shop_id": shop_id}, function(data){
            var now = new Date();
            var year = now.getFullYear(), month = now.getMonth() + 1, day = now.getDate();
            var today = year +"-"+ month +"-"+ day;
            var tmp = _.template($("#profit_tmp").html());
            var today_sales = [], total_sale_price = 0, today_sale_price = 0;
            var i, j;

            for(i=0; i<data.Profits.length; i++){
                for(j=0; j<data.Profits[i].Sale.length; j++){
                    total_sale_price += parseInt(data.Profits[i].Sale[j].sale_price, 10);
                }
            }
            for(i=0; i<data.Profits.length; i++){
                flag = data.Profits[i].Profit.sale_time.substr(0, 10).match(today);
                if(flag!==null){
                    today_sales.push(data.Profits[i].Sale)
                }
            }
            for(i=0; i<today_sales.length; i++){
                for(j=0; j<today_sales[i].length; j++){
                    today_sale_price += parseInt(today_sales[i][j].sale_price, 10);
                }
            }
            var profit = total_sale_price - total_cost_price;
            if(profit > 0){
                profit = "+" + profit;
            }
            $(".shop_profit").append(tmp({today_sale: today_sale_price, total_sale: total_sale_price, profit: profit}));
        });
    }
//---------------------------------------------------------------------------------------
    // 隠しコマンド
    cheet("a enter", function(){
        $(".decide_case input:button").eq(0).trigger("click", true);
    });
    cheet("s enter", function(){
        $(".decide_case input:button").eq(1).trigger("click", true);
    });
    cheet("d enter", function(){
        $(".decide_case input:button").eq(2).trigger("click", true);
    });
    cheet("z enter", function(){
        $(".decide_case input:button").eq(3).trigger("click", true);
    });
    cheet("x enter", function(){
        $(".decide_case input:button").eq(4).trigger("click", true);
    });
    cheet("c enter", function(){
        $(".decide_case input:button").eq(5).trigger("click", true);
    });
    cheet("n", function(){
        var now = $("#category_list > option:selected").index();
        if(now+1 <= $("#category_list > option").length){
            $("#category_list > option").eq(now+1).prop("selected", true).trigger("change", true);
        }
    });
    cheet("m", function(){
        var now = $("#category_list > option:selected").index();
        if(now-1 >= 0){
            $("#category_list > option").eq(now-1).prop("selected", true).trigger("change", true);
        }
    });
    cheet("j", function(){
        var now = $("#ticket_list > option:selected").index();
        if(now+1 <= $("#ticket_list > option").length){
            $("#ticket_list > option").eq(now+1).prop("selected", true);
        }
    });
    cheet("k", function(){
        var now = $("#ticket_list > option:selected").index();
        if(now-1 >= 0){
            $("#ticket_list > option").eq(now-1).prop("selected", true);
        }
    });
    cheet("t enter", function(){
        $(".ticket_use").trigger("click", true);
    });
    cheet("enter", function(){
        if($(".pay_text").is(":focus")){
            $(".pay_text").blur();
        }
        if($("#id_search").is(":focus")){
            $("#id_search").blur();
            if($("#id_search").val() !== "" && $("#id_search").val().match(/^[0-9]+$/)){
                $(".regi_item[data-metatag_regiapp_item_id="+$("#id_search").val()+"]").trigger("click", true);
            }
        }
    });
    cheet("p enter", function(){
        $(".pay_text").trigger("click", true);
    });
    cheet("f enter", function(){
        $("#id_search").trigger("click", true);
    });

    $(document).on("keydown", function(event){
        // クリックされたキーのコード
        var keyCode = event.keyCode;
        // キーイベントが発生した対象のオブジェクト
        var obj = event.target;
        if(keyCode == 8 || keyCode >= 48 && keyCode <= 57 || keyCode >=112 && keyCode <= 114){
            // バックスペースキーを制御する
            if(keyCode==8){
                // テキストボックス／テキストエリアを制御する
                if((obj.tagName == "INPUT" && obj.type == "text") || obj.tagName == "TEXTAREA"){
                    // 入力できる場合は制御しない
                    if(!obj.readOnly && !obj.disabled){
                        return true;
                    }
                }
                $(".pay_text").val("").trigger("change", true);
                return false;
            }
            // 数字キー
            if(keyCode >= 48 && keyCode <= 57){
                if((obj.tagName == "INPUT" && obj.type == "text") || obj.tagName == "TEXTAREA"){
                    if(!obj.readOnly && !obj.disabled){
                        return true;
                    }
                }
                var num = String(keyCode - 48);
                $(".pay_text").val($(".pay_text").val()+num).trigger("change", true);
                return false;
            }
            // F1,F2,F3キー
            if(keyCode==112){
                $(".reset").trigger("click", true);
                return false;
            }
            if(keyCode==113){
                $(".check_reset").trigger("click", true);
                return false;
            }
            if(keyCode==114){
                $(".pay_down").trigger("click", true);
                return false;
            }
        }
    });

//---------------------------------------------------------------------------------------
    // その他
    $(document).on("click touchstart",".pay_text, #id_search", function(){
        $(this).select();
        return false;
    });

    if(shop_id == 1){
        $(".left_category > p").append("ID: <input type='text' id='id_search' size='5'>");
    }
    $("#id_search").on("keyup", function(){
        if($(this).val() !== "" && $(this).val().match(/^[0-9]+$/)){
            $(".regi_item").hide();
            $(".regi_item[data-metatag_regiapp_item_id="+$(this).val()+"]").show();
        }else{
            $(".regi_item").show();
        }
    });

    function countLength(str) { 
        var r = 0; 
        for (var i = 0; i < str.length; i++) { 
            var c = str.charCodeAt(i); 
            // Shift_JIS: 0x0 ～ 0x80, 0xa0 , 0xa1 ～ 0xdf , 0xfd ～ 0xff 
            // Unicode : 0x0 ～ 0x80, 0xf8f0, 0xff61 ～ 0xff9f, 0xf8f1 ～ 0xf8f3 
            if ( (c >= 0x0 && c < 0x81) || (c == 0xf8f0) || (c >= 0xff61 && c < 0xffa0) || (c >= 0xf8f1 && c < 0xf8f4)) { 
                r += 1; 
            } else { 
                r += 2; 
            } 
        } 
        return r;
    }

    function trimStr(str,byteSize){
    var byte = 0,trimStr="";
    for (var j=0,len=str.length; j <len ; j++) {
        str.charCodeAt(j) < 0x100 ? byte++ : byte += 2;
        trimStr +=str.charAt(j)
        if(byte>=byteSize){
            trimStr = trimStr.substr(0,j-2)+"..."
            break;
        }
    }
    return trimStr;
    }

//---------------------------------------------------------------------------------------
    // データ送信
    $(".decide_case input:button").on("click touchstart",function(){
        if( $(".pay_text").val() === ""){
            alert("お預かりが未入力です。");
        }else if( !$(".pay_text").val().match(/^[0-9]+$/) ){
            alert("お預かりに無効な文字が含まれています。");
        }else if( parseInt($(".exchange_text > span").html(), 10) < 0 ){
            alert("お釣りが0円以下です。\nあなたの損失を私は妥協しかねます。");
        }else{
            if($("#selected_list > .selected_item").length){
                var customer_id = $(this).data("metatag_regiapp_customer_id"),
                    customer_name = $(this).val();
                if(customer_id==1||customer_id==2||customer_id==3){
                    customer_name += " / 男性";
                }
                if(customer_id==4||customer_id==5||customer_id==6){
                    customer_name += " / 女性";
                }                
                var name, qty, sum_price, ticket_sum_price = 0, msg = "";
                $("#selected_list > div").each(function(){
                    name = $(".name", this).html();
                    qty = parseInt($(".qty", this).val(), 10);
                    sum_price = parseInt($(".sum_price > span", this).html(), 10);

                    if( $(this).hasClass("selected_item") ){
                        if( !$(this).hasClass("negiri_item") ){
                            msg += name + "    " + qty + "  個\n";
                        }else{
                            msg += name + "    " + qty + "  個    " + sum_price + "  円\n";
                        }
                    }
                    if($(this).hasClass("selected_ticket")){
                        ticket_sum_price += sum_price * -1;
                    }

                });
                msg += "金券    " + ticket_sum_price + "  円分\n";
                msg += "\n客層    "+ customer_name +"\n\nでよろしいですか？";
                var cfm = confirm(msg);
                if(cfm){

                    var sale_ary = [], ticket_ary = [], sale_price;
                    $("#selected_list > .selected_item").each(function(i){
                        sale_price = parseInt($(".sum_price > span", this).html(), 10);
                        sale_ary[i] = {
                            "item_id": $(this).data("metatag_regiapp_item_id"),
                            "sale_price": sale_price,
                            "sale_quantity": parseInt($(".qty", this).val(), 10)
                        }
                    });
                    $("#selected_list > .selected_ticket").each(function(i){
                        ticket_ary[i] = {
                            "ticket_id": $(this).data("metatag_regiapp_ticket_id"),
                            "ticketuse_quantity": parseInt($(".qty", this).val(), 10)
                        }
                    });
                    var json = {
                        "Profit": {"shop_id": shop_id, "customer_id": customer_id,"key": shop_key},
                        "Sale": sale_ary,
                        "Ticketuse": ticket_ary
                    }
                    $.post("<?php echo $ProfitsAdd ?>", json, function(data){
                        $(".reset").trigger("click", true);
                        $(".pay_text").val("");
                        // $("select[name=left_category] option").eq(0).prop("selected", true);
                        // $("select[name=ticket] option").eq(0).prop("selected", true);
                        $(".shop_profit > li").remove();
                        append_profit();
                        $.get("<?php echo $ItemsRead ?>", {"shop_id" : shop_id}, function(data){
                            var tmp_i = _.template($("#item_tmp").html());
                            $(".regi_item").remove();
                            items = [];
                            for(i=0; i<data.item.length; i++){
                                items.push(data.item[i].Item);
                                if(countLength(items[i].item_name) > 24){
                                    items[i].item_name = trimStr(items[i].item_name, 25);
                                }
                                $("#item_list").append(tmp_i(items[i]));
                            }
                        });

                    });
                }
            }
        }
    });

});
</script>