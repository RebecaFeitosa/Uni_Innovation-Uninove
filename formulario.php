<?php
$exibirFormulario = true; // Defina a variável $exibirFormulario como true no início do seu código
$mensagem = '';

if (isset($_POST['submit'])) {
    include_once('config.php');

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $mensagem = $_POST['mensagem'];

    $result = mysqli_query($conexao, "INSERT INTO usuario (nome, email, mensagem) VALUES ('$nome', '$email', '$mensagem')");

    if ($result) {
        $exibirFormulario = false;
        $mensagem = 'Seus dados foram enviados com sucesso. Em breve entraremos em contato.';
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Contate-nos</title>
    <style>
        .mensagem-sucesso {
            font-size: 24px;
        }

        .work {
            width: 100%;
            height: 100vh;
            background: rgba(219, 219, 219, 0.9);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        fieldset {
            border: 3px solid dodgerblue;
        }

        .workus {
            width: 60%;
            height: 30rem;
            display: flex;
            box-shadow: 0 2rem 3rem rgba(0, 0, 0, 0.5);
        }

        .workleft {
            width: 35%;
            background: linear-gradient(rgba(15, 15, 15, 0.3), rgba(22, 22, 22, 0.1));
            background-size: cover;
            object-fit: cover;
        }

        .workright {
            width: 65%;
            background-color: #eee;
            padding: 1rem 3rem 3rem 3rem;
        }

        .work h1 {
            width: 100%;
            text-align: center;
            font-family: var(--font-primary);
            color: #1b3bdf;
            font-size: 3rem;
            font-weight: bolder;
            margin-bottom: 1rem;
        }

        .work form {
            width: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .input-group2 {
            position: relative;
            margin-bottom: 2rem;
        }

        .campo {
            background: transparent;
            border: none;
            width: 100%; /* Faça os campos ocuparem a largura total disponível */
            font-size: 1.5rem;
            font-family: var(--font-secundary);
            border-bottom: 2px dashed #636363;
            padding: 0.5rem 0; /* Adicionado preenchimento superior e inferior */
            outline: none;
            transition: border-bottom 0.3s; /* Adicionada uma transição para suavizar as alterações no campo */
        }

        .campo-label {
            position: absolute;
            left: 0;
            top: 1rem;
            font-size: 1rem;
            font-family: var(--font-secundary);
            text-transform: uppercase;
            transition: top 0.3s, font-size 0.3s;
        }

        .campo:focus~.campo-label,
        .campo:valid~.campo-label {
            top: -1.5rem;
            font-size: 0.7rem;
        }

        .campo:focus {
            border-bottom: 2px solid dodgerblue; /* Adicionada uma borda azul quando o campo está em foco */
        }
        .btn-submit {
    font-size: 1rem;
    text-transform: uppercase;
    width: 100%;
    padding: 1rem 2rem; /* Aumente o preenchimento para ajustar o tamanho do botão */
    margin-top: 1rem;
    background-color: #1b3bdf; /* Cor correspondente ao título "Contate-nos" */
    color: #fff; /* Cor do texto no botão */
    border: none;
    cursor: pointer;
    transition: background-color 0.3s;
}

.btn-submit:hover {
    background-color: #1b3bdf;
}

    </style>
</head>
<body>
<div class="work">
    <div class="workus">
        <div class="workleft"></div>
        <div class="workright" id="contate-nos"> 
        <div id="contate-nos">
</div>
            <h1>Contate-nos</h1>

    <?php
    if ($exibirFormulario) {
        echo '
        <form method="post" action="formulario.php" class="work-form">
        <div class="input-group2">
        <input type="text" class="campo" id="nome" name="nome" required>
        <label for="nome" class="campo-label">Nome</label>
    </div>
    <div class="input-group2">
        <input type="email" class="campo" id="email" name="email" required> 
        <label for="email" class="campo-label">E-mail</label>
    </div>
    <div class="input-group2">
        <textarea class="campo" id="mensagem" name="mensagem" required></textarea>
        <label for="mensagem" class="campo-label">Mensagem</label>
    </div>
            <input type="submit" name="submit" class="btn-submit" value="Enviar">
        </form>';
    }
    if (!$exibirFormulario && !empty($mensagem)) {
        echo '<div class="mensagem-sucesso">' . $mensagem . '</div>';
    }
    ?>
</div>
        </div>
    </div>
</body>
</html>