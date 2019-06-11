<!DOCTYPE html>
<html lang="en">
<head>
  <title><?php  echo $titulo ?></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  <link rel="stylesheet" href="<?php echo base_url('./assets/css/style.css?29052019n') ?> "> 
 
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark fixed-top" >
  <?php echo anchor('alunos/listar', 'BH EVENTOS', array('class'=>'navbar-brand')); ?>
 
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="collapsibleNavbar">

    <ul class="navbar-nav mr-auto">

      <li class="nav-item dropdown">
        <?php echo anchor('alunos/listar', 'ALUNOS', array('class'=>'nav-link')); ?>
      </li>  
      <li class="nav-item dropdown">
        <?php echo anchor('esperas/listar', 'ESPERAS', array('class'=>'nav-link')); ?>
      </li>  
    </ul>
    <ul class="navbar-nav">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
          <i class="fas fa-fw fa-user"></i> <?php echo $this->session->userdata('nome')?>
        </a>
        <div class="dropdown-menu">         
          <p class="dropdown-item"><?php echo $this->session->userdata('nome_perfil') ?></p>
          <div class="dropdown-divider"></div> 
          <?php
            if($this->session->userdata('id_perfil') == 1):
              echo anchor('usuarios/listar', '<i class="fas fa-fw fa-user"></i> Usuários', array('class'=>'dropdown-item'));
              //echo anchor('arquivos/cadastrar', '<i class="fas fa-fw fa-file-excel"></i> Importar Alunos', array('class'=>'dropdown-item'));
            
            endif;
          ?>
          <?php echo anchor('relatorios', '<i class="fas fa-chart-bar"></i> Relatório', array('class'=>'dropdown-item')); ?>
          <?php echo anchor('sair', '<i class="fas fa-fw fa-sign-out-alt"></i>Sair', array('class'=>'dropdown-item')); ?>
        </div>
      </li>
    </ul>
  </div>  
</nav>

<div class="container" >
  <?php 
  if ($msg = get_msg()):
  ?>
  <div class = "<?php echo @$msg['class'] ?>" role = "alert">
    <?php echo @$msg['aviso']; ?>
  </div>
  <?php
  endif;
  ?>
  <div class="row">
    <div class="col-lg-1"></div>
    <div class="col-lg-10">
      <h3><?php echo $titulo ?></h3>
      <h5><?php echo '' ?></h5>
      <?php $this->load->view(@$page); ?>
    </div>
  </div>
</div>
<div class="row" style="height: 5em"></div>

<div class="text-center fixed-bottom" style="margin-bottom:0px;"> 
  <p>&copy Beard Devs</p>
</div>
<footer class="footer mt-auto py-3 fixed-bottom">
  <div class="text-center ">
    <span class="text-muted">&copy Beard Devs.</span>
  </div>
</footer>
</body>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="<?php echo base_url("./assets/js/script.js?30052019") ?>"></script>
</html>
