<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visualizando post</title>
    <link rel="stylesheet" href=".\css\common.css">
    <link rel="stylesheet" href=".\css\view_post.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>
<body>
<div id="body">
        <div id = "header">
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

    <div id="main">
        <div class="upvote big"></div>
        <div class="downvote big"></div>
        <h1 class="title">Pesquisadora encontra 'peixe monstro' de 5,4 m nos EUA:</h1>
        <div id="content">
            <p>Instrutora achou carcaça de peixe remo enquanto praticava mergulho. Criatura é conhecida por habitar águas muito profundas.</p>
            <p>Uma instrutora de ciência marinha levou um susto ao avistar no mar em Los Angeles, na Califórnia (EUA), um peixe remo (também conhecido como regaleco) com mais de 5,4 m de comprimento.</p>
            <p>Jasmine Santana, do Instituto Marinho da Ilha de Catalina (em tradução livre) precisou da ajuda de mais 15 pessoas para conseguir arrastar o peixe para a costa, e a criatura está sendo taxada como “a descoberta de toda uma vida” pelos funcionários do instituto.</p>
            <p>O peixe, que normalmente vive a mais de 900 m de profundidade, e faz parte de um grupo de bichos que raramente são estudados, morreu de causas naturais. Amostras de tecido, fotos e vídeos do regaleco foram enviados para biólogos da Universidade da Califórnia. O animal será enterrado na areia até se decompor, para que seu esqueleto seja remontado.</p>
            <p>A instrutora contou que estava mergulhando quando encontrou o peixe a cerca de 9 m de profundidade. “Eu tenho que arrastar isso ou ninguém vai acreditar em mim”, afirmou Santana, pouco antes de receber a ajuda dos colegas para levar a carcaça à superfície.</p>
        </div>
        <div id="div_img"><img id="img" src="./images/v5_253.png"></div>
        <div id="div_op">Postado por: <?php echo "$nick";?> <?php echo "<img src = '$pfp' height = '45px' width = '45px' name='pfp'>"?><div id="desc"><p><?php echo "Level - $level</h1>";?></p><?php if($ua[0]["is_adm"]==1){ echo "<p> Admin </p>";}?><p>Criador</p></div></div>
        <br style="clear: both;">
        <hr class="separator">
        <h4 class="title">Comentários</h4>
        <div id="comments">
            <div id="comment" class="d_margin">
                <div class="upvote small"></div>
                <div class="downvote small"></div>
                <h5>Postado por: Lucas Mastro</h5>
                <h6>Nível: 100</h6>
                <span>Comentario genérico Comentario genérico Comentario genérico Cometario genérico </span>
            </div>
            <div id="comment" class="d_margin">
                <div class="upvote small"></div>
                <div class="downvote small"></div>
                <h5>Postado por: Lucas Mastro</h5>
                <h6>Nível: 100</h6>
                <span>Comentario genérico Comentario genérico Comentario genérico Cometario genérico </span>
            </div>
            <div id="comment">
                <div class="upvote small"></div>
                <div class="downvote small"></div>
                <h5>Postado por: Lucas Mastro</h5>
                <h6>Nível: 100</h6>
                <span>Comentario genérico Comentario genérico Comentario genérico Cometario genérico </span>
            </div>
        </div>
    </div>
</body>
</html>