<?php
    $ProfitsRead = $this->Html->url("/Profits/read", true);
    $ItemsRead = $this->Html->url("/Items/read", true);
?>
<!-- 利益 -->
    <div class="cost_container">
            <table>
               <tr><td style="font-size:140%;"><b>収支結果</b></td><td class="line2"><hr size = "5"></td></tr>
            </table>
            <table class="cost_table Profit_table">
                <thead>
                    <tr class="cost_tr">
                       <th class="cost_name"><b>総売上</b></th>
                       <th class="cost_yen"><b>総支出</b></th>
                       <th class="cost_yen"><b>利益</b></th>
                    </tr>
                </thead>

                <script type="text/template" id="Profit_tr_tmp">
                <tr class="cost_tr">
                    <td class="cost_name"><%- total_sale %></td>
                    <td class="cost_yen"><%- total_cost %></td>
                    <td class="cost_yen"><%- total_profit %></td>
                </tr>
                </script>

            </table>
    </div>
<!-- /利益 -->

<!-- 日別 -->
    <div class="sales_container">
        <table>
           <tr><td style="font-size:140%;"><b>日別売上</b></td><td class="line"><hr size = "5"></td></tr>
       </table>
        <table class="sales_big DiffByDate_table_big">
            <thead>
                <tr class="sales1">
                   <th class="sales_day"><b>日付</b></th>
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
            </tfoot>

        </table>

        <script type="text/template" id="DiffByDate_big_tmp">
        <tr class="sales2">
            <td class="sales_day1"><%- date %></td>
            <td class="sales_yen"><%- sale %></td>
            <td class="sales_customer"><%- total_p %></td>
            <td class="sales_other_big"><%- p1 %></td>
            <td class="sales_other_big"><%- p2 %></td>
            <td class="sales_other_big"><%- p3 %></td>
            <td class="sales_other_big"><%- p4 %></td>
            <td class="sales_other_big"><%- p5 %></td>
            <td class="sales_other_big"><%- p6 %></td>                   
        </tr>
        </script>

        <script type="text/template" id="DiffByDate_big_tfoot_tmp">
        <tr>
            <td class="sales_all"><b>合計</b></td>
            <td class="sales_all2"><%- sum_sale %></td>
            <td class="sales_customer"><%- sum_p %></td>
            <td class="sales_other_big"><%- sum_p1 %></td>
            <td class="sales_other_big"><%- sum_p2 %></td>
            <td class="sales_other_big"><%- sum_p3 %></td>
            <td class="sales_other_big"><%- sum_p4 %></td>
            <td class="sales_other_big"><%- sum_p5 %></td>
            <td class="sales_other_big"><%- sum_p6 %></td>
        </tr>
        </script>

        <p style="font-size:80%; margin:0 auto; width:900px;">※幼＝～１０代、成＝２０～３０代、熟＝４０代以上を表します</p>
    </div>
    
 <!--===========================================
    ここでレスポンシブ区切り、表示の変更
 ===============================================-->
 
    <div class="sales_container2">
        <table>
           <tr><td style="font-size:140%;"><b>日別売上</b></td><td class="line"><hr size = "5"></td></tr>
           </table>
        <table class="sales_big DiffByDate_table_small">
            <thead>
                <tr class="sales1">
                   <th class="sales_day"><b>日付</b></th>
                   <th class="sales_yen"><b>売上(円)</b></th>
                   <th class="sales_customer"><b>客数(人)</b></th>
                   <th class="sales_other_small"><b>幼(人)</b></th>
                   <th class="sales_other_small"><b>成(人)</b></th>
                   <th class="sales_other_small"><b>熟(人)</b></th>   
                </tr>
            </thead>

            <tfoot>
            </tfoot>

        </table>

        <script type="text/template" id="DiffByDate_small_tmp">
        <tr class="sales2">
            <td class="sales_day1"><%- date %></td>
            <td class="sales_yen"><%- sale %></td>
            <td class="sales_customer"><%- total_p %></td>
            <td class="sales_other_small"><%- p1_p4 %></td>
            <td class="sales_other_small"><%- p2_p5 %></td>
            <td class="sales_other_small"><%- p3_p6 %></td>        
        </tr>
        </script>

        <script type="text/template" id="DiffByDate_small_tfoot_tmp">
        <tr>
            <td class="sales_all"><b>合計</b></td>
            <td class="sales_all2"><%- sum_sale %></td>
            <td class="sales_customer"><%- sum_p %></td>
            <td class="sales_other_small"><%- sum_p1_p4 %></td>
            <td class="sales_other_small"><%- sum_p2_p5 %></td>
            <td class="sales_other_small"><%- sum_p3_p6 %></td> 
        </tr>
        </script>

        <p style="font-size:80%; margin:0 auto; width:900px;">※幼＝～１０代、成＝２０～３０代、熟＝４０代以上を表します</p>
    </div>
