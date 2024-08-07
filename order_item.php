<?php
include "proses/connect.php";

$query = mysqli_query($conn, "SELECT *, SUM(harga*jumlah) AS harganya, tb_order.waktu_order FROM 
tb_list_order
    LEFT JOIN tb_order ON tb_order.id_order = tb_list_order.kode_order 
    LEFT JOIN tb_daftar_menu ON tb_daftar_menu.id = tb_list_order.menu
    LEFT JOIN tb_bayar ON tb_bayar.id_bayar= tb_order.id_order
    GROUP BY id_list_order
    HAVING tb_list_order.kode_order = $_GET[order]");

$kode = $_GET['order'];
$meja = $_GET['meja'];
$pelanggan = $_GET['pelanggan'];

while ($record = mysqli_fetch_array($query)) {
    $result[] = $record;
}

$select_menu = mysqli_query($conn, "SELECT id, nama_menu FROM tb_daftar_menu");
?>

<div class="col-lg-9 mt-2">
    <div class="card">
        <div class="card-header">
            Halaman Order Item
        </div>
        <div class="card-body">
            <a href="order" class="btn btn-info btn-success mb-3"><i class="bi bi-arrow-left"></i>Back</a>
            <div class="row">
                <div class="col-lg-3">
                    <div class="form-floating mb-3">
                        <input disabled type="text" class="form-control" id="kodeorder" value="
                        <?php echo $kode
                            ?>">
                        <label for="uploadFoto">Kode Order</label>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="form-floating mb-3">
                        <input disabled type="text" class="form-control " id="meja" value="
                        <?php echo $meja ?>">
                        <label for="uploadFoto">Meja</label>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="form-floating mb-3">
                        <input disabled type="text" class="form-control " id="meja" value="
                        <?php echo $pelanggan ?>">
                        <label for="uploadFoto">Pelanggan</label>
                    </div>
                </div>
            </div>
            <!-- Modal Tambah Item -->
            <div class="modal fade" id="tambahItem" tabindex="-1" aria-labelledby="ModalTambahUserLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-lg modal-fullscreen-md-down">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="ModalTambahUserLabel">Tambah Menu Makanan dan Minuman</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form class="needs-validation" novalidate action="proses/proses_input_orderitem.php"
                                method="POST">
                                <input type="hidden" name="kode_order" value="<?php echo $kode ?>">
                                <input type="hidden" name="meja" value="<?php echo $meja ?>">
                                <input type="hidden" name="pelanggan" value="<?php echo $pelanggan ?>">
                                <div class="row">
                                    <div class="col-lg-8">
                                        <div class="form-floating mb-3">
                                            <select class="form-select" name="menu" id=" ">
                                                <option selected hidden value="">Pilih Menu</option>
                                                <?php
                                                foreach ($select_menu as $value) {
                                                    echo "<option value=$value[id]>$value[nama_menu]</option>";
                                                }
                                                ?>
                                            </select>
                                            <label for="menu">Menu Makanan/Minuman</label>
                                            <div class="invalid-feedback">
                                                Pilih Menu
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-floating mb-3">
                                            <input type="number" class="form-control" id="floatingInput"
                                                placeholder="Jumlah Porsi" name="jumlah" required>
                                            <label for="floatingInput">Jumlah Porsi</label>
                                            <div class="invalid-feedback">
                                                Masukan Jumlah Porsi
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="sumbit" class="btn btn-primary" name="input_orderitem_validate"
                                        value="12345">Save Changes</button>
                                </div>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Akhir Modal Tambah Item -->
    <?php
    if (empty($result)) {
        echo "Data menu tidak ada";
    } else {
        foreach ($result as $row) {
            ?>
            <!-- Modal Edit -->
            <div class="modal fade" id="ModalEdit<?php echo $row['id_list_order'] ?>" tabindex="-1"
                aria-labelledby="ModalTambahUserLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-fullscreen-md-down">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="ModalTambahUserLabel">Tambah Menu Makanan dan Minuman</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form class="needs-validation" novalidate action="proses/proses_edit_orderitem.php" method="POST">
                                <input type="hidden" name="id" value="<?php echo $row['id_list_order'] ?>">
                                <input type="hidden" name="kode_order" value="<?php echo $kode ?>">
                                <input type="hidden" name="meja" value="<?php echo $meja ?>">
                                <input type="hidden" name="pelanggan" value="<?php echo $pelanggan ?>">
                                <div class="row">
                                    <div class="col-lg-8">
                                        <div class="form-floating mb-3">
                                            <select class="form-select" name="menu" id=" ">
                                                <option selected hidden value="">Pilih Menu</option>
                                                <?php
                                                foreach ($select_menu as $value) {
                                                    if ($row['menu'] == $value['id']) {
                                                        echo "<option selected value=$value[id]>$value[nama_menu]</option>";
                                                    } else {
                                                        echo "<option value=$value[id]>$value[nama_menu]</option>";
                                                    }
                                                }
                                                ?>
                                            </select>
                                            <label for="menu">Menu Makanan/Minuman</label>
                                            <div class="invalid-feedback">
                                                Pilih Menu
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-floating mb-3">
                                            <input type="number" class="form-control" id="floatingInput"
                                                placeholder="Jumlah Porsi" name="jumlah" required
                                                value="<?php echo $row['jumlah'] ?>">
                                            <label for="floatingInput">Jumlah Porsi</label>
                                            <div class="invalid-feedback">
                                                Masukan Jumlah Porsi
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-floating mb-3">
                                        <input required type="text" class="form-control" id="floatingInput"
                                            placeholder="Catatan" name="catatan" value="<?php echo $row['catatan'] ?>">
                                        <label for="floatingInput">Catatan</label>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="sumbit" class="btn btn-primary" name="edit_orderitem_validate"
                                                value="12345">Save Changes</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Akhir Edit -->

            <!-- Modal Delete -->
            <div class="modal fade" id="ModalDelete<?php echo $row['id_list_order'] ?>" tabindex="-1"
                aria-labelledby="ModalViewLabel" aria-hidden="true">
                <div class="modal-dialog modal-md modal-fullscreen-md-down">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="ModalViewLabel">Delete Data User</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <!-- Display user details -->
                            <form class="needs-validation" novalidate action="proses/proses_delete_orderitem.php" method="POST">
                                <input type="hidden" name="kode_order" value="<?php echo $kode ?>">
                                <input type="hidden" name="meja" value="<?php echo $meja ?>">
                                <input type="hidden" name="pelanggan" value="<?php echo $pelanggan ?>">
                                <input type="hidden" value="<?php echo $row['id_list_order'] ?>" name="id">
                                <div class="col-lg-12">
                                    Apakah anda ingin menghapus menu <b><?php echo $row['nama_menu'] ?></b>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-danger" name="delete_orderitem_validate"
                                        value="12345">Hapus</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Akhir Delete -->
            <?php
        }
        ?>
        <div class="table-responsive">
            <table class="table table-hover ">
                <thead>
                    <tr class="text-norap">
                        <th scope="col">Menu</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Qty</th>
                        <th scope="col">Status</th>
                        <th scope="col">Catatan</th>
                        <th scope="col">Total</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $total = 0;
                    foreach ($result as $row) {
                        ?>
                        <tr>
                            <td><?php echo $row['nama_menu'] ?></td>
                            <td><?php echo number_format($row['harga'], 0, ',', '.') ?></td>
                            <td><?php echo $row['jumlah'] ?></td>
                            <td><?php 
                            if($row['status']==1) {
                                echo "<span class='badge text-bg-warning'>order di terima dapur</span>";
                            } else if($row['status']==2) {
                                echo "<span class='badge text-bg-primary'>order siap disajikan</span>";
                            }
                                ?>
                            </td>
                            <td><?php echo $row['catatan'] ?></td>
                            <td><?php echo number_format($row['harganya'], 0, ',', '.') ?></td>
                            <td>
                                <div class="d-flex">
                                    <button class="<?php echo (!empty($row['id_bayar'])) ? "btn btn-secondary
                                     btn-sm me-1 disabled" : "btn btn-info btn-sm me-1"; ?>" data-bs-toggle="modal"
                                        data-bs-target="#ModalEdit<?php echo $row['id_list_order'] ?>"><i
                                            class="bi bi-pencil"></i></button>
                                    <button class="<?php echo (!empty($row['id_bayar'])) ? "btn btn-secondary
                                     btn-sm me-1 disabled" : "btn btn-info btn-sm me-1"; ?>" data-bs-toggle="modal"
                                        data-bs-target="#ModalDelete<?php echo $row['id_list_order'] ?>"><i
                                            class="bi bi-trash"></i></button>
                                </div>
                            </td>
                        </tr>

                        <?php
                        $total += $row['harganya'];
                    }
                    ?>
                    <tr>
                        <td colspan="5" class="fw-bold">
                            Total Harga
                        </td>
                        <td class="fw-bold">
                            <?php echo number_format($total, 0, ',', '.') ?>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <?php
    }
    ?>
    <div>
        <button class="<?php echo (!empty($row['id_bayar'])) ? "btn btn-secondary disabled" : "btn btn-success"; ?>"
            data-bs-toggle="modal" data-bs-target="#tambahItem"><i class="bi bi-plus-circle-fill"></i>Item</button>
        <button class="<?php echo (!empty($row['id_bayar'])) ? "btn btn-secondary disabled" : "btn btn-primary"; ?>"
            data-bs-toggle="modal" data-bs-target="#bayar"><i class="bi bi-cash-coin"></i>Bayar</button>
        <button onclick="printStruk()" class="btn btn-info">Cetak Struk</button>
    </div>
</div>
</div>
</div>

<div id="strukContent" class="d-none">
<h2>Struk Pembayaran Die Gaststätte</h2>
<p>Kode Order: <?php echo $kode ?> </p>
<p>Meja: <?php echo $meja ?> </p>
<p>Pelanggan: <?php echo $pelanggan ?> </p>
<p>Waktu Order: <?php echo date('d/m/Y H:i:s', strtotime ($result[0]['waktu_order'])) ?> </p>
<table>
    <thead>
        <tr>
            <th>Menu</th>
            <th>Harga</th>
            <th>Qty</th>
            <th>Total</th>
        </tr>
    </thead> 
    <tbody>
        <?php 
        $total =0;
        
        foreach ($result as $row) {?>
        <tr>
        <td><?php echo $row['nama_menu']?></td>
        <td><?php echo number_format($row['harga'], 0,',','.')?></td>
        <td><?php echo $row['jumlah']?></td>
        <td><?php echo number_format($row['harganya'], 0,',','.')?></td>
        </tr>
        <?php 
        $total += $row['harganya'];
    } ?>
    <tr>
        <td colspan="3"> Total Harga</td>
        <td><?php echo number_format($total, 0,',','.')?></td>
    </tr>
    </tbody>
</table>
</div>

<script>
    function printStruk() {
        var strukContent = document.getElementById("strukContent").innerHTML;

        var printFrame = document.createElement('iframe');
        printFrame.style.display = 'none';
        document.body.appendChild(printFrame);
        printFrame.contentDocument.write(strukContent);
        printFrame.contentWindow.print();
        document.body.removeChild(printFrame);
    }
</script>


<!-- Modal Tambah Item -->
<div class="modal fade" id="bayar" tabindex="-1" aria-labelledby="ModalTambahUserLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-fullscreen-md-down">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="ModalTambahUserLabel">Pembayaran</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr class="text-norap">
                                <th scope="col">Menu</th>
                                <th scope="col">Harga</th>
                                <th scope="col">Qty</th>
                                <th scope="col">Status</th>
                                <th scope="col">Catatan</th>
                                <th scope="col">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $total = 0;
                            foreach ($result as $row) {
                                ?>
                                <tr>
                                    <td><?php echo $row['nama_menu'] ?></td>
                                    <td><?php echo number_format($row['harga'], 0, ',', '.') ?></td>
                                    <td><?php echo $row['jumlah'] ?></td>
                                    <td><?php echo $row['status'] ?></td>
                                    <td><?php echo $row['catatan'] ?></td>
                                    <td><?php echo number_format($row['harganya'], 0, ',', '.') ?></td>
                                </tr>
                                <?php
                                $total += $row['harganya'];
                            }
                            ?>
                            <tr>
                                <td colspan="5" class="fw-bold">
                                    Total Harga
                                </td>
                                <td class="fw-bold">
                                    <?php echo number_format($total, 0, ',', '.') ?>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <span class="text-danger fs-5 fw-semibold">Apakah Anda Yakin Ingin Melakukakn Pembayaran?</span>
                <form class="needs-validation" novalidate action="proses/proses_bayar.php" method="POST">
                    <input type="hidden" name="kode_order" value="<?php echo $kode ?>">
                    <input type="hidden" name="meja" value="<?php echo $meja ?>">
                    <input type="hidden" name="pelanggan" value="<?php echo $pelanggan ?>">
                    <input type="hidden" name="total" value="<?php echo $total ?>">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-floating mb-3">
                                <input type="number" class="form-control" id="floatingInput" placeholder="Nominal Uang"
                                    name="uang" required>
                                <label for="floatingInput">Nominal Uang</label>
                                <div class="invalid-feedback">
                                    Masukan Nominal Uang
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="sumbit" class="btn btn-primary" name="bayar_validate" value="12345">Bayar</button>
                    </div>
            </div>
        </div>
        </form> 
    </div>
</div>
</div>
</div>
<!-- Akhir Modal Tambah Item -->