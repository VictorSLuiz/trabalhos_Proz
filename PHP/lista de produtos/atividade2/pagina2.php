<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>pagina de redirecionamento</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container"> 
        <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $aluno = $_POST['aluno'];
                $idade = $_POST['idade'];
                $turma = $_POST['turma'];
                $nota1 = $_POST['nota1'];
                $nota2 = $_POST['nota2'];
            }

            $media = ($nota1+$nota2)/2;

            echo "<h3>Dados do Aluno</h3>";
            // Use <p> ou apenas a estrutura sem <br> para melhor visualização
            echo "<p>Nome: <strong>$aluno</strong></p>"; 
            echo "<p>Idade: $idade</p>";
            echo "<p>Turma: $turma</p>";
            echo "<p>Média: <strong>$media</strong></p>";
            
            $status = ($media >= 6) ? 
                        "<span class='aprovado'>Aprovado</span>" : 
                        "<span class='reprovado'>Reprovado</span>";

            echo "<p>Status: $status</p>";

            // Separador visual
            echo "<hr>"; 

            if (isset($_GET['campanha']) && isset($_GET['versao'])){
                $campanha = $_GET['campanha'];
                $versao = $_GET['versao'];
            }

            echo "<p>Campanha: $campanha</p>";
            echo "<p>Versão: $versao</p>";
        
        ?>
    </div> </body>
</html>