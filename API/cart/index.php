<?php
   header('Content-Type: application/json; charset=utf-8');
   session_start(); 
   if (isset($_SESSION['cart'])){
     echo  '{ "products":[';
     $global_summ = 0;
     $global_item = 0;
     $is_first = true; // Переменная для отслеживания первого элемента
     foreach ($_SESSION['cart'] as $key => $value) {
      require_once '../../admin/password.php';
      $msql = new  mysqli($gg[0],$gg[1],$gg[2],$gg[3]);


      $keys = htmlspecialchars($key);
      $values = htmlspecialchars(print_r($value, true));
      $result = $msql->query("SELECT `price`,`name` FROM `products` WHERE `id` = {$keys}");
      $names = $result->fetch_assoc();
      $price = $names['price'];
      $name = $names['name'];
       
      $global_item += $values;
      $global_summ += $price*$values;
      

      $tovar =[
         'name' => $name,
         'price' => $price,
         'values' => $values,
         'itogo' => $price*$values
      ];
      
      // ИЗМЕНЕНО ТУТ: выводим запятую ПЕРЕД вторым и следующими товарами
      if (!$is_first) {
          echo ',';
      }
      $is_first = false;

      echo json_encode($tovar);
     }
     $msql->close();
     echo '],"Global":';
     $itogo = [
     	'Global_Sum' =>$global_summ,
       	'Global_Item' =>$global_item
     ];	
     echo json_encode($itogo);
     echo '}';
   }else{
     $tovar =[
     	'error' => 'Empty cart!'
     ];
   	echo json_encode($tovar);
   }
  ?>
