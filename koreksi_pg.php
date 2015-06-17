<?
session_start() ;
$bidang = 'twk' ;
$mapel = 'pancasila' ;
$materi = 'sejarah perumusan' ;
include'function.php' ;
koneksi() ;
    $jml_soal = "select * from soal where bidang='$bidang' and mapel='$mapel' and materi='$materi' ;" ;
    $jml_soal = mysql_query($jml_soal) ;
    $jml_total_soal = mysql_num_rows($jml_soal) ; //yg dipakai
    $q_benar = "select * from soal where bidang='$bidang' and mapel='$mapel' and materi='$materi' and sudah='s';" ;
    $benar = mysql_query($q_benar) ;
    $jml_benar = 0 ; //yg dipakai
    while($x = mysql_fetch_assoc($benar)){
        if ($x['benar'] == $x['jawabanmu']){
                  $jml_benar += 1 ; 
             }
        
    }
    $salah = $jml_total_soal - $jml_benar ; //yg dipakai
    
    echo 'total soal = '.$jml_total_soal ; echo '&nbsp' ;
    echo 'benar = '.$jml_benar ; echo '&nbsp' ; 
    echo 'salah = '.$salah ; echo '&nbsp' ;
    
$q_koreksi = "select * from soal where bidang='$bidang' and mapel='$mapel' and materi='$materi' ;" ;
$q_koreksi_res = mysql_query($q_koreksi) ;
while ($x = mysql_fetch_assoc($q_koreksi_res)) {
    echo "<div style='border= 1px solid #000000;'>";
    echo $x[soal] ; echo '<br>' ;
    echo $x[benar] ; echo '<br>' ;
    echo "</div>";
}


?>

<?

// Materi selanjutnya
//$q_selanjutnya = "select materi from kategori where bidang='$bidang' and mapel='$mapel' and id >  ";
echo id_sebelumnya() ;

?>
<form method="post">
<input type="submit" name="sudah" value="sudah" />
<input type="submit" name="ulangi" value="Ulangi" />
<input type="submit" name="selanjutnya" value="<? echo materi_sesudahnya(id_sebelumnya()) ; ?>" />
<input type="submit" name="materilain" value="Materi Lain" />
</form>
<?
if(!empty($_POST['sudah'])){
    $q = "update soal set sudah='b',jawabanmu='null' where bidang='$bidang' and mapel='$mapel' and materi='$materi'; ";
    if ($reset = mysql_query($q)){
        session_destroy() ;
        ?>
        <meta http-equiv="Refresh" content="0; URL=index.php">
        <?
    }
}

if(!empty($_POST['ulangi'])){
    $q = "update soal set sudah='b',jawabanmu='null' where bidang='$bidang' and mapel='$mapel' and materi='$materi'; ";
    if ($reset = mysql_query($q)){
        ?>
        <meta http-equiv="Refresh" content="0; URL=pg.php">
        <?
    }
}
if(!empty($_POST['selanjutnya'])){
    $q = "update soal set sudah='b',jawabanmu='null' where bidang='$bidang' and mapel='$mapel' and materi='$materi'; ";
    if ($reset = mysql_query($q)){
        //$_SESSION['materi'] = materi_sesudahnya(id_sebelumnya()) ;
        ?>
        <meta http-equiv="Refresh" content="0; URL=pg.php">
        <?
    }
}
if(!empty($_POST['materilain'])){
    $q = "update soal set sudah='b',jawabanmu='null' where bidang='$bidang' and mapel='$mapel' and materi='$materi'; ";
    if ($reset = mysql_query($q)){
        
        ?>
        <script>alert('keluar menu mapel') ;</script>
        <?
    }
}

?>