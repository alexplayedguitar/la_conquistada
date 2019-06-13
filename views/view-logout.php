<?php
session_start();
$_SESSION['alogin']=="";
session_unset();
//session_destroy();
$_SESSION['errmsg']="Su sesión ha sido finalizada";
?>
<script language="javascript">
document.location="login.php";
</script>
