<?php
session_start();
$user = "Admin";
$title = "Personel ve Proje Takip Sistemi";
function yonlendir($milisaniye,$nereye){
    echo'<script>setTimeout(function (){window.location.href = "'.$nereye.'";},'.$milisaniye.');</script>';
} 
function failMessage($msg){
	echo '<div class="fail">'.$msg.'</div>';
}
function successMessage($msg){
	echo '<div class="success">'.$msg.'</div>';
}
function girisYap(){	
	$user = "Admin";
	$pass = "25d55ad283aa400af464c76d713c07ad";	
	if(empty($_SESSION['user'])){		
		if(isset($_POST['login'])){			
			$email = $_POST['email'];			
			$password = $_POST['password'];			
			if($user == $email && $pass == md5($password)){				
				$_SESSION['user'] = md5($user.$pass);
                yonlendir(0,$_SERVER['REQUEST_URI']);			
			}			
			else{				
				echo '
                <script>
                    alert("Girdiğiniz bilgiler yanlış");
                </script>
                ';				
			}			
		}		
	}	
	else{
        yonlendir(0,"index.php");
	}	
}
function girisKontrol(){	
	if(empty($_SESSION['user'])){	
        header("Location:login.php");		
	}	
}
function cikisYap(){	
	unset($_SESSION['user']);	
}
function veriTabaninaBaglan(){	
	$server="localhost";	
	$user="root";
	$pass="";
	$dbName="savt";
    /*
    $server="mysql.hostinger.web.tr";
    $user="u609214744_root";
    $pass="00root";
    $dbName="u609214744_savt";
	*/
	try{		
		$db = new PDO("mysql:host=$server;dbname=$dbName;charset=utf8",$user, $pass);
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}	catch(PDOException $e){
		echo $e->getMesage();
	}
	return $db;
}
function veriTabaniniKapat($db){
	$db = null;
    session_write_close ();
}
function calisanEkle($db,$table){
    $phpself = $_SERVER["PHP_SELF"];
    if(isset($_POST["add"])){
        $name = $_POST["name"];
        $surname = $_POST["surname"];
        $birth = $_POST["birth"];
        $sex = $_POST["sex"];
        $tcno = $_POST["tcno"];
        $marital = $_POST["marital"];
        $point = $_POST["point"];
		$mobile = $_POST["mobile"];
        $email = $_POST["email"];
        $sql = "INSERT INTO {$table} SET 
        fname = ?,
        lname = ?,
        bdate = ?,
        sex = ?,
        tc = ?,
        medeni_hal = ?,
        point = ?,
        maas = ?";
        $query = $db->prepare($sql);
        $insert = $query->execute(array(
            $name,$surname,$birth,$sex,$tcno,$marital,$point,0
        ));
        if($insert){
            $newId = $db->lastInsertId();
            $sql = "INSERT INTO {$table}_com SET 
            e_id = ?,
            com_id = ?,
            value = ?";
            $query= $db->prepare($sql);
            $query->execute(array(
                $newId,1,$mobile
            ));
            $sql = "INSERT INTO {$table}_com SET 
            e_id = ?,
            com_id = ?,
            value = ?";
            $query= $db->prepare($sql);
            $query->execute(array(
                $newId,2,$email
            ));
            if($query){
                if(isset($_POST["foreign"])){
                    foreach ($_POST["foreign"] as $key => $value) {
                        $sql = "INSERT INTO {$table}_dil SET 
                        e_id = ?,
                        dil_id = ?";
                        $query = $db->prepare($sql);
                        $query->execute(array(
                            $newId,$value
                        ));
                    }
                }
                if(isset($_POST["skills"])){
                    foreach ($_POST["skills"] as $key => $value) {
                        $sql = "INSERT INTO {$table}_yetenek SET 
                        e_id = ?,
                        y_id = ?";
                        $query = $db->prepare($sql);
                        $query->execute(array(
                            $newId,$value
                        ));
                    }
                }
                $_SESSION['employee_add'] = $name.' '.$surname;
                if(isset($_SESSION['employee_add'])){
                    header('Location: '.$_SERVER['REQUEST_URI']);
                    exit();
                }
            }
        }
    }
    if(isset($_SESSION['employee_add'])){
        successMessage('<b>'.$_SESSION['employee_add'].'</b> eklendi.');
        unset($_SESSION['employee_add']);
    }
    echo '
    <form action="'.$phpself.'?add" method="POST">
            <table class="tg" style="margin-bottom:10px;">
                <tr>
                    <td class="tg-yw4l">Adı</td>
                    <td class="tg-yw4l"><input class="input-type-text editStyle" type="text" name="name" required></td>
                </tr>
                <tr>
                    <td class="tg-yw4l">Soyadı</td>
                    <td class="tg-yw4l"><input class="input-type-text editStyle" type="text" name="surname" required></td>
                </tr>
                <tr>
                    <td class="tg-yw4l">Doğum tarihi</td>
                    <td class="tg-yw4l"><input class="input-type-text editStyle" type="date" name="birth" max="2000-12-31" min="1917-12-31" title="gg-AA-YYYY" required></td>
                </tr>
                <tr>
                    <td class="tg-yw4l">Cinsiyet</td>
                    <td class="tg-yw4l">
                        Bay <input type="radio" name="sex" value="Bay" required>
                        Bayan <input type="radio" name="sex" value="Bayan" required>
                    </td>
                </tr>
                <tr>
                    <td class="tg-yw4l">TC kimlik no</td>
                    <td class="tg-yw4l"><input class="input-type-text editStyle" type="number" name="tcno" min="10000000000" max="99999999999" required></td>
                </tr>
                <tr>
                    <td class="tg-yw4l">Medeni hali</td>
                    <td class="tg-yw4l">
                        Bekar <input type="radio" name="marital" value="Bekar" required>
                        Evli <input type="radio" name="marital" value="Evli" required>
                    </td>
                </tr>
                <tr>
                    <td class="tg-yw4l">Performans Puanı</td>
                    <td class="tg-yw4l"><input class="input-type-text editStyle" type="number" name="point" required></td>
                </tr>
                <tr>
                    <td class="tg-yw4l">Telefon numarası</td>
                    <td class="tg-yw4l"><input class="input-type-text editStyle" type="number" name="mobile" min="5000000000" max="5599999999" title="10 haneli telefon numarası" required></td>
                </tr>
                <tr>
                    <td class="tg-yw4l">Mail adresi</td>
                    <td class="tg-yw4l"><input class="input-type-text editStyle" type="email" name="email" required></td>
                </tr>
                <tr>
                    <td class="tg-yw4l">Yabancı Diller</td>
                    <td class="tg-yw4l">';
					$langs = $db->query("SELECT * FROM dil ORDER BY id",PDO::FETCH_ASSOC);
					if($langs->rowCount()){
						foreach($langs as $lang){
							echo $lang["value"].' <input type="checkbox" name="foreign[]" value="'.$lang["id"].'"><br>';
						}
					}
					else
						echo '--dil yok--';
					echo'
                    </td>
                </tr>
                <tr>
                    <td class="tg-yw4l">Yetenekler</td>
                    <td class="tg-yw4l">';
					$skills = $db->query("SELECT * FROM yetenek ORDER BY id",PDO::FETCH_ASSOC);
					if($skills->rowCount()){
						foreach($skills as $skill){
							echo $skill["value"].' <input type="checkbox" name="skills[]" value="'.$skill["id"].'"><br>';
						}
					}
					else
						echo '--dil yok--';
					echo'
                    </td>
                </tr>
            </table>
            <input type="submit" class="input-type-submit" name="add" value="Ekle">
            <a href="'.$phpself.'"><div class="cancel">Geri</div></a>
        </form>
    ';
}
function calisanDuzenle($db,$table){
    $id = $_GET["edit"];
    $phpself = $_SERVER['PHP_SELF'];
    if(isset($_POST['edit'])){
        $name = $_POST["name"];
        $surname = $_POST["surname"];
        $birth = $_POST["birth"];
        $sex = $_POST["sex"];
        $tcno = $_POST["tcno"];
        $marital = $_POST["marital"];
        $point = $_POST["point"];
        if($phpself=="/employees.php")
            $salary = $_POST["salary"];
		$mobile = $_POST["mobile"];
        $email = $_POST["email"];
		if(strlen((string)$tcno) != 11){
			failMessage("TC no 11 haneli olmalıdır!");
		}
		else if(strlen((string)$mobile) != 10){
			failMessage("Telefon numarası 10 haneli olmalıdır");
		}
		else{
			$sql = "UPDATE {$table} SET 
			fname=:name,
			lname=:surname,
			bdate=:birth,
			sex=:sex,
			tc=:tcno,
			medeni_hal=:marital,
			point=:point,
			maas=:salary 
			WHERE id=:id";
			$query = $db->prepare($sql);
            if($phpself=="/employees.php"){
                $update = $query->execute(array(
                    "name" => $name,
                    "surname" => $surname,
                    "birth" => $birth,
                    "sex" => $sex,
                    "tcno" => $tcno,
                    "marital" => $marital,
                    "point" => $point,
                    "salary" => $salary,
                    "id" => $id
                ));
            }
            else{
                $update = $query->execute(array(
                    "name" => $name,
                    "surname" => $surname,
                    "birth" => $birth,
                    "sex" => $sex,
                    "tcno" => $tcno,
                    "marital" => $marital,
                    "point" => $point,
                    "salary" => 0,
                    "id" => $id
                ));
            }
			if($update){
				$sql = "UPDATE {$table}_com SET 
				value=:mobile 
				WHERE e_id=:id AND com_id=1";
				$query= $db->prepare($sql);
				$query->execute(array(
					"mobile" => $mobile,
					"id" => $id
				));
				$sql = "UPDATE {$table}_com SET 
				value=:email 
				WHERE e_id=:id AND com_id=2";
				$query= $db->prepare($sql);
				$query->execute(array(
					"email" => $email,
					"id" => $id
				));
				
				if($query){
					$query = $db->prepare("DELETE FROM {$table}_dil WHERE e_id='{$id}'");
					$query->execute();
					if(isset($_POST["foreign"])){
						foreach ($_POST["foreign"] as $key => $value) {
							$sql = "INSERT INTO {$table}_dil SET 
							e_id = ?,
							dil_id = ?";
							$query = $db->prepare($sql);
							$query->execute(array(
								$id,$value
							));
						}
					}
					$query = $db->prepare("DELETE FROM {$table}_yetenek WHERE e_id='{$id}'");
					$query->execute();
					if(isset($_POST["skills"])){
						foreach ($_POST["skills"] as $key => $value) {
							$sql = "INSERT INTO {$table}_yetenek SET 
							e_id = ?,
							y_id = ?";
							$query = $db->prepare($sql);
							$query->execute(array(
								$id,$value
							));
						}
					}
                    $_SESSION['employee_edit'] = $name.' '.$surname;
                    if(isset($_SESSION['employee_edit'])){
                        header('Location: '.$_SERVER['REQUEST_URI']);
                        exit();
                    }
				}
			}
		}
    }
    $sql = "SELECT * FROM {$table} WHERE id = '{$id}'";
    $query = $db->query($sql)->fetch(PDO::FETCH_ASSOC);
    if($query){
        if(isset($_SESSION['employee_edit'])){
            successMessage('<b>'.$_SESSION['employee_edit'].'</b> düzenlendi');
            unset($_SESSION['employee_edit']);
        }
        echo '
        <form action="" method="POST">
            <table class="tg" style="margin-bottom:10px;">
                <tr>
                    <td class="tg-yw4l">Adı</td>
                    <td class="tg-yw4l"><input class="input-type-text editStyle" type="text" name="name" value="'.$query["fname"].'" required></td>
                </tr>
                <tr>
                    <td class="tg-yw4l">Soyadı</td>
                    <td class="tg-yw4l"><input class="input-type-text editStyle" type="text" name="surname" value="'.$query["lname"].'" required></td>
                </tr>
                <tr>
                    <td class="tg-yw4l">Doğum tarihi</td>
                    <td class="tg-yw4l"><input class="input-type-text editStyle" type="date" name="birth" value="'.$query["bdate"].'" max="2000-12-31" min="1917-12-31" required></td>
                </tr>
                <tr>
                    <td class="tg-yw4l">Cinsiyet</td>
                    <td class="tg-yw4l">
                        Bay <input type="radio" name="sex" value="Bay"';
                        if($query["sex"]=="Bay") echo " checked"; echo'>
                        Bayan <input type="radio" name="sex" value="Bayan"';
                        if($query["sex"]=="Bayan") echo " checked"; echo'>
                    </td>
                </tr>
                <tr>
                    <td class="tg-yw4l">TC kimlik no</td>
                    <td class="tg-yw4l"><input class="input-type-text editStyle" type="number" name="tcno" min="10000000000" max="99999999999" value="'.$query["tc"].'" required></td>
                </tr>
                <tr>
                    <td class="tg-yw4l">Medeni hali</td>
                    <td class="tg-yw4l">
                        Bekar <input type="radio" name="marital" value="Bekar"';if($query["medeni_hal"]=="Bekar") echo " checked"; echo'>
                        
                        Evli <input type="radio" name="marital" value="Evli"';if($query["medeni_hal"]=="Evli") echo " checked"; echo'>
                        
                    </td>
                </tr>
                <tr>
                    <td class="tg-yw4l">Performans Puanı</td>
                    <td class="tg-yw4l"><input class="input-type-text editStyle" type="number" name="point" value="'.$query["point"].'" required></td>
                </tr>';
                if($phpself=="/employees.php") {
                    echo'
                <tr>
                    <td class="tg-yw4l">Maaşı</td>
                    <td class="tg-yw4l"><input class="input-type-text editStyle" type="number" name="salary" value="'.$query["maas"].'" required></td>
                </tr>';
                }
                echo'
                <tr>
                    <td class="tg-yw4l">Telefon numarası</td>';
                    $com = $db->query("SELECT * FROM {$table}_com WHERE e_id='{$id}' AND com_id=1")->fetch(PDO::FETCH_ASSOC);
                    echo'
                    <td class="tg-yw4l"><input class="input-type-text editStyle" type="number" name="mobile" min="5000000000" max="5599999999" value="'.$com["value"].'" required></td>
                </tr>
                <tr>
                    <td class="tg-yw4l">Mail adresi</td>';
                    $com = $db->query("SELECT * FROM {$table}_com WHERE e_id='{$id}' AND com_id=2")->fetch(PDO::FETCH_ASSOC);
                    echo'
                    <td class="tg-yw4l"><input class="input-type-text editStyle" type="email" name="email" value="'.$com["value"].'" required></td>
                </tr>
                <tr>
                    <td class="tg-yw4l">Yabancı Diller</td>
                    <td class="tg-yw4l">';
                        $langs = $db->query("SELECT * FROM dil ORDER BY id",PDO::FETCH_ASSOC);
					if($langs->rowCount()){
						foreach($langs as $lang){
                            $dil_id=$lang["id"];
                            $isHaveThisLang = $db->query("SELECT * FROM {$table}_dil WHERE dil_id='{$dil_id}' AND e_id='{$id}'")->fetch(PDO::FETCH_ASSOC);
							echo $lang["value"].' <input type="checkbox" name="foreign[]" value="'.$lang["id"].'" ';if($isHaveThisLang) echo'checked';echo'><br>';
						}
					}
					else
						echo '--dil yok--';
					echo'
                    </td>
                </tr>
                <tr>
                    <td class="tg-yw4l">Yetenekler</td>
                    <td class="tg-yw4l">';
					$skills = $db->query("SELECT * FROM yetenek ORDER BY id",PDO::FETCH_ASSOC);
					if($skills->rowCount()){
						foreach($skills as $skill){
                            $y_id=$skill["id"];
                            $isHaveThisSkill = $db->query("SELECT * FROM {$table}_yetenek WHERE y_id='{$y_id}' AND e_id='{$id}'")->fetch(PDO::FETCH_ASSOC);
							echo $skill["value"].' <input type="checkbox" name="skills[]" value="'.$skill["id"].'" ';if($isHaveThisSkill) echo'checked';echo'><br>';
						}
					}
					else
						echo '--dil yok--';
					echo'
                    </td>
                </tr>
            </table>
            <input type="submit" class="input-type-submit" name="edit" value="Düzenle">
            <a href="'.$phpself.'"><div class="cancel">Geri</div></a>
        </form>
        ';
        
    }
    else{
        failMessage("Geçersiz parametre girdiniz");
        yonlendir(1000,$phpself);
    }
}
function calisanSil($db,$table){
    $phpself = $_SERVER['PHP_SELF'];
    $id = $_GET["delete"];
    $sql = "SELECT * FROM {$table} WHERE id = '{$id}'";
    $employee = $db->query($sql)->fetch(PDO::FETCH_ASSOC);
    if($employee){
        $sql = "DELETE FROM ".$table." WHERE id =  :id";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);   
        $stmt->execute();
        
        $sql = "DELETE FROM {$table}_dil WHERE e_id=:id";
        $query = $db->prepare($sql);
        $query->execute(array(
            "id"=>$id
        ));
        $sql = "DELETE FROM {$table}_com WHERE e_id=:id";
        $query = $db->prepare($sql);
        $query->execute(array(
            "id"=>$id
        ));
        $sql = "DELETE FROM {$table}_yetenek WHERE e_id=:id";
        $query = $db->prepare($sql);
        $query->execute(array(
            "id"=>$id
        ));
        if($phpself == "/employees.php"){
            $sql = "DELETE FROM proje_to_employee WHERE e_id=:id";
            $query = $db->prepare($sql);
            $query->execute(array(
                "id"=>$id
            ));
        }
        successMessage('<b>'.$employee["fname"].'</b> isimli kişi silindi');
    }
    else
        failMessage("Geçersiz parametre girdiniz");
        
    yonlendir(1000,$phpself);
}
function calisanTasi($db,$table1,$table2){
    $id = $_GET["move"];
    $phpself = $_SERVER['PHP_SELF'];
    $sql = "SELECT * FROM {$table1} WHERE id = '{$id}'";
    $query = $db->query($sql)->fetch(PDO::FETCH_ASSOC);
    if($query){
        $fname = $query["fname"];
        $sql = "INSERT INTO 
        {$table2}(fname,lname,bdate,sex,tc,medeni_hal,point,maas) 
        SELECT fname,lname,bdate,sex,tc,medeni_hal,point,maas FROM {$table1} 
        WHERE id =:id";
        $query = $db->prepare($sql);
        $query->execute(array(
            "id" => $id
        ));
        $newId = $db->lastInsertId();
        if($query){
            $sql = "DELETE FROM {$table1} WHERE id=:id";
            $query = $db->prepare($sql);
            $query->execute(array(
                "id" => $id
            ));
            if($query){
                $sql = "UPDATE {$table1}_yetenek SET e_id=:newId WHERE e_id=:id";
                $query = $db->prepare($sql);
                $query->execute(array(
                    "newId" => -1,
                    "id" => $id
                ));
                $sql = "INSERT INTO {$table2}_yetenek(e_id,y_id) 
                SELECT e_id,y_id FROM {$table1}_yetenek WHERE e_id=:newId";
                $query = $db->prepare($sql);
                $query->execute(array(
                    "newId" => -1
                ));
                $sql = "UPDATE {$table2}_yetenek SET e_id=:newId WHERE e_id=:id";
                $query = $db->prepare($sql);
                $query->execute(array(
                    "newId" => $newId,
                    "id" => -1
                ));
                $sql = "DELETE FROM {$table1}_yetenek WHERE e_id=:id";
                $query = $db->prepare($sql);
                $query->execute(array(
                    "id" => -1
                ));
                if($query){
                    $sql = "UPDATE {$table1}_dil SET e_id=:newId WHERE e_id=:id";
                    $query = $db->prepare($sql);
                    $query->execute(array(
                        "newId" => -1,
                        "id" => $id
                    ));
                    $sql = "INSERT INTO {$table2}_dil(e_id,dil_id) 
                    SELECT e_id,dil_id FROM {$table1}_dil WHERE e_id=:newId";
                    $query = $db->prepare($sql);
                    $query->execute(array(
                        "newId" => -1
                    ));
                    $sql = "UPDATE {$table2}_dil SET e_id=:newId WHERE e_id=:id";
                    $query = $db->prepare($sql);
                    $query->execute(array(
                        "newId" => $newId,
                        "id" => -1
                    ));
                    $sql = "DELETE FROM {$table1}_dil WHERE e_id=:id";
                    $query = $db->prepare($sql);
                    $query->execute(array(
                        "id" => -1
                    ));
                    if($query){
                        $sql = "UPDATE {$table1}_com SET e_id=:newId WHERE e_id=:id";
                        $query = $db->prepare($sql);
                        $query->execute(array(
                            "newId" => -1,
                            "id" => $id
                        ));
                        $sql = "INSERT INTO {$table2}_com(e_id,com_id,value) 
                        SELECT e_id,com_id,value FROM {$table1}_com WHERE e_id=:newId";
                        $query = $db->prepare($sql);
                        $query->execute(array(
                            "newId" => -1
                        ));
                        $sql = "UPDATE {$table2}_com SET e_id=:newId WHERE e_id=:id";
                        $query = $db->prepare($sql);
                        $query->execute(array(
                            "newId" => $newId,
                            "id" => -1
                        ));
                        $sql = "DELETE FROM {$table1}_com WHERE e_id=:id";
                        $query = $db->prepare($sql);
                        $query->execute(array(
                            "id" => -1
                        ));
                        successMessage('<b>'.$fname.'</b> taşındı');
                    }
                }
            }
        }
    }
    else{
        failMessage("Geçersiz parametre girdiniz");
    }
    yonlendir(1000,$phpself);
}
function aktifCalisanlariYazdir($db,$table){
    $sql = "SELECT * FROM {$table} ORDER BY id";
    $result = $db->query($sql, PDO::FETCH_ASSOC);
	if($result->rowCount()){
        echo $result->rowCount().' sonuç bulundu';
		echo'<table class="tg" style="margin-bottom:10px;">
                    <tr>
                        <th class="tg-yw4l">Ad</th>
                        <th class="tg-yw4l">Soyad</th>
                        <th class="tg-yw4l">Puan</th>
                        <th class="tg-yw4l">Maaş</th>
						<th class="tg-yw4l">Yetenekler</th>
						<th class="tg-yw4l">Çalıştığı Projeler</th>
                        <th class="tg-yw4l islem">İşlemler</th>
                    </tr>';
		foreach ($result as $row) {
			$id = $row["id"];
			$skills = $db->query("SELECT y_id FROM {$table}_yetenek WHERE e_id = '{$id}' ORDER BY id",PDO::FETCH_ASSOC);
			$projects = $db->query("SELECT p_id FROM proje_to_employee WHERE e_id = '{$id}' ORDER BY id",PDO::FETCH_ASSOC);
			echo'
                    <tr>
                        <td class="tg-yw4l">'.$row["fname"].'</td>
                        <td class="tg-yw4l">'.$row["lname"].'</td>
                        <td class="tg-yw4l">'.$row["point"].'</td>
                        <td class="tg-yw4l">'.$row["maas"].'</td>
						<td class="tg-yw4l">
						<select>';
						if($skills->rowCount()){
							foreach($skills as $sid){
								$y_id = $sid["y_id"];
								$skillName = $db->query("SELECT value FROM yetenek WHERE id='{$y_id}'")->fetch(PDO::FETCH_ASSOC);
								echo '<option>'.$skillName["value"].'</option>';
							}
						}
						else
							echo'<option>--Yok--</option>';
						echo'
						</select>
						</td>
						<td class="tg-yw4l">
						<select>';
						if($projects->rowCount()){
							foreach($projects as $pid){
								$p_id = $pid["p_id"];
								$projectName = $db->query("SELECT isim FROM proje WHERE id='{$p_id}'")->fetch(PDO::FETCH_ASSOC);
								echo '<option>'.$projectName["isim"].'</option>';
							}
						}
						else
							echo'<option>--Yok--</option>';
						echo'
						</select></td>
                        <td class="tg-yw4l">
						<a href="'.$_SERVER["PHP_SELF"].'?detail='.$row["id"].'"><div class="process detail"><img src="images/detail.png" title="Ayrıntılar" class="imgCenter"></div></a>
						<a href="'.$_SERVER["PHP_SELF"].'?edit='.$row["id"].'"><div class="process edit"><img src="images/edit.png" title="Düzenle" class="imgCenter"></div></a>
                        <a href="'.$_SERVER["PHP_SELF"].'?delete='.$row["id"].'"><div class="process delete"><img src="images/delete.png" title="Sil" class="imgCenter"></div></a>
                        <a href="'.$_SERVER["PHP_SELF"].'?move='.$row["id"].'"><div class="process move"><img src="images/move.png" title="Taşı" class="imgCenter"></div></a>
                        </td>
                    </tr>';
		}
        echo'
                </table>';
	}
	else {
		failMessage("Hiç bir sonuç bulunamadı");
	}
}
function pasifCalisanlariYazdir($db,$table){
     $sql = "SELECT * FROM {$table} ORDER BY id";
    $result = $db->query($sql, PDO::FETCH_ASSOC);
	if($result->rowCount()){
        echo $result->rowCount().' sonuç bulundu';
		echo'<table class="tg" style="margin-bottom:10px;">
                    <tr>
                        <th class="tg-yw4l">Ad</th>
                        <th class="tg-yw4l">Soyad</th>
                        <th class="tg-yw4l">Puan</th>
			<th class="tg-yw4l">Yetenekler</th>
                        <th class="tg-yw4l islem">İşlemler</th>
                    </tr>';
		foreach ($result as $row) {
			$id = $row["id"];
			$skills = $db->query("SELECT y_id FROM {$table}_yetenek WHERE e_id = '{$id}' ORDER BY id",PDO::FETCH_ASSOC);
			$projects = $db->query("SELECT p_id FROM proje_to_employee WHERE e_id = '{$id}' ORDER BY id",PDO::FETCH_ASSOC);
			echo'
                    <tr>
                        <td class="tg-yw4l">'.$row["fname"].'</td>
                        <td class="tg-yw4l">'.$row["lname"].'</td>
                        <td class="tg-yw4l">'.$row["point"].'</td>
			<td class="tg-yw4l">
			<select>';
						if($skills->rowCount()){
							foreach($skills as $sid){
								$y_id = $sid["y_id"];
								$skillName = $db->query("SELECT value FROM yetenek WHERE id='{$y_id}'")->fetch(PDO::FETCH_ASSOC);
								echo '<option>'.$skillName["value"].'</option>';
							}
						}
						else
							echo'<option>--Yok--</option>';
						echo'
			</select>
			</td>
                        <td class="tg-yw4l">
                        <a href="'.$_SERVER["PHP_SELF"].'?detail='.$row["id"].'"><div class="process detail"><img src="images/detail.png" title="Ayrıntılar" class="imgCenter"></div></a>
						<a href="'.$_SERVER["PHP_SELF"].'?edit='.$row["id"].'"><div class="process edit"><img src="images/edit.png" title="Düzenle" class="imgCenter"></div></a>
                        <a href="'.$_SERVER["PHP_SELF"].'?delete='.$row["id"].'"><div class="process delete"><img src="images/delete.png" title="Sil" class="imgCenter"></div></a>
                        <a href="'.$_SERVER["PHP_SELF"].'?move='.$row["id"].'"><div class="process move"><img src="images/move.png" title="Taşı" class="imgCenter"></div></a>
                        </td>
                    </tr>';
		}
        echo'
                </table>';
	}
	else {
		failMessage("Hiç bir sonuç bulunamadı");
	}
}
function ayrintiliCalisan($db,$table){
	$id = $_GET["detail"];
    $phpself = $_SERVER['PHP_SELF'];
	$sql = "SELECT * FROM {$table} WHERE id = '{$id}'";
    $query = $db->query($sql)->fetch(PDO::FETCH_ASSOC);
    if($query){
        echo '
            <table class="tg" style="margin-bottom:10px;">
                <tr>
                    <td class="tg-yw4l"><b>Adı</b></td>
                    <td class="tg-yw4l">'.$query["fname"].'</td>
                </tr>
                <tr>
                    <td class="tg-yw4l"><b>Soyadı</b></td>
                    <td class="tg-yw4l">'.$query["lname"].'</td>
                </tr>
                <tr>
                    <td class="tg-yw4l"><b>Doğum tarihi</b></td>
                    <td class="tg-yw4l">'.$query["bdate"].'</td>
                </tr>
                <tr>
                    <td class="tg-yw4l"><b>Cinsiyet</b></td>
                    <td class="tg-yw4l">'.$query["sex"].'</td>
                </tr>
                <tr>
                    <td class="tg-yw4l"><b>TC kimlik no</b></td>
                    <td class="tg-yw4l">'.$query["tc"].'</td>
                </tr>
                <tr>
                    <td class="tg-yw4l"><b>Medeni hali</b></td>
                    <td class="tg-yw4l">'.$query["medeni_hal"].'</td>
                </tr>
                <tr>
                    <td class="tg-yw4l"><b>Performans Puanı</b></td>
                    <td class="tg-yw4l">'.$query["point"].'</td>
                </tr>
                <tr>
                    <td class="tg-yw4l"><b>Maaşı</b></td>
                    <td class="tg-yw4l">'.$query["maas"].'</td>
                </tr>
                <tr>
                    <td class="tg-yw4l"><b>Telefon numarası</b></td>';
                    $com = $db->query("SELECT * FROM {$table}_com WHERE e_id='{$id}' AND com_id=1")->fetch(PDO::FETCH_ASSOC);
                    echo'
                    <td class="tg-yw4l">'.$com["value"].'</td>
                </tr>
                <tr>
                    <td class="tg-yw4l"><b>Mail adresi</b></td>';
                    $com = $db->query("SELECT * FROM {$table}_com WHERE e_id='{$id}' AND com_id=2")->fetch(PDO::FETCH_ASSOC);
                    echo'
                    <td class="tg-yw4l">'.$com["value"].'</td>
                </tr>
                <tr>
                    <td class="tg-yw4l"><b>Yabancı Diller</b></td>
                    <td class="tg-yw4l">';
                        $lang = $db->query("SELECT dil_id FROM {$table}_dil WHERE e_id='{$id}' ORDER BY id",PDO::FETCH_ASSOC);
						if($lang->rowCount()){
							foreach($lang as $lid){
								$dil_id = $lid["dil_id"];
								$langName = $db->query("SELECT value FROM dil WHERE id='{$dil_id}'")->fetch(PDO::FETCH_ASSOC);
								echo ' '.$langName["value"].'<br>';
							}
						}
						else{
							echo '--Yok--';
						}
						echo'
                    </td>
                </tr>
                <tr>
                    <td class="tg-yw4l"><b>Yetenekler</b></td>
                    <td class="tg-yw4l">';
                        $skill = $db->query("SELECT y_id FROM {$table}_yetenek WHERE e_id='{$id}' ORDER BY id",PDO::FETCH_ASSOC);
						if($skill->rowCount()){
							foreach($skill as $sid){
								$y_id = $sid["y_id"];
								$skillName = $db->query("SELECT value FROM yetenek WHERE id='{$y_id}'")->fetch(PDO::FETCH_ASSOC);
								echo ' '.$skillName["value"].'<br>';
							}
						}
						else{
							echo '--Yok--';
						}
						echo'
                    </td>
                </tr>
            </table>
            <a href="'.$phpself.'?edit='.$query["id"].'"><div class="input-type-submit" style="margin-right:10px" >Düzenle</div></a>
            <a href="'.$phpself.'"><div class="cancel">Geri</div></a>
        </form>
        ';
        
    }
    else{
        failMessage("Geçersiz parametre girdiniz");
        yonlendir(1000,$phpself);
    }
}
function projeEkle($db,$table){ 
    $phpself = $_SERVER["PHP_SELF"];
    if(isset($_POST["add"])){
        $name       = $_POST["name"];
        $start      = $_POST["start"];
        $finish     = $_POST["finish"];
        $point      = $_POST["point"];
        $startSeconds = strtotime($start);
        $finishSeconds = strtotime($finish);
        if($finishSeconds-$startSeconds>0){
            $sql = "INSERT INTO {$table} SET 
            isim = ?,
            start_date = ?,
            finish_date = ?,
            puan = ?";
            $query = $db->prepare($sql);
            $insert = $query->execute(array(
                $name,$start,$finish,$point,
            ));
            $_SESSION['project_add'] = $name;
            if(isset($_SESSION['project_add'])){
                header('Location: '.$_SERVER['REQUEST_URI']);
                exit();
            }
        }
        else
            failMessage('Başlangıç tarihi bitiş tarihinden daha sonra olamaz!');
    }
    if(isset($_SESSION['project_add'])){
        successMessage('<b>'.$_SESSION['project_add'].'</b> eklendi.');
        unset($_SESSION['project_add']);
    }
    echo '
    <form action="" method="POST">
        <table class="tg" style="margin-bottom:10px;">
            <tr>
                <td class="tg-yw4l">Proje adı</td>
                <td class="tg-yw4l"><input class="input-type-text editStyle" type="text" name="name" required></td>
            </tr>
            <tr>
                <td class="tg-yw4l">Başlangıç tarihi</td>
                <td class="tg-yw4l"><input class="input-type-text editStyle" type="date" name="start" max="2023-12-30" min="1979-12-30" title="gg-AA-YYYY" required></td>
            </tr>
            <tr>
                <td class="tg-yw4l">Bitiş tarihi</td>
                <td class="tg-yw4l"><input class="input-type-text editStyle" type="date" name="finish" max="2023-12-30" min="1979-12-30" title="gg-AA-YYYY" required></td>
            </tr>
            <tr>
                <td class="tg-yw4l">Proje puanı</td>
                <td class="tg-yw4l"><input class="input-type-text editStyle" type="number" name="point" required></td>
            </tr>
        </table>
        <input type="submit" class="input-type-submit" name="add" value="Ekle">
        <a href="'.$phpself.'"><div class="cancel">Geri</div></a>
    </form>
    ';
}
function projeDuzenle($db,$table){
    $id = $_GET["edit"];
    $phpself = $_SERVER['PHP_SELF'];
    if(isset($_POST['edit'])){
        $name       = $_POST["name"];
        $start      = $_POST["start"];
        $finish     = $_POST["finish"];
        $point      = $_POST["point"];
        $sql = "UPDATE {$table} SET 
        isim=:name, 
        start_date=:start, 
        finish_date=:finish, 
        puan=:point 
        WHERE id=:id";
        $query = $db->prepare($sql);
        $update = $query->execute(array(
            "name" => $name,
            "start" => $start,
            "finish" => $finish,
            "point" => $point,
            "id" => $id
        ));
        if($update && $phpself=="/projects.php"){
            $sql = "DELETE FROM proje_to_employee WHERE p_id='{$id}'";
            $delete = $db->prepare($sql);
            $delete->execute();
            if(isset($_POST["employees"])){
                foreach ($_POST["employees"] as $key => $value) {
                    $isEnoughForThat = $db->query("SELECT point FROM employee WHERE id='$value' AND point>='$point'")->fetch(PDO::FETCH_ASSOC);
                    if($isEnoughForThat){
                        $sql = "INSERT INTO proje_to_employee SET 
                        p_id = ?,
                        e_id = ?";
                        $query = $db->prepare($sql);
                        $query->execute(array(
                            $id,$value
                        ));
                    }
                }
            }
        }
        $_SESSION['project_edit'] = $name;
        if(isset($_SESSION['project_edit'])){
            header('Location: '.$_SERVER['REQUEST_URI']);
            exit();
        }
    }
    $sql = "SELECT * FROM {$table} WHERE id = {$id}";
    $query = $db->query($sql)->fetch(PDO::FETCH_ASSOC);
    if($query){
        if(isset($_SESSION['project_edit'])){
            successMessage('<b>'.$_SESSION['project_edit'].'</b> projesi düzenlendi');
            unset($_SESSION['project_edit']);
        }
        echo '
        <form action="" method="POST">
            <table class="tg" style="margin-bottom:10px;">
                <tr>
                    <td class="tg-yw4l">Proje adı</td>
                    <td class="tg-yw4l"><input class="input-type-text editStyle" type="text" name="name" value="'.$query["isim"].'" required></td>
                </tr>
                <tr>
                    <td class="tg-yw4l">Başlangıç tarihi</td>
                    <td class="tg-yw4l"><input class="input-type-text editStyle" type="date" name="start" value="'.$query["start_date"].'" max="2023-12-30" min="1979-12-30" title="gg-AA-YYYY" required></td>
                </tr>
                <tr>
                    <td class="tg-yw4l">Bitiş tarihi</td>
                    <td class="tg-yw4l"><input class="input-type-text editStyle" type="date" name="finish" value="'.$query["finish_date"].'" max="2023-12-30" min="1979-12-30" title="gg-AA-YYYY" required></td>
                </tr>
                <tr>
                    <td class="tg-yw4l">Proje puanı</td>
                    <td class="tg-yw4l"><input class="input-type-text editStyle" type="number" name="point" value="'.$query["puan"].'" required></td>
                </tr>';
                if($phpself=="/projects.php"){ ?>
                <tr> 
                    <td class="tg-yw4l">Projede çalışanlar</td>
                    <td class="tg-yw4l">
                        <?php
                    $point = $query["puan"];
                    $employee = $db->query("SELECT * FROM employee WHERE point>=$point ORDER BY id",PDO::FETCH_ASSOC);
                    if($employee->rowCount()>0){
                        echo '<div style="float:left;">';
                        foreach ($employee as $row){
                            echo '<div style="height:18px;line-height:18px;margin-right:5px;">'.$row["fname"].' '.$row["lname"].'</div>';
                        }
                        echo '</div>';
                        echo '<div style="float:left;">';
                        $employee = $db->query("SELECT * FROM employee WHERE point>=$point ORDER BY id",PDO::FETCH_ASSOC);
                        foreach ($employee as $row){ 
                            $eid = $row["id"];
                            $isPartOf = $db->query("SELECT * FROM proje_to_employee WHERE p_id='{$id}' AND e_id='{$eid}'")->fetch(PDO::FETCH_ASSOC);
                            echo '<div style="height:18px;line-height:18px;"><input type="checkbox" style="margin:2.5px 0 0 0;" value="'.$eid.'" name ="employees[]" ';if($isPartOf) echo "checked";
                            echo'></div>
                            
                            ';
                        }
                        echo '</div>';
                    }
					else
						echo 'Aktif çalışan yok!';
                        echo'
                    </td>
                </tr>';
                }echo'
            </table>
            <input type="submit" class="input-type-submit" name="edit" value="Düzenle">
            <a href="'.$phpself.'"><div class="cancel">Geri</div></a>
        </form>
        ';
    }
    else{
        failMessage("Geçersiz parametre girdiniz");
        yonlendir(1000,$phpself);
    }
}
function projeSil($db,$table){
    $phpself = $_SERVER['PHP_SELF'];
    $id = $_GET["delete"];
    $sql = "SELECT * FROM {$table} WHERE id = '{$id}'";
    $project = $db->query($sql)->fetch(PDO::FETCH_ASSOC);
    if($project){
        $sql = "DELETE FROM ".$table." WHERE id =  :id";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);   
        $stmt->execute();
        if($phpself == "/projects.php"){
            $sql = "DELETE FROM proje_to_employee WHERE p_id=:id";
            $query = $db->prepare($sql);
            $query->execute(array(
                "id"=>$id
            ));
        }
        if($phpself == "/projectsFinish.php"){
            $sql = "DELETE FROM proje_bitmis_to_employee WHERE p_id=:id";
            $query = $db->prepare($sql);
            $query->execute(array(
                "id"=>$id
            ));
        }
        successMessage('<b>'.$project["isim"].'</b> isimli proje silindi');
    }
    else
        failMessage("Geçersiz parametre girdiniz");
        
    yonlendir(1000,$phpself);
}
function projeTasi($db,$table1,$table2){
    $id = $_GET["move"];
    $phpself = $_SERVER['PHP_SELF'];
    $sql = "SELECT * FROM {$table1} WHERE id = '{$id}'";
    $query = $db->query($sql)->fetch(PDO::FETCH_ASSOC);
    if($query){
        $name = $query["isim"];
        $sql = "INSERT INTO 
        {$table2}(isim,start_date,finish_date,puan) 
        SELECT isim,start_date,finish_date,puan FROM {$table1} 
        WHERE id =:id";
        $query = $db->prepare($sql);
        $query->execute(array(
            "id" => $id
        ));
		$sql = "DELETE FROM {$table1} WHERE id='{$id}'";
		$query = $db->prepare($sql);
		$query->execute();
        if($query && $table1=="proje"){
            $sql = "DELETE FROM proje_to_employee WHERE p_id=:id";
            $query = $db->prepare($sql);
            $query->execute(array(
                "id" => $id
            ));
        }
		successMessage('<b>'.$name.'</b> taşındı');
    }
    else{
        failMessage("Geçersiz parametre girdiniz");
    }
    yonlendir(1000,$phpself);
}
function projeBitir($db,$table1,$table2){
    $id = $_GET["finish"];
    $phpself = $_SERVER['PHP_SELF'];
    $sql = "SELECT * FROM {$table1} WHERE id = '{$id}'";
    $project = $db->query($sql)->fetch(PDO::FETCH_ASSOC);
    if($project){
        if(isset($_POST["finish"])){
            if(isset($_POST["point"])){
                foreach ($_POST["point"] as $key => $value) {
                    $employee =$db->query("SELECT point,maas FROM employee WHERE id='{$key}'")->fetch(PDO::FETCH_ASSOC);
                    $point = ceil($employee["point"] + $value);
                    $salary = ceil($employee["maas"] + $value*0.6);
                    $update = $db->prepare("UPDATE employee SET point=:point, maas=:salary WHERE id='{$key}'");
                    $update->execute(array(
                        "point" => $point,
                        "salary" => $salary
                    ));
                }
                if($update){
                    $finish = $_POST["finishDate"];
                    $name = $project["isim"];
                    $sql = "UPDATE {$table1} SET finish_date=:finish WHERE id=:id";
                    $query = $db->prepare($sql);
                    $query->execute(array(
                        "finish" => $finish,
                        "id" => $id
                    ));
                    if($query){
                        $sql = "INSERT INTO 
                        {$table2}(isim,start_date,finish_date,puan) 
                        SELECT isim,start_date,finish_date,puan FROM {$table1} 
                        WHERE id =:id";
                        $query = $db->prepare($sql);
                        $query->execute(array(
                            "id" => $id
                        ));
                        $newId = $db->lastInsertId();
                        if($query){
                            $sql = "DELETE FROM {$table1} WHERE id='{$id}'";
                            $query = $db->prepare($sql);
                            $query->execute();
                            if($query){
                                $sql = "DELETE FROM proje_to_employee WHERE p_id=:id";
                                $query = $db->prepare($sql);
                                $query->execute(array(
                                    "id" => $id
                                ));
                                foreach ($_POST["point"] as $key => $value) {
                                    $emp = $db->query("SELECT fname,lname FROM employee WHERE id='{$key}'")->fetch(PDO::FETCH_ASSOC);
                                    $insert = $db->prepare("INSERT INTO proje_bitmis_to_employee SET p_id=?,name=?,surname=?,point=?");
                                    $insert->execute(array(
                                        $newId,$emp["fname"],$emp["lname"],$value
                                    ));
                                }
                                if($insert){
                                    successMessage('<b>'.$name.'</b> bitirildi');
                                    yonlendir(1000,$phpself);   
                                }
                            }
                        }
                    }
                }
            }
            else{
                failMessage("Çalışan olmadan proje bitmez!");
                yonlendir(1000,$phpself);
            }
        }
        else{
            echo'   
                    <form action="" method="POST">
                        <table class="tg" style="margin-bottom:10px;">
                            <tr>
                                <td class="tg-yw4l" style="line-height:30px;"><b>Proje kesin bitiş tarihi</b></td>
                                <td class="tg-yw4l"><input type="date" name="finishDate" value="'.$project["finish_date"].'" class="input-type-text editStyle" max="'.date("Y-m-d").'" min="1979-12-30" required></td>
                            </tr>';
                    $employeeIDs = $db->query("SELECT e_id FROM proje_to_employee WHERE p_id='{$id}' ORDER BY id",PDO::FETCH_ASSOC);
                    if($employeeIDs->rowCount() > 0){
                        foreach ($employeeIDs as $eid) {
                            $e_id = $eid["e_id"];
                            $employee = $db->query("SELECT * FROM employee WHERE id='$e_id'")->fetch(PDO::FETCH_ASSOC);
                            echo '
                            <tr>
                                <td class="tg-yw4l" style="line-height:30px;"><b>'.$employee["fname"].' '.$employee["lname"].'</b> değerlendirme puanı</td>
                                <td class="tg-yw4l"><input type="number" name="point['.$e_id.']" class="input-type-text editStyle" min="0" max="250" required></td>
                            </tr>';
                        }
                    }
                    else
                        echo '
                            <tr>
                                <td class="tg-yw4l" style="line-height:30px;"><b>Değerlendirilecek Kişiler</b> değerlendirme puanı</td>
                                <td class="tg-yw4l">--yok--</td>
                            </tr>';
                    
                    echo'          
                        </table>
                        <input type="submit" class="input-type-submit" name="finish" value="Bitir">
                        <a href="'.$phpself.'"><div class="cancel">Geri</div></a>
                    </form>';
        }
    }
    else{
        failMessage("Geçersiz parametre girdiniz");
        yonlendir(1000,$phpself);
    }
}
function aktifProjeleriYazdir($db,$table){
    $sql = "SELECT * FROM {$table}";
	$result = $db->query($sql, PDO::FETCH_ASSOC);
	if($result->rowCount()){
        echo $result->rowCount().' sonuç bulundu';
		echo'<table class="tg" style="margin-bottom:10px;">
                    <tr>
                        <th class="tg-yw4l">Proje Adı</th>
                        <th class="tg-yw4l">Başlangıç<br>Tarihi</th>
                        <th class="tg-yw4l">Tahmini<br>Bitiş Tarihi</th>
                        <th class="tg-yw4l">Proje<br>Puanı</th>
                        <th class="tg-yw4l islem-ap">İşlemler</th>
                    </tr>';
		foreach ($result as $row) {
			echo'
                    <tr>
                        <td class="tg-yw4l">'.$row["isim"].'</td>
                        <td class="tg-yw4l">'.$row["start_date"].'</td>
                        <td class="tg-yw4l">'.$row["finish_date"].'</td>
                        <td class="tg-yw4l">'.$row["puan"].'</td>
                        <td class="tg-yw4l">
                        <a href="'.$_SERVER["PHP_SELF"].'?detail='.$row["id"].'"><div class="process detail"><img src="images/detail.png" title="Ayrıntılar" class="imgCenter"></div></a>
						<a href="'.$_SERVER["PHP_SELF"].'?edit='.$row["id"].'"><div class="process edit"><img src="images/edit.png" title="Düzenle" class="imgCenter"></div></a>
                        <a href="'.$_SERVER["PHP_SELF"].'?delete='.$row["id"].'"><div class="process delete"><img src="images/delete.png" title="Sil" class="imgCenter"></div></a>
                        <a href="'.$_SERVER["PHP_SELF"].'?move='.$row["id"].'"><div class="process move"><img src="images/move.png" title="Bekleyenlere Taşı" class="imgCenter"></div></a>
                        <a href="'.$_SERVER["PHP_SELF"].'?finish='.$row["id"].'"><div class="process finish"><img src="images/finish.png" title="Bitir" class="imgCenter"></div></a>
						</td>
                    </tr>';
		}
        echo'
                </table>';
	}
	else {
		failMessage("Hiç bir sonuç bulunamadı");
	}
}
function pasifProjeleriYazdir($db,$table){
    $sql = "SELECT * FROM {$table}";
	$result = $db->query($sql, PDO::FETCH_ASSOC);
	if($result->rowCount()){
        echo $result->rowCount().' sonuç bulundu';
		echo'<table class="tg" style="margin-bottom:10px;">
                    <tr>
                        <th class="tg-yw4l">Proje Adı</th>
                        <th class="tg-yw4l">Başlangıç Tarihi</th>
                        <th class="tg-yw4l">Tahmini Bitiş Tarihi</th>
                        <th class="tg-yw4l">Proje Puanı</th>
                        <th class="tg-yw4l islem">İşlemler</th>
                    </tr>';
		foreach ($result as $row) {
			echo'
                    <tr>
                        <td class="tg-yw4l">'.$row["isim"].'</td>
                        <td class="tg-yw4l">'.$row["start_date"].'</td>
                        <td class="tg-yw4l">'.$row["finish_date"].'</td>
                        <td class="tg-yw4l">'.$row["puan"].'</td>
                        <td class="tg-yw4l">
                        <a href="'.$_SERVER["PHP_SELF"].'?detail='.$row["id"].'"><div class="process detail"><img src="images/detail.png" title="Ayrıntılar" class="imgCenter"></div></a>
						<a href="'.$_SERVER["PHP_SELF"].'?edit='.$row["id"].'"><div class="process edit"><img src="images/edit.png" title="Düzenle" class="imgCenter"></div></a>
                        <a href="'.$_SERVER["PHP_SELF"].'?delete='.$row["id"].'"><div class="process delete"><img src="images/delete.png" title="Sil" class="imgCenter"></div></a>
                        <a href="'.$_SERVER["PHP_SELF"].'?move='.$row["id"].'"><div class="process move"><img src="images/move.png" title="Aktiflere Taşı" class="imgCenter"></div></a>
						</td>
                    </tr>';
		}
        echo'
                </table>';
	}
	else {
		failMessage("Hiç bir sonuç bulunamadı");
	}
}
function bitmisProjeleriYazdir($db,$table){
    $sql = "SELECT * FROM {$table}";
	$result = $db->query($sql, PDO::FETCH_ASSOC);
	if($result->rowCount()){
        echo $result->rowCount().' sonuç bulundu';
		echo'<table class="tg" style="margin-bottom:10px;">
                    <tr>
                        <th class="tg-yw4l">Proje Adı</th>
                        <th class="tg-yw4l">Başlangıç Tarihi</th>
                        <th class="tg-yw4l">Bitiş Tarihi</th>
                        <th class="tg-yw4l">Proje Puanı</th>
                        <th class="tg-yw4l">Projede Çalışmış Kişiler</th>
                        <th class="tg-yw4l islem-f">İşlemler</th>
                    </tr>';
		foreach ($result as $row) {
			echo'
                    <tr>
                        <td class="tg-yw4l">'.$row["isim"].'</td>
                        <td class="tg-yw4l">'.$row["start_date"].'</td>
                        <td class="tg-yw4l">'.$row["finish_date"].'</td>
                        <td class="tg-yw4l">'.$row["puan"].'</td>
                        <td class="tg-yw4l">
                        <select style="width:160px">';
                        $id = $row["id"];
                        $employee = $db->query("SELECT * FROM {$table}_to_employee WHERE p_id='{$id}'",PDO::FETCH_ASSOC);
                        foreach ($employee as $emp) {
                            echo '<option>'.$emp["name"].' '.$emp["surname"].': '.$emp["point"].'</option>';
                        }
                        echo'
                        </select>
                        </td>
                        <td class="tg-yw4l">
                        <a href="'.$_SERVER["PHP_SELF"].'?delete='.$row["id"].'"><div class="process delete"><img src="images/delete.png" title="Sil" class="imgCenter"></div></a>
						</td>
                    </tr>';
		}
        echo'
                </table>';
	}
	else {
		failMessage("Hiç bir sonuç bulunamadı");
	}
}
function ayrintiliProje($db,$table){
	$id = $_GET["detail"];
    $phpself = $_SERVER['PHP_SELF'];
	$sql = "SELECT * FROM {$table} WHERE id = '{$id}'";
    $query = $db->query($sql)->fetch(PDO::FETCH_ASSOC);
    if($query){
        echo '
            <table class="tg" style="margin-bottom:10px;">
                <tr>
                    <td class="tg-yw4l"><b>Adı</b></td>
                    <td class="tg-yw4l">'.$query["isim"].'</td>
                </tr>
                <tr>
                    <td class="tg-yw4l"><b>Başlangıç Tarihi</b></td>
                    <td class="tg-yw4l">'.$query["start_date"].'</td>
                </tr>
                <tr>
                    <td class="tg-yw4l"><b>Tahmini Bitiş Tarihi</b></td>
                    <td class="tg-yw4l">'.$query["start_date"].'</td>
                </tr>
                <tr>
                    <td class="tg-yw4l"><b>Proje Puanı</b></td>
                    <td class="tg-yw4l">'.$query["puan"].'</td>
                </tr>
                <tr>
                    <td class="tg-yw4l"><b>Projede çalışanlar</b></td>
                    <td class="tg-yw4l">';
                    $employeeIDs = $db->query("SELECT e_id FROM proje_to_employee WHERE p_id='{$id}' ORDER BY id",PDO::FETCH_ASSOC);
                    if($employeeIDs->rowCount() > 0){
                        foreach ($employeeIDs as $eid) {
                            $e_id = $eid["e_id"];
                            $employeeQ = $db->query("SELECT fname,lname FROM employee WHERE id='$e_id'")->fetch(PDO::FETCH_ASSOC);
                            echo $employeeQ["fname"].' '.$employeeQ["lname"].'<br>';
                        }
                    }
                    else
                        echo '--yok--';
                    
                    echo'
                    </td>
                </tr>
            </table>
            <a href="'.$phpself.'?edit='.$query["id"].'"><div class="input-type-submit" style="margin-right:10px" >Düzenle</div></a>
            <a href="'.$phpself.'"><div class="cancel">Geri</div></a>
        </form>
        ';
        
    }
    else{
        failMessage("Geçersiz parametre girdiniz");
        yonlendir(1000,$phpself);
    }
}
function dilEkle($db,$table){ 
    $phpself = $_SERVER["PHP_SELF"];
    if(isset($_POST["add"])){
        $name = $_POST["name"];
        $sql = "INSERT INTO {$table} SET 
        value = ?";
        $query = $db->prepare($sql);
        $insert = $query->execute(array(
            $name
        ));
        $_SESSION['lang_add'] = $name;
        if(isset($_SESSION['lang_add'])){
            header('Location: '.$_SERVER['REQUEST_URI']);
            exit();
        }
    }
    if(isset($_SESSION['lang_add'])){
        successMessage('<b>'.$_SESSION['lang_add'].'</b> eklendi');
        unset($_SESSION['lang_add']);
    }
    echo '
    <form action="" method="POST">
        <table class="tg" style="margin-bottom:10px;">
            <tr>
                <td class="tg-yw4l">Yabancı Dil Adı</td>
                <td class="tg-yw4l"><input class="input-type-text editStyle" type="text" name="name" required></td>
            </tr>
        </table>
        <input type="submit" class="input-type-submit" name="add" value="Ekle">
        <a href="'.$phpself.'"><div class="cancel">Geri</div></a>
    </form>
    ';
}
function dilDuzenle($db,$table){
    $id = $_GET["edit"];
    $phpself = $_SERVER['PHP_SELF'];
    if(isset($_POST['edit'])){
        $name = $_POST["name"];
        $sql = "UPDATE {$table} SET value=:name WHERE id=:id";
        $query = $db->prepare($sql);
        $update = $query->execute(array(
            "name" => $name,
            "id" => $id
        ));
        if($update){
            $_SESSION['lang_add'] = $name;
            if(isset($_SESSION['lang_add'])){
                header('Location: '.$_SERVER['REQUEST_URI']);
                exit();
            }
        }
    }
    $sql = "SELECT * FROM {$table} WHERE id = {$id}";
    $query = $db->query($sql)->fetch(PDO::FETCH_ASSOC);
    if($query){
        if(isset($_SESSION['lang_add'])){
            successMessage('<b>'.$_SESSION['lang_add'].'</b> düzenlendi.');
            unset($_SESSION['lang_add']);
        }
        echo '
        <form action="" method="POST">
            <table class="tg" style="margin-bottom:10px;">
                <tr>
                    <td class="tg-yw4l">Yabancı Dil Adı</td>
                    <td class="tg-yw4l"><input class="input-type-text editStyle" type="text" name="name" value="'.$query["value"].'" required></td>
                </tr>
            </table>
            <input type="submit" class="input-type-submit" name="edit" value="Düzenle">
            <a href="'.$phpself.'"><div class="cancel">Geri</div></a>
        </form>
        ';
    }
    else{
        failMessage("Geçersiz parametre girdiniz");
        yonlendir(1000,$phpself);
    }
}
function dilSil($db,$table){
    $phpself = $_SERVER['PHP_SELF'];
    $id = $_GET["delete"];
    $sql = "SELECT * FROM {$table} WHERE id = '{$id}'";
    $lang = $db->query($sql)->fetch(PDO::FETCH_ASSOC);
    $name = $lang["value"];
    if($lang){
        $sql = "DELETE FROM {$table} WHERE id=:id";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);   
        $stmt->execute();
        successMessage('<b>'.$name.'</b> silindi');
    }
    else
        failMessage("Geçersiz parametre girdiniz");
        
    yonlendir(1000,$phpself);
}
function dilleriYazdir($db,$table){
    $phpself = $_SERVER['PHP_SELF'];
    $sql = "SELECT * FROM {$table} ORDER BY id";
    $result = $db->query($sql,PDO::FETCH_ASSOC);
    if($result->rowCount() > 0){
        echo $result->rowCount().' sonuç bulundu';
        echo'<table class="tg" style="margin-bottom:10px;">
                    <tr>
                        <th class="tg-yw4l">Yabancı Dil Adı</th>
                        <th class="tg-yw4l islem" style="width:66px;">İşlemler</th>
                    </tr>';
		foreach ($result as $row) {
			echo'
                    <tr>
                        <td class="tg-yw4l">'.$row["value"].'</td>
                        <td class="tg-yw4l">
						<a href="'.$_SERVER["PHP_SELF"].'?edit='.$row["id"].'"><div class="process edit"><img src="images/edit.png" title="Düzenle" class="imgCenter"></div></a>
                        <a href="'.$_SERVER["PHP_SELF"].'?delete='.$row["id"].'"><div class="process delete"><img src="images/delete.png" title="Sil" class="imgCenter"></div></a>
						</td>
                    </tr>';
		}
        echo'
                </table>';
	}
    else{
        failMessage("Hiç bir sonuç bulunamadı");
    }
}
function yetenekEkle($db,$table){ 
    $phpself = $_SERVER["PHP_SELF"];
    if(isset($_POST["add"])){
        $name = $_POST["name"];
        $sql = "INSERT INTO {$table} SET 
        value = ?";
        $query = $db->prepare($sql);
        $insert = $query->execute(array(
            $name
        ));
        $_SESSION['skill_add'] = $name;
        if(isset($_SESSION['skill_add'])){
            header('Location: '.$_SERVER['REQUEST_URI']);
            exit();
        }
    }
    if(isset($_SESSION['skill_add'])){
        successMessage('<b>'.$_SESSION['skill_add'].'</b> eklendi');
        unset($_SESSION['skill_add']);
    }
    echo '
    <form action="" method="POST">
        <table class="tg" style="margin-bottom:10px;">
            <tr>
                <td class="tg-yw4l">Yetenek Adı</td>
                <td class="tg-yw4l"><input class="input-type-text editStyle" type="text" name="name" required></td>
            </tr>
        </table>
        <input type="submit" class="input-type-submit" name="add" value="Ekle">
        <a href="'.$phpself.'"><div class="cancel">Geri</div></a>
    </form>
    ';
}
function yetenekDuzenle($db,$table){
    $id = $_GET["edit"];
    $phpself = $_SERVER['PHP_SELF'];
    if(isset($_POST['edit'])){
        $name = $_POST["name"];
        $sql = "UPDATE {$table} SET value=:name WHERE id=:id";
        $query = $db->prepare($sql);
        $update = $query->execute(array(
            "name" => $name,
            "id" => $id
        ));
        if($update){
            $_SESSION['skill_add'] = $name;
            if(isset($_SESSION['skill_add'])){
                header('Location: '.$_SERVER['REQUEST_URI']);
                exit();
            }
        }
    }
    $sql = "SELECT * FROM {$table} WHERE id = {$id}";
    $query = $db->query($sql)->fetch(PDO::FETCH_ASSOC);
    if($query){
        if(isset($_SESSION['skill_add'])){
            successMessage('<b>'.$_SESSION['skill_add'].'</b> düzenlendi.');
            unset($_SESSION['skill_add']);
        }
        echo '
        <form action="" method="POST">
            <table class="tg" style="margin-bottom:10px;">
                <tr>
                    <td class="tg-yw4l">Yetenek Adı</td>
                    <td class="tg-yw4l"><input class="input-type-text editStyle" type="text" name="name" value="'.$query["value"].'" required></td>
                </tr>
            </table>
            <input type="submit" class="input-type-submit" name="edit" value="Düzenle">
            <a href="'.$phpself.'"><div class="cancel">Geri</div></a>
        </form>
        ';
    }
    else{
        failMessage("Geçersiz parametre girdiniz");
        yonlendir(1000,$phpself);
    }
}
function yetenekSil($db,$table){
    $phpself = $_SERVER['PHP_SELF'];
    $id = $_GET["delete"];
    $sql = "SELECT * FROM {$table} WHERE id = '{$id}'";
    $skill = $db->query($sql)->fetch(PDO::FETCH_ASSOC);
    $name = $skill["value"];
    if($skill){
        $sql = "DELETE FROM {$table} WHERE id=:id";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);   
        $stmt->execute();
        successMessage('<b>'.$name.'</b> silindi');
    }
    else
        failMessage("Geçersiz parametre girdiniz");
        
    yonlendir(1000,$phpself);
}
function yetenekleriYazdir($db,$table){
    $phpself = $_SERVER['PHP_SELF'];
    $sql = "SELECT * FROM {$table} ORDER BY id";
    $result = $db->query($sql,PDO::FETCH_ASSOC);
    if($result->rowCount() > 0){
        echo $result->rowCount().' sonuç bulundu';
        echo'<table class="tg" style="margin-bottom:10px;">
                    <tr>
                        <th class="tg-yw4l">Yetenek Adı</th>
                        <th class="tg-yw4l islem" style="width:66px;">İşlemler</th>
                    </tr>';
		foreach ($result as $row) {
			echo'
                    <tr>
                        <td class="tg-yw4l">'.$row["value"].'</td>
                        <td class="tg-yw4l">
						<a href="'.$_SERVER["PHP_SELF"].'?edit='.$row["id"].'"><div class="process edit"><img src="images/edit.png" title="Düzenle" class="imgCenter"></div></a>
                        <a href="'.$_SERVER["PHP_SELF"].'?delete='.$row["id"].'"><div class="process delete"><img src="images/delete.png" title="Sil" class="imgCenter"></div></a>
						</td>
                    </tr>';
		}
        echo'
                </table>';
	}
    else{
        failMessage("Hiç bir sonuç bulunamadı");
    }
}
?>