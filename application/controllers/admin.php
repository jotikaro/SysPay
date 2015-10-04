<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

	/**
	 * @author : irpan
	 * @keterangan : Controller untuk halaman khusus admin
	 */
	
	public function index()
	{
		$cek = $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='admin' || !empty($cek) && $stts=='or' || !empty($cek) && $stts=='op' || !empty($cek) && $stts=='cp' || !empty($cek) && $stts=='ca' || !empty($cek) && $stts=='ft')
		{
			$d['judul'] = "Beranda - Sistem Informasi Akademik Online";
			
			$bc['nama'] = $this->session->userdata('nama');
			$bc['status'] = $this->session->userdata('stts');
			$bc['username'] = $this->session->userdata('username');
			$bc['stts']=$stts;
			$bc['menu'] = $this->load->view('admin/menu', $bc, true);
			$bc['bio'] = $this->load->view('admin/bio', $bc, true);
			
			$this->load->view('global/bg_top',$d);
			$this->load->view('admin/bg_home',$bc);
			$this->load->view('global/bg_footer',$d);
		}
		else
		{
			header('location:'.base_url().'admin');
		}
	}

	public function persetujuan()
	{
		$cek = $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='admin' || !empty($cek) && $stts=='op' || !empty($cek) && $stts=='cp' || !empty($cek) && $stts=='ca' || !empty($cek) && $stts=='ft')
		{
			$d['judul'] = "Order Planning (OP) - Sistem Informasi Aman Transport";
			
			$bc['nama'] = $this->session->userdata('nama');
			$bc['username'] = $this->session->userdata('nama');
			$bc['status'] = $this->session->userdata('stts');
			$bc['stts']=$stts;
			$bc['menu'] = $this->load->view('admin/menu', $bc, true);
			$bc['stts']=$stts;
			$bc['bio'] = $this->load->view('admin/bio', $bc, true);
			$bc['order'] = $this->web_app_model->getSemuaOrderCost();
			
			
			$this->load->view('global/bg_top',$d);
			$this->load->view('admin/bg_persetujuan',$bc);
			$this->load->view('global/bg_footer',$d);
		}
		else
		{
			header('location:'.base_url().'admin');
		}
	}


	public function detail()
	{
		$cek = $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		

		if(!empty($cek) && $stts=='admin' || !empty($cek) && $stts=='op' || !empty($cek) && $stts=='cp' || !empty($cek) && $stts=='ca' || !empty($cek) && $stts=='ft')
		{
			$d['judul'] = "Order Planning (OP) - Sistem Informasi Aman Transport";
			$kd_order= $this->uri->segment(3);
			$kd_alamat=$this->uri->segment(4);	

			$bc['nama'] = $this->session->userdata('nama');
			$bc['username'] = $this->session->userdata('nama');
			$bc['status'] = $this->session->userdata('stts');
			$bc['kd_dosen'] = $this->session->userdata('kd_dosen');
			$bc['stts']=$stts;
			$bc['menu'] = $this->load->view('admin/menu', $bc, true);
			$bc['bio'] = $this->load->view('admin/bio', $bc, true);
			$bc['order'] = $this->web_app_model->getSebagianOrder($kd_order);
			$bc['alamat'] = $this->web_app_model->getSebagianAlamat($kd_alamat);
			
			$this->load->view('global/bg_top',$d);
			$this->load->view('admin/bg_detail',$bc);
			$this->load->view('global/bg_footer',$d);
		}
		else
		{
			header('location:'.base_url().'admin');
		}
	}
	
	public function costPlan()
	{
		$cek = $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='admin')
		{
			$d['judul'] = "Cost Planning (CP) - Sistem Informasi Aman Transport";
			
			$bc['nama'] = $this->session->userdata('nama');
			$bc['username'] = $this->session->userdata('nama');
			$bc['status'] = $this->session->userdata('stts');
			$bc['kd_dosen'] = $this->session->userdata('kd_dosen');
			$bc['menu'] = $this->load->view('admin/menu', '', true);
			$bc['bio'] = $this->load->view('admin/bio', $bc, true);
				$bc['jadwal'] = $this->web_app_model->getSemuaJadwal();
			$bc['mhs'] = $this->web_app_model->getMahasiswaBimbingan1();
			
			$this->load->view('global/bg_top',$d);
			$this->load->view('admin/bg_cost',$bc);
			$this->load->view('global/bg_footer',$d);
		}
		else
		{
			header('location:'.base_url().'admin');
		}
	}

	public function costApprove()
	{
		$cek = $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='admin')
		{
			$d['judul'] = "Cost Planning (CP) - Sistem Informasi Aman Transport";
			
			$bc['nama'] = $this->session->userdata('nama');
			$bc['username'] = $this->session->userdata('nama');
			$bc['status'] = $this->session->userdata('stts');
			$bc['kd_dosen'] = $this->session->userdata('kd_dosen');
			$bc['menu'] = $this->load->view('admin/menu', '', true);
			$bc['bio'] = $this->load->view('admin/bio', $bc, true);
				$bc['jadwal'] = $this->web_app_model->getSemuaJadwal();
			$bc['mhs'] = $this->web_app_model->getMahasiswaBimbingan1();
			
			$this->load->view('global/bg_top',$d);
			$this->load->view('admin/bg_approve',$bc);
			$this->load->view('global/bg_footer',$d);
		}
		else
		{
			header('location:'.base_url().'admin');
		}
	}

	public function fundTrans()
	{
		$cek = $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='admin')
		{
			$d['judul'] = "Fund Transfer (FT) - Sistem Informasi Aman Transport";
			
			$bc['nama'] = $this->session->userdata('nama');
			$bc['username'] = $this->session->userdata('nama');
			$bc['status'] = $this->session->userdata('stts');
			$bc['kd_dosen'] = $this->session->userdata('kd_dosen');
			$bc['menu'] = $this->load->view('admin/menu', '', true);
			$bc['bio'] = $this->load->view('admin/bio', $bc, true);
				$bc['jadwal'] = $this->web_app_model->getSemuaJadwal();
			$bc['mhs'] = $this->web_app_model->getMahasiswaBimbingan1();
			
			$this->load->view('global/bg_top',$d);
			$this->load->view('admin/bg_trans',$bc);
			$this->load->view('global/bg_footer',$d);
		}
		else
		{
			header('location:'.base_url().'admin');
		}
	}
	
	public function tampil_jadwal()
	{
		$cek = $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='admin' || !empty($cek) && $stts=='or' || !empty($cek) && $stts=='op' || !empty($cek) && $stts=='cp' || !empty($cek) && $stts=='ca' || !empty($cek) && $stts=='ft')
		{
			$d['judul'] = "Order Receive (OR) - Sistem Informasi Aman Transport";
			
			$bc['nama'] = $this->session->userdata('nama');
			$bc['status'] = $this->session->userdata('stts');
			$bc['username'] = $this->session->userdata('username');
			$bc['stts'] = $stts;
			$bc['menu'] = $this->load->view('admin/menu', $bc, true);
			$bc['bio'] = $this->load->view('admin/bio', $bc, true);
			$bc['order'] = $this->web_app_model->getSemuaOrder();
			
			$this->load->view('global/bg_top',$d);
			$this->load->view('admin/bg_jadwal',$bc);
			$this->load->view('global/bg_footer',$d);
		}
		else
		{
			header('location:'.base_url().'admin');
		}
	}


	public function filterJadwal()
	{
		$cek = $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='admin' || !empty($cek) && $stts=='or' || !empty($cek) && $stts=='op' || !empty($cek) && $stts=='cp' || !empty($cek) && $stts=='ca' || !empty($cek) && $stts=='ft')
		{
			$d['judul'] = "Delivery Order (DO) - Sistem Informasi Aman Transport";
			$tipe=$this->input->post("txtTipe");
			$bc['nama'] = $this->session->userdata('nama');
			$bc['status'] = $this->session->userdata('stts');
			$bc['username'] = $this->session->userdata('username');
			$bc['stts'] = $stts;
			$bc['menu'] = $this->load->view('admin/menu', $bc, true);
			$bc['bio'] = $this->load->view('admin/bio', $bc, true);
			$bc['order'] = $this->web_app_model->getSemuaOrderFilter($tipe);
			
			$this->load->view('global/bg_top',$d);
			$this->load->view('admin/bg_jadwal',$bc);
			$this->load->view('global/bg_footer',$d);
		}
		else
		{
			header('location:'.base_url().'admin');
		}
	}


	public function tampil_biaya()
	{
		$cek = $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='admin' || !empty($cek) && $stts=='ft')
		{
			$d['judul'] = "Daftar Biaya - Sistem Informasi Aman Transport";
			
			$bc['nama'] = $this->session->userdata('nama');
			$bc['status'] = $this->session->userdata('stts');
			$bc['username'] = $this->session->userdata('username');
			$bc['stts']=$stts;
			$bc['menu'] = $this->load->view('admin/menu', $bc, true);
			$bc['bio'] = $this->load->view('admin/bio', $bc, true);
			$bc['order'] = $this->web_app_model->getSemuaBiaya();
			
			$this->load->view('global/bg_top',$d);
			$this->load->view('admin/bg_biaya',$bc);
			$this->load->view('global/bg_footer',$d);
		}
		else
		{
			header('location:'.base_url().'admin');
		}
	}


	public function tampil_bank()
	{
		$cek = $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='admin' || !empty($cek) && $stts=='ft')
		{
			$d['judul'] = "Daftar Rekening Bank - Sistem Informasi Aman Transport";
			
			$bc['nama'] = $this->session->userdata('nama');
			$bc['status'] = $this->session->userdata('stts');
			$bc['username'] = $this->session->userdata('username');
			$bc['stts']=$stts;
			$bc['menu'] = $this->load->view('admin/menu', $bc, true);
			$bc['bio'] = $this->load->view('admin/bio', $bc, true);
			$bc['order'] = $this->web_app_model->getSemuaBank();
			
			$this->load->view('global/bg_top',$d);
			$this->load->view('admin/bg_bank',$bc);
			$this->load->view('global/bg_footer',$d);
		}
		else
		{
			header('location:'.base_url().'admin');
		}
	}


	public function tampil_saldo()
	{
		$cek = $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='admin' || !empty($cek) && $stts=='ft')
		{
			$d['judul'] = "Daftar Mutasi Saldo Bank- Sistem Informasi Aman Transport";
			
			$bc['nama'] = $this->session->userdata('nama');
			$bc['status'] = $this->session->userdata('stts');
			$bc['username'] = $this->session->userdata('username');
			$bc['stts']=$stts;
			$bc['menu'] = $this->load->view('admin/menu', $bc, true);
			$bc['bio'] = $this->load->view('admin/bio', $bc, true);
			$bc['order'] = $this->web_app_model->getSemuaHistorySaldoKas();
			$bc['bank'] = $this->web_app_model->getSemuaHistorySaldoKasList();
			$bc['saldoAwal'] =$this->web_app_model->getHistorySaldoKas('0');
			$bc['show']="Semua Bank (Keseluruhan)";
			$this->load->view('global/bg_top',$d);
			$this->load->view('admin/bg_tampil_saldo',$bc);
			$this->load->view('global/bg_footer',$d);
		}
		else
		{
			header('location:'.base_url().'admin');
		}
	}

