<?php
if(isset($_POST['tbl'])){
        //jika ada aktivitas dari tombol
        $hari = $_POST['hari'];
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
    echo "<hr>";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="form-switch.php" method="post">
        <label for="">Tuliskan Angka Hari</label>:
            <input type="number" name="hari">

            <br>
            <button type="submit" name="tbl">Cek Hari</button>
    </form>
</body>
</html>