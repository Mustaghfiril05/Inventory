<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class inventory extends CI_Controller 
{
	// public function __construct()
	// {
	// 	parent::__construct();
	// 	is_logged_in();
	// }

	public function index()
	{

        $session = $this->session->get_userdata();
		$username = $session['username'];

		$data['title'] = 'Inventory Management';
		$data['user'] = $this->db->get_where('inventory_user', ['username' => 
		$this->session->userdata('username')])->row_array();
		$data['menu'] = $this->db->get('inventory_user_menu')->result_array();
		// $data['inventory'] = $this->db->get('inventory_barang')->result_array();
        $this->load->model('Inventory_model');

        $year = date("Y");
		if(isset($_GET['filter']) && ! empty($_GET['filter'])){ // Cek apakah user telah memilih filter dan klik tombol tampilkan
            $filter = $_GET['filter']; // Ambil data filder yang dipilih user

            if($filter == '1'){ // Jika filter nya 1 (per tanggal)
                $tgl = $_GET['tanggal'];
                $url_export = 'daily_it/export?filter=1&tanggal='.$tgl;
                $inventory = $this->Inventory_model->view_by_date($tgl); // Panggil fungsi view_by_date yang ada di Inventory_model
            }else if($filter == '2'){ // Jika filter nya 2 (per bulan)
                $bulan = $_GET['bulan'];
                $tahun = $_GET['tahun'];
                $url_export = 'daily_it/export?filter=2&bulan='.$bulan.'&tahun='.$tahun;
                $inventory = $this->Inventory_model->view_by_month($bulan, $tahun); // Panggil fungsi view_by_month yang ada di Inventory_model
            }else if($filter == '3'){ // Jika filter nya 3 (per tahun)
                $tahun = $_GET['tahun'];
                $url_export = 'daily_it/export?filter=3&tahun='.$tahun;
                $inventory = $this->Inventory_model->view_by_year($tahun); // Panggil fungsi view_by_year yang ada di Inventory_model
            } else {
				$kategori = $_GET['kategori'];
                $url_export = 'daily_it/export?filter=4&kategori='.$kategori;
                $inventory = $this->Inventory_model->view_by_kategori($kategori); // Panggil fungsi view_by_year yang ada di Inventory_model
			}
        }else{ // Jika user tidak mengklik tombol tampilkan
            $url_export = 'daily_it/export';
            $inventory = $this->Inventory_model->view_all($year); // Panggil fungsi view_all yang ada di Inventory_model
        }
		$data['url_export'] = base_url($url_export);
		$data['inventory'] = $inventory;
        $data['option_tahun'] = $this->Inventory_model->option_tahun();


        $this->form_validation->set_rules('nama_barang','Nama_barang','required');
		$this->form_validation->set_rules('stock','Stock','required');
		$this->form_validation->set_rules('satuan','Satuan','required');
		$this->form_validation->set_rules('kategori','Kategori','required');
		$this->form_validation->set_rules('pengirim','Pengirim','required');
		$this->form_validation->set_rules('penerima','Penerima','required');
		$this->form_validation->set_rules('tanggal_pengiriman','Tanggal_pengiriman','required');
		$this->form_validation->set_rules('tanggal_penerimaan','Tanggal_penerimaan','required');
		$this->form_validation->set_rules('harga','Harga','required');


        $query = $this->db->query("SELECT max(id_barang) as koderequest FROM inventory_barang")->result_array();
        foreach ($query as $q) :
            $q['koderequest'];
        endforeach;	

        $kode_request = $q['koderequest'];
        $urutan = (int) substr($kode_request, -3, 3);
        $urutan++;
        //  print_r($q); 
        $month = date('m');
        $year = date('Y');
        $huruf = "BRG-$month-$year-";

        $id_barang = $huruf . sprintf("%03s", $urutan);

		if($this->form_validation->run() ==false ) {
			$this->load->view('templates/dash_header', $data);
			$this->load->view('templates/dash_sidebar', $data);
			$this->load->view('templates/dash_topbar', $data);
			$this->load->view('inventory/index', $data);
			$this->load->view('templates/dash_footer');
        } else {

            $nama_barang = $this->input->post('nama_barang');
            $stock = $this->input->post('stock');
            $satuan = $this->input->post('satuan');
            $kategori = $this->input->post('kategori');
            $pengirim = $this->input->post('pengirim');
            $penerima = $this->input->post('penerima');
            $tanggal_pengiriman = date('Y-m-d', strtotime($this->input->post('tanggal_pengiriman')));
            $tanggal_penerimaan = date('Y-m-d', strtotime($this->input->post('tanggal_penerimaan')));
            $harga = $this->input->post('harga');
            $dibuat_oleh =$username;
            

            // die($harga);
            $this->db->set('id_barang', $id_barang);
            $this->db->set('nama_barang', $nama_barang);
            $this->db->set('stock', $stock);
            $this->db->set('satuan', $satuan);
            $this->db->set('kategori', $kategori);
            $this->db->set('pengirim', $pengirim);
            $this->db->set('penerima', $penerima);
            $this->db->set('tanggal_pengiriman', $tanggal_pengiriman);
            $this->db->set('tanggal_penerimaan', $tanggal_penerimaan);
            $this->db->set('harga', $harga);
            $this->db->set('dibuat_oleh', $dibuat_oleh);
            $this->db->insert('inventory_barang');

            // $this->db->last_query(); die();
			$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">New Inventory Added!</div>');
			redirect('inventory');
		}
	}
	

	public function edit_inventory($id = null)
	{

        $session = $this->session->get_userdata();
		$username = $session['username'];

		$data['title'] = 'Edit Inventory';
		$data['user'] = $this->db->get_where('inventory_user', ['username' => 
		$this->session->userdata('username')])->row_array();

		$data['inventory'] = $this->db->get_where('inventory_barang', ['id_barang' => $id])->row_array();

		$this->form_validation->set_rules('nama_barang','Nama_barang','required');
		$this->form_validation->set_rules('stock','Stock','required');
		$this->form_validation->set_rules('satuan','Satuan','required');
		$this->form_validation->set_rules('kategori','Kategori','required');
		$this->form_validation->set_rules('pengirim','Pengirim','required');
		$this->form_validation->set_rules('penerima','Penerima','required');
		$this->form_validation->set_rules('tanggal_pengiriman','Tanggal_pengiriman','required');
		$this->form_validation->set_rules('tanggal_penerimaan','Tanggal_penerimaan','required');
		$this->form_validation->set_rules('harga','Harga','required');

		if($this->form_validation->run() ==false ) {
			$this->load->view('templates/dash_header', $data);
			$this->load->view('templates/dash_sidebar', $data);
			$this->load->view('templates/dash_topbar', $data);
			$this->load->view('inventory/edit_inventory', $data);
			$this->load->view('templates/dash_footer');
		} else {
			$id_barang = $this->input->post('id_barang');
            $nama_barang = $this->input->post('nama_barang');
            $stock = $this->input->post('stock');
            $satuan = $this->input->post('satuan');
            $kategori = $this->input->post('kategori');
            $pengirim = $this->input->post('pengirim');
            $penerima = $this->input->post('penerima');
            $tanggal_pengiriman = date('Y-m-d', strtotime($this->input->post('tanggal_pengiriman')));
            $tanggal_penerimaan = date('Y-m-d', strtotime($this->input->post('tanggal_penerimaan')));
            $harga = $this->input->post('harga');
            $dibuat_oleh =$username;

			$this->db->where('id_barang', $id_barang);
            $this->db->set('nama_barang', $nama_barang);
            $this->db->set('stock', $stock);
            $this->db->set('satuan', $satuan);
            $this->db->set('kategori', $kategori);
            $this->db->set('pengirim', $pengirim);
            $this->db->set('penerima', $penerima);
            $this->db->set('tanggal_pengiriman', $tanggal_pengiriman);
            $this->db->set('tanggal_penerimaan', $tanggal_penerimaan);
            $this->db->set('harga', $harga);
            $this->db->set('dibuat_oleh', $dibuat_oleh);
			$this->db->update('inventory_barang');
            // echo $this->db->last_query(); die();
			$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Edit Inventory Success !</div>');
			redirect('inventory');
		}
	}

	public function hapus_inventory($id_barang)
	{		
		$data['inventory'] = $this->db->get_where('inventory_barang', ['id_barang' => $id_barang])->row_array();
	
		$this->db->where('id_barang',$id_barang);
		$this->db->delete('inventory_barang');

		$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert"> Remove Inventory Success!</div>');
			redirect('inventory');


	}
	
}