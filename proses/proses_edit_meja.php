<?php
session_start();
include 'connect.php';
$nomor_meja = isset($_POST['nomor_meja']) ? htmlentities($_POST['nomor_meja']) : "";

if (!empty($_POST['edit_order_validate'])) {
    $query  = mysqli_query($conn, "SELECT * FROM TB_MEJA WHERE `no.meja` = '$nomor_meja';");
    $result = mysqli_fetch_row($query);
    if ($result[1] == "Tersedia") {
        $query = mysqli_query($conn, "UPDATE tb_meja SET status = 'Terisi' WHERE `no.meja` = '$nomor_meja';");
    } else {
        $query = mysqli_query($conn, "UPDATE tb_meja SET status = 'Tersedia' WHERE `no.meja` = '$nomor_meja';");
    }
    if ($query) {
        $message = '<script>alert("Status ketersediaan meja berhasil dirubah");
                window.location="../meja"</script>';
    } else {
        $message = '<script>alert("Status ketersediaan meja gagal dirubah");
                window.location="../meja"</script>';
    }
}
echo $message
    ?>
