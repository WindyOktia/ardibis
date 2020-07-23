
<div class="row">
    <div class="col-md-6">
        <div class="card card-body border-success">
            <h3><b>Surat Masuk</b></h3>
            <div class="text-center">
                <?php foreach($masuk as $mas):?>
                <!-- <h2><?=$mas['jumlah']?> Dokumen</h2> -->
                <div class="row mb-2 mt-2">
                    <div class="col"><h4>Dokumen Valid : <?=$mas['jumlah']?></h4></div>
                    <span>|</span>
                    <div class="col"><h4>Perlu Verifikasi : <span class="badge badge-warning text-white">0</span></h4></div>
                </div>
                <?php endforeach?>
            </div>
            <a href="<?=base_url('dokumen/masuk')?>" class="btn btn-info">Lihat Surat Masuk</a>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card card-body border-danger">
            <h3><b>Surat Keluar</b></h3>
            <div class="text-center">
                <?php foreach($keluar as $klr):?>
                <!-- <h2><?=$klr['jumlah']?> Dokumen</h2> -->
                <div class="row mt-2 mb-2">
                    <div class="col"><h4>Total Dokumen : <?=$klr['jumlah']?></h4></div>
                </div>
                <?php endforeach?>
            </div>
            <a href="<?=base_url('dokumen/keluar')?>" class="btn btn-info">Lihat Surat Keluar</a>
        </div>
    </div>
</div>

<div class="card card-body border-success">
    <h3><b>Resume Dokumen</b></h3>
    <div class="table-responsive">
    <table class="table" id="example">
        <thead class="thead-dark">
            <tr>
            <th scope="col">No</th>
            <th scope="col">Nama Dokumen</th>
            <th scope="col">Jumlah Dokumen</th>
            <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">1</th>
                <td>Pendidikan dan Pengajaran</td>
                <td>22</td>
                <td>
                    <a href="" class="btn btn-sm btn-info">lihat</a>
                </td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>Penelitian</td>
                <td>22</td>
                <td>
                    <a href="" class="btn btn-sm btn-info">lihat</a>
                </td>
            </tr>
            <tr>
                <th scope="row">3</th>
                <td>Publikasi</td>
                <td>22</td>
                <td>
                    <a href="" class="btn btn-sm btn-info">lihat</a>
                </td>
            </tr>
            <tr>
                <th scope="row">4</th>
                <td>Pengabdian Pada Masyarakat</td>
                <td>22</td>
                <td>
                    <a href="" class="btn btn-sm btn-info">lihat</a>
                </td>
            </tr>
            <tr>
                <th scope="row">5</th>
                <td>Kegiatan Penunjang Dosen</td>
                <td>22</td>
                <td>
                    <a href="" class="btn btn-sm btn-info">lihat</a>
                </td>
            </tr>
            <tr>
                <th scope="row">6</th>
                <td>Kerjasama</td>
                <td>22</td>
                <td>
                    <a href="" class="btn btn-sm btn-info">lihat</a>
                </td>
            </tr>
            <tr>
                <th scope="row">7</th>
                <td>SDM</td>
                <td>22</td>
                <td>
                    <a href="" class="btn btn-sm btn-info">lihat</a>
                </td>
            </tr>
            <tr>
                <th scope="row">8</th>
                <td>Aset</td>
                <td>22</td>
                <td>
                    <a href="" class="btn btn-sm btn-info">lihat</a>
                </td>
            </tr>
            <tr>
                <th scope="row">9</th>
                <td>Rencana Fakultas</td>
                <td>22</td>
                <td>
                    <a href="" class="btn btn-sm btn-info">lihat</a>
                </td>
            </tr>
        </tbody>
    </table>

    </div>
</div>