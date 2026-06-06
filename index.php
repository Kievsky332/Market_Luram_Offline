<?php require_once 'headers.php'; ?>
    
    <div id="redy">
		<?php 		
                  require_once '../admin/password.php';
                  $msql = new  mysqli($gg[0],$gg[1],$gg[2],$gg[3]);
                  	$result = $msql->query('SELECT * FROM `category`');
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()){
                          $id =  $row["id"];
                          $name =  $row["name"];
                          echo '<a class="white category" href="https://luram.sorav.ru/luram/?category='.$id.'">'.$name.'</a>';
                        }
                        $msql->close();
                    }else{
                 		echo 'Ошибка';
                 	}
      	?>
    </div><br>
    <center><a href='https://happypig375.github.io/free-nitro/' class='white' id="warn">Получите Вкусняшки БЕСПЛАТНО!!</a></center>
    <div id="sort">
        <div class="closeshow">
          	
                <p>Настройки</p>
                <h2>Сортировка</h2>
                <br><div class="revelevance">
                    <form method='get'>
                      <label><input type="radio" name="sort" value='revelevance' checked> По релевантности</label><br>
                      <label><input type="radio" name="sort" value='otdo' >Сначала дешевле</label><br>
                      <label><input type="radio" name="sort" value='doot' >Сначала дороже</label>
                      <br><input type="submit" class="submit" value="Применить">
                    </form>
                </div>
                <h2>Цена</h2>
          		<form  method='get'>
                  <a>От <input class="otdo" name='ot' required> До <input class="otdo" name='do' required> <b>₽</b></a><br><br>
                  <input type="submit" class="submit" value="Применить">
          		</form>
        </div>
      	<input type="button" class="shower" onclick="ggz()" value="▶">
    </div>

    <!-- Карточки -->
		
          <?php      
					$category = 1;
					$q = null;
					$ot = null;
					$do = null;
					$sort1 = null;

					if(isset($_GET['category'])){
                    	$category =  "`category`=".strip_tags($_GET['category']);
                    }
            		if(isset($_GET['q'])){
                    	$q =  ' AND SOUNDEX(`name`)  =  SOUNDEX("'.strip_tags($_GET['q']).'")';
                    }
      				if(isset($_GET['ot'])){
                    	$ot = ' AND '.strip_tags($_GET['ot']).' <= `price`';
                    }
      				if(isset($_GET['do'])){
                    	$do = 'AND  `price` <= '.strip_tags($_GET['do']);
                    }
            		if(isset($_GET['sort'])){
                    	$sort = strip_tags($_GET['sort']);
                      	if($sort=='revelevance'){
                        	$sort1 =' ORDER BY `id` ASC';
                        }
                      	elseif($sort=='doot'){
                          	$sort1 =' ORDER BY `price` DESC';
                        }
                      	elseif($sort=='otdo'){
                        	$sort1 =' ORDER BY `price` ASC';
                        }
                    }
                    require_once 'admin/password.php';
                    $msql = new  mysqli($gg[0],$gg[1],$gg[2],$gg[3]);
                    //host user pass name_bd
					echo '<center>';
                  	$result = $msql->query('
                    SELECT * FROM `products` 
                    WHERE '.$category.$ot.$do.$q.$sort1);
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()){
                          $id =  $row["id"];
                          $name =  $row["name"];
                          $old =  $row["old_price"];
                          $new =  $row["price"];
                          $photo =  $row["photo"];
                          $cards = '
                                  <div class="cards">
                                  		<form action="admin/add_to_cart.php" method="post">
                                            <img src=" '.$photo. '"  class="cards-image">
                                            <h2>'.$name.'</h2>
                                            <a class="old">'.$old.'</a><a class="new">'.$new.' ₽</a>
											<input name="tovar" value='.$id.' type="hidden">
                                            <br><input type="submit" class="submit" value="Добавить">
                                        </form>
                                  </div>
                          ';
                          echo $cards;
                          }  
                    }else{
                 		echo '</center><br><center><mark>Товаров нету!</mark></center>';
                 	}
                    $msql->close();
      	?>
<!-- Карточки -->
<?php require_once 'footer.html'; ?>

