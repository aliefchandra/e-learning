<? 
//session_start() ;
include'head.php' ;
include'function.php' ;
$bidang = 'twk' ;
$mapel = 'pancasila' ;
$materi = 'sejarah perumusan' ;
$pg=array("a","b","c","d","e");
$random_keys=array_rand($pg,5);
?>

<h1><span id="waktu" class="col-xs-12 center-text" style="color: red;font-size:60px;">10</span></h1>
    	<?
        
        koneksi();
        $q = "select * from soal where bidang='$bidang' and mapel='$mapel' and materi='$materi' and sudah='b' order by rand() limit 1" ;
        $q_jml = "select sudah from soal where bidang='$bidang' and mapel='$mapel' and materi='$materi' and sudah='b';" ;
        $r_jml = mysql_query($q_jml) ;
        $jumlah_soal = mysql_num_rows($r_jml) ;
        if ($jumlah_soal == 0){
            ?>
            <meta http-equiv="Refresh" content="0; URL=koreksi_pg.php">
            <?
        }  
        $r = mysql_query($q) ;
        while($x = mysql_fetch_assoc($r)){
            echo $x['soal'];
            
            ?>
            <form method="post" action="pg.php">
            <input type="hidden" name="id" value="<? echo $x['id'] ; ?>" />
            <input type="hidden" name="benar" value="<? echo $x['benar'] ; ?>" />
            <input type="radio" name="jawaban" value="<? echo $x[$pg[$random_keys[0]]]; ?>"><? echo $x[$pg[$random_keys[0]]]; ?><br>
            <input type="radio" name="jawaban" value="<? echo $x[$pg[$random_keys[1]]]; ?>"><? echo $x[$pg[$random_keys[1]]]; ?><br>
            <input type="radio" name="jawaban" value="<? echo $x[$pg[$random_keys[2]]]; ?>"><? echo $x[$pg[$random_keys[2]]]; ?><br>
            <input type="radio" name="jawaban" value="<? echo $x[$pg[$random_keys[3]]]; ?>"><? echo $x[$pg[$random_keys[3]]]; ?><br>
            <input type="radio" name="jawaban" value="<? echo $x[$pg[$random_keys[4]]]; ?>"><? echo $x[$pg[$random_keys[4]]]; ?><br>
            <input type="submit" name="submit" value="jawab" />
            </form>
            <?
        }
        
        if (isset($_POST['submit'])){
            if (isset($_POST['jawaban'])){
                $jawaban = $_POST['jawaban'] ;
                $q = "update soal set jawabanmu='$jawaban', sudah='s' where id=$_POST[id] ;";
                if ($r = mysql_query($q)){
                    echo "<script>location.href = 'pg.php'</script>";
                }
            } else {
                echo "<script> alert('belum dijawab') ;</script>" ;
            }
        }
        
        
        ?>
       
</body>
</html>

