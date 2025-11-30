<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> - CADASTRO DE ALUNOS - </title>

    <link rel="stylesheet" href="style.css">
</head>

<body>
    <form action="pagina2.php?campanha=voltaaulas&versao=1.0" method="post">
        <h3>Cadastro de Aluno</h3> 
        <label>nome do aluno:</label><br>
        <input type="text" name="aluno" required><br>

        <label> Idade:</label><br>
        <input type="text" name="idade" required><br>

        <label>Turma do aluno</label><br>
        <input type="number" name="turma" required><br>

        <label> digite a 1° nota do aluno</label><br>
        <input type="number" name="nota1" required><br>

        <label> digite a 2° nota do aluno</label><br>
        <input type="number" name="nota2" required><br>

        <input type="submit" value="Enviar">
    </form>
</body>
</html>