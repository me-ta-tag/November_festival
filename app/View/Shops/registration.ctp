<?php
    $ItemsRead = $this->Html->url("/Items/read", true);
    $CategorysAdd = $this->Html->url("/Categorys/add", true);
    $CategorysDelete = $this->Html->url("/Categorys/delete", true);
    $ItemsAdd = $this->Html->url("/Items/add", true);
    $ItemsDelete = $this->Html->url("/Items/delete", true);
    $TicketsAdd = $this->Html->url("/Tickets/add", true);
    $TicketsDelete = $this->Html->url("/Tickets/delete", true);
    $CostsAdd = $this->Html->url("/Costs/add", true);
    $CostsDelete = $this->Html->url("/Costs/delete", true);
?>
<!--
    <div class="touroku_cotainer" style="margin-top:20px;" id="category_reg">
        <table>
           <tr><td style="font-size:140%;"><b>カテゴリ登録</b></td><td class="line5"><hr size = "5"></td></tr>
        </table>
        <div class = "touroku_head">
            <div class="item_number">
                <b style="position: relative; right: 175px;">カテゴリ名</b>
            </div>
            <div style="margin-left: 380px; float: left;">
                <span class="name"><input type="text" style="width:150px;"></span>
                <span class="ok"><input type="button" class="btn" value="登録"></span>
            </div>
            <div style="margin-left: 50px; float: left;">
                <select name="category_list" style="width:150px;">
                    <option value="0">どれを消す？</option>
                    <script id="category_tmp" type="text/template">
                        <option value="<%-id%>"><%-category_name%></option>
                    </script>
                </select>
                <span class="delete"><input type="button" class="btn" value="消去"></span>
            </div>
        </div>
    </div>
