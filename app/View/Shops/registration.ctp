    <div class = "touroku_container" id="item_reg">
        <table>
           <tr><td style="font-size:140%;"><b>商品登録</b></td><td class="line"><hr size = "5"></td></tr>
        </table>

        <div class = "touroku_head">
            <div class="item_number"><b>商品数：</b>
                <select name="item_number">

                    <script id="op_tmp" type="text/template">
                        <option value="<%-len%>"><%-len%></option>
                    </script>

                </select>
            </div>
            <div class="new_category"><b>新規カテゴリ：</b>
                <input type="text" name="new_category" class="new_category4">
                <input type = "button" value = "登録"  onclick ="***">
            </div>
           
        </div>
        <div class="touroku_body">
        	<div class="touroku_1">
        		<div class="touroku_1_1"><b>商品名</b></div>
        		<div class="touroku_1_2"><b>販売価格</b></div>
        		<div class="touroku_1_3"><b>カテゴリ</b></b></div>
        		<div class="touroku_1_4"><b>在庫(0を入力で無限)</b></div>
        	</div>
            <div class="reg_list">
<!-- 
            	<div class="touroku_item">
        		<div class="touroku_item_1">1:<input type="text" name="item_name1"></div>
        		<div class="touroku_item_2">￥<input type="text" name="item_yen1"></div>
        		<div class="touroku_item_3"><select name = "category"><option value="test">test</option><option value="test2">test2</option></select>
        		</div>
        		<div class="touroku_item_4"><input type="text" name="item_zaiko1"></div>
        		<div class="touroku_item_5"><input type="button" value="消去" class = "btn"></div>     		
        	   </div> 
-->
                <script id="item_tmp" type="text/template">
                <div class="touroku_item" data-metatag_regiapri_item_id="<%-id%>">
                    <div class="touroku_item_1 name"><%-num%>:<input type="text" value="<%-item_name%>"></div>
                    <div class="touroku_item_2 price">¥<input type="text" class="numtxt" value="<%-item_price%>"></div>
                    <div class="touroku_item_3 category"><select><%=option%></select></div>
                    <div class="touroku_item_4 stock"><input type="text" class="numtxt" value="<%-item_stock%>"></div>
                    <%if(id !== "new"){%>
                    <div class="touroku_item_5 delete"><input type="button" class="btn" value="消去"></div>
                    <%}else{%>
                    <div style="visibility:hidden; delete"><input type="button" class="btn" value="消去"></div>
                    <%}%>
                </div>
                </script>
            </div><!-- .reg_list -->
        	
        </div>
         
        <div class = "which">
            <div class="cancel">
                <input type="button" value="キャンセル" class = "btn">
            </div>
            <div class="ok">
               <input type="button" value="確定" class = "btn">
            </div>
        </div>
    </div><!-- #item_reg -->

    <div class="touroku_container" id="ticket_reg">
        <table>
           <tr><td style="font-size:140%;"><b>金券登録</b></td><td class="line"><hr size = "5"></td></tr>
        </table>
        
        <div class = "touroku_head">
            <div class="item_number"><b>金券枚数：</b>
                <select name="item_number">
                    <!-- op_tmp -->
                </select>
            </div>
        </div>
        <div class="touroku_1">
        		<div class="touroku_2_1"><b>金券名</b></div>
        		<div class="touroku_2_2"><b>金券の値段</b></div>
        </div>
        <div class="reg_list">
