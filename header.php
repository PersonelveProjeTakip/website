<link rel="stylesheet" href="bootstrap.min.css">
<link rel="stylesheet" href="styles.css">
<link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet" type="text/css">
<script src="jquery.min.js"></script>
<script src="bootstrap.min.js"></script>
<script src="typeahead.min.js"></script>
<link rel="shortcut icon" href="/images/favicon.ico" />
<script>
    $(document).ready(function(){
        $('input.typeahead').typeahead({
            name: 'typeahead',
            remote:'search.php?key=%QUERY',
            limit : 10
        });
    });
</script>
</head>
<body>
    <main>
        <nav>
            <ul>
                <li>
                    <div class="logo"><img src="images/logo.gif" /></div>
                </li>
                <li>
                    <a href="index.php">
                        <div><img src="images/icon_home.gif" /></div>
                        <label>Anasayfa</label>
                    </a>
                </li>
                <li class="has-sub">
                    <a href="#">
                        <div><img src="images/icon_personal.gif" /></div>
                        <label>Personeller</label>
                    </a>
                    <div id="sub-menu">
                        <div class="item"><a href="employees.php">Aktif Çalışanlar</a></div>
                        <div class="item"><a href="employeesPool.php">Çalışan Havuzu</a></div>
                    </div>
                </li>
                <li class="has-sub">
                    <a href="#">
                        <div><img src="images/icon_project.gif" /></div>
                        <label>Projeler</label>
                    </a>
                    <div id="sub-menu">
                        <div class="item"><a href="projects.php">Aktif Projeler</a></div>
                        <div class="item"><a href="projectsFinish.php">Bitmiş Projeler</a></div>
                        <div class="item"><a href="projectsPool.php">Bekleyen Proje Havuzu</a></div>
                        
                    </div>
                </li>
                <li class="has-sub">
                    <a href="#">
                        <div><img src="images/icon_setting.gif" /></div>
                        <label>Ayarlar</label>
                    </a>
                    <div id="sub-menu">
                        <div class="item"><a href="settingsLanguages.php">Yabancı Diller</a></div>
                        <div class="item"><a href="settingsSkills.php">Yetenekler</a></div>
                    </div>
                </li>
            </ul>
        </nav>
        <header>
            <div id="search">
                <form>
                    <input type="text" class="typeahead tt-query" autocomplete="off" spellcheck="false" placeholder="Ara">
                </form>
            </div>
            <div id="member">
                <div class="name">Hoşgeldiniz <?php echo $user; ?></div>
            </div>
            <form action="login.php?logout" method="POST">
                <input type="submit" name="logout" value="ÇIKIŞ YAP" class="logout">
            </form>
        </header>
        