-->

    <div class="touroku_cotainer" style="margin-top:20px;" id="category_reg">
        <table>
           <tr><td style="font-size:140%;"><b>カテゴリ登録</b></td><td class="line5"><hr size = "5"></td></tr>
        </table>
        <div class="touroku_1">
            <div class="category_name"><b>カテゴリ名</b></div>
        </div>
        <div class="touroku_item">
            <!-- カテゴリ登録 -->
            <div class="touroku_item_1 name"><input type="text" name="item_name1"></div>
            <div class="touroku_item_5 ok"><input type="button" value="登録" class = "btn"></div>

            <!-- カテゴリ消去 -->
            <select name="category_name">
                <option value="0">どれを消す？</option>

                <script id="category_tmp" type="text/template">
                    <option value="<%-id%>"><%-category_name%></option>
                </script>

            </select>
            <div class="touroku_item_5 delete"><input type="button" value="消去" class = "btn" onclick="***"></div>
        </div>
    </div>

    <div class = "touroku_container" id="item_reg">
        <table>
           <tr><td style="font-size:140%;"><b>商品登録</b></td><td class="line"><hr size = "5"></td></tr>
        </table>
        <div class = "touroku_head">
            <div class="item_number"><b>追加：</b>
                <select name="item_number">
                    <option value="0">0</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                </select>
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

                <script id="item_tmp" type="text/template">
                <% if(shop_id != 1){%>
                <div class="touroku_item" data-metatag_regiapp_item_id="<%-id%>" data-metatag_regiapp_category_id="<%-category_id%>">
                    <div class="touroku_item_1 name"><%-num%>:<input type="text" value="<%-item_name%>"></div>
                    <div class="touroku_item_2 price">¥<input type="text" class="numtxt" value="<%-item_price%>"></div>
                    <div class="touroku_item_3 category"><select><%=option%></select></div>
                    <div class="touroku_item_4 stock"><input type="text" class="numtxt" value="<%-item_stock%>"></div>
                    <% if(id !== "new"){ %>
                    <div class="touroku_item_5 delete"><input type="button" class="btn" value="消去"></div>
                    <% }else{ %>
                    <div class="touroku_item_5" style="visibility:hidden;"><input type="button" class="btn" value="消去"></div>
                    <% } %>
                </div>
                <% } %>
                </script>

                <?php
                //var_dump(count($items['item']));
                if( $shop['id'] == 1){
                    //var_dump($items['item'][0]['Item']);
                    echo $this->Form->create('Item', array("url" => "/Items/add",'type' => 'file'));
                    $option = [
                        'id' => ['type' => 'hidden'],
                        'item_name' => [],
                        'item_price' => [],
                        'item_detail' => ['type' => 'textarea'],
                        'item_photo' => ['type' => 'file'],
                        'item_photo_dir' => ['type' => 'hidden'],
                        'item_leader' => [],
                        'item_stock' => ['class' => 'up20'],
                        'shop_id' => ['type' => 'text'],
                        'category_id' => ['type' => 'text']
                    ];

                    foreach($items['item'] as $k => $val){
                        echo ('<div class="metaupload">');
                        foreach($val['Item'] as $key => $value){
                            echo $this->Form->input("Item.".$k.".".$key,listSetting($value,$option[$key]));
                        }
                        echo $this->html->image('item/item_photo/'.$val['Item']['item_photo_dir'].'/'.$val['Item']['item_photo'],array('alt' =>'img','width' => '200','height' => '200'));
                        echo ('</div>');
                    }
                    if(count($items['item']) == 0){
                        $option['shop_id'] = ['type' => 'text','value' => 1];
                        echo ('<div class="metaupload">');
                        foreach($option as $key => $value){
                            echo $this->Form->input("Item.0.".$key,listSetting("",$value));
                        }
                        echo ('</div>');
                    }else{
                        echo ('<div class="metaupload">');
                        for($i = count($items['item'])-1;$i < count($items['item']);$i++){
                            $option['shop_id'] = ['type' => 'text','value' => 1];
                            foreach($option as $key => $value){
                                echo $this->Form->input("Item.".$i.".".$key,listSetting("",$value));
                            }
                        }
                        echo ('</div>');
                    }
                    echo ('<div class="submitbtn">');
                    echo $this->Form->end('Submit');
                    echo ('</div>');
                    //echo $upload->url;
                    //$path = $this->Html->webroot;

                    //echo $this->html->image('test.png',array('alt' =>'img'));

                }
                ?>

            </div><!-- .reg_list -->
        </div>

        <?php
        if( $shop['id'] == 1){
        ?>
        <?php
        }else{
        ?>
            <div class = "which">
                <div class="cancel">
                <input type="button" value="取り消し" class = "btn">
            </div>
                <div class="ok">
                    <input type="button" value="確定" class = "btn">
                </div>
            </div>

        <?php
        }
        ?>
    </div><!-- #item_reg -->

    <div class="touroku_container" id="ticket_reg">
        <table>
           <tr><td style="font-size:140%;"><b>金券登録</b></td><td class="line"><hr size = "5"></td></tr>
        </table>
        
        <div class = "touroku_head">
            <div class="item_number"><b>追加：</b>
                <select name="item_number">
                    <option value="0">0</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                </select>
            </div>
        </div>
        <div class="touroku_1">
        		<div class="touroku_2_1"><b>金券名</b></div>
        		<div class="touroku_2_2"><b>金券の値段</b></div>
        </div>
        <div class="reg_list">

            <script id="ticket_tmp" type="text/template">
                <div class="touroku_item" data-metatag_regiapp_ticket_id="<%-id%>">
                    <div class="touroku_item_1 name"><%-num%>:<input type="text" value="<%-ticket_name%>"></div>
                    <div class="touroku_item_2 price"><input type="text" class="numtxt" size="3" value="<%-ticket_price%>"></div>
                    <%if(id !== "new"){%>
                        <div class="touroku_item_5 delete"><input type="button" class="btn" value="消去"></div>
                    <%}else{%>
                        <div class="touroku_item_5"><input type="button" class="btn" style="visibility:hidden;" value="消去"></div>
                    <%}%>
                </div>
            </script>

        </div><!-- .reg_list -->

        <div class = "which">
            <div class="cancel">
                <input type="button" value="取り消し" class = "btn">
            </div>
            <div class="ok">
               <input type="button" value="確定" class = "btn">
                
            </div>
        </div>
    </div><!-- #ticket_reg -->

    <div class="touroku_container" id="cost_reg">
        <table>
           <tr><td style="font-size:140%;"><b>費用登録</b></td><td class="line"><hr size = "5"></td></tr>
        </table>
        <div class = "touroku_head">
            <div class="item_number"><b>追加：</b>
                <select name="item_number">
                    <option value="0">0</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                </select>
            </div>
        </div>
        <div class="touroku_1">
        		<div class="touroku_3_1"><b>費用名</b></div>
        		<div class="touroku_3_2"><b>費用の値段</b></div>
        </div>
        <div class="reg_list">

            <script id="cost_tmp" type="text/template">
                <div class="touroku_item" data-metatag_regiapp_cost_id="<%-id%>">
                    <div class="touroku_item_1 name"><input type="text" value="<%-name%>"></div>
                    <div class="touroku_item_2 price">￥<input type="text" class="numtxt" value="<%-price%>"></div>
                    <%if(id !== "new"){%>
                        <div class="touroku_item_5 delete"><input type="button" class="btn" value="消去"></div>
                    <%}else{%>
                        <div class="touroku_item_5"><input type="button" class="btn" style="visibility:hidden;" value="消去"></div>
                    <%}%>
                </div>
            </script>

        </div><!-- .reg_list -->
        <div class = "which">
            <div class="cancel">
                <input type="button" value="取り消し" class = "btn">
            </div>
            <div class="ok">
               <input type="button" value="確定" class = "btn">
                
            </div>
        </div>
    </div><!-- #cost_reg -->
