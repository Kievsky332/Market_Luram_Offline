<?php
header('Content-Type: application/json; charset=utf-8');
$category = 1;
$q = null;
$ot = null;
$do = null;
$sort1 = null;

if (isset($_GET['category'])) {
    $category = "`category`=" . strip_tags($_GET['category']);
}
if (isset($_GET['q'])) {
    $q = ' AND SOUNDEX(`name`)  =  SOUNDEX("' . strip_tags($_GET['q']) . '")';
}
if (isset($_GET['ot'])) {
    $ot = ' AND ' . strip_tags($_GET['ot']) . ' <= `price`';
}
if (isset($_GET['do'])) {
    $do = 'AND  `price` <= ' . strip_tags($_GET['do']);
}
if (isset($_GET['sort'])) {
    $sort = strip_tags($_GET['sort']);
    if ($sort == 'revelevance') {
        $sort1 = ' ORDER BY `id` ASC';
    } elseif ($sort == 'doot') {
        $sort1 = ' ORDER BY `price` DESC';
    } elseif ($sort == 'otdo') {
        $sort1 = ' ORDER BY `price` ASC';
    }
}
require_once '../../admin/password.php';
$msql = new mysqli($gg[0], $gg[1], $gg[2], $gg[3]);


$result = $msql->query('SELECT * FROM `products` WHERE ' . $category . $ot . $do . $q . $sort1);

if ($result->num_rows > 0) {
    echo  '{ "products":[';
    $is_first = true;
    while ($row = $result->fetch_assoc()) {
        $id = $row["id"];
        $name = $row["name"];
        $old = $row["old_price"];
        $new = $row["price"];
        $photo = $row["photo"];
		$cards = [
        	'id'=> $id,
          	'name' => $name,
          	'old_price' => $old,
          	'new_price' => $new,
          	'photo_url' => $photo
        ];
        if (!$is_first) {
          echo ',';
      	}
      	$is_first = false;
        echo json_encode($cards);
    }
    echo ']}';   
} else {
  	$error = [
    	'error' => 'Not found!'
    ];
    echo json_encode($error);
}
$msql->close();
?>
