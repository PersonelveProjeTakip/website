<?php
    require_once('functions.php');
    girisKontrol();
 ?>
<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <title><?php echo $title; ?> - Çalışan Havuzu</title>
    <?php 
        include('header.php');
        $db = veriTabaninaBaglan();
    ?>

        <article>
            <div class="Atittle">Çalışan Havuzu</div>
            <div class="Atext">
                <?php
                        $table = "employee_pool";
                        if(isset($_GET["delete"]))
                            calisanSil($db,$table);
                        else if(isset($_GET["edit"]))
                            calisanDuzenle($db,$table);
                        else if(isset($_GET["move"]))
                            calisanTasi($db,$table,"employee");
                        else if(isset($_GET["add"]))
                            calisanEkle($db,$table);
						else if(isset($_GET["detail"]))
                            ayrintiliCalisan($db,$table);
                        else{
                            pasifCalisanlariYazdir($db,$table);
							echo '<a href="'.$_SERVER["PHP_SELF"].'?add"><div class="input-type-submit">Yeni kayıt</div></a>';
						}
                            
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