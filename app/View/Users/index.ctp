<?php
	$this -> Html -> script( 'jquery-1.11.1.min', array( 'inline' => false ) );
	$this -> Html -> script( 'underscore-min', array( 'inline' => false ) );
	
	echo("<script type='text/javascript'>var fromPHP = ".json_encode($items)."</script>");
?>

<html lang="ja">
<head>
	<meta charset="UTF-8">
	<title>登録</title>
</head>
<body>
	<div id="category_reg">
		<h5>-----カテゴリ登録-----</h5>
		<p>
			<span>
				<select>

					<script id="cat_tmp" type="text/template">
						<%=opt%>
					</script>

				</select>
				<input type="button" value="消去">
			</span>
			<span class="reg">
				<input type="text" size="8">
				<input type="button" class="reg_btn" value="登録">
			</span>
		</p>
	</div><!-- /#category_reg -->

	<div id="item_reg">
		<h5>-----商品登録-----</h5>
		<p>
			<span>
				商品数:
				<select>

					<script id="op_tmp" type="text/template">
						<option value="<%=len%>"><%=len%></option>
					</script>

				</select>
			</span>
		</p>
		<h5>商品名／販売価格／カテゴリ／在庫</h5>
		<div class="list">

			<script id="item_tmp" type="text/template">
				<div class="" data-metatag_regiapri_item_id="<%=id%>"><%=num%>:
					<span class="name"><input type="text" size="8" value="<%=item_name%>"></span>
					<span class="price">¥<input type="text" size="3" value="<%=item_price%>"></span>
					<span class="category"><select><%=option%></select></span>
					<span class="stock"><input type="text" size="3" value="<%=item_stock%>"></span>
					<%if(id !== "new"){%>
						<span class="delate"><input type="button" value="消去"></span>
					<%}%>
				</div>
			</script>

		</div><!-- /.list -->
		<p>
			<input type="button" class="reset" value="リセット">
			<input type="button" class="dec_btn" value="確定">
		</p>
	</div><!-- /#item_reg -->
	<hr>

	<div id="ticket_reg">
		<h5>-----金券登録-----</h5>
		<p>
			金券数:
				<select>
					<!-- #op_tmp -->
				</select>
		</p>
		<h5>金券名／価格</h5>
		<div class="list">

			<script id="ticket_tmp" type="text/template">
				<div class="" data-metatag_regiapri_ticket_id="<%=id%>"><%=num%>:
					<span class="name"><input type="text" size="8" value="<%=ticket_name%>"></span>
					<span class="price"><input type="text" size="3" value="<%=ticket_price%>"></span>
					<%if(id !== "new"){%>
						<span class="delate"><input type="button" value="消去"></span>
					<%}%>
				</div>

			</script>
		</div><!-- /.list -->
		<p>
			<input type="button" class="reset" value="リセット">
			<input type="button" class="dec_btn" value="確定">
		</p>
	</div><!-- /#tickest_reg -->
	<hr>

	<div id="expense_reg">
		<h5>-----出費登録-----</h5>
		<p>出費内容／値段</p>
		<p>
			<span class="val"><textarea></textarea></span>
			¥<span class="price"><input type="text" size="3"></span>
			<span class="reg"><input type="button" class="reg_btn" value="登録"></span>
		</p>
	</div><!-- /#expense_reg -->



<!-- 以下JavaScript -->
<script type="text/javascript">
var items = [],
	categorys=[],
	items_back,
	opt,
	tickets;

$(function(){
	for(i=0; i<fromPHP.length; i++){
		items.push(fromPHP[i].Item);
	}
	for(i=0; i<fromPHP.length; i++){
		categorys.push(fromPHP[i].Category);
	}

	function firstadd(tgt, json){
		var target = $("#"+tgt+"_reg select");;
		var tmp = _.template($("#op_tmp").html());
		var len = json.length;
		for(var i=len; i<=len+10; i++){
			target.append(tmp({len:i}));
		}
		target = $("#"+tgt+"_reg > div.list");
		tmp = _.template($("#"+tgt+"_tmp").html());
		var count = $("#"+tgt+"_reg select option:selected").val();

		if(tgt=="item"){
			for(var i=0; i<count; i++){
				json[i].num = i+1;
				json[i].option = opt
				target.append(tmp(json[i]));
			}
		}else if(tgt=="ticket"){
			for(var i=0; i<count; i++){
				json[i].num = i+1;
				target.append(tmp(json[i]));
			}
		}
	}
	// 商品
	(function(){
			items_back = $.extend(true, {}, items);
				// オプションになる文字列をカテゴリから生成
				opt = "";
				for(var i=0; i<categorys.length; i++){
					opt += '<option value="'+categorys[i].id+'">'+categorys[i].category_name+'</option>';
				}
				var tmp = _.template($("#cat_tmp").html());
				$("#category_reg select").append(tmp(opt));
				firstadd("item",items);
			})();
	// 金券
	// (function(){
	// 		firstadd("ticket",tickets);
	// 	});
	// })();
//--------------------------------------------------------------------------
	// プルダウン選択でリストを追加
	function listadd(tgt){
		var target = $("#"+tgt+"_reg div.list");
		var tmp =_.template($("#"+tgt+"_tmp").html());
		// 次に書き込むdiv数
		var count = $("#"+tgt+"_reg select > option:selected").val();
		// 現在あるdiv数
		var len = $("#"+tgt+"_reg > div.list > div").length;
		// 退避
		var shelter = [];
		for(var i=0; i<len; i++){
			shelter.push($("#"+tgt+"_reg > div.list > div").eq(i));
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
					target.append(tmp({id : "new", num : i+1, item_name : "", item_price : "", item_stock : "", option : opt}));
				}else if(tgt=="ticket"){
					target.append(tmp({id : "new", num : i+1, ticket_name : "",ticket_price : ""}));
				}
			}
		}
	}
	$("#item_reg select").change(function(){
		listadd("item");
	});
	$("#ticket_reg select").change(function(){
		listadd("ticket");
	});
