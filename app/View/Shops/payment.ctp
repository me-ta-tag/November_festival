    <div class="all_container">
        <div class = "left_container">
            <div class = "left_category">
                <p> カテゴリ:
                <select name="left_category">
                    <option value="all">すべて</option>
                    <option value="***">test</option>
                </select>
                </p>
            </div><!-- category -->

            <p class="left_id">ID</p>
            <p class="left_item_name">商品名</p>
            <p class="left_yen">単価</p>

            <div class = "left_contents">
                <p class = "item">
                    <input type="button" value = "***" onclick ="***">
                </p>
            </div>
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
            <div class="right_contents">
                a
            </div>
            <div class = "option">
                <ul>
                <li class = "reset">
                    <input type = "button" value = "リセット" class="btn" onclick ="***">
                </li>
                <li class = "check_reset">
                    <input type = "button" value = "チェックを解除" class="btn" onclick ="***">
                </li>
                <li class = "pay_down">
                    <input type = "button" value = "値切り" class="btn" onclick ="***">
                </li>
                </ul>
            </div><!-- option -->
            <div class = "ticket">
                <form action="***">
                        <select name="ticket" class="ticket_sentaku">
                            <option value="***">金券を選択</option>
                            <option value="test">test</option>
                        </select>
                        <input type = "button" value = "使用" class="ticket_use" onclick ="***">
                </form>
            </div>
				<div class="total">
					<p class = "total_item">
						計***点
					</p>
					<p class = "total_yen">
						￥******
					</p>
				</div>
				<div class = "take_pay">
						<p>お預かり</p>
						<input type="text" name="take_pay" class="pay_text">
				</div>
				 <div class = "exchange">
					<p>お釣り</p>
					<input type="text" name="exchange" class="exchange_text">
				</div>
            <div class = "decide">
                <div class = "decide2">
                   <p>清算確定</p>
                </div>
                <div class="decide_case">
					<div class = "decide_men">
						<input type = "button" value = "幼" class ="men" onclick ="***"><input type = "button" value = "成" class ="men" onclick ="***"><input type = "button" value = "老" class ="men" onclick ="***">
					</div>
					<div class = "decide_women">
						<input type = "button" value = "幼" class ="women" onclick ="***"><input type = "button" value = "成" class ="women" onclick ="***"><input type = "button" value = "老" class ="women" onclick ="***">
					</div>
           		</div>
            </div>
    </div>