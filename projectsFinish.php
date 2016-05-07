<?php
    include('functions.php');
    girisKontrol();
    session_write_close();
 ?>
<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <title><?php echo $title; ?> - Bitmiş Projeler</title>
    <?php 
        include('header.php');
        $db = veriTabaninaBaglan();
    ?>

        <article>
            <div class="Atittle">Bitmiş Proje Havuzu</div>
            <div class="Atext">
                <?php
                        $table = "proje_bitmis";
                        if(isset($_GET["delete"]))
                            projeSil($db,$table);
                        else
                            bitmisProjeleriYazdir($db,$table);
                            
                        veriTabaniniKapat($db);
                ?>

            </div>
        </article>
    </main>
    <!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>  
<![endif]-->
    </body>
</html>