//--------------------------------------------------------------------------
	// 確定ボタン（登録，更新）
	function compare(ary, back){
		for(var i=0; i<ary.length; i++){
			// 新しい商品を登録
			if(ary[i].id == "new"){
				delete ary[i].id;
				console.log(ary[i]);
				$.post('/m_regi2/items/add',ary[i],function(data){
					console.log(data);
				},null);
			}
			// 既存の商品を更新
			else{
				var flag = _.isEqual(ary[i],back[i]);
				if(flag == false){
					console.log("更新をDBに送信");
					// ここでDBに送信
				}else{
					console.log("何もしない");
				}
			}
		}
	}
	// リストの値を配列に格納
	$("#item_reg .dec_btn").click(function(){
		var len = $("#item_reg > div.list > div").length,
			ary = [];
		for(var i=0; i<len; i++){
			var target = $("#item_reg > div.list > div").eq(i);
			ary[i] = {
				"id" : target.data("metatag_regiapri_item_id") + "",
				"item_detail" : "",
				"item_name" : $(".name > input:text",target).val(),
				"item_photo" : "",
				"item_price" : $(".price > input:text",target).val(),
				"item_stock" : $(".stock > input:text",target).val(),
				"shop_id" : "",
				"category_id" : $(".category > select option:selected",target).val()
			}
		}
		compare(ary,items_back);
	});
	$("#ticket_reg .dec_btn").click(function(){
		var count = $("#ticket_reg > div.list > div").length,
			ary = [];
		for(var i=0; i<count; i++){
			var target = $("#ticket_reg > div.list > div").eq(i);
			ary[i] = {
				"id" : target.data("metatag_regiapri_ticket_id") + "",
				"ticket_name" : $(".name > input:text",target).val(),
				"ticket_price" : $(".price > input:text",target).val()
			}
		}
		compare(ary,tickets_back);
	});
//--------------------------------------------------------------------------
	// 消去ボタン
	// 削除するデータを送信して，DBで削除されてからリロードするようにしたい
	$(document).on("click","#item_reg > div.list .delate",function(){
		var id = $(this).parent().data("metatag_regiapri_item_id");
		alert(id);
	});
	$(document).on("click","#ticket_reg > div.list .delate",function(){
		var id = $(this).parent().data("metatag_regiapri_ticket_id");
		alert(id);
	});
//--------------------------------------------------------------------------
	// リセットボタン（そこのリストを初期状態に戻す）
	function resetList(tgt, json){
		var target = $("#"+tgt+"_reg > div.list");
		var tmp = _.template($("#"+tgt+"_tmp").html());
		$(" > div",target).remove();
		for(var i=0; i<json.length; i++){
			target.append(tmp(json[i]));
		}
		// selectedも初期状態に戻す
		var ary = $("#"+tgt+"_reg select > option").eq(0);
		ary[0].selected = true;
	}
	$("#item_reg .reset").click(function(){
		resetList("item",items);
	});
	$("#ticket_reg .reset").click(function(){
		resetList("ticket",tickets);
	});
//--------------------------------------------------------------------------
	// 出費登録
	$("#expense_reg .reg_btn").click(function(){
		var val1 = $("#expense_reg textarea").val();
		var val2 = $("#expense_reg input:text").val();
		var obj = {content:val1,expense:val2};
		if(obj.content !== "" && obj.expense !== ""){
			console.log(obj.content + obj.expense);
		}else{
			console.log("null発見");
		}
	});
//--------------------------------------------------------------------------

});

</script>
</body>
</html>