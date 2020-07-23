<a href="<?=base_url('dokumen/pendidikan')?>" class="btn btn-sm btn-secondary mb-2">kembali</a>

<div class="card card-body">
    <h5><b>Tambah dokumen Pendidikan dan Pengajaran</b></h5>
    <br>
    <form action="" method="post">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="">Pilih Dosen</label>
                        <select name="" id="dosen" class="form-control border-warning select2"> <br>
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
                <input type="text" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Pendidikan</label>
                <select class="form-control select2" id="" name="pendidikan[]" multiple="multiple">
                    <option value="S2">S2</option>
                    <option value="S3">S3</option>
                </select>
            </div>
            <div class="form-group">
                <label for="">Keahlian</label>
                <input type="text" class="form-control">
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="">Tahun Akademik</label>
                        <div class="row">
                            <div class="col">
                                <input type="number" class="form-control">
                            </div>
                            <span class="mx-auto my-auto">/</span>
                            <div class="col">
                                <input type="number" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Semester</label>
                        <select name="" id="" class="form-control col-md-2">
                            <option value="">Ganjil</option>
                            <option value="">Genap</option>
                        </select>
                    </div>
                </div>
            </div>
           
            <div class="form-group">
                <label for="">Mata Kuliah</label> <br>
                <select name="" id="" class="form-control col-md-4 select2">
                    <option value="" selected disabled>- pilih matakuliah -</option>\
                    <?php foreach($matakuliah as $makul):?>
                    <option value="<?=$makul['id_matakuliah']?>"><?=$makul['kode_matakuliah']?> - <?=$makul['nama_matakuliah']?></option>
                    <?php endforeach?>
                </select>
            </div>
            <div class="form-group">
                <label for="">RPS</label>
                <input type="text" class="form-control">
            </div>
            <div class="form-group">
                <label for="">RPP</label>
                <input type="text" class="form-control">
            </div>
            <h6><b>Lampiran File | </b>pdf / docx / png / jpg / jpeg</h6>
            <div class="input_fields_wrap">
                <div class="row mb-2">
                    <div class="col-5">
                        <label for="">Judul Dokumen</label>
                        <input type="text" name="judul[]" class="form-control-file">
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