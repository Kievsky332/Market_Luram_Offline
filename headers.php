<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tired Root</title>
    <link rel="stylesheet" href="../../luram/style.css?1122">
</head>
<body>
    <header >
        <a href="https://luram.sorav.ru/luram/"><img class='logo'  src="https://luram.sorav.ru/luram/admin/photo/unnamed.png"></a>
       	<?php
      		if (isset($_COOKIE['admin'])){
            	$cooki = $_COOKIE['admin'];
              	if($cooki==='#'){
                	echo '<a class="headers" href="https://luram.sorav.ru/luram/admin/" id="admin">Админ</a>';
                }
            }
        ?>

        <div class="headers" >
            <a id="tovar" href="https://luram.sorav.ru/luram/" class="black"><img class='logo1'  src="https://cdn-icons-png.flaticon.com/512/70/70340.png">
            Товары</a>
          	<form action='https://luram.sorav.ru/luram/' methon='get' style="display: inline-block;">
                <input type="text" id="vkusno" name='q' placeholder="Вкусняшки" required>
                <input type='submit' class='submit' value='🔎'>
          	</form>
        </div>
        <div id="right">

           <div class="headers" id="vhod"> <a href="https://luram.sorav.ru/luram/lk" >
                <img class='logo1' src="https://images.icon-icons.com/1674/PNG/512/person_110935.png">
                <a class="black" id="vhod_text" href="https://luram.sorav.ru/luram/lk">Вход'es</a>
            </a></div>

            <div class="headers" >
                <a href="https://luram.sorav.ru/luram/cart"><img class='logo1' src="https://cdn-icons-png.flaticon.com/512/481/481384.png"></a>
            </div>

        </div>
    </header>