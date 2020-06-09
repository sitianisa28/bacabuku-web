<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Upload extends CI_Controller {

  var $limit=10;
  var $offset=10;

    public function __construct() {
        parent::__construct();
        $this->load->model('model_upldgbr'); //load model model_upldgbr yang berada di folder model
        $this->load->helper(array('url')); //load helper url 
    }

    public function index($page=NULL,$offset='',$key=NULL)
    {        
        $data['query'] = $this->model_upldgbr->get_allimage(); //query dari model
        
        $this->load->view('system_view/admin/home',$data); //tampilan awal ketika controller upload di akses
    }

    public function add() {
        //view yang tampil jika fungsi add diakses pada url
        $this->load->view('system_view/admin/fupload');
    }
    
    public function insert(){
        $this->load->library('upload');
        $nama_file = "file_".time(); //nama file + fungsi time
        $config['upload_path'] = './uploads/'; //Folder untuk menyimpan hasil upload
        $config['allowed_types'] = 'gif|jpg|png|jpeg|pdf'; //type yang dapat diakses bisa anda sesuaikan
        $config['max_size'] = '3072'; //maksimum besar file 3M
        $config['max_width']  = '5000'; //lebar maksimum 5000 px
        $config['max_height']  = '5000'; //tinggi maksimu 5000 px
        $config['file_name'] = $nama_file; //nama yang terupload nantinya

        $this->upload->initialize($config);
        
        if($_FILES['filefoto']['name'])
        {
            if ($this->upload->do_upload('filefoto'))
            {
                $gambar = $this->upload->data();
                $data = array(
                  'nama_file' =>$gambar['file_name'],
                  'judul_buku' =>$this->input->post('judul_buku'),
                  'level' =>$this->input->post('level'),
                  'pengarang_buku' =>$this->input->post('pengarang_buku'),
                  'penerbit_buku' =>$this->input->post('penerbit_buku'),
                  'jumlah_halaman' =>$this->input->post('jumlah_halaman')
                );

                $this->model_upldgbr->get_insert($data); //akses model untuk menyimpan ke database
                
                //pesan yang muncul jika berhasil diupload pada session flashdata
                $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-success\" id=\"alert\">Upload gambar berhasil !!</div></div>");
                redirect('upload'); //jika berhasil maka akan ditampilkan view upload
            }else{
                //pesan yang muncul jika terdapat error dimasukkan pada session flashdata
                $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-danger\" id=\"alert\">Gagal upload gambar !!</div></div>");
                redirect('upload/add'); //jika gagal maka akan ditampilkan form upload
            }
        }
    }
    
    
// edit
public function edit($id)
{
    $kondisi = array('id' => $id );

    $data['data'] = $this->model_upldgbr->get_by_id($kondisi);
    return $this->load->view('system_view/admin/uupload',$data);
}

// update
public function updatedata()
{
    $id   = $this->input->post('id');
    $judul_buku = $this->input->post('judul_buku');
    $level = $this->input->post('level');
    $pengarang_buku = $this->input->post('pengarang_buku');
    $penerbit_buku = $this->input->post('penerbit_buku');
    $jumlah_halaman = $this->input->post('jumlah_halaman');

    $path = './uploads/';

    $kondisi = array('id' => $id );

    // get foto
    $nama_file = "file_".time();
    $config['upload_path'] = './uploads ';
    $config['allowed_types'] = 'jpg|png|jpeg|gif|pdf';
    $config['max_size'] = '2048';  //2MB max
    $config['max_width'] = '4480'; // pixel
    $config['max_height'] = '4480'; // pixel
    $config['file_name'] = $nama_file;

    $this->upload->initialize($config);

      if (!empty($_FILES['filefoto']['name'])) {
          if ( $this->upload->do_upload('filefoto') ) {
              $gambar = $this->upload->data();
              $data = array(
                            'nama_file'        => $gambar['file_name'],
                            'dokumen'          => $gambar['file_name'],
                            'judul_buku'       => $judul_buku,
                            'level'            => $level,
                            'pengarang_buku'   => $pengarang_buku,
                            'penerbit_buku'    => $penerbit_buku,
                            'jumlah_halaman'   => $jumlah_halaman,
                          );
            // hapus foto pada direktori
            @unlink($path.$this->input->post('filelama'));

                          $this->model_upldgbr->update2($data,$kondisi);
            redirect('upload');
          }else {
            die("gagal update");
          }
      }else {
        echo "tidak masuk";
      }
}
// delete
public function deletedata($id,$gambar)
{
    $path = './uploads/';
    @unlink($path.$gambar);

    $where = array('id' => $id );
    $this->model_upldgbr->delete($where);
    return redirect('upload');
}

} // end class

