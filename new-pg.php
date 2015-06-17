<?
session_start() ;
include'function.php' ;
$bidang = 'twk' ;
$mapel = 'pancasila' ;
$materi = 'sejarah perumusan' ;
koneksi();
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
    
    echo 'benar = '. $jml_benar; echo '<br>' ;
    echo 'salah = '. $salah ; echo '<br>' ;
    echo 'total soal = '. $jml_total_soal ; echo '<br>' ;


?>