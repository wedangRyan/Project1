<?php defined('BASEPATH') OR exit('No direct script access allowed');
require_once 'functions.php';
/**
* This is admin Controller
*/
class admin extends CI_Controller
{
	
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('apotek_data');
        $this->load->database();
        $this->load->helper(array('form', 'url'));
       
        $data['nullstock'] = $this->apotek_data->countstock();
        $data['nullex'] = $this->apotek_data->countex();
        $this->template->write_view('sidenavs', 'template/default_sidenavs_admin', true);
		$this->template->write_view('navs', 'template/default_topnavs_admin.php', $data, true);
		if($this->session->login['status'] != 'is_login') redirect('login');
	}

	

	function index() {
		$data['stockobat'] = $this->apotek_data->count_med();
		$data['stockkat'] = $this->apotek_data->count_cat();
		$data['sup'] = $this->apotek_data->count_sup();
		$data['unit'] = $this->apotek_data->count_unit();
		$data['inv'] = $this->apotek_data->count_inv();
		$data['pur'] = $this->apotek_data->count_pur();
		$data['totpur'] = $this->apotek_data->count_totpur();
		$data['totinv'] = $this->apotek_data->count_totinv();

		$this->template->write('title', 'Beranda', TRUE);
		$this->template->write('header', 'Sistem Informasi Apotek');
		$this->template->write_view('content', 'admin/mypage', $data, true);

		$this->template->render();
	}

	

	function dashboard() {
		$data['stockobat'] = $this->apotek_data->count_med();
		$data['stockkat'] = $this->apotek_data->count_cat();
		$data['sup'] = $this->apotek_data->count_sup();
		$data['unit'] = $this->apotek_data->count_unit();
		$data['inv'] = $this->apotek_data->count_inv();
		$data['pur'] = $this->apotek_data->count_pur();
		$data['totpur'] = $this->apotek_data->count_totpur();
		$data['totinv'] = $this->apotek_data->count_totinv();

		$this->template->write('title', 'Beranda', TRUE);
		$this->template->write('header', 'Sistem Informasi Apotek');
		$this->template->write_view('content', 'admin/mypage', $data, true);

		$this->template->render();
	}

	

	function table_exp() {
		$data['table_exp'] = $this->apotek_data->expired()->result();
		$data['table_alex'] = $this->apotek_data->almostex()->result();
		$this->template->write('title', 'Obat kedaluwarsa', TRUE);
		$this->template->write('header', 'Sistem Informasi Apotek');
		$this->template->write_view('content', 'admin/table_exp', $data, true);

		$this->template->render();

	}

	function table_stock() {
		$data['table_stock'] = $this->apotek_data->outstock()->result();
		$data['table_alstock'] = $this->apotek_data->almostout()->result();
		$this->template->write('title', 'Obat Habis', TRUE);
		$this->template->write('header', 'Sistem Informasi Apotek');
		$this->template->write_view('content', 'admin/table_stock', $data,  true);

		$this->template->render();
	}

	function form_cat() {
		$this->template->write('title', 'Tambah Kategori', TRUE);
		$this->template->write('header', 'Sistem Informasi Apotek');
		$this->template->write_view('content', 'admin/form_cat', '', true);

		$this->template->render();
	}

	function form_unit() {
		$this->template->write('title', 'Tambah Unit', TRUE);
		$this->template->write('header', 'Sistem Informasi Apotek');
		$this->template->write_view('content', 'admin/form_unit', '', true);

		$this->template->render();
	}

	function form_med() {
		$dariDB = $this->apotek_data->cekkodecheck();
        // contoh JRD0004, angka 3 adalah awal pengambilan angka, dan 4 jumlah angka yang diambil
        $nourut = substr($dariDB, 3, 4);
        $kodeBarangSekarang = $nourut + 1;
        $data['checkodeobat'] = $kodeBarangSekarang;

		$data['get_cat'] = $this->apotek_data->get_category();
		$data['get_sup'] = $this->apotek_data->get_supplier();
		$data['get_unit'] = $this->apotek_data->get_unit();
		$this->template->write('title', 'Tambah Obat', TRUE);
		$this->template->write('header', 'Sistem Informasi Apotek');
		$this->template->write_view('content', 'admin/form_med', $data, true);

		$this->template->render();
	}

	function form_karyawan() {
		$this->template->write('title', 'Tambah Karyawan', TRUE);
		$this->template->write('header', 'Sistem Informasi Apotek');
		$this->template->write_view('content', 'admin/form_karyawan','', true);

		$this->template->render();
	}

	function form_pasien() {
		$this->template->write('title', 'Tambah Pasien', TRUE);
		$this->template->write('header', 'Sistem Informasi Apotek');
		$this->template->write_view('content', 'admin/form_pasien','', true);

		$this->template->render();
	}

	function form_check($id_pasien) {
		$where = array('id_pasien' => $id_pasien);
		$data['table_pasien'] = $this->apotek_data->edit_data($where,'table_pasien')->result();
		$this->template->write('title', 'Tambah Check Up', TRUE);
		$this->template->write('header', 'Sistem Informasi Apotek');
		$this->template->write_view('content', 'admin/form_check', $data, true);

		$this->template->render();
	}



	function table_med() {
		
		$data['table_med'] = $this->apotek_data->medicine()->result();
		$this->template->write('title', 'Lihat Obat', TRUE);
		$this->template->write('header', 'Sistem Informasi Apotek');
		$this->template->write_view('content', 'admin/table_med', $data, true);

		$this->template->render();
	}

	function table_karyawan() {
		
		$data['table_karyawan'] = $this->apotek_data->tab_karyawan()->result();
		$this->template->write('title', 'Lihat Obat', TRUE);
		$this->template->write('header', 'Sistem Informasi Apotek');
		$this->template->write_view('content', 'admin/table_karyawan', $data, true);

		$this->template->render();
	}

	function table_pasien() {
		
		$data['table_pasien'] = $this->apotek_data->tab_pasien()->result();
		$this->template->write('title', 'Lihat Obat', TRUE);
		$this->template->write('header', 'Sistem Informasi Apotek');
		$this->template->write_view('content', 'admin/table_pasien', $data, true);

		$this->template->render();
	}

	function table_check() {
		
		$data['table_check'] = $this->apotek_data->tab_check()->result();
		$this->template->write('title', 'Lihat Obat', TRUE);
		$this->template->write('header', 'Sistem Informasi Apotek');
		$this->template->write_view('content', 'admin/table_check', $data, true);

		$this->template->render();
	}

	function table_login() {
		
		$data['table_login'] = $this->apotek_data->tab_login()->result();
		$this->template->write('title', 'Lihat Data Login', TRUE);
		$this->template->write('header', 'Sistem Informasi Apotek');
		$this->template->write_view('content', 'admin/table_login', $data, true);

		$this->template->render();
	}

	function table_unit() {
		
		$data['table_unit'] = $this->apotek_data->unit()->result();
		$this->template->write('title', 'Lihat Unit', TRUE);
		$this->template->write('header', 'Sistem Informasi Apotek');
		$this->template->write_view('content', 'admin/table_unit', $data, true);

		$this->template->render();
		
	}


	function invoice_report() {		
		$this->template->write('title', 'Grafik Penjualan', TRUE);
		$this->template->write('header', 'Sistem Informasi Apotek');
		$this->template->write_view('content', 'admin/invoice_report', true);

		$this->template->render();
		
	}

	function purchase_report() {

		$this->template->write('title', 'Grafik Pembelian', TRUE);
		$this->template->write('header', 'Sistem Informasi Apotek');
		$this->template->write_view('content', 'admin/purchase_report', true);

		$this->template->render();
		
	}

	function report() {
		$data['totpur'] = $this->apotek_data->count_totpur();
		$data['totinv'] = $this->apotek_data->count_totinv();
		$data['report'] = $this->apotek_data->get_report();
		$this->template->write('title', 'Laporan', TRUE);
		$this->template->write('header', 'Sistem Informasi Apotek');
		$this->template->write_view('content', 'admin/report', $data, true);

		$this->template->render();
		
	}

	function reporttotal() {
		$data['totpur'] = $this->apotek_data->count_totpur();
		$data['totinv'] = $this->apotek_data->count_totinv();
		$data['report'] = $this->apotek_data->get_report();
		$this->template->write('title', 'Laporan', TRUE);
		$this->template->write('header', 'Sistem Informasi Apotek');
		$this->template->write_view('content', 'admin/reporttotal', $data, true);

		$this->template->render();
		
	}

	function table_cat() {
		
		$data['table_cat'] = $this->apotek_data->category()->result();
		$this->template->write('title', 'Lihat Kategori', TRUE);
		$this->template->write('header', 'Sistem Informasi Apotek');
		$this->template->write_view('content', 'admin/table_cat', $data, true);

		$this->template->render();
	}

	function table_sup() {
		$data['table_sup'] = $this->apotek_data->supplier()->result();
		
		$this->template->write('title', 'Lihat Pemasok', TRUE);
		$this->template->write('header', 'Sistem Informasi Apotek');
		$this->template->write_view('content', 'admin/table_sup', $data, true);

		$this->template->render();
	}

	

	function form_sup() {
		$this->template->write('title', 'Tambah Pemasok', TRUE);
		$this->template->write('header', 'Sistem Informasi Apotek');
		$this->template->write_view('content', 'admin/form_sup', '', true);

		$this->template->render();
	}


	

	function form_invoice() {
		$dariDB = $this->apotek_data->cekkodecheck();
        // contoh JRD0004, angka 3 adalah awal pengambilan angka, dan 4 jumlah angka yang diambil
        $nourut = substr($dariDB, 3, 4);
        $kodeBarangSekarang = $nourut + 1;
        $data['checkode'] = $kodeBarangSekarang;

		$daripasien = $this->apotek_data->cekkodepasien();
		$nourut = substr($daripasien, 3, 4);
        $kodepasien = $nourut + 1;
		$data['checkodepasien'] = $kodepasien;

		$data['sess'] = $this->session->set_userdata('nama');
		$data['table_med'] = $this->apotek_data->medicine()->result();
		$data['get_cat'] = $this->apotek_data->get_category();
		$data['get_med'] = $this->apotek_data->get_medicine();
		$data['get_check'] = $this->apotek_data->get_check();
		$data['get_unit'] = $this->apotek_data->get_unit();
		$data['get_pasien'] = $this->apotek_data->get_pasien();
		$data['tab_pasien'] = $this->apotek_data->tab_pasien()->result();
		$data['tab_check'] = $this->apotek_data->tab_check()->result();
		$this->template->write('title', 'Tambah Penjualan', TRUE);
		$this->template->write('header', 'Sistem Informasi Apotek');
		$this->template->write_view('content', 'admin/form_invoice', $data, true);

		$this->template->render();
	}


	function form_purchase() {
		$data['table_med'] = $this->apotek_data->medicine()->result();
		$data['get_sup'] = $this->apotek_data->get_supplier();
		
		$data['get_med'] = $this->apotek_data->get_medicine();
		
		$this->template->write('title', 'Tambah Pembelian', TRUE);
		$this->template->write('header', 'Sistem Informasi Apotek');
		$this->template->write_view('content', 'admin/form_purchase', $data, true);

		$this->template->render();
	}

	function table_purchase() {
		$data['table_purchase'] = $this->apotek_data->purchase()->result();
		
		$this->template->write('title', 'Lihat Pembelian', TRUE);
		$this->template->write('header', 'Sistem Informasi Apotek');
		$this->template->write_view('content', 'admin/table_purchase', $data, true);

		$this->template->render();
	}

	function getmedbysupplier(){
        $nama_pemasok=$this->input->post('nama_pemasok');
        $data=$this->apotek_data->getmedbysupplier($nama_pemasok);
        echo json_encode($data);
    }


	

	function form_customer() {
		$this->template->write('title', 'Tambah Pelanggan', TRUE);
		$this->template->write('header', 'Sistem Informasi Apotek');
		$this->template->write_view('content', 'admin/form_customer', '', true);

		$this->template->render();
	}

	

	function table_customer() {
		$this->template->write('title', 'Lihat Pelanggan', TRUE);
		$this->template->write('header', 'Sistem Informasi Apotek');
		$this->template->write_view('content', 'admin/table_customer', '', true);

		$this->template->render();
	}

	function table_invoice() {
		$data['table_invoice'] = $this->apotek_data->invoice()->result();
		$this->template->write('title', 'Lihat Penjualan', TRUE);
		$this->template->write('header', 'Sistem Informasi Apotek');
		$this->template->write_view('content', 'admin/table_invoice', $data, true);

		$this->template->render();
	}



	function add_medicine()
	{
		$id_obat = $this->input->post('id_obat');
		$nama_obat = $this->input->post('nama_obat');
		$warna = $this->input->post('warna');
		$stok = $this->input->post('stok');
		$unit = $this->input->post('unit');
		$kedaluwarsa = date("Y-m-d",strtotime($this->input->post('kedaluwarsa')));
		$des_obat = $this->input->post('des_obat');
		$harga_beli = $this->input->post('harga_beli');
		$harga_jual = $this->input->post('harga_jual');
		$nama_pemasok = $this->input->post('nama_pemasok');
 
		$data = array(
			'id_obat' => $id_obat,
			'nama_obat' => $nama_obat,
			'warna' => $warna,
			'stok' => $stok,
			'unit' => $unit,
			'kedaluwarsa' => $kedaluwarsa,
			'des_obat' => $des_obat,
			'harga_beli' => $harga_beli,
			'harga_jual' => $harga_jual,
			'nama_pemasok' => $nama_pemasok,
			
			);
		$this->apotek_data->insert_data($data,'table_med');

		$this->session->set_flashdata('med_added', 'Obat berhasil ditambahkan');
		redirect('admin/table_med');

	}

	function add_karyawan()
	{
		$nik = $this->input->post('nik');
		$nama = $this->input->post('nama');
		$umur = $this->input->post('umur');
		$tempat_lahir = $this->input->post('tempat_lahir');
		$tanggal_lahir = date("Y-m-d",strtotime($this->input->post('tanggal_lahir')));
		$tempat_tinggal = $this->input->post('tempat_tinggal');
		$foto = $this->input->post('foto');
		$role = $this->input->post('role');
 
		$data = array(
			'nik' => $nik,
			'nama' => $nama,
			'umur' => $umur,
			'tempat_lahir' => $tempat_lahir,
			'tanggal_lahir' => $tanggal_lahir,
			'tempat_tinggal' => $tempat_tinggal,
			'foto' => $foto,
			'role' => $role,
			
			);
		$this->apotek_data->insert_data($data,'table_karyawan');

		$this->session->set_flashdata('karyawan_added', 'Data berhasil ditambahkan');
		redirect('admin/table_karyawan');

	}

	function add_pasien()
	{
		$nik = $this->input->post('nik');
		$nama_pasien = $this->input->post('nama_pasien');
		$umur = $this->input->post('umur');
		$alamat = $this->input->post('alamat');
		$no_hp = $this->input->post('no_hp');
		$tanggal_lahir = date("Y-m-d",strtotime($this->input->post('tanggal_lahir')));
		$tanggal_input = date("Y-m-d",strtotime("now"));
 
		$data = array(
			'nik' => $nik,
			'nama_pasien' => $nama_pasien,
			'umur' => $umur,
			'alamat' => $alamat,
			'no_hp' => $no_hp,
			'tanggal_lahir' => $tanggal_lahir,
			'tanggal_input' => $tanggal_input,
			
			);
		$this->apotek_data->insert_data($data,'table_pasien');

		$this->session->set_flashdata('pasien_added', 'Data berhasil ditambahkan');
		redirect('admin/table_pasien');

	}

	function add_pasien_invoice()
	{
		$nik = $this->input->post('nik');
		$id_pasien = $this->input->post('id_pasien');
		$nama_pasien = $this->input->post('nama_pasien');
		$umur = $this->input->post('umur');
		$alamat = $this->input->post('alamat');
		$no_hp = $this->input->post('no_hp');
		$tanggal_lahir = date("Y-m-d",strtotime($this->input->post('tanggal_lahir')));
		$tanggal_input = date("Y-m-d",strtotime("now"));
 
		$data = array(
			'nik' => $nik,
			'nama_pasien' => $nama_pasien,
			'umur' => $umur,
			'alamat' => $alamat,
			'no_hp' => $no_hp,
			'tanggal_lahir' => $tanggal_lahir,
			'tanggal_input' => $tanggal_input,
			'id_pasien' => $id_pasien,
			);
		$this->apotek_data->insert_data($data,'table_pasien');

		$this->session->set_flashdata('pasien_added', 'Data berhasil ditambahkan');
		redirect('admin/form_invoice');

	}

	function add_check()
	{
		$id_pasien = $this->input->post('id_pasien');
		$nama_pasien = $this->input->post('nama_pasien');
		$keadaan = $this->input->post('keadaan');
		$resep = $this->input->post('resep');
		$harga_jual = $this->input->post('harga_jual');
		$tanggal_tindakan = date("Y-m-d",strtotime("now"));
 
		$data = array(
			'id_pasien' => $id_pasien,
			'nama_pasien' => $nama_pasien,
			'keadaan' => $keadaan,
			'resep' => $resep,
			'harga_jual' => $harga_jual,
			'tanggal_tindakan' => $tanggal_tindakan,
			
			);
		$this->apotek_data->insert_data($data,'table_check');

		$this->session->set_flashdata('check_added', 'Data berhasil ditambahkan');
		redirect('admin/table_check');

	}

	function add_check_invoice()
	{
		$id_check = $this->input->post('id_check');
		$id_pasien = $this->input->post('id_pasien');
		$nama_pasien = $this->apotek_data->get_pasien_coba($id_pasien);
		$keadaan = $this->input->post('keadaan');
		$resep = $this->input->post('resep');
		$harga_jual = $this->input->post('harga_jual');
		$tanggal_tindakan = date("Y-m-d",strtotime("now"));
 
		$data = array(
			'id_check' => $id_check,
			'id_pasien' => $id_pasien,
			'nama_pasien' => $nama_pasien,
			'keadaan' => $keadaan,
			'resep' => $resep,
			'harga_jual' => $harga_jual,
			'tanggal_tindakan' => $tanggal_tindakan,
			
			);
		$this->apotek_data->insert_data($data,'table_check');

		$this->session->set_flashdata('check_added', 'Data berhasil ditambahkan');
		redirect('admin/form_invoice');

	}

	function add_category(){
		$nama_kategori = $this->input->post('nama_kategori');
		$des_kat = $this->input->post('des_kat');
 
		$data = array(
			'nama_kategori' => $nama_kategori,
			'des_kat' => $des_kat,
			
			);
		$this->apotek_data->insert_data($data,'table_cat');

		$this->session->set_flashdata('cat_added', 'Kategori berhasil ditambahkan');
		redirect('admin/table_cat');
	}

	function add_unit(){
		$unit = $this->input->post('unit');
		$data = array(
			'unit' => $unit,
			
			
			);
		$this->apotek_data->insert_data($data,'table_unit');

		$this->session->set_flashdata('unit_added', 'Unit berhasil ditambahkan');
		redirect('admin/table_unit');
	}


	function add_supplier(){
		$nama_pemasok = $this->input->post('nama_pemasok');
		$alamat = $this->input->post('alamat');
		$telepon = $this->input->post('telepon');
 
		$data = array(
			'nama_pemasok' => $nama_pemasok,
			'alamat' => $alamat,
			'telepon' => $telepon,
			);
		$this->apotek_data->insert_data($data,'table_sup');

		$this->session->set_flashdata('sup_added', 'Pemasok berhasil ditambahkan');
		redirect('admin/table_sup');
	}

	


	function add_invoice(){
		 	$nama = $this->input->post('nama');
			$id_pasien = $this->input->post('id_pasien');
			$nama_pembeli = $this->apotek_data->get_pasien_coba($id_pasien);
			$nama_pembeli_coba = json_encode($nama_pembeli);
			$tgl_beli = date("Y-m-d H:i:s",strtotime($this->input->post('tgl_beli')));
			$grandtotal = $this->input->post('grandtotal');
			$ref = generateRandomString();
			$nama_obat = $this->input->post('nama_obat');
			$harga_jual = $this->input->post('harga_jual');
			$banyak = $this->input->post('banyak');
			$subtotal = $this->input->post('subtotal');
			$id_check = $this->input->post('id_check');

		foreach($nama_obat as $key=>$val){
		   
		$data[] = array(
				'id_pasien' => $id_pasien,
				'nama_kasir' => $nama,
				'tgl_detail' => $tgl_beli,
				'grandtotal' => $grandtotal,
				'ref' => $ref,
				'nama_obat' => $val,
				'harga_jual' => $harga_jual[$key],
				'banyak' => $banyak[$key],
				'subtotal' => $subtotal[$key],
				'nama_pembeli' => $nama_pembeli,
				'id_check' => $id_check[$key],
				'tgl_beli' => date('Y-m-d',strtotime('now')),
				);

		$this->db->set('stok', 'stok-'.$banyak[$key], FALSE);
	    $this->db->where('nama_obat', $val);
	    $updated = $this->db->update('table_med');
		
		}
		
		$this->db->insert_batch('table_invoice', $data);

		$this->session->set_flashdata('inv_added', 'Penjualan berhasil ditambahkan');
		redirect('admin/table_invoice');
	}

	function add_purchase(){
			$nama = $this->input->post('nama');
			$nama_pemasok = $this->input->post('nama_pemasok');
			$tgl_beli = date("Y-m-d",strtotime($this->input->post('tgl_beli')));
			$grandtotal = $this->input->post('grandtotal');
			$ref = generateRandomString();
			$nama_obat = $this->input->post('nama_obat');
			$harga_beli = $this->input->post('harga_beli');
			$banyak = $this->input->post('banyak');
			$subtotal = $this->input->post('subtotal');

		foreach($nama_obat as $key=>$val){
		   
		$data[] = array(
				'nama_pemasok' => $nama_pemasok,
				'nama_kasir' => $nama,
				'tgl_beli' => $tgl_beli,
				'grandtotal' => $grandtotal,
				'ref' => $ref,
				'nama_obat' => $val,
				'harga_beli' => $harga_beli[$key],
				'banyak' => $banyak[$key],
				'subtotal' => $subtotal[$key],
				
				);

		$this->db->set('stok', 'stok+'.$banyak[$key], FALSE);
	    $this->db->where('nama_obat', $val);
	    $updated = $this->db->update('table_med');
		
		}
		
		$this->db->insert_batch('table_purchase', $data);
		$this->session->set_flashdata('pur_added', 'Pembelian berhasil ditambahkan');
		redirect('admin/table_purchase');
		
	}



	function invoice_page($ref) {
		$where = array('ref' => $ref);
		$data['table_invoice'] = $this->apotek_data->show_data($where, 'table_invoice')->result();
		$data['show_invoice'] = $this->apotek_data->show_invoice($where, 'table_invoice')->result();
		$this->template->write('title', 'Invoice Penjualan', TRUE);
		$this->template->write('header', 'Sistem Informasi Apotek');
		$this->template->write_view('content', 'admin/invoice', $data, true);

		$this->template->render();
	}


	function purchase_page($ref) {
		$where = array('ref' => $ref);
		$data['table_purchase'] = $this->apotek_data->show_data($where, 'table_purchase')->result();
		$data['show_invoice'] = $this->apotek_data->show_invoice($where, 'table_purchase')->result();
		$this->template->write('title', 'Invoice Pembelian', TRUE);
		$this->template->write('header', 'Sistem Informasi Apotek');
		$this->template->write_view('content', 'admin/purchase', $data, true);

		$this->template->render();
	}


	function edit_form_cat($id_kat) {
		$where = array('id_kat' => $id_kat);
		$data['table_cat'] = $this->apotek_data->edit_data($where,'table_cat')->result();
		$this->template->write('title', 'Ubah Kategori', TRUE);
		$this->template->write('header', 'Sistem Informasi Apotek');
		$this->template->write_view('content', 'admin/edit_form_cat', $data, true);

		$this->template->render();
	}

	function update_category(){
		$id_kat = $this->input->post('id_kat');
		$nama_kategori = $this->input->post('nama_kategori');
		$des_kat = $this->input->post('des_kat');

		$data = array(
			'nama_kategori' => $nama_kategori,
			'des_kat' => $des_kat,
		);

		$where = array(
			'id_kat' => $id_kat
		);

		$this->apotek_data->update_data($where,$data,'table_cat');

		$this->session->set_flashdata('cat_added', 'Data kategori berhasil diperbarui');
		redirect('admin/table_cat');
	}

	function edit_form_med($id_obat) {
		$data['get_cat'] = $this->apotek_data->get_category();
		$data['get_sup'] = $this->apotek_data->get_supplier();
		$data['get_unit'] = $this->apotek_data->get_unit();
		$where = array('id_obat' => $id_obat);
		$data['table_med'] = $this->apotek_data->edit_data($where,'table_med')->result();
		$this->template->write('title', 'Ubah Obat', TRUE);
		$this->template->write('header', 'Sistem Informasi Apotek');
		$this->template->write_view('content', 'admin/edit_form_med', $data, true);

		$this->template->render();
	}

	function edit_form_karyawan($id) {
		$where = array('id' => $id);
		$data['table_karyawan'] = $this->apotek_data->edit_data($where,'table_karyawan')->result();
		$this->template->write('title', 'Ubah Data', TRUE);
		$this->template->write('header', 'Sistem Informasi Apotek');
		$this->template->write_view('content', 'admin/edit_form_karyawan', $data, true);

		$this->template->render();
	}

	function edit_form_pasien($id_pasien) {
		$where = array('id_pasien' => $id_pasien);
		$data['table_pasien'] = $this->apotek_data->edit_data($where,'table_pasien')->result();
		$this->template->write('title', 'Ubah Data', TRUE);
		$this->template->write('header', 'Sistem Informasi Apotek');
		$this->template->write_view('content', 'admin/edit_form_pasien', $data, true);

		$this->template->render();
	}

	function edit_form_check($id_check) {
		$where = array('id_check' => $id_check);
		$data['table_check'] = $this->apotek_data->edit_data($where,'table_check')->result();
		$this->template->write('title', 'Ubah Data', TRUE);
		$this->template->write('header', 'Sistem Informasi Apotek');
		$this->template->write_view('content', 'admin/edit_form_check', $data, true);

		$this->template->render();
	}

	function edit_form_login($id) {
		$where = array('id' => $id);
		$data['table_login'] = $this->apotek_data->edit_data($where,'user')->result();
		$this->template->write('title', 'Ubah Data', TRUE);
		$this->template->write('header', 'Sistem Informasi Apotek');
		$this->template->write_view('content', 'admin/edit_form_login', $data, true);

		$this->template->render();
	}

	function update_karyawan(){
		$id = $this->input->post('id');
		$nik = $this->input->post('nik');
		$nama = $this->input->post('nama');
		$umur = $this->input->post('umur');
		$tempat_lahir = $this->input->post('tempat_lahir');
		$tanggal_lahir = date("Y-m-d",strtotime($this->input->post('tanggal_lahir')));
		$tempat_tinggal = $this->input->post('tempat_tinggal');
		$foto = $this->input->post('foto');
		$role = $this->input->post('role');
 
		$data = array(
			'nik' => $nik,
			'nama' => $nama,
			'umur' => $umur,
			'tempat_lahir' => $tempat_lahir,
			'tanggal_lahir' => $tanggal_lahir,
			'tempat_tinggal' => $tempat_tinggal,
			'foto' => $foto,
			'role' => $role,
			
			);

		$where = array(
			'id' => $id
		);

		$this->apotek_data->update_data($where,$data,'table_karyawan');
		$this->session->set_flashdata('karyawan_added', 'Data berhasil diperbarui');
		redirect('admin/table_karyawan');
	}

	function update_pasien(){
		$id_pasien = $this->input->post('id_pasien');
		$nik = $this->input->post('nik');
		$nama_pasien = $this->input->post('nama_pasien');
		$umur = $this->input->post('umur');
		$alamat = $this->input->post('alamat');
		$no_hp = $this->input->post('no_hp');
		$tanggal_lahir = date("Y-m-d",strtotime($this->input->post('tanggal_lahir')));
 
		$data = array(
			'nik' => $nik,
			'nama_pasien' => $nama_pasien,
			'umur' => $umur,
			'alamat' => $alamat,
			'no_hp' => $no_hp,
			'tanggal_lahir' => $tanggal_lahir,
			
			);

		$where = array(
			'id_pasien' => $id_pasien
		);

		$this->apotek_data->update_data($where,$data,'table_pasien');
		$this->session->set_flashdata('pasien_added', 'Data berhasil diperbarui');
		redirect('admin/table_pasien');
	}

	function update_check(){
		$id_check = $this->input->post('id_check');
		$id_pasien = $this->input->post('id_pasien');
		$nama_pasien = $this->input->post('nama_pasien');
		$keadaan = $this->input->post('keadaan');
		$resep = $this->input->post('resep');
		$harga_jual = $this->input->post('harga_jual');
		$tanggal_tindakan = date("Y-m-d",strtotime("now"));
 
		$data = array(
			'id_check' => $id_check,
			'id_pasien' => $id_pasien,
			'nama_pasien' => $nama_pasien,
			'keadaan' => $keadaan,
			'resep' => $resep,
			'harga_jual' => $harga_jual,
			'tanggal_tindakan' => $tanggal_tindakan,
			
			);

		$where = array(
			'id_pasien' => $id_pasien
		);

		$this->apotek_data->update_data($where,$data,'table_pasien');
		$this->session->set_flashdata('pasien_added', 'Data berhasil diperbarui');
		redirect('admin/table_pasien');
	}

	function update_login(){
		$id = $this->input->post('id');
		$username = $this->input->post('username');
		$password = $this->input->post('password');
 
		$data = array(
			'username' => $username,
			'password' => md5($password)
			
			);

		$where = array(
			'id' => $id
		);

		$this->apotek_data->update_data($where,$data,'user');
		$this->session->set_flashdata('login_added', 'Data Login berhasil diperbarui');
		redirect('admin/table_karyawan');
	}

	function update_med(){
		$id_obat = $this->input->post('id_obat');
		$nama_obat = $this->input->post('nama_obat');
		$warna = $this->input->post('warna');
		$stok = $this->input->post('stok');
		$unit = $this->input->post('unit');
		$kedaluwarsa = date("Y-m-d",strtotime($this->input->post('kedaluwarsa')));
		$des_obat = $this->input->post('des_obat');
		$harga_beli = $this->input->post('harga_beli');
		$harga_jual = $this->input->post('harga_jual');
		$nama_pemasok = $this->input->post('nama_pemasok');
	
		$data = array(
			'nama_obat' => $nama_obat,
			'warna' => $warna,
			'stok' => $stok,
			'unit' => $unit,
			'kedaluwarsa' => $kedaluwarsa,
			'des_obat' => $des_obat,
			'harga_beli' => $harga_beli,
			'harga_jual' => $harga_jual,
			'nama_pemasok' => $nama_pemasok,
		);

		$where = array(
			'id_obat' => $id_obat
		);

		$this->apotek_data->update_data($where,$data,'table_med');
		$this->session->set_flashdata('med_added', 'Data obat berhasil diperbarui');
		redirect('admin/table_med');
	}


	function edit_form_sup($id_pem) {
		$where = array('id_pem' => $id_pem);
		$data['table_sup'] = $this->apotek_data->edit_data($where,'table_sup')->result();
		$this->template->write('title', 'Ubah Pemasok', TRUE);
		$this->template->write('header', 'Sistem Informasi Apotek');
		$this->template->write_view('content', 'admin/edit_form_sup', $data, true);

		$this->template->render();
	}

	function edit_form_unit($id_unit) {
		$where = array('id_unit' => $id_unit);
		$data['table_unit'] = $this->apotek_data->edit_data($where,'table_unit')->result();
		$this->template->write('title', 'Ubah Unit', TRUE);
		$this->template->write('header', 'Sistem Informasi Apotek');
		$this->template->write_view('content', 'admin/edit_form_unit', $data, true);

		$this->template->render();
	}


	function update_supplier(){
		$id_pem = $this->input->post('id_pem');
		$nama_pemasok = $this->input->post('nama_pemasok');
		$alamat = $this->input->post('alamat');
		$telepon = $this->input->post('telepon');

		$data = array(
			'nama_pemasok' => $nama_pemasok,
			'alamat' => $alamat,
			'telepon' => $telepon,
		);

		$where = array(
			'id_pem' => $id_pem
		);

		$this->apotek_data->update_data($where,$data,'table_sup');

		$this->session->set_flashdata('sup_added', 'Data pemasok berhasil diperbarui');
		redirect('admin/table_sup');
	}

	function update_unit(){
		$id_unit = $this->input->post('id_unit');
		$unit = $this->input->post('unit');
		
		$data = array(
			'unit' => $unit,
		
		);

		$where = array(
			'id_unit' => $id_unit
		);

		$this->apotek_data->update_data($where,$data,'table_unit');

		$this->session->set_flashdata('unit_added', 'Data unit berhasil diperbarui');
		redirect('admin/table_unit');
	}


	function remove_med($id_obat){
		$where = array('id_obat' => $id_obat);
		$this->apotek_data->delete_data($where,'table_med');
		redirect('karyawan/table_med');
	}

	function remove_karyawan($id){
		$where = array('id' => $id);
		$this->apotek_data->delete_data($where,'table_karyawan');
		redirect('admin/table_karyawan');
	}

	function remove_pasien($id_pasien){
		$where = array('id_pasien' => $id_pasien);
		$this->apotek_data->delete_data($where,'table_pasien');
		redirect('admin/table_pasien');
	}

	function remove_check($id_check){
		$where = array('id_check' => $id_check);
		$this->apotek_data->delete_data($where,'table_check');
		redirect('admin/table_check');
	}

	function remove_cat($id_kat){
		$where = array('id_kat' => $id_kat);
		$this->apotek_data->delete_data($where,'table_cat');
		redirect('admin/table_cat');
	}

	function remove_sup($id_pem){
		$where = array('id_pem' => $id_pem);
		$this->apotek_data->delete_data($where,'table_sup');
		redirect('admin/table_sup');
	}

	function remove_unit($id_unit){
		$where = array('id_unit' => $id_unit);
		
		$this->apotek_data->delete_data($where,'table_unit');
		redirect('admin/table_unit');
	}


	function remove_inv($ref){
		$where = array('ref' => $ref);
		$this->apotek_data->delete_data($where,'table_invoice');


		redirect('admin/table_invoice');
	}

	function remove_purchase($ref){
		$where = array('ref' => $ref);
		$this->apotek_data->delete_data($where,'table_purchase');
		redirect('admin/table_purchase');
	}


	 function product()
	{
	    $nama_obat=$this->input->post('nama_obat');
        $data=$this->apotek_data->get_product($nama_obat);
        echo json_encode($data);
	}

	function productcheck()
	{
	    $id_check=$this->input->post('id_check');
        $data=$this->apotek_data->get_productcheck($id_check);
        echo json_encode($data);
	}

	 


	function chart()
	{
       $data = $this->apotek_data->get_chart_cat();
		echo json_encode($data);
	}

	function chart_unit()
	{
       $data = $this->apotek_data->get_chart_unit();
		echo json_encode($data);
	}


	function chart_trans()
	{
		$tahun_beli=$this->input->post('tahun_beli');
       	$data = $this->apotek_data->get_chart_trans($tahun_beli);
		echo json_encode($data);
	}

	function chart_purchase()
	{
		$tahun_beli=$this->input->post('tahun_beli');
       	$data = $this->apotek_data->get_chart_purchase($tahun_beli);
		echo json_encode($data);
	}

	function gabung()
	{
       $tahun_beli=$this->input->post('tahun_beli');
       	$data = $this->apotek_data->get_gabung($tahun_beli);
		echo json_encode($data);
	}

	function topdemand()
	{
		$tahun_beli=$this->input->post('tahun_beli');
       	$data = $this->apotek_data->topDemanded($tahun_beli);
		echo json_encode($data);
	}

	function leastdemand()
	{
		$tahun_beli=$this->input->post('tahun_beli');
       	$data = $this->apotek_data->leastDemanded($tahun_beli);
		echo json_encode($data);
	}

	function highearn()
	{
		$tahun_beli=$this->input->post('tahun_beli');
       	$data = $this->apotek_data->highestEarners($tahun_beli);
		echo json_encode($data);
	}

	function lowearn()
	{
		$tahun_beli=$this->input->post('tahun_beli');
       	$data = $this->apotek_data->lowestEarners($tahun_beli);
		echo json_encode($data);
	}

	function toppurchase()
	{
		$tahun_beli=$this->input->post('tahun_beli');
       	$data = $this->apotek_data->topPurchase($tahun_beli);
		echo json_encode($data);
	}

	function leastpurchase()
	{
		$tahun_beli=$this->input->post('tahun_beli');
       	$data = $this->apotek_data->leastPurchase($tahun_beli);
		echo json_encode($data);
	}

	function highpurchase()
	{
		$tahun_beli=$this->input->post('tahun_beli');
       	$data = $this->apotek_data->highestPurchase($tahun_beli);
		echo json_encode($data);
	}

	function lowpurchase()
	{
		$tahun_beli=$this->input->post('tahun_beli');
       	$data = $this->apotek_data->lowestPurchase($tahun_beli);
		echo json_encode($data);
	}



	function totale()
	{
		$tahun_beli=$this->input->post('tahun_beli');
       	$data = $this->apotek_data->get_tot($tahun_beli);
		echo json_encode($data);
	}


	function laporan_pdf($ref)
	{ 

		$this->template->render();
		$this->load->library('pdf');
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        $pdf->setPrintFooter(false);
        $pdf->setPrintHeader(false);
        $pdf->SetAutoPageBreak(true, PDF_MARGIN_BOTTOM);
        $pdf->AddPage('');
        $pdf->Write(0, 'Simpan ke PDF - Jaranguda.com', '', 0, 'L', true, 0, false, false, 0);
        $pdf->SetFont('');
 

        $where = array('ref' => $ref);
		$table_invoice = $this->apotek_data->show_data($where, 'table_invoice')->result();
		$show_invoice = $this->apotek_data->show_invoice($where, 'table_invoice')->result();
		$tabel= '<div class="row">
		<div class="col-xs-12 table">
		  <table class="table table-striped">
			<thead>
			  <tr>
				
				<th>Nama Obateee</th>
				<th>CheckUpeee</th>
				<th>Hargaeee satuaneeeeeeee</th>
				<th>Banyakeee</th>
				<th>Subtotalee</th>
			  </tr>
			</thead>
			<tbody>
			  <?php foreach($show_invoice as $si){ ?>
			  <tr>
				<td><?php echo $si->nama_obat ?></td>
				<td><?php echo $si->id_check ?></td>
				<td>Rp <?php echo number_format($si->harga_jual) ?></td>
				<td><?php echo $si->banyak ?></td>
				
				<td>Rp <?php echo number_format($si->subtotal) ?></td>
			  </tr>
			  
			  <?php } ?>
			</tbody>
			<tfoot>
			  <?php foreach($table_invoice as $i){ ?>
				<tr>
	  <td style="text-align:center; vertical-align: middle" colspan="4"><b>Grand Total</b></td>
	  <td>
		<b>Rp <?php echo number_format($i->grandtotal) ?></b>
	  </td>
	</tr>
	<?php } ?>
			  </tfoot>

		  </table>
		</div>
		<!-- /.col -->
	  </div>';

        $pdf->writeHTML($tabel);
        $pdf->Output('file-pdf-codeigniter.pdf', 'I');


	}



	

    

	

}