public function tampil_pinjaman()
	{
		$cek = $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='admin' || !empty($cek) && $stts=='ft')
		{
			$d['judul'] = "Daftar Pinjaman - Sistem Informasi Aman Transport";
			
			$bc['nama'] = $this->session->userdata('nama');
			$bc['status'] = $this->session->userdata('stts');
			$bc['username'] = $this->session->userdata('username');
			$bc['stts']=$stts;
			$bc['menu'] = $this->load->view('admin/menu', $bc, true);
			$bc['bio'] = $this->load->view('admin/bio', $bc, true);
			$bc['pinjaman'] = $this->web_app_model->getSemuaPinjaman();
			
			$this->load->view('global/bg_top',$d);
			$this->load->view('admin/bg_pinjaman',$bc);
			$this->load->view('global/bg_footer',$d);
		}
		else
		{
			header('location:'.base_url().'admin');
		}
	}

	public function tampil_rincian()
	{
		$cek = $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='admin')
		{
			$d['judul'] = "Master Rincian Biaya (DO) - Sistem Informasi Aman Transport";
			
			$bc['nama'] = $this->session->userdata('nama');
			$bc['status'] = $this->session->userdata('stts');
			$bc['username'] = $this->session->userdata('username');
			$bc['menu'] = $this->load->view('admin/menu', '', true);
			$bc['bio'] = $this->load->view('admin/bio', $bc, true);
			$bc['order'] = $this->web_app_model->getSemuaRincian();
			
			$this->load->view('global/bg_top',$d);
			$this->load->view('admin/bg_rincian',$bc);
			$this->load->view('global/bg_footer',$d);
		}
		else
		{
			header('location:'.base_url().'admin');
		}
	}


	public function tampil_arusKas($id=0)
	{
		$cek = $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='admin' || !empty($cek) && $stts=='ft')
		{
			$d['judul'] = "Arus Kas - Sistem Informasi Aman Transport";
			
			$bc['nama'] = $this->session->userdata('nama');
			$bc['status'] = $this->session->userdata('stts');
			$bc['username'] = $this->session->userdata('username');
			$bc['stts']=$stts;
			$bc['menu'] = $this->load->view('admin/menu', $bc, true);
			$bc['bio'] = $this->load->view('admin/bio', $bc, true);
		//	$bc['order'] = $this->web_app_model->getSemuaArusKas();
			

			$jml = $this->db->get('tbl_saldo');

			//pengaturan pagination
			 $config['base_url'] = base_url().'admin/tampil_arusKas';
			 $config['total_rows'] = $jml->num_rows();
			 $config['per_page'] = $per_page=20;
			 $config['first_page'] = 'Awal';
			 $config['last_page'] = 'Akhir';
			 $config['next_page'] = '«';
			 $config['prev_page'] = '»';

			//inisialisasi config
			 $this->pagination->initialize($config);
			// echo $config['per_page']."<br/>".$id;
			 //exit();
			//buat pagination
			 $bc['halaman'] = $this->pagination->create_links();
			 $page = ($this->uri->segment(3))?$this->uri->segment(3):0;
			//tamplikan data
			 $bc['show']=$this->web_app_model->getEditBank('0');
			 $now = date("Y-m-d");
			 $bc['saldoAwal'] = $this->web_app_model->cariSaldoKas("0000-00-00","0000-00-00");
			 $bc['st']='awal';
			 $bc['order'] = $this->web_app_model->ambil_kas($per_page, $page);
			 $bc['bank'] = $this->web_app_model->getSemuaBank();

			$this->load->view('global/bg_top',$d);
			$this->load->view('admin/bg_arusKas',$bc);
			$this->load->view('global/bg_footer',$d);
		}
		else
		{
			header('location:'.base_url().'admin');
		}
	}

	public function tampil_cost()
	{
		$cek = $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='admin' || !empty($cek) && $stts=='cp' || !empty($cek) && $stts=='ca' || !empty($cek) && $stts=='ft')
		{
			$d['judul'] = "Cost Planning (CP) - Sistem Informasi Aman Transport";
			
			$bc['nama'] = $this->session->userdata('nama');
			$bc['status'] = $this->session->userdata('stts');
			$bc['stts']=$stts;
			$bc['username'] = $this->session->userdata('username');
			$bc['menu'] = $this->load->view('admin/menu', $bc, true);
			$bc['bio'] = $this->load->view('admin/bio', $bc, true);

			/*$jml = $this->db->get('tbl_saldo');

			//pengaturan pagination
			 $config['base_url'] = base_url().'admin/tampil_arusKas';
			 $config['total_rows'] = $jml->num_rows();
			 $config['per_page'] = $per_page=15;
			 $config['first_page'] = 'Awal';
			 $config['last_page'] = 'Akhir';
			 $config['next_page'] = '«';
			 $config['prev_page'] = '»';

			//inisialisasi config
			 $this->pagination->initialize($config);
			// echo $config['per_page']."<br/>".$id;
			 //exit();
			//buat pagination
			 $bc['halaman'] = $this->pagination->create_links();
			 $page = ($this->uri->segment(3))?$this->uri->segment(3):0;
			//tamplikan data
			 $bc['saldoAwal'] = $this->web_app_model->cariSaldoKas("0000-00-00","0000-00-00"); 
			 $bc['order'] = $this->web_app_model->ambil_kas($per_page, $page);*/



			$bc['orders'] = $this->web_app_model->getSemuaOrderCost();
			$bc['order'] = $this->web_app_model->getSemuaOrderCost();
			$this->load->view('global/bg_top',$d);
			$this->load->view('admin/bg_cost',$bc);
			$this->load->view('global/bg_footer',$d);
		}
		else
		{
			header('location:'.base_url().'admin');
		}
	}


	public function filter_cost()
	{
		$cek = $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='admin' || !empty($cek) && $stts=='cp' || !empty($cek) && $stts=='ca' || !empty($cek) && $stts=='ft')
		{
			$d['judul'] = "Cost Planning (CP) - Sistem Informasi Aman Transport";
			
			$bc['nama'] = $this->session->userdata('nama');
			$bc['status'] = $this->session->userdata('stts');
			$bc['username'] = $this->session->userdata('username');
			$bc['stts']=$stts;
			$bc['menu'] = $this->load->view('admin/menu', $bc, true);
			$bc['bio'] = $this->load->view('admin/bio', $bc, true);

			$customer = $this->input->post("txtCustomer");
			$kirim = $this->input->post("txtKirim");
			$jemput = $this->input->post("txtJemput");
			$produk = $this->input->post("txtProduk");
			//echo $customer." ".$kirim." ".$jemput." ".$produk; exit();
			$bc['orders'] = $this->web_app_model->getSemuaOrderCostFilter($customer,$jemput,$kirim,$produk);
			$bc['order'] = $this->web_app_model->getSemuaOrderCost();
			
			$this->load->view('global/bg_top',$d);
			$this->load->view('admin/bg_cost',$bc);
			$this->load->view('global/bg_footer',$d);
		}
		else
		{
			header('location:'.base_url().'admin');
		}
	}

	public function tampil_approval()
	{
		$cek = $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='admin' || !empty($cek) && $stts=='ca' || !empty($cek) && $stts=='ft')
		{
			$d['judul'] = "Cost Approval (CA) - Sistem Informasi Aman Transport";
			
			$bc['nama'] = $this->session->userdata('nama');
			$bc['status'] = $this->session->userdata('stts');
			$bc['username'] = $this->session->userdata('username');
			$bc['stts']=$stts;
			$bc['menu'] = $this->load->view('admin/menu',$bc, true);
			$bc['bio'] = $this->load->view('admin/bio', $bc, true);

			$x = $this->web_app_model->getSemuaOrderCostPage(0,1000);
			$jml = $x->num_rows();			

			//pengaturan pagination
			 
			 $config['base_url'] = base_url().'admin/tampil_approval';
			 $config['total_rows'] = $jml;
			 $config['per_page'] = $per_page=20;
			 $config['first_page'] = 'Awal';
			 $config['last_page'] = 'Akhir';
			 $config['next_page'] = '«';
			 $config['prev_page'] = '»';

			//inisialisasi config
			 $this->pagination->initialize($config);
			
			//buat pagination
			 $bc['halaman'] = $this->pagination->create_links();
			 $page = ($this->uri->segment(3))?$this->uri->segment(3):0;
			//tamplikan data
			
			// $bc['order'] = $this->web_app_model->ambil_kas($per_page, $page);
			
			$bc['order'] = $this->web_app_model->getSemuaOrderCostPage($page, $per_page);
			
			$this->load->view('global/bg_top',$d);
			$this->load->view('admin/bg_approval',$bc);
			$this->load->view('global/bg_footer',$d);
		}
		else
		{
			header('location:'.base_url().'admin');
		}
	}


	public function filterApproval()
	{
		$cek = $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='admin')
		{
			$d['judul'] = "Cost Approval (CA) - Sistem Informasi Aman Transport";
			
			$tipe = $this->session->userdata('txtTipe');
			$bc['nama'] = $this->session->userdata('nama');
			$bc['status'] = $this->session->userdata('stts');
			$bc['username'] = $this->session->userdata('username');
			$bc['menu'] = $this->load->view('admin/menu', '', true);
			$bc['bio'] = $this->load->view('admin/bio', $bc, true);

			/*$x = $this->web_app_model->getSemuaOrderCostPage(0,1000);
			$jml = $x->num_rows();			

			//pengaturan pagination
			 
			 $config['base_url'] = base_url().'admin/tampil_approval';
			 $config['total_rows'] = $jml;
			 $config['per_page'] = $per_page=20;
			 $config['first_page'] = 'Awal';
			 $config['last_page'] = 'Akhir';
			 $config['next_page'] = '«';
			 $config['prev_page'] = '»';

			//inisialisasi config
			 $this->pagination->initialize($config);
			
			//buat pagination
			 $bc['halaman'] = $this->pagination->create_links();
			 $page = ($this->uri->segment(3))?$this->uri->segment(3):0;
			//tamplikan data
			
			// $bc['order'] = $this->web_app_model->ambil_kas($per_page, $page);*/
			$sq='';
			if($tipe == 0)
				$sq= 'and (k.status = 666 and x.kd_biaya_rincian IS NOT NULL)';
				
			$bc['order'] = $this->web_app_model->getSemuaOrderCostCari($sq);
			
			$this->load->view('global/bg_top',$d);
			$this->load->view('admin/bg_approval',$bc);
			$this->load->view('global/bg_footer',$d);
		}
		else
		{
			header('location:'.base_url().'admin');
		}
	}

	public function tampil_fund()
	{
		$cek = $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='admin' || !empty($cek) && $stts=='ft')
		{
			$d['judul'] = "Fund Transfer (FT) - Sistem Informasi Aman Transport";
			
			$bc['nama'] = $this->session->userdata('nama');
			$bc['status'] = $this->session->userdata('stts');
			$bc['username'] = $this->session->userdata('username');
			$bc['stts']=$stts;
			$bc['menu'] = $this->load->view('admin/menu', $bc, true);
			$bc['bio'] = $this->load->view('admin/bio', $bc, true);
			$bc['order'] = $this->web_app_model->getSemuaOrderCost();
			//$bc['fund'] = $this->web_app_model->getSemuaFundTransfer();
			
			$this->load->view('global/bg_top',$d);
			$this->load->view('admin/bg_fund',$bc);
			$this->load->view('global/bg_footer',$d);
		}
		else
		{
			header('location:'.base_url().'admin');
		}
	}

	public function cariFund()
	{
		$cek = $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='admin' || !empty($cek) && $stts=='ft')
		{
			$awal  = $this->input->post('mulai');
			$akhir = $this->input->post('akhir');

			$d['judul'] = "Fund Transfer (FT) - Sistem Informasi Aman Transport";
			
			$bc['nama'] = $this->session->userdata('nama');
			$bc['status'] = $this->session->userdata('stts');
			$bc['username'] = $this->session->userdata('username');
			$bc['menu'] = $this->load->view('admin/menu', '', true);
			$bc['bio'] = $this->load->view('admin/bio', $bc, true);
			$bc['order'] = $this->web_app_model->getSemuaOrderCostPerTanggalFund($awal,$akhir);
			//$bc['fund'] = $this->web_app_model->getSemuaFundTransfer();
			
			$this->load->view('global/bg_top',$d);
			$this->load->view('admin/bg_fund',$bc);
			$this->load->view('global/bg_footer',$d);
		}
		else
		{
			header('location:'.base_url().'admin');
		}
	}

	public function cariArusKas()
	{
		$cek = $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='admin' || !empty($cek) && $stts=='ft')
		{
			$awal  = $this->input->post('mulai');
			$akhir = $this->input->post('akhir');

			$d['judul'] = "Arus Kas - Sistem Informasi Aman Transport";
			
			$bc['nama'] = $this->session->userdata('nama');
			$bc['status'] = $this->session->userdata('stts');
			$bc['username'] = $this->session->userdata('username');
			$bc['stts']=$stts;
			$bc['menu'] = $this->load->view('admin/menu', $bc, true);
			$bc['bio'] = $this->load->view('admin/bio', $bc, true);

			$jml = $this->db->get('tbl_saldo');

			//pengaturan pagination
			 $config['base_url'] = base_url().'admin/tampil_arusKas';
			 $config['total_rows'] = $jml->num_rows();
			 $config['per_page'] = $per_page=20;
			 $config['first_page'] = 'Awal';
			 $config['last_page'] = 'Akhir';
			 $config['next_page'] = '«';
			 $config['prev_page'] = '»';

			//inisialisasi config
			 $this->pagination->initialize($config);
			// echo $config['per_page']."<br/>".$id;
			 //exit();
			//buat pagination
			 $bc['halaman'] = $this->pagination->create_links();
			 $page = ($this->uri->segment(3))?$this->uri->segment(3):0;
			//tamplikan data
//			 $bc['order'] = $this->web_app_model->ambil_kas($per_page, $page);//
			 $bc['saldoAwal'] = $this->web_app_model->cariSaldoKas($awal,$akhir); 
			 //$bc['saldoAwal'] =$this->web_app_model->getHistorySaldoKas('0');
			 $bc['order'] = $this->web_app_model->cariArusKas($awal,$akhir); //,$per_page,$page);
			 $bc['show']=$this->web_app_model->getEditBank('0');
			 $bc['st']='awal';
			 $bc['bank'] = $this->web_app_model->getSemuaBank();

			$this->load->view('global/bg_top',$d);
			$this->load->view('admin/bg_arusKas',$bc);
			$this->load->view('global/bg_footer',$d);
		}
		else
		{
			header('location:'.base_url().'admin');
		}
	}

	public function cariArusKasBank()
	{
		$cek = $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='admin' || !empty($cek) && $stts=='ft')
		{
			$bank= $this->input->post('txtBank');
			$d['judul'] = "Arus Kas - Sistem Informasi Aman Transport";
			
			$bc['nama'] = $this->session->userdata('nama');
			$bc['status'] = $this->session->userdata('stts');
			$bc['username'] = $this->session->userdata('username');
			$bc['stts']=$stts;
			$bc['menu'] = $this->load->view('admin/menu', $bc, true);
			$bc['bio'] = $this->load->view('admin/bio', $bc, true);

			if($bank == "all"){
				$jml = $this->db->get('tbl_saldo');
				 $config['base_url'] = base_url().'admin/tampil_arusKas';
				 $config['total_rows'] = $jml->num_rows();
				 $config['per_page'] = $per_page=20;
				 $config['first_page'] = 'Awal';
				 $config['last_page'] = 'Akhir';
				 $config['next_page'] = '«';
				 $config['prev_page'] = '»';

				//inisialisasi config
				 $this->pagination->initialize($config);
				// echo $config['per_page']."<br/>".$id;
				 //exit();
				//buat pagination
				 $bc['halaman'] = $this->pagination->create_links();
				 $page = ($this->uri->segment(3))?$this->uri->segment(3):0;
				//tamplikan data
				 $bc['show']=$this->web_app_model->getEditBank($bank);
				 //$bc['show']="Semua Bank (Keseluruhan)";
				 $now = date("Y-m-d");
				 $bc['saldoAwal'] = $this->web_app_model->cariSaldoKas("0000-00-00","0000-00-00");
				 $bc['st']='awal';
				 $bc['order'] = $this->web_app_model->ambil_kas($per_page, $page);
				 $bc['bank'] = $this->web_app_model->getSemuaBank();
			}
			else{
				$bc['halaman'] = '';
				//$bc['saldoAwal'] = $this->web_app_model->cariSaldoKas("0000-00-00","0000-00-00"); 
				$bc['show']=$this->web_app_model->getEditBank($bank);
				//$bc['saldoAwal'] =$this->web_app_model->getHistorySaldoKas($bank);
				$bc['saldoAwal'] = $this->web_app_model->cariSaldoKas("0000-00-00","0000-00-00");
				$bc['order'] = $this->web_app_model->cariSaldoKasBank($bank); 
				$bc['bank'] = $this->web_app_model->getSemuaBank();	
			}
			
			
			$this->load->view('global/bg_top',$d);
			$this->load->view('admin/bg_arusKas',$bc);
			$this->load->view('global/bg_footer',$d);
		}
		else
		{
			header('location:'.base_url().'admin');
		}
	}


	public function filterMutasiBank()
	{
		$cek = $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='admin' || !empty($cek) && $stts=='ft')
		{
			$bank= $this->input->post('txtBank');
			$d['judul'] = "Daftar Mutasi Saldo Bank- Sistem Informasi Aman Transport";
			
			$bc['nama'] = $this->session->userdata('nama');
			$bc['status'] = $this->session->userdata('stts');
			$bc['username'] = $this->session->userdata('username');
			$bc['stts']=$stts;
			$bc['menu'] = $this->load->view('admin/menu', $bc, true);
			$bc['bio'] = $this->load->view('admin/bio', $bc, true);

			if($bank == "all"){
				$jml = $this->db->get('tbl_saldo');
				 $config['base_url'] = base_url().'admin/tampil_arusKas';
				 $config['total_rows'] = $jml->num_rows();
				 $config['per_page'] = $per_page=20;
				 $config['first_page'] = 'Awal';
				 $config['last_page'] = 'Akhir';
				 $config['next_page'] = '«';
				 $config['prev_page'] = '»';

				//inisialisasi config
				 $this->pagination->initialize($config);
				// echo $config['per_page']."<br/>".$id;
				 //exit();
				//buat pagination
				 $bc['halaman'] = $this->pagination->create_links();
				 $page = ($this->uri->segment(3))?$this->uri->segment(3):0;
				//tamplikan data
				 $bc['show']="Semua Bank (Keseluruhan)";
				 $now = date("Y-m-d");
				 $bc['saldoAwal'] = $this->web_app_model->cariSaldoKas("0000-00-00","0000-00-00");
				 $bc['st']='awal';
				 $bc['order'] = $this->web_app_model->getSemuaHistorySaldoKas();
				 $bc['bank'] = $this->web_app_model->getSemuaHistorySaldoKasList();
			}
			else{
				$bc['halaman'] = '';
				//$bc['saldoAwal'] = $this->web_app_model->cariSaldoKas("0000-00-00","0000-00-00"); 
				$bc['show']='';
				$bc['saldoAwal'] =$this->web_app_model->getHistorySaldoKas($bank);
				$bc['order'] = $this->web_app_model->getHistorySaldoKas($bank);
				$bc['bank'] = $this->web_app_model->getSemuaHistorySaldoKasList();
			}

			$this->load->view('global/bg_top',$d);
			$this->load->view('admin/bg_tampil_saldo',$bc);
			$this->load->view('global/bg_footer',$d);
		}
		else
		{
			header('location:'.base_url().'admin');
		}
	}


	public function cariDetailHistory()
	{
		$cek = $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='admin' || !empty($cek) && $stts=='ft')
		{
			$awal  = $this->input->post('mulai');
			$akhir = $this->input->post('akhir');
			$id = $this->input->post('txtID');
			//echo $id."".$awal."".$akhir; exit();
			$d['judul'] = "Detail Peminjaman - Sistem Informasi Aman Transport";
			
			$bc['nama'] = $this->session->userdata('nama');
			$bc['status'] = $this->session->userdata('stts');
			$bc['username'] = $this->session->userdata('username');
			$bc['stts']=$stts;
			$bc['menu'] = $this->load->view('admin/menu', $bc, true);
			$bc['bio'] = $this->load->view('admin/bio', $bc, true);

			
			$bc['detail'] = $this->web_app_model->getHistoryPinjamanFilter($id,$awal,$akhir);
			$bc['id']=$id;
			$bc['saldoAwal'] = $this->web_app_model->getHistoryPinjamanSaldo($id,$awal);
			//$bc['order'] = $this->web_app_model->cariArusKas($awal,$akhir); //,$per_page,$page);
			
			$this->load->view('global/bg_top',$d);
			$this->load->view('admin/bg_detail_history',$bc);
			$this->load->view('global/bg_footer',$d);
		}
		else
		{
			header('location:'.base_url().'admin');
		}
	}

	public function tampil_cust()
	{
		$cek = $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='admin' || !empty($cek) && $stts=='or' || !empty($cek) && $stts=='op' || !empty($cek) && $stts=='cp' || !empty($cek) && $stts=='ca' || !empty($cek) && $stts=='ft')
		{
			$d['judul'] = "Daftar Customer - Sistem Informasi Aman Transport";
			
			$bc['nama'] = $this->session->userdata('nama');
			$bc['status'] = $this->session->userdata('stts');
			$bc['username'] = $this->session->userdata('username');
			$bc['stts']=$stts;
			$bc['menu'] = $this->load->view('admin/menu', $bc, true);
			$bc['bio'] = $this->load->view('admin/bio', $bc, true);
			$bc['jadwal'] = $this->web_app_model->getSemuaCustomer();
			
			$this->load->view('global/bg_top',$d);
			$this->load->view('admin/bg_customer',$bc);
			$this->load->view('global/bg_footer',$d);
		}
		else
		{
			header('location:'.base_url().'admin');
		}
	}

	public function tampil_armada()
	{
		$cek = $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='admin' || !empty($cek) && $stts=='op' || !empty($cek) && $stts=='cp' || !empty($cek) && $stts=='ca' || !empty($cek) && $stts=='ft')
		{
			$d['judul'] = "Daftar Armada - Sistem Informasi Aman Transport";
			
			$bc['nama'] = $this->session->userdata('nama');
			$bc['status'] = $this->session->userdata('stts');
			$bc['username'] = $this->session->userdata('username');
			$bc['stts']=$stts;
			$bc['menu'] = $this->load->view('admin/menu', $bc, true);
			$bc['bio'] = $this->load->view('admin/bio', $bc, true);
			$bc['jadwal'] = $this->web_app_model->getSemuaArmada();
			
			$this->load->view('global/bg_top',$d);
			$this->load->view('admin/bg_armada',$bc);
			$this->load->view('global/bg_footer',$d);
		}
		else
		{
			header('location:'.base_url().'admin');
		}
	}

	public function tampil_supir()
	{
		$cek = $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='admin' || !empty($cek) && $stts=='op' || !empty($cek) && $stts=='cp' || !empty($cek) && $stts=='ca' || !empty($cek) && $stts=='ft')
		{
			$d['judul'] = "Daftar Supir - Sistem Informasi Aman Transport";
			
			$bc['nama'] = $this->session->userdata('nama');
			$bc['status'] = $this->session->userdata('stts');
			$bc['username'] = $this->session->userdata('username');
			$bc['stts']=$stts;
			$bc['menu'] = $this->load->view('admin/menu', $bc, true);
			$bc['bio'] = $this->load->view('admin/bio', $bc, true);
			$bc['jadwal'] = $this->web_app_model->getSemuaSupir();
			
			$this->load->view('global/bg_top',$d);
			$this->load->view('admin/bg_supir',$bc);
			$this->load->view('global/bg_footer',$d);
		}
		else
		{
			header('location:'.base_url().'admin');
		}
	}
	
	public function tampil_setorKas()
	{
		$cek = $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='admin')
		{
			$d['judul'] = "Daftar Setoran Kas - Sistem Informasi Aman Transport";
			
			$bc['nama'] = $this->session->userdata('nama');
			$bc['status'] = $this->session->userdata('stts');
			$bc['username'] = $this->session->userdata('username');
			$bc['menu'] = $this->load->view('admin/menu', '', true);
			$bc['bio'] = $this->load->view('admin/bio', $bc, true);
			$bc['saldo'] = $this->web_app_model->getSemuaSaldoKas();
			
			$this->load->view('global/bg_top',$d);
			$this->load->view('admin/bg_saldoKas',$bc);
			$this->load->view('global/bg_footer',$d);
		}
		else
		{
			header('location:'.base_url().'admin');
		}
	}

	public function tambah_saldo()
	{
		$cek = $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='admin' || !empty($cek) && $stts=='ft')
		{
			$d['judul'] = "Tambah Saldo - Sistem Informasi Aman Transport";
			
			$bc['nama'] = $this->session->userdata('nama');
			$bc['status'] = $this->session->userdata('stts');
			$bc['username'] = $this->session->userdata('username');
			$bc['stts']=$stts;
			$bc['menu'] = $this->load->view('admin/menu', $bc, true);			
			$bc['bio'] = $this->load->view('admin/bio', $bc, true);
			$bc['jadwal'] = $this->web_app_model->getSemuaSupir();
			$bc['bank'] = $this->web_app_model->getSemuaBank();
			
			//$this->load->view('global/bg_top',$d);
			$this->load->view('admin/bg_tambah_saldo',$bc);
			//$this->load->view('global/bg_footer',$d);
		}
		else
		{
			header('location:'.base_url().'admin');
		}
	}


	public function tampil_spbu()
	{
		$cek = $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='admin' || !empty($cek) && $stts=='cp' || !empty($cek) && $stts=='ca' || !empty($cek) && $stts=='ft')
		{
			$d['judul'] = "Daftar SPBU- Sistem Informasi Aman Transport";
			
			$bc['nama'] = $this->session->userdata('nama');
			$bc['status'] = $this->session->userdata('stts');
			$bc['username'] = $this->session->userdata('username');
			$bc['stts'] = $stts;
			$bc['menu'] = $this->load->view('admin/menu', $bc, true);
			$bc['bio'] = $this->load->view('admin/bio', $bc, true);
			$bc['jadwal'] = $this->web_app_model->getSemuaSPBU();
			
			$this->load->view('global/bg_top',$d);
			$this->load->view('admin/bg_spbu',$bc);
			$this->load->view('global/bg_footer',$d);
		}
		else
		{
			header('location:'.base_url().'admin');
		}
	}

	public function hapus_jadwal()
	{
		$cek = $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='admin' || !empty($cek) && $stts=='or' || !empty($cek) && $stts=='op' || !empty($cek) && $stts=='cp' || !empty($cek) && $stts=='ca' || !empty($cek) && $stts=='ft')
		{
			$id = $this->uri->segment(3);
			$hapus = array('kd_jadwal' => $id);
			$this->web_app_model->deleteData('tbl_jadwal',$hapus);
			header('location:'.base_url().'admin/tampil_jadwal');
		}
		else
		{
			header('location:'.base_url().'admin');
		}
	}
	
	public function hapus_order()
	{
		$cek = $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='admin' || !empty($cek) && $stts=='or')
		{
			$idOrder = $this->uri->segment(3);
			$kd = $this->uri->segment(4);
			/*echo $idOrder."<br/>".$kd."<br/>".$id; exit();*/

			

			$qt = $this->db->query("select * from tbl_alamat_penjemputan where kd_alamat_jemput='$kd'");
			if($qt->num_rows() > 0)
			{					
				foreach($qt->result() as $row){ 
					$qtx = $this->db->query("select * from tbl_kode_cost_planning where id_alamat_jemput=".$row->id."");
					if($qtx->num_rows() > 0)
					{					
						foreach($qtx->result() as $ro){ 
							$del = array('kd_biaya_rincian' => $ro->kd_biaya_rincian);
							$this->web_app_model->deleteData('tbl_cost_planning',$del);
							$delx = array('kd_biaya_detail' => $ro->kd_biaya_rincian);
							$this->web_app_model->deleteData('tbl_detail_biaya',$delx);
						}
					}
					$delKodeCost = array('id_alamat_jemput' => $row->id);
					$this->web_app_model->deleteData('tbl_kode_cost_planning',$delKodeCost);
					$delOrderCost = array('id_alamat_jemput' => $row->id);
					$this->web_app_model->deleteData('tbl_order_planning',$delOrderCost);
				}
			}

			$hapusx = array('kd_alamat_jemput' => $kd);
			$this->web_app_model->deleteData('tbl_alamat_penjemputan',$hapusx);

			$hapus = array('kd_order' => $idOrder);
			$this->web_app_model->deleteData('tbl_order',$hapus);


			/*tbl_cost_planning -> hapus dengan kd_biaya_rincian
tbl_detail_biaya ->hapus dengan kd_biay_detail (sda)
tbl_order_planning -> hapus dengan id_alamat_jemput
tbl_kode_cost_planning -> hapus dengan id_alamat_jemput*/




			header('location:'.base_url().'admin/tampil_jadwal');
		}
		else
		{
			header('location:'.base_url().'admin');
		}
	}
	

	public function hapus_cust()
	{
		$cek = $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='admin' || !empty($cek) && $stts=='or' || !empty($cek) && $stts=='op' || !empty($cek) && $stts=='cp' || !empty($cek) && $stts=='ca' || !empty($cek) && $stts=='ft')
		{
			$id = $this->uri->segment(3);
			$hapus = array('kd_customer' => $id);
			$this->web_app_model->deleteData('tbl_customer',$hapus);
			header('location:'.base_url().'admin/tampil_cust');
		}
		else
		{
			header('location:'.base_url().'admin');
		}
	}


	
