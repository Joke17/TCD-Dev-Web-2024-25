<?php
include "/rb/rb.php";

R::setup(
    'mysql:host=127.0.0.1;dbname=tcd2024',
    'root',
    ''
);

$ambientes = R::dispense('ambientes');
$ambientes->categoria = $_GET['categoria'];
$ambientes->nome_ambiente = $_GET['ambiente'];

// echo var_dump($_FILES["imagem"]);

$diretorio_upload = "uploads/";  // Certifique-se que este diretório existe e tem permissão de escrita
$tamanho_maximo = 5 * 1024 * 1024;  // 5MB em bytes
$tipos_permitidos = ["image/jpeg", "image/png", "image/gif"];

// Verifica se o formulário foi submetido com os dados necessários
if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['nome'], $_GET['tipo'], $_FILES['imagem'])) {
    
    // Validação do campo de imagem
    $imagem = $_FILES['imagem'];
    $extensaoPermitida = ['image/jpeg', 'image/png', 'image/gif'];
   
   
    if (!in_array($imagem['type'], $extensaoPermitida)) {
        echo '<div class="msg">' . '<p class="msgRed">'  . 'Formato de imagem não permitido. Apenas JPG, PNG e GIF são aceitos.' . '</p>' .  '</div>';
        exit;
    }

    // Verifica se o ambiente já está cadastrado
    $ambiente = R::findOne('ambiente', ' nome = ? ', [$_POST['nome']]);
    
    if ($ambiente) {
        echo '<div class="msg">' .  '<p class="msgRed">'  . 'Ambiente já Cadastrado' . '</p>' . '</div>';
    } 
    
    else {
        // Processamento da imagem
        $diretorioDestino = 'img/ambientes/';
        
        
        if (!is_dir($diretorioDestino)) {
            mkdir($diretorioDestino, 0777, true); // Cria o diretório, se não existir
        }

        // Gerar um nome único para o arquivo de imagem
        
        
        $nomeImagem = uniqid('ambiente_', true) . '.' . pathinfo($imagem['name'], PATHINFO_EXTENSION);
        $caminhoImagem = $diretorioDestino . $nomeImagem;

        // Move a imagem para o diretório final
        if (move_uploaded_file($imagem['tmp_name'], $caminhoImagem)) {
            // Salva os dados no banco
            $ambiente = R::dispense('ambiente');
            $ambiente->nome = $_POST['nome'];
            $ambiente->imagem = $nomeImagem; // Salva o nome da imagem no banco
            $ambiente->tipo = $_POST['tipo'];
            R::store($ambiente);
            echo  '<div class="msg">' . '<p class="msgGreen">'  . 'Ambiente cadastrado com sucesso!' . '</p>' . '</div>';
        } else {
            echo '<div class="msg">' . '<p class="msgRed">'  . 'Erro ao carregar a imagem' . '</p>' . '</div>';
        }

        // Fecha a conexão com o banco de dados
        R::close();
    }
}

// $id = R::store($ambientes);


// $ambientes->imagem = $_GET['fotoamb'];



// header('Location:criarambientes.php?criado=sim')
