<?php
    include('functions.php');
    girisKontrol();
    session_write_close();
 ?>
<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <title><?php echo $title; ?> - Yabancı Diller</title>
    <?php 
        include('header.php');
        $db = veriTabaninaBaglan();
    ?>

        <article>
            <div class="Atittle">Yabancı Diller</div>
            <div class="Atext">
                <?php
                        $table = "dil";
                        if(isset($_GET["delete"]))
                            dilSil($db,$table);
                        else if(isset($_GET["edit"]))
                            dilDuzenle($db,$table);
                        else if(isset($_GET["add"]))
                            dilEkle($db,$table);
                        else{
                            dilleriYazdir($db,$table);
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