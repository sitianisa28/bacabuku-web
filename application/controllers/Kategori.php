<?php 
class Kategori extends CI_Controller{
    
    function __construct()
    {
        parent::__construct();
        $this->load->model('kategori_m');
        $this->load->library('form_validation');
    }
    public function index()
    {   
        $data['title'] = 'Halaman Kategori';
        $data['ktg'] = $this->kategori_m->getAllKategori();
        
        $this->load->view('system_view/kategori/R_kategori',$data);
    }

    public function tambah() 
    {
        $data['title'] = 'Tambah Mahasiswa';
        $this->form_validation->set_rules('level', 'level', 'required');
        $this->form_validation->set_rules('kategori', 'kategori', 'required');
        if( $this->form_validation->run() == FALSE ){
            $this->load->view('system_view/kategori/C_kategori');
        }else{
            $this->kategori_m->tambahKategori();
            $this->session->set_flashdata('msg', 'Ditambahkan');
            redirect('kategori');
        }
    }


    public function edit($id){


        $data['title'] = 'Edit Data Mahasiswa';
        $data['ktg'] = $this->kategori_m->getAllKategoriById($id);
        $this->form_validation->set_rules('level', 'level', 'required');
        $this->form_validation->set_rules('kategori', 'kategori', 'required');
        
        if( $this->form_validation->run() == FALSE ){
            $this->load->view('system_view/kategori/U_kategori', $data);
        } else{
            $this->kategori_m->editKategori();
            $this->session->set_flashdata('msg', 'Diubah');
            redirect('kategori');
        }
    }

    public function hapus($id){

        $this->kategori_m->hapusKategori($id);
        $this->session->set_flashdata('msg', 'Dihapus');
        redirect('kategori');
    }
}
