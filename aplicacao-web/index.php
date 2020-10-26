<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    System Food
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
  <!-- CSS Files -->
  <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="assets/css/paper-dashboard.css?v=2.0.1" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="assets/demo/demo.css" rel="stylesheet" />
  <style type="text/css">
    #response{
      width: 100%;
    }
    .wrapper{
      background-color: #f4f3ef;
    }
  </style>
</head>

<body class="">
  <div class="wrapper ">

    <div class="sidebar" data-color="white" data-active-color="danger">
      <div class="logo">
        <a href="index.php" class="simple-text logo-normal">
          <div class="logo-image-big">
            <img src="assets/img/food.png" style="width: 50px;display: block;margin:0 auto">
          </div>
        </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="mode active ">
            <a href="javascript:;" id="item-1">
              <i class="nc-icon nc-bullet-list-67"></i>
              <p>Listar Produtos</p>
            </a>
          </li>
          <li class="mode">
            <a href="javascript:;" id="item-2">
              <i class="nc-icon nc-simple-add"></i>
              <p>Adicionar produto</p>
            </a>
          </li>
          <li class="mode">
            <a href="javascript:;" id="item-3">
              <i class="nc-icon nc-refresh-69"></i>
              <p>Atualizar produto</p>
            </a>
          </li>
          <li class="mode">
            <a href="javascript:;" id="item-4">
              <i class="nc-icon nc-simple-remove"></i>
              <p>Deletar produto</p>
            </a>
          </li>         
        </ul>
      </div>
    </div>

    <div class="main-panel" style="">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-toggle">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            <a class="navbar-brand" href="javascript:;">Food System API-Request</a>
            
          </div>
          <?php
              $curl = curl_init();
              
              $key = '690bbb8d';

              curl_setopt_array($curl, [
                  CURLOPT_RETURNTRANSFER => 1,
                  CURLOPT_URL => 'https://api.hgbrasil.com/weather?array_limit=1&woeid=455903&fields=only_results,temp,city_name,forecast,max,min,date&key='.$key
              ]);

            
              $rs = curl_exec($curl);

              $dados = json_decode($rs);

              echo '<p>';
              echo '<span style="margin-right:15px"><b>Cidade:</b> ' . $dados->city_name .'</span>';
              echo '<span style="margin-right:10px"><b>Data:</b> ' . $dados->date .'</span><br/>';
              echo '<span style="margin-right:10px"><b>Temperatura:</b> ' . $dados->temp .'ºC</span>';

              foreach ($dados->forecast as $key) {
                echo '<span style="margin-right:10px;color:red"><b>Máx:</b> ' . $key->max .'ºC</span>';
                echo '<span style="color:blue"><b>Min:</b> ' . $key->min .'ºC</span>';
              }

              echo '</p>';

              curl_close($curl);
            ?>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
        </div>
      </nav>
      <!-- End Navbar -->

      <div class="content hide" id="target1">
        <div class="row">
          <div class="col-sm-12">
            <h3 class="description">Listar Produtos</h3>
          </div>
        </div>

        <div class="row">
          <div class="col-sm-12">
            <label>Não há necessidade de autenticação nessa requisição</label>
            <br/>
            <button class="btn btn-info" id="get-request">Solicitar lista</button>
          </div>
        </div>
        <hr>  
        <div class="row">
            <div id="response"></div>
        </div>
      </div>

      <div class="content hide" id="target2">
        <div class="row">
          <div class="col-md-12">
            <h3 class="description">Adicionar Produto</h3>
          </div>
        </div>

        <div class="row">
          <div class="col-md-3 mg10">
            <label>Nome:</label>
            <input type="text" name="nomenew" id="nomenew" class="form-control" required="required" />
          </div>
          <div class="col-md-3 mg10">
            <label>Descrição:</label>
            <input type="text" name="descnew" id="descnew" class="form-control" required="required" />
          </div>
          <div class="col-md-3 mg10">
            <label>Preço:</label>
            <input type="text" name="preconew" id="preconew" class="form-control" required="required" />
          </div>
          <div class="col-md-3 mg10">
            <label>Categoria:</label>
            <select name="catnew" id="catnew" class="form-control">
              <option value="1">Lanche</option>
              <option value="2">Bebida</option>
            </select>
          </div>
        </div>

        <div class="row">
          <div class="col-sm-4 mg10">
            <label>Usuário</label>
            <input type="text" name="user" id="user" class="form-control" required="required" />
          </div>
          <div class="col-sm-4 mg10">
            <label>Senha</label>
            <input type="password" name="senha" id="senha" class="form-control" required="required" />
          </div>
          <div class="col-sm-8 mg10"></div>
        </div>

        <div class="row">
            <button class="btn btn-info" id="post-request">Solicitar Adição</button>
        </div>

        <hr>

        <div class="row">
            <div id="response2"></div>
        </div>
      </div>

      <div class="content hide" id="target3">
        <div class="row">
          <div class="col-sm-12">
            <h3 class="description">Atualizar Produto</h3>
          </div>
        </div>

        <div class="row">
              <div class="col-sm-4 mg10">
                <label>Usuário</label>
                <input type="text" name="usern" id="usern" class="form-control"  required="required" />
              </div>
              <div class="col-sm-4 mg10">
                <label>Senha</label>
                <input type="password" name="senhan" id="senhan" class="form-control" required="required"  />
              </div>
              <div class="col-md-4 mg10">
                <label>Produto</label>
                <select class="form-control" name="prod" id="prod">
                    <option class="effect">Selecione...</option>
                      <?php

                          $curl = curl_init();

                          // Seta algumas opções
                          curl_setopt_array($curl, [
                              CURLOPT_RETURNTRANSFER => 1,
                              CURLOPT_URL => 'http://localhost/API/endpoint'
                          ]);

                          // Envia a requisição e salva a resposta
                          $rs = curl_exec($curl);

                          $obj = json_decode($rs);

                          foreach ($obj as $key) {
                            echo '<option value="'.$key->id.'">'.$key->nome.'</option>';
                          }

                          // Fecha a requisição e limpa a memória
                          curl_close($curl);

                      ?>
                </select>
                <?php echo '<div id="hide" style="display:none;">'.$rs.'</div>'; ?>
              </div>
        </div>

        <div class="row">
              <div class="col-sm-4 mg10">
                <label>Descrição</label>
                <input type="text" name="descricao" id="descricao" class="form-control" value=""  />
              </div>

              <div class="col-sm-4 mg10">
                <label>Valor</label>
                <input type="text" name="valor" id="valor" class="form-control" value="" />
              </div>

              <div class="col-sm-4 mg10">
                <label>Categoria</label>
                <select name="categoria_id" id="categoria_id" class="form-control">
                  <option value="1">Lanche</option>
                  <option value="2">Bebida</option>
                </select>
              </div>
        </div>
            
        <div class="row">
          <button class="btn btn-info" id="put-request">Solicitar Update</button>
        </div>
            
        <hr>

        <div class="row">
          <div id="response3"></div>
        </div>
      </div>

      <div class="content hide" id="target4">
        
        <div class="row">
          <div class="col-md-12">
            <h3 class="description">Deletar produto</h3>
          </div>
        </div>

        <div class="row">
          <div class="col-sm-3 mg10">
            <label>Usuário</label>
            <input type="text" name="userd" id="userd" class="form-control"  required="required" />
          </div>

          <div class="col-sm-3 mg10">
              <label>Senha</label>
              <input type="password" name="senhad" id="senhad" class="form-control" required="required"  />
          </div>

          <div class="col-md-3 mg10">
              <label>Produto</label>
              <select class="form-control" name="prodel" id="prodel">
                <option class="effect">Selecione...</option>
                  <?php

                      $curl = curl_init();

                      // Seta algumas opções
                      curl_setopt_array($curl, [
                          CURLOPT_RETURNTRANSFER => 1,
                          CURLOPT_URL => 'http://localhost/API/endpoint.php'
                      ]);

                      // Envia a requisição e salva a resposta
                      $rs = curl_exec($curl);

                      $obj = json_decode($rs);

                      foreach ($obj as $key) {
                        echo '<option value="'.$key->id.'">'.$key->nome.'</option>';
                      }

                      // Fecha a requisição e limpa a memória
                      curl_close($curl);

                  ?>
              </select>
          </div>

          <div class="col-sm-3 mg10"></div>
        </div>
        
        <div class="row">
          <button class="btn btn-info" id="delete-request">Solicitar Exclusão</button>
        </div>

        <hr>

        <div class="row">
          <div id="response4"></div>
        </div>
      </div>

      
      
    </div>

    <!-- <footer class="footer" style="position: absolute; bottom: 0; width: -webkit-fill-available;">
        <div class="container-fluid">
          <div class="row">
            <div class="credits ml-auto">
              <span class="copyright">
                © <?php echo date('Y'); ?>, made with <i class="fa fa-heart heart"></i> by me
              </span>
            </div>
          </div>
        </div>
    </footer> -->
    
  </div>

 
  <!--   Core JS Files   -->
  <script src="assets/js/core/jquery.min.js"></script>
  <script src="assets/js/core/popper.min.js"></script>
  <script src="assets/js/core/bootstrap.min.js"></script>
  <script src="assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!-- Chart JS -->
  <script src="assets/js/plugins/chartjs.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="assets/js/paper-dashboard.min.js?v=2.0.1" type="text/javascript"></script>

  <script type="text/javascript">
    $(document).ready(function(){
      $('.hide').css('display', 'none');
      $('#target1').css('display', 'block');

      //functions para troca das li
      $('#item-1').on('click', function(){
        $('.hide').css('display', 'none');
        $('#target1').css('display', 'block');
        $('.mode').removeClass('active');
        $(this).parent().addClass('active');
        $('#response').html("");
      });

      $('#item-2').on('click', function(){
        $('.hide').css('display', 'none');
        $('#target2').css('display', 'block');
        $('.mode').removeClass('active');
        $(this).parent().addClass('active');
        $('#response').html("");
      });

      $('#item-3').on('click', function(){
        $('.hide').css('display', 'none');
        $('#target3').css('display', 'block');
        $('.mode').removeClass('active');
        $(this).parent().addClass('active');
        $('#response').html("");
      });

      $('#item-4').on('click', function(){
        $('.hide').css('display', 'none');
        $('#target4').css('display', 'block');
        $('.mode').removeClass('active');
        $(this).parent().addClass('active');
        $('#response').html("");
      });

      //functions das requisições
      $('#get-request').on('click',function(){
        $.post("controle/request-get.php", function(data){
            $('#response').html(data);
          });
      });

      $('#post-request').on('click',function(){
        if($('#user').val() != "" && $('#senha').val() != "" && $('#tempo').val() != ""){
          $.post("controle/request-post.php", 
            {user: $('#user').val(), senha: $("#senha").val(), nome: $('#nomenew').val(), descricao: $('#descnew').val(), preco: $('#preconew').val(), categoria_id: $('#catnew').val()}, function(data){
              $('#response2').html(data);
            });
        }else{
          alert("Todos os campos são obrigatórios!");
          return false;
        }
      });

      $('#put-request').on('click',function(){
        if($('#usern').val() != "" && $('#senhan').val() != ""){

          $.post("controle/request-put.php", 
            {user: $('#usern').val(), 
             senha: $("#senhan").val(),
             id: $('#prod').val(), 
             descricao: $('#descricao').val(),
             valor: $('#valor').val(),
             categoria_id: $('#categoria_id').val(),}, function(data){
              $('#response3').html(data);
            });
        }else{
          alert("Todos os campos são obrigatórios!");
          return false;
        }
      });

      $('#delete-request').on('click',function(){
        if($('#userd').val() != "" && $('#senhad').val() != ""){

          $.post("controle/request-delete.php", 
            {user: $('#userd').val(), 
             senha: $("#senhad").val(),
             id: $('#prodel').val()}, function(data){
              $('#response4').html(data);
            });
        }else{
          alert("Todos os campos são obrigatórios!");
          return false;
        }
      });

      //function layout
      $('#prod').on('change',function(){

        $('.effect').attr("disabled", true);
        var id = $(this).val();
        var dados = JSON.parse($("#hide").html());         

        for(var key in dados){
            if(dados.hasOwnProperty(key)) {
              if(dados[key].id == id){
                $("#descricao").val(dados[key].descricao);
                $("#valor").val(dados[key].preco);
                $("#categoria_id").val(dados[key].categoria_id);
              }
            }
        }
           
      });

    });
  </script>
</body>

</html>