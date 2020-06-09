<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->model('model_upldgbr');
  }

  public function index()
  {
    $data['daftar_buku'] = $this->model_upldgbr->all();
    $this->load->view('system_view/welcome_message', $data);
  }
  
  public function add_to_cart($buku_id)
  {
    $buku = $this->model_upldgbr->find($buku_id);
    $data = array(
             'id'      => $buku->id,
             'judul_buku'     => $buku->judul_buku,
             'id_kategori'   => $buku->id_kategori,
             'pengarang_buku'    => $buku->pengarang_buku
          );

    $this->cart->insert($data);
    redirect(base_url());
  }
  
  public function cart(){
    // displays what currently inside the cart
    //print_r($this->cart->contents());
    $this->load->view('system_view/show_cart');
  }
  
  public function clear_cart()
  {
    $this->cart->destroy();
    redirect(base_url());
  }
}