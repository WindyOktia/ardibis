<a href="<?=base_url('dokumen/pendidikan')?>" class="btn btn-sm btn-secondary mb-2">kembali</a>

<div class="card card-body border-success">
    <h5><b>Tambah dokumen Pendidikan dan Pengajaran</b></h5>
    <br>
    <form action="<?=base_url('dokumen/do_addPendidikan')?>" enctype="multipart/form-data" method="post">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="">Pilih Dosen</label>
                        <select name="id_dosen" id="dosen" class="form-control border-warning select2" required> <br>
                            <option value="" selected disabled>- pilih dosen -</option>
                            <?php foreach($dosen as $dos):?>
                            <option value="<?=$dos['id_dosen']?>"><?=$dos['nama_dosen']?></option>
                            <?php endforeach?>
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="">NIP</label>
                        <input type="text" id="nip" class="form-control" readonly>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="">NIDN</label>
                        <input type="text" id="nidn" class="form-control" readonly>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="">No Sertifikasi</label>
                <input type="text" name="no_sertifikasi" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="">Pendidikan</label>
                <select class="form-control select2" id="" name="pendidikan[]" multiple="multiple" required>
                    <option value="S2">S2</option>
                    <option value="S3">S3</option>
                </select>
            </div>
            <div class="form-group">
                <label for="">Keahlian</label>
                <input type="text" name="keahlian" class="form-control" required>
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
                <label for="">Mata Kuliah</label> <br>
                <select name="id_matakuliah" id="" class="form-control col-md-4 select2" required>
                    <option value="" selected disabled>- pilih matakuliah -</option>\
                    <?php foreach($matakuliah as $makul):?>
                    <option value="<?=$makul['id_matakuliah']?>"><?=$makul['kode_matakuliah']?> - <?=$makul['nama_matakuliah']?></option>
                    <?php endforeach?>
                </select>
            </div>
            <div class="form-group">
                <label for="">Dokumen RPS</label>
                <input type="hidden" name="judul[]" value="RPS" class="form-control-file" >
                <input type="file" name="arsip[]" class="form-control-file" required>
            </div>
            <div class="form-group">
                <label for="">Dokumen RPP</label>
                <input type="hidden" name="judul[]" value="RPP" class="form-control-file" >
                <input type="file" name="arsip[]" class="form-control-file" required>
            </div>
            <br>
            <h6><b>Dokumen Lain | </b>pdf / docx / png / jpg / jpeg</h6>
            daftar dokumen lain yang diperlukan, seperti :
            <ul>
                <li>SK Mengajar</li>
                <li>SK Kelebihan Mengajar</li>
            </ul>
            <div class="input_fields_wrap">
                <div class="row mb-2">
                    <div class="col-5">
                        <label for="">Judul Dokumen</label>
                        <input type="text" name="judul[]" placeholder="cth. SK Mengajar" class="form-control-file">
                    </div>
                    <div class="col-3">
                        <label for="">Pilih Arsip</label>
                        <input type="file" name="arsip[]" class="form-control-file">
                    </div>
                    <button type="button" class="btn btn-sm btn-secondary moreFile col-2">Tambah Lagi</button>
                </div>
                
            </div>
           <button type="submit" class="btn btn-success float-right">Simpan</button>
    </form>
</div>