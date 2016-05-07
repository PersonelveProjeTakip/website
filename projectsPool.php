<?php
    include('functions.php');
    girisKontrol();
    session_write_close();
 ?>
<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <title><?php echo $title; ?> - Bekleyen Projeler</title>
    <?php 
        include('header.php');
        $db = veriTabaninaBaglan();
    ?>

        <article>
            <div class="Atittle">Bekleyen Proje Havuzu</div>
            <div class="Atext">
                <?php
                        $table = "proje_pool";
                        if(isset($_GET["delete"]))
                            projeSil($db,$table);
                        else if(isset($_GET["edit"]))
                            projeDuzenle($db,$table);
                        else if(isset($_GET["add"]))
                            projeEkle($db,$table);
						else if(isset($_GET["move"]))
                            projeTasi($db,$table,"proje");
						else if(isset($_GET["detail"]))
                            ayrintiliProje($db,$table);
                        else{
                            pasifProjeleriYazdir($db,$table);
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