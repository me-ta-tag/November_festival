<?php
    $ShopsSales = $this->Html->url("/Shops/sales", true);
    $ShopsRegistration = $this->Html->url("/Shops/registration", true);
    $ShopsPayment = $this->Html->url("/Shops/payment", true);
?>
    <div class = "login_container">
        <div class = "link">
            <ul>
                <?php
                    $linkSales = $this->Html->url("/shops/sales", true);
                    $linkRegist = $this->Html->url("/shops/registration", true);
                    $linkPay = $this->Html->url("/shops/payment", true);
                ?>
                <li>
                    <input type = "button" value = "売上画面へ" class="btn" onclick = "location.href='<?php echo $ShopsSales ?>'">
                </li>
                <li>
                    <input type = "button" value = "各種登録・削除画面へ" class="btn" onclick = "location.href='<?php echo $ShopsRegistration ?>'">
                </li>
                <li>
                    <input type = "button" value = "会計画面へ" class="btn" onclick = "location.href='<?php echo $ShopsPayment ?>'">
                </li>
            </ul>
        </div>
        <div class="login_settei">
            <p class="login_function1">
                設定
            </p>
            <!--<div class="login_function2">-->
               <!--<p class="ticket_use">-->
                <!--<input type="checkbox" name="function" value="ticket">金券を使用する-->
                <!--</p>-->
                <!--<p class="sonweki">-->
                <!--<input type="checkbox" name="function" value="sonweki">赤字・黒字を表示する-->
                <!--</p>-->
            <!--</div>-->
        </div>
    </div>