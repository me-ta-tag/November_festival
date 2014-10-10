<!-- 
<h2>ショップ一覧</h2>
目標金額：<?php print(h($shop['shop_goal'])); ?><br />
 -->
    <div class = "login_container">
        <div class = "link">
            <ul>
                <li>
                    <input type = "button" value = "売上詳細、各種削除へ" class="btn" onclick = "location.href='<?php $this->Html->url(‘/shops/sales’, true); ?>'">
                </li>
                <li>
                    <input type = "button" value = "登録画面へ" class="btn" onclick = "location.href='/m_regi/shops/registration'">
                </li>
                <li>
                    <input type = "button" value = "会計画面へ" class="btn" onclick = "location.href='/m_regi/shops/payment'">
                </li>
            </ul>
        </div>
        <div class="login_settei">
            <p class="login_function1">
                設定
            </p>
            <div class="login_function2">
               <p class="ticket_use">
                <input type="checkbox" name="function" value="ticket">金券を使用する
                </p>
                <p class="sonweki">
                <input type="checkbox" name="function" value="sonweki">損益を表示する
                </p>
            </div>
        </div>
    </div>