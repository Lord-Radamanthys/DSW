<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Home Page</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='.\css\homepage.css'>
    <link rel="stylesheet" href="./css/common.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>

<body>
    <div id="body">
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
                    $nick="Usuario Anonimo";
                    $pfp="";
                    $level=0;
                }
            ?>
            <img src = "./images/hourglass.png" style="position: absolute; top: 5px;">
            <input type="search" placeholder="Digite para buscar um artigo ou um post" id = "searcheng">
            <button onclick="submit"><img src = "./images/magnify.png" style="position: absolute; left: 600px; top: 5px;"></button>
            <select type ="radio" id = "subject"> 
                <option value = "" selected>
                    Escolha uma opção:
                </option>

                <option>
                    Física
                </option>

                <option> 
                    Química
                </option>

                <option>
                    Matemática
                </option>

                <option> 
                    Biologia
                </option>
            </select>
            <div id = "pp">
                <?php echo "<img src = '$pfp' height = '45px' width = '45px' name='pfp'>"?>
                <?php echo "<h1 id='username' name='nick'>$nick</h1>"?> 
                <?php echo "<h1 id='level' name='level'>Level - $level</h1>"?>
            </div>
            <button>
            <div id = "login">
                    <h1 style="color: #767676; font-size: 24px; left: 20px; position: absolute;"> 
                    Deslogar
                    </h1>
            </div>
            </button>
        </header>

        <div id="preview">
            <h1 class="title">
                Cientistas descobrem causa do sumiço de abelhas
                <button id="readmore">
                    Ler mais
                </button>
                <div class="upvote"></div><br>
                <div class="downvote"></div>
            </h1>
            <h1 class="content">
                Não é aquecimento global nem Wi-Fi: combinação de pesticidas e fungicidas está contaminando o pólen coletado pelas abelhas
            </h1>
            <h1 id="op">
                Postado por: Bielon Musk
            </h1>
        </div>
        <div id="preview">
            <h1 class="title">
                Empresa britânica vende planta que dá batatas e tomates
                <button id="readmore">
                    Ler mais
                </button>
                <div class="upvote"></div><br>
                <div class="downvote"></div>
            </h1>
            <h1 class="content">
                Os tomates crescem sobre a terra e as batatas, nas raízes. Produto é resultado de enxerto, já que cruzamento não é possível.
                
            </h1>
            <h1 id="op">
                Postado por: Guilherme Martirio
            </h1>
        </div>
        <div id="preview">
            <h1 class="title">
                Pesquisadora encontra 'peixe monstro' de 5,4 m nos EUA
                <button id="readmore">
                    Ler mais
                </button>
                <div class="upvote"></div><br>
                <div class="downvote"></div>
            </h1>
            <h1 class="content"><img src="./images/v5_253.png" style="float: right; width: 150px; height: 110px; border-radius: 10px;">
                Uma instrutora de ciência marinha levou um susto ao avistar no mar em Los Angeles, na Califórnia (EUA), um peixe remo (também conhecido como regaleco) com mais de 5,4 m de comprimento. 
                Jasmine Santana, do Instituto Marinho da Ilha de Catalina (em tradução livre) precisou da ajuda de mais 15 pessoas para conseguir arrastar o peixe para a costa, e a criatura está sendo taxada como “a descoberta de toda uma vida” pelos funcionários do instituto. O peixe, que normalmente vive a mais de 900 m de profundidade, e faz parte de um grupo de bichos que raramente são estudados, morreu de causas naturais. 
                Amostras de tecido...
            </h1>
            <h1 id="op">
                Postado por: Lucas Mastro
            </h1>
        </div>
        <div id="preview">
            <h1 class="title">
                África pode perder 20% de seus elefantes em 10 anos, diz relatório
                <button id="readmore">
                    Ler mais
                </button>
                <div class="upvote"></div><br>
                <div class="downvote"></div>
            </h1>
            <h1 class="content">
                Mortes ocorrerão se ritmo atual da caça furtiva continuar no continente. Organizações ambientais estão reunidas em Botsuana esta semana.
            </h1>
            <h1 id="op">
                Postado por: Renan Venceu
            </h1>
        </div>

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
        
        <div id = "ordering">
            <h1 id = "written">
                Organizar por:
            </h1><br><br>
            <input type="radio"> Votos positivos<br>
            <input type="radio"> Data<br> 
            <input type="radio"> Visualização<br>
            <input type="radio"> Avaliação<br>
        </div>
    </div>
</body>
<?php
    if(isset($_GET['msg']) && isset($_GET['email']) && isset($_GET['senha'])){
        $senha=$_GET['senha'];
        $email=$_GET['email'];
        echo "<script type='text/javascript'>
                document.getElementById('redirposts').onclick = function () {
                    location.href = './Skeleton - View_post.php?msg=ok&email=$email&senha=$senha'
                };
            </script>";   
    }      
    ?>
</html>