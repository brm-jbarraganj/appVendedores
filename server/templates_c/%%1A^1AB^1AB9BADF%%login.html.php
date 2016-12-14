<?php /* Smarty version 2.6.6, created on 2016-12-14 17:10:36
         compiled from login.html */ ?>
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
  <form id="formNoticia" align="center">
    <h1>login</h1>
    <input type="text" name="titulo" id="titulo" placeholder="Titulo"><br><br>
    <input type="text" name="subtitulo" id="subtitulo" placeholder="Subtitulo"><br><br>  
    <input type="button" id="btn" value="Do login!!">
  </form>
</body>
</html>