<?php 
defined('BASEPATH') OR exit('No direct access allowed');
class Auth extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->load->model('Model_users');
    $this->load->library('session');
  }
  public function index(){
    $this->load->view('system_view/login/login');
  }
  function ceklogin(){
    if(isset($_POST['login'])){
      $Username = $this->input->post('Username',true);
      $Password = $this->input->post('Password',true);
      $cek = $this->Model_users->proseslogin($Username, $Password);
      $hasil = count($cek);
      if($hasil > 0){
        $yglogin = $this->db->get_where('daftar_user',array('Username'=>$Username, 'Password' => $Password))->row();
        $data = array('udhmasuk' => true,
            'Username' => $yglogin->Username);
        $this->session->set_userdata($data);
        if($yglogin->id_akses == '1'){
          redirect('dash');
        }elseif($yglogin->id_akses == '2'){
          redirect('welcome');
        }
      }else{
        redirect('auth');
      }
    }
  }
  function dash(){
    $data["title"] = "Halaman Dash";
    $this->load->view('dash', $data);
  }
  function buku(){
    $data["title"] = "Halaman Moderator";
    $this->load->view('buku', $data);
  }
  public function logout()
  {
    $this->session->sess_destroy();
    redirect('auth');
  }

}
?>