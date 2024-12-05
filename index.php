<?php
include_once("configuracao.php");
include_once("configuracao/conexao.php");
include_once("model/acesso_model.php");
include_once("funcoes.php");

  $nome= ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['nome'])) ? $_POST['nome'] : null;
  $email = ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['email'])) ? $_POST['email'] : null;
  $peso = ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['peso'])) ? $_POST['peso'] : null;
  $altura = ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['altura'])) ? $_POST['altura'] : null;
  $login = ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['login'])) ? $_POST['login'] : null;
  @$senha = ($_SERVER["REQUEST_METHOD"] == "POST"&& !empty(criptografia($_POST['senha']))) ? criptografia($_POST['senha']) : null;
  $telefone = ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['telefone'])) ? $_POST['telefone'] : null;
  $imagem = ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['fileToUpload'])) ? $_POST['fileToUpload'] : null;
  $nomeCategoria = ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['nomeCategoria'])) ? $_POST['nomeCategoria'] : null;
  $titulo= ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['titulo'])) ? $_POST['titulo'] : null;
  $descricaoCurta = ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['descricaoCurta'])) ? $_POST['descricaoCurta'] : null;
  $descricao = ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['descricao'])) ? $_POST['descricao'] : null;
  $id_categoria = ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['id_categoria'])) ? $_POST['id_categoria'] : null;
  $resposta = 0;
  
  $resposta = calcularImc($peso, $login);
  $classificacao = classificarImc($resposta);
  $noticia = null;
  $categorias = [];
  $noticiasPorCategoria = [];
  cadastrar($nome,$email,$peso,$altura,$resposta,$classificacao);
  timeZone();
  $data = dataAtual();
  $tituloDoSite = "BEM VINDO A INFOSPORTS!";
  $subTituloDoSite = "Aqui é onde você encontra todos os itens mais novos e modernos do seu esporte
  preferido. <br>".$data;

if($_GET && isset($_GET['pagina'])){
  $paginaUrl = $_GET['pagina'];
}else{
  $paginaUrl = null;
}

include_once("views/header_view.php");
    if($paginaUrl === "principal"){
    include_once("views/principal_view.php");
  }elseif($paginaUrl === "contato"){
    include_once("views/contato_view.php");
  }elseif($paginaUrl === "categoria"){
    acesso::protegerTela();
    include_once("views/categoria_view.php");
    if(!verificarCategoriaDuplicada($nomeCategoria)){
      cadastrarCategoria($nomeCategoria);
    }
  }elseif($paginaUrl === "login"){
    include_once("views/login_view.php");
    $usuarioCadastrado = acesso::verificarLogin($login);
    if(
      $usuarioCadastrado &&
      acesso::validaSenha($senha, $usuarioCadastrado['senha'])
    ){
      acesso::registrarAcessoValido($usuarioCadastrado);
      }
  }elseif($paginaUrl === "registro"){
    acesso::protegerTela();
   include_once("model/registro_model.php");
    $usuarioCadastrado = acesso::verificarLogin($login);
   include_once("controller/registro_controller.php");
  }elseif($paginaUrl === "noticia"){
    acesso::protegerTela();
    $categorias = listarCategorias();
    $nomedaImagem = upload($imagem);
    // var_dump($nomedaImagem);die;
    criarNoticia($titulo,$descricaoCurta,$descricao,$nomedaImagem,$id_categoria);
   include_once("views/criarnoticia_view.php");   
  }elseif($paginaUrl === "sair"){
    acesso::limparSessao();
  }elseif($paginaUrl === "detalhe"){
    if($_GET && isset($_GET['id'])){
        $idNoticia = $_GET['id'];
    }else{
      $idNoticia = 0;
    }
    $noticia = buscarNoticiaPorId($idNoticia);
    $noticiasPorCategoria = listarNoticiasPorCategoria($noticia['categoria_id']);
    include_once("views/detalhe_view.php");
  }
  else{
    echo "404 página não existe!";
  }
include_once("views/footer_view.php");

?>
