<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Front-End Toko Online by Kursus-PHP.com</title>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" />
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
  </head>
  <body>
    <?php $this->load->view('system_view/layout/top_menu') ?>
    
    <!-- Tampilkan semua produk -->
    <div class="row">
    <!-- looping products -->
      <?php foreach($daftar_buku as $buku) : ?>
      <div class="col-sm-3 col-md-3">
      <div class="thumbnail">
            <img src="<?=base_url()?>uploads/<?=$buku->nama_file;?>" style="max-width: 100%; max-height:100%; height:100px">
        <div class="caption">
        <h3 style="min-height:60px;"><?=$buku->judul_buku?></h3>
        <p><?=$buku->id_kategori?><p>
        <p><?=$buku->pengarang_buku?></p>
        <p>
          <?=anchor('welcome/add_to_cart/' . $buku->id, 'Buy' , [
            'class'  => 'btn btn-primary',
            'role'  => 'button'
          ])?>
        </p>
        </div>
      </div>
      </div>
      <?php endforeach; ?>
    <!-- end looping -->
    </div>
    
  </body>
</html>