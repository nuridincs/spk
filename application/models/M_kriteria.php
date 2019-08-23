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

	}