<!doctype html>
<html lang="en">
   <head>
      <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Bootstrap CSS -->
        <title>E-arsip Fakultas Bisnis UKDW</title>
        <link rel="icon" type="image/x-icon" href="<?=base_url('assets/images/')?>Logo_UKDW.png">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
        <script src="https://cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
   </head>
   <body>
        <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #FE7F2D; ">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand text-white" href="#">E-arsip Fakultas Bisnis UKDW</a>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <!-- <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#">Disabled</a>
                </li> -->
                </ul>
                <form class="form-inline my-2 my-lg-0">
                <!-- <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Login</button> -->
                <a href="" class="btn btn-sm btn-info">Bantuan</a>
                </form>
            </div>
        </nav>

        <div class="container-fluid mt-3 mb-5">
            <div class="row">
                <div class="col-md-8 col-sm-4">
                    <div class="card card-body border-info">
                        <legend><p>Kirim dokumen untuk Fakultas Bisnis</p></legend>
                       <form action="" method="post">
                            <div class="form-group">
                                <label for="">Tujuan</label>
                                <select name="" id="" class="form-control col-4" required>
                                    <option value="" selected disabled>- pilih -</option>
                                    <option value="" >anu</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Pengirim</label>
                                <input type="text" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="">Perihal</label>
                                <textarea name="" class="form-control" id="" cols="30" rows="2" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="">Keterangan Lengkap</label>
                                <textarea name="keterangan" class="form-control" id="" cols="30" rows="10" ></textarea>
                                <script>
                                    CKEDITOR.replace( 'keterangan',{height:300} );
                                </script>
                            </div>
                            <h6><b>Lampiran File | </b>pdf / docx / png / jpg / jpeg</h6>
                            <div class="input_fields_wrap">
                                <div class="row mb-2">
                                    <div class="col-5">
                                        <label for="">Judul Dokumen</label>
                                        <input type="text" name="judul[]" class="form-control-file">
                                    </div>
                                    <div class="col-4">
                                        <label for="">Pilih Arsip</label>
                                        <input type="file" name="arsip[]" class="form-control-file">
                                    </div>
                                    <button type="button" class="btn btn-sm btn-info col-2 moreFile">Tambah Lagi</button>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success float-right btn-sm mt-3">Kirim Dokumen</button>
                       </form>
                    </div>
                </div>
                <div class="col-md-4 col-sm-3">
                    <div class="card card-body border-warning">
                        <div class="text-center">
                            <img src="<?=base_url('assets/images')?>/Logo_UKDW.png" width="30%" alt="" srcset="">
                        </div>
                        <h3 class="mt-4 text-center">Fakultas Bisnis UKDW</h3>
                        <p style="font-size:20px">Login</p>
                        <form action="<?=base_url('login/do_login')?>" method="post">
                            <div class="form-group">
                                <label for="">Username</label>
                                <input type="text" name="user" class="form-control" autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label for="">Password</label>
                                <input type="password" name="pass" class="form-control">
                            </div>
                            <button type="submit" class="btn btn-success btn-block float-right">Login</button>
                        </form>
                    </div>
                </div>
            </div>
            
        </div>

      <!-- Optional JavaScript -->
      <!-- jQuery first, then Popper.js, then Bootstrap JS -->

      <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
	<script type="text/javascript">
		toastr.options = {
		"closeButton": true,
		"debug": false,
		"newestOnTop": true,
		"progressBar": true,
		"positionClass": "toast-bottom-right",
		"preventDuplicates": false,
		"onclick": null,
		"showDuration": "100",
		"hideDuration": "1000",
		"timeOut": "5000",
		"extendedTimeOut": "1000",
		"showEasing": "swing",
		"hideEasing": "linear",
		"showMethod": "fadeIn",
		"hideMethod": "fadeOut"
		}
		<?php if($this->session->flashdata('success')){ ?>
			toastr.success("<?php echo $this->session->flashdata('success'); ?>");
		<?php }else if($this->session->flashdata('error')){  ?>
			toastr.error("<?php echo $this->session->flashdata('error'); ?>");
		<?php }else if($this->session->flashdata('warning')){  ?>
			toastr.warning("<?php echo $this->session->flashdata('warning'); ?>");
		<?php }else if($this->session->flashdata('info')){  ?>
			toastr.info("<?php echo $this->session->flashdata('info'); ?>");
		<?php } ?>
	</script>

    <script>
    $(document).ready(function () {

var max_fields = 50; //maximum input boxes allowed
var wrapper = $(".input_fields_wrap"); //Fields wrapper
var addMore = $(".moreFile"); //Add button ID

var x = 1; //initlal text box count

$(addMore).click(function (e) { //on add input button click
    e.preventDefault();
    if (x < max_fields) { //max input box allowed
        x++; //text box increment
        $(wrapper).append(`
        <div class="row mb-2">
            <div class="col-5">
                <input type="text" name="judul[]" class="form-control-file">
            </div>
            <div class="col-4">
                <input type="file" name="arsip[]" class="form-control-file">
            </div>
            <button type="button" class="btn btn-sm btn-danger remove_field col-2">Hapus</button>
        </div>`); //add input box
    }
});

$(wrapper).on("click", ".remove_field", function (e) { //user click on remove text
    e.preventDefault();
    $(this).parent('div').remove();
    x--;
})


});
    </script>
   </body>
</html>