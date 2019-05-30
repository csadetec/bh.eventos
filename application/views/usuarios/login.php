<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>EVENTOS - LOGIN</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <link rel="stylesheet" href="<?php echo base_url('./assets/css/style.css?15052019') ?> ">   
</head>

<body style="background-color: #ebe0ff">

  <div class="container mt-5">
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
      <div class="col-lg-2"></div>
      <div class="col-lg-8">
        <div class="card card-register">
          <div class="card-header">LOGIN DO USUÁRIO</div>
          <div class="card-body">
            <?php echo form_open('usuarios/login') ?>
              <div class="form-group">
                <input type="text" name="usuario" id="usuario" class="form-control" placeholder="Usuário" required="required" value="<?php echo @$_POST['usuario'] ?>">
              </div>
              <div class="form-group">
                <input type="password" name="senha" id="senha" class="form-control" placeholder="Senha" required="required">
              </div>
              <input type="submit" class="btn btn-primary btn-block " value="ENTRAR">          
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>