<!-- /日別 -->

<!-- 費用 -->
    <div class="cost_container">
        <table>
           <tr><td style="font-size:140%;"><b>費用</b></td><td class="line4"><hr size = "5"></td></tr>
        </table>
        <table class="cost_table Expense_table">
            <thead>
                <tr class="cost_tr">
                   <th class="cost_name"><b>費用名</b></th>
                   <th class="cost_yen"><b>金額(円)</b></th>
                </tr>
            </thead>

            <tfoot>
            </tfoot>

        </table>

        <script type="text/template" id="Expense_tr_tmp">
        <tr class="cost_tr">
            <td class="cost_name"><%- name %></td>
            <td class="cost_yen"><%- price %></td>
        </tr>
        </script>

        <script type="text/template" id="Expense_tfoot_tmp">
        <tr>
            <td class="cost_name"><b>費用合計</b></td>
            <td class="cost_yen"><%- sum %></td>
        </tr>
        </script>

    </div>
<!-- /費用 -->

<!-- 時間帯別 -->
    <div class="sales_container DiffByTime_big">
    <table>
       <tr><td style="font-size:140%;"><b>時間帯別売上</b></td><td class="line5"><hr size = "5"></td></tr>
    </table>

    <script type="text/template" id="TimeByDate_big_tmp">
    <table class="sales_big DiffByTime_big_<%- num %>">
        <thead>
            <tr class="sales1">
               <th class="sales_day"><b><%- sale_date %></b></th>
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
        </tfoot>

    </table>
    </script>


    <script type="text/template" id="DiffByTime_big_tmp">
    <tr class="sales2 diffByTime">
        <td class="sales_day1"><%- time %></td>
        <td class="sales_yen"><%- sale %></td>
        <td class="sales_customer"><%- total_p %></td>
        <td class="sales_other_big"><%- p1 %></td>
        <td class="sales_other_big"><%- p2 %></td>
        <td class="sales_other_big"><%- p3 %></td>
        <td class="sales_other_big"><%- p4 %></td>
        <td class="sales_other_big"><%- p5 %></td>
        <td class="sales_other_big"><%- p6 %></td>
    </tr>
    </script>

    <script type="text/template" id="DiffByTime_big_tfoot_tmp">
    <tr>
        <td class="sales_all"><b>合計</b></td>
        <td class="sales_all2"><%- sum_sale %></td>
        <td class="sales_customer"><%- sum_p %></td>
        <td class="sales_other_big"><%- sum_p1 %></td>
        <td class="sales_other_big"><%- sum_p2 %></td>
        <td class="sales_other_big"><%- sum_p3 %></td>
        <td class="sales_other_big"><%- sum_p4%></td>
        <td class="sales_other_big"><%- sum_p5 %></td>
        <td class="sales_other_big"><%- sum_p6 %></td>
    </tr>
    </script>

    </div>
    
 <!--===========================================
    ここでレスポンシブ区切り、表示の変更
 ===============================================-->
 
    <div class="sales_container2 DiffByTime_small">
        <table>
           <tr><td style="font-size:140%;"><b>時間帯別売上</b></td><td class="line5"><hr size = "5"></td></tr>
           </table>
        <script type="text/template" id="TimeByDate_small_tmp">
        <table class="sales_big DiffByTime_small_<%- num %>">
            <thead>
                <tr class="sales1">
                   <th class="sales_day"><b><%- sale_date %></b></th>
                   <th class="sales_yen"><b>売上(円)</b></th>
                   <th class="sales_customer"><b>客数(人)</b></th>
                   <th class="sales_other_small"><b>幼(人)</b></th>
                   <th class="sales_other_small"><b>成(人)</b></th>
                   <th class="sales_other_small"><b>熟(人)</b></th>   
                </tr>
            </thead>

            <tfoot>
            </tfoot>

        </table>
        </script>

        <script type="text/template" id="DiffByTime_small_tmp">
        <tr class="sales2">
            <td class="sales_day1"><%- time %></td>
            <td class="sales_yen"><%- sale %></td>
            <td class="sales_customer"><%- total_p %></td>
            <td class="sales_other_small"><%- p1_p4 %></td>
            <td class="sales_other_small"><%- p2_p5 %></td>
            <td class="sales_other_small"><%- p3_p6 %></td>                
        </tr>
        </script>

        <script type="text/template" id="DiffByTime_small_tfoot_tmp">
        <tr>
            <td class="sales_all"><b>合計</b></td>
            <td class="sales_all2"><%- sum_sale %></td>
            <td class="sales_customer"><%- sum_p %></td>
            <td class="sales_other_small"><%- sum_p1_p4 %></td>
            <td class="sales_other_small"><%- sum_p2_p5 %></td> 
            <td class="sales_other_small"><%- sum_p3_p6 %></td>
        </tr>
        </script>

    </div>
