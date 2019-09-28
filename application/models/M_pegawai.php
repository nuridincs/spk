<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pegawai extends CI_Model {
	public function select_all_karyawan() {
		$sql = "SELECT * FROM karyawan";

		$data = $this->db->query($sql);

		return $data->result();
	}

	public function select_all() {
		$sql = "SELECT karyawan.*, posisi.nama AS departemen 
				FROM karyawan, posisi 
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
		$sql = "UPDATE karyawan SET nik='" .$data['nik'] ."', nama='" .$data['nama'] ."', id_posisi='" .$data['posisi'] ."', jabatan='" .$data['jabatan'] ."', level='" .$data['level'] ."', doj='" .$data['doj'] ."' WHERE id='" .$data['id'] ."'";

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
		$sql = "INSERT INTO karyawan(nama,nik,id_posisi,jabatan,level,doj) VALUES('" .$data['nama'] ."','" .$data['nik'] ."','" .$data['posisi'] ."','" .$data['jabatan'] ."','" .$data['level'] ."','" .$data['doj'] ."')";

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
		$sql = "INSERT INTO nilai_karyawan (id_karyawan,C1,C2,C3,C4,C5,C6,C7,C8) VALUES(" .$data['id_karyawan'] ."," .$data['c1'] ."," .$data['c2'] ."," .$data['c3'] ."," .$data['c4'] ."," .$data['c5'] ."," .$data['c6'] ."," .$data['c7'] ."," .$data['c8'] .")";
		echo $sql;die;

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function updateNilai($data) {
		$sql = "UPDATE nilai SET id_karyawan='" .$data['id_karyawan'] ."', c1='" .$data['c1'] ."', c2=" .$data['c2'] .", c3=" .$data['c3'] .", c4=" .$data['c4'] .", c5=" .$data['c5'] .", c6=" .$data['c6'] .", c7=" .$data['c7'] .", c8=" .$data['c8'] ." WHERE id='" .$data['id'] ."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function select_nilai_pegawai($id="") {
		$condition = (!empty($id)) ? "WHERE n.id = " . $id : "";
		$sql = "SELECT n.id, k.id as id_karyawan, k.nama, c1.pilihan_kriteria as c1, c2.pilihan_kriteria as c2, c3.pilihan_kriteria as c3, c4.pilihan_kriteria as c4, c5.pilihan_kriteria as c5, c6.pilihan_kriteria as c6, c7.pilihan_kriteria as c7, c8.pilihan_kriteria as c8, 
						c1.bobot as bobot_c1, c2.bobot as bobot_c2, c3.bobot as bobot_c3, c4.bobot as bobot_c4, c5.bobot as bobot_c5, c6.bobot as bobot_c6, c7.bobot as bobot_c7, c8.bobot as bobot_c8
						FROM nilai n
						LEFT JOIN karyawan k ON n.id_karyawan = k.id
						LEFT JOIN kriteria_masa_kerja c1 ON n.c1 = c1.id
						LEFT JOIN kriteria_disiplin c2 ON n.c2 = c2.id
						LEFT JOIN kriteria_prestasi_kerja c3 ON n.c3 = c3.id
						LEFT JOIN kriteria_kerja_sama c4 ON n.c4 = c4.id
						LEFT JOIN kriteria_kecakapan c5 ON n.c5 = c5.id
						LEFT JOIN kriteria_loyalitas c6 ON n.c6 = c6.id
						LEFT JOIN kriteria_kepemimpinan c7 ON n.c7 = c7.id
						LEFT JOIN kriteria_pendidikan c8 ON n.c8 = c8.id
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
		$sql = "SELECT nilai_karyawan.* , karyawan.nik, karyawan.nama
					FROM nilai_karyawan
					INNER JOIN nilai ON nilai.id = nilai_karyawan.id_nilai
					INNER JOIN karyawan ON karyawan.id = nilai.id_karyawan;";
		$data = $this->db->query($sql);

		return $data->result();
	}

	public function selectNilaiRangeKaryawan() {
		$sql = "SELECT n.id, k.id as id_karyawan, k.nik, k.nama, c1.pilihan_kriteria as c1, c2.pilihan_kriteria as c2, c3.pilihan_kriteria as c3, c4.pilihan_kriteria as c4, c5.pilihan_kriteria as c5, c6.pilihan_kriteria as c6, c7.pilihan_kriteria as c7, c8.pilihan_kriteria as c8, 
						c1.bobot as bobot_c1, c2.bobot as bobot_c2, c3.bobot as bobot_c3, c4.bobot as bobot_c4, c5.bobot as bobot_c5, c6.bobot as bobot_c6, c7.bobot as bobot_c7, c8.bobot as bobot_c8, nilai_karyawan.*
						FROM nilai n
						LEFT JOIN nilai_karyawan ON n.id = nilai_karyawan.id_nilai
						LEFT JOIN karyawan k ON n.id_karyawan = k.id
						LEFT JOIN kriteria_masa_kerja c1 ON n.c1 = c1.id
						LEFT JOIN kriteria_disiplin c2 ON n.c2 = c2.id
						LEFT JOIN kriteria_prestasi_kerja c3 ON n.c3 = c3.id
						LEFT JOIN kriteria_kerja_sama c4 ON n.c4 = c4.id
						LEFT JOIN kriteria_kecakapan c5 ON n.c5 = c5.id
						LEFT JOIN kriteria_loyalitas c6 ON n.c6 = c6.id
						LEFT JOIN kriteria_kepemimpinan c7 ON n.c7 = c7.id
						LEFT JOIN kriteria_pendidikan c8 ON n.c8 = c8.id";

		$data = $this->db->query($sql);

		return $data->result();
	}
}

/* End of file M_karyawan.php */
/* Location: ./application/models/M_karyawan.php */