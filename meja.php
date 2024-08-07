<?php
include "proses/connect.php";
date_default_timezone_set("Asia/Jakarta");
$query = mysqli_query($conn, "SELECT * FROM TB_MEJA;");
while ($record = mysqli_fetch_array($query)) {
    $result[] = $record;
}

?>

<div class="col-lg-9 mt-2">
    <div class="card">
        <div class="card-header">
            Halaman Ketersediaan Meja
        </div>
        <class="card-body">
            <?php
            if (empty($result)) {
                echo "Data menu tidak ada";
            } else {
            ?>
                <div class="table-responsive mt-top-2">
                    <table class="table table-hover" id="example">
                        <thead>
                            <tr class="text-norap">
                                <th scope="col">No. Meja</th>
                                <th scope="col">Status</th>
                                <th scope="col">Jumlah Orang</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($result as $row) {
                                ?>
                                <tr>
                                    <th><?php echo $row[0] ?></th>
                                    <td><?php echo $row[1] ?></td>
                                    <td><?php echo $row[2] ?></td>
                                    <td>
                                        <div class="d-flex">
                                            <form class="needs-validation" novalidate action="proses/proses_edit_meja.php" method="POST">
                                                <input type="hidden" name="nomor_meja" value = "<?php echo $row[0]?>">
                                                <button type="submit" class="btn btn-primary" name="edit_order_validate" value="12345">Ubah Status</button>
                                            </form>
                                            <!-- button class="<?php echo (!empty($row['Nomor Meja'])) ? "btn btn-secondary
                                     btn-sm me-1 disabled" : "btn btn-info btn-sm me-1"; ?>" data-bs-toggle="modal"
                                                data-bs-target="#ModalEdit<?php echo $row['Nomor Meja'] ?>"><i
                                                    class="bi bi-pencil"></i></button-->
                                        </div>
                                    </td>
                                </tr>
                                <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <?php
            }
            ?>
    </div>
</div>
</div>