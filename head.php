<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Insert Soal</title>
	<link href="css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="css/edit.css" rel="stylesheet" type="text/css">
    <link href="css/warna.css" rel="stylesheet" type="text/css">
    <link href="css/grid-bootstrap.css" rel="stylesheet" type="text/css">
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script>
    			$(document).ready(function(){
    				window.setInterval(function () {
    					var sisawaktu = $("#waktu").html();
    					sisawaktu = eval(sisawaktu);
    					if (sisawaktu == 0) {
    						location.href = "pg.php";
    					} else {
    						$("#waktu").html(sisawaktu - 1);
    					}
    				}, 1000);
                    
                    $('#pg_twk').click(function(){
                        <?
                        $_SESSION['page'] = 'pg.php' ;
                        $_SESSION['bidang'] = 'twk' ;
                        $bidang = $_SESSION['bidang'] ;
                        ?>
                    });
                    
    			});
    </script>
  </head>
  <body>
