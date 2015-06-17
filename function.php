<?
    function koneksi(){
        $connect = mysql_connect('localhost','root','root') or die('Koneksi Database Gagal');
        $pilih_db = mysql_select_db('cpns') or die('Database tidak ada');
    }
    function insert_soal($bidang,$mapel,$materi,$soal,$a,$b,$c,$d,$e,$benar,$sudah){
        koneksi() ;
        $q = "insert into soal values(null,'$bidang','$mapel','$materi','$soal','$a','$b','$c','$d','$e','$benar','$sudah',null); ";
        $res = mysql_query($q) ;
    }
    function insert_kategori($bidang,$mapel,$materi){
        koneksi() ;
        $q = "insert into kategori values(null,'$bidang','$mapel','$materi'); ";
        $res = mysql_query($q) ;
    }
    function tampilkan($id,$tampilkan_field){
        koneksi() ;
        $q = "select * from soal where id = $id" ;
        $res1 = mysql_query($q) ;
        $res = mysql_fetch_assoc($res1) ;
        echo $res[$tampilkan_field] ;  
    }
    function cek_jawaban($id,$jawaban){
        koneksi() ;
        $q = "select * from soal where id = $id" ;
        $res1 = mysql_query($q) ;
        $res = mysql_fetch_assoc($res1) ;
        if ($jawaban == $res['benar']){
            echo "Jawaban Benar" ;       
        } else {
            echo "Jawaban Salah" ;
        }

    }
    function jumlah_soal(){
        koneksi();
        $q = "select count(*) from soal" ;
        $res = mysql_query($q) ;
        $jmlh_soal = mysql_num_rows($res) ;
        echo $jmlh_soal ;
    }
    function link_louncher($page,$bidang,$mapel,$materi){
        $link = $page.'?bidang='.$bidang.'&&'.'mapel='.$mapel.'&&'.'materi='.$materi ;
        echo $link ;
    }
    
    function id_sebelumnya(){
        $q = "select id from kategori where id > 3 order by id limit 1 ;" ;
        $q = mysql_query($q) ;
    
        while($id_s = mysql_fetch_assoc($q)){
           return $id_s['id'] ;
        }
    
    }
    function materi_sesudahnya($id){
        $q = "select materi from kategori where id=$id ;";
        $q = mysql_query($q) ;
         while($x = mysql_fetch_assoc($q)){
           return $x['materi'] ;
        }
    }
?>

