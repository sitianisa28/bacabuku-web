
<head>
    <title>MaBook</title>
    
    <link href="<?=base_url()?>assets/css/bootstrap.min.css" rel="stylesheet"> <!-- Bootstrap core CSS -->
    <link href="<?=base_url()?>assets/css/style.css" rel="stylesheet"> <!-- Custom styles for this template -->
</head>
<?php $this->load->view('page/header'); ?>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs/jq-3.2.1/dt-1.10.16/r-2.2.1/datatables.min.css"/>
 
<script type="text/javascript" src="https://cdn.datatables.net/v/bs/jq-3.2.1/dt-1.10.16/r-2.2.1/datatables.min.js"></script>

<!-- load sidebar in page/sidebar -->
<?php $this->load->view('page/sidebar'); ?>

<!-- Load navbar in page/navbar -->
<?php $this->load->view('page/navbar'); ?>
<div class="container-fluid">
      <!-- Main component for a primary marketing message or call to action -->
<div class="panel panel-default">
  <div class="panel-heading"><b>Form Upload Image</b></div>
  <form action="<?=base_url()?>index.php/upload/updatedata" method="post" enctype="multipart/form-data">
  <div class="panel-body">
  <?=$this->session->flashdata('pesan')?>
       <table class="table table-striped">
       <tr>
          <td style="width:15%;">File Foto</td>
          <td>
            <div class="col-sm-10">
            <input type="file" name="filefoto"><br><br>

          <!-- file lama -->
          <input type="hidden" name="filelama" value="<?=$data->nama_file?>" required>
            <!-- ID -->
          <input type="hidden" name="id" value="<?=$data->id?>" required>
            </div>
            </td>
         </tr>
        <tr>
          <td style="width:15%;">Judul</td>
          <td>
            <div class="col-sm-10">
            <input type="text" name="judul_buku" value="<?=$data->judul_buku?>" class="form-control" >
            </div>
            </td>
         </tr>
         <tr>
          <td style="width:15%;">Level Kategori</td>
          <td>
            <div class="col-sm-10">
            <input type="text" name="id_kategori" value="<?=$data->id_kategori?>" class="form-control" >
            </div>
            </td>
         </tr>
         <tr>
          <td style="width:15%;">Pengarang</td>
          <td>
            <div class="col-sm-10">
                <input name="pengarang_buku" value="<?=$data->pengarang_buku?>" class="form-control">
            </div>
            </td>
         </tr>
         <tr>
          <td style="width:15%;">Penerbit</td>
          <td>
            <div class="col-sm-10">
                <input name="penerbit_buku" value="<?=$data->penerbit_buku?>" class="form-control">
            </div>
            </td>
         </tr>
         <tr>
          <td style="width:15%;">Halaman</td>
          <td>
            <div class="col-sm-10">
                <input name="jumlah_halaman" value="<?=$data->jumlah_halaman?>" class="form-control">
            </div>
            </td>
         </tr>
         <tr>
          <td colspan="2">
          
            <input type="submit" class="btn btn-success" value="Simpan">
            <button type="reset" class="btn btn-default">Batal</button>
          </td>
         </tr>
       </table>
     </form>
        </div>
    </div>    <!-- /panel -->

    </div> <!-- /container -->
  
