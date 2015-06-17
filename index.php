<?
include'function.php' ;

?>
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
<!------------------------------------- TAB ------------------------------------------->
<div role="tabpanel">

  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="col-xs-4 active"><a class="center-text" href="#twk" aria-controls="home" role="tab" data-toggle="tab">Wawasan Kebangsaan</a></li>
    <li role="presentation" class="col-xs-4"><a class="center-text" href="#tpa" aria-controls="profile" role="tab" data-toggle="tab">Potensi Akademik</a></li>
    <li role="presentation" class="col-xs-4"><a class="center-text" href="#tkp" aria-controls="messages" role="tab" data-toggle="tab">Karakteristik Pribadi</a></li>
    
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="twk">
    <!--Wawasan Kebangsaan -->
    <div class="col-xs-6">
    
        <div class="col-xs-12 " >
        <? 
        koneksi();
        $q_mapel = "select distinct mapel from kategori where bidang='twk';" ;
        $q_res = mysql_query($q_mapel) ;
        while($x = mysql_fetch_assoc($q_res)){
            
         
        ?>
        <h3 id="<? echo $x['mapel'] ; ?>" style="display:inline-block;"><? echo $x['mapel'] ; ?></h3>
        <p class="label label-info " style="display:inline-block;">Materi</p>
        <ul class="list-group " >
            <? 
            $q_materi = "select materi from kategori where mapel='$x[mapel]';" ;
            $q_materi_res = mysql_query($q_materi) ;
            while($y = mysql_fetch_assoc($q_materi_res)){
            ?>
            <div class="<? echo $y['materi'] ; ?>">
          <li  class="list-group-item bg-info no-radius" style="display:none;">
            <p class="no-margin" style="display: inline-block;"><? echo $y['materi'] ; ?></p>
            <br />
            <p class="no-margin" style="display: inline-block;">PG</p>
            <p class="no-margin" style="display: inline-block;">Essay</p>
            <p class="no-margin" style="display: inline-block;">Input</p> 
          </li>
          </div>
          <? } ?>
          <script>
				$( "<? echo '#'.$x[mapel] ; ?>" ).click(function() {
				  $( "<? echo '.'.$y[materi] ; ?>" ).toggle( "slow", function() {
					// Animation complete.
				  });
				});
				</script>
          <? } ?>
        </ul>
    
    </div>
        
    
    </div>
    
    </div>
    <div role="tabpanel" class="tab-pane" id="tpa">...</div>
    <div role="tabpanel" class="tab-pane" id="tkp">...</div>
    
  </div>

</div>



<!-------------------------------------------------------------------------------------->
  
  
  
 </body>
 </html>
