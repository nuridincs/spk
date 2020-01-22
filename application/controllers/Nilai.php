<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nilai extends AUTH_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('M_posisi');
		$this->load->model('M_pegawai');

	}

	public function index() {
		$data['userdata'] = $this->userdata;
		$data['dataPegawai'] = $this->M_pegawai->select_all();
		

		$data['dataKaryawan'] = $this->M_pegawai->select_all_by('karyawan');
		$data['dataNilaiKaryawanold'] = $this->M_pegawai->select_nilai_pegawai();
		$data['dataNilaiKaryawan'] = $this->M_pegawai->select_nilai_karyawan();
		$data['dataNilaiRangeKaryawan'] = $this->M_pegawai->selectNilaiRangeKaryawan();

		$data['page'] = "nilai";
		$data['judul'] = "Data Nilai";
		$data['deskripsi'] = "Manage Data Nilai";

		$data['modal_tambah_pegawai'] = show_my_modal('modals/modal_tambah_pegawai', 'tambah-pegawai', $data);
		$data['modal_tambah_nilai_pegawai'] = show_my_modal('modals/modal_tambah_nilai_pegawai', 'tambah-nilai-pegawai', $data);

		$this->template->views('Nilai/home', $data);
	}

	public function karyawan() {
		$data['userdata'] = $this->userdata;
		$data['dataPegawai'] = $this->M_pegawai->select_all();
		$user_id = $data['userdata']->id;
		

		$data['dataKaryawan'] = $this->M_pegawai->select_all_by('karyawan');
		$data['dataNilaiKaryawanold'] = $this->M_pegawai->select_nilai_pegawai();
		$data['dataNilaiKaryawan'] = $this->M_pegawai->select_nilai_karyawan();
		$data['dataNilaiRangeKaryawan'] = $this->M_pegawai->selectNilaiRangeKaryawan($user_id);

		$data['page'] = "nilai";
		$data['judul'] = "Data Nilai";
		$data['deskripsi'] = "Manage Data Nilai";

		$data['modal_tambah_pegawai'] = show_my_modal('modals/modal_tambah_pegawai', 'tambah-pegawai', $data);
		$data['modal_tambah_nilai_pegawai'] = show_my_modal('modals/modal_tambah_nilai_pegawai', 'tambah-nilai-pegawai', $data);

		$this->template->views('Nilai/nilai_by_karyawan', $data);
	}

	public function laporanPenilaian() {
		$data['userdata'] = $this->userdata;
		$data['dataPegawai'] = $this->M_pegawai->select_all();
		$data['dataKaryawan'] = $this->M_pegawai->select_all_by('karyawan');
		$data['dataNilaiKaryawan'] = $this->M_pegawai->select_nilai_pegawai();

		$data['page'] = "laporanPenilaian";
		$data['judul'] = "Laporan";
		$data['deskripsi'] = "Laporan";

		$data['modal_tambah_pegawai'] = show_my_modal('modals/modal_tambah_pegawai', 'tambah-pegawai', $data);
		$data['modal_tambah_nilai_pegawai'] = show_my_modal('modals/modal_tambah_nilai_pegawai', 'tambah-nilai-pegawai', $data);

		$this->template->views('laporanpenilaian/home', $data);
	}

	public function cetakLaporan() {
		$this->load->library('m_pdf');
		error_reporting(E_ALL);
		$nama_dokumen='PDF';
		$mpdf=new mPDF('utf-8', 'A4', 10.5, 'arial');
		ob_start();
		ob_clean();
		flush();
		$data['dataNilaiKaryawan'] = $this->M_pegawai->select_nilai_pegawai();
		$_view = $this->load->view("laporanpenilaian/cetak_laporan", $data, true);
		
		echo $_view;
			
		$html = ob_get_contents();
		//ob_end_clean();
		// $mpdf->WriteHTML(utf8_encode($html));
		$mpdf->WriteHTML($html, 2);
		$mpdf->Output($nama_dokumen.".pdf" ,'I');
		exit;
	}

	public function tampil() {
		$data['dataPosisi'] = $this->M_posisi->select_all();
		$this->load->view('nilai/list_data', $data);
	}

	public function prosesTambah() {
		$this->form_validation->set_rules('posisi', 'posisi', 'trim|required');

		$data 	= $this->input->post();
		if ($this->form_validation->run() == TRUE) {
			$result = $this->M_posisi->insert($data);

			if ($result > 0) {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Posisi Berhasil ditambahkan', '20px');
			} else {
				$out['status'] = '';
				$out['msg'] = show_err_msg('Data Posisi Gagal ditambahkan', '20px');
			}
		} else {
			$out['status'] = 'form';
			$out['msg'] = show_err_msg(validation_errors());
		}

		echo json_encode($out);
	}

	public function update() {
		$data['userdata'] 	= $this->userdata;

		$id 				= trim($_POST['id']);
		$data['dataPosisi'] = $this->M_posisi->select_by_id($id);
		print_r($id);die;

		echo show_my_modal('modals/modal_update_nilai', 'update-nilai', $data);
	}

	public function prosesUpdate() {
		$this->form_validation->set_rules('posisi', 'posisi', 'trim|required');

		$data 	= $this->input->post();
		if ($this->form_validation->run() == TRUE) {
			$result = $this->M_posisi->update($data);

			if ($result > 0) {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Posisi Berhasil diupdate', '20px');
			} else {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Posisi Gagal diupdate', '20px');
			}
		} else {
			$out['status'] = 'form';
			$out['msg'] = show_err_msg(validation_errors());
		}

		echo json_encode($out);
	}

	public function delete() {
		$id = $_POST['id'];
		$result = $this->M_posisi->delete($id);
		
		if ($result > 0) {
			echo show_succ_msg('Data Posisi Berhasil dihapus', '20px');
		} else {
			echo show_err_msg('Data Posisi Gagal dihapus', '20px');
		}
	}

	public function detail() {
		$data['userdata'] 	= $this->userdata;

		$id 				= trim($_POST['id']);
		$data['posisi'] = $this->M_posisi->select_by_id($id);
		$data['dataPosisi'] = $this->M_posisi->select_by_pegawai($id);

		echo show_my_modal('modals/modal_detail_nilai', 'detail-posisi', $data, 'lg');
	}

	public function export() {
		error_reporting(E_ALL);
    
		include_once './assets/phpexcel/Classes/PHPExcel.php';
		$objPHPExcel = new PHPExcel();

		$data = $this->M_posisi->select_all();

		$objPHPExcel = new PHPExcel(); 
		$objPHPExcel->setActiveSheetIndex(0); 
		$rowCount = 1; 

		$objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowCount, "ID"); 
		$objPHPExcel->getActiveSheet()->SetCellValue('B'.$rowCount, "Nama Posisi");
		$rowCount++;

		foreach($data as $value){
		    $objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowCount, $value->id); 
		    $objPHPExcel->getActiveSheet()->SetCellValue('B'.$rowCount, $value->nama); 
		    $rowCount++; 
		} 

		$objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel); 
		$objWriter->save('./assets/excel/Data Posisi.xlsx'); 

		$this->load->helper('download');
		force_download('./assets/excel/Data Posisi.xlsx', NULL);
	}

	public function import() {
		$this->form_validation->set_rules('excel', 'File', 'trim|required');

		if ($_FILES['excel']['name'] == '') {
			$this->session->set_flashdata('msg', 'File harus diisi');
		} else {
			$config['upload_path'] = './assets/excel/';
			$config['allowed_types'] = 'xls|xlsx';
			
			$this->load->library('upload', $config);
			
			if ( ! $this->upload->do_upload('excel')){
				$error = array('error' => $this->upload->display_errors());
			}
			else{
				$data = $this->upload->data();
				
				error_reporting(E_ALL);
				date_default_timezone_set('Asia/Jakarta');

				include './assets/phpexcel/Classes/PHPExcel/IOFactory.php';

				$inputFileName = './assets/excel/' .$data['file_name'];
				$objPHPExcel = PHPExcel_IOFactory::load($inputFileName);
				$sheetData = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);

				$index = 0;
				foreach ($sheetData as $key => $value) {
					if ($key != 1) {
						$check = $this->M_posisi->check_nama($value['B']);

						if ($check != 1) {
							$resultData[$index]['nama'] = ucwords($value['B']);
						}
					}
					$index++;
				}

				unlink('./assets/excel/' .$data['file_name']);

				if (count($resultData) != 0) {
					$result = $this->M_kota->insert_batch($resultData);
					if ($result > 0) {
						$this->session->set_flashdata('msg', show_succ_msg('Data Posisi Berhasil diimport ke database'));
						redirect('Posisi');
					}
				} else {
					$this->session->set_flashdata('msg', show_msg('Data Posisi Gagal diimport ke database (Data Sudah terupdate)', 'warning', 'fa-warning'));
					redirect('Posisi');
				}

			}
		}
	}
}

/* End of file Posisi.php */
/* Location: ./application/controllers/Posisi.php */