<!-- ------------------------------ 以下JavaScript ------------------------------ -->
<script type="text/javascript">
var items=[],
    items_back=[],
    tickets=[],
    tickets_back=[],
    costs=[],
    costs_back=[],
    categorys=[],
    category_options;

$(function(){
//---------------------------------------------------------------------------------------
// 初めの動作。商品の読み込み，書き込み
    $.get("<?php echo $ItemsRead ?>",{"shop_id" : shop_id}, function(data){
        for(var i=0; i<data.item.length; i++){
            items.push(data.item[i].Item);
            delete items[i].item_photo_dir;
        }
        for(var i=0; i<data.category.length; i++){
            categorys.push(data.category[i].Category);
        }
        for(var i=0; i<data.ticket.length; i++){
            tickets.push(data.ticket[i].ticket);
        }
        for(var i=0; i<data.cost.length; i++){
            costs.push(data.cost[i].Cost);
        }
        items_back = $.extend(true, {}, items);
        tickets_back = $.extend(true, {}, tickets);
        costs_back = $.extend(true, {}, costs);

        firstAdd("category",categorys);
        firstAdd("item",items);
        firstAdd("ticket",tickets);
        firstAdd("cost",costs);
    });

    function firstAdd(tgt, ary){
        // 既存の品を出力
        if(tgt === "category"){
            var tmp = _.template($("#category_tmp").html());
            for(var i=0; i<categorys.length; i++){
                $("#category_reg select[name=category_name]").append(tmp(ary[i]));
            }
        }else{

            // リセット用
            $("#"+tgt+"_reg select[name=item_number] option").eq(0).prop("selected", true);

            var target = $("#"+tgt+"_reg .reg_list"),
                tmp = _.template($("#"+tgt+"_tmp").html());

            if(tgt === "item"){
                // テンプレートで一度にオプションを表示するため
                category_options = '<option value="0">すべて</option>';
                for(var i=0; i<categorys.length; i++){
                    category_options += '<option value="'+categorys[i].id+'">'+categorys[i].category_name+'</option>';
                }
                var count = items.length;
                for(var i=0; i<count; i++){
                    // テンプレートのためにプロパティ追加
                    ary[i].num = i+1;
                    ary[i].option = category_options;
                    target.append(tmp(ary[i]));
                }
                // カテゴリを合わせる
                $("#item_reg .touroku_item .category select").each(function(){
                    var id = $(this).closest(".touroku_item").data("metatag_regiapp_category_id");
                    for(var i=0; i<$("option",this).length; i++){
                        if($("option",this).eq(i).val() == id){
                            $("option",this).eq(i).prop("selected", true);
                        }
                    }
                });
            }
            if(tgt === "ticket"){
                var count = tickets.length;
                for(var i=0; i<count; i++){
                    ary[i].num = i+1;
                    target.append(tmp(ary[i]));
                }
            }
            if(tgt === "cost"){
                var count = costs.length;
                for(var i=0; i<count; i++){
                    ary[i].num = i+1;
                    target.append(tmp(ary[i]));
                }
            }
        }
    }
//--------------------------------------------------------------------------
// 確定ボタン（登録，更新）

    function NumCheck(tgt){
        var flag = true,
            nav = "";
        $("#" + tgt + "_reg .reg_list .numtxt").each(function(){
            if($(this).val().match(/[^0-9]/)){
                $(this).css("background-color","LightSalmon");
                flag = false;
                if(tgt === "item"){
                    nav = "価格・在庫は半角数字のみを入力してください";
                }
                if(tgt === "ticket"){
                    nav = "価格は半角数字のみを入力してください";
                }
                if(tgt === "cost"){
                    nav = "価格は半角数字のみを入力してください";
                }
            }
        });
        if(nav !== ""){
            alert(nav);
        }
        return flag;
    }
    
    $("#item_reg .ok").on("click",function(){
        var flag = NumCheck("item");
        if(flag){
            var cfm = confirm("登録を確定しますか？");
            if(cfm){
                // リストの値を配列に格納
                var len = $("#item_reg .reg_list > div").length,
                    ary = [],
                    back = $.extend(true, {}, items_back),
                    json = [];

                    for(var i=0; i<len; i++){
                        var target = $("#item_reg .reg_list > div").eq(i);
                        ary[i] = {
                                "id" : target.data("metatag_regiapp_item_id"),
                                "item_name" : $(".name > input:text", target).val(),
                                "item_price" : parseInt($(".price > input:text", target).val(), 10),
                                "item_stock" : parseInt($(".stock > input:text", target).val(), 10),
                                "shop_id" : shop_id,
                                "category_id" : parseInt($(".category > select option:selected",target).val(), 10)
                             }
                    }
                for(var i=0; i<ary.length; i++){
                    if(ary[i].id === "new"){
                        delete ary[i].id;
                        if(shop_id === 1){if(ary[i].item_leader){ary[i].item_leader=1;}else{ary[i].item_leader=0;}}
                        // nullって送ってもnullにならないから消去，でもnullとしてDBからデータがくるから比較のためnullに1度変換していた
                        if(ary[i].item_photo === null){delete ary[i].item_photo;}
                        json.push(ary[i]);
                    }
                    // 更新判断
                    else{
                        if(shop_id !== 1){
                            delete back[i].item_detail; delete back[i].item_photo; delete back[i].item_leader;
                        }else{
                            if(ary[i].item_photo === null){delete ary[i].item_photo}
                            if(ary[i].item_leader){ary[i].item_leader=1}else{ary[i].item_leader=0}
                        }
                        flag = _.isEqual(ary[i], back[i]);
                        // true=同じ，false=異なる
                        if(!flag){
                            json.push(ary[i]);
                        }
                    }
                }

                json = {"Item":json};
                if(json.Item.length !== 0){
                    $.post("<?php echo $ItemsAdd ?>", json, function(data){
                        $.get("<?php echo $ItemsRead ?>",{"shop_id" : shop_id}, function(data){
                            items = [], items_back = [];
                            for(var i=0; i<data.item.length; i++){
                                items.push(data.item[i].Item);
                                delete items[i].item_photo_dir;
                            }
                            items_back = $.extend(true, {}, items);
                            $("#item_reg .reg_list > div").remove();
                            firstAdd("item", items);
                            alert("商品の登録が完了しました！");
                        });
                    });
                }
            }
        }
    });// END-$("#item_reg .ok").on("click");

    $("#ticket_reg .ok").on("click",function(){
        var flag = NumCheck("ticket");
        if(flag){
            var cfm = confirm("登録を確定しますか？");
            if(cfm){
                var len = $("#ticket_reg .reg_list > div").length,
                    ary = [],
                    back = $.extend(true, {}, tickets_back),
                    json = [];

                for(var i=0; i<len; i++){
                    var target = $("#ticket_reg .reg_list > div").eq(i);
                    ary[i] = {
                        "id" : target.data("metatag_regiapp_ticket_id"),
                        "ticket_name" : $(".name > input:text", target).val(),
                        "ticket_price" : parseInt($(".price > input:text", target).val(), 10)
                        // "shop_id" : shop_id

                    }
                }
                for(var i=0; i<ary.length; i++){
                    if(ary[i].id === "new"){
                        delete ary[i].id;
                        json.push(ary[i]);
                    }else{
                        var flag = _.isEqual(ary[i], back[i]);
                        if(!flag){
                            json.push(ary[i]);
                        }
                    }
                }
                json = {"Ticket" : json};
                if(json.Ticket.length !== 0){
                    $.post("<?php echo $TicketsAdd ?>", json, function(data){
                        $.get("<?php echo $ItemsRead ?>",{"shop_id" : shop_id}, function(data){
                            tickets = [], tickets_back = [];
                            for(var i=0; i<data.ticket.length; i++){
                                tickets.push(data.ticket[i].ticket);
                            }
                            tickets_back = $.extend(true, {}, tickets);
                            $("#ticket_reg .reg_list > div").remove();
                            firstAdd("ticket", tickets);
                            alert("金券の登録が完了しました！")
                        });
                    });
                }
            }
        }
    });// END-$("#ticket_reg .ok").on("click")


    $("#cost_reg .ok").on("click", function(){
        var flag = NumCheck("cost");
        if(flag){
            var cfm = confirm("登録を確定しますか？");
            if(cfm){
                var len = $("#cost_reg .reg_list > div").length,
                    ary = [],
                    back = $.extend(true, {}, costs_back),
                    json = [];

                for(var i=0; i<len; i++){
                    var target = $("#cost_reg .reg_list > div").eq(i);
                    ary[i] = {
                        "id": String(target.data("metatag_regiapp_cost_id")),
                        "name": $(".name > input:text", target).val(),
                        "price": $(".price > input:text", target).val(),
                        "shop_id" : String(shop_id)
                    }
                }
                
                for(var i=0; i<ary.length; i++){
                    if(ary[i].id === "new"){
                        delete ary[i].id;
                        json.push(ary[i]);
                    }else{
                        var flag = _.isEqual(ary[i], back[i]);
                        if(!flag){
                            json.push(ary[i]);
                        }
                    }
                }
                json = {"Cost": json};
                if(json.Cost.length !== 0){
                    $.post("<?php echo $CostsAdd ?>", json, function(data){
                        $.get("<?php echo $ItemsRead ?>", {"shop_id": shop_id}, function(data){
                            costs = [];
                            for(var i=0; i<data.cost.length; i++){
                                costs.push(data.cost[i].Cost);
                            }
                            costs_back = $.extend(true, {}, costs);
                            $("#cost_reg .reg_list > div").remove();
                            firstAdd("cost", costs);
                            alert("登録が完了しました！");
                        });
                    });
                }
            }
        }
    });
    $("#category_reg .ok").on("click", function(){
        var cfm = confirm("カテゴリを登録しますか？");
        if(cfm){
            var category_name = $(">input:text", $(this).prev()).val(),
                json = {Category:{"shop_id": shop_id, "category_name": category_name}}
            $.post("<?php echo $CategorysAdd ?>", json, function(data){
                $.get("<?php echo $ItemsRead ?>",{"shop_id" : shop_id}, function(data){
                    categorys = [];
                    for(var i=0; i<data.category.length; i++){
                       categorys.push(data.category[i].Category);
                    }
                    $("#category_reg select[name=category_name] option").each(function(i){
                        if(i > 0){
                            $(this).remove();
                        }
                    });
                    $("#category_reg .name > input:text").val("");
                    $("#item_reg .reg_list > div").remove();
                    firstAdd("item", items);
                    firstAdd("category", categorys);
                    alert("カテゴリの登録が完了しました！");
                });
            });
        }
    });
//--------------------------------------------------------------------------
// プルダウン選択でリストを追加
    $("select[name=item_number]").on("change",function(){
        var target = $(this).closest("[id$=_reg]"),
            target_list = $(".reg_list", target),
            tmp = _.template($("[id$=_tmp]", target_list).html()),
            count = parseInt($(this).val()),
            shelter = [],
            len;
        if(target.is("#item_reg")){len=items.length;}
        if(target.is("#ticket_reg")){len=tickets.length;}
        if(target.is("#cost_reg")){len=costs.length;}
        for(var i=0; i<len; i++){
            shelter.push($(">div", target_list).eq(i));
            // shelter.push($(">div"), target_list).eq(i);
        }
        $(">div", target_list).remove();
        for(var i=0; i<len + count; i++){
            if(i < len){
                target_list.append(shelter[i]);
            }else{
                if(target.is("#item_reg")){
                     target_list.append(tmp({
                        "id": "new", "category_id": 0, "num": i+1, "item_name": "", "item_price": 0, "item_stock": 0, "option": category_options, "item_detail": "", "item_photo": null, "item_leader": null
                    }));                   
                }
                if(target.is("#ticket_reg")){
                    target_list.append(tmp({
                        "id": "new", "num": i+1, "ticket_name": "", "ticket_price": 0
                    }));                 
                }
                if(target.is("#cost_reg")){
                    target_list.append(tmp({
                        "id":"new", "name":"", "price":0
                    }));
                }
            }
        }
    });
//--------------------------------------------------------------------------
// リセットボタン（そこのリストを初期状態に戻す）
    $(".cancel").on("click",function(){
        var target = $(this).closest("[id$=_reg]"),
            target_list = $(".reg_list", target),
            tmp = _.template($("[id$=_tmp]", target_list).html());
        $(">div", target_list).remove();
        if(target.is("#item_reg")){firstAdd("item", items)}     
        if(target.is("#ticket_reg")){firstAdd("ticket", tickets)}
        if(target.is("#cost_reg")){firstAdd("cost", costs)}
    });
//--------------------------------------------------------------------------
// 消去ボタン
    $(document).on("click", "#item_reg .reg_list .delete", function(){
        var cfm = confirm( "商品 「" + $("input:text", $(this).prevAll(".name")).val() + "」 を消去しますか？" );
        if(cfm){
            var id = $(this).closest(".touroku_item").data("metatag_regiapp_item_id");
            $.post("<?php echo $ItemsDelete ?>",{"id": id}, function(data){
                $.get("<?php echo $ItemsRead ?>",{"shop_id" : shop_id}, function(data){
                    items = [];
                    for(var i=0; i<data.item.length; i++){
                        items.push(data.item[i].Item);
                        delete items[i].item_photo_dir;
                    }
                    items_back = $.extend(true, {}, items);
                    $("#item_reg .reg_list > div").remove();
                    firstAdd("item", items);
                    alert("商品の消去が完了しました！");
                });
            });
        }
    });
    $(document).on("click", "#ticket_reg .reg_list .delete", function(){
        var cfm = confirm( "金券 「" + $("input:text", $(this).prevAll(".name")).val() + "」 を消去しますか？" );
        if(cfm){
            var id = $(this).closest(".touroku_item").data("metatag_regiapp_ticket_id");
            $.post("<?php echo $TicketsDelete ?>", {"id" : id}, function(data){
                $.get("<?php echo $ItemsRead ?>",{"shop_id" : shop_id}, function(data){
                    tickets = [];
                    for(var i=0; i<data.ticket.length; i++){
                        tickets.push(data.ticket[i].ticket);
                    }
                    tickets_back = $.extend(true, {}, tickets);
                    $("#ticket_reg .reg_list > div").remove();
                    firstAdd("ticket", tickets);
                    alert("金券の消去が完了しました！")
                });
            });
        }
    });
    $(document).on("click", "#cost_reg .reg_list .delete", function(){
        var cfm = confirm("費用「" + $("input:text", $(this).prevAll(".name")).val() + "」 を消去しますか？" );
        if(cfm){
            var id = $(this).closest(".touroku_item").data("metatag_regiapp_cost_id");
            $.post("<?php echo $CostsDelete ?>", {"id" : id}, function(data){
                $.get("<?php echo $ItemsRead ?>",{"shop_id" : shop_id}, function(data){
                    costs = [];
                    for(var i=0; i<data.cost.length; i++){
                        costs.push(data.cost[i].Cost);
                    }
                    costs_back = $.extend(true, {}, costs);
                    $("#cost_reg .reg_list > div").remove();
                    firstAdd("cost", costs);
                    alert("費用の消去が完了しました！")
                });
            });
        }
    });
    $("#category_reg .delete").on("click", function(){
        var cfm = confirm("カテゴリ 「" + $("#category_reg select[name=category_name] option:selected").html() +"」 を消去しますか？");
        if(cfm){
            var id = parseInt($("#category_reg select[name=category_name]").val(), 10);
            $.post("<?php echo $CategorysDelete ?>", {"id": id}, function(data){
                $.get("<?php echo $ItemsRead ?>", {"shop_id" : shop_id}, function(data){
                    categorys = [], items = [];
                    for(var i=0; i<data.item.length; i++){
                        items.push(data.item[i].Item);
                        delete items[i].item_photo_dir;
                    }
                    for(var i=0; i<data.category.length; i++){
                        categorys.push(data.category[i].Category);
                    }
                    items_back = $.extend(true, {}, items);
                    $("#category_reg select[name=category_name] option").each(function(i){
                        if(i > 0){
                            $(this).remove();
                        }
                    });
                    $("#item_reg .reg_list > div").remove();
                    firstAdd("item", items);
                    firstAdd("category", categorys);
                    alert("カテゴリの消去が完了しました！")
                });
            });
        }
    });
//--------------------------------------------------------------------------
    $(document).on("click","input:text.numtxt",function(){
        $(this).select();
        $(this).css("background-color","");
        return false;
    });
//--------------------------------------------------------------------------

});
</script>
<?php
    function listSetting($value,$option){
        $output = [];
        if(isset($value)){
            $output['value'] = $value;
        }
        foreach($option as $key => $value){
            $output[$key] = $value;
        }
        return $output;
    }

?>
