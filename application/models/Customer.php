<?php

class Customer extends CI_Model
{
	private $table = 'customers';
	private $id = 'id';

	public function all()
	{
		// $query = $this->db->select('*')->from($this->table)->get(); // forma descriptiva
		$query = $this->db->get($this->table); // froma abreviada
		return $query->result();
	}

	public function store($data)
	{
		$this->db->insert($this->table, $data);
		return $this->db->insert_id();
	}

	public function find($id)
	{
		$customer = $this->db->get_where($this->table, array('id' => $id))->row();
		return $customer;
	}

	public function update($data, $id)
	{
		$this->db->where($this->id, $id);
		$this->db->update($this->table, $data);
	}

	public function delete($id)
	{
		$this->db->where($this->id, $id);
		$this->db->delete($this->table);
	}
}
