<?php require_once '../headers.php'; ?> 

  <?php
   session_start(); 
   if (isset($_SESSION['cart'])){
     $global_summ = 0;
     $global_item = 0;
     
     echo "<div id='carts_left'>";
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
      

       echo " 
          <div>
            <a id='biggest'>".$name."</a>
            <a class='right'>".$price." ₽</a>
            <a id='colvo'>x".$values."</a>
            <a class='right'>".$price*$values." ₽</a>
          </div>" ;
     }
     echo "<br>
            <div id='carts_right'>
              <h2>Общая Сумма:</h2>
              <p >".$global_summ." ₽</p>
              <h2>Кол-во товаров:</h2>
              <p >".$global_item."</p>
            </div>
              <form action='../admin/buy.php' method='post'>
                <input type='submit' class='submit' value='Оплатить'>
              </form>
   </div>
        ";
     $msql->close();
   }else{
   	echo '<center><mark>Нету товаров в корзине!</mark></center>';
   }
  ?>
<?php require_once '../footer.html'; ?>

  