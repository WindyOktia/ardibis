<?php foreach($publikasi as $pub):?>
<div class="row mb-2">
    <div class="col">
        <a href="<?=base_url('dokumen/publikasi')?>" class="btn btn-sm btn-secondary mr-2">Kembali</a>
        <a href="#" class="btn btn-sm btn-success">Upload Dokumen</a>
    </div>
    <div class="col">
        <a href="#" class="btn btn-sm btn-light float-right tombol-hapus">! Hapus data arsip</a>
    </div>
</div>

<div class="card card-body">
    <div class="h4"><b>1. Detail Dokumen Publikasi</b></div>
    <ul>
        <li>
            <div class="row">
                <div class="col-3">Nama Dosen</div>
                <div class="col">: <?=$pub['nama_dosen']?></div>
            </div>
        </li>
        <li>
            <div class="row">
                <div class="col-3">NIP</div>
                <div class="col">: <?=$pub['nip']?></div>
            </div>
        </li>
        <li>
            <div class="row">
                <div class="col-3">NIDN</div>
                <div class="col">: <?=$pub['nidn']?></div>
            </div>
        </li>
        <li>
            <div class="row">
                <div class="col-3">Jenis Publikasi</div>
                <div class="col">: <?=$pub['jenis_publikasi']?></div>
            </div>
        </li>
        <li>
            <div class="row">
                <div class="col-3">Tema Publikasi</div>
                <div class="col">: <?=$pub['tema_publikasi']?></div>
            </div>
        </li>
        <li>
            <div class="row">
                <div class="col-3">Judul Kegiatan</div>
                <div class="col">: <?=$pub['judul_kegiatan']?></div>
            </div>
        </li>
        <li>
            <div class="row">
                <div class="col-3">Tahun Akademik - Semester</div>
                <div class="col">: <?=$pub['tahun_akademik']?> - <?php if($pub['semester']=='2'){echo 'Genap';}else{echo 'Ganjil' ;};?></div>
            </div>
        </li>
        <li>
            <div class="row">
                <div class="col-3">Penerbit</div>
                <div class="col">: <?=$pub['penerbit']?></div>
            </div>
        </li>
        <li>
            <div class="row">
                <div class="col-3">URL Penerbit</div>
                <div class="col">: <span><a href="<?=$pub['link_penerbit']?>" target="_blank">Lihat URL</a></span> </div>
            </div>
        </li>
        <li>
            <div class="row">
                <div class="col-3">Indeks</div>
                <div class="col">: <?=$pub['indeks']?></div>
            </div>
        </li>
        <li>
            <div class="row">
                <div class="col-3">Jumlah Sitasi</div>
                <div class="col">: <?=$pub['sitasi']?></div>
            </div>
        </li>
        <li>
            <div class="row">
                <div class="col-3">Daftar Anggota</div>
                <div class="col">
                    <ul>
                    <?php if($pub['anggota']=="no_data"){echo 'tidak ada anggota';}else{
                        $anggota = unserialize($pub['anggota']);
                        foreach($anggota as $ang){
                            if($ang['anggota']=='1'){
                                echo "<li>".$ang['no_identitas'].' - '.$ang['nama_anggota'].' '.'( Dosen )'.'| '.$ang['keterangan']."</li>";
                            }elseif($ang['anggota']=='2'){
                                echo "<li>".$ang['no_identitas'].' - '.$ang['nama_anggota'].' '.'( Mahasiswa )'.'| '.$ang['keterangan']."</li>";
                            }else{
                                echo "<li>".$ang['no_identitas'].' - '.$ang['nama_anggota'].' '.'( Lainnya )'.'| '.$ang['keterangan']."</li>";
                            };
                            
                        }
                    }
                    ?>
                    </ul>
                </div>
            </div>
        </li>
    </ul>

    <div class="h4"><b>2. Arsip Dokumen</b></div>
    <p>Sistem hanya mampu menampilkan file gambar, selain itu pengguna hanya dapat mengunduh file</p>
    <?php foreach($document as $doc):?>
    <div class="card card-body border-success">
        <div class="row">
            <div class="col"><b>Nama dokumen : <?=$doc['nama_dokumen']?> </b> <br></div>
            <div class="col"><a href="<?=base_url('dokumen/deleteDocument')?>/<?=$doc['id_trans_document']?>/detailPublikasi/<?= $pub['id_doc_publikasi']?>" class="btn btn-sm btn-danger float-right tombol-hapus">hapus dokumen <?=$doc['nama_dokumen']?> </a></div>
        </div>
        Jenis Dokumen : <?=$doc['tipe']?><br>
        <span>Link Download : <a href="<?= base_url('dokumen/downloadDocument')?>/<?=$doc['link_file']?>">Download File</a></span>
        <?php if($doc['tipe']=='.jpg'||$doc['tipe']=='.png'||$doc['tipe']=='.jpeg'){?>
            <img src="<?=base_url('document/priv')?>/<?= $doc['link_file']?>" alt="" style="width:100%" srcset="">
        <?php } ?>
    </div>
    <?php endforeach?>
</div>
<?php endforeach?>