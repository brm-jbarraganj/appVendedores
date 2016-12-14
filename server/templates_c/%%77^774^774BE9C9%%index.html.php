<?php /* Smarty version 2.6.6, created on 2016-12-13 23:12:37
         compiled from index.html */ ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title></title>
  <link rel="stylesheet" href="">
  <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
  <script>
  $(document).ready(function(){
    $("#btn").click(function(){
      jQuery.ajax({
          type:"POST",
          url:"index.php",
          dataType:'json',
          data: $("#formNoticia").serialize(),
          beforeSend:function (argument) {
            //jQuery(".loading").show();
          },
          success:function(data){
            console.log(data);
          }
        });
    });
  })
  </script>
</head>
<body>
  <form id="formNoticia" action="./index.php" method="post" align="center">
    <h1>Crear noticia</h1>
    <input type="hidden" name="accion" id="accion" value="setNoticia">
    <input type="hidden" name="idSubCategoria" id="idSubCategoria" value="3">
    <input type="hidden" name="idUsuarioAdmin" id="idUsuarioAdmin" value="1">
    <input type="text" name="titulo" id="titulo" placeholder="Titulo"><br><br>
    <input type="text" name="subtitulo" id="subtitulo" placeholder="Subtitulo"><br><br>
    <textarea name="contenido" id="contenido" placeholder="Contenido" cols="30" rows="10"></textarea><br><br>
    <input type="hidden" name="imagen" id="imagen" value="6.jpg">
    <input type="hidden" name="tipoTemplate" id="tipoTemplate" value="1">
    <input type="button" id="btn" value="Crear">
  </form>
</body>
</html>