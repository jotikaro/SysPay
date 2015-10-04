<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Web_App_Model extends CI_Model {

	 
	//query otomatis dengan active record
	public function getAllData($table)
	{
		return $this->db->get($table);
	}
	
	public function getAllDataLimited($table,$offset,$limit)
	{
		return $this->db->get($table,$limit,$offset);
	}
	
	public function getSelectedData($table,$key,$value)
	{
		$this->db->where($key, $value); 
		return $this->db->get($table);
	}
	
	public function getSelectedDataMultiple($table,$data)
	{
		return $this->db->get_where($table, $data);
	}
	
	function deleteData($table,$data)
	{
		$this->db->delete($table, $data);
	}
	
	function updateData($table,$data,$field,$key)
	{
		$this->db->where($key,$field);
		$this->db->update($table,$data);
	}
	
	function updateDataMultiField($table,$data,$field_key)
	{
		$this->db->update($table,$data,$field_key);
	}
	
	function insertData($table,$data)
	{
		$this->db->insert($table,$data);
	}
	
	
	//query login
	public function getLoginData($usr,$psw)
	{
		$u = mysql_real_escape_string($usr);
		$p = md5(mysql_real_escape_string($psw));
		
		$q_cek_login = $this->db->get_where('tbl_login', array('username' => $u, 'password' => $p));
		if(count($q_cek_login->result())>0)
		{
			foreach($q_cek_login->result() as $qck)
			{
			//	echo $qck->stts; exit();
				/*if($qck->stts=='mahasiswa')
				{
					$q_ambil_data = $this->db->get_where('tbl_mahasiswa', array('nim' => $u));
					foreach($q_ambil_data ->result() as $qad)
					{
						$sess_data['logged_in'] = 'yes';
						$sess_data['nim'] = $qad->nim;
						$sess_data['nama'] = $qad->nama_mahasiswa;
						$sess_data['angkatan'] = $qad->angkatan;
						$sess_data['jurusan'] = $qad->jurusan;
						$sess_data['stts'] = 'mahasiswa';
						$sess_data['program'] = $qad->kelas_program;
						$this->session->set_userdata($sess_data);
					}
					header('location:'.base_url().'mahasiswa');
				}
				else if($qck->stts=='dosen')
				{
				
					$q_ambil_data = $this->db->get_where('tbl_admin', array('username' => $u));
					foreach($q_ambil_data ->result() as $qad)
					{
						$sess_data['logged_in'] = 'yes';
						$sess_data['username'] = $qad->username;
						$sess_data['nama'] = $qad->nama_lengkap;
						$sess_data['stts'] = 'admin';
						$this->session->set_userdata($sess_data);
					}
					header('location:'.base_url().'admin');
				}
				else*/
				if($qck->stts=='admin')
				{
					$q_ambil_data = $this->db->get_where('tbl_admin', array('username' => $u));
					foreach($q_ambil_data ->result() as $qad)
					{
						$sess_data['logged_in'] = 'yes';
						$sess_data['username'] = $qad->username;
						$sess_data['nama'] = $qad->nama_lengkap;
						$sess_data['stts'] = 'admin';
						$this->session->set_userdata($sess_data);
					}
					header('location:'.base_url().'admin');
				}
				else if($qck->stts=='or')
				{
					//echo "masuk"; exit();
					$q_ambil_data = $this->db->get_where('tbl_admin', array('username' => $u));
					foreach($q_ambil_data ->result() as $qad)
					{
						$sess_data['logged_in'] = 'yes';
						$sess_data['username'] = $qad->username;
						$sess_data['nama'] = $qad->nama_lengkap;
						$sess_data['stts'] = 'or';
						$this->session->set_userdata($sess_data);
					}
					header('location:'.base_url().'index.php/admin/');
				}
				else if($qck->stts=='op')
				{
					//echo "masuk"; exit();
					$q_ambil_data = $this->db->get_where('tbl_admin', array('username' => $u));
					foreach($q_ambil_data ->result() as $qad)
					{
						$sess_data['logged_in'] = 'yes';
						$sess_data['username'] = $qad->username;
						$sess_data['nama'] = $qad->nama_lengkap;
						$sess_data['stts'] = 'op';
						$this->session->set_userdata($sess_data);
					}
					header('location:'.base_url().'index.php/admin/');
				}
				else if($qck->stts=='cp')
				{
					//echo "masuk"; exit();
					$q_ambil_data = $this->db->get_where('tbl_admin', array('username' => $u));
					foreach($q_ambil_data ->result() as $qad)
					{
						$sess_data['logged_in'] = 'yes';
						$sess_data['username'] = $qad->username;
						$sess_data['nama'] = $qad->nama_lengkap;
						$sess_data['stts'] = 'cp';
						$this->session->set_userdata($sess_data);
					}
					header('location:'.base_url().'index.php/admin/');
				}
				else if($qck->stts=='ca')
				{
					//echo "masuk"; exit();
					$q_ambil_data = $this->db->get_where('tbl_admin', array('username' => $u));
					foreach($q_ambil_data ->result() as $qad)
					{
						$sess_data['logged_in'] = 'yes';
						$sess_data['username'] = $qad->username;
						$sess_data['nama'] = $qad->nama_lengkap;
						$sess_data['stts'] = 'ca';
						$this->session->set_userdata($sess_data);
					}
					header('location:'.base_url().'index.php/admin/');
				}
				else if($qck->stts=='ft')
				{
					//echo "masuk"; exit();
					$q_ambil_data = $this->db->get_where('tbl_admin', array('username' => $u));
					foreach($q_ambil_data ->result() as $qad)
					{
						$sess_data['logged_in'] = 'yes';
						$sess_data['username'] = $qad->username;
						$sess_data['nama'] = $qad->nama_lengkap;
						$sess_data['stts'] = 'ft';
						$this->session->set_userdata($sess_data);
					}
					header('location:'.base_url().'index.php/admin/');
				}
			}
		}
		else
		{
			header('location:'.base_url().'web');
		}
	}
	
	
	

	public function getSemuaOrderCost()
	{
		$now = date("Y-m-d");
		return $this->db->query("SELECT k.qty as kuantiti, x.tgl_kirim, k.input_by, k.kd_order, k.satuan, k.tgl_order, (select nama from tbl_customer where kd_customer = k.kd_customer) as customer, k.kd_customer, k.alamat_pengiriman, k.produk, k.qty, t.kd_alamat_jemput as kds, t.alamat_jemput, t.qty, m.status as mstatus, k.kota as asal, t.kota as tujuan, t.id as idx, k.status as stOrder, m.id_alamat_jemput as id, m.id_armada, m.no_ktp, (select nama from tbl_supir where no_ktp = m.no_ktp) as nama_supir, (select no_polisi from tbl_armada where id = m.id_armada) as no_polisi, x.kd_biaya_rincian, x.id_alamat_jemput as id, x.status as st FROM `tbl_alamat_penjemputan` t left join tbl_order_planning m on t.id = m.id_alamat_jemput left join tbl_order k on t.kd_alamat_jemput = k.kd_alamat_jemput left join tbl_kode_cost_planning x on m.id_alamat_jemput = x.id_alamat_jemput  order by t.id DESC");
		// where k.tanggal_input='$now'"); set for show only today		
	}

	public function getSemuaOrderCostPage($x, $y)
	{
		return $this->db->query("SELECT k.qty as kuantiti, k.input_by, k.kd_order, k.satuan, k.tgl_order, (select nama from tbl_customer where kd_customer = k.kd_customer) as customer, k.kd_customer, k.alamat_pengiriman, k.produk, k.qty, t.kd_alamat_jemput as kds, t.alamat_jemput, t.qty as kuantiti, m.status as mstatus, k.kota as asal, t.kota as tujuan, t.id as idx, k.status as stOrder, m.id_alamat_jemput as id, m.id_armada, m.no_ktp, (select nama from tbl_supir where no_ktp = m.no_ktp) as nama_supir, (select no_polisi from tbl_armada where id = m.id_armada) as no_polisi, x.kd_biaya_rincian, x.id_alamat_jemput as id, x.status as st FROM `tbl_alamat_penjemputan` t left join tbl_order_planning m on t.id = m.id_alamat_jemput left join tbl_order k on t.kd_alamat_jemput = k.kd_alamat_jemput left join tbl_kode_cost_planning x on m.id_alamat_jemput = x.id_alamat_jemput  and m.status=1 order by  t.id DESC limit ".$x.",".$y."");
		// where k.tanggal_input='$now'"); set for show only today		
	}


	public function getSemuaOrderCostFilter($customer, $jemput, $kirim, $produk)
	{
		$now = date("Y-m-d");
		return $this->db->query("SELECT k.qty as kuantiti, k.input_by, k.kd_order, k.satuan, k.tgl_order, (select nama from tbl_customer where kd_customer = k.kd_customer) as customer, k.kd_customer, k.alamat_pengiriman, k.produk, k.qty, t.kd_alamat_jemput as kds, t.alamat_jemput, t.qty, m.status as mstatus, k.kota as asal, t.kota as tujuan, t.id as idx, k.status as stOrder, m.id_alamat_jemput as id, m.id_armada, m.no_ktp, (select nama from tbl_supir where no_ktp = m.no_ktp) as nama_supir, (select no_polisi from tbl_armada where id = m.id_armada) as no_polisi, x.kd_biaya_rincian, x.id_alamat_jemput as id, x.status as st FROM `tbl_alamat_penjemputan` t left join tbl_order_planning m on t.id = m.id_alamat_jemput left join tbl_order k on t.kd_alamat_jemput = k.kd_alamat_jemput left join tbl_kode_cost_planning x on m.id_alamat_jemput = x.id_alamat_jemput where k.status !='666' and k.kd_customer='".$customer."' and t.kota='".$jemput."' and k.kota='".$kirim."' and k.produk='".$produk."' order by k.kd_order ASC");
	}

	public function getSemuaOrderCostCari($x)
	{
		return $this->db->query("SELECT k.qty as kuantiti, k.input_by, k.kd_order, k.satuan, k.tgl_order, (select nama from tbl_customer where kd_customer = k.kd_customer) as customer, k.kd_customer, k.alamat_pengiriman, k.produk, k.qty, t.kd_alamat_jemput as kds, t.alamat_jemput, t.qty, m.status as mstatus, k.kota as asal, t.kota as tujuan, t.id as idx, k.status as stOrder, m.id_alamat_jemput as id, m.id_armada, m.no_ktp, (select nama from tbl_supir where no_ktp = m.no_ktp) as nama_supir, (select no_polisi from tbl_armada where id = m.id_armada) as no_polisi, x.kd_biaya_rincian, x.id_alamat_jemput as id, x.status as st FROM `tbl_alamat_penjemputan` t left join tbl_order_planning m on t.id = m.id_alamat_jemput left join tbl_order k on t.kd_alamat_jemput = k.kd_alamat_jemput left join tbl_kode_cost_planning x on m.id_alamat_jemput = x.id_alamat_jemput  and m.status=1 $x order by  t.id DESC");
		// where k.tanggal_input='$now'"); set for show only today		
	}

	public function getSemuaOrderCostPerTanggal($awal, $akhir)
	{
		return $this->db->query("SELECT k.qty as kuantiti, k.input_by,  k.kd_order, k.satuan, k.tgl_order, (select nama from tbl_customer where kd_customer = k.kd_customer) as customer, k.alamat_pengiriman, k.produk, k.qty, t.kd_alamat_jemput as kds, t.alamat_jemput, t.qty, m.status as mstatus, k.kota as asal, t.kota as tujuan, t.id as idx, k.status as st, m.id_alamat_jemput as id, m.id_armada, m.no_ktp, (select nama from tbl_supir where no_ktp = m.no_ktp) as nama_supir, (select no_polisi from tbl_armada where id = m.id_armada) as no_polisi, x.kd_biaya_rincian, x.id_alamat_jemput as id, x.status as st FROM `tbl_alamat_penjemputan` t left join tbl_order_planning m on t.id = m.id_alamat_jemput left join tbl_order k on t.kd_alamat_jemput = k.kd_alamat_jemput left join tbl_kode_cost_planning x on m.id_alamat_jemput = x.id_alamat_jemput where k.tanggal_input>='$awal' and k.tanggal_input <= '$akhir' and k.status !='666' order by k.kd_order ASC");
	}

	public function getSemuaOrderCostPerTanggalFund($awal, $akhir)
	{
		return $this->db->query("SELECT k.qty as kuantiti, k.input_by, k.kd_order, k.satuan, k.tgl_order, (select nama from tbl_customer where kd_customer = k.kd_customer) as customer, k.alamat_pengiriman, k.produk, k.qty, t.kd_alamat_jemput as kds, t.alamat_jemput, t.qty, m.status as mstatus, k.kota as asal, t.kota as tujuan, t.id as idx, k.status as st, m.id_alamat_jemput as id, m.id_armada, m.no_ktp, (select nama from tbl_supir where no_ktp = m.no_ktp) as nama_supir, (select no_polisi from tbl_armada where id = m.id_armada) as no_polisi, x.kd_biaya_rincian, x.id_alamat_jemput as id, x.status as st FROM `tbl_alamat_penjemputan` t left join tbl_order_planning m on t.id = m.id_alamat_jemput left join tbl_order k on t.kd_alamat_jemput = k.kd_alamat_jemput left join tbl_kode_cost_planning x on m.id_alamat_jemput = x.id_alamat_jemput where k.tanggal_input>='$awal' and k.tanggal_input <= '$akhir' and x.status =1 and k.status !='666' order by k.kd_order ASC");
	}

	public function cariArusKas($awal, $akhir)
	{
		return $this->db->query("SELECT * from tbl_saldo where tanggal >= '$awal' and tanggal <= '$akhir' order by id ASC ");
	}


	public function cariSaldoKas($awal, $akhir)
	{
		return $this->db->query("SELECT * from tbl_saldo where tanggal < '$awal' order by id ASC ");
	}


	public function cariSaldoKasBank($id)
	{
		return $this->db->query("SELECT * from tbl_saldo where kd_bank='$id' order by id ASC ");
	}

	public function getSemuaCustomer()
	{
		return $this->db->query('SELECT * from tbl_customer order by kd_customer ASC');
	}


	public function getSaldoBank()
	{
		return $this->db->query('SELECT a.id, a.kd_bank_tujuan, a.jumlah_transfer, a.keterangan, a.tanggal_transfer, (select nama_bank from tbl_bank where id =a.kd_bank_tujuan) as bank, (select nama_rek from tbl_bank where id =a.kd_bank_tujuan) as namaRek, (select no_rek from tbl_bank where id =a.kd_bank_tujuan) as noRek from tbl_transfer_saldo a order by id ASC');
	}

	public function getSemuaBank()
	{
		return $this->db->query('SELECT * from tbl_bank order by id ASC');
	}

	public function getSemuaBiaya()
	{
		return $this->db->query('SELECT * from tbl_biaya order by id ASC');
	}


	public function getSemuaRincian()
	{
		return $this->db->query('SELECT k.id_rincian, k.nama_biaya, k.jumlah, (select nama_biaya from tbl_biaya where id=k.id_biaya) as kodeBiaya from tbl_rincian k order by id_rincian ASC');
	}


	public function getSemuaPinjaman()
	{
		return $this->db->query("SELECT a.id, a.id_alamat_jemput, b.input_by, a.jumlah_pinjaman, a.keterangan, a.kd_alamat_jemput, a.no_ktp, (select nama from tbl_supir where no_ktp=a.no_ktp) as nama, a.date, (select nama from tbl_customer where kd_customer=(select kd_customer from tbl_order where kd_alamat_jemput=a.kd_alamat_jemput)) as customer, (select produk from tbl_order where kd_alamat_jemput=a.kd_alamat_jemput) as produk, (select qty from tbl_order where kd_alamat_jemput=a.kd_alamat_jemput) as qty, (select satuan from tbl_order where kd_alamat_jemput=a.kd_alamat_jemput) as satuan from tbl_peminjaman a left join tbl_order b on a.id_alamat_jemput = b.kd_alamat_jemput  order by id ASC");
	}

	public function getSemuaArmada()
	{
		return $this->db->query('SELECT * from tbl_armada order by id ASC');
	}


	public function getHistoryPinjaman($id)
	{
		return $this->db->query("SELECT a.id, a.id_alamat_jemput, b.input_by, a.kd_alamat_jemput, a.no_ktp, (select nama from tbl_supir where no_ktp=a.no_ktp) as nama, a.kredit, a.debit , a.date, (select nama from tbl_customer where kd_customer=(select kd_customer from tbl_order where kd_alamat_jemput=a.kd_alamat_jemput)) as customer, (select produk from tbl_order where kd_alamat_jemput=a.kd_alamat_jemput) as produk, (select qty from tbl_order where kd_alamat_jemput=a.kd_alamat_jemput) as qty, (select satuan from tbl_order where kd_alamat_jemput=a.kd_alamat_jemput) as satuan from tbl_detail_peminjaman a left join tbl_order b on a.id_alamat_jemput = b.kd_alamat_jemput where a.no_ktp='$id'  order by no_urut DESC");
	}

	public function getHistoryPinjamanFilter($id, $awal, $akhir)
	{
		return $this->db->query("SELECT a.id, a.id_alamat_jemput, b.input_by, a.kd_alamat_jemput, a.no_ktp, (select nama from tbl_supir where no_ktp=a.no_ktp) as nama, a.kredit, a.debit , a.date, (select nama from tbl_customer where kd_customer=(select kd_customer from tbl_order where kd_alamat_jemput=a.kd_alamat_jemput)) as customer, (select produk from tbl_order where kd_alamat_jemput=a.kd_alamat_jemput) as produk, (select qty from tbl_order where kd_alamat_jemput=a.kd_alamat_jemput) as qty, (select satuan from tbl_order where kd_alamat_jemput=a.kd_alamat_jemput) as satuan from tbl_detail_peminjaman a left join tbl_order b on a.id_alamat_jemput = b.kd_alamat_jemput where a.no_ktp='$id' and (a.date >='$awal' and a.date <='$akhir') order by no_urut DESC");
	}

	public function getHistoryPinjamanSaldo($id, $awal)
	{
		return $this->db->query("SELECT a.id, a.id_alamat_jemput, a.kd_alamat_jemput, a.no_ktp, (select nama from tbl_supir where no_ktp=a.no_ktp) as nama, a.kredit, a.debit , a.date, (select nama from tbl_customer where kd_customer=(select kd_customer from tbl_order where kd_alamat_jemput=a.kd_alamat_jemput)) as customer, (select produk from tbl_order where kd_alamat_jemput=a.kd_alamat_jemput) as produk, (select qty from tbl_order where kd_alamat_jemput=a.kd_alamat_jemput) as qty, (select satuan from tbl_order where kd_alamat_jemput=a.kd_alamat_jemput) as satuan from tbl_detail_peminjaman a left join tbl_order b on a.id_alamat_jemput = b.kd_alamat_jemput where a.no_ktp='$id' and a.date <'$awal' order by no_urut DESC");
	}

	public function getSemuaSupir()
	{
		return $this->db->query('SELECT * from tbl_supir order by no_ktp ASC');
	}

	public function getSemuaArusKas()
	{
		return $this->db->query('SELECT * from tbl_saldo order by id ASC');
	}

	public function getSebagianArusKas($kd, $id)
	{
		return $this->db->query('SELECT a.id, a.kd_alamat_jemput, a.id_alamat, a.kd_biaya_rincian, a.keterangan, a.debit, a.kredit, a.jlh_pinjaman, a.jlh_potongan, a.tanggal, a.status, a.kd_bank, a.input_by, (select nama_bank from tbl_bank where id=a.kd_bank) as bank from tbl_saldo a join tbl_bank b on a.kd_bank = b.id where kd_alamat_jemput='.$kd.' and id_alamat='.$id.' order by id ASC');
	}

	public function getSemuaSaldoKas()
	{
		return $this->db->query('SELECT a.id, b.id as kode, a.bank_asal, a.kd_bank_tujuan, a.jumlah_transfer, a.keterangan, a.tanggal_transfer, b.nama_bank as bank, b.nama_rek, b.no_rek from tbl_transfer_saldo a inner join tbl_bank b on a.kd_bank_tujuan = b.id order by id DESC');
	}


	public function getEditSaldoKas($id)
	{
		return $this->db->query("SELECT a.id, b.id as kode, a.bank_asal, a.kd_bank_tujuan, a.jumlah_transfer, a.keterangan, a.tanggal_transfer, b.nama_bank as bank, b.nama_rek, b.no_rek from tbl_transfer_saldo a inner join tbl_bank b on a.kd_bank_tujuan = b.id where b.id='$id' order by id DESC");
	}

 public function getHistorySaldoKas($id)
	{
		return $this->db->query("SELECT a.id, b.id as kode, a.bank_asal, a.kd_bank_tujuan, a.keterangan, a.kredit, a.debit, a.tanggal_transfer as tanggal, b.nama_bank as bank, b.nama_rek, b.no_rek from tbl_detail_transfer_saldo a inner join tbl_bank b on a.kd_bank_tujuan = b.id where a.kd_bank_tujuan='$id' order by id DESC");
	}


	 public function getSemuaHistorySaldoKas()
	{
		return $this->db->query("SELECT a.id, b.id as kode, a.bank_asal, a.kd_bank_tujuan, a.keterangan, a.kredit, a.debit, a.tanggal_transfer as tanggal, b.nama_bank as bank, b.nama_rek, b.no_rek from tbl_detail_transfer_saldo a inner join tbl_bank b on a.kd_bank_tujuan = b.id order by id DESC");
	}

	public function getSemuaHistorySaldoKasList()
	{
		return $this->db->query("SELECT a.id, b.id as kode, a.bank_asal, a.kd_bank_tujuan, a.keterangan, a.kredit, a.debit, a.tanggal_transfer as tanggal, b.nama_bank as bank, b.nama_rek, b.no_rek from tbl_detail_transfer_saldo a inner join tbl_bank b on a.kd_bank_tujuan = b.id order by a.kd_bank_tujuan DESC");
	}


	public function ambil_kas($limit,$start)
	 {
		 return $this->db
		 			 ->order_by('id','ASC')
		 			 ->limit($limit,$start)
		 			 ->get_where('tbl_saldo');
	 }

	public function getSemuaSPBU()
	{
		return $this->db->query('SELECT * from tbl_spbu order by id ASC');
	}

	public function getSemuaOrder()
	{
		return $this->db->query('SELECT k.satuan, k.input_by, k.kota as asal,  k.kd_order, k.status as stOrder, k.tgl_order, k.alamat_pengiriman,k.produk,k.qty, l.nama, k.kd_alamat_jemput 
from tbl_order k join tbl_customer l on k.kd_customer = l.kd_customer order by kd_order DESC');
	}

	public function getSemuaOrderFilter($id)
	{
		return $this->db->query("SELECT k.satuan, k.kota as asal, k.input_by,  k.kd_order, k.status as stOrder, k.tgl_order, k.alamat_pengiriman,k.produk,k.qty, l.nama, k.kd_alamat_jemput 
from tbl_order k join tbl_customer l on k.kd_customer = l.kd_customer where k.status='$id' order by kd_order DESC");
	}

	public function getSemuaFundTransfer()
	{
		return $this->db->query('SELECT * from tbl_fundT  order by id_fund ASC');
	}
	
	public function getSebagianOrderCost($kd, $id)
	{
		return $this->db->query("SELECT k.satuan, k.kota as kotaAsal, t.kota as tujuan,  k.kd_order, k.tgl_order, (select nama from tbl_customer where kd_customer = k.kd_customer) as customer, k.alamat_pengiriman, k.produk, k.qty, k.status as stOrder, t.kd_alamat_jemput, t.alamat_jemput, t.qty, m.no_ktp, m.id_alamat_jemput, m.id_armada, m.status as mstatus, (select nama from tbl_supir where no_ktp = m.no_ktp) as nama_supir, (select no_polisi from tbl_armada where id = m.id_armada) as no_polisi FROM tbl_alamat_penjemputan t left join tbl_order_planning m on t.id = m.id_alamat_jemput left join tbl_order k on t.kd_alamat_jemput = k.kd_alamat_jemput where k.kd_alamat_jemput=".$kd." and m.id_alamat_jemput=".$id."");
	}

	public function getOrderCostLanjutan($kd){
		return $this->db->query("SELECT k.kd_biaya_rincian, k.id, k.status as st, k.id_alamat_jemput, m.kd_biaya_rincian, m.jlh_bbm_atau_rupiah, k.tgl_kirim, m.id_bank, (select nama_bank from tbl_bank where id=m.id_bank) as bank, m.kd_biaya_perjalanan FROM `tbl_kode_cost_planning` k inner join tbl_cost_planning m on k.kd_biaya_rincian = m.kd_biaya_rincian WHERE k.id_alamat_jemput='$kd'");
	}

	public function cekKodeTblOrderPlanning($kd)
	{
		return $this->db->query("SELECT  * from tbl_order_planning where id_alamat_jemput=$kd");
	}

	public function getSebagianOrderPlanning($kd){
		return $this->db->query("SELECT k.satuan,  k.kd_order, k.kota as asal, k.provinsi, k.tgl_order, (select nama from tbl_customer where kd_customer = k.kd_customer) as nama, k.alamat_pengiriman, t.kota as tujuan, k.produk, k.qty, t.kd_alamat_jemput, t.alamat_jemput, t.qty, m.status, m.no_ktp, m.id_alamat_jemput, m.id_armada, (select nama from tbl_supir where no_ktp = m.no_ktp) as nama_supir, (select no_polisi from tbl_armada where id = m.id_armada) as no_polisi FROM tbl_alamat_penjemputan t left join tbl_order_planning m on t.id = m.id_alamat_jemput left join tbl_order k on t.kd_alamat_jemput = k.kd_alamat_jemput where k.kd_alamat_jemput='$kd'");
	}

	public function getSebagianOrder($id)
	{
		return $this->db->query('SELECT k.kd_order, k.kd_customer, k.satuan, k.kota, k.provinsi, k.tgl_order, k.alamat_pengiriman,k.produk, k.qty, l.nama, k.kd_alamat_jemput 
from tbl_order k join tbl_customer l on k.kd_customer = l.kd_customer where kd_order="'.$id.'"');
	}


	public function getSebagianAlamat($id)
	{
		return $this->db->query('SELECT  t.kd_alamat_jemput, t.alamat_jemput, t.qty, m.id_alamat_jemput, m.id_armada, (select nama from tbl_supir where no_ktp = m.no_ktp) as nama_supir, (select no_polisi from tbl_armada where id = m.id_armada) as no_polisi FROM `tbl_alamat_penjemputan` t left join tbl_order_planning m on t.id = m.id_alamat_jemput WHERE kd_alamat_jemput="'.$id.'"');
	}
	
	//query untuk mengambil salah satu detail jadwal
	public function getEditJadwal($kd_jadwal)
	{
		return $this->db->query("SELECT a.kd_jadwal,a.jadwal, b.kd_mk, b.nama_mk, c.kd_dosen, c.nama_dosen, d.kd_tahun, a.kapasitas, a.kelas_program, 
		a.kelas FROM tbl_jadwal a 
		left join tbl_mk b on a.kd_mk=b.kd_mk
		left join tbl_dosen c on a.kd_dosen=c.kd_dosen
		left join tbl_thn_ajaran d on a.kd_tahun=d.kd_tahun where a.kd_jadwal='".$kd_jadwal."'");
	}
	
	public function getEditCustomer($kd_cust)
	{
		return $this->db->query("SELECT * from tbl_customer where kd_customer='".$kd_cust."'");
	}


	public function getEditBiaya($kd_cust)
	{
		return $this->db->query("SELECT k.id, k.alamat_jemput, k.alamat_tujuan, k.produk, k.kd_biaya, k.nama_biaya as modul, m.nama_biaya, m.jumlah, m.id_biaya from tbl_biaya k inner join tbl_rincian m on k.kd_biaya=m.id_biaya where k.kd_biaya='".$kd_cust."'");
	}

	public function getRincian($id)
	{
		return $this->db->query("SELECT * from tbl_rincian where id_biaya='".$id."'");
	}

	public function getEditRincian($id)
	{
		return $this->db->query("SELECT * from tbl_rincian where id_rincian='".$id."'");
	}

	public function getEditBank($id)
	{
		return $this->db->query("SELECT * from tbl_bank where id='".$id."'");
	}

	public function getEditSPBU($kd)
	{
		return $this->db->query("SELECT * from tbl_spbu where id='".$kd."'");
	}


	public function getEditArmada($kd)
	{
		return $this->db->query("SELECT * from tbl_armada where id='".$kd."'");
	}

	public function getEditSupir($kd)
	{
		return $this->db->query("SELECT * from tbl_supir where no_ktp='".$kd."'");
	}
	
	
	
}

/* End of file web_app_model.php */
/* Location: ./application/models/web_app_model.php */