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

<script>
    $( function() {
    $( "#datepicker" ).datepicker({
        
                  dateFormat : "dd-mm-yy",
                  showAnim:""	,
                  minDate: -0, 
                  maxDate: "+1M",

    });

    $( "#datepicker2" ).datepicker({
        
                  dateFormat : "dd-mm-yy",
                  showAnim:""	,
                  minDate: -0, 
                  maxDate: "+2W",

    });
  } );
  
</script>


<div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <?php if ( NULL !== $this->session->flashdata('message')){echo $this->session->flashdata('message');} ?>
                            <div class="card card-plain table-plain-bg">
                                <div class="card-header ">
                                    <h4 class="card-title">Data-Data Buku</h4>
                                    <div class="pull-right">
                                        <a href="<?=site_url('upload/add')?>" clas="btn btn-primary btn-flat">
                                            <i class="fa fa-user-plus"></i>Create
                                        </a>
                                    </div>
                                    <p class="card-category"></p>
                                </div>
                                <div class="card-body table-full-width table-responsive">
                                    <table class="table table-bordered table-striped">
                                                <tr>
                                                <th>#</th>
                                                <th>Nama File</th>
                                                <th>Gambar File</th>
                                                <th>nama dokumen</th>
                                                <th>File</th>
                                                <th>Judul Buku</th>
                                                <th>ID Kategori</th>
                                                <th>Pengarang Buku</th>
                                                <th>Penerbit Buku</th>
                                                <th>Jumlah Halaman</th>
                                                <th>Aksi</th>
                                                </tr>
                                                <?php $no = 1;
                                            foreach($query as $key => $data) { ?>
                                            <tr>
                                                <td><?=$no++?></td>
                                                <td><?=$data->nama_file?></td>
                                                <td><img src="<?=base_url()?>uploads/<?=$data->nama_file;?>" width="50px" height="50px"></td>
                                                <td><?=$data->dokumen?></td>
                                                <td><img src="<?=base_url()?>uploads/<?=$data->nama_file;?>" width="50px" height="50px"></td>
                                                <td><?=$data->judul_buku?></td>
                                                <td><?=$data->id_kategori?></td>
                                                <td><?=$data->pengarang_buku?></td>
                                                <td><?=$data->penerbit_buku?></td>
                                                <td><?=$data->jumlah_halaman?></td>
                                                <td class="text-center" width="160px">
                                                <!--aksi-->
                                                <a href="<?=site_url('upload/edit/'.$data->id)?>" class="btn btn-primary btn-xs">
                                                        <i class="pe-7s-edit"></i> Update</a>
                                                    <a href="<?=site_url()?>upload/deletedata/<?=$data->id?>/<?=$data->nama_file?>" class="btn btn-danger">
                                                        <i class="pe-7s-shield"></i> Delete</a>
                                                    </button>
                                                </form>
                                                </td>
                                            </tr>
                                            <?php
                                            } ?>
  </table>

</div>
</div>
</div>
<?php $this->load->view('page/footer'); ?>

</body>

    <!--   Core JS Files   -->
    <?php $this->load->view('page/js'); ?>

<script type="text/javascript">$(document).ready(function(){$("#table-ah").dataTable();});</script>
</html>