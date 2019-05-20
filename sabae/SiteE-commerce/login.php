<?php include 'Admin/db.php'; ?>
<?php
    require 'Admin/session.php';
    Session::start();
    /**Traitement du formulaire */


    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        try{
            if(isset($_POST['username']) && isset($_POST['password'])){
                $username = $db->quote($_POST['username']);
                $password = $db->quote($_POST['password']);
                $select = $db->query("select * from login where username = $username and password = $password");

                if($select->rowCount() > 0){
                    Session::set('auth',$select->fetch());
                    header('Location:Admin/dashboard.php');
                    die;
                }
            }
        }catch(Exception $e){
            // echo('Exception');
        }

    }
    else{
        // echo('Erreur GET');
    }
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="icon" href="img/logo.png">
    <link rel="stylesheet" href="css/login.css">
  </head>
  <body class="body">
    <form class="box" action="admin/dashboard.php" method="POST">
      <h1>Login</h1>
      <input type="text" name="username" placeholder="Username">
      <input type="password" name="password" placeholder="Password">
      <input type="submit" name="" value="Login">
    </form>


  </body>
</html>
