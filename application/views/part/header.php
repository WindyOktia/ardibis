<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
   <!-- Mirrored from pixinvent.com/bootstrap-admin-template/robust/html/ltr/horizontal-menu-template/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 25 Jun 2020 17:15:01 GMT -->
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
      <meta name="description" content="Robust admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template.">
      <meta name="keywords" content="admin template, robust admin template, dashboard template, flat admin template, responsive admin template, web app, crypto dashboard, bitcoin dashboard">
      <meta name="author" content="PIXINVENT">
      <title>Arsip Digital Fakultas Bisnis UKDW</title>
      <link rel="apple-touch-icon" href="<?= base_url('assets/')?>app-assets/images/ico/apple-icon-120.png">
      <link rel="icon" type="image/x-icon" href="<?=base_url('assets/images/')?>Logo_UKDW.png">
      <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i%7CMuli:300,400,500,700" rel="stylesheet">
      <!-- BEGIN VENDOR CSS-->
      <link rel="stylesheet" type="text/css" href="<?= base_url('assets/')?>app-assets/css/vendors.min.css">
      
      <link rel="stylesheet" type="text/css" href="<?= base_url('assets/')?>app-assets/vendors/css/calendars/fullcalendar.min.css">
      <!-- END VENDOR CSS-->
      <!-- BEGIN ROBUST CSS-->
      <link rel="stylesheet" type="text/css" href="<?= base_url('assets/')?>app-assets/css/app.min.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <!-- END ROBUST CSS-->
      <!-- BEGIN Page Level CSS-->
      <link rel="stylesheet" type="text/css" href="<?= base_url('assets/')?>app-assets/css/core/menu/menu-types/horizontal-menu.min.css">
      <link rel="stylesheet" type="text/css" href="<?= base_url('assets/')?>app-assets/css/plugins/calendars/fullcalendar.min.css">
      <link rel="stylesheet" type="text/css" href="<?= base_url('assets/')?>app-assets/fonts/meteocons/style.min.css">
      
      <!-- END Page Level CSS-->
      <!-- BEGIN Custom CSS-->
      <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
      <script src="https://cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
      <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
      <link rel="stylesheet" type="text/css" href="<?= base_url('assets/')?>assets/css/style.css">

      <!-- END Custom CSS-->
   </head>

   <body class="horizontal-layout horizontal-menu horizontal-menu-padding 2-columns   menu-expanded" data-open="hover" data-menu="horizontal-menu" data-col="2-columns">
      <!-- fixed-top-->
      
      <nav class="header-navbar navbar-expand-md navbar navbar-with-menu navbar-static-top navbar-light navbar-border navbar-brand-center">
         <div class="navbar-wrapper">
            <div class="navbar-header">
               <ul class="nav navbar-nav flex-row">
                  <li class="nav-item mobile-menu d-md-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu font-large-1"></i></a></li>
                  <li class="nav-item">
                     <a class="navbar-brand" href="<?=base_url('dokumen')?>">
                        <img class="brand-logo" style="width:34px;margin-left:-30px" alt="robust admin logo" src="<?= base_url('assets/images/')?>Logo_UKDW.png">
                        <h3 class="brand-text">Ardi FB-UKDW</h3>
                     </a>
                  </li>
                  <li class="nav-item d-md-none"><a class="nav-link open-navbar-container" data-toggle="collapse" data-target="#navbar-mobile"><i class="fa fa-ellipsis-v"></i></a></li>
               </ul>
            </div>
            <div class="navbar-container container center-layout">
               <div class="collapse navbar-collapse" id="navbar-mobile">
                  <ul class="nav navbar-nav mr-auto float-left">
                     <li class="nav-item d-none d-md-block"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu">         </i></a></li>
                  </ul>
                  <ul class="nav navbar-nav float-right">
                     <li class="dropdown dropdown-user nav-item">
                        <a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown"><span class="user-name"><?=$this->session->userdata('nama')?></span></a>
                        <div class="dropdown-menu dropdown-menu-right">
                           <!-- <a class="dropdown-item" href="user-profile.html"><i class="ft-user"></i> Edit Profil</a> -->
                           <!-- <div class="dropdown-divider"></div> -->
                           <a class="dropdown-item" href="<?=base_url('login/logout')?>"><i class="ft-power"></i> Logout</a>
                        </div>
                     </li>
                  </ul>
               </div>
            </div>
         </div>
      </nav>
      <!-- ////////////////////////////////////////////////////////////////////////////-->
      <div class="header-navbar navbar-expand-sm navbar navbar-horizontal navbar-fixed navbar-light navbar-without-dd-arrow navbar-shadow" role="navigation" data-menu="menu-wrapper">
         <div class="navbar-container main-menu-content container center-layout" data-menu="menu-container">
            <ul class="nav navbar-nav" id="main-menu-navigation" data-menu="menu-navigation">

               <?php foreach($role as $dash):?>
               <?php 
                  $rl=array('97');
                  if(in_array($dash['role'],$rl)){ ?>
                  <li class=" nav-item">
                     <a class= "nav-link" href="<?=base_url('dokumen')?>">
                        <i class="icon-home"></i><span data-i18n="nav.dash.main">Dashboard</span>
                     </a>
                  </li>
               <?php }?>
               <?php endforeach ?>
               
               <li class="dropdown nav-item" data-menu="dropdown">
                  <a class="dropdown-toggle nav-link" href="index.html" data-toggle="dropdown"><i class="icon-folder"></i><span data-i18n="nav.dash.main">Dokumen</span></a>
                  <ul class="dropdown-menu">

               <?php foreach($role as $pend):?>
                  <?php 
                  $rl=array('97','1');
                  if(in_array($pend['role'],$rl)){ ?>
                     <li class="" data-menu="">
                        <a class="dropdown-item" href="<?=base_url('dokumen/pendidikan')?>" data-toggle="dropdown">Pendidikan dan Pengajaran</a>
                     </li>
                  <?php }?>
               <?php endforeach ?>
               
               <?php foreach($role as $pen):?>
                  <?php 
                  $rl=array('97','2');
                  if(in_array($pen['role'],$rl)){ ?>
                     <li data-menu="">
                        <a class="dropdown-item" href="<?=base_url('dokumen/penelitian')?>" data-toggle="dropdown">Penelitian</a>
                     </li>
                     <?php }?>
               <?php endforeach ?>

               <?php foreach($role as $pub):?>
                  <?php 
                  $rl=array('97','3');
                  if(in_array($pub['role'],$rl)){ ?>
                     <li data-menu="">
                        <a class="dropdown-item" href="<?=base_url('dokumen/publikasi')?>" data-toggle="dropdown">Publikasi</a>
                     </li>
                     <?php }?>
               <?php endforeach ?>

               <?php foreach($role as $peng):?>
                  <?php 
                  $rl=array('97','4');
                  if(in_array($peng['role'],$rl)){ ?>   
                     <li data-menu="">
                        <a class="dropdown-item" href="<?=base_url('dokumen/pengabdian')?>" data-toggle="dropdown">Pengabdian Pada Masyarakat</a>
                     </li>
                     <?php }?>
               <?php endforeach ?>

               <?php foreach($role as $keg):?>
                  <?php 
                  $rl=array('97','5');
                  if(in_array($keg['role'],$rl)){ ?>
                     <li data-menu="">
                        <a class="dropdown-item" href="<?=base_url('dokumen/kegiatan')?>" data-toggle="dropdown">Kegiatan Penunjang Dosen</a>
                     </li>
                     <?php }?>
               <?php endforeach ?>

               <?php foreach($role as $ker):?>
                  <?php 
                  $rl=array('97','6');
                  if(in_array($ker['role'],$rl)){ ?>
                     <li data-menu="">
                        <a class="dropdown-item" href="<?=base_url('dokumen/kerjasama')?>" data-toggle="dropdown">Kerjasama</a>
                     </li>
                     <?php }?>
               <?php endforeach ?>

               <?php foreach($role as $sdm):?>
                  <?php 
                  $rl=array('97','7');
                  if(in_array($sdm['role'],$rl)){ ?>
                     <li data-menu="">
                        <a class="dropdown-item" href="<?=base_url('dokumen/sdm')?>" data-toggle="dropdown">SDM</a>
                     </li>
                     <?php }?>
               <?php endforeach ?>

               <?php foreach($role as $aset):?>
                  <?php 
                  $rl=array('97','8');
                  if(in_array($aset['role'],$rl)){ ?>
                     <li data-menu="">
                        <a class="dropdown-item" href="<?=base_url('dokumen/aset')?>" data-toggle="dropdown">Aset</a>
                     </li>
                     <?php }?>
               <?php endforeach ?>

               <?php foreach($role as $rencana):?>
                  <?php 
                  $rl=array('97','9');
                  if(in_array($rencana['role'],$rl)){ ?>
                     <li data-menu="">
                        <a class="dropdown-item" href="<?=base_url('dokumen/rencana')?>" data-toggle="dropdown">Rencana Fakultas</a>
                     </li>
                     <?php }?>
               <?php endforeach ?>
                  </ul>
               </li>

               <?php foreach($role as $masuk):?>
                  <?php 
                  $rl=array('97','10');
                  if(in_array($masuk['role'],$rl)){ ?>
                     <li class=" nav-item">
                        <a class= "nav-link" href="<?=base_url('dokumen/masuk')?>">
                           <i class="icon-call-in"></i><span data-i18n="nav.dash.main">Surat Masuk</span>
                        </a>
                     </li>
               <?php }?>
               <?php endforeach ?>

               <?php foreach($role as $keluar):?>
                  <?php 
                  $rl=array('97','11');
                  if(in_array($keluar['role'],$rl)){ ?>
                     <li class=" nav-item">
                        <a class= "nav-link" href="<?=base_url('dokumen/keluar')?>">
                           <i class="icon-call-out"></i><span data-i18n="nav.dash.main">Surat Keluar</span>
                        </a>
                     </li>
               <?php }?>
               <?php endforeach ?>
               
               <?php foreach($role as $renfak):?>
                  <?php 
                  $rl=array('97');
                  if(in_array($renfak['role'],$rl)){ ?>
                     <li class="dropdown nav-item" data-menu="dropdown">
                        <a class="dropdown-toggle nav-link" href="index.html" data-toggle="dropdown"><i class="icon-folder"></i><span data-i18n="nav.dash.main">Rencana Fakultas</span></a>
                        <ul class="dropdown-menu">
                           <li class="" data-menu="">
                              <a class="dropdown-item" href="<?=base_url('dokumen/pendidikan')?>" data-toggle="dropdown">Kalender Akademik</a>
                           </li>
                           <li data-menu="">
                              <a class="dropdown-item" href="<?=base_url('dokumen/penelitian')?>" data-toggle="dropdown">Daftar Rencana</a>
                           </li>
                        </ul> 
                     </li>
               <?php }?>
               <?php endforeach ?>

               <?php foreach($role as $agenda):?>
                  <?php 
                  $rl=array('97');
                  if(in_array($agenda['role'],$rl)){ ?>
                        <li class=" nav-item">
                           <a class= "nav-link" href="<?=base_url('pengaturan/agenda')?>">
                              <i class="icon-notebook"></i><span data-i18n="nav.dash.main">Agenda</span>
                           </a>
                        </li>
               <?php }?>
               <?php endforeach ?>

               <?php foreach($role as $pengaturan):?>
                  <?php 
                  $rl=array('97');
                  if(in_array($pengaturan['role'],$rl)){ ?>
                     <li class="dropdown nav-item" data-menu="dropdown">
                        <a class="dropdown-toggle nav-link" href="index.html" data-toggle="dropdown"><i class="icon-wrench"></i><span data-i18n="nav.dash.main">Pengaturan</span></a>
                        <ul class="dropdown-menu">
                        
                           <li data-menu=""><a class="dropdown-item" href="<?=base_url('pengaturan/dosen')?>" data-toggle="dropdown">Setup Dosen</a>
                           </li>
                           <li data-menu=""><a class="dropdown-item" href="<?=base_url('pengaturan/matakuliah')?>" data-toggle="dropdown">Setup Matakuliah</a>
                           </li>
                           <div class="dropdown-divider"></div>
                           <li data-menu=""><a class="dropdown-item" href="<?=base_url('pengaturan/kategori')?>" data-toggle="dropdown">Kategori Surat</a>
                           </li>
                           <li data-menu=""><a class="dropdown-item" href="<?=base_url('pengaturan')?>" data-toggle="dropdown">Daftar Admin Sistem</a>
                           </li>
                        
                        </ul>
                     </li>
               <?php }?>
               <?php endforeach ?>
            </ul>
         </div>
      </div>
      <div class="app-content container center-layout mt-2">
         <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">