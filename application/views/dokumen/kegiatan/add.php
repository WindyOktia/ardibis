<a href="<?=base_url('dokumen/penelitian')?>" class="btn btn-sm btn-secondary mb-2">Kembali</a>

<div class="card card-body border-success">
<h5><b>Tambah dokumen Kegiatan Penunjang Dosen</b></h5><br>
    <form action="<?=base_url('dokumen/do_addKegiatan')?>" enctype="multipart/form-data" method="post">
        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <label for="">Pilih Dosen</label>
                    <select name="id_dosen" id="dosen" class="form-control select2" required>
                        <option value="" selected disabled>- pilih dosen -</option>
                        <?php foreach($dosen as $dos):?>
                        <option value="<?=$dos['id_dosen']?>"><?=$dos['nama_dosen']?></option>
                        <?php endforeach?>
                    </select>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="">NIP</label>
                    <input type="text" id="nip" class="form-control" readonly>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="">NIDN</label>
                    <input type="text" id="nidn" class="form-control" readonly>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="">Tema Penunjang</label>
            <input name="tema_penunjang" type="text" class="form-control" required>
        </div>
        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <label for="">Keanggotaan</label>
                    <select name="" id="anggota" class="form-control border-warning" required>
                        <option value="" selected disabled>- pilih -</option>
                        <option value="0">Sendiri</option>
                        <option value="1">Dengan Anggota</option>
                    </select>
                </div>
            </div>
        </div>

        <div id="valAnggota"></div>
        
       <div class="form-group">
            <label for="">Judul Kegiatan</label>
            <input name="judul_kegiatan" type="text" class="form-control" required>
       </div>
       <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="">Tahun Akademik</label>
                    <div class="row">
                        <div class="col">
                            <input type="number" name="tahun_akademik_1" class="form-control" required>
                        </div>
                        <span class="mx-auto my-auto">/</span>
                        <div class="col">
                            <input type="number" name="tahun_akademik_2" class="form-control" required>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="">Semester</label>
                    <select name="semester" id="" class="form-control col-md-2" required>
                        <option value="1">Ganjil</option>
                        <option value="2">Genap</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="">Deskripsi Pelaksanaan | <small><i>waktu / tempat / dll</i></small></label>
            <textarea name="keterangan_pelaksanaan" id="" cols="30" rows="10" class="form-control"></textarea>
            <script>
                CKEDITOR.replace( 'keterangan_pelaksanaan' );
            </script>
        </div>
        <div id="danaContainer">
            <div class="row" id="parentDana">
                <div class="col-4">
                    <div class="form-group">
                        <label for="">Sumber Dana</label>
                        <input name="sumber_dana[]" type="text" class="form-control" required>
                    </div>
                </div>
                <div class="col-8">
                    <div class="form-group">
                        <label for="">Jumlah ( Rp. )</label>
                        <div class="row">
                            <div class="col">
                                <input type="number" name="jumlah[]" class="form-control" required>
                            </div>
                            <div class="col">
                                <button type="button" class="btn btn-success addDana">Tambah Sumber Dana</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="">Surat Tugas</label>
            <input type="hidden" name="judul[]" placeholder="" value="Surat Tugas" class="form-control-file" >
            <input type="file" name="arsip[]" class="form-control-file" required>
        </div>
        <div class="form-group">
            <label for="">Sertifikat</label>
            <input type="hidden" name="judul[]" placeholder="" value="Sertifikat" class="form-control-file" >
            <input type="file" name="arsip[]" class="form-control-file">
        </div>
        <div class="form-group">
            <label for="">Laporan</label>
            <input type="hidden" name="judul[]" placeholder="" value="Laporan" class="form-control-file">
            <input type="file" name="arsip[]" class="form-control-file">
        </div>
        <h6><b>Dokumen Lain | </b>pdf / docx / png / jpg / jpeg</h6>
        
        
        <div class="input_fields_wrap">
            <div class="row mb-2">
                <div class="col-5">
                    <label for="">Judul Dokumen</label>
                    <input type="text" name="judul[]" placeholder="" class="form-control-file">
                </div>
                <div class="col-3">
                    <label for="">Pilih Arsip</label>
                    <input type="file" name="arsip[]" class="form-control-file">
                </div>
                <button type="button" class="btn btn-sm btn-secondary moreFile col-2">Tambah Lagi</button>
            </div>
        </div>

        <button type="submit" class="btn btn-success float-right">Simpan Dokumen</button>
    </form>
</div>