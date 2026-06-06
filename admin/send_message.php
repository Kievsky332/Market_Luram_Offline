<?php
  $cooki = $_COOKIE['admin']??' ';
  if($cooki==='#'){
    $name =  strip_tags($_POST['name']);
	$cost =  strip_tags($_POST['cost']);
	$categ = strip_tags($_POST['category']);

	$category = htmlspecialchars($categ);
	
    $dir="https://img.icons8.com/m_rounded/1200/no-image.jpg";
	if(isset($_FILES['file'])){
            $file = $_FILES['file'];
            $uploadDir = 'photo/'; // Папка, куда сохранять (должна существовать)
            $uploadFile = $uploadDir . basename($file['name']);
            $filename = rawurlencode(basename($file['name']));
            // Безопасное перемещение файла
            if (move_uploaded_file($file['tmp_name'], $uploadFile)) {
                $dir = "https://luram.sorav.ru/luram/admin/photo/$filename";
                
            }else {
                echo 'Ошибка при загрузке файла';
                
            }
    }
    require_once 'password.php';
    $msql = new  mysqli($gg[0],$gg[1],$gg[2],$gg[3]);
    //host user pass name_bd	
    
	$msql->query("INSERT INTO `products`( `name`,  `price`, `photo`,`category`) 
    VALUES ('$name','$cost','$dir','$category')");
    $msql->close();
	header('Location: https://luram.sorav.ru/luram/');
  }
?>