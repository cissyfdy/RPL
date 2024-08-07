<?php
include "proses/connect.php";
$query = mysqli_query($conn, "SELECT * FROM tb_daftar_menu");
while ($record = mysqli_fetch_array($query)) {
    $result[] = $record;
}

?>

<div class="col-lg-9 mt-2">
    <div class="card">
        <div class="card-header">
            Halaman Menu
        </div>
        <class="card-body">
            <div class="row mt-2">
                <div class="col d-flex justify-content-end">
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ModalTambahUser"> Tambah
                        Menu</button>
                </div>
            </div>
            <!-- Modal Tambah Menu Baru -->
            <div class="modal fade" id="ModalTambahUser" tabindex="-1" aria-labelledby="ModalTambahUserLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-xl modal-fullscreen-md-down">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="ModalTambahUserLabel">Tambah Menu Makanan dan Minuman</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form class="needs-validation" novalidate action="proses/proses_input_menu.php"
                                method="POST" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="input-group mb-3">
                                            <input type="file" class="form-control py-3" id="uploadFoto"
                                                placeholder="Your Name" name="foto" required>
                                            <label class="input-group-text" for="uploadFoto">Upload Foto Menu</label>
                                            <div class="invalid-feedback">
                                                Masukan File Foto Menu
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="floatingInput"
                                                placeholder="nama Menu" name="nama_menu" required>
                                            <label for="floatingInput">Nama Menu</label>
                                            <div class="invalid-feedback">
                                                Masukan Nama Menu
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                        <div class="form-floating mb-3">
                                            <input required type="number" class="form-control" id="floatingInput"
                                                placeholder="Harga" name="harga">
                                            <label for="floatingInput">Harga</label>
                                            <div class="invalid-feedback">
                                                Masukan Harga Menu
                                            </div>
                                        </div>
                                    </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="floatingInput"
                                                placeholder="Deskripsi" name="deskripsi">
                                            <label for="floatingPassword">Deskripsi</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">                                   
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary" name="input_menu_validate"
                                        value="12345">Tambah Menu</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Akhir Modal Tambah Menu Baru -->
            <?php
            if (empty($result)) {
                echo "Data menu tidak ada";
            } else {
            foreach ($result as $row) {
                ?>
                <!-- Modal View -->
                <div class="modal fade" id="ModalView<?php echo $row['id'] ?>" tabindex="-1" aria-labelledby="ModalTambahUserLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-xl modal-fullscreen-md-down">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="ModalTambahUserLabel">Tambah Menu Makanan dan Minuman</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form class="needs-validation" novalidate action="proses/proses_input_menu.php"
                                method="POST" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-floating mb-3">
                                            <input disabled type="text" class="form-control" id="floatingInput"
                                                 value="<?php echo $row['nama_menu'] ?>">
                                            <label for="floatingInput">Nama Menu</label>
                                            <div class="invalid-feedback">
                                                Nama Menu
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                        <div class="form-floating mb-3">
                                            <input disabled type="number" class="form-control" id="floatingInput"
                                             value="<?php echo $row['harga'] ?>">
                                            <label for="floatingInput">Harga</label>
                                            <div class="invalid-feedback">
                                                Harga Menu
                                            </div>
                                        </div>
                                    </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-floating mb-3">
                                            <input disabled type="text" class="form-control" id="floatingInput"
                                            value="<?php echo $row['deskripsi'] ?>" >
                                            <label for="floatingPassword">Deskripsi</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">                                   
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                  
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
                <!-- Akhir Modal View -->

                <!-- Modal Edit -->
                <div class="modal fade" id="ModalEdit<?php echo $row['id'] ?>" tabindex="-1" aria-labelledby="ModalTambahUserLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-xl modal-fullscreen-md-down">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="ModalTambahUserLabel">Tambah Menu Makanan dan Minuman</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form class="needs-validation" novalidate action="proses/proses_edit_menu.php"
                                method="POST" enctype="multipart/form-data">
                                <input type="hidden" value="<?php echo $row['id'] ?>" name="id">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="input-group mb-3">
                                            <input type="file" class="form-control py-3" id="uploadFoto"
                                                placeholder="Your Name" name="foto" required>
                                            <label class="input-group-text" for="uploadFoto">Upload Foto Menu</label>
                                            <div class="invalid-feedback">
                                                Masukan File Foto Menu
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="floatingInput"
                                                placeholder="nama Menu" name="nama_menu" required value="<?php echo $row['nama_menu'] ?>">
                                            <label for="floatingInput">Nama Menu</label>
                                            <div class="invalid-feedback">
                                                Masukan Nama Menu
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                        <div class="form-floating mb-3">
                                            <input required type="number" class="form-control" id="floatingInput"
                                                placeholder="Harga" name="harga" value="<?php echo $row['harga'] ?>">
                                            <label for="floatingInput">Harga</label>
                                            <div class="invalid-feedback">
                                                Masukan Harga Menu
                                            </div>
                                        </div>
                                    </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="floatingInput"
                                                placeholder="Deskripsi" name="deskripsi" value="<?php echo $row['deskripsi'] ?>">
                                            <label for="floatingPassword">Deskripsi</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">                                   
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary" name="input_menu_validate"
                                        value="12345">Edit Menu</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
                <!-- Akhir Edit -->

                <!-- Modal Delete -->
                <div class="modal fade" id="ModalDelete<?php echo $row['id'] ?>" tabindex="-1"
                    aria-labelledby="ModalViewLabel" aria-hidden="true">
                    <div class="modal-dialog modal-md modal-fullscreen-md-down">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="ModalViewLabel">Delete Data User</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <!-- Display user details -->
                                <form class="needs-validation" novalidate action="proses/proses_delete_menu.php"
                                    method="POST">
                                    <input type="hidden" value="<?php echo $row['id'] ?>" name="id">
                                    <input type="hidden" value="<?php echo $row['foto'] ?>" name="foto">
                                    <div class="col-lg-12">
                                        Apakah anda ingin menghapus menu <b><?php echo $row['nama_menu'] ?></b>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-danger" name="input_user_validate"
                                            value="12345"
                                            >Hapus</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Akhir Delete -->

                <!-- Modal Reset Password -->
                <div class="modal fade" id="ModalResetPassword<?php echo $row['id'] ?>" tabindex="-1"
                    aria-labelledby="ModalViewLabel" aria-hidden="true">
                    <div class="modal-dialog modal-md modal-fullscreen-md-down">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="ModalViewLabel">Reset Password</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <!-- Display user details -->
                                <form class="needs-validation" novalidate action="proses/proses_reset_password.php"
                                    method="POST">
                                    <input type="hidden" value="<?php echo $row['id'] ?>" name="id">
                                    <div class="col-lg-12">
                                        <?php
                                        if ($row['username'] == $_SESSION['username_belcafe']) {
                                            echo "<div class='alert alert-danger'>Anda tidak dapat menreset password sendiri</div>";
                                        } else {
                                            echo "Apakah anda yakin mereset password user <b> $row[username]</b> 
                                            menjadi password bawaan sistem yaitu <b>password</b>";
                                        }
                                        ;
                                        ?>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-success" name="input_user_validate"
                                            value="12345" <?php echo ($row['username'] == $_SESSION['username_belcafe']) ?
                                                'disabled' : ''; ?>>Reset Password</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Akhir Modal Reset Password -->
                <?php
            }
            
                ?>
                <div class="table-responsive mt-top-2">
                    <table class="table table-hover" id="example" >
                        <thead>
                            <tr class="text-norap">
                                <th scope="col">No</th>
                                <th scope="col">Foto Menu</th>
                                <th scope="col">Nama Menu</th>
                                <th scope="col">Harga</th>
                                <th scope="col">Deskripsi</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($result as $row) {
                                ?>
                                <tr>
                                    <th scope="row"><?php echo $no++ ?></th>
                                    <td>
                                        <div style="width:90px">
                                            <img src="assets/img/<?php echo $row['foto'] ?>" class="img-thumbnail" alt="...">
                                        </div>
                                    </td>
                                    <td><?php echo $row['nama_menu'] ?></td>
                                    <td><?php echo $row['harga'] ?></td>
                                    <td><?php echo $row['deskripsi'] ?></td>
                                    <td>
                                        <div class="d-flex">
                                            <button class="btn btn-info btn-sm me-1" data-bs-toggle="modal"
                                                data-bs-target="#ModalView<?php echo $row['id'] ?>"><i
                                                    class="bi bi-eye"></i></button>
                                            <button class="btn btn-info btn-sm me-1" data-bs-toggle="modal"
                                                data-bs-target="#ModalEdit<?php echo $row['id'] ?>"><i
                                                    class="bi bi-pencil"></i></button>
                                            <button class="btn btn-info btn-sm me-1" data-bs-toggle="modal"
                                                data-bs-target="#ModalDelete<?php echo $row['id'] ?>"><i
                                                    class="bi bi-trash"></i></button>
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