public function hapus_supir()
	{
		$cek = $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='admin' || !empty($cek) && $stts=='op' || !empty($cek) && $stts=='cp' || !empty($cek) && $stts=='ca' || !empty($cek) && $stts=='ft')
		{
			$id = $this->uri->segment(3);
			$hapus = array('no_ktp' => $id);
			$this->web_app_model->deleteData('tbl_supir',$hapus);
			header('location:'.base_url().'admin/tampil_supir');
		}
		else
		{
			header('location:'.base_url().'admin');
		}
	}

	public function hapus_spbu()
	{
		$cek = $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='admin' || !empty($cek) && $stts=='cp' || !empty($cek) && $stts=='ca' || !empty($cek) && $stts=='ft')
		{
			$id = $this->uri->segment(3);
			$hapus = array('id' => $id);
			$this->web_app_model->deleteData('tbl_spbu',$hapus);
			header('location:'.base_url().'admin/tampil_spbu');
		}
		else
		{
			header('location:'.base_url().'admin');
		}
	}

	public function hapus_armada()
	{
		$cek = $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='admin' || !empty($cek) && $stts=='op' || !empty($cek) && $stts=='cp' || !empty($cek) && $stts=='ca' || !empty($cek) && $stts=='ft')
		{
			$id = $this->uri->segment(3);
			$hapus = array('id' => $id);
			$this->web_app_model->deleteData('tbl_armada',$hapus);
			header('location:'.base_url().'admin/tampil_armada');
		}
		else
		{
			header('location:'.base_url().'admin');
		}
	}

	public function peserta()
	{
		$cek = $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='admin')
		{
			$d = explode("_",$this->uri->segment(3));
			$bc['peserta'] = $this->web_app_model->getPeserta($d[0],$d[1]);
			
			$this->load->view('admin/bg_peserta',$bc);
		}
		else
		{
			header('location:'.base_url().'admin');
		}
	}
	
	public function lanjut_order()
	{
		$cek = $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='admin' || !empty($cek) && $stts=='op' || !empty($cek) && $stts=='cp' || !empty($cek) && $stts=='ca' || !empty($cek) && $stts=='ft')
		{
			$d['judul'] = "Order Lanjutan - Sistem Informasi Aman Transport";
			
			$bc['nama'] = $this->session->userdata('nama');
			$bc['status'] = $this->session->userdata('stts');
			$bc['username'] = $this->session->userdata('username');
			$bc['stts']=$stts;
			$bc['menu'] = $this->load->view('admin/menu', $bc, true);
			$bc['bio'] = $this->load->view('admin/bio', $bc, true);			
			//$bc['jadwal'] = $this->web_app_model->getSemuaSupir();
			$jlh = $this->uri->segment('4');			
			$bc['kode']=$this->uri->segment('3');
			$bc['ktp']=$this->uri->segment('5');
			$bc['armada']=$this->uri->segment('6');

//			echo $this->uri->segment('5'); exit();
			$this->load->view('global/bg_top',$d);
			$bc['jumlah']=$jlh;
			$bc['order'] = $this->web_app_model->getSebagianOrder($this->uri->segment('3'));
			$bc['driver'] = $this->web_app_model->getSebagianOrderPlanning($this->uri->segment('5'));			
			$this->load->view('admin/bg_lanjut_order',$bc);
			$this->load->view('global/bg_footer',$d);
		}
		else
		{
			header('location:'.base_url().'admin');
		}
	}


	public function edit_jadwal()
	{
		$cek = $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='admin' || !empty($cek) && $stts=='or' || !empty($cek) && $stts=='op' || !empty($cek) && $stts=='cp' || !empty($cek) && $stts=='ca' || !empty($cek) && $stts=='ft')
		{
			//echo $this->uri->segment('3'); exit();
			$bc['edit'] = $this->web_app_model->getSebagianOrderPlanning($this->uri->segment('3'));
			$bc['customer'] = $this->web_app_model->getSemuaCustomer();
			$this->load->view('admin/bg_edit_jadwal',$bc);
		}
		else
		{
			header('location:'.base_url().'admin');
		}
	}

	public function edit_biaya()
	{
		$cek = $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='admin' || !empty($cek) && $stts=='ft')
		{

			$bc['edit'] = $this->web_app_model->getEditBiaya($this->uri->segment('3'));		
			$this->load->view('admin/bg_edit_biaya',$bc);
		}
		else
		{
			header('location:'.base_url().'admin');
		}
	}

	public function edit_bank()
	{
		$cek = $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='admin' || !empty($cek) && $stts=='ft')
		{

			$bc['edit'] = $this->web_app_model->getEditBank($this->uri->segment('3'));		
			$this->load->view('admin/bg_edit_bank',$bc);
		}
		else
		{
			header('location:'.base_url().'admin');
		}
	}


	public function mutasi_bank()
	{
		$cek = $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='admin' || !empty($cek) && $stts=='ft')
		{
			$d['judul'] = "Mutasi Saldo Bank - Sistem Informasi Aman Transport";
			
			$bc['nama'] = $this->session->userdata('nama');
			$bc['status'] = $this->session->userdata('stts');
			$bc['username'] = $this->session->userdata('username');
			$bc['stts']=$stts;
			$bc['menu'] = $this->load->view('admin/menu', $bc, true);
			$bc['bio'] = $this->load->view('admin/bio', $bc, true);			

			$this->load->view('global/bg_top',$d);
				
			$bc['edit'] = $this->web_app_model->getEditSaldoKas($this->uri->segment('3'));		
			$bc['bank'] = $this->web_app_model->getSemuaSaldoKas();		
			$bc['bankT'] = $this->web_app_model->getSemuaBank();		
			$this->load->view('admin/bg_mutasi_bank',$bc);
			$this->load->view('global/bg_footer',$d);
		}
		else
		{
			header('location:'.base_url().'admin');
		}
	}

	public function edit_rincian()
	{
		$cek = $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='admin')
		{
			$bc['biaya'] = $this->web_app_model->getSemuaBiaya();
			$bc['edit'] = $this->web_app_model->getEditRincian($this->uri->segment('3'));
			
			$this->load->view('admin/bg_edit_rincian',$bc);
		}
		else
		{
			header('location:'.base_url().'admin');
		}
	}

	function siswa()
	{
		$id = $this->input->post('id_kelas');		
		$data['siswa'] = $this->web_app_model->getEditBiaya($id);
		$data['rincian'] = $this->web_app_model->getRincian($id);
        $this->load->view('admin/autocomplete',$data);
	}

	function bank()
	{
		$id = $this->input->post('id_kelas');		
		$data['bank'] = $this->web_app_model->getEditBank($id);		
        $this->load->view('admin/autobank',$data);
	}

	function banks()
	{
		$id = $this->input->post('id_kelas');		
		$data['bank'] = $this->web_app_model->getEditBank($id);		
        $this->load->view('admin/autobanks',$data);
	}

	public function proses_cost()
	{
		$cek = $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='admin'  || !empty($cek) && $stts=='cp' || !empty($cek) && $stts=='ca' || !empty($cek) && $stts=='ft')
		{	
			$kodeX ="";
			$kodeY = "";
			$kd_order="";
			$kdAlamat = "";
			$ul = $this->input->post("jlh");
			for($i=1;$i<=$ul;$i++){				
				$a=$this->input->post("kd$i");
				$b=$this->input->post("kdAlamat$i");
				if($a!=""){
				 	$kd_order.=$a."/";
				 	$kdAlamat.=$b."/";
				 	$kodeX = $a;
				 	$kodeY = $b;
				}				
			}

			//echo $kd_order; exit();
			if($kd_order==""){
				header('location:'.base_url().'admin/tampil_cost');
				exit();
			}

			$d['judul'] = "Cost Planning (CP) - Sistem Informasi Aman Transport";
			
			$bc['nama'] = $this->session->userdata('nama');
			$bc['status'] = $this->session->userdata('stts');
			$bc['username'] = $this->session->userdata('username');
			$bc['stts']=$stts;
			$bc['menu'] = $this->load->view('admin/menu', $bc, true);
			$bc['bio'] = $this->load->view('admin/bio', $bc, true);			
			$this->load->view('global/bg_top',$d);		
			


			$kd=$this->input->post("txtKd");
			$bc['all_kode'] = $kd_order;
			$id=$this->input->post("txtId");

			//echo $kd."<br/>".$id."<br/>".$kodeX."daftar Kode".$kd_order; exit();
			$bc['edit'] = $this->web_app_model->getSebagianOrderCost($kodeY,$kodeX);
			$bc['rincian'] = $this->web_app_model->getSemuaRincian();
			$bc['biaya'] = $this->web_app_model->getSemuaBiaya();
			$bc['bank'] = $this->web_app_model->getSemuaBank();

			$this->load->view('admin/bg_edit_cost',$bc);
			$this->load->view('global/bg_footer',$d);
		}
		else
		{
			header('location:'.base_url().'admin');
		}
	}


	public function catat_fund()
	{
		$cek = $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='admin')
		{	
			$kd_order="";
			$kdLanjut = $this->input->post("kdLanjut");
			$kdAlamat = $this->input->post("kdAlamat");
			$idAlamat = $this->input->post("idAlamat");
			//echo $kdAlamat."<br/>".$idAlamat.'<br/>'.$kdLanjut;
			//exit();
			/*$up['status']=1;
			$where = array('id_alamat'=>$idAlamat);
			$this->web_app_model->updateDataMultiField("tbl_saldo",$up,$where);*/

			?>
				<script>
				window.parent.location.reload(true);
				</script>
			<?php

		}
		else
		{
			header('location:'.base_url().'admin');
		}
	}

	public function edit_cust()
	{
		$cek = $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='admin' || !empty($cek) && $stts=='or' || !empty($cek) && $stts=='op' || !empty($cek) && $stts=='cp' || !empty($cek) && $stts=='ca' || !empty($cek) && $stts=='ft')
		{
			
			$bc['edit'] = $this->web_app_model->getEditCustomer($this->uri->segment('3'));
			
			$this->load->view('admin/bg_edit_cust',$bc);
		}
		else
		{
			header('location:'.base_url().'admin');
		}
	}


	public function edit_supir()
	{
		$cek = $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='admin'  || !empty($cek) && $stts=='op' || !empty($cek) && $stts=='cp' || !empty($cek) && $stts=='ca' || !empty($cek) && $stts=='ft')
		{
			
			$bc['edit'] = $this->web_app_model->getEditSupir($this->uri->segment('3'));
			
			$this->load->view('admin/bg_edit_supir',$bc);
		}
		else
		{
			header('location:'.base_url().'admin');
		}
	}
	

	
	public function edit_spbu()
	{
		$cek = $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='admin' || !empty($cek) && $stts=='cp' || !empty($cek) && $stts=='ca' || !empty($cek) && $stts=='ft')
		{
			
			$bc['edit'] = $this->web_app_model->getEditSPBU($this->uri->segment('3'));
			
			$this->load->view('admin/bg_edit_spbu',$bc);
		}
		else
		{
			header('location:'.base_url().'admin');
		}
	}


	public function edit_armada()
	{
		$cek = $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='admin' || !empty($cek) && $stts=='op' || !empty($cek) && $stts=='cp' || !empty($cek) && $stts=='ca' || !empty($cek) && $stts=='ft')
		{
			$bc['edit'] = $this->web_app_model->getEditArmada($this->uri->segment('3'));
			
			$this->load->view('admin/bg_edit_armada',$bc);
		}
		else
		{
			header('location:'.base_url().'admin');
		}
	}


	public function edit_jadwals()
	{
		$cek = $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='admin')
		{
			
			$bc['edit'] = $this->web_app_model->getEditJadwal($this->uri->segment('3'));
			
			$this->load->view('admin/bg_edit_jadwals',$bc);
		}
		else
		{
			header('location:'.base_url().'admin');
		}
	}
	public function tambah_jadwal()
	{
		$cek = $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='admin' || !empty($cek) && $stts=='or' || !empty($cek) && $stts=='op' || !empty($cek) && $stts=='cp' || !empty($cek) && $stts=='ca' || !empty($cek) && $stts=='ft')
		{

			$bc['customer'] = $this->web_app_model->getSemuaCustomer();
			$this->load->view('admin/bg_tambah_jadwal',$bc);
		}
		else
		{
			header('location:'.base_url().'admin');
		}
	}

	public function tambah_biaya()
	{
		$cek = $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='admin' || !empty($cek) && $stts=='ft')
		{			
			$bc['biaya'] = $this->web_app_model->getSemuaBiaya();
			$this->load->view('admin/bg_tambah_biaya',$bc);
		}
		else
		{
			header('location:'.base_url().'admin');
		}
	}


	public function tambah_bank()
	{
		$cek = $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='admin' || !empty($cek) && $stts=='ft')
		{			
			$bc['biaya'] = $this->web_app_model->getSemuaBiaya();
			$this->load->view('admin/bg_tambah_bank',$bc);
		}
		else
		{
			header('location:'.base_url().'admin');
		}
	}

	public function detail_approval()
	{
		$cek = $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='admin' || !empty($cek) && $stts=='ca' || !empty($cek) && $stts=='ft')
		{
			$kd=$this->uri->segment('3');
			$id=$this->uri->segment('4');
			//$kdBiaya=$this->uri->segment('5');

			//echo $kd."<br/>".$id; exit();
		

			$bc['detail'] = $this->web_app_model->getSebagianOrderCost($kd,$id);
			$bc['detailLanjut'] = $this->web_app_model->getOrderCostLanjutan($id);
			$bc['bank'] = $this->web_app_model->getSemuaSaldoKas();
			
			$this->load->view('admin/bg_detail_approval',$bc);
		}
		else
		{
			header('location:'.base_url().'admin');
		}
	}


	public function detail_order()
	{
		$cek = $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='admin' || !empty($cek) && $stts=='ca' || !empty($cek) && $stts=='ft')
		{
			$kd=$this->uri->segment('3');
			$id=$this->uri->segment('4');
			//$kdBiaya=$this->uri->segment('5');

			//echo $kd."<br/>".$id; exit();
		

			$bc['detail'] = $this->web_app_model->getSebagianOrderCost($kd,$id);
			$bc['detailLanjut'] = $this->web_app_model->getOrderCostLanjutan($id);
			$bc['saldo'] = $this->web_app_model->getSebagianArusKas($kd,$id);
			
			$this->load->view('admin/bg_detail_order',$bc);
		}
		else
		{
			header('location:'.base_url().'admin');
		}
	}

	public function detail_cost()
	{
		$cek = $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='admin' || !empty($cek) && $stts=='cp' || !empty($cek) && $stts=='ca' || !empty($cek) && $stts=='ft')
		{
			$kd=$this->uri->segment('3');
			$id=$this->uri->segment('4');
			//echo $kd."<br/>".$id; exit();
			$bc['detail'] = $this->web_app_model->getSebagianOrderCost($kd,$id);
			//$bc['detailLanjut'] = $this->web_app_model->getOrderCostLanjutan($id);
			
			$this->load->view('admin/bg_detail_cost',$bc);
		}
		else
		{
			header('location:'.base_url().'admin');
		}
	}

	public function history_pinjaman()
	{
		$cek = $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='admin' || !empty($cek) && $stts=='ft')
		{

			$d['judul'] = "Detail Peminjaman - Sistem Informasi Aman Transport";
			
			$bc['nama'] = $this->session->userdata('nama');
			$bc['status'] = $this->session->userdata('stts');
			$bc['username'] = $this->session->userdata('username');
			$bc['stts']=$stts;
			$bc['menu'] = $this->load->view('admin/menu', $bc, true);
			$bc['bio'] = $this->load->view('admin/bio', $bc, true);			
			$this->load->view('global/bg_top',$d);		
			

			$id=$this->uri->segment('3');
			$bc['id']=$id;
			$bc['detail'] = $this->web_app_model->getHistoryPinjaman($id);
			$bc['saldoAwal'] = $this->web_app_model->getHistoryPinjamanSaldo($id,"0000-00-00");
			$this->load->view('admin/bg_detail_history',$bc);
			
			$this->load->view('global/bg_footer',$d);


			
		}
		else
		{
			header('location:'.base_url().'admin');
		}
	}

	public function history_saldo()
	{
		$cek = $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='admin')
		{

			$d['judul'] = "Detail Peminjaman - Sistem Informasi Aman Transport";
			
			$bc['nama'] = $this->session->userdata('nama');
			$bc['status'] = $this->session->userdata('stts');
			$bc['username'] = $this->session->userdata('username');
			$bc['menu'] = $this->load->view('admin/menu', '', true);
			$bc['bio'] = $this->load->view('admin/bio', $bc, true);			
			$this->load->view('global/bg_top',$d);		
			

			$id=$this->uri->segment('3');
			$bc['id']=$id;
			$bc['detail'] = $this->web_app_model->getHistorySaldoKas($id);
			$this->load->view('admin/bg_detail_history_saldo',$bc);
			
			$this->load->view('global/bg_footer',$d);


			
		}
		else
		{
			header('location:'.base_url().'admin');
		}
	}

	public function cariApproval()
	{
		$cek = $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='admin' || !empty($cek) && $stts=='ca' || !empty($cek) && $stts=='ft')
		{
			$awal  = $this->input->post('mulai');
			$akhir = $this->input->post('akhir');

			//carecho $awal."<br/>".$akhir; exit();
			$d['judul'] = "Cost Approval (CA) - Sistem Informasi Aman Transport";
			
			$bc['nama'] = $this->session->userdata('nama');
			$bc['status'] = $this->session->userdata('stts');
			$bc['username'] = $this->session->userdata('username');
			$bc['stts']=$stts;
			$bc['menu'] = $this->load->view('admin/menu', $bc, true);
			$bc['bio'] = $this->load->view('admin/bio', $bc, true);
			$bc['order'] = $this->web_app_model->getSemuaOrderCostPerTanggal($awal,$akhir);
			$bc['halaman']='';
			$this->load->view('global/bg_top',$d);
			$this->load->view('admin/bg_approval',$bc);
			$this->load->view('global/bg_footer',$d);
		}
		else
		{
			header('location:'.base_url().'admin');
		}
	}


	public function proses_pinjaman()
	{
		$cek = $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='admin' || !empty($cek) && $stts=='ft')
		{
			$awal  = $this->input->post('mulai');
			$akhir = $this->input->post('akhir');

			//carecho $awal."<br/>".$akhir; exit();
			$d['judul'] = "Pinjaman - Sistem Informasi Aman Transport";
			
			$bc['nama'] = $this->session->userdata('nama');
			$bc['status'] = $this->session->userdata('stts');
			$bc['username'] = $this->session->userdata('username');
			$bc['stts']=$stts;
			$bc['menu'] = $this->load->view('admin/menu', $bc, true);
			$bc['bio'] = $this->load->view('admin/bio', $bc, true);
			$bc['supir'] = $this->web_app_model->getSemuaSupir();
			
			$this->load->view('global/bg_top',$d);
			$this->load->view('admin/bg_tambah_pinjaman',$bc);
			$this->load->view('global/bg_footer',$d);
		}
		else
		{
			header('location:'.base_url().'admin');
		}
	}


	public function detail_fund()
	{
		$cek = $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='admin' || !empty($cek) && $stts=='ft')
		{
			$kd=$this->uri->segment('3');
			$id=$this->uri->segment('4');

			$bc['st']=$this->uri->segment('5');
			$kdBiaya = $this->uri->segment('6'); 

			$up['status']=1;
			$where = array('kd_alamat_jemput'=>$kd);
			$this->web_app_model->updateDataMultiField("tbl_saldo",$up,$where);

			$bc['detail'] = $this->web_app_model->getSebagianOrderCost($kd,$id);
			$bc['detailLanjut'] = $this->web_app_model->getOrderCostLanjutan($id);
			
			$this->load->view('admin/bg_detail_fund',$bc);
		}
		else
		{
			header('location:'.base_url().'admin');
		}
	}

	public function tambah_rincian()
	{
		$cek = $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='admin')
		{
		
			$bc['biaya'] = $this->web_app_model->getSemuaBiaya();
			$bc['rincian'] = $this->web_app_model->getSemuaRincian();
			$this->load->view('admin/bg_tambah_rincian',$bc);
		}
		else
		{
			header('location:'.base_url().'admin');
		}
	}
	
	public function tambah_cust()
	{
		$cek = $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='admin' || !empty($cek) && $stts=='or' || !empty($cek) && $stts=='op' || !empty($cek) && $stts=='cp' || !empty($cek) && $stts=='ca' || !empty($cek) && $stts=='ft')
		{
			$bc['mata_kuliah'] ="";
			
			$this->load->view('admin/bg_tambah_cust',$bc);
		}
		else
		{
			header('location:'.base_url().'admin');
		}
	}

	public function tambah_armada()
	{
		$cek = $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='admin' || !empty($cek) && $stts=='cp' || !empty($cek) && $stts=='op'  || !empty($cek) && $stts=='ca' || !empty($cek) && $stts=='ft')
		{
			$bc['customer'] = $this->web_app_model->getSemuaArmada();
			$this->load->view('admin/bg_tambah_armada',$bc);
		}
		else
		{
			header('location:'.base_url().'admin');
		}
	}

	public function tambah_supir()
	{
		$cek = $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='admin' || !empty($cek) && $stts=='op' || !empty($cek) && $stts=='cp' || !empty($cek) && $stts=='ca' || !empty($cek) && $stts=='ft')
		{
		
			$bc['customer'] = $this->web_app_model->getSemuaSupir();
			$this->load->view('admin/bg_tambah_supir',$bc);
		}
		else
		{
			header('location:'.base_url().'admin');
		}
	}

	public function tambah_spbu()
	{
		$cek = $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='admin' || !empty($cek) && $stts=='cp' || !empty($cek) && $stts=='ca' || !empty($cek) && $stts=='ft')
		{		
			
			$bc['customer'] = $this->web_app_model->getSemuaSupir();
			$this->load->view('admin/bg_tambah_spbu',$bc);
		}
		else
		{
			header('location:'.base_url().'admin');
		}
	}

	

	public function simpan_fund()
	{
		$cek = $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='admin' || !empty($cek) && $stts=='ft')
		{
			$st = $this->input->post("stts");
			
			$tanggal = $this->input->post('tglTransfer');
			$bankAsal = $this->input->post('bankAsal'); //sumber dana
			$bankTujuan = $this->input->post('id_kelas'); //tujuan dana saldo
			$jlh = $this->input->post('jlhBiaya');
			$ket = $this->input->post('txtKet');
			/*echo $tanggal."<br/>".$bankAsal."<br/>".$bankTujuan."<br/>".$jlh."<br/>";
			exit();*/

			$query = $this->db->query("select * from tbl_transfer_saldo where kd_bank_tujuan='$bankTujuan'");
			
				if($query->num_rows() > 0)
				{
					foreach($query->result() as $row)
					{
						
						$xsimpan["bank_asal"] = $bankAsal;
						$xsimpan["kd_bank_tujuan"] = $bankTujuan;
						$xsimpan["jumlah_transfer"] = $row->jumlah_transfer + $jlh;
						$xsimpan["keterangan"] = $ket." tambahan saldo";
						$xsimpan["tanggal_transfer"] = $tanggal;
						$xwhere = array('kd_bank_tujuan'=>$bankTujuan);
						$this->web_app_model->updateDataMultiField("tbl_transfer_saldo",$xsimpan,$xwhere);

						$simpan["bank_asal"] = $bankAsal;
						$simpan["kd_bank_tujuan"] = $bankTujuan;
						$simpan["kredit"] = $jlh;
						$simpan["keterangan"] = $ket." tambahan saldo";
						$simpan["tanggal_transfer"] = $tanggal;
						//$this->web_app_model->insertData('tbl_detail_transfer_saldo',$simpan);

						$s['kd_alamat_jemput']='-';
						$s['id_alamat']='-';
						$s['kd_biaya_rincian']='-';
						$s['keterangan']= $ket.' - Tambah Saldo';
						$s['debit']='0';
						$s['kredit']=$jlh;
						$s['kd_bank']=$bankTujuan;
						$s['input_by']=$stts;
						$s['tanggal']=date('Y-m-d');
						$this->web_app_model->insertData('tbl_saldo',$s);
						?>
								<script>
								window.parent.location.reload(true);
								</script>
							<?php
					}
				}
				else{
						$simpan["bank_asal"] = $bankAsal;
						$simpan["kd_bank_tujuan"] = $bankTujuan;
						$simpan["jumlah_transfer"] = $jlh;
						$simpan["keterangan"] = $ket;
						$simpan["tanggal_transfer"] = $tanggal;

						$xsimpan["bank_asal"] = $bankAsal;
						$xsimpan["kd_bank_tujuan"] = $bankTujuan;
						$xsimpan["kredit"] = $jlh;
						$xsimpan["keterangan"] = $ket;
						$xsimpan["tanggal_transfer"] = $tanggal;

				
						$s['kd_alamat_jemput']='-';
						$s['id_alamat']='-';
						$s['kd_biaya_rincian']='-';
						$s['keterangan']= $ket.' - Tambah Saldo';
						$s['debit']='0';
						$s['kredit']=$jlh;
						$s['kd_bank']=$bankTujuan;
						$s['input_by']=$stts;
						$s['tanggal']=date('Y-m-d');

						if($st=="tambah")
						{
							//$this->web_app_model->insertData('tbl_detail_transfer_saldo',$xsimpan);
							$this->web_app_model->insertData('tbl_transfer_saldo',$simpan);
							$this->web_app_model->insertData('tbl_saldo',$s);
							?>
								<script>
								window.parent.location.reload(true);
								</script>
							<?php
						}
				}

		
		}
		else
		{
			header('location:'.base_url().'admin');
		}
	}

	public function proses_approve()
	{
		$cek = $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		
		if(!empty($cek) && $stts=='admin' || !empty($cek) && $stts=='ca' || !empty($cek) && $stts=='ft')
		{
			$st = $this->input->post("stts");			
			$kd = $this->input->post('kd');
			$kdAlamat = $this->input->post('kdAlamat');			
			$kdBiaya = $this->input->post('kdBiaya');			
			$customer = $this->input->post('cust');
			$produk = $this->input->post('produk');
			$qty = $this->input->post('qty');
			$total = $this->input->post('tot');
			$jlhPinjam = $this->input->post('txtSimpan'); //jlhPinjaman
			$noKTP = $this->input->post('txtNoKTP');
			$bank = $this->input->post('txtBank');
			$inputPinjam = $this->input->post('txtJlhPinjam'); //jumlah potongan
			$selisih =($jlhPinjam-$inputPinjam);
			$potonganKas = $this->input->post('txtPotonganKas'); //jlh potongan yang didapat dari js
			$cek = $this->input->post('cek'); //tanda checkbox untuk select nilai

			$finalPotongan =0; //nilai potongan yang akan didebet dari saldo kas
			$nilaiLama =0;
			$qt = $this->db->query("select * from tbl_transfer_saldo where kd_bank_tujuan='$bank'");
				if($qt->num_rows() > 0)
				{					
					foreach($qt->result() as $row){ 
						$nilaiLama = $row->jumlah_transfer; //jumlah saldo yang eksis saat ini.
					}
				}
			$potSupir=0;
			if($potonganKas ==""){
				$finalPotongan = $total;				
			}
			else{
				$finalPotongan = $potonganKas;
			}


			if($bank == "")
			{
				?>
					<script>
					alert("Bank sumber saldo belum dipilih!");
					window.parent.location.reload(true);
					</script>
				<?php
				exit();
			}
//echo $finalPotongan." ".$nilaiLama." ".(($nilaiLama*1)-($finalPotongan*1));
//			exit();
			$updete['jumlah_transfer']=(($nilaiLama*1)-($finalPotongan*1));
			$whereis = array('kd_bank_tujuan'=>$bank);
			$this->web_app_model->updateDataMultiField("tbl_transfer_saldo",$updete,$whereis);

			//echo $kd." ".$kdAlamat.'<br/>'; 
			/*echo "Total Biaya : ".$total."- Potongan : ".$inputPinjam."=".($total-$inputPinjam)."<br/>".$jlhPinjam."<br/>Selisih ".($jlhPinjam-$inputPinjam)."<br/>"; 
			exit();*/
			$ket="";
			if($inputPinjam != "" || $inputPinjam > 0){
				$q = $this->db->query("select * from tbl_peminjaman where no_ktp=".$noKTP."");
				if($q->num_rows() > 0)
				{					
					foreach($q->result() as $row){ 
						$simpanU['id']=$row->id;
						$simpanU['no_ktp']=$row->no_ktp;
						$simpanU['kd_alamat_jemput']=$kdAlamat;					
						$simpanU['id_alamat_jemput']=$kd;					
						$simpanU['debit']=$inputPinjam;
						$simpanU['kredit']=0;
						$simpanU['date']=date("Y-m-d");
						$this->web_app_model->insertData('tbl_detail_peminjaman',$simpanU);

						$ups['kd_alamat_jemput']=$kdAlamat;
						$ups['id_alamat_jemput']=$kd;
						$ups['jumlah_pinjaman']=$selisih;
						$wheres = array('no_ktp'=>$noKTP);
						$this->web_app_model->updateDataMultiField("tbl_peminjaman",$ups,$wheres);
						$ket ="Biaya dipotong pinjaman supir sebesar ".$inputPinjam;
						/*$simpanUx['no_ktp']=$noKTP;
						$simpanUx['kd_alamat_jemput']=$kdAlamat;					
						$simpanUx['id_alamat_jemput']=$kd;					
						$simpanUx['debit']=$in
						putPinjam;
						//$simpanU['kredit']=$selisih;
						$simpanUx['date']=date("Y-m-d");
						$this->web_app_model->insertData('tbl_detail_peminjaman',$simpanU);*/
					}
				}	
			}
			else{
				//UPDATE TABLE TRANSFER SALDO SESUAI DENGAN JUMLAH POTONGAN
				$upst['jumlah_transfer']=(($nilaiLama*1)-($finalPotongan*1));
				$upst['keterangan']=$customer."-".$produk."-".$qty;
				$wherest = array('kd_bank_tujuan'=>$bank);
				//$this->web_app_model->updateDataMultiField("tbl_transfer_saldo",$upst,$wherest);

				$simpanUx['bank_asal']="";
				$simpanUx['kd_bank_tujuan']=$bank;					
				$simpanUx['debit']=$inputPinjam;
				$simpanUx['kredit']=0;
				$simpanUx['keterangan']= "Potongan dari order ".$customer."-".$produk."-".$qty;
				$simpanUx['tanggal_transfer']=date("Y-m-d");
				//$this->web_app_model->insertData('tbl_detail_transfer_saldo',$simpanUx);
			}			

			/*echo $st."<br/>".$kd."<br/>".$kdAlamat."<br/>".$kdBiaya."<br/>".$customer."<br/>".$produk."<br/>".$qty."<br/>".$total;
			exit();*/
			
			//echo "Total Biaya : ".$total."- Potongan : ".$inputPinjam."=".($total-$inputPinjam)."<br/>".$jlhPinjam."<br/>Selisih ".($jlhPinjam-$inputPinjam)."<br/>"; 

			//$jlhAkhir = ($total - $inputPinjam);
			////echo $total."-".$inputPinjam."=".$jlhAkhir;
			//exit();

			$simpan['kd_alamat_jemput']=$kdAlamat;
			$simpan['id_alamat']=$kd;
			$simpan['kd_biaya_rincian']=$kdBiaya;			
			$simpan['keterangan']=$ket. " order ".$customer."-".$produk."-".$qty;
			$simpan['debit']=$finalPotongan;
			$simpan['kredit']=0;
			$simpan['jlh_pinjaman']=$jlhPinjam;
			$simpan['jlh_potongan']=$inputPinjam;
			$simpan['tanggal'] = date("Y-m-d");
			$simpan['kd_bank'] =$bank;
			$simpan['input_by'] =$stts;

			$this->web_app_model->insertData('tbl_saldo',$simpan);

			/*if($inputPinjam > 0){
				$simpant['kd_alamat_jemput']=$kdAlamat;
				$simpant['id_alamat']=$kd;
				$simpant['kd_biaya_rincian']=$kdBiaya;			
				$simpant['keterangan']="Dipotong Pinjaman Supir ".$customer."-".$produk."-".$qty;
				$simpant['debit']=0;
				$simpant['kredit']=$finalPotongan;
				$simpant['jlh_pinjaman']=$jlhPinjam;
				$simpant['jlh_potongan']=$inputPinjam;
				$simpant['tanggal'] = date("Y-m-d");
				$simpant['kd_bank'] =$bank;
				$simpant['input_by'] =$stts;
				$this->web_app_model->insertData('tbl_saldo',$simpant);
			}*/
			
			//echo $kd."<br/>".$kdAlamat."<br/>".$kdBiaya;
			//exit();

			$up['status']=1;
			$up['tgl_kirim']=$this->input->post("tanggalKirim");
			$where = array('id_alamat_jemput'=>$kd);
			$this->web_app_model->updateDataMultiField("tbl_kode_cost_planning",$up,$where);
				?>
					<script>
					window.parent.location.reload(true);
					</script>
				<?php
			
		}
		else
		{
			header('location:'.base_url().'admin');
		}
	}




	public function simpan_biaya()
	{
		$cek = $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='admin' || !empty($cek) && $stts=='ft')
		{
			$st = $this->input->post("stts");
			
			$jemput = $this->input->post('txtJemput');
			$kirim = $this->input->post('txtTujuan');
			$produk = $this->input->post('produk');		
			$modulBiaya = $this->input->post('namaModul');
			$kode= rand(10, 20)."".date('dmyhis');

			$biaya1 = $this->input->post("namaBiaya");
			$jlh1 = $this->input->post("jlhBiaya");
			$save['nama_biaya']=$biaya1;
			$save['jumlah']=$jlh1;
			$save['id_biaya']=$kode;
			$this->web_app_model->insertData('tbl_rincian',$save);

			for($i=0;$i<49;$i++){
				$x = $this->input->post("namaBiaya".$i);
				$y = $this->input->post("jlhBiaya".$i);				

				if($x != ""){					
					$saves['nama_biaya']=$x;
					$saves['jumlah']=$y;
					$saves['id_biaya']=$kode;
					$this->web_app_model->insertData('tbl_rincian',$saves);
				}
				
			}
			

			$simpan["alamat_jemput"] = $jemput;
			$simpan["alamat_tujuan"] = $kirim;
			$simpan["produk"] = $produk;
			$simpan["kd_biaya"] = $kode;
			$simpan["nama_biaya"] = $modulBiaya;

			if($st=="edit")
			{
				$kd_jadwal = $this->input->post('id');
				$where = array('id'=>$kd_jadwal);
				$this->web_app_model->updateDataMultiField("tbl_biaya",$simpan,$where);
				?>
					<script>
					window.parent.location.reload(true);
					</script>
				<?php
			}
			else if($st=="tambah")
			{
				$this->web_app_model->insertData('tbl_biaya',$simpan);
				?>
					<script>
					window.parent.location.reload(true);
					</script>
				<?php
			}
		}
		else
		{
			header('location:'.base_url().'admin');
		}
	}

	public function simpan_bank()
	{
		$cek = $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='admin' || !empty($cek) && $stts=='ft')
		{
			$st = $this->input->post("stts");
			
			$namaBank = $this->input->post('namaBank');
			$nama = $this->input->post('namaRek');
			$norek = $this->input->post('noRek');		

			
			$simpan["nama_bank"] = $namaBank;
			$simpan["nama_rek"] = $nama;
			$simpan["no_rek"] = $norek;


			if($st=="edit")
			{
				$id= $this->input->post('id');
				$where = array('id'=>$id);
				$this->web_app_model->updateDataMultiField("tbl_bank",$simpan,$where);
				?>
					<script>
					window.parent.location.reload(true);
					</script>
				<?php
			}
			else if($st=="tambah")
			{
				$this->web_app_model->insertData('tbl_bank',$simpan);
				?>
					<script>
					window.parent.location.reload(true);
					</script>
				<?php
			}
		}
		else
		{
			header('location:'.base_url().'admin');
		}
	}


	public function simpan_mutasi()
	{
		$cek = $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='admin' || !empty($cek) && $stts=='ft')
		{
			$st = $this->input->post("stts");
			
			$bankAsal = $this->input->post('id_kelas'); //id bank asal (pilihan select option/asal)
			$bankTujuan = $this->input->post('id_kelasx'); //id bank tujuan (pilihan select option/penerima)
			$jlh = $this->input->post('jlhMutasi');
			$namaSumber = $this->input->post('txtNamaB');
			$noRekSumber = $this->input->post('txtNoR');
			$namaTujuan = $this->input->post('txtNamaBX');
			$namaBankTujuan = $this->input->post('txtNamaBank');
			$namaBankAsal = $this->input->post('txtNamaBankA');
			$noRekTujuan = $this->input->post('txtNoRX');
			$ket = $this->input->post('txtKet');			
			$tgl = date("Y-m-d");

			

		/*echo "Bank Asal : ".$namaBankAsal." Bank TUjuan ".$namaBankTujuan." Nama : ".$namaSumber."<br/> NoRek : ".$noRekSumber."<br/>Nama TJ: ".$namaTujuan." <br/>NoRekTuj : ".$noRekTujuan."<br/> Asal : ".$bankAsal."<Br/>Tujuan : ".$bankTujuan."<Br/>Jumlah : ".$jlh."<Br/>Keterangan : ".$ket."<Br/>Tanggal : ".$tgl; exit();*/

			//CEK PENGURANGAN SALDO DARI BANK SUMBER
			$subqx = $this->db->query("select * from tbl_transfer_saldo where kd_bank_tujuan=".$bankAsal."");
			$lama=0;			
			if($subqx->num_rows() > 0)
			{
				foreach($subqx->result() as $rows){
					$lama = $rows->jumlah_transfer;
					
					//$s["id"] = $rows->id;
					$sy["bank_asal"] = $bankAsal;
					$sy["kd_bank_tujuan"] = $rows->kd_bank_tujuan;
					$sy["debit"] = $jlh;
					$sy["keterangan"] = $ket; //"Mutasi ke ".$namaTujuan." ( ".$noRekTujuan." )";
					$sy["tanggal_transfer"] = $tgl;
					//$this->web_app_model->insertData('tbl_detail_transfer_saldo',$sy);


						$sxt['kd_alamat_jemput']='-';
						$sxt['id_alamat']='-';
						$sxt['kd_biaya_rincian']='-';
						$sxt['keterangan']="Mutasi ke ".$namaBankTujuan." ( ".$noRekTujuan." )";
						$sxt['debit']=$jlh;
						$sxt['kredit']=0;
						$sxt['kd_bank']=$bankAsal;
						$sxt['input_by']=$stts;
						$sxt['tanggal']=date('Y-m-d');
						$this->web_app_model->insertData('tbl_saldo',$sxt);					
				}
			} 
			
			//echo "lama : ".$lama. " ".$jlh." Hasil ".($lama-$jlh);
		$x = (($lama*1) - ($jlh*1));
			$upsdate["jumlah_transfer"] = $x;
			$upsdate["keterangan"] = "Mutasi ke ".$namaBankTujuan." (".$noRekTujuan.") sebanyak Rp. ".number_format ($jlh, 2, ',', '.');
			$whereis = array('kd_bank_tujuan'=>$bankAsal);
			//$this->web_app_model->updateDataMultiField("tbl_transfer_saldo",$upsdate,$whereis);

			//exit();

			//CEK PENAMBAHAN SALDO KE BANK TUJUAN
			$subqxs = $this->db->query("select * from tbl_transfer_saldo where kd_bank_tujuan=".$bankTujuan."");
			$lamas=0;	
			$no=1;		
			if($subqxs->num_rows() > 0)
			{
				foreach($subqxs->result() as $rows)
				{
					$lamas = $rows->jumlah_transfer;
					$in["bank_asal"] = $bankAsal;
					$in["kd_bank_tujuan"] = $rows->kd_bank_tujuan;
					$in["debit"] = 0;
					$in["kredit"] = $jlh;
					$in["keterangan"] = $ket; //"Mutasi dari ".$namaSumber." (".$noRekSumber.")";
					$in["tanggal_transfer"] = $tgl;
					$this->web_app_model->insertData('tbl_detail_transfer_saldo',$in);

					$s['kd_alamat_jemput']='-';
						$s['id_alamat']='-';
						$s['kd_biaya_rincian']='-';
						$s['keterangan']=  "Mutasi dari ".$namaBankAsal." (".$noRekSumber.")";
						$s['debit']=0;
						$s['kredit']=$jlh;
						$s['kd_bank']=$bankTujuan;
						$s['input_by']=$stts;
						$s['tanggal']=date('Y-m-d');
						$this->web_app_model->insertData('tbl_saldo',$s);

				}
				$t = ($lamas*1) + ($jlh*1);
				$upsdates["jumlah_transfer"] = $t;
				$whereiss = array('kd_bank_tujuan'=>$bankTujuan);
				//$this->web_app_model->updateDataMultiField("tbl_transfer_saldo",$upsdates,$whereiss);
			} 
			else{
				$ups["bank_asal"] = $bankAsal;
				$ups["kd_bank_tujuan"] = $bankTujuan;		
				$ups["jumlah_transfer"] =($jlh*1);
				$ups["keterangan"] = $ket; //. "Mutasi dari ".$namaSumber." (".$noRekSumber.")";
				$ups["tanggal_transfer"] = $tgl;
				//$this->web_app_model->insertData("tbl_transfer_saldo",$ups);

				$sx["bank_asal"] = $bankAsal;
				$sx["kd_bank_tujuan"] = $bankTujuan;
				$sx["kredit"] = $jlh*1;
				$sx["keterangan"] = $ket; //." Mutasi dari ".$namaSumber." (".$noRekSumber.")";
				$sx["tanggal_transfer"] = $tgl;
				$this->web_app_model->insertData('tbl_detail_transfer_saldo',$sx);


				$sh['kd_alamat_jemput']='-';
				$sh['id_alamat']='-';
				$sh['kd_biaya_rincian']='-';
				$sh['keterangan']=  "Mutasi dari ".$namaBankAsal." (".$noRekSumber.")";
				$sh['debit']=0;
				$sh['kredit']=$jlh;
				$sh['kd_bank']=$bankTujuan;
				$sh['input_by']=$stts;
				$sh['tanggal']=date('Y-m-d');
				$this->web_app_model->insertData('tbl_saldo',$sh);

			}

			header('location:'.base_url().'admin/tampil_saldo');
		}
		else
		{
			header('location:'.base_url().'admin');
		}
	}


	public function simpan_biaya_pinjaman()
	{
		$cek = $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='admin' || !empty($cek) && $stts=='ft')
		{
			$st = $this->input->post("stts");
			$tanggal = $this->input->post('tanggal');
			$noKTP = $this->input->post('txtSupir');
			$jumlah = $this->input->post('txtJumlah');
			$ket = $this->input->post('txtKet');		
			$aksi = $this->input->post('txtAksi');		

		
			if($st=="edit")
			{
				$id= $this->input->post('id');
				$where = array('id'=>$id);
				$this->web_app_model->updateDataMultiField("tbl_bank",$simpan,$where);
				?>
					<script>
					window.parent.location.reload(true);
					</script>
				<?php
			}
			else if($st=="tambah")
			{
				if($aksi == "Debit"){
					$q = $this->db->query("select * from tbl_peminjaman where no_ktp=".$noKTP."");
					if($q->num_rows() > 0)
					{					
						$lama = 0;
						foreach($q->result() as $row){ 
							$lama = $row->jumlah_pinjaman;
						}

						
						$up['keterangan'] = $ket." Potong Biaya Pinjaman Saldo lama (".$lama.")";
						$up['jumlah_pinjaman'] = ($lama - $jumlah);
						$whereis = array('no_ktp'=>$noKTP);
						$this->web_app_model->updateDataMultiField("tbl_peminjaman",$up,$whereis);

						$simpanU['id']='-';
						$simpanU['no_ktp']=$noKTP;
						$simpanU['id_alamat_jemput']='-';
						$simpanU['debit']=$jumlah;
						$simpanU['kredit']=0;
						$simpanU['date']=date("Y-m-d");
						$this->web_app_model->insertData('tbl_detail_peminjaman',$simpanU);			
					}
					else{
						$si['id']='-';
						$si['no_ktp']=$noKTP;
						$si['id_alamat_jemput']='-';
						$si['jumlah_pinjaman']=$jumlah;
						$si['keterangan']=$ket;
						$si['date']=date("Y-m-d");
						$this->web_app_model->insertData('tbl_peminjaman',$si);	

						$simpa['id']='-';
						$simpa['no_ktp']=$noKTP;
						$simpa['id_alamat_jemput']='-';
						$simpa['debit']=$jumlah;
						$simpa['kredit']=0;
						$simpa['date']=date("Y-m-d");						
						$this->web_app_model->insertData('tbl_detail_peminjaman',$simpa);	
					}
					
				}else{
					$q = $this->db->query("select * from tbl_peminjaman where no_ktp=".$noKTP."");
					if($q->num_rows() > 0)
					{					
						$lama = 0;
						foreach($q->result() as $row){ 
							$lama = $row->jumlah_pinjaman;
						}

						$jumlah = $lama + $jumlah;
						$ups['keterangan'] = $ket." Tambah Biaya Pinjaman (".$lama.")";
						$ups['jumlah_pinjaman'] = $jumlah;
						$wheres = array('no_ktp'=>$noKTP);
						$this->web_app_model->updateDataMultiField("tbl_peminjaman",$ups,$wheres);

						$simU['id']='-';
						$simU['no_ktp']=$noKTP;
						$simU['id_alamat_jemput']='-';
						$simU['debit']=0;
						$simU['kredit']=$jumlah;
						$simU['date']=date("Y-m-d");
						$this->web_app_model->insertData('tbl_detail_peminjaman',$simU);			
					}
					else{
						$simpanx['id']='-';
						$simpanx['no_ktp']=$noKTP;
						$simpanx['id_alamat_jemput']='-';
						$simpanx['jumlah_pinjaman']=$jumlah;
						$simpanx['keterangan']=$ket;
						$simpanx['date']=date("Y-m-d");


						$simpanUt['id']='-';
						$simpanUt['no_ktp']=$noKTP;
						$simpanUt['id_alamat_jemput']='-';
						$simpanUt['debit']=0;
						$simpanUt['kredit']=$jumlah;
						$simpanUt['date']=date("Y-m-d");

						$this->web_app_model->insertData('tbl_peminjaman',$simpanx);	
						$this->web_app_model->insertData('tbl_detail_peminjaman',$simpanUt);	
					}
				}

			}
			header('location:'.base_url().'admin/tampil_pinjaman');
		}
		else
		{
			header('location:'.base_url().'admin');
		}
	}



	public function simpan_rincian()
	{
		$cek = $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='admin')
		{
			$st = $this->input->post("stts");
			
			$nama = $this->input->post('namaBiaya');
			$jenisBiaya = $this->input->post('txtJenisBiaya');
			$jlh = clear($this->input->post('jlhBiaya'));
			
			$simpan["nama_biaya"] = $nama;
			$simpan["jumlah"] = $jlh;
			$simpan["id_biaya"] = $jenisBiaya;

			
			if($st=="edit")
			{
				$kd = $this->input->post('kd');
				$where = array('id_rincian'=>$kd);
				$this->web_app_model->updateDataMultiField("tbl_rincian	",$simpan,$where);
				?>
					<script>
					window.parent.location.reload(true);
					</script>
				<?php
			}
			else if($st=="tambah")
			{
				$this->web_app_model->insertData('tbl_rincian',$simpan);
				?>
					<script>
					window.parent.location.reload(true);
					</script>
				<?php
			}
		}
		else
		{
			header('location:'.base_url().'admin');
		}
	}


	public function lanjut_orders()
	{
		$cek = $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='admin')
		{
			$d['judul'] = "Order Lanjutan - Sistem Informasi Aman Transport";
			
			$bc['nama'] = $this->session->userdata('nama');
			$bc['status'] = $this->session->userdata('stts');
			$bc['username'] = $this->session->userdata('username');
			$bc['menu'] = $this->load->view('admin/menu', '', true);
			$bc['bio'] = $this->load->view('admin/bio', $bc, true);
			//$bc['jadwal'] = $this->web_app_model->getSemuaSupir();
			$jlh = 3;
			$this->load->view('global/bg_top',$d);
			$bc['jumlah']=$jlh;
			//$bc['err']=$this->form_validation->get_error_message();
			$bc['order'] = $this->web_app_model->getSebagianOrder(2);			
			$this->load->view('admin/bg_lanjut_order',$bc);
			$this->load->view('global/bg_footer',$d);
		}
		else
		{
			header('location:'.base_url().'admin');
		}
	}


	public function simpan_order_planning()
	{
		$cek = $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='admin' || !empty($cek) && $stts=='op')
		{
			
			$st = $this->input->post("stts");
			$jlh = $this->input->post("jum");
			$kod = $this->input->post("kod");
			
			$status=0;
			$a ="";
			$b = "";
			for($i=0;$i<$jlh;$i++){				
				$a = $this->input->post('np'.$i);
				$b = $this->input->post('nama'.$i);

				$this->form_validation->set_rules('nama'.$i, 'Nama Supir '.($i+1), 'required');	 		
				$this->form_validation->set_rules('np'.$i, 'Nomor Armada '.($i+1), 'required');	 		
				
	        	if ($this->form_validation->run() == FALSE) {
	        				
					//$d['judul'] = "Order Lanjutan - Sistem Informasi Aman Transport";
			
					/*$bc['nama'] = $this->session->userdata('nama');
					$bc['status'] = $this->session->userdata('stts');
					$bc['username'] = $this->session->userdata('username');
					$bc['menu'] = $this->load->view('admin/menu', '', true);
					$bc['bio'] = $this->load->view('admin/bio', $bc, true);				
					//$this->load->view('global/bg_top',$d);
					$bc['jumlah']=$jlh;
					$bc['order'] = $this->web_app_model->getSebagianOrder($kod);			
					$this->load->view('admin/bg_lanjut_order',$bc);		
					if($i>0)			
						break;*/
					//$this->load->view('global/bg_footer',$d);
					?>
						<script type='text/javascript'>	
							alert("Pastikan formnya sudah diisi sesuai dengan data yang seharusnya!")
							setTimeout(window.location.href="persetujuan",200);
						</script>
					<?php
					//header('location:'.base_url().'admin/persetujuan');
					exit();
				}
				else{
					
					$ko =$this->input->post('kode'.$i);
					$cekKode = $this->web_app_model->cekKodeTblOrderPlanning($ko);
					if($cekKode->num_rows() > 0){
						$ko = $this->input->post('kode'.$i);
						$ups['id_armada']= $this->input->post('np'.$i);
						$ups['no_ktp']= $this->input->post('nama'.$i);						
						$wheres = array('id_alamat_jemput'=>$ko);
						$this->web_app_model->updateDataMultiField("tbl_order_planning",$ups,$wheres);
					}
					else{
						$simpan['id_alamat_jemput']=$this->input->post('kode'.$i);
						$simpan['id_armada']= $this->input->post('np'.$i);
						$simpan['no_ktp']= $this->input->post('nama'.$i);
						$this->web_app_model->insertData('tbl_order_planning',$simpan);	
					}
					
				}

			}
						

			$up["status"] = "1";
			$kd_order = $this->input->post("kd_order");
			$where = array('kd_order'=>$kd_order);
			$this->web_app_model->updateDataMultiField("tbl_order",$up,$where);
			//exit();
			//header('location:'.base_url().'admin/persetujuan');
?>
						<script type='text/javascript'>	
							alert("Proses Berhasil!")
							setTimeout(window.location.href="persetujuan",200);
						</script>
					<?php
			exit();

			/*$simpan["kd_mk"] = $this->input->post("kd_mk");
			$simpan["kd_dosen"] = $this->input->post("kd_dosen");
			$simpan["kd_tahun"] = $this->input->post("kd_tahun");
			$simpan["jadwal"] = $jadwal;
			$simpan["kapasitas"] = $this->input->post("kapasitas");
			$simpan["kelas_program"] = $this->input->post("kelas_program");
			$simpan["kelas"] = $this->input->post("kelas");
			
			if($st=="edit")
			{
				$kd_jadwal = $this->input->post('kd_jadwal');
				$where = array('kd_jadwal'=>$kd_jadwal);
				$this->web_app_model->updateDataMultiField("tbl_jadwal",$simpan,$where);
				?>
					<script>
					window.parent.location.reload(true);
					</script>
				<?php
			}
			else if($st=="tambah")
			{
				$this->web_app_model->insertData('tbl_jadwal',$simpan);
				?>
					<script>
					window.parent.location.reload(true);
					</script>
				<?php
			}*/
		}
		else
		{
			header('location:'.base_url().'admin');
		}
	}


	public function simpan_order()
	{
		$cek = $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='admin' || !empty($cek) && $stts=='or' || !empty($cek) && $stts=='op' || !empty($cek) && $stts=='cp' || !empty($cek) && $stts=='ca' || !empty($cek) && $stts=='ft')
		{
			$r = rand(10, 20);
			$a = date('hisjmy');
			$kd_alamat =$a."".$r; /*kode alamat jemput di tbl_alamat_penjemputan */


			$st = $this->input->post("stts");
			$kdLama= $this->input->post("kdAlJemput");


			$al1 = $this->input->post("txtJemputAwal");
			$kota1 = $this->input->post("kotaJemput");
			$prov1 = $this->input->post("provJemput");
			$qty1 = $this->input->post("txtQtyAwal");

			$al2 = $this->input->post("txtJemput0");
			$kota2 = $this->input->post("kotaJemput0");
			$prov2 = $this->input->post("provJemput0");
			$qty2 = $this->input->post("txtQty0");

			$al3 = $this->input->post("txtJemput1");
			$kota3 = $this->input->post("kotaJemput1");
			$prov3 = $this->input->post("provJemput1");
			$qty3 = $this->input->post("txtQty1");

			$al4 = $this->input->post("txtJemput2");
			$kota4 = $this->input->post("kotaJemput2");
			$prov4 = $this->input->post("provJemput2");
			$qty4 = $this->input->post("txtQty2");


			$al5 = $this->input->post("txtJemput3");
			$kota5 = $this->input->post("kotaJemput3");
			$prov5 = $this->input->post("provJemput3");
			$qty5 = $this->input->post("txtQty3");			

			$al6 = $this->input->post("txtJemput4");
			$kota6 = $this->input->post("kotaJemput4");
			$prov6 = $this->input->post("provJemput4");
			$qty6 = $this->input->post("txtQty4");

			$al7= $this->input->post("txtJemput5");
			$kota7 = $this->input->post("kotaJemput5");
			$prov7 = $this->input->post("provJemput5");
			$qty7 = $this->input->post("txtQty5");

			$al8 = $this->input->post("txtJemput6");
			$kota8 = $this->input->post("kotaJemput6");
			$prov8 = $this->input->post("provJemput6");
			$qty8 = $this->input->post("txtQty6");
			
			$al9 = $this->input->post("txtJemput7");
			$kota9 = $this->input->post("kotaJemput7");
			$prov9 = $this->input->post("provJemput7");
			$qty9 = $this->input->post("txtQty7");
			
			$al10 = $this->input->post("txtJemput8");
			$kota10 = $this->input->post("kotaJemput8");
			$prov10 = $this->input->post("provJemput8");
			$qty10 = $this->input->post("txtQty8");
			
			$kotaKirim =$this->input->post("kotaKirim");
			$provKirim =$this->input->post("provKirim");
			$tgl_pesan =$this->input->post("tanggal");
			$id_customer = $this->input->post("namaCustomer");	
			$alamat_kirim = $this->input->post("alamat_kirim");
			$produk = $this->input->post("produk");
			$satuan = $this->input->post("satuan");
			$tot_qty = $this->input->post("tot_qty");
//
///			echo $tot_qty;
//			exit();

			/*echo $st."<br/>".$al1."<br/>".$kota1."<br/>".$prov1."<br/>".$qty1."<br/>".$al2."<br/>";
			echo $kota2."<br/>".$prov2."<br/>".$qty2."<br/>".$al3."<br/>".$kota3."<br/>".$prov3."<br/>".$qty3."<br/>".$al4."<br/>";
			echo $kota4."<br/>".$prov4."<br/>".$qty4."<br/>".$al5."<br/>".$kota5."<br/>".$prov5."<br/>".$qty5."<br/>".$al6."<br/>";
			echo $kota6."<br/>".$prov6."<br/>".$qty6."<br/>".$al7."<br/>".$kota7."<br/>".$prov7."<br/>".$qty7."<br/>".$al8."<br/>";
			echo $kota8."<br/>".$prov8."<br/>".$qty8."<br/>".$al9."<br/>".$kota9."<br/>".$prov9."<br/>".$qty9."<br/>".$al10."<br/>".$qty10;
			exit();*/


		
		if($al1!=''){		
				$simpan['id']='';
				$simpan['kd_alamat_jemput']=$kd_alamat;
				$simpan['alamat_jemput']=$al1;
				$simpan['kota'] = $kota1;
				$simpan['provinsi'] = $prov1;
				$simpan['qty']=$qty1;
				$this->web_app_model->insertData('tbl_alamat_penjemputan',$simpan);
		}
		if($al2!=''){
				$simpan['id']='';
				$simpan['kd_alamat_jemput']=$kd_alamat;
				$simpan['alamat_jemput']=$al2;
				$simpan['kota'] = $kota2;
				$simpan['provinsi'] = $prov2;
				$simpan['qty']=$qty2;
				$this->web_app_model->insertData('tbl_alamat_penjemputan',$simpan);
		}
		if($al3!=''){				
				$simpan['id']='';
				$simpan['kd_alamat_jemput']=$kd_alamat;
				$simpan['alamat_jemput']=$al3;
				$simpan['kota'] = $kota3;
				$simpan['provinsi'] = $prov3;
				$simpan['qty']=$qty3;
				$this->web_app_model->insertData('tbl_alamat_penjemputan',$simpan);
		}
		if($al4!=''){			
				$simpan['id']='';
				$simpan['kd_alamat_jemput']=$kd_alamat;
				$simpan['alamat_jemput']=$al4;
				$simpan['kota'] = $kota4;
				$simpan['provinsi'] = $prov4;
				$simpan['qty']=$qty4;
				$this->web_app_model->insertData('tbl_alamat_penjemputan',$simpan);
		}
		if($al5!=''){				
				$simpan['id']='';
				$simpan['kd_alamat_jemput']=$kd_alamat;
				$simpan['alamat_jemput']=$al5;
				$simpan['kota'] = $kota5;
				$simpan['provinsi'] = $prov5;
				$simpan['qty']=$qty5;
				$this->web_app_model->insertData('tbl_alamat_penjemputan',$simpan);
		}
		if($al6!=''){
				$simpan['id']='';
				$simpan['kd_alamat_jemput']=$kd_alamat;
				$simpan['alamat_jemput']=$al6;
				$simpan['kota'] = $kota6;
				$simpan['provinsi'] = $prov6;
				$simpan['qty']=$qty6;
				$this->web_app_model->insertData('tbl_alamat_penjemputan',$simpan);
		}
		if($al7!=''){
				$simpan['id']='';
				$simpan['kd_alamat_jemput']=$kd_alamat;
				$simpan['alamat_jemput']=$al7;
				$simpan['kota'] = $kota7;
				$simpan['provinsi'] = $prov7;
				$simpan['qty']=$qty7;
				$this->web_app_model->insertData('tbl_alamat_penjemputan',$simpan);
		}
		if($al8!=''){
				$simpan['id']='';
				$simpan['kd_alamat_jemput']=$kd_alamat;
				$simpan['alamat_jemput']=$al8;
				$simpan['kota'] = $kota8;
				$simpan['provinsi'] = $prov8;
				$simpan['qty']=$qty8;
				$this->web_app_model->insertData('tbl_alamat_penjemputan',$simpan);
		}
		if($al9!=''){
				$simpan['id']='';
				$simpan['kd_alamat_jemput']=$kd_alamat;
				$simpan['alamat_jemput']=$al9;
				$simpan['kota'] = $kota9;
				$simpan['provinsi'] = $prov9;
				$simpan['qty']=$qty9;
				$this->web_app_model->insertData('tbl_alamat_penjemputan',$simpan);
		}
		if($al10!=''){				
				$simpan['id']='';
				$simpan['kd_alamat_jemput']=$kd_alamat;
				$simpan['alamat_jemput']=$al10;
				$simpan['kota'] = $kota10;
				$simpan['provinsi'] = $prov10;
				$simpan['qty']=$qty10;
				$this->web_app_model->insertData('tbl_alamat_penjemputan',$simpan);
		}
		

		$tambah['tgl_order']=$tgl_pesan;
		$tambah['kd_customer']=$id_customer;
		$tambah['kd_alamat_jemput']= $kd_alamat;
		$tambah['alamat_pengiriman']=$alamat_kirim;
		$tambah['kota']=$kotaKirim;
		$tambah['provinsi']=$provKirim;
		$tambah['produk']=$produk;
		$tambah['qty']=$tot_qty;
		$tambah['satuan']=$satuan;
		$tambah['tanggal_input']=date('Y-m-d');
		$tambah['input_by']=$stts;
		

			if($st=="edit")
			{
				$hapus = array('kd_alamat_jemput' => $kdLama);				
				$this->web_app_model->deleteData('tbl_alamat_penjemputan',$hapus);

				$kd = $this->input->post('kdOrder');
				$where = array('kd_order'=>$kd);
				$this->web_app_model->updateDataMultiField("tbl_order",$tambah,$where);
				?>
					<script>
					window.parent.location.reload(true);
					</script>
				<?php
			}
			else if($st=="tambah")
			{
				$this->web_app_model->insertData('tbl_order',$tambah);
				?>
					<script>
					window.parent.location.reload(true);
					</script>
				<?php
			}
		}
		else
		{
			header('location:'.base_url().'admin');
		}
	}
	
	public function simpan_cust()
	{
		$cek = $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='admin' || !empty($cek) && $stts=='or' || !empty($cek) && $stts=='op' || !empty($cek) && $stts=='cp' || !empty($cek) && $stts=='ca' || !empty($cek) && $stts=='ft')
		{
			$st = $this->input->post("stts");			
			$ul   = $this->input->post('txtUl');
			$kd = date("dhms")."".rand(0,20);
			$si["id"] = $kd;
			$si["nama"] = $this->input->post('namaContact');
			$si["no_telp"] =$this->input->post('noTelpContact');
			$si["status"] =$this->input->post('cek');
			$this->web_app_model->insertData('tbl_contact',$si);
			/*echo $this->input->post('namaContact')."<br/>".$this->input->post('noTelpContact')."<br/>".$this->input->post('cek');*/

			for($i=0;$i<$ul;$i++){	
				$simpant['id']=$kd;
				$simpant["nama"] = $this->input->post('namaContact'.$i);
				$simpant["no_telp"] =$this->input->post('noTelpContact'.$i);
				$simpant["status"] =$this->input->post('cek'.$i);
				$this->web_app_model->insertData('tbl_contact',$simpant);
			}

			$nama   = $this->input->post('nama');
			$alamat = clear($this->input->post('alamat'));
			$kota = clear($this->input->post('kota'));
			$prov = $this->input->post('provinsi');
			$noTelp = clear($this->input->post('noTelp'));
			$email  = clear($this->input->post('email'));		
			$web  = clear($this->input->post('web'));		
			
			//$simpan["kd_dosen"] = '';
			$simpan["nama"] = $nama;
			$simpan["alamat"] =$alamat;
			$simpan["kota"] =$kota;
			$simpan["provinsi"] =$prov;
			$simpan["no_telp"] = $noTelp;
			$simpan["email"] = $email;		
			$simpan["website"] = $web;
			$simpan["kd_contact"] = $kd;		
			
			if($st=="edit")
			{
				$kd_cust = $this->input->post('kd_cust');
				$where = array('kd_customer'=>$kd_cust);
				$this->web_app_model->updateDataMultiField("tbl_customer",$simpan,$where);
				?>
					<script>
					window.parent.location.reload(true);
					</script>
				<?php
			}
			else if($st=="tambah")
			{
				$this->web_app_model->insertData('tbl_customer',$simpan);
				?>
					<script>
					window.parent.location.reload(true);
					</script>
				<?php
			}
		}
		else
		{
			header('location:'.base_url().'admin');
		}
	}

	public function simpan_cost()
	{
		$cek = $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='admin' || !empty($cek) && $stts=='cp' || !empty($cek) && $stts=='ca' || !empty($cek) && $stts=='ft')
		{
			$st = $this->input->post("stts");
			
			$kdBiaya = $this->input->post("kodeBayar");			
			$kd_order  = $this->input->post('allKode');			
			$jumlahRupiah = $this->input->post('jlhRupiah');
			$jlhUl = $this->input->post("jlhUlang");
			//echo $jumlahRupiah; exit();
			$bank = clear($this->input->post('txtBank'));
			

			if($kdBiaya == "- Pilih Jenis Biaya -"){
				?>
				<script type='text/javascript'>
					alert("Jenis Pembayaran Belum Dipilih!");
					window.location.href='proses_cost';
				</script>

				<?php				    
				    	exit();
			}
			elseif($bank == ""){
				?>
				<script type='text/javascript'>
					alert("Bank sumber saldo, belum dipilih!");
					window.location.href='proses_cost';
				</script>

				<?php				    
				    	exit();	
			}

			$ids = date("his").rand(0,1000);
			for($i=0;$i<20;$i++){
				$m = $this->input->post("nama".$i)."  ";
				$l = $this->input->post("jumlah".$i);
				if($m!="" && $l != ""){
					$s['id']='';
					$s["kd_biaya_detail"] = $ids;
					$s["nama_biaya"] =$m;
					$s["jumlah_biaya"] =$l;
					$this->web_app_model->insertData('tbl_detail_biaya',$s);
				}
			}

			$x = explode("/",$kd_order);
			$pos = 0;
			$idC ="";
			foreach($x as $t){
				if($t!=""){
					$kus = $q = $this->db->query("select * from tbl_kode_cost_planning where id_alamat_jemput=".$t."");
					
					if($kus->num_rows() > 0)
					{						
						$pos =1;						
						foreach($kus->result_array() as $value){
							$ups["kd_biaya_rincian"] = $ids;
							$wheres = array('id_alamat_jemput'=>$t);
							$this->web_app_model->updateDataMultiField("tbl_kode_cost_planning",$ups,$wheres);	
						}
					}
					else{
						$stm['id']='';
						$stm["kd_biaya_rincian"] = $ids;
						$stm["id_alamat_jemput"] =$t;
						$this->web_app_model->insertData('tbl_kode_cost_planning',$stm);
					}
				}			
			}
			//$kdRincian=date("dmyhis").rand(0,10000);
			//echo $ids." ".$kdRincian; exit();
			for($i=0;$i<10;$i++){				
				$a=$this->input->post("namaBiaya$i");
				$b=$this->input->post("jlhBiaya$i");
				if($a != ""){
					$ss['id']='';
					$ss["kd_biaya_detail"] = $ids;
					$ss["nama_biaya"] =$a;
					$ss["jumlah_biaya"] =$b;
					$this->web_app_model->insertData('tbl_detail_biaya',$ss);
					
				}
			}

			
			$jumlahLiter = $this->input->post('jlhLiter');
			$jumlah="";
			if($jumlahRupiah != "")
				$jumlah = $jumlahRupiah;
			else
				$jumlah = $jumlahLiter." Ltr";

			//$tanggalSurat = date("Y-m-d"); //clear($this->input->post('tanggalSurat'));
			

			//echo $kdBiaya."<br/>".$kd_order."<br/>".$ids."<br/>".$jumlah."<br/>".$tanggalSurat;
			//exit();

			$simpan["kd_biaya_perjalanan"] = $kdBiaya;
			//$simpan["kd_alamat_jemput"] = $kd_order;
			$simpan["kd_biaya_rincian"] =$ids;
			$simpan["jlh_bbm_atau_rupiah"] = $jumlah;
			$simpan["id_bank"] = $bank;		
			$simpan["status"] = 0;		
			$simpan["input_by"] = $stts;		
			
			if($st=="edit")
			{
				$kd_cust = $this->input->post('kd_cust');
				$where = array('kd_customer'=>$kd_cust);
				//$this->web_app_model->updateDataMultiField("tbl_customer",$simpan,$where);
				?>
					<script>
					window.parent.location.reload(true);
					</script>
				<?php
			}
			else if($st=="tambah")
			{
				$this->web_app_model->insertData('tbl_cost_planning',$simpan);
				$kd = explode("/",$kd_order);
				foreach($kd as $t){
					$up["status"] = "1";
					$where = array('id_alamat_jemput'=>$t);
					$this->web_app_model->updateDataMultiField("tbl_order_planning",$up,$where);	
				}
			}
			
			/*$this->load->library('fpdf');
			$this->fpdf->FPDF('P','cm','A4');
			$this->fpdf->AddPage();
			$this->fpdf->SetFont('Arial','',10);


			$this->fpdf->SetFont('times','',12);

			$this->fpdf->Cell(90 ,5, "Pembelian BBM sebanyak ".$jumlah."           ".$kd_order."             ".$kdBiaya."             ".$tanggalSurat, 0, 'L', false);				
			
	        $this->fpdf->Output('Laporan List Consumer.pdf','D');

		     

			   
		      

		     $this->load->library('email'); // load the library
		      $this->load->library('upload');
		      $config = Array(
		     'protocol' => 'smtp',
		     'smtp_host' => 'ssl://smtp.googlemail.com.',
		     'smtp_port' => 587, //465
		     'smtp_user' => 'irpan86pardosi@gmail.com', // change it to yours
		     'smtp_pass' => '7karolina1istriku', // change it to yours
		     'mailtype' => 'html',
		     'charset' => 'iso-8859-1',
		     'wordwrap' => TRUE
		  );
      		 $this->load->library('email',$config);
		     $this->email->from('irpan86pardosi@gmail.com', 'Example');
		     $this->email->to('pardozi@yahoo.com');
		     $this->email->subject('Subject Goes Here');
		     $this->email->message('Message goes here');
		     $this->email->attach(base_url().'asset/cek_hasil.pdf');
		
		     if($this->email->send())
		     	echo 'Email sent.';
		     else
		     	show_error($this->email->print_debugger());*/

		     	header('location:'.base_url().'admin/tampil_cost');
		}
		else
		{
			header('location:'.base_url().'admin');
		}
	}


	public function simpan_supir()
	{
		$cek = $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='admin' || !empty($cek) && $stts=='op' || !empty($cek) && $stts=='cp' || !empty($cek) && $stts=='ca' || !empty($cek) && $stts=='ft')
		{
			$st = $this->input->post("stts");
			$noKTP   = $this->input->post('noKTP');			
			$nama   = $this->input->post('nama');
			$noRek  = $this->input->post('noRek');
			$namaBank  = $this->input->post('namaBank');
			$namaRek  = $this->input->post('namaRek');
			$kota  = $this->input->post('kota');
			$prov  = $this->input->post('provinsi');			
			$alamat = clear($this->input->post('alamat'));
			$noTelp = clear($this->input->post('noTelp'));		
			$noTelp1 = clear($this->input->post('noTelp1'));		
			$noTelp2 = clear($this->input->post('noTelp2'));		
			
			
			$simpan["nama"] = $nama;
			$simpan['no_rek']=$noRek;
			$simpan["nama_bank"] =$namaBank;
			$simpan["nama_rek"] =$namaRek;
			$simpan["kota"] =$kota;
			$simpan["provinsi"] =$prov;
			$simpan["alamat"] =$alamat;
			$simpan["no_telp"] = $noTelp;
			$simpan["no_telp1"] = $noTelp1;
			$simpan["no_telp2"] = $noTelp2;
			
			if($st=="edit")
			{
				$where = array('no_ktp'=>$noKTP);
				$this->web_app_model->updateDataMultiField("tbl_supir",$simpan,$where);
				?>
					<script>
					window.parent.location.reload(true);
					</script>
				<?php
			}
			else if($st=="tambah")
			{
				$simpan["no_ktp"] = $noKTP;
				$this->web_app_model->insertData('tbl_supir',$simpan);
				?>
					<script>
					window.parent.location.reload(true);
					</script>
				<?php
			}
		}
		else
		{
			header('location:'.base_url().'admin');
		}
	}

	public function simpan_spbu()
	{
		$cek = $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='admin' || !empty($cek) && $stts=='cp' || !empty($cek) && $stts=='ca' || !empty($cek) && $stts=='ft')
		{
			$st = $this->input->post("stts");
			$nama   = $this->input->post('nama');			
			$alamat = clear($this->input->post('alamat'));
			$email = clear($this->input->post('email'));		
			
			
			$simpan["nama_spbu"] = $nama;			
			$simpan["alamat_spbu"] =$alamat;
			$simpan["email_spbu"] = $email;
			
			if($st=="edit")
			{
				$kode = $this->input->post('kd');	
				$where = array('id'=>$kode);
				$this->web_app_model->updateDataMultiField("tbl_spbu",$simpan,$where);
				?>
					<script>
					window.parent.location.reload(true);
					</script>
				<?php
			}
			else if($st=="tambah")
			{
				
				$this->web_app_model->insertData('tbl_spbu',$simpan);
				?>
					<script>
					window.parent.location.reload(true);
					</script>
				<?php
			}
		}
		else
		{
			header('location:'.base_url().'admin');
		}
	}

	public function simpan_armada()
	{
		$cek = $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='admin' || !empty($cek) && $stts=='op' || !empty($cek) && $stts=='cp' || !empty($cek) && $stts=='ca' || !empty($cek) && $stts=='ft')
		{
			$st = $this->input->post("stts");
			
			$nopol   = $this->input->post('nopol');
			$kapasitas = clear($this->input->post('kapasitas'));
			$merk = clear($this->input->post('merk'));
			$tipe = clear($this->input->post('tipe'));
			
			$simpan["no_polisi"] = $nopol;
			$simpan["kapasitas"] =$kapasitas;
			$simpan["merk"] =$merk;
			$simpan["tipe"] =$tipe;
			
			if($st=="edit")
			{
				$id = $this->input->post('kd_armada');
				$where = array('id'=>$id);
				$this->web_app_model->updateDataMultiField("tbl_armada",$simpan,$where);
				?>
					<script>
					window.parent.location.reload(true);
					</script>
				<?php
			}
			else if($st=="tambah")
			{
				$this->web_app_model->insertData('tbl_armada',$simpan);
				?>
					<script>
					window.parent.location.reload(true);
					</script>
				<?php
			}
		}
		else
		{
			header('location:'.base_url().'admin');
		}
	}


	

	public function hapus_semua_bagian_order()
	{
		$cek = $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='admin' || !empty($cek) && $stts=='ca' || !empty($cek) && $stts=='ft')
		{
			$kd = $this->uri->segment(3);
			$id = $this->uri->segment(4);
			$kd_biaya = $this->uri->segment(5);
		//	echo $id." ".$kd." ".$kd_biaya; exit();

			$hapusTblOrder = array('kd_alamat_jemput' => $kd);
			$hapusTblAlamat = array('kd_alamat_jemput' => $kd);
			$hapusTblCostPlan =array('kd_biaya_rincian' => $kd_biaya);
			$hapusTblKodeCost = array('kd_biaya_rincian' => $kd_biaya);
			$this->web_app_model->deleteData('tbl_order',$hapusTblOrder);
			$this->web_app_model->deleteData('tbl_alamat_penjemputan',$hapusTblAlamat);
			$this->web_app_model->deleteData('tbl_cost_planning',$hapusTblCostPlan);
			$this->web_app_model->deleteData('tbl_kode_cost_planning',$hapusTblKodeCost);
			
			header('location:'.base_url().'admin/tampil_approval');
		}
		else
		{
			header('location:'.base_url().'admin');
		}
	}


	public function batal_order()
	{
		$cek = $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='admin' || !empty($cek) && $stts=='ca' || !empty($cek) && $stts=='ft')
		{
			$kd = $this->uri->segment(3);
			$id = $this->uri->segment(4);
			$kd_biaya = $this->uri->segment(5);
			$jumlah = $this->uri->segment(6);
			$no_ktp = $this->uri->segment(7);
			$status = $this->uri->segment(8);
			$statusBayar = $this->uri->segment(9); //status sudah diapprove
			$statusOrder = $this->uri->segment(10); //status sudah di apparove
			$qty = $this->uri->segment(11); //Qty dari order
			$kodePinjam = date('hmds').rand(0,100);
			
			
			/*echo $id."<br/>".$kd."<br/>".$kd_biaya."<br/>Jumlah : ".$jumlah."<br/>".$no_ktp."<br/>".$status."<br/>".$kodePinjam."<br/>".$statusBayar."<br/>".$statusOrder; 
			exit();*/
			

			if($statusOrder == "not" || $statusBayar == "0")
			{
				/*"Ga di Approve dan ga potong apa2, delete tabel, tidak masuk arus kas, set ulang supir dan armada";*/

				$hapusTblOrderPlanning = array('id_alamat_jemput' => $id);
				$hapusTblBiaya = array('kd_biaya_detail' => $kd_biaya);
				$hapusTblCostPlan =array('kd_biaya_rincian' => $kd_biaya);
				$hapusTblKodeCost = array('id_alamat_jemput' => $id);
				$this->web_app_model->deleteData('tbl_order_planning',$hapusTblOrderPlanning);
				$this->web_app_model->deleteData('tbl_detail_biaya',$hapusTblBiaya);
				$this->web_app_model->deleteData('tbl_cost_planning',$hapusTblCostPlan);
				$this->web_app_model->deleteData('tbl_kode_cost_planning',$hapusTblKodeCost);

			}
			else{
				//echo "uda di approve";
				if($status == "pinjam")
				{
					/*"Pilihan OK" Tidak dapat dikembalikan lagi jadi Dijadikan pinjaman supir, masukkan ke pinjaman supir uang yang digunakan (yang potongan dari supir tidak ikut) tambah ke tbl_pinjaman dan pinjaman detail, kas dikembalikan ke tabel saldo (kredit)";*/
					$qrsx = $this->db->query("select a.produk, a.qty, a.satuan, (select nama from tbl_customer where kd_customer=a.kd_customer) as customer from tbl_order a join tbl_customer b on a.kd_customer=b.kd_customer where kd_alamat_jemput=".$kd."");
					if(count($qrsx->result())>0)
					{				
						foreach($qrsx->result() as $ro)
						{
							$siX['keterangan']="Refund Dana (Batal Order)".$ro->customer."-".$ro->produk."-".$ro->qty." ".$ro->satuan;

							/*echo "Refund Dana (Batal Order)".$ro->customer."-".$ro->produk."-".$ro->qty." ".$ro->satuan;*/
						}
					}
					

					$qrstx = $this->db->query("select * from tbl_saldo where kd_alamat_jemput=".$kd." and id_alamat=".$id." and kd_biaya_rincian=".$kd_biaya."");
						$old=0;
							if(count($qrstx->result())>0)
							{				
								foreach($qrstx->result() as $ro)
								{
									$old=$ro->jlh_potongan;
								}
							}


					$siX['kd_alamat_jemput']=$kd;
					$siX['id_alamat']=$id;
					$siX['kd_biaya_rincian']=$kd_biaya;			
					$siX['debit']=0;
					$siX['kredit']=($jumlah-$old);
					$siX['jlh_pinjaman']=0;
					$siX['jlh_potongan']=0;
					$siX['tanggal'] = date("Y-m-d");
					$this->web_app_model->insertData('tbl_saldo',$siX);


					$r = rand(10, 20);
					$a = date('hisjmy');
					$kd_alamat =$a."".$r; 
					//tambah order sesuai yang dibatalkan
					$kueT = $this->db->query("select * from tbl_order where kd_alamat_jemput=".$kd."");
					if(count($kueT->result())>0)
					{				
						foreach($kueT->result() as $ro)
						{
							/*kode alamat jemput di tbl_alamat_penjemputan */
							$tambahM['tgl_order']=$ro->tgl_order;
							$tambahM['kd_customer']=$ro->kd_customer;
							$tambahM['kd_alamat_jemput']= $kd_alamat;
							$tambahM['alamat_pengiriman']=$ro->alamat_pengiriman;
							$tambahM['kota']=$ro->kota;
							$tambahM['provinsi']=$ro->provinsi;
							$tambahM['produk']=$ro->produk;
							$tambahM['qty']=$qty;
							$tambahM['satuan']=$ro->satuan;
							$tambahM['tanggal_input']=$ro->tanggal_input;
							$tambahM['input_by']="Sistem";
							$this->web_app_model->insertData('tbl_order',$tambahM);						
						}						
					}

					//tambah alamat penjemputan sesuai order yang dibatalkan
					$kuexM = $this->db->query("select * from tbl_alamat_penjemputan where id=".$id."");
					if(count($kuexM->result())>0)
					{				
						foreach($kuexM->result() as $ro)
						{
							/*kode alamat jemput di tbl_alamat_penjemputan */
							$simpanYM['id']='';
							$simpanYM['kd_alamat_jemput']=$kd_alamat;
							$simpanYM['alamat_jemput']=$ro->alamat_jemput;
							$simpanYM['kota'] = $ro->kota;
							$simpanYM['provinsi'] = $ro->provinsi;
							$simpanYM['qty']=$ro->qty;
							$this->web_app_model->insertData('tbl_alamat_penjemputan',$simpanYM);
						}
					}

					//Tambah ke tbl_peminjaman ke supir sesuai dengan biaya potongan
					//$a =0;
					/*$qrst = $this->db->query("select * from tbl_saldo where kd_alamat_jemput=".$kd." and id_alamat=".$id." and kd_biaya_rincian=".$kd_biaya."");						
					if(count($qrst->result())>0)
					{				
						foreach($qrst->result() as $ro)
						{
							$a=$ro->jlh_potongan;
						}
					}*/

					$simpan['id']=$kodePinjam;
					$simpan["no_ktp"] = $no_ktp;
					$simpan["kd_alamat_jemput"] =$kd;
					$simpan["id_alamat_jemput"] =$id;
					$simpan["jumlah_pinjaman"] =$old;
					$simpan["date"] =date('Y-m-d');


					$s['id']=$kodePinjam;
					$s["no_ktp"] = $no_ktp;
					$s["kd_alamat_jemput"] =$kd;
					$s["id_alamat_jemput"] =$id;
					$s["kredit"] =$old;
					$s["date"] =date('Y-m-d');
					

					$lama=0;
					$qr= $this->db->get_where('tbl_peminjaman', array('no_ktp' => $no_ktp));
					if(count($qr->result())>0)
					{				
						foreach($qr->result() as $ro)
						{
							$lama = $ro->jumlah_pinjaman;
							$simpanU['id']=$ro->id;
						}
						
						$akhir = $old+$lama;				
						
						$simpanU["no_ktp"] =$no_ktp;
						$simpanU["kd_alamat_jemput"] =$kd;
						$simpanU["id_alamat_jemput"] =$id;
						$simpanU["debit"] =0;
						$simpanU["kredit"] =$old;
						$simpanU["date"] =date('Y-m-d');
						$this->web_app_model->insertData('tbl_detail_peminjaman',$simpanU);
						

						$ups["kd_alamat_jemput"] =$kd;
						$ups["id_alamat_jemput"] =$id;
						$ups["jumlah_pinjaman"] =$akhir;
						$ups["date"] =date('Y-m-d');
						$wheres = array('no_ktp'=>$no_ktp);
					    $this->web_app_model->updateDataMultiField("tbl_peminjaman",$ups,$wheres);
						
					}else{				
						$this->web_app_model->insertData('tbl_peminjaman',$simpan);
						$this->web_app_model->insertData('tbl_detail_peminjaman',$s);
					}
				}else{
					/*"Pilihan Cancel" Masih dapat dikembalikan jadi tidak dimasukkkan ke simpanan supir, tambahkan uang ke tbl_saldo (kredit) kemudian set ulang armada dan supir";*/
					
					$qrs = $this->db->query("select a.produk, a.qty, a.satuan, (select nama from tbl_customer where kd_customer=a.kd_customer) as customer from tbl_order a join tbl_customer b on a.kd_customer=b.kd_customer where kd_alamat_jemput=".$kd."");
					if(count($qrs->result())>0)
					{				
						foreach($qrs->result() as $ro)
						{
							$si['keterangan']="Refund Dana (Batal Order)".$ro->customer."-".$ro->produk."-".$ro->qty." ".$ro->satuan;
						}
					}
					
					$qrst = $this->db->query("select * from tbl_saldo where kd_alamat_jemput=".$kd." and id_alamat=".$id." and kd_biaya_rincian=".$kd_biaya."");
						$old=0;
							if(count($qrst->result())>0)
							{				
								foreach($qrst->result() as $ro)
								{
									$old=$ro->jlh_potongan;
								}
							}
					$si['kd_alamat_jemput']=$kd;
					$si['id_alamat']=$id;
					$si['kd_biaya_rincian']=$kd_biaya;			
					$si['debit']=0;
					$si['kredit']=($jumlah-$old);
					$si['jlh_pinjaman']=0;
					$si['jlh_potongan']=0;
					$si['tanggal'] = date("Y-m-d");
					$this->web_app_model->insertData('tbl_saldo',$si);


					$r = rand(10, 20);
					$a = date('hisjmy');
					$kd_alamat =$a."".$r; 
					//tambah order sesuai yang dibatalkan
					$kue = $this->db->query("select * from tbl_order where kd_alamat_jemput=".$kd."");
					if(count($kue->result())>0)
					{				
						foreach($kue->result() as $ro)
						{
							/*kode alamat jemput di tbl_alamat_penjemputan */
							$tambah['tgl_order']=$ro->tgl_order;
							$tambah['kd_customer']=$ro->kd_customer;
							$tambah['kd_alamat_jemput']= $kd_alamat;
							$tambah['alamat_pengiriman']=$ro->alamat_pengiriman;
							$tambah['kota']=$ro->kota;
							$tambah['provinsi']=$ro->provinsi;
							$tambah['produk']=$ro->produk;
							$tambah['qty']=$qty;
							$tambah['satuan']=$ro->satuan;
							$tambah['tanggal_input']=$ro->tanggal_input;
							$tambah['input_by']="Sistem";
							$this->web_app_model->insertData('tbl_order',$tambah);						
						}						
					}

					//tambah alamat penjemputan sesuai order yang dibatalkan
					$kuex = $this->db->query("select * from tbl_alamat_penjemputan where id=".$id."");
					if(count($kuex->result())>0)
					{				
						foreach($kuex->result() as $ro)
						{
							/*kode alamat jemput di tbl_alamat_penjemputan */
							$simpanY['id']='';
							$simpanY['kd_alamat_jemput']=$kd_alamat;
							$simpanY['alamat_jemput']=$ro->alamat_jemput;
							$simpanY['kota'] = $ro->kota;
							$simpanY['provinsi'] = $ro->provinsi;
							$simpanY['qty']=$ro->qty;
							$this->web_app_model->insertData('tbl_alamat_penjemputan',$simpanY);
						}
					}

				}
			}

			

			/*if($status=="pinjam") //belum di proses oleh approval (cost sudah terdebet) YES
			{
				if($kodePinjam == "not")
				{
					$simpan['id']=$kodePinjam;
					$simpan["no_ktp"] = $no_ktp;
					$simpan["kd_alamat_jemput"] =$kd;
					$simpan["id_alamat_jemput"] =$id;
					$simpan["jumlah_pinjaman"] =$jumlah;
					$simpan["date"] =date('Y-m-d');


					$s['id']=$kodePinjam;
					$s["no_ktp"] = $no_ktp;
					$s["kd_alamat_jemput"] =$kd;
					$s["id_alamat_jemput"] =$id;
					$s["kredit"] =$jumlah;
					$s["date"] =date('Y-m-d');
					$a =$jumlah;
					$qr= $this->db->get_where('tbl_peminjaman', array('no_ktp' => $no_ktp));
					if(count($qr->result())>0)
					{				
						foreach($qr->result() as $ro)
						{
							$lama = $ro->jumlah_pinjaman;
							$simpanU['id']=$ro->id;
						}
						
						$a+=$lama;				
						
						$simpanU["no_ktp"] =$no_ktp;
						$simpanU["kd_alamat_jemput"] =$kd;
						$simpanU["id_alamat_jemput"] =$id;
						$simpanU["debit"] =0;
						$simpanU["kredit"] =$jumlah;
						$simpanU["date"] =date('Y-m-d');
						//$this->web_app_model->insertData('tbl_detail_peminjaman',$simpanU);
						

						$ups["kd_alamat_jemput"] =$kd;
						$ups["id_alamat_jemput"] =$id;
						$ups["jumlah_pinjaman"] =$a;
						$ups["date"] =date('Y-m-d');
						$wheres = array('no_ktp'=>$no_ktp);
					   // $this->web_app_model->updateDataMultiField("tbl_peminjaman",$ups,$wheres);
						
					}else{				
					//	$this->web_app_model->insertData('tbl_peminjaman',$simpan);
					//	$this->web_app_model->insertData('tbl_detail_peminjaman',$s);
					}
				}else{
					//jika kode pinjam "done", berarti disimpan dan sudah di approve oleh approval
					//cek apakah ada potongan dari pinjaman supir
					$qrst = $this->db->query("select * from tbl_saldo where kd_alamat_jemput=".$kd." and id_alamat=".$id." and kd_biaya_rincian=".$kd_biaya."");
					$old=0;
						if(count($qrst->result())>0)
						{				
							foreach($qrst->result() as $ro)
							{
								$old=$ro->jlh_potongan;
							}
						}
						
						$simpan['id']=$kodePinjam;
						$simpan["no_ktp"] = $no_ktp;
						$simpan["kd_alamat_jemput"] =$kd;
						$simpan["id_alamat_jemput"] =$id;
						$simpan["jumlah_pinjaman"] =$old;
						$simpan["date"] =date('Y-m-d');


						$s['id']=$kodePinjam;
						$s["no_ktp"] = $no_ktp;
						$s["kd_alamat_jemput"] =$kd;
						$s["id_alamat_jemput"] =$id;
						$s["kredit"] =$old;
						$s["date"] =date('Y-m-d');
						$a =$old;
						$qr= $this->db->get_where('tbl_peminjaman', array('no_ktp' => $no_ktp));
						if(count($qr->result())>0)
						{				
							foreach($qr->result() as $ro)
							{
								$lama = $ro->jumlah_pinjaman;
								$simpanU['id']=$ro->id;
							}
							
							$a+=$lama;				
							
							$simpanU["no_ktp"] =$no_ktp;
							$simpanU["kd_alamat_jemput"] =$kd;
							$simpanU["id_alamat_jemput"] =$id;
							$simpanU["debit"] =0;
							$simpanU["kredit"] =$old;
							$simpanU["date"] =date('Y-m-d');
							$this->web_app_model->insertData('tbl_detail_peminjaman',$simpanU);
							

							$ups["kd_alamat_jemput"] =$kd;
							$ups["id_alamat_jemput"] =$id;
							$ups["jumlah_pinjaman"] =$a;
							$ups["date"] =date('Y-m-d');
							$wheres = array('no_ktp'=>$no_ktp);
						    $this->web_app_model->updateDataMultiField("tbl_peminjaman",$ups,$wheres);
							
						}else{				
							$this->web_app_model->insertData('tbl_peminjaman',$simpan);
							$this->web_app_model->insertData('tbl_detail_peminjaman',$s);
						}
				}
				
			}
			
			if($statusBayar == 1){  ///sudah di approve oleh cost approval uang sdh di transfer

				$simpa['kd_alamat_jemput']=$kd;
				$simpa['id_alamat']=$id;
				$simpa['kd_biaya_rincian']=$kd_biaya;	
				$si['kd_alamat_jemput']=$kd;
				$si['id_alamat']=$id;
				$si['kd_biaya_rincian']=$kd_biaya;	
				$qrs = $this->db->query("select a.produk, a.qty, a.satuan, (select nama from tbl_customer where kd_customer=a.kd_customer) as customer from tbl_order a join tbl_customer b on a.kd_customer=b.kd_customer where kd_alamat_jemput=".$kd."");
				if(count($qrs->result())>0)
				{				
					foreach($qrs->result() as $ro)
					{
						$simpa['keterangan']="Refund Debit (Balancing) ".$ro->customer."-".$ro->produk."-".$ro->qty." ".$ro->satuan;
						$si['keterangan']="Refund Kredit (Tambah Saldo)".$ro->customer."-".$ro->produk."-".$ro->qty." ".$ro->satuan;
					}
				}
				
				$qrst = $this->db->query("select * from tbl_saldo where kd_alamat_jemput=".$kd." and id_alamat=".$id." and kd_biaya_rincian=".$kd_biaya."");
					$old=0;
						if(count($qrst->result())>0)
						{				
							foreach($qrst->result() as $ro)
							{
								$old=$ro->debit;
							}
						}

				$simpa['debit']=0;
				$simpa['kredit']=$old;
				$simpa['jlh_pinjaman']=0;
				$simpa['jlh_potongan']=0;
				$simpa['tanggal'] = date("Y-m-d");

				$si['debit']=0;
				$si['kredit']=$old;
				$si['jlh_pinjaman']=0;
				$si['jlh_potongan']=0;
				$si['tanggal'] = date("Y-m-d");

				$this->web_app_model->insertData('tbl_saldo',$simpa);
				$this->web_app_model->insertData('tbl_saldo',$si);
			}
			*/

			$up['status']='666'; //update tabel kode cost planning
			$kode = $id;
			$where = array('id_alamat_jemput'=>$kode);
			$this->web_app_model->updateDataMultiField("tbl_kode_cost_planning",$up,$where);


			


			//update status di halaman oder awal
			$ux=0;
			$qrst = $this->db->query("select a.id, b.status as st from tbl_alamat_penjemputan a join tbl_kode_cost_planning b on a.id = b.id_alamat_jemput where kd_alamat_jemput='$kd'");
				if(count($qrst->result())>0)
				{				
					foreach($qrst->result() as $ro)
					{
						if($ro->st == "666"){
							$ux =1;
						}
						else{
							$ux =0;
						}
					}
				}
			
			if($ux == 1){
				$upx['status']='666'; //update tabel kode cost planning
				$kodex = $kd;
				$wherex = array('kd_alamat_jemput'=>$kodex);
				$this->web_app_model->updateDataMultiField("tbl_order",$upx,$wherex);
			}

			header('location:'.base_url().'admin/tampil_approval');
		}
		else
		{
			header('location:'.base_url().'admin');
		}
	}


	public function hapus_biaya()
	{
		$cek = $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='admin' || !empty($cek) && $stts=='ft')
		{
			$id = $this->uri->segment(3);
			$hapus = array('id' => $id);
			$this->web_app_model->deleteData('tbl_biaya',$hapus);
			header('location:'.base_url().'admin/tampil_biaya');
		}
		else
		{
			header('location:'.base_url().'admin');
		}
	}


	public function hapus_bank()
	{
		$cek = $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='admin' || !empty($cek) && $stts=='ft')
		{
			$id = $this->uri->segment(3);
			$hapus = array('id' => $id);
			$this->web_app_model->deleteData('tbl_bank',$hapus);
			header('location:'.base_url().'admin/tampil_bank');
		}
		else
		{
			header('location:'.base_url().'admin');
		}
	}

	public function hapus_rincian()
	{
		$cek = $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='admin')
		{
			$id = $this->uri->segment(3);
			$hapus = array('id_rincian' => $id);
			$this->web_app_model->deleteData('tbl_rincian',$hapus);
			header('location:'.base_url().'admin/tampil_rincian');
		}
		else
		{
			header('location:'.base_url().'admin');
		}
	}
	
	
	public function akun()
	{
		$cek = $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='admin' || !empty($cek) && $stts=='or' || !empty($cek) && $stts=='op' || !empty($cek) && $stts=='cp' || !empty($cek) && $stts=='ca' || !empty($cek) && $stts=='ft')
		{
			$d['judul'] = "Akun - Sistem Informasi Aman Transport";
		
			$bc['nama'] = $this->session->userdata('nama');
			$bc['status'] = $this->session->userdata('stts');
			$bc['username'] = $this->session->userdata('username');
			$bc['stts'] = $stts;
			$bc['menu'] = $this->load->view('admin/menu', $bc, true);
			$bc['bio'] = $this->load->view('admin/bio', $bc, true);
			
			$this->load->view('global/bg_top',$d);
			$this->load->view('admin/bg_akun',$bc);
			$this->load->view('global/bg_footer',$d);
		}
		else
		{
			header('location:'.base_url().'admin');
		}
	}
	
	public function simpan_akun()
	{
		$cek = $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='admin' || !empty($cek) && $stts=='or' || !empty($cek) && $stts=='op' || !empty($cek) && $stts=='cp' || !empty($cek) && $stts=='ca' || !empty($cek) && $stts=='ft')
		{
			$username = $this->session->userdata('username');
			$pass_lama = $this->input->post('pass_lama');
			$pass_baru = $this->input->post('pass_baru');
			$ulangi_pass = $this->input->post('ulangi_pass');
			
			$data['username'] = $username;
			$data['password'] = md5($pass_lama);
			$cek = $this->web_app_model->getSelectedDataMultiple('tbl_login',$data);
			if($cek->num_rows()>0)
			{
				if($pass_baru==$ulangi_pass)
				{
					$simpan['password'] = md5($pass_baru);
					$where = array('username'=>$username);
					$this->web_app_model->updateDataMultiField("tbl_login",$simpan,$where);
					$this->session->set_flashdata("save_akun","
					<p style='padding:10px; background-color:#0BE0F6; text-align:center; margin:0px;'>
					Berhasil mengubah password</p>");
					header('location:'.base_url().'admin/akun');
				}
				else
				{
					$this->session->set_flashdata("save_akun","
					<p style='padding:10px; background-color:#0BE0F6; text-align:center; margin:0px;'>
					Password Tidak Sama</p>");
					header('location:'.base_url().'admin/akun');
				}
			}
			else
			{
				$this->session->set_flashdata("save_akun","
				<p style='padding:10px; background-color:#0BE0F6; text-align:center; margin:0px;'>
				Password Lama Salah</p>");
				header('location:'.base_url().'admin/akun');
			}
		}
		else
		{
			header('location:'.base_url().'admin');
		}
	}
	
	
}

/* End of file admin.php */
/* Location: ./application/controllers/admin.php */