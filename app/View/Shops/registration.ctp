    <div class="touroku_container" id="category_reg">
        <table>
            <tr><td style="font-size:140%;"><b>カテゴリ登録</b></td><td class="line"><hr size = "5"></td></tr>
        </table>
        <div class="new_category">
            <b>新規カテゴリ：</b>
            <span>
                <input type="text" name="new_category" class="new_category4">
            </span>
            <span class="ok">
                <input type = "button" class="btn" value = "登録">
            </span>
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
                <% if(shop_id != 1){ %>

                <div class="touroku_item" data-metatag_regiapp_item_id="<%-id%>" data-metatag_regiapp_category_id="<%-category_id%>">
                    <span class="touroku_item_1 name"><%-num%>:<input type="text" value="<%-item_name%>"></span>
                    <span class="touroku_item_2 price">¥<input type="text" class="numtxt" value="<%-item_price%>"></span>
                    <span class="touroku_item_3 category"><select><%=option%></select></span>
                    <span class="touroku_item_4 stock"><input type="text" class="numtxt" value="<%-item_stock%>"></span>
                    <% if(id !== "new"){ %>
                    <span class="touroku_item_5 delete"><input type="button" class="btn" value="消去"></span>
                    <% }else{ %>
                    <span class="touroku_item_5" style="visibility:hidden;"><input type="button" class="btn" value="消去"></span>
                    <% } %>
                </div>

                <% }else{ %>

                <div class="touroku_item" data-metatag_regiapp_item_id="<%-id%>" data-metatag_regiapp_category_id="<%-category_id%>" style="background-color:#C6C6C6; width:480px;height:280px; margin:30px auto;">
                    <div class="item_num" style="float:left; width:60px;">
                        <%if(id !== "new"){%>
                        <span class="delete"><input type="button" value="削除"></span>
                        <%}else{%>
                        <span style="visibility:hidden;"><input type="button" value="削除"></span>
                        <%}%>
                        <br><%-num%>
                    </div>
                    <div class="item_value" style="float:left; margin:30px 10px;">
                        商品名<br><span  class="name"><input type="text" style="width:150px;" value="<%-item_name%>"></span><br>
                        目玉商品 <input type="checkbox" <% if(item_leader){%>checked<% } %> >
                        <br>
                        単価 <span class="price numtxt"><input type="text" style="width:50px;" value="<%-item_price%>"></span>
                        在庫 <span class="stock numtxt"><input type="text" style="width:50px;" value="<%-item_stock%>"></span><br>
                        カテゴリ<br><span class="category"><select style="width:150px;"><%=option%></select></span><br>
                        商品詳細<br><textarea class="detail" style="width:200px; height:100px;"><%-item_detail%></textarea>
                    </div>
                    <div class="dropzone" id="<%-num%>_dropzone" style="color:#6E6E6E; float:left; border:dashed; text-align:center; width:120px; height:90px; margin:70px 20px; padding:13px;">
                        <span class="guide">DROP PHOTO HERE!</span>
                        <img src="" class="item_img" id="<%-num%>_img" style="display:none; width:120px; height:90px;">
                    </div>
                    <p style="clear:both;"></p>
                </div>

                <% } %>
                </script>

            </div><!-- .reg_list -->
        </div>
         
        <div class = "which">
            <div class="cancel">
                <input type="button" value="取り消し" class = "btn">
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
                    <span class="touroku_item_1 name"><%-num%>:<input type="text" value="<%-ticket_name%>"></span>
                    <span class="touroku_item_2 price"><input type="text" class="numtxt" size="3" value="<%-ticket_price%>"></span>
                    <%if(id !== "new"){%>
                        <span class="touroku_item_5 delete"><input type="button" class="btn" value="消去"></span>
                    <%}else{%>
                        <span class="touroku_item_5"><input type="button" class="btn" style="visibility:hidden;" value="消去"></span>
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
        		<div class="touroku_item_2">￥<input type="text" class="numtxt" name="item_yen1"></div>
        		<div class="touroku_item_5"><input type="button" value="登録" class = "btn"></div>
        	</div>
    </div><!-- #expence_reg -->


<!-- ------------------------------ 以下JavaScript ------------------------------ -->
<script type="text/javascript">
var items=[],
    items_back=[],
    tickets=[],
    tickets_back=[],
    categorys=[],
    opt;

$(function(){
//--------------------------------------------------------------------------
// 確定ボタン（登録，更新）
    $("#item_reg .ok").on("click",function(){
        var flag = true,
            nav = "";
        $("#item_reg .reg_list .numtxt").each(function(){
            if($(this).val().match(/[^0-9]/)){
                flag = false;
                nav = "金額・在庫は半角数字のみを入力してください";
            }
        });
        if(nav !== ""){
            alert(nav);
        }
        // $("#item_reg .reg_list input:text").each(function(){
        //     if($(this).val() == ""){
        //         flag = false;
        //         alert("値を入力してください");
        //     }
        // });

        if(flag){
            var cfm = confirm("登録を確定しますか？");
            if(cfm){
                // リストの値を配列に格納
                var len = $("#item_reg .reg_list > div").length,
                    ary = [];
                if(shop_id != 1){
                    for(var i=0; i<len; i++){
                        var target = $("#item_reg .reg_list > div").eq(i);
                        ary[i] = {
                                "id" : target.data("metatag_regiapp_item_id"),
                                "item_name" : $(".name > input:text", target).val(),
                                "item_price" : $(".price > input:text", target).val() *1,
                                "item_stock" : $(".stock > input:text", target).val() *1,
                                "shop_id" : shop_id,
                                "category_id" : $(".category > select option:selected",target).val() *1
                             }
                    }
                }else{
                    for(var i=0; i<len; i++){
                        var target = $("#item_reg .reg_list > div").eq(i),
                            img_src = $(".item_img", target).attr("src"),
                            leader = $("input:checkbox", target).prop("checked");
                        if(img_src==""){img_src=null};
                        ary[i] = {
                                "id" : target.data("metatag_regiapp_item_id") *1,
                                "item_name" : $(".name > input:text", target).val(),
                                "item_price" : $(".price > input:text", target).val() *1,
                                "item_stock" : $(".stock > input:text", target).val() *1,
                                "item_detail" : $(".detail", target).val(),
                                "item_photo" : img_src,
                                "shop_id" : shop_id,
                                "category_id" : $(".category > select option:selected",target).val() *1,
                                "item_leader" : leader
                             }
                    }
                }

                var back = $.extend(true, {}, items_back),
                    json = [];
                for(var i=0; i<ary.length; i++){
                    if(ary[i].id == "new"){
                        delete ary[i].id;
                        if(shop_id == 1){if(ary[i].item_leader){ary[i].item_leader=1;}else{ary[i].item_leader=0;}}
                        // nullって送ってもnullにならないから削除，でもnullとしてDBからデータがくるから比較のためnullに1度変換していた
                        if(ary[i].item_photo == null){delete ary[i].item_photo;}
                        json.push(ary[i]);
                    }
                    // 更新判断
                    else{
                        if(shop_id != 1){
                            delete back[i].item_detail; delete back[i].item_photo; delete back[i].item_leader;
                        }else{
                            if(ary[i].item_photo==null){delete ary[i].item_photo}
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
                    $.post("/m_regi/items/add", json, function(data){
                        $.get("/m_regi/items/read",{"shop_id" : shop_id}, function(data){
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
        var cfm = confirm("登録を確定しますか？");
        if(cfm){
            var len = $("#ticket_reg .reg_list > div").length,
                ary = [];
            for(var i=0; i<len; i++){
                var target = $("#ticket_reg .reg_list > div").eq(i);
                ary[i] = {
                    "id" : target.data("metatag_regiapp_ticket_id"),
                    "ticket_name" : $(".name > input:text", target).val(),
                    "ticket_price" : $(".price > input:text", target).val() *1
                }
            }
            var back = $.extend(true, {}, tickets_back),
            json = [];
            for(var i=0; i<ary.length; i++){
                if(ary[i].id == "new"){
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
                $.post("/m_regi/tickets/add", json, function(data){
                    $.get("/m_regi/items/read",{shop_id : shop_id}, function(data){
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
    });// END-$("#ticket_reg .ok").on("click")

    $("#category_reg .ok").on("click", function(){
        var cfm = confirm("カテちゃん登録すーん？");
        if(cfm){
            var category_name = $(this).parent().prev().val();
            var json = {Category:{"shop_id": shop_id, "category_name": category_name}}
            $.post("/m_regi/Categorys/add", json, function(data){
                $.get("/m_regi/items/read",{"shop_id" : shop_id}, function(data){
                    categorys = [];
                   for(var i=0; i<data.category.length; i++){
                       categorys.push(data.category[i].Category);
                    }
                    alert("カテちゃんは永遠の存在になった！！");
                });
            });
        }
    });
//---------------------------------------------------------------------------------------
// 商品の読み込み，書き込み
    $.get("/m_regi/items/read",{"shop_id" : shop_id}, function(data){
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

        items_back = $.extend(true, {}, items);
        tickets_back = $.extend(true, {}, tickets);
        // カテゴリをプルダウンメニュで表示するため
        opt = '<option value="0">すべて</option>';
        for(var i=0; i<categorys.length; i++){
            opt += '<option value="'+categorys[i].id+'">'+categorys[i].category_name+'</option>';
        }
        firstAdd("item",items);
        firstAdd("ticket",tickets);
    });

    function firstAdd(tgt, ary){
        // 既存の品を出力
        target = $("#"+tgt+"_reg .reg_list");
        tmp = _.template($("#"+tgt+"_tmp").html());
        $("#"+tgt+"_reg select[name=item_number] option").eq(0).prop("selected", true);
        if(tgt=="item"){
            var count = items.length;
            for(var i=0; i<count; i++){
                // テンプレートのためにプロパティ追加
                ary[i].num = i+1;
                ary[i].option = opt;
                target.append(tmp(ary[i]));
            }
            // カテゴリを合わせる
            $("#item_reg .touroku_item .category select").each(function(){
                var id = $(this).parents(".touroku_item").data("metatag_regiapp_category_id");
                for(var i=0; i<$("option",this).length; i++){
                    if($("option",this).eq(i).val() == id){
                        $("option",this).eq(i).prop("selected", true);
                    }
                }
            });
        }else if(tgt=="ticket"){
            var count = tickets.length;
            for(var i=0; i<count; i++){
                ary[i].num = i+1;
                target.append(tmp(ary[i]));
            }
        }
    }
//--------------------------------------------------------------------------
// プルダウン選択でリストを追加
    $("#item_reg select[name=item_number]").on("change",function(){
        var target = $("#item_reg .reg_list"),
            tmp =_.template($("#item_tmp").html()),
            shelter = [],
            len = items.length,
            // 追加数
            count = parseInt($("#item_reg select[name=item_number] option:selected").val());
        for(var i=0; i<len; i++){
           shelter.push($("#item_reg .reg_list > div").eq(i));
        }
        // 削除してから
        $(">div",target).remove();
        for(var i=0; i<len + count; i++){
            if(i < len){
                target.append(shelter[i]);
            }else{
                target.append(tmp({
                    "id": "new", "category_id": 0,"num": i+1, "item_name": "", "item_price": 0, "item_stock": 0, "option": opt, "item_detail": "", "item_photo": null, "item_leader": null
                }));
            }
        }
    });
    $("#ticket_reg select[name=item_number]").on("change",function(){
        var target = $("#ticket_reg .reg_list"),
            tmp =_.template($("#ticket_tmp").html()),
            shelter = [],
            len = tickets.length,
            count = parseInt($("#ticket_reg select[name=item_number] option:selected").val());
        for(var i=0; i<len; i++){
           shelter.push($("#ticket_reg .reg_list > div").eq(i));
        }
        $(">div",target).remove();
        for(var i=0; i<len + count; i++){
            if(i < len){
                target.append(shelter[i]);
            }else{
                target.append(tmp({
                    "id": "new", "num": i+1, "ticket_name": "", "ticket_price": 0
                }));
            }
        }
    });
//--------------------------------------------------------------------------
// リセットボタン（そこのリストを初期状態に戻す）
    function resetList(tgt, ary){
        var target = $("#"+tgt+"_reg .reg_list"),
            tmp = _.template($("#"+tgt+"_tmp").html());
        $("div",target).remove();
        for(var i=0; i<ary.length; i++){
            target.append(tmp(ary[i]));
        }
        // selectedも初期状態に戻す
        $("#"+tgt+"_reg select[name=item_number] option").eq(0).prop("selected", true);
        $("#item_reg .touroku_item .category select").each(function(){
            var id = $(this).parents(".touroku_item").data("metatag_regiapp_category_id");
            for(var i=0; i<$("option",this).length; i++){
                if($("option",this).eq(i).val() == id){
                    $("option",this).eq(i).prop("selected", true);
                }
            }
        });
    }
    $("#item_reg .cancel").on("click",function(){
        resetList("item",items);
    });
    $("#ticket_reg .cancel").on("click",function(){
        resetList("ticket",tickets);
    });
//--------------------------------------------------------------------------
// 消去ボタン
    // 削除するデータを送信して，DBで削除されてからリロードするようにしたい
    $(document).on("click","#item_reg .reg_list .delete",function(){
        var cfm = confirm( "商品 " + $("input:text", $(this).prevAll(".name")).val() + " を削除しますか？" );
        if(cfm){
            var id = $(this).parents(".touroku_item").data("metatag_regiapp_item_id");
            $.post("/m_regi/Items/delete",{"id": id}, function(data){
                $.get("/m_regi/items/read",{"shop_id" : shop_id}, function(data){
                    items = [], items_back = [];
                    for(var i=0; i<data.item.length; i++){
                        items.push(data.item[i].Item);
                        delete items[i].item_photo_dir;
                    }
                    items_back = $.extend(true, {}, items);
                    $("#item_reg .reg_list > div").remove();
                    firstAdd("item", items);
                    alert("商品の削除が完了しました！");
                });
            });
        }
    });
    $(document).on("click","#ticket_reg .reg_list .delete",function(){
        var cfm = confirm( "金券 " + $("input:text", $(this).prevAll(".name")).val() + " を削除しますか？" );
        if(cfm){
            var id = $(this).parents(".touroku_item").data("metatag_regiapp_ticket_id");
            $.post("/m_regi/tickets/delete", {"id" : id}, function(data){
                $.get("/m_regi/items/read",{"shop_id" : shop_id}, function(data){
                    tickets = [], tickets_back = [];
                    for(var i=0; i<data.ticket.length; i++){
                        tickets.push(data.ticket[i].ticket);
                    }
                    tickets_back = $.extend(true, {}, tickets);
                    $("#ticket_reg .reg_list > div").remove();
                    firstAdd("ticket", tickets);
                    alert("金券の削除が完了しました！")
                });
            });
        }
    });
//--------------------------------------------------------------------------
// 出費登録 未完成
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
    $(document).on("click","input:text.numtxt",function(){
        $(this).select();
        return false;
    });
//--------------------------------------------------------------------------
// バザー用
// 画像関連
    // ドラッグ&ドロップされたらブラウザでファイルが開かれてしまうのを防ぐ
    $("body").on("dragover",function(){
        event.preventDefault();
    });
    $(document).on("drop",".dropzone",function(){
        event.preventDefault();
        event.stopPropagation();
        // FileListオブジェクトを取得
        var files = event.dataTransfer.files,
            file = files[0],
            fileReader = new FileReader();
        target_dropzone = $(event.target).attr("id");
        if(file.type.indexOf("image/") === 0){
            fileReader.onload = function(event){
                $("#"+target_dropzone+" > .guide").hide();
                var src = event.target.result;
                $("#"+target_dropzone+" > .item_img").attr("src", src);
                $("#"+target_dropzone+" > .item_img").show();
            }
            fileReader.readAsDataURL(file);
        }else{
            alert("画像ファイル以外はむりだわ");
      }
    });
//--------------------------------------------------------------------------
// 外にドラッグ&ドロップで既存の画像を削除
    $(document).on("dragstart",".item_img",function(){
        event.dataTransfer.setData("text", event.target.id);
    })
    $("body").on("drop",function(){
        event.preventDefault();
        var targetclass = $(event.target).attr("class") + "";
        if (targetclass !== "item_img" && targetclass !== "dropzone"){
            event.stopPropagation();
            $("#"+event.dataTransfer.getData("text")).attr("src", "").hide();
            $("#"+event.dataTransfer.getData("text")).prevAll(".guide").show(); 
        }
    })

});
</script>