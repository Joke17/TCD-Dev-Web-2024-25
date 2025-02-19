<?php
include "/rb/rb.php";

R::setup(
    'mysql:host=127.0.0.1;dbname=tcd2024',
    'root',
    ''
);

$ambientes = R::dispense('ambientes');
$ambientes->categoria = $_POST['categoria'];
$ambientes->nome_ambiente = $_POST['ambiente'];

// echo var_dump($_FILES["imagem"]);

$diretorio_upload = "uploads/";  // Certifique-se que este diretório existe e tem permissão de escrita
$tamanho_maximo = 5 * 1024 * 1024;  // 5MB em bytes
$tipos_permitidos = ["image/jpeg", "image/png", "image/gif"];

// Verifica se recebeu um arquivo
if (isset($_FILES["imagem"])) {
    $arquivo = $_FILES["imagem"];
    $erro = null;

    // Validações
    if ($arquivo["error"] !== UPLOAD_ERR_OK) {
        $erro = "Erro no upload do arquivo.";
    } elseif (!in_array($arquivo["type"], $tipos_permitidos)) {
        $erro = "Tipo de arquivo não permitido. Apenas JPG, PNG e GIF são aceitos.";
    } elseif ($arquivo["size"] > $tamanho_maximo) {
        $erro = "Arquivo muito grande. Tamanho máximo permitido é 5MB.";
    }

    if ($erro === null) {
        // Gera um nome único para o arquivo
        $extensao = pathinfo($arquivo["name"], PATHINFO_EXTENSION);
        $novo_nome = uniqid() . "." . $extensao;
        $caminho_completo = $diretorio_upload . $novo_nome;

        // Move o arquivo para o diretório de destino
        if (move_uploaded_file($arquivo["tmp_name"], $caminho_completo)) {
            // Salva informações no banco de dados
            
            
            $ambientes->imagem = $caminho_completo;
            $id = R::store($ambientes);

            header('Location:criarambientes.php?criado=sim');

            
            
            
            
            
            
            
            
            
            // try {
            //     $pdo = new PDO("mysql:host=localhost;dbname=seu_banco", "usuario", "senha");
            //     $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            //     $stmt = $pdo->prepare("INSERT INTO imagens (nome_arquivo, caminho, data_upload) VALUES (?, ?, NOW())");
            //     $stmt->execute([$arquivo["name"], $novo_nome]);

            //     echo "Upload realizado com sucesso!";
            // } catch (PDOException $e) {
            //     echo "Erro ao salvar no banco de dados: " . $e->getMessage();
            // }
        } else {
            echo "Erro ao mover o arquivo.";
        }
    } else {
        echo $erro;
    }
} else {
    echo "aaaaaaa";
}




// $ambientes->imagem = $_GET['fotoamb'];



// header('Location:criarambientes.php?criado=sim')
