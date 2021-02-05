<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Create a Post</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='.\css\PostCSS.css'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>
<body>

    <div id="body">
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

        <div id="preview">
            <h1 style="margin: auto; color: lightgray">
                Publicar:
            </h1>
            <select type ="radio" id = "subject2"> 
                <option value = "" selected> 
                    Física 
                </option>
                <option value = "" selected> 
                    Biologia 
                </option>
                <option value = "" selected> 
                    Matemática 
                </option>
            </select>
            <br>
            <form method="POST">
                <textarea id = "txt" name="titulo" placeholder="Inserir título" rows="2" cols="-2"></textarea>
                <br>
                <textarea id = "txt" name="DOI" placeholder="Inserir DOI" rows="1" cols="-2"></textarea>
                <br>
                <textarea id = "txt" name="conteudo" placeholder="Inserir texto" rows="15" cols="-2"></textarea>
                <br>
                <textarea id = "txt" name="autores" placeholder="Inserir autores" rows="2" cols="-2"></textarea>

            <br>
           
                <div id = "publicar">
                    <button class="hide2" type="submit">
                    <h1 style="color: #000000; font-size: 24px; left: 25px; position: absolute;"> 
                    Publicar
                    </h1>
                    </button>
                </div>
            </form>
                <div id = "enviar">
                    <button class="hide2">
                    <h1 style="color: #767676; font-size: 19px; top: 4px; position: absolute;"> 
                    ↑ Subir arquivo
                    </h1>
                    </button>
                </div>
                <br>
                <br>
            
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
    </div>
</body>
<?php
    include "./Classes/Artigo.php";
    if(isset($_GET['pub'])){
        echo "<script language='javascript'>alert('Publicado com sucesso!')</script>";
    }
    if(isset($_GET['msg']) && isset($_GET['email']) && isset($_GET['senha'])){
        $ua = Registrado::PegarUsuario($_GET['email'], $_GET['senha']);
        $id_user=$ua[0]["id_user"];
        if(isset($_POST["titulo"]) && isset($_POST["conteudo"]) && isset($_POST["autores"]) && isset($_POST["DOI"])) {
            $titulo = $_POST["titulo"];
            $conteudo = $_POST["conteudo"];
            $autores = $_POST["autores"];
            $DOI = $_POST["DOI"];
            $datapublicacao = date("Y-m-d");
            $id = Artigo::getLastId();

            if($titulo!="" && $conteudo!="" && $autores!="" && $DOI!=""){
                    $resultado = Artigo::cadastrarArtigo($id_user, $id, $titulo, $DOI, $conteudo, $datapublicacao);
                    if($resultado) {
                        header("Location: ./Skeleton - Post.php?pub=ok&?msg=ok&email='.$email.'&'.'senha='.$senha");
                    } else {
                        echo "<p>Ocorreu um erro ao publicar o artigo</p>";
                    }
                }
            }
        }
    ?> 
</html>