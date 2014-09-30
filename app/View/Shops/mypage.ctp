<?php
    echo $this -> Html -> script( array( 'jquery-1.11.1.min', 'easyselectbox' ), array( 'inline' => false ) );
    echo $this -> Html -> css( array( 'easyselectbox' ), false, array( 'inline' => false ) );
?>

<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width ">
<!--
	<link rel="stylesheet" href="../css/style.css" type="text/css" />
    <link rel="stylesheet" href="../css/reset.css" type="text/css" />
    <link rel="stylesheet" href="../js/easyselectbox/easyselectbox.css" type="text/css" />
	<script type="text/javascript" src="../js/jquery-1.11.1.min.js"></script>
	<script src="../js/easyselectbox/easyselectbox.js" type="text/javascript"></script>
-->
	<script type="text/javascript">
        $(document).ready(function(){
          $('#eazy-select').easySelectBox({speed:100});
        });
    </script>
    <script language="javascript">

        function navi(obj) {
         url = obj.options[obj.selectedIndex].value;
         if(url != "") {
           location.href = url;
          }
        }

    </script>


	<title>マイページ</title>
    
</head>
<body>

    <div class = "login_container">
        <div class = "link">
            <ul>
                <li>
                    <input type = "button" value = "売上詳細、各種削除へ" class="btn" onclick ="location.href='sales.html'">
                </li>
                <li>
                    <input type = "button" value = "登録画面へ" class="btn" onclick ="location.href='registration.html'">
                </li>
                <li>
                    <input type = "button" value = "会計画面へ" class="btn" onclick ="location.href='payment.html'">
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
</body>
</html>