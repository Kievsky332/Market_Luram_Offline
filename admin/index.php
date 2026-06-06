
<?php

$cooki = $_COOKIE['admin']??' ';
if($cooki==='#'):
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>luram</title>
</head>
<body>
    <center>        
        <div id="chat">
            <form action="send_message.php" method="post" enctype="multipart/form-data">
              	<input type="file" id="file" name="file" accept="image/*"><br>
              	<select name='category'  required>
                  <?php
                  	require_once 'password.php';
                  	$msql = new  mysqli($gg[0],$gg[1],$gg[2],$gg[3]);
                  //host user pass name_bd
                  	$result = $msql->query('SELECT * FROM `category`');
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()){
                          $id =  $row["id"];
                          $name =  $row["name"];
                          echo '<option value="'.$id.'" name="category">'.$name.'</option>';
                        }
                        $msql->close();
                    }else{
                 		echo 'Ошибка';
                 	}
                 ?>
              	</select><br>
                <input name="name" placeholder="Название товара" required><br>
              	<input type='number' name="cost" placeholder="цена" required><br>
                <input type="submit">
            </form>
        </div>
</center>
</body>
</html>
                <?php else:?>
        <?php endif;?>
  
