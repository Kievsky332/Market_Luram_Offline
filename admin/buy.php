<?php require_once '../headers.php'; ?> 

  <?php
   session_start(); 
   if (isset($_SESSION['cart'])){
     $global_summ = 0;
     $global_item = 0;
     
   
     foreach ($_SESSION['cart'] as $key => $value) {
      require_once '../admin/password.php';
      $msql = new  mysqli($gg[0],$gg[1],$gg[2],$gg[3]);
      //host user pass name_bd	

      $keys = htmlspecialchars($key);
      $values = htmlspecialchars(print_r($value, true));
      $result = $msql->query("SELECT `price`,`name` FROM `products` WHERE `id` = {$keys}");
      $names = $result->fetch_assoc();
      $price = $names['price'];
      $name = $names['name'];
       
      $global_item += $values;
      $global_summ += $price*$values;
     }
     $msql->close();
     echo '<h1>Вы оплатили '.$global_summ.' ₽ и '.$global_item.' товаров <br><b>СПАСИБО ЗА ПОКУПКУ! ВСЕГО ДОБРОГО!</b><br><a href="/luram"><u>Назад</u></a>
     </h1>';
     session_destroy();
   }else{
   	echo '<center><mark>Нету товаров в корзине!</mark></center>';
   }
  ?>
<?php require_once '../footer.html'; ?>
