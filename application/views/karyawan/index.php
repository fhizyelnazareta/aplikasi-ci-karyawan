<div class="container">

    <!-- flasher data -->
    <?php if ($this->session->flashdata('flash')) : ?>
        <div class="row">
            <div class="col-md-6">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    Data <strong>Berhasil!</strong> ditambahkan. <?= $this->session->flashdata('flash'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <!-- akhir flasher -->

    <!-- tombol tambah karyawan -->
    <div class="row mt-3">
        <div class="col-md-6">
            <a href="<?= base_url(); ?>karyawan/tambah" class="btn btn-primary">Tambakan Data Karyawan</a>
        </div>
    </div>
</div>
<!-- akhir -->

<!-- Input Pencarian data -->
<div class="container">
    <div class="row mt-3">
        <div class="col-md-6">
            <form action="" method="POST">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Pencarian Data Karyawan" name="keyword">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit" id="cari">Cari</button>
                    </div>
                    <div class="input-group-append">
                        <a class="btn btn-primary ml-1" href="<?= base_url(); ?>karyawan">Refresh</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- akhir Input pencarian data -->


<!-- list pegawai/karyawan -->
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h1>Nama Karyawan</h1>
            <?php if (empty($karyawan)) : ?>
                <div class="alert alert-danger" role="alert">
                    Data Karyawan tidak ada!!
                </div>
            <?php endif; ?>
            <ul class="list-group">
                <?php foreach ($karyawan as $pegawai) :  ?>
                    <li class="list-group-item">
                        <?= $pegawai['nama']; ?>
                        <a href="<?= base_url() ?>karyawan/hapus/<?= $pegawai['id']; ?>" class="badge badge-danger float-right ml-1" onclick="return confirm('yakin?');">Hapus</a>
                        <a href="<?= base_url() ?>karyawan/ubah/<?= $pegawai['id']; ?>" class="badge badge-success float-right ml-1">Ubah</a>
                        <a href="<?= base_url() ?>karyawan/detail/<?= $pegawai['id']; ?>" class="badge badge-info float-right ml-1">Info</a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</div>