<?php
$id = $_GET['id'];

$query = $koneksi->query("SELECT * FROM tb_buku as b JOIN (SELECT id_kategori, name_kategori FROM tb_kategori) as k ON b.kategori=k.id_kategori WHERE b.id_buku='$id'");
$detail = $query->fetch_assoc();
?>

<div class="row">
    <div class="col-md-8">
        <div class="card p-4 rounded-4">
            <table class="table">
                <tr>
                    <th>Judul Buku</th>
                    <td><?= $detail['judul_buku']; ?></td>
                </tr>
                <tr>
                    <th>Kategori Buku</th>
                    <td><?= $detail['name_kategori']; ?></td>
                </tr>
                <tr>
                    <th>Penulis</th>
                    <td><?= $detail['penulis']; ?></td>
                </tr>
                <tr>
                    <th>Penerbit</th>
                    <td><?= $detail['penerbit']; ?></td>
                </tr>
                <tr>
                    <th>Tahun Terbit</th>
                    <td><?= date('d/m/Y', strtotime($detail['tahun_terbit'])) ?></td>
                </tr>
                <tr>
                    <th>Jumlah Halaman</th>
                    <td><?= $detail['jumlah_halaman']; ?></td>
                </tr>
                <tr>
                    <th>Lokasi Rak</th>
                    <td><?= $detail['rak_buku']; ?></td>
                </tr>
                <tr>
                    <th>Stok Buku</th>
                    <td><?= $detail['jumlah_buku']; ?></td>
                </tr>
                <tr>
                    <th>Tanggal Dibuat</th>
                    <td><?= date("d/m/Y H:i", strtotime($detail['created_at']));?></td>
                </tr>
                <tr>
                    <th>Terakhir Diupdate</th>
                    <td>
                        <?php if($detail['update_at'] == null){
                            echo date("d/m/Y H:i", strtotime($detail['created_at']));
                        }else{
                            echo date("d/m/Y H:i", strtotime($detail['update_at']));
                        } ?>
                    </td>
                </tr>
                <tr>
                    <th>Deskripsi</th>
                    <td><a data-bs-toggle="collapse" href="#deskripsi">Lihat Deskripsi</a></td>
                </tr>
            </table>
            <div class="collapse mb-3" id="deskripsi">
                <?= $detail['deskripsi']; ?>
            </div>
            <div>
                <a href="?page=data-buku" class="btn btn-primary btn-sm">Kembali</a>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card p-2 rounded-4">
            <img src="../assets/book/<?= $detail['cover']; ?>" alt="" class="img-thumbnail">
        </div>
    </div>
</div>