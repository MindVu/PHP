<?php
if (isset($_POST['login-submit'])) {
  require 'db_connection.php';
  session_start();
  $id = $_POST['id'];
  $password = $_POST['pwd'];

  if (empty($id) || empty($password)) {
    $_SESSION['error']='Please fill in all fields';
    header("Location: ../index.php?error=emptyfield");
    exit();
  }

  $sql = "SELECT id, name, pwd FROM Teacher WHERE id=?";
  $stmt = mysqli_stmt_init($conn);

  if (!mysqli_stmt_prepare($stmt, $sql)) {
    $_SESSION['error']='SQL error';
    header("Location: ../index.php?error=sqlerror");
    exit();
  }

  mysqli_stmt_bind_param($stmt, "s", $id);
  mysqli_stmt_execute($stmt);

  $result = mysqli_stmt_get_result($stmt);

  if ($row = mysqli_fetch_assoc($result)) {
    $CheckPwd = password_verify($password, $row["pwd"]);
    if ($CheckPwd == false) {
      $_SESSION['error']='Wrong password';
      header("location:../index.php?error=wrongpwd");
      exit();
    } else if ($CheckPwd == true) {
      $_SESSION["userid"] = $row["id"];
      $_SESSION["username"] = $row["name"];
      $_SESSION['authorized'] = TRUE;
      header("location: ../mainpage.php?loginsuccess");
      exit();
    }
  } else {
    $_SESSION['error']='No user found';
    header("location: ../index.php?error=nouser");
    exit();
  }
  mysqli_stmt_close($stmt);
  mysqli_free_result($result);
  mysqli_close($conn);
}
?>
		
	
      



	