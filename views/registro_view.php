<?php
  include_once("configuracao/conexao.php");
  include_once("funcoes.php");
  ?>

<div class="container">
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
    <section class="main">
      <div class="box-content">
        <form action="#" method="post">
          <h1>Cadastre-se para acompanhar as notícias!</h1>
          <div class="name">
            <label for="nome"></label>
            <input type="text" placeholder="Nome" id="nome" name="nome" >
            <p id="nome-ajuda" class="msg-ajuda" style="display:none;">Mín. 3 caracteres</p>
          </div>
          <div class="email">
            <label for="email"></label>
            <input type="text" placeholder="Email" id="email" name="email">
            <p id="email-ajuda" class="msg-ajuda" style="display:none;">Insira um email válido. Ex: abc@abc.com</p>
          </div>
          <div class="telefone">
            <label for="telefone"></label>
            <input type="text" placeholder="Telefone" id="telefone" name="telefone">
            <p id="tel-ajuda" class="msg-ajuda" style="display:none;">Insira um telefone válido. (11 números)</p>
          </div>
          <div class="telefone">
            <label for="login"></label>
            <input type="text" placeholder="login" id="login" name="login">
            <p id="tel-ajuda" class="msg-ajuda" style="display:none;">Insira um login válido.</p>
      
          </div>
          <div class="telefone">
            <label for="senha"></label>
            <input type="password" placeholder="senha" id="senha" name="senha">
            <p id="tel-ajuda" class="msg-ajuda" style="display:none;">Insira uma senha válida.</p>
          <button type="submit" class="btn-concluir">Concluir</button>
        </form>
      </div>
    </section>
    <footer class="footer">
      <span>Info Sports</span>
      <a href="#backToTop" class="footerAnchor">VOLTAR PARA O TOPO</a>
    </footer>
  </div>
