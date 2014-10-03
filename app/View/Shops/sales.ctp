<div class="sales_container">
    <table>
       <tr><td style="font-size:140%;"><b>売上詳細</b></td><td class="line"><hr size = "5"></td></tr>
       </table>
    <table class="sales_big">
    	<thead>
			<tr class="sales1">
			   <th class="sales_day"><b>日付</b></th>
			   <th class="sales_time"><b>時間帯</b></th>
			   <th class="sales_yen"><b>売上(円)</b></th>
			   <th class="sales_customer"><b>客数(人)</b></th>
			   <th class="sales_other_big"><b>男幼(人)</b></th>
			   <th class="sales_other_big"><b>男成(人)</b></th> 
			   <th class="sales_other_big"><b>男熟(人)</b></th> 
			   <th class="sales_other_big"><b>女幼(人)</b></th> 
			   <th class="sales_other_big"><b>女成(人)</b></th> 
			   <th class="sales_other_big"><b>女熟(人)</b></th>
			</tr>
        </thead>
        <tfoot>
        	<tr>
        		<td colspan="2" class="sales_all"><b>総売上(円)</b></td>
        		<td class="sales_all2">1000000</td>
        		<td colspan="4" class="sales_all3"><b>採算(円)</b></td>
        		<td colspan="3" class="sales_all4">100000</td>
        	</tr>
        </tfoot>
        <tr class="sales2">
            <td class="sales_day1">**/**</td>
            <td class="sales_time1">
                <select name="item_number">
                    <option value="all">終日</option>
                    <option value="am">午前</option>
                    <option value="pm">午後</option>
                </select>
            </td>
            <td class="sales_yen">100000</td>
            <td class="sales_customer">1000</td>
            <td class="sales_other_big">1000</td>
            <td class="sales_other_big">1000</td>
            <td class="sales_other_big">1000</td>
            <td class="sales_other_big">1000</td>
            <td class="sales_other_big">1000</td>
            <td class="sales_other_big">1000</td>   
			
        </tr>
        <tr class="sales2">
            <td class="sales_day1">**/**</td>
            <td class="sales_time1">
                <select name="item_number">
                    <option value="all">終日</option>
                    <option value="am">午前</option>
                    <option value="pm">午後</option>
                </select>
            </td>
            <td class="sales_yen">100000</td>
            <td class="sales_customer">1000</td>
            <td class="sales_other_big">1000</td>
            <td class="sales_other_big">1000</td>
            <td class="sales_other_big">1000</td>
            <td class="sales_other_big">1000</td>
            <td class="sales_other_big">1000</td>
            <td class="sales_other_big">1000</td>
        </tr>
    </table>
