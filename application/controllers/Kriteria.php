<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kriteria extends AUTH_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('M_kriteria');
	}

	public function index() {
		$data['userdata'] = $this->userdata;
		$data['dataC1'] = $this->M_kriteria->select_all('kriteria_masa_kerja');
		$data['dataC2'] = $this->M_kriteria->select_all('kriteria_disiplin');
		$data['dataC3'] = $this->M_kriteria->select_all('kriteria_prestasi_kerja');
		$data['dataC4'] = $this->M_kriteria->select_all('kriteria_kerja_sama');
		$data['dataC5'] = $this->M_kriteria->select_all('kriteria_kecakapan');
		$data['dataC6'] = $this->M_kriteria->select_all('kriteria_loyalitas');
		$data['dataC7'] = $this->M_kriteria->select_all('kriteria_kepemimpinan');
		$data['dataC8'] = $this->M_kriteria->select_all('kriteria_pendidikan');

		$data['page'] = "kriteria";
		$data['judul'] = "Data Kriteria";
		$data['deskripsi'] = "Manage Data Kriteria";
		$data['table'] = !empty($_POST['table']) ? trim($_POST['table']) : "tabo";

		// $data['modal_tambah_kriteria'] = show_my_modal('modals/modal_tambah_kriteria', 'tambah-kriteria', $data);

		$this->template->views('kriteria/home', $data);
	}

	public function addKriteria() {
			$table = !empty($_POST['tablename']) ? trim($_POST['tablename']) : "";
			$data['kriteria'] = ucwords(str_replace("_", " ", $table));
			$data['kriteria_original'] = $table;
			echo show_my_modal('modals/modal_tambah_kriteria', 'tambah-kriteria', $data);
	}

	public function tampil() {
		$data['dataPegawai'] = $this->M_pegawai->select_all();
		$this->load->view('kriteria/list_data', $data);
	}

	public function prosesTambah() {
		// $this->form_validation->set_rules('tablenama', 'Tablenama', 'trim|required');
		$this->form_validation->set_rules('kriteria', 'Kriteria', 'trim|required');
		$this->form_validation->set_rules('bobot', 'Bobot', 'trim|required');

		$data = $this->input->post();
		if ($this->form_validation->run() == TRUE) {
			$result = $this->M_kriteria->execute('insert', 'kriteria', '', $data);

			if ($result > 0) {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Kriteria Berhasil ditambahkan', '20px');
			} else {
				$out['status'] = '';
				$out['msg'] = show_err_msg('Data Kriteria Gagal ditambahkan', '20px');
			}
		} else {
			$out['status'] = 'form';
			$out['msg'] = show_err_msg(validation_errors());
		}

		echo json_encode($out);
	}

	public function update() {
		$data['userdata'] = $this->userdata;
		$table 				= trim($_POST['table']);
		$id 				= trim($_POST['id']);

		$data['table'] = $table;
		$data['kriteria'] = ucwords(str_replace("_", " ", $table));
		$data['dataKriteria'] = $this->M_kriteria->select_by_id($table,$id);

		echo show_my_modal('modals/modal_update_kriteria', 'update-kriteria', $data);
	}

	public function prosesUpdate() {
		$this->form_validation->set_rules('kriteria', 'Kriteria', 'trim|required');
		$this->form_validation->set_rules('bobot', 'Bobot', 'trim|required');

		$data = $this->input->post();
		if ($this->form_validation->run() == TRUE) {
			$result = $this->M_kriteria->update($data);

			if ($result > 0) {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Kriteria Berhasil diupdate', '20px');
			} else {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Kriteria Gagal diupdate', '20px');
			}
		} else {
			$out['status'] = 'form';
			$out['msg'] = show_err_msg(validation_errors());
		}

		echo json_encode($out);
	}

	public function delete() {
		$data = $this->input->post();
		$result = $this->M_kriteria->M_kriteria->execute('delete', 'kriteria', '', $data);

		if ($result > 0) {
			echo show_succ_msg('Data Kriteria Berhasil dihapus', '20px');
		} else {
			echo show_err_msg('Data Kriteria Gagal dihapus', '20px');
		}
	}

	public function export() {
		error_reporting(E_ALL);
    
		include_once './assets/phpexcel/Classes/PHPExcel.php';
		$objPHPExcel = new PHPExcel();

		$data = $this->M_pegawai->select_all_pegawai();

		$objPHPExcel = new PHPExcel(); 
		$objPHPExcel->setActiveSheetIndex(0); 
		$rowCount = 1; 

		$objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowCount, "ID");
		$objPHPExcel->getActiveSheet()->SetCellValue('B'.$rowCount, "Nama");
		$objPHPExcel->getActiveSheet()->SetCellValue('C'.$rowCount, "Nomor Telepon");
		$objPHPExcel->getActiveSheet()->SetCellValue('D'.$rowCount, "ID Kota");
		$objPHPExcel->getActiveSheet()->SetCellValue('E'.$rowCount, "ID Kelamin");
		$objPHPExcel->getActiveSheet()->SetCellValue('F'.$rowCount, "ID Posisi");
		$objPHPExcel->getActiveSheet()->SetCellValue('G'.$rowCount, "Status");
		$rowCount++;

		foreach($data as $value){
		    $objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowCount, $value->id); 
		    $objPHPExcel->getActiveSheet()->SetCellValue('B'.$rowCount, $value->nama); 
		    $objPHPExcel->getActiveSheet()->setCellValueExplicit('C'.$rowCount, $value->telp, PHPExcel_Cell_DataType::TYPE_STRING);
		    $objPHPExcel->getActiveSheet()->SetCellValue('D'.$rowCount, $value->id_kota); 
		    $objPHPExcel->getActiveSheet()->SetCellValue('E'.$rowCount, $value->id_kelamin); 
		    $objPHPExcel->getActiveSheet()->SetCellValue('F'.$rowCount, $value->id_posisi); 
		    $objPHPExcel->getActiveSheet()->SetCellValue('G'.$rowCount, $value->status); 
		    $rowCount++; 
		} 

		$objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel); 
		$objWriter->save('./assets/excel/Data Pegawai.xlsx'); 

		$this->load->helper('download');
		force_download('./assets/excel/Data Pegawai.xlsx', NULL);
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
						$id = md5(DATE('ymdhms').rand());
						$check = $this->M_pegawai->check_nama($value['B']);

						if ($check != 1) {
							$resultData[$index]['id'] = $id;
							$resultData[$index]['nama'] = ucwords($value['B']);
							$resultData[$index]['telp'] = $value['C'];
							$resultData[$index]['id_kota'] = $value['D'];
							$resultData[$index]['id_kelamin'] = $value['E'];
							$resultData[$index]['id_posisi'] = $value['F'];
							$resultData[$index]['status'] = $value['G'];
						}
					}
					$index++;
				}

				unlink('./assets/excel/' .$data['file_name']);

				if (count($resultData) != 0) {
					$result = $this->M_pegawai->insert_batch($resultData);
					if ($result > 0) {
						$this->session->set_flashdata('msg', show_succ_msg('Data Pegawai Berhasil diimport ke database'));
						redirect('Kriteria');
					}
				} else {
					$this->session->set_flashdata('msg', show_msg('Data Pegawai Gagal diimport ke database (Data Sudah terupdate)', 'warning', 'fa-warning'));
					redirect('Kriteria');
				}

			}
		}
	}
}

/* End of file Kriteria.php */
/* Location: ./application/controllers/Kriteria.php */