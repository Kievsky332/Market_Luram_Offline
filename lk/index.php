<?php
if (isset($_POST['pass'])){
	$pass = $_POST['pass'];
  	if ($pass = '@'){
       setcookie('@','@',time() +60*60*24 , "/"); 
    }
}
?>
<?php require_once '../headers.php'; ?>
    
	<form action='' method='post'>
      <input type='text' name='pass'>
      <input type='submit'>
  	</form>
<?php require_once '../footer.html'; ?>

  