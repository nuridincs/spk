<?php

	/**
	 * 
	 */
	class M_kriteria extends CI_Model
	{
		
		public function select_all($table)
		{
			$this->db->select('*');
			$this->db->from($table);

			$data = $this->db->get();

			return $data->result();
		}

		public function select_by_id($table,$id) {
			$sql = "SELECT * FROM $table WHERE id = '{$id}'";

			$data = $this->db->query($sql);

			return $data->row();
		}

		public function update($data) {
			$dataExplode = explode("~", $data['id']);
			$table = $dataExplode['0'];
			$id = $dataExplode['1'];

			$sql = "UPDATE $table SET pilihan_kriteria='" .$data['kriteria'] ."', bobot='" .$data['bobot'] ."' WHERE id='" .$id ."'";
	
			$this->db->query($sql);
	
			return $this->db->affected_rows();
		}

		public function execute($action, $type, $table, $data) {
			if ($action == 'insert') {
				if ($type == 'kriteria') {
					$table = $data['tablename'];
					$sql = "INSERT INTO $table(pilihan_kriteria, bobot) VALUES('".$data['kriteria']."','".$data['bobot']."')";
				}
			} else if ($action == 'delete') {
				if ($type == 'kriteria') {
					$table = $data['table'];
					$sql = "DELETE FROM $table WHERE id='" .$data['id'] ."'";
				}
			}

			$this->db->query($sql);
			return $this->db->affected_rows();
		}

	}