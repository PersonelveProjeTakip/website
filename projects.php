<?php
    include('functions.php');
    girisKontrol();
    session_write_close();
 ?>
<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <title><?php echo $title; ?> - Aktif Projeler</title>
    <?php 
        include('header.php');
        $db = veriTabaninaBaglan();
    ?>

        <article>
            <div class="Atittle">Aktif Proje Havuzu</div>
            <div class="Atext">
                <?php
                        $table = "proje";
                        if(isset($_GET["delete"]))
                            projeSil($db,$table);
                        else if(isset($_GET["edit"]))
                            projeDuzenle($db,$table);
						else if(isset($_GET["move"]))
                            projeTasi($db,$table,"proje_pool");
						else if(isset($_GET["detail"]))
                            ayrintiliProje($db,$table);
                        else if(isset($_GET["finish"]))
                            projeBitir($db,$table,"proje_bitmis");
                        else
                            aktifProjeleriYazdir($db,$table);
                            
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