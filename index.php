
<?php
    include('functions.php');
    girisKontrol();
    session_write_close();
 ?>
<!DOCTYPE html>
<html lang="tr">
<head>
<meta charset="UTF-8">
<title><?php echo $title; ?> - Anasayfa</title>
<?php 
    include('header.php');
?>
        <article>
            <div class="Atittle">Anasayfa</div>
            <div class="Atext">
                <h1>Hoşgeldiniz!</h1>
                <h2 style="color: #2e6c80;">Projenin amacı</h2>
                <p>Bu proje, personel ve proje takip sistemidir. Bu sistem &uuml;zerinden projelerinizi ve personellerinizi takip edebilirsiniz. B&uuml;t&uuml;n&nbsp;veriler veritabanı i&ccedil;inde saklanır. Mod&uuml;ler ve dinamik yapısıyla kolayca d&uuml;zenlenebilir.&nbsp;</p>
                <h2 style="color: #2e6c80;">Neler yapılabilir:</h2>
                
                    <b>Personel</b> ekle/d&uuml;zenle/sil/taşı/g&ouml;r&uuml;nt&uuml;le<br>
                    <b>Proje</b> ekle/d&uuml;zenle/sil/g&ouml;r&uuml;nt&uuml;le/taşı/bitir<br>
                    <b>Proje ve Personel</b> eşleştirme/eşleşmeyi kaldırma

                <div style="clear: both;">
                    <h2 style="color: #2e6c80;">Yapılabilecek işlemler:</h2>
                    <div class="process detail" style="margin-bottom:3px"><img class="imgCenter" title="Ayrıntılar" src="images/detail.png" alt="" /></div>: Ayrıntıları g&ouml;sterir<div class="clr"></div>
                    <div class="process edit" style="margin-bottom:3px"><img class="imgCenter" title="D&uuml;zenle" src="images/edit.png" alt="" /></div>: D&uuml;zenleme sayfasını a&ccedil;ar<div class="clr"></div>
                    <div class="process delete" style="margin-bottom:3px"><img class="imgCenter" title="Sil" src="images/delete.png" alt="" /></div>: Siler<div class="clr"></div>
                    <div class="process move" style="margin-bottom:3px"><img class="imgCenter" title="Taşı" src="images/move.png" alt="" /></div>: Aktif/pasif havuzları arasında taşıma yapar<div class="clr"></div>
                    <div class="process finish" style="margin-right:3px"><img class="imgCenter" title="Bitir" src="images/finish.png" alt="" /></div>: Proje bitirme sayfasını a&ccedil;ar<div class="clr"></div>
                    <h2 style="color: #2e6c80;">Personel ve projelerin i&ccedil;erdiği bilgiler:</h2>
                    <p>&nbsp;</p>
                    <table class="index-table" style="float: left; margin-right: 20px;">
                        <thead>
                            <tr class="thread">
                                <td>Personel</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>İsim</td>
                            </tr>
                            <tr>
                                <td>Soyisim</td>
                            </tr>
                            <tr>
                                <td>Doğum Tarihi</td>
                            </tr>
                            <tr>
                                <td>Cinsiyet</td>
                            </tr>
                            <tr>
                                <td>TC No</td>
                            </tr>
                            <tr>
                                <td>Performans Puanı</td>
                            </tr>
                            <tr>
                                <td>Maaşı</td>
                            </tr>
                            <tr>
                                <td>Telefon Numarası</td>
                            </tr>
                            <tr>
                                <td>Mail Adresi</td>
                            </tr>
                            <tr>
                                <td>Bildiği Diller</td>
                            </tr>
                            <tr>
                                <td>Yetenekleri</td>
                            </tr>
                            <tr>
                                <td>&Ccedil;alıştığı Projeler</td>
                            </tr>
                        </tbody>
                    </table>
                    <table class="index-table">
                        <thead>
                            <tr class="thread">
                                <td>Proje</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>İsim</td>
                            </tr>
                            <tr>
                                <td>Başlangı&ccedil; Tarihi</td>
                            </tr>
                            <tr>
                                <td>Bitiş Tarihi</td>
                            </tr>
                            <tr>
                                <td>Puanı</td>
                            </tr>
                            <tr>
                                <td>Projede &ccedil;alışan kişiler</td>
                            </tr>
                        </tbody>
                    </table>
                    <div style="clear: both;">
                        <h2 style="color: #2e6c80;">&nbsp;</h2>
                        <h2 style="color: #2e6c80;">Men&uuml;ler:</h2>
                        <p><strong>Personeller &gt; Aktif &Ccedil;alışanlar:</strong> Bu alanda &ccedil;alışan d&uuml;zenle/sil/pasif gruba taşı/g&ouml;r&uuml;nt&uuml;le işlemleri yapılabilir.</p>
                        <p><strong>Personeller &gt; Çalışan Havuzu:</strong>&nbsp;Bu alanda başvuru ekle/d&uuml;zenle/sil/aktif gruba taşı/g&ouml;r&uuml;nt&uuml;le işlemleri yapılabilir.</p>
                        <p><strong>Projeler &gt; Aktif Projeler:</strong>&nbsp;Bu alanda aktif proje&nbsp;d&uuml;zenle/sil/pasif gruba taşı/g&ouml;r&uuml;nt&uuml;le işlemleri yapılabilir.</p>
                        <p><strong>Projeler &gt; Bitmiş Projeler:</strong>&nbsp;Bu alanda bitmiş proje&nbsp;sil&nbsp;işlemi yapılabilir.</p>
                        <p><strong>Projeler &gt; Bekleyen Proje Havuzu:</strong>&nbsp;Bu alanda&nbsp;bekleyen proje ekle/d&uuml;zenle/sil/aktif gruba taşı/g&ouml;r&uuml;nt&uuml;le işlemleri yapılabilir.</p>
                        <p><strong>Ayarlar &gt; Yabancı Diller:</strong>&nbsp;Bu alanda&nbsp;şirket içinde kabul gören yabancı diller ekle/d&uuml;zenle/sil/g&ouml;r&uuml;nt&uuml;le işlemleri yapılabilir.</p>
                        <p><strong>Ayarlar &gt; Yetenekler:</strong>&nbsp;Bu alanda&nbsp;şirket içinde kabul gören yetenekler ekle/d&uuml;zenle/sil/g&ouml;r&uuml;nt&uuml;le işlemleri yapılabilir.</p>
                        <h2 style="color: #2e6c80;">&nbsp;</h2>
                    </div>
                </div>
        </article>
    </main>
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>  
<![endif]-->
</body>
</html>