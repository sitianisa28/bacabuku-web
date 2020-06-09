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
		
		<table class="table table-bordered table-striped table-hover">
			<thead>
				<tr>
					<th>#</th>
					<th>ID</th>
					<th>Judul Buku</th>
                    <th>Kategori Buku</th>
                    <th>Pengarang</th>
					<th>Jumlah Buku Yang Dibaca</th>
					<th>Subtotal</th>
				</tr>
			</thead>
			<tbody>
				<?php 
					$i=0;
					foreach ($this->cart->contents() as $items) : 
					$i++;
				?>
				<tr>
					<td><?= $i ?></td>
					<td><?= $items['id'] ?></td>
					<td><?= $items['judul_buku'] ?></td>
                    <td><?= $items['kategori_buku'] ?></td>
                    <td><?= $items['pengarang_buku'] ?></td>
					<td><?= $items['jumlah'] ?></td>
					<td align="right"><?= number_format($items['subtotal'],0,',','.') ?></td>
				</tr>
				<?php endforeach; ?>
			</tbody>
			<tfoot>
				<tr>
					<td align="right" colspan="4">Total </td>
					<td align="right"><?= number_format($this->cart->total(),0,',','.'); ?></td>
				</tr>
			</tfoot>
		</table>
		<div align="center">
			<?= anchor('welcome/clear_cart','Clear Cart',['class'=>'btn btn-danger']) ?> 
			<?= anchor(base_url(),'Continue Shopping',['class'=>'btn btn-primary']) ?> 
			<?= anchor('order','Check Out',['class'=>'btn btn-success']) ?>
		</div>
	</body>
</html>