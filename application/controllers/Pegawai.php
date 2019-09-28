<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawai extends AUTH_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('M_pegawai');
		$this->load->model('M_kriteria');
		$this->load->model('M_posisi');
		$this->load->model('M_kota');
	}

	public function index() {
		$data['userdata'] = $this->userdata;
		$data['dataPegawai'] = $this->M_pegawai->select_all();
		$data['dataPosisi'] = $this->M_posisi->select_all();
		$data['dataKota'] = $this->M_kota->select_all();

		$data['dataKaryawan'] = $this->M_pegawai->select_all_by('karyawan');
		$data['dataNilaiKaryawanOld'] = $this->M_pegawai->select_nilai_pegawai();
		$data['dataNilaiKaryawan'] = $this->M_pegawai->select_nilai_karyawan();
		$data['kriteria'] = $this->getKriteria();

		$data['page'] = "pegawai";
		$data['judul'] = "Data Pegawai";
		$data['deskripsi'] = "Manage Data Pegawai";

		$data['modal_tambah_pegawai'] = show_my_modal('modals/modal_tambah_pegawai', 'tambah-pegawai', $data);
		$data['modal_tambah_nilai_pegawai'] = show_my_modal('modals/modal_tambah_nilai_pegawai', 'tambah-nilai-pegawai', $data);

		$this->template->views('pegawai/home', $data);
	}

	private function getKriteria() {
		$data['dataC1'] = $this->M_kriteria->select_all('kriteria_masa_kerja');
		$data['dataC2'] = $this->M_kriteria->select_all('kriteria_disiplin');
		$data['dataC3'] = $this->M_kriteria->select_all('kriteria_prestasi_kerja');
		$data['dataC4'] = $this->M_kriteria->select_all('kriteria_kerja_sama');
		$data['dataC5'] = $this->M_kriteria->select_all('kriteria_kecakapan');
		$data['dataC6'] = $this->M_kriteria->select_all('kriteria_loyalitas');
		$data['dataC7'] = $this->M_kriteria->select_all('kriteria_kepemimpinan');
		$data['dataC8'] = $this->M_kriteria->select_all('kriteria_pendidikan');

		return $data;
	}

	public function tampil() {
		$data['dataPegawai'] = $this->M_pegawai->select_all();
		$this->load->view('pegawai/list_data', $data);
	}

	public function prosesTambah() {
		$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
		$this->form_validation->set_rules('nik', 'Nik', 'trim|required');
		$this->form_validation->set_rules('posisi', 'Posisi', 'trim|required');
		$this->form_validation->set_rules('jabatan', 'Jabatan', 'trim|required');
		$this->form_validation->set_rules('level', 'Level', 'trim|required');
		$this->form_validation->set_rules('doj', 'Doj', 'trim|required');

		$data = $this->input->post();
		if ($this->form_validation->run() == TRUE) {
			$result = $this->M_pegawai->insert($data);

			if ($result > 0) {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Pegawai Berhasil ditambahkan', '20px');
			} else {
				$out['status'] = '';
				$out['msg'] = show_err_msg('Data Pegawai Gagal ditambahkan', '20px');
			}
		} else {
			$out['status'] = 'form';
			$out['msg'] = show_err_msg(validation_errors());
		}

		echo json_encode($out);
	}

	public function prosesTambahNilaiPegawai() {
		$this->form_validation->set_rules('id_karyawan', 'Id_karyawan', 'trim|required');
		$this->form_validation->set_rules('c1', 'C1', 'trim|required');
		$this->form_validation->set_rules('c2', 'C2', 'trim|required');
		$this->form_validation->set_rules('c3', 'C3', 'trim|required');
		$this->form_validation->set_rules('c4', 'C4', 'trim|required');
		$this->form_validation->set_rules('c5', 'C5', 'trim|required');
		$this->form_validation->set_rules('c6', 'C6', 'trim|required');
		$this->form_validation->set_rules('c7', 'C7', 'trim|required');
		$this->form_validation->set_rules('c8', 'C8', 'trim|required');

		$data = $this->input->post();
		if ($this->form_validation->run() == TRUE) {
			// if ($data['typeUpdate'] != '') {
			// 	$result = $this->M_pegawai->updateNilai($data);
			// } else {
			// 	$result = $this->M_pegawai->insertNilai($data);
			// }
			$result = $this->M_pegawai->insertNilai($data);

			if ($result > 0) {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Nilai Pegawai Berhasil ditambahkan', '20px');
			} else {
				$out['status'] = '';
				$out['msg'] = show_err_msg('Data Nilai Pegawai Gagal ditambahkan', '20px');
			}
		} else {
			$out['status'] = 'form';
			$out['msg'] = show_err_msg(validation_errors());
		}

		echo json_encode($out);
	}

	public function prosesUpdateNilaiPegawai() {
		// $data = $this->input->post();
		// $this->M_pegawai->updateNilai($data);
		$this->form_validation->set_rules('id_karyawan', 'Id_karyawan', 'trim|required');
		$this->form_validation->set_rules('c1', 'C1', 'trim|required');
		$this->form_validation->set_rules('c2', 'C2', 'trim|required');
		$this->form_validation->set_rules('c3', 'C3', 'trim|required');
		$this->form_validation->set_rules('c4', 'C4', 'trim|required');
		$this->form_validation->set_rules('c5', 'C5', 'trim|required');
		$this->form_validation->set_rules('c6', 'C6', 'trim|required');
		$this->form_validation->set_rules('c7', 'C7', 'trim|required');
		$this->form_validation->set_rules('c8', 'C8', 'trim|required');

		$data = $this->input->post();
		if ($this->form_validation->run() == TRUE) {
			// if ($data['typeUpdate'] != '') {
				$result = $this->M_pegawai->updateNilai($data);
				print_r($result);die;
			// } else {
			// 	$result = $this->M_pegawai->insertNilai($data);
			// }

			if ($result > 0) {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Nilai Pegawai Berhasil ditambahkan', '20px');
			} else {
				$out['status'] = '';
				$out['msg'] = show_err_msg('Data Nilai Pegawai Gagal ditambahkan', '20px');
			}
		} else {
			$out['status'] = 'form';
			$out['msg'] = show_err_msg(validation_errors());
		}

		echo json_encode($out);
	}

	public function update() {
		$id = trim($_POST['id']);

		$data['dataPegawai'] = $this->M_pegawai->select_by_id($id);
		$data['dataPosisi'] = $this->M_posisi->select_all();
		$data['dataKota'] = $this->M_kota->select_all();
		$data['userdata'] = $this->userdata;

		echo show_my_modal('modals/modal_update_pegawai', 'update-pegawai', $data);
	}

	public function updateNilaiKaryawan() {
		$id = trim($_POST['id']);

		$data['dataNilaiPegawai'] = $this->M_pegawai->select_nilai_pegawai($id);
		$data['dataKaryawan'] = $this->M_pegawai->select_all_by('karyawan');
		$data['dataNilaiKaryawan'] = $this->M_pegawai->select_nilai_pegawai();
		$data['kriteria'] = $this->getKriteria();
		$data['type'] = "update";
		$data['id'] = $id;

		echo show_my_modal('modals/modal_update_nilai_pegawai', 'update-nilai-karyawan', $data);
	}

	public function prosesUpdate() {
		$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
		$this->form_validation->set_rules('nik', 'Nik', 'trim|required');
		$this->form_validation->set_rules('posisi', 'Posisi', 'trim|required');
		$this->form_validation->set_rules('jabatan', 'Jabatan', 'trim|required');
		$this->form_validation->set_rules('level', 'Level', 'trim|required');
		$this->form_validation->set_rules('doj', 'Doj', 'trim|required');

		$data = $this->input->post();
		if ($this->form_validation->run() == TRUE) {
			$result = $this->M_pegawai->update($data);

			if ($result > 0) {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Pegawai Berhasil diupdate', '20px');
			} else {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Pegawai Gagal diupdate', '20px');
			}
		} else {
			$out['status'] = 'form';
			$out['msg'] = show_err_msg(validation_errors());
		}

		echo json_encode($out);
	}

	public function delete() {
		$id = $_POST['id'];
		$result = $this->M_pegawai->delete('karyawan', $id);

		if ($result > 0) {
			echo show_succ_msg('Data Karyawan Berhasil dihapus', '20px');
		} else {
			echo show_err_msg('Data Karyawan Gagal dihapus', '20px');
		}
	}

	public function deleteNilaiKaryawan() {
		$id = $_POST['id'];
		$result = $this->M_pegawai->delete('nilaikaryawan', $id);

		if ($result > 0) {
			echo show_succ_msg('Data Nilai Karyawan Berhasil dihapus', '20px');
		} else {
			echo show_err_msg('Data Nilai Karyawan Gagal dihapus', '20px');
		}
	}

	public function export() {
		error_reporting(E_ALL);
    
		include_once './assets/phpexcel/Classes/PHPExcel.php';
		$objPHPExcel = new PHPExcel();

		$data = $this->M_pegawai->select_all_by('karyawan');

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
						redirect('Pegawai');
					}
				} else {
					$this->session->set_flashdata('msg', show_msg('Data Pegawai Gagal diimport ke database (Data Sudah terupdate)', 'warning', 'fa-warning'));
					redirect('Pegawai');
				}

			}
		}
	}
}

/* End of file Pegawai.php */
/* Location: ./application/controllers/Pegawai.php */