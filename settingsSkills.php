<?php
    require_once('functions.php');
    girisKontrol();
 ?>
<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <title><?php echo $title; ?> - Yetenekler</title>
    <?php 
        include('header.php');
        $db = veriTabaninaBaglan();
    ?>

        <article>
            <div class="Atittle">Yetenekler</div>
            <div class="Atext">
                <?php
                        $table = "yetenek";
                        if(isset($_GET["delete"]))
                            yetenekSil($db,$table);
                        else if(isset($_GET["edit"]))
                            yetenekDuzenle($db,$table);
                        else if(isset($_GET["add"]))
                            yetenekEkle($db,$table);
                        else{
                            yetenekleriYazdir($db,$table);
                            echo '<a href="'.$_SERVER["PHP_SELF"].'?add"><div class="input-type-submit">Yeni kayıt</div></a>';
                        }
                            
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