</div>
    
 <!--===========================================
 	ここでレスポンシブ区切り、表示の変更
 ===============================================-->
 
    <div class="sales_container2">
        <table>
           <tr><td style="font-size:140%;"><b>売上詳細</b></td><td class="line"><hr size = "5"></td></tr>
           </table>
        <table class="sales_big">
        	<thead>
				<tr class="sales1">
				   <th class="sales_day"><b>日付</b></th>
				   <th class="sales_time"><b>時間帯</b></th>
				   <th class="sales_yen"><b>売上(円)</b></th>
				   <th class="sales_customer"><b>客数(人)</b></th>
				   <th class="sales_other_small"><b>幼(人)</b></th>
				   <th class="sales_other_small"><b>成(人)</b></th>
				   <th class="sales_other_small"><b>熟(人)</b></th>   
				</tr>
            </thead>
            <tfoot>
            	<tr>
            		<td colspan="2" class="sales_all"><b>総売上(円)</b></td>
            		<td class="sales_all2">1000000</td>
            		<td colspan="2" class="sales_other"><b>採算(円)</b></td>
            		<td colspan="2" class="sales_other">100000</td>
            	</tr>
            </tfoot>
            <tr class="sales2">
                <td class="sales_day1">**/**</td>
                <td class="sales_time1">
                    <select name="item_number">
                        <option value="all">終日</option>
                        <option value="am">午前</option>
                        <option value="pm">午後</option>
                    </select>
                </td>
                <td class="sales_yen">100000</td>
                <td class="sales_customer">1000</td>
                <td class="sales_other_small">1000</td>
				<td class="sales_other_small">1000</td>
			    <td class="sales_other_small">1000</td>   
				
            </tr>
            <tr class="sales2">
                <td class="sales_day1">**/**</td>
                <td class="sales_time1">
                    <select name="item_number">
                        <option value="all">終日</option>
                        <option value="am">午前</option>
                        <option value="pm">午後</option>
                    </select>
                </td>
                <td class="sales_yen">100000</td>
                <td class="sales_customer">1000</td>
                <td class="sales_other_small">1000</td>
				<td class="sales_other_small">1000</td>
			    <td class="sales_other_small">1000</td>
            </tr>
        </table>
    </div>
	<div class="cost_container">
        <table>
           <tr><td style="font-size:140%;"><b>費用削除</b></td><td class="line2"><hr size = "5"></td></tr>
        </table>
        <table class="cost_table">
        	<thead>
				<tr class="cost_tr">
				   <th class="cost_name"><b>費用名</b></th>
				   <th class="cost_yen"><b>金額</b></th>
				   <th class="null"><b></b></b></th>
				</tr>
            </thead>
            <tr class="cost_tr">
                <td class="cost_name">わりばし</td>
				<td class="cost_yen">1000</td>
			    <td class="null">
			    	<input type="button" name="cost_delete" value="消去" class="btn2">
			    </td>   
				
            </tr>
            <tr class="cost_tr">
                <td class="cost_name">ゴム</td></td>
				<td class="cost_yen">1000</td>
			    <td class="null">
			    	<input type="button" name="cost_delete" value="消去" class="btn2">
			    </td>   
				
            </tr>
        </table>
        <div class="cost_container">
        <table>
           <tr><td style="font-size:140%;"><b>金券削除</b></td><td class="line2"><hr size = "5"></td></tr>
        </table>
        <table class="cost_table">
        	<thead>
				<tr class="cost_tr">
				   <th class="cost_name"><b>金券名</b></th>
				   <th class="cost_yen"><b>金額</b></th>
				   <th class="null"><b></b></b></th>
				</tr>
            </thead>
            <tr class="cost_tr">
                <td class="cost_name">11月祭</td>
				<td class="cost_yen">50</td>
			    <td class="null">
			    	<input type="button" name="cost_delete" value="消去" class="btn2">
			    </td>   
				
            </tr>
            <tr class="cost_tr">
                <td class="cost_name">閑堂忌</td></td>
				<td class="cost_yen">100</td>
			    <td class="null">
			    	<input type="button" name="cost_delete" value="消去" class="btn2">
			    </td>   
				
            </tr>
        </table>
        <div class="cost_container">
        <table>
           <tr><td style="font-size:140%;"><b>商品削除</b></td><td class="line2"><hr size = "5"></td></tr>
        </table>
        
        <table class="cost_table">
        	<thead>
				<tr class="cost_tr">
				   <th class="cost_name"><b>商品名</b></th>
				   <th class="cost_yen"><b>金額</b></th>
				   <th class="null"><b></b></b></th>
				</tr>
            </thead>
            <tr class="cost_tr">
                <td class="cost_name">マウス</td>
				<td class="cost_yen">50</td>
			    <td class="null">
			    	<input type="button" name="cost_delete" value="消去" class="btn2">
			    </td>   
				
            </tr>
            <tr class="cost_tr">
                <td class="cost_name">スマホ</td></td>
				<td class="cost_yen">10000</td>
			    <td class="null">
			    	<input type="button" name="cost_delete" value="消去" class="btn2">
			    </td>   
				
            </tr>
        </table>
        <div class="cost_container">
        <table>
           <tr><td style="font-size:140%;"><b>カテゴリ削除</b></td><td class="line3"><hr size = "5"></td></tr>
        </table>
        <table class="cost_table">
        	<thead>
				<tr class="cost_tr">
				   <th class="cost_name"><b>カテゴリ名</b></th>
				   <th class="null"><b></b></b></th>
				</tr>
            </thead>
            <tr class="cost_tr">
                <td class="cost_name">服</td>
			    <td class="null">
			    	<input type="button" name="cost_delete" value="消去" class="btn2">
			    </td>   
				
            </tr>
            <tr class="cost_tr">
                <td class="cost_name">ゲーム</td></td>
			    <td class="null">
			    	<input type="button" name="cost_delete" value="消去" class="btn2">
			    </td>   
				
            </tr>
        </table>
    </div>
<!-- ------------------------------ 以下JavaScript ------------------------------ -->
<script type="text/javascript">

</script>