<!-- /時間帯別 -->


<!-- ---------JavaScript--------- -->
<script type="text/javascript">
var i, j, k, l;

$(function(){

    $.get("<?php echo $ProfitsRead ?>", {"shop_id": <?php echo $shop['id'] ?>}, function(data){
        var data_sales = [], sale_dates = [];
        for(i=0; i<data.Profits.length; i++){            
            data_sales.push(data.Profits[i].Sale);
            sale_dates.push(data.Profits[i].Profit.sale_time.substr(0, 10));
        }

        // 日にちの種類（数）
        sale_dates = _.uniq(sale_dates);
        var flag = null;
        var group, date_group = [];
        for(i=0; i<sale_dates.length; i++){
            group = [];
            for(j=0; j<data.Profits.length; j++){
                flag = data.Profits[j].Profit.sale_time.substr(0, 10).match(sale_dates[i]);
                if(flag!==null){
                    group.push(data.Profits[j]);
                }
            }
            date_group.push(group);
        }

        $.get("<?php echo $ItemsRead ?>", {"shop_id": <?php echo $shop['id'] ?>}, function(data){
            var data_costs = [];
            for(i=0; i<data.cost.length; i++){
                data_costs.push(data.cost[i].Cost);
            }
            CostLiquidation(data_sales, data_costs);
            DateLiquidation(sale_dates, date_group);
            TimeLiquidation(sale_dates, date_group);
        });
    });

    function CostLiquidation(data_sales, data_costs){
        var tmp;
        var total_sale = 0, total_cost = 0, total_profit = 0;
        var name, price, sum = 0;
        for(i=0; i<data_sales.length; i++){
            for(j=0; j<data_sales[i].length; j++){
                total_sale += parseInt(data_sales[i][j].sale_price, 10);
            }
        }
        for(i=0; i<data_costs.length; i++){
            total_cost += parseInt(data_costs[i].price, 10);
        }
        total_profit = (total_sale - total_cost);
        tmp = _.template($("#Profit_tr_tmp").html());
        $(".Profit_table").append(tmp({total_sale: total_sale, total_cost: total_cost, total_profit: total_profit}));

        tmp = _.template($("#Expense_tr_tmp").html());
        for(i=0; i<data_costs.length; i++){
            name = data_costs[i].name;
            price = parseInt(data_costs[i].price, 10);
            $(".Expense_table").append(tmp({name: name, price: price}));
            sum += price;
        }
        tmp = _.template($("#Expense_tfoot_tmp").html());
        $(".Expense_table > tfoot").append(tmp({sum: sum}));

    }

    function DateLiquidation(sale_dates, date_group){
        var p1, p2, p3, p4, p5, p6, total_p;
        var day_sale, sum_sale=0, sum_p=0, sum_p1=0, sum_p2=0, sum_p3=0, sum_p4=0, sum_p5=0, sum_p6=0;

        for(i=0; i<date_group.length; i++){
            day_sale = 0;
            p1=0; p2=0; p3=0; p4=0; p5=0; p6=0; total_p=0;
            for(j=0; j<date_group[i].length; j++){

                if(date_group[i][j].Profit.customer_id == "1"){
                    p1 += 1;
                }
                if(date_group[i][j].Profit.customer_id == "2"){
                    p2 += 1;
                }
                if(date_group[i][j].Profit.customer_id == "3"){
                    p3 += 1;
                }
                if(date_group[i][j].Profit.customer_id == "4"){
                    p4 += 1;
                }
                if(date_group[i][j].Profit.customer_id == "5"){
                    p5 += 1;
                }
                if(date_group[i][j].Profit.customer_id == "6"){
                    p6 += 1;
                }
                total_p = (p1+p2+p3+p4+p5+p6);

                for(k=0; k<date_group[i][j].Sale.length; k++){
                    day_sale += parseInt(date_group[i][j].Sale[k].sale_price, 10);
                }

            }
            tmp = _.template($("#DiffByDate_big_tmp").html());
            $(".DiffByDate_table_big").append(tmp({date: sale_dates[i], sale: day_sale, total_p: total_p, p1: p1, p2: p2, p3: p3, p4: p4, p5: p5, p6: p6}));
            tmp = _.template($("#DiffByDate_small_tmp").html());
            $(".DiffByDate_table_small").append(tmp({date: sale_dates[i], sale: day_sale, total_p: total_p, p1_p4: p1+p4, p2_p5: p2+p5, p3_p6: p3+p6}));
            sum_sale+=day_sale; sum_p+=total_p; sum_p1+=p1; sum_p2+=p2; sum_p3+=p3; sum_p4+=p4; sum_p5+=p5; sum_p6+=p6;
        }

        tmp = _.template($("#DiffByDate_big_tfoot_tmp").html());
        $(".DiffByDate_table_big > tfoot").append(tmp({sum_sale: sum_sale, sum_p: sum_p, sum_p1: sum_p1, sum_p2: sum_p2, sum_p3: sum_p3, sum_p4: sum_p4, sum_p5: sum_p5, sum_p6: sum_p6}));
        tmp = _.template($("#DiffByDate_small_tfoot_tmp").html());
        $(".DiffByDate_table_small > tfoot").append(tmp({sum_sale: sum_sale, sum_p: sum_p, sum_p1_p4: sum_p1+sum_p4, sum_p2_p5: sum_p2+sum_p5, sum_p3_p6: sum_p3+sum_p6}));

    }

    function TimeLiquidation(sale_dates, date_group){
        var hour, time_group = [];
        var g1=[], g2=[], g3=[], g4=[];

        // date_groupからtime_groupを作る
        for(i=0; i<date_group.length; i++){
            g1=[], g2=[], g3=[], g4=[];

            for(j=0; j<date_group[i].length; j++){
                hour = parseInt(date_group[i][j].Profit.sale_time.substr(11, 2));
                if(9 > hour && hour < 11){
                    g1.push(date_group[i][j])
                }
                else if(11 > hour && hour < 13){
                    g2.push(date_group[i][j])
                }
                else if(13 > hour && hour < 15){
                    g3.push(date_group[i][j])
                }
                else{
                    g4.push(date_group[i][j])
                }
            }
            time_group.push({g1: g1, g2: g2, g3: g3, g4: g4});
        }

        var tmp_big, tmp_small;
        var customer_id;
        var time_sale, total_p, p1, p2, p3, p4, p5, p6;
        var sum_sale, sum_p, sum_p1, sum_p2, sum_p3, sum_p4, sum_p5, sum_p6;

        for(i=0; i<time_group.length; i++){

            tmp_big = _.template($("#TimeByDate_big_tmp").html());
            $(".DiffByTime_big").append(tmp_big({num: i, sale_date: sale_dates[i]}));
            tmp_small = _.template($("#TimeByDate_small_tmp").html());
            $(".DiffByTime_small").append(tmp_small({num: i, sale_date: sale_dates[i]}));

            sum_sale=0, sum_p=0, sum_p1=0, sum_p2=0, sum_p3=0, sum_p4=0, sum_p5=0, sum_p6=0;

            //9~11
            time_sale = 0;
            p1=0; p2=0; p3=0; p4=0; p5=0; p6=0; total_p=0;
            for(j=0; j<time_group[i].g1.length; j++){
                customer_id  = parseInt(time_group[i].g1[j].Profit.customer_id, 10);
                if(customer_id == "1"){
                    p1 += 1;
                }
                if(customer_id == "2"){
                    p2 += 1;
                }
                if(customer_id == "3"){
                    p3 += 1;
                }
                if(customer_id == "4"){
                    p4 += 1;
                }
                if(customer_id == "5"){
                    p5 += 1;
                }
                if(customer_id == "6"){
                    p6 += 1;
                }
                total_p = (p1+p2+p3+p4+p5+p6);

                for(k=0; k<time_group[i].g1[j].Sale.length; k++){
                    time_sale += parseInt(time_group[i].g1[j].Sale[k].sale_price, 10);
                }
            }
            tmp_big = _.template($("#DiffByTime_big_tmp").html());
            $(".DiffByTime_big_"+i).append(tmp_big({time: "9:00~11:00", sale: time_sale, total_p: total_p, p1: p1, p2: p2, p3: p3, p4: p4, p5: p5, p6: p6}));

            tmp_small = _.template($("#DiffByTime_small_tmp").html());
            $(".DiffByTime_small_"+i).append(tmp_small({time: "9:00~11:00", sale: time_sale, total_p: total_p, p1_p4: p1+p4, p2_p5: p2+p5, p3_p6: p3+p6}));

            sum_sale+=time_sale; sum_p+=total_p; sum_p1+=p1; sum_p2+=p2; sum_p3+=p3; sum_p4+=p4; sum_p5+=p5; sum_p6+=p6;


            // 11~13
            time_sale = 0;
            p1=0; p2=0; p3=0; p4=0; p5=0; p6=0; total_p=0;
            for(j=0; j<time_group[i].g2.length; j++){
                customer_id  = parseInt(time_group[i].g2[j].Profit.customer_id, 10);
                if(customer_id == "1"){
                    p1 += 1;
                }
                if(customer_id == "2"){
                    p2 += 1;
                }
                if(customer_id == "3"){
                    p3 += 1;
                }
                if(customer_id == "4"){
                    p4 += 1;
                }
                if(customer_id == "5"){
                    p5 += 1;
                }
                if(customer_id == "6"){
                    p6 += 1;
                }
                total_p = (p1+p2+p3+p4+p5+p6);

                for(k=0; k<time_group[i].g2[j].Sale.length; k++){
                    time_sale += parseInt(time_group[i].g2[j].Sale[k].sale_price, 10);
                }
            }
            $(".DiffByTime_big_"+i).append(tmp_big({time: "11:00~13:00", sale: time_sale, total_p: total_p, p1: p1, p2: p2, p3: p3, p4: p4, p5: p5, p6: p6}));
            $(".DiffByTime_small_"+i).append(tmp_small({time: "11:00~13:00", sale: time_sale, total_p: total_p, p1_p4: p1+p4, p2_p5: p2+p5, p3_p6: p3+p6}));

            sum_sale+=time_sale; sum_p+=total_p; sum_p1+=p1; sum_p2+=p2; sum_p3+=p3; sum_p4+=p4; sum_p5+=p5; sum_p6+=p6;

            // 13~15
            time_sale = 0;
            p1=0; p2=0; p3=0; p4=0; p5=0; p6=0; total_p=0;
            for(j=0; j<time_group[i].g3.length; j++){
                customer_id  = parseInt(time_group[i].g3[j].Profit.customer_id, 10);
                if(customer_id == "1"){
                    p1 += 1;
                }
                if(customer_id == "2"){
                    p2 += 1;
                }
                if(customer_id == "3"){
                    p3 += 1;
                }
                if(customer_id == "4"){
                    p4 += 1;
                }
                if(customer_id == "5"){
                    p5 += 1;
                }
                if(customer_id == "6"){
                    p6 += 1;
                }
                total_p = (p1+p2+p3+p4+p5+p6);

                for(k=0; k<time_group[i].g3[j].Sale.length; k++){
                    time_sale += parseInt(time_group[i].g3[j].Sale[k].sale_price, 10);
                }
            }
            $(".DiffByTime_big_"+i).append(tmp_big({time: "13:00~15:00", sale: time_sale, total_p: total_p, p1: p1, p2: p2, p3: p3, p4: p4, p5: p5, p6: p6}));
            $(".DiffByTime_small_"+i).append(tmp_small({time: "13:00~15:00", sale: time_sale, total_p: total_p, p1_p4: p1+p4, p2_p5: p2+p5, p3_p6: p3+p6}));
            sum_sale+=time_sale; sum_p+=total_p; sum_p1+=p1; sum_p2+=p2; sum_p3+=p3; sum_p4+=p4; sum_p5+=p5; sum_p6+=p6;

            // 15~
            time_sale = 0;
            p1=0; p2=0; p3=0; p4=0; p5=0; p6=0; total_p=0;
            for(j=0; j<time_group[i].g4.length; j++){
                customer_id  = parseInt(time_group[i].g4[j].Profit.customer_id, 10);
                if(customer_id == "1"){
                    p1 += 1;
                }
                if(customer_id == "2"){
                    p2 += 1;
                }
                if(customer_id == "3"){
                    p3 += 1;
                }
                if(customer_id == "4"){
                    p4 += 1;
                }
                if(customer_id == "5"){
                    p5 += 1;
                }
                if(customer_id == "6"){
                    p6 += 1;
                }
                total_p = (p1+p2+p3+p4+p5+p6);

                for(k=0; k<time_group[i].g4[j].Sale.length; k++){
                    time_sale += parseInt(time_group[i].g4[j].Sale[k].sale_price, 10);
                }
            }
            $(".DiffByTime_big_"+i).append(tmp_big({time: "15:00~", sale: time_sale, total_p: total_p, p1: p1, p2: p2, p3: p3, p4: p4, p5: p5, p6: p6}));
            $(".DiffByTime_small_"+i).append(tmp_small({time: "15:00~", sale: time_sale, total_p: total_p, p1_p4: p1+p4, p2_p5: p2+p5, p3_p6: p3+p6}));
            sum_sale+=time_sale; sum_p+=total_p; sum_p1+=p1; sum_p2+=p2; sum_p3+=p3; sum_p4+=p4; sum_p5+=p5; sum_p6+=p6;

            tmp_big = _.template($("#DiffByTime_big_tfoot_tmp").html());
            $(".DiffByTime_big_"+i+">tfoot").append(tmp_big({sum_sale: sum_sale, sum_p: sum_p, sum_p1: sum_p1, sum_p2: sum_p2, sum_p3: sum_p3, sum_p4: sum_p4, sum_p5: sum_p5, sum_p6: sum_p6}));
            
            tmp_small = _.template($("#DiffByTime_small_tfoot_tmp").html());
            $(".DiffByTime_small_"+i+">tfoot").append(tmp_small({sum_sale: sum_sale, sum_p: sum_p, sum_p1_p4: sum_p1+sum_p2, sum_p2_p5: sum_p2+sum_p5, sum_p3_p6: sum_p3+sum_p6}));


        }



    }



});
</script>


