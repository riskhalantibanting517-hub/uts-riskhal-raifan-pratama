<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
    # STRKTUR LOGIKA
    # IF, ELSEIF, ELSE
    # SWITCH

    # OPERATOR PERBANDINGAN (== != > < >= <=)
    # OPERATOR LOGIKA ( AND OR) (&& ||)


    $username = "admin";
    $password = "123456";

    if($username == "admin" && $password == "123456"){
        echo "Login Berhasil";
    }elseif($username == "admin" && $password != "123456"){
        echo "Password Salah";
    }elseif($username != "admin" && $password == "123456"){
        echo "Username Salah";
    }else{
        echo "Login Gagal";
    }

    // $nama = "Budi";
    // $nilai = 20;

    // if($nilai >= 70){
    //     echo "Selamat $nama, Kamu Lulus";
    // }elseif($nilai >= 40){
    //     echo "Hai, $nama. Kamu harus ikut remedial";
    // }elseif($nilai >= 10){
    //     echo "Maaf $nama, kamu Tidak Lulus";
    // }else{
    //     echo "Hati-hati $nama, Kamu Akan di DO jika tidak memperbaiki nilai di MK lainnya";
    // }



    // if($nilai > 50){
    //     echo "Kamu Lulus";
    //     if($nilai >90){
    //         echo ", Nilai A";
    //     }
    // }else{
    //     echo "Kamu Tidak Lulus";
    //     if($nilai >30){
    //         echo ", Harus Ikut Remedial";
    //     }
    // }

    echo "<hr>";
    ##### SWITCH #######
    $hari = 10;
    switch($hari){
        case 1:
            echo "Hari Minggu";
            break;
        
        case 2:
            echo "Hari Senin";
            break;
        
        default:
            echo "Tidak Ada Hari";
            break;
    }
    ?>
</body>
</html>