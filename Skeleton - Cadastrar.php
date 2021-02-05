<?php
    include "./Classes/Registrado.php";
    if(isset($_POST["nickname"]) && isset($_POST["email"]) && isset($_POST["senha"]) && isset($_POST["ssenha"])) {
        $nickname = $_POST["nickname"];
        $email = $_POST["email"];
        $senha = $_POST["senha"];
        $conf = $_POST["ssenha"];
        $data_cadastro = date("Y-m-d");
        $id = Registrado::getLastId();
        if($nickname!="" && $email!="" && $senha!="" && $conf!=""){
            if($conf==$senha){
                $resultado = Registrado::cadastrarUsuario($id, $data_cadastro, $email, $nickname, $senha);
                if($resultado) {
                    $ua = Registrado::PegarUsuario($email, $senha);
                    $nick=$ua[0]["nickname"];
                    $pfp=$ua[0]["prof_pic"];
                    $level=$ua[0]["nivel"];
                    header('Location: ./Skeleton - Home.php?msg=ok&email='.$email.'&'.'senha='.$senha);                            
                    if(isset($_GET['msg'])){
                        echo "<script language='javascript'>alert('Logado com sucesso!')</script>";
                    }
                } else {
                    echo "<p>Ocorreu um erro ao cadastrar o usuário</p>";
                }
            }
            else{
                echo "<p style='padding-top: 200px; padding-left: 100px; color: lightgray; font-size: small;'> Senhas não compatíveis </p>";
            }
            
        }
    }
?>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Cadastro</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='.\css\CadastroCSS.css'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>
<body>
    <div id="body">
        <div id = "header">
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
                <img src = "./images/pp.png" height = "45px" width = "45px">
                <h1 id="username">Usuário Anônimo</h1> 
                <h1 id="level">Level - 0</h1>
            </div>
            <button>
            <div id = "login">
                    <h1 style="color: #767676; font-size: 24px; left: 20px; position: absolute; font-style:centered;"> 
                    Fazer login
                    </h1>
            </div>
            </button>
        </div>

        <div id="preview">
            <h1 style="padding-left: 200px; color: lightgray">
                Entrar:
            </h1>
            <form method="POST">
            <p>Nickname: </p><input id="loguser" type="text" name="nickname">
            <br>
            <p>E-mail: </p><input id="loguser" type="text" name="email">
            <br>
            <p>Senha: </p><input id="loguser" type="password" name="senha">
            <br>
            <p>Confirmar Senha: </p><input id="loguser" type="password" name="ssenha">
            <br>
            <button id="buts" style = "position: relative; margin-left: 200px; width: 25%; height: 50px;" type="submit">Cadastrar</button>
        </form>
        
        </div>
    </div>
</body>
</html>