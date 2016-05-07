<?php include('functions.php'); ?>
<!DOCTYPE html>
<html lang="tr">
<head>
<meta charset="UTF-8">
<title><?php echo $title; ?> - Giriş</title>
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="styles.css">
<link rel="shortcut icon" href="/images/favicon.ico" />
</head>
<?php
    
    girisYap();
    if($_SERVER['QUERY_STRING'] == "logout"){
        cikisYap();
    }
    session_write_close();
?>
<body>
    <center class="info">Kullanıcı: Admin</br>pass: 12345678</center>
    <div id="login-area">
        <form action="" method="POST" name="login-field">
            <input type="text" name="email" class="input-type-text" placeholder="e-mail" required><div class="clr"></div>
            <input type="password" name="password" class="input-type-text" placeholder="password" required><div class="clr"></div>
            <input type="submit" name="login" class="input-type-submit" value="Giris">
        </form>  
    </div>
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>  
<![endif]-->
</body>

</html>