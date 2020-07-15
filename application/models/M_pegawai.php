<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pegawai extends CI_Model {
	public function select_all_karyawan() {
		$sql = "SELECT * FROM karyawan";

		$data = $this->db->query($sql);

		return $data->result();
	}

	public function select_all() {
		$sql = "SELECT karyawan.*, posisi.nama AS departemen, DATE_FORMAT(karyawan.doj,'%d %b %Y') as k_doj, jabatan.*, karyawan.id as id_karyawan
				FROM karyawan
				INNER JOIN posisi ON posisi.id = karyawan.id_posisi
				INNER JOIN jabatan ON jabatan.id = karyawan.jabatan
				WHERE karyawan.id_posisi = posisi.id";

		$data = $this->db->query($sql);

		return $data->result();
	}

	public function select_by_id($id) {
		$sql = "SELECT * FROM karyawan where id = '{$id}'";

		$data = $this->db->query($sql);

		return $data->row();
	}

	public function select_by_posisi($id) {
		$sql = "SELECT COUNT(*) AS jml FROM karyawan WHERE id_posisi = {$id}";

		$data = $this->db->query($sql);

		return $data->row();
	}

	public function select_by_kota($id) {
		$sql = "SELECT COUNT(*) AS jml FROM karyawan WHERE id_kota = {$id}";

		$data = $this->db->query($sql);

		return $data->row();
	}

	public function update($data) {
		$sql = "UPDATE karyawan SET nik='" .$data['nik'] ."', nama='" .$data['nama'] ."', id_posisi='" .$data['posisi'] ."', jabatan='" .$data['jabatan'] ."', level='" .$data['level'] ."' WHERE id='" .$data['id'] ."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function delete($type, $id) {
		if ($type == 'karyawan') {
			$sql = "DELETE FROM karyawan WHERE id='" .$id ."'";
		} else if ($type == 'nilaikaryawan') {
			$sql = "DELETE FROM nilai WHERE id='" .$id ."'";
		}

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function insert($data) {
		// $insertSquenec = $this->execute('insert', 'squence');
		// $squence = $this->getData('squence');
		// $code_toko = 11;
		// $month = date('m');
		// $date = date('d');
		// $id = $code_toko.$month.$date.$squence[0]->id;
		$sql = "INSERT INTO karyawan(nama,nik,id_posisi,jabatan,level) VALUES('" .$data['nama'] ."','" .$data['nik'] ."','" .$data['posisi'] ."','" .$data['jabatan'] ."','" .$data['level'] ."')";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function getData($type) {
		if ($type == 'squence') {
			$sql = "SELECT MAX(id) AS id FROM squence";
		}

		$data = $this->db->query($sql);
		return $data->result();
	}

	public function execute($action, $type) {
		if ($action == 'insert') {
			if ($type == 'squence') {
				$sql = "INSERT INTO squence(keterangan, date) VALUES('registration','".date('Y-m-d')."')";
			}

			$this->db->query($sql);
			return $this->db->affected_rows();
		}
	}

	public function insert_batch($data) {
		$this->db->insert_batch('karyawan', $data);
		
		return $this->db->affected_rows();
	}

	public function check_nama($nama) {
		$this->db->where('nama', $nama);
		$data = $this->db->get('karyawan');

		return $data->num_rows();
	}

	public function total_rows() {
		$data = $this->db->get('karyawan');

		return $data->num_rows();
	}

	public function select_all_by($table) {
		$sql = "SELECT * FROM $table";

		$data = $this->db->query($sql);

		return $data->result();
	}

	public function insertNilai($data) {
		$nilaiPost = array(
			'id_karyawan' => $data['id_karyawan'],
			'C1' => $data['c1'],
			'C2' => $data['c2'],
			'C3' => $data['c3'],
			'C4' => $data['c4'],
			'C5' => $data['c5'],
		);

		$this->db->insert('nilai', $nilaiPost);
		$insert_id = $this->db->insert_id();

		if ($insert_id) {
			$this->insertNilaiKaryawan($insert_id, $data);
		}
	}

	public function insertNilaiKaryawan($last_id, $data) {
		$nilaiPost = array(
			'id_nilai' => $last_id,
			'NC1' => $data['nc1'],
			'NC2' => $data['nc2'],
			'NC3' => $data['nc3'],
			'NC4' => $data['nc4'],
			'NC5' => $data['nc5'],
		);

		$this->db->insert('nilai_karyawan', $nilaiPost);
   		$insert_id = $this->db->insert_id();
	}

	public function updateNilai($data) {
		// $sql = "UPDATE nilai SET id_karyawan='" .$data['id_karyawan'] ."', c1='" .$data['c1'] ."', c2=" .$data['c2'] .", c3=" .$data['c3'] .", c4=" .$data['c4'] .", c5=" .$data['c5'] .", c6=" .$data['c6'] .", c7=" .$data['c7'] .", c8=" .$data['c8'] ." WHERE id='" .$data['id'] ."'";

		// $this->db->query($sql);

		// return $this->db->affected_rows();
		// print_r($data);die;
		$nilaiPost = array(
			'id_karyawan' => $data['id_karyawan'],
			'C1' => $data['c1'],
			'C2' => $data['c2'],
			'C3' => $data['c3'],
			'C4' => $data['c4'],
			'C5' => $data['c5'],
			'C6' => $data['c6'],
			'C7' => $data['c7'],
			'C8' => $data['c8'],
		);
		$this->db->where('id', $data['id_nilai']);
		$this->db->update('nilai', $nilaiPost);

		$this->updateNilaiKaryawan($data);
	}

	public function updateNilaiKaryawan($data) {
		$nilaiPost = array(
			// 'id_nilai' => $last_id,
			'NC1' => $data['nc1'],
			'NC2' => $data['nc2'],
			'NC3' => $data['nc3'],
			'NC4' => $data['nc4'],
			'NC5' => $data['nc5'],
			'NC6' => $data['nc6'],
			'NC7' => $data['nc7'],
			'NC8' => $data['nc8'],
		);

		$this->db->where('id', $data['id_nilai_karyawan']);
		$this->db->update('nilai_karyawan', $nilaiPost);
	}

	public function select_nilai_pegawai($id="") {
		$condition = (!empty($id)) ? "WHERE n.id = " . $id : "";
		$sql = "SELECT n.id, k.id as id_karyawan, k.nama, c1.pilihan_kriteria as c1, c2.pilihan_kriteria as c2, c3.pilihan_kriteria as c3, c4.pilihan_kriteria as c4, c5.pilihan_kriteria as c5,
						c1.bobot as bobot_c1, c2.bobot as bobot_c2, c3.bobot as bobot_c3, c4.bobot as bobot_c4, c5.bobot as bobot_c5
						FROM nilai n
						LEFT JOIN karyawan k ON n.id_karyawan = k.id
						LEFT JOIN kriteria_masa_kerja c1 ON n.c1 = c1.id
						LEFT JOIN kriteria_absensi c2 ON n.c2 = c2.id
						LEFT JOIN kriteria_target_penjualan c3 ON n.c3 = c3.id
						LEFT JOIN kriteria_status_kepegawaian c4 ON n.c4 = c4.id
						LEFT JOIN kriteria_pendidikan c5 ON n.c5 = c5.id
		" . $condition;

		$data = $this->db->query($sql);

		return $data->result();
	}

	public function select_nilai_karyawanold() {
		$sql = "SELECT nilai_karyawan.* , karyawan.nik, karyawan.nama
				FROM nilai_karyawan
				INNER JOIN karyawan ON karyawan.id = nilai_karyawan.id_karyawan";

		$data = $this->db->query($sql);

		return $data->result();
	}

	public function select_nilai_karyawan() {
		$sql = "SELECT nilai_karyawan.* , karyawan.nik, karyawan.nama, karyawan.id as id_karyawan
					FROM nilai_karyawan
					INNER JOIN nilai ON nilai.id = nilai_karyawan.id_nilai
					INNER JOIN karyawan ON karyawan.id = nilai.id_karyawan
					ORDER BY nilai_karyawan.id ASC";
		$data = $this->db->query($sql);

		return $data->result();
	}

	public function selectNilaiRangeKaryawan($id="") {
		$condition = (!empty($id)) ? "WHERE k.id = " . $id : "";

		$sql = "SELECT n.id, k.id as id_karyawan, k.nik, k.nama, c1.pilihan_kriteria as c1, c2.pilihan_kriteria as c2, c3.pilihan_kriteria as c3, c4.pilihan_kriteria as c4, c5.pilihan_kriteria as c5,
						c1.bobot as bobot_c1, c2.bobot as bobot_c2, c3.bobot as bobot_c3, c4.bobot as bobot_c4, c5.bobot as bobot_c5, nilai_karyawan.*, c1.id as bobot_id_c1, c2.id as bobot_id_c2, c3.id as bobot_id_c3, c4.id as bobot_id_c4, c5.id as bobot_id_c5, n.id as nilai_id, nilai_karyawan.id as nilai_karyawan_id
			FROM nilai n
			LEFT JOIN nilai_karyawan ON n.id = nilai_karyawan.id_nilai
			LEFT JOIN karyawan k ON n.id_karyawan = k.id
			LEFT JOIN kriteria_masa_kerja c1 ON n.c1 = c1.id
			LEFT JOIN kriteria_absensi c2 ON n.c2 = c2.id
			LEFT JOIN kriteria_target_penjualan c3 ON n.c3 = c3.id
			LEFT JOIN kriteria_status_kepegawaian c4 ON n.c4 = c4.id
			LEFT JOIN kriteria_pendidikan c5 ON n.c5 = c5.id
						" . $condition;

		$data = $this->db->query($sql);

		return $data->result();
	}

	public function fetchData($table) {
		$result = $this->db->get($table);

		return $result->result();
	}
}

/* End of file M_karyawan.php */
/* Location: ./application/models/M_karyawan.php */