<!-- 
        	<div class="touroku_item">
        		<div class="touroku_item_1">1:<input type="text" name="item_name1"></div>
        		<div class="touroku_item_2">￥<input type="text" name="item_yen1"></div>
        		<div class="touroku_item_5"><input type="button" value="消去" class = "btn"></div>
        	</div>
 --> 
            <script id="ticket_tmp" type="text/template">
                <div class="touroku_item" data-metatag_regiapri_ticket_id="<%-id%>">
                    <div class="touroku_item_1"><%-num%>:<input type="text" value="<%-ticket_name%>"></div>
                    <div class="touroku_item_2"><input type="text" size="3" value="<%-ticket_price%>"></div>
                    <%if(id !== "new"){%>
                        <div class="touroku_item_5"><input type="button" class="btn" value="消去"></div>
                    <%}else{%>
                        <div class="touroku_item_5"><input type="button" class="btn" style="visibility:hidden;" value="消去"></div>
                    <%}%>
                </div>
            </script>

        </div><!-- .reg_list -->

        <div class = "which">
            <div class="cancel">
                <input type="button" value="キャンセル" class = "btn">
            </div>
            <div class="ok">
               <input type="button" value="確定" class = "btn">
                
            </div>
        </div>
    </div><!-- #ticket_reg -->

    <div class="touroku_container" id="expence_reg">
        <table>
           <tr><td style="font-size:140%;"><b>費用登録</b></td><td class="line"><hr size = "5"></td></tr>
        </table>
        <div class="touroku_1">
        		<div class="touroku_3_1"><b>費用名</b></div>
        		<div class="touroku_3_2"><b>費用の値段</b></div>
        </div>
        	<div class="touroku_item">
        		<div class="touroku_item_1"><input type="text" name="item_name1"></div>
        		<div class="touroku_item_2">￥<input type="text" name="item_yen1"></div>
        		<div class="touroku_item_5"><input type="button" value="登録" class = "btn"></div>
        	</div>
    </div><!-- #expence_reg -->


<!-- ------------------------------ 以下JavaScript ------------------------------ -->
<script type="text/javascript">
var items = [],
    items_back=[],
    tickets=[],
    tickets_back=[],
    categorys=[],
    opt;

