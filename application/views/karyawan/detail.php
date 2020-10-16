<div class="container">
    <div class="row mt-3">
        <div class="col-md-6">
            <div class="row mt-3">
                <div class="col-md-6">
                    <a href="<?= base_url(); ?>karyawan" class="btn btn-primary">Kembali</a>
                </div>
            </div>
            <div class="card mt-3">
                <div class="card-header">
                    Biodata Karyawan
                </div>
                <div class="card-body">
                    <h5 class="card-title"><?= $karyawan['nama']; ?></h5>
                    <h6 class="card-subtitle mb-2 text-muted"><?= $karyawan['email']; ?></h6>
                    <p class="card-text">Nomor Induk Karyawan : <?= $karyawan['nik']; ?></p>
                    <p class="card-text"><?= $karyawan['nama']; ?> adalah salah satu karyawan di PT.Suka Maju. Beliau menjabat sebagai <?= $karyawan['jabatan']; ?>.</p>
                    <a href="#" class="btn btn-primary">Selengkapnya</a>
                </div>
            </div>
        </div>
    </div>
</div>