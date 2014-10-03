<?php
/**
 *
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
?>
<?php
	echo $this->Html->css( 'reset' );
	echo $this->Html->css( 'style' );
	echo $this->Html->css( 'easyselectbox' );
	echo $this->Html->script( 'jquery-1.11.1.min' );
	echo $this->Html->script( 'underscore-min' );
    echo $this->Html->script( 'easyselectbox' );

    echo '<script type="text/javascript">var shop_id = '.$shop['id'].';</script>';
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $title_for_layout; ?>
	</title>
<!-- 	
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css('cake.generic');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
        echo $this->Html->css('style');
	?>
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

</head>
<body>
  <header>
        <ul>
        	<?php if(isset($shop['id'])){?>
            <div class="toggle t_left">
            	<li class = "shop_name"><?php echo ( $shop['shop_name'] ); ?></li>
            	<input type = "button" value = ログアウト class="btn" onClick = "location.href='/m_regi/shops/logout'"></li></div>
            </div>
            <div class = "head_left">
            <li class = "mypage"><input type = "button" value = "マイページ" class="btn" onClick = "location.href='/m_regi/shops'"></li>
            <li class = "shop_name"><?php echo ( $shop['id'] );  ?></li>
            <li class = "logout">
                <input type = "button" value = "ログアウト" class="btn" onclick = "location.href='/m_regi/shops/logout'">
            </li>
            </div>
            
            <div class="toggle t_right">
                <form method=post>
            	<select id="#eazy-select" onchange="navi(this)">
					<option>menu</option>
					<option value="/m_regi/shops">マイページへ</option>
					<option value="/m_regi/shops/registration">登録画面へ</option>
					<option value="/m_regi/shops/payment">会計画面へ</option>
           		</select>
           		</form>
           		<script type="text/javascript">
					(function ($) {
					  $('.menu2').easySelectBox();
					})(jQuery);
				</script>

            </div>
            <div class = "head_right"> 
            <li class = "touroku">
                <input type = "button" value = "登録" class="btn" onclick ="location.href='/m_regi/shops/registration'">
            </li>
            <li class = "kaikei">
                <input type = "button" value = "会計" class="btn" onclick ="location.href='/m_regi/shops/payment'">
            </li>
            </div>
            <?php }else{ ?>
            <h1 style="color:white">ログイン</h1>
            <?php } ?>
        </ul>
    </header>

	<div id="content">

		<?php echo $this->Session->flash(); ?>

		<?php echo $this->fetch('content'); ?>

	</div>
	
	<div id="footer">
		<?php echo $this->Html->link(
				$this->Html->image('cake.power.gif', array('alt' => $cakeDescription, 'border' => '0')),
				'http://www.cakephp.org/',
				array('target' => '_blank', 'escape' => false)
			);
		?>
	</div>
	<?php echo $this->element('sql_dump'); ?>
 </body>
</html>
