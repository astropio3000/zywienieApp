<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <?php 
    session_start();
    $_SESSION['host']="localhost";
    $_SESSION['db_user']="root";
    $_SESSION['db_password']="";
    $_SESSION['db_name']="ZdrowieDB";
    
	if ((!isset($_POST['login'])) || (!isset($_POST['password'])))
	{
        $_SESSION['error']='<span style="color=red">wprowadz dane logowania</span>';
		header('Location: login.php');
		exit();
	}
    $connect= @new mysqli($_SESSION['host'], $_SESSION['db_user'], $_SESSION['db_password'], $_SESSION['db_name']);
    if($connect->connect_errno!=0){
        $_SESSION['error']='<span style="color=red">blad laczenia z baza danych '.$connect->connect_errno.'</span>';
        header('Location: login.php');
        exit();
    }else{
    $login=$_POST['login'];
    $haslo=$_POST['password'];
        
    $login = htmlentities($login, ENT_QUOTES, "UTF-8");
    $haslo = htmlentities($haslo, ENT_QUOTES, "UTF-8");
        
    if ($result = @$connect->query(
		sprintf("SELECT * FROM users WHERE login='%s' AND password='%s'",
		mysqli_real_escape_string($connect,$login),
		mysqli_real_escape_string($connect,$haslo))))
		{
        $num_rows=$result->num_rows;
        if($num_rows>0){
            $row=$result->fetch_assoc();
            
            $_SESSIO['id']=$row['id'];
            $_SESSIO['imie']=$row['imie'];
            $_SESSIO['nazwisko']=$row['nazwisko'];
            $_SESSIO['email']=$row['email'];
            
            unset($_SESSION['error']);
            $result->free_result();
            header('Location: myprofile.php');
        }else{
            $_SESSION['error']='<span style="color=red">nie prawdlowy login lub haslo</span>';
        header('Location: login.php');
        }
        
    }else{
        $_SESSION['error']='<span style="color=red">blad uzyskiwania danych z bazy '.$result.'</span>';
        header('Location: login.php');
    }
    
    $connect->close();
    }
?>
</body>
</html>
   