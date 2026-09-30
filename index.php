<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contato por e-mail</title>
    <link rel="stylesheet" href="estilo.css">
</head>

<body>
    <main>
        <h1>Contato</h1>
        <br>
        <form action="enviar.php" method="post">
            <label for="fnome">Nome: </label>
            <input type="text" name="fnome"><br>
            <label for="ffone">Telefone: </label>
            <input type="tel" name="ffone"><br>
            <label for="femail">e-mail: </label>
            <input type="email" name="femail"><br>
            <label for="fmsg">Mensagem:</label>
            <textarea name="fmsg" placeholder="Descreva sua mensagem..."></textarea>
            <br>
            <br>
            <button type="submit">Enviar</button>
        </form>
    </main>
</body>

</html>