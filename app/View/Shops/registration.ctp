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
                <input type = "button" value = "登録">
            </div>
           
        </div>
        <div class="touroku_body">
        	<div class="touroku_1">
        		<div class="touroku_1_1"><b>商品名</b></div>
                <div class="touroku_1_medama"><b>目玉商品</b></div>
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
                <% if(shop_id != 1){ %>

                <div class="touroku_item" data-metatag_regiapp_item_id="<%-id%>" data-metatag_regiapp_category_id="<%-category_id%>">
                    <div class="touroku_item_1 name"><%-num%>:<input type="text" value="<%-item_name%>"></div>
                    <div class="touroku_item_medama"><input type="checkbox" <input type="checkbox" <% if(item_leader){%>checked<% } %> ></div>
                    <div class="touroku_item_2 price">¥<input type="text" class="numtxt" value="<%-item_price%>"></div>
                    <div class="touroku_item_3 category"><select><%=option%></select></div>
                    <div class="touroku_item_4 stock"><input type="text" class="numtxt" value="<%-item_stock%>"></div>
                    <%if(id !== "new"){%>
                    <div class="touroku_item_5 delete"><input type="button" class="btn" value="消去"></div>
                    <%}else{%>
                    <div class="touroku_item_5" style="visibility:hidden;"><input type="button" class="btn" value="消去"></div>
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
                <div class="touroku_item" data-metatag_regiapp_ticket_id="<%-id%>">
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
        		<div class="touroku_item_2">￥<input type="text" class="numtxt" name="item_yen1"></div>
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
    function compare(ary, back_json){
        var back = $.extend(true, {}, back_json),
            json = [];
        for(var i=0; i<ary.length; i++){
            // 新商品("new" *1 = NaN)
            if(isNaN(ary[i].id)){
                delete ary[i].id;
                // nullって送ってもnullにならないから削除
                if(ary[i].item_photo==null){delete ary[i].item_photo}
                if(ary[i].item_leader){ary[i].item_leader=1}else{ary[i].item_leader=0}
                json.push(ary[i]);
            }
            // 更新判断
            else{
                if(shop_id != 1){delete back[i].item_detail; delete back[i].item_photo;}
                var flag = _.isEqual(ary[i], back[i]);
                if(ary[i].item_photo==null){delete ary[i].item_photo}
                if(ary[i].item_leader){ary[i].item_leader=1}else{ary[i].item_leader=0}
                // true=同じ，false=異なる
                if(!flag){
                    json.push(ary[i]);
                }
            }
        }
            json = {'Item':json};
            debugger;
            if(json.Item.length != 0){
                $.post("/m_regi/items/add", json, function(data){
                    console.log("data = "+data);
                });
            }
    }

    $("#item_reg .ok > input:button").on("click",function(){
        var flag = true;
        $("#item_reg .reg_list .numtxt").each(function(){
            if ($(this).val().match(/[^0-9]/)){
                flag = false;
                alert("金額・在庫は半角数字のみを入力してください");
            }
        });
        if(flag){
            // リストの値を配列に格納
            var len = $("#item_reg .reg_list > div").length,
                ary = [];
            if(shop_id != 1){
                for(var i=0; i<len; i++){
                    var target = $("#item_reg .reg_list > div").eq(i);
                    ary[i] = {
                            "id" : target.data("metatag_regiapp_item_id") *1,
                            "item_name" : $(".name > input:text", target).val(),
                            "item_price" : $(".price > input:text", target).val() *1,
                            "item_stock" : $(".stock > input:text", target).val() *1,
                            "shop_id" : shop_id,
                            "category_id" : $(".category > select option:selected",target).val() *1,
                            "item_leader" : $("input:checkbox", target).prop("checked")
                         }
                }
            }else{
                for(var i=0; i<len; i++){
                    var target = $("#item_reg .reg_list > div").eq(i),
                        img_src = $(".item_img", target).attr("src"),
                        leader = $("input:checkbox", target).prop("checked");
                    if(img_src==""){img_src=null};
                    // if(leader){leader = 0}else{leader = 1};
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
            compare(ary,items_back);
        }

    });

    $("#ticket_reg .ok > input:button").on("click",function(){
        var count = $("#ticket_reg .reg_list > div").length,
            ary = [];
        for(var i=0; i<count; i++){
            var target = $("#ticket_reg .reg_list > div").eq(i);
            ary[i] = {
                "id" : target.data("metatag_regiapp_ticket_id") *1,
                "ticket_name" : $(".name > input:text",target).val(),
                "ticket_price" : $(".price > input:text",target).val() *1
            }
        }
        var back = $.extend(true, {}, tickets_back),
            json = [];
            for(var i=0; i<ary.length; i++){
                if(isNaN(ary[i].id)){
                    delete ary[i].id;
                    json.push(ary[i]);
                }else{
                    var flag = _.isEqual(ary[i], back[i]);
                    if(flag){
                        // json.push(ary[i]);
                    }
                }
                json = {"Ticket" : json};
                if(json.Ticket.length !== 0){
                    $.post("/m_regi/tickets/add", json, function(data){
                        console.log(data);
                    })
                }
            }
    });
//---------------------------------------------------------------------------------------
// 商品の読み込み，書き込み
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
            for(var i=0; i<count; i++){
                ary[i].num = i+1;
                target.append(tmp(ary[i]));
            }
        }
    }
    $.get("/m_regi/items/read",{shop_id : shop_id}, function(data){
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
        // オプションになる文字列をカテゴリから生成
        opt = '<option value=""></option>';
        for(var i=0; i<categorys.length; i++){
            opt += '<option value="'+categorys[i].id+'">'+categorys[i].category_name+'</option>';
        }
        firstadd("item",items);
        firstadd("ticket",tickets);
    });
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
                        id: "new", category_id: "", num: i+1, item_name: "", item_price: "", item_stock: "", option: opt, item_detail: "", item_photo: null, item_leader: false
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
// リセットボタン（そこのリストを初期状態に戻す）
    function resetList(tgt, ary){
        var target = $("#"+tgt+"_reg .reg_list");
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
    $("#item_reg .cancel > input:button").on("click",function(){
        resetList("item",items);
    });
    $("#ticket_reg .cancel > input:button").on("click",function(){
        resetList("ticket",tickets);
    });
//--------------------------------------------------------------------------
// 消去ボタン
    // 削除するデータを送信して，DBで削除されてからリロードするようにしたい
    $(document).on("click","#item_reg .reg_list .delete",function(){
        var id = $(this).parents(".touroku_item").data("metatag_regiapp_item_id");
        $.post("/m_regi/Items/delete",{id : id}, function(data){
            console.log(data);
        });
    });
    $(document).on("click","#ticket_reg .reg_list .delete",function(){
        var id = $(this).parent().data("metatag_regiapp_ticket_id");
        alert(id);
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
// カテゴリ登録
    $(".new_category > input:button").on("click",function(){
        var category_name = $(this).prev().val();
        var json = {Category:{shop_id:shop_id, category_name:category_name}}
        $.post("/m_regi/Categorys/add", json, function(data){
            console.log(data);
        })
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