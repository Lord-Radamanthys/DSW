<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Login</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='.\css\ProfileCSS.css'>
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
                Perfil:
            </h1>
            <img id="pfp" src="./images/pp.png">
            <input id = "loguser" type="text" name="nome" placeholder="Nome: nome completo"> 
            <br>
            <input id = "loguser" type="text" name="e-mail" placeholder="E-mail: lucas123@pera.com"> 
            <br>
            <input id = "loguser" type="data" name="datanasc" placeholder="Data de Nascimento: dd/mm/yyyy">
            <br>
            <textarea id = "txt" name="conteudo" placeholder="Descrição: Sobre mim" rows="5" cols="-2"></textarea>
            
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
</html>