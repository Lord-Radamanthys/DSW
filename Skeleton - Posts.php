<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Posts</title>
    <link rel="stylesheet" href=".\css\posts.css">
    <link rel="stylesheet" href=".\css\common.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>
<body>
    <header>
        <?php
            include "./Classes/Registrado.php";
            if(isset($_GET['msg']) && isset($_GET['email']) && isset($_GET['senha'])){
                    $ua = Registrado::PegarUsuario($_GET['email'], $_GET['senha']);
                    $nick=$ua[0]["nickname"];
                    $pfp=$ua[0]["prof_pic"];
                    $level=$ua[0]["nivel"];
            }
            else{
                $nick="Usuário Anônimo";
                $level=0;
                $pfp="";
            }
        ?>
        <img src = "./images/hourglass.png" style="position: absolute; top: 5px;">
        <input type="search" placeholder="Digite para buscar um artigo ou um post" id = "searcheng">
        <button onclick="submit"><img src = "./images/magnify.png" style="position: absolute; left: 600px; top: 5px;"></button>
        <select type ="radio" id = "subject"> 
            <option value = "" selected> 
                Física 
            </option>
        </select>
        <div id = "pp">
            <?php echo "<img src = '$pfp' id='pfp' name='pfp'>"?>
            <?php echo "<h1 id='username' name='nick'>$nick</h1>"?> 
            <?php echo "<h1 id='level' name='level'>Level - $level</h1>"?>
        </div>
        <button>
        <div id = "login">
            <h1 style="color: #767676; font-size: 24px; left: 20px; position: absolute;">Deslogar</h1>
        </div>
        </button>
    </header>

    <div id = "sidemenu">
        <button class="hide"><img style="margin-left: 15px;" src="./images/pen.png"></img></button>
        <h1 id="option">
            Meus posts
        </h1>
        <button class="hide"><img src="./images/book.png"></img></button>
        <h1 id="option">
            Artigos Salvos
        </h1>
        <button  class="hide"><img style="margin-left: 15px;" src="./images/arrow.png"></button>
        <h1 id="option">
            Populares
        </h1>
    </div>

    <div id="main">
        <div id="areas">
            <div class="divs_areas">ÁREA DA CIÊNCIA 1 <img src="./images/small_arrow.jpg" alt="small_arrow"></div>
            <div class="divs_areas">ÁREA DA CIÊNCIA 2 <img src="./images/small_arrow.jpg" alt="small_arrow"></div>
            <div class="divs_areas">ÁREA DA CIÊNCIA 3 <img src="./images/small_arrow.jpg" alt="small_arrow"></div>
            <div class="divs_areas">ÁREA DA CIÊNCIA 4 <img src="./images/small_arrow.jpg" alt="small_arrow"></div>
            <div class="divs_areas">ÁREA DA CIÊNCIA 5 <img src="./images/small_arrow.jpg" alt="small_arrow"></div>
            <div class="divs_areas">ÁREA DA CIÊNCIA 6 <img src="./images/small_arrow.jpg" alt="small_arrow"></div>
            <div class="divs_areas">ÁREA DA CIÊNCIA 7 <img src="./images/small_arrow.jpg" alt="small_arrow"></div>
        </div>
        <h3 id="titulo_area">Área da Ciência n</h3>
        <div id="posts">
            <div class="post r_margin">
                <div class="post_top">
                    <span>Postado por:</span>
                    <span class="date">Data:</span>
                </div>
                <hr class="separator">
                <div class="post_title">Título</div>
                <hr class="separator">
                <div class="post_bottom">
                    <span class="post_number">#1</span>
                    <span>n visualizações</span>
                    <span>n ampulhetas</span>
                </div>
            </div>
            <div class="post">
                <span>Postado por:</span>
                <span class="date">Data:</span>
                <hr class="separator">
                <div class="post_title">Título</div>
                <hr class="separator">
                <div class="post_bottom">
                    <span class="post_number">#2</span>
                    <span>n visualizações</span>
                    <span>n ampulhetas</span>
                </div>
            </div>
            <br>
            <div class="post r_margin up_margin">
                <div class="post_top">
                    <span>Postado por:</span>
                    <span class="date">Data:</span>
                </div>
                <hr class="separator">
                <div class="post_title">Título</div>
                <hr class="separator">
                <div class="post_bottom">
                    <span class="post_number">#3</span>
                    <span>n visualizações</span>
                    <span>n ampulhetas</span>
                </div>
            </div>
            <div class="post up_margin">
                <div class="post_top">
                    <span>Postado por:</span>
                    <span class="date">Data:</span>
                </div>
                <hr class="separator">
                <div class="post_title">Título</div>
                <hr class="separator">
                <div class="post_bottom">
                    <span class="post_number">#4</span>
                    <span>n visualizações</span>
                    <span>n ampulhetas</span>
                </div>
            </div>
        </div>
    </div>
</body>
</html>