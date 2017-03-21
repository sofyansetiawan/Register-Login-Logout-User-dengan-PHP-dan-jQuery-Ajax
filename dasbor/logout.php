<?php
session_start();
if (isset($_SESSION["id_member"]))
{
	unset($_SESSION['id_member']);
?>
	<script language="javascript">
	document.location="../index.php";
	</script>
<?php 
	
}else{
?>
	<script language="javascript">
	alert("Login Dulu Sebelum Masuk Halaman Ini");
	document.location="../index.php";</script>
<?php 
}
?>