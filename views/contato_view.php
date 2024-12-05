<?php
  $nome= ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['nome'])) ? $_POST['nome'] : null;
  $sobrenome= ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['sobrenome'])) ? $_POST['sobrenome'] : null;
  $email = ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['email'])) ? $_POST['email'] : null;
  $telefone = ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['telefone'])) ? $_POST['telefone'] : null;
  $mensagem = ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['mensagem'])) ? $_POST['mensagem'] : null;

  include_once("configuracao/conexao.php");
  include_once("funcoes.php");
  contato($nome,$sobrenome,$email,$telefone,$mensagem);
  ?>


<div class="body-bg">
        <header class="header">
            <a class="logo" href="index.html">InfoSports</a>
            <div class="headerBtnGroup">
            <?php include_once("views/menuTopo_view.php");?>
                <div>
                    <input type="checkbox" class="check" id="chk" />
                
                    <label class="label" for="chk">
                        <i class="fas fa-moon"></i>
                        <i class="fas fa-sun"></i>
                        <div class="bola"></div>
                    </label>
                </div>
            </div>
            <div class="hamburguer-menu">
                <div class="line"></div>
                <div class="line"></div>
                <div class="line"></div>
            </div>
        </header>
        <div class="container-body">
            <div class="container">
                <div class="title">
                    <h2>Contate-nos</h2>
                </div>

                <form action="#" method="post">

                    <div class="campos">
                        <div class="input-box">
                            <div class="name">
                            <label for="nome"></label>
                            <input type="text" placeholder="Nome" id="nome" name="nome" >
                            <p id="nome-ajuda" class="msg-ajuda" style="display:none;">Mín. 3 caracteres</p>
                        </div>
                        </div>

                        <div class="input-box">
                            <input type="text" id="sobrenome" placeholder="Sobrenome" name="sobrenome">
                        </div>

                        <div class="input-box">
                            <div class="email">
                            <label for="email"></label>
                            <input type="text" placeholder="Email" id="email" name="email">
                            <p id="email-ajuda" class="msg-ajuda" style="display:none;">Insira um email válido. Ex: abc@abc.com</p>
                        </div>
                        </div>

                        <div class="input-box">
                            <div class="telefone">
                            <label for="telefone"></label>
                            <input type="text" placeholder="Telefone" id="telefone" name="telefone">
                            <p id="tel-ajuda" class="msg-ajuda" style="display:none;">Insira um telefone válido. (11 números)</p>
                        </div>
                        </div>

                        <div class="input-box">
                            <textarea id="mensagem" placeholder="Digite aqui sua mensagem" name= "mensagem"></textarea>
                        </div>

                    </div>

                    <div class="button">
                        <button type="submit" value="Enviar" class="btn-concluir" id="btnEnviar">Enviar</button>
                    </div>
                </form>
            </div>
            <section class="contacts">
                <h2>Contatos</h2>
            </section>
        </div>

        <footer class="footer">
            <span>Info Sports</span>
            <a href="#backToTop" class="footerAnchor">VOLTAR PARA O TOPO</a>
        </footer>
    </div>