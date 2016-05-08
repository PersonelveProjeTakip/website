<?php
    require_once('functions.php');
    girisKontrol();
 ?>
<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <title><?php echo $title; ?> - Aktif Çalışanlar</title>
    <?php 
        include('header.php');
        $db = veriTabaninaBaglan();
    ?>

        <article>
            <div class="Atittle">Aktif Çalışanlar</div>
            <div class="Atext">
                <?php
                        $table = "employee";
                        if(isset($_GET["delete"]))
                            calisanSil($db,$table);
                        else if(isset($_GET["edit"]))
                            calisanDuzenle($db,$table);
                        else if(isset($_GET["move"]))
                            calisanTasi($db,$table,"employee_pool");
						else if(isset($_GET["detail"]))
                            ayrintiliCalisan($db,$table);
                        else
                            aktifCalisanlariYazdir($db,$table);
                            
                        veriTabaniniKapat($db);
                ?>

            </div>
        </article>
        <?php include('footer.php'); ?>
    </main>
    <!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>  
<![endif]-->
    </body>

</html>