$(function(){
//--------------------------------------------------------------------------
// 確定ボタン（登録，更新）
    function compare(ary, back){
        var json = [];
        // for(var i=0; i<ary.length; i++){
        //     // 新しい商品を登録
        //     if(ary[i].id == "new"){
        //         delete ary[i].id;
        //         debugger;
        //         $.post('/m_regi/items/add',ary[i],function(data){
        //             console.log(data);
        //         });
        //     }
        //     // 既存の商品を更新
        //     else{
        //         var flag = _.isEqual(ary[i],back[i]);
        //         if(flag == false){
        //             console.log("更新をDBに送信");
        //             // ここでDBに送信
        //         }else{
        //             console.log("何もしない");
        //         }
        //     }
        // }
        for(var i=0; i<ary.length; i++){
            if(ary[i].id == "new"){
                delete ary[i].id;
                json.push(ary[i])
            }else{
                var flag = _.isEqual(ary[i],back[i]);
                if(flag){
                    delete ary[i].id;
                    json.push(ary[i]);
                }
            }
        }
            json = JSON.stringify(json);
            $.post("/m_regi/items/add", json, function(data){
                console.log(data);
            });
    }

    $("#item_reg .ok > input:button").on("click",function(){
        var flag = true;
        $("#item_reg .reg_list .numtxt").each(function(){
            if ($(this).val().match(/[^0-9]/)){
                flag = false;
                alert("半角数字を入力してください");
            }
        });
        if(flag){
        // リストの値を配列に格納
        var len = $("#item_reg .reg_list > div").length,
            ary = [];
        for(var i=0; i<len; i++){
            var target = $("#item_reg .reg_list > div").eq(i);
            ary[i] = {
                "id" : target.data("metatag_regiapri_item_id") + "",
                "item_detail" : "",
                "item_name" : $(".name > input:text", target).val(),
                "item_photo" : "",
                "item_price" : $(".price > input:text", target).val(),
                "item_stock" : $(".stock > input:text", target).val(),
                "shop_id" : shop_id,
                "category_id" : $(".category > select option:selected",target).val()
            }
        }
        compare(ary,items_back);
        }
    });

    $("#ticket_reg .ok > input:button").on("click",function(){
        var count = $("#ticket_reg .reg_list > div").length,
            ary = [];
        for(var i=0; i<count; i++){
            var target = $("#ticket_reg .reg_list > div").eq(i);
            ary[i] = {
                "id" : target.data("metatag_regiapri_ticket_id") + "",
                "ticket_name" : $(".name > input:text",target).val(),
                "ticket_price" : $(".price > input:text",target).val()
            }
        }
        compare(ary,tickets_back);
    });
//---------------------------------------------------------------------------------------
// 商品の読込
    $.get("/m_regi/items/read",{shop_id : shop_id}, function(data){
        for(var i=0; i<data.item.length; i++){
            items.push(data.item[i].Item);
        }        for(var i=0; i<data.category.length; i++){
            categorys.push(data.category[i].Category);
        }        for(var i=0; i<data.ticket.length; i++){
            tickets.push(data.ticket[i].ticket);
        }

        items_back = $.extend(true, {}, items);
        // オプションになる文字列をカテゴリから生成
        opt = "";
        for(var i=0; i<categorys.length; i++){
            opt += '<option value="'+categorys[i].id+'">'+categorys[i].category_name+'</option>';
        }
        firstadd("item",items);
        firstadd("ticket",tickets);

    });

    function firstadd(tgt, ary){
        // プルダウンメニュの内容を生成
        var target = $("#"+tgt+"_reg select[name=item_number]"),
            tmp = _.template($("#op_tmp").html()),
            len = ary.length;
        for(var i=len; i<=len+10; i++){
            target.append(tmp({len:i}));
        }
        // 既存の品を出力
        target = $("#"+tgt+"_reg .reg_list");
        tmp = _.template($("#"+tgt+"_tmp").html());
        var count = $("#"+tgt+"_reg select[name=item_number] option:selected").val();
        if(tgt=="item"){
            for(var i=0; i<count; i++){
                // テンプレートのためにプロパティ追加
                ary[i].num = i+1;
                ary[i].option = opt;
                target.append(tmp(ary[i]));
            }
        }else if(tgt=="ticket"){
            for(var i=0; i<count; i++){
                ary[i].num = i+1;
                target.append(tmp(ary[i]));
            }
        }
    }
//--------------------------------------------------------------------------
// プルダウン選択でリストを追加
    function listadd(tgt){
        var target = $("#"+tgt+"_reg .reg_list");
            tmp =_.template($("#"+tgt+"_tmp").html());
        // 次に書き込むdiv数
            count = $("#"+tgt+"_reg select[name=item_number] option:selected").val();
        // 現在あるdiv数
            len = $("#"+tgt+"_reg .reg_list > div").length;
        // 退避
            shelter = [];
        for(var i=0; i<len; i++){
            shelter.push($("#"+tgt+"_reg .reg_list > div").eq(i));
        }
        // 削除してから
        $(">div",target).remove();
        // 書き込み
        for(var i=0; i<count; i++){
            // lenまで退避させたやつを追加，それ以上は新規を追加
            if(i+1 <= len){
                target.append(shelter[i]);
            }else{
                if(tgt=="item"){
                    target.append(tmp({
                        id: "new", num: i+1, item_name: "", item_price: "", item_stock: "", option: opt, item_detail: "", item_photo: ""
                    }));
                }else if(tgt=="ticket"){
                    target.append(tmp({
                        id: "new", num: i+1, ticket_name: "",ticket_price: ""
                    }));
                }
            }
        }
    }
    $("#item_reg select[name=item_number]").on("change",function(){
        listadd("item");
    });
    $("#ticket_reg select[name=item_number]").on("change",function(){
        listadd("ticket");
    });
//--------------------------------------------------------------------------
// 消去ボタン
    // 削除するデータを送信して，DBで削除されてからリロードするようにしたい
    $(document).on("click","#item_reg .reg_list .delete",function(){
        var id = $(this).parent().data("metatag_regiapri_item_id");
        alert(id);
    });
    $(document).on("click","#ticket_reg .reg_list .delete",function(){
        var id = $(this).parent().data("metatag_regiapri_ticket_id");
        alert(id);
    });
//--------------------------------------------------------------------------
// リセットボタン（そこのリストを初期状態に戻す）
    function resetList(tgt, ary){
        var target = $("#"+tgt+"_reg .reg_list");
            tmp = _.template($("#"+tgt+"_tmp").html());
        $("div",target).remove();
        for(var i=0; i<ary.length; i++){
            target.append(tmp(ary[i]));
        }
        // selectedも初期状態に戻す
        var ary = $("#"+tgt+"_reg select[name=item_number] option").eq(0);
        ary[0].selected = true;
    }
    $("#item_reg .cansel input:button").on("click",function(){
        resetList("item",items);
    });
    $("#ticket_reg .cansel input:button").on("click",function(){
        resetList("ticket",tickets);
    });
//--------------------------------------------------------------------------
// 出費登録
    $("#expense_reg .reg_btn").on("click",function(){
        var val1 = $("#expense_reg textarea").val();
            val2 = $("#expense_reg input:text").val();
            obj = {content:val1,expense:val2};
        if(obj.content !== "" && obj.expense !== ""){
            console.log(obj.content + obj.expense);
        }else{
            console.log("null発見");
        }
    });
//--------------------------------------------------------------------------

});
</script>