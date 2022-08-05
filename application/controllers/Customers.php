<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Customers extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->helper(['url']);
		$this->load->model(['customer']); // todo en minuscula funciona
	}
	public function index()
	{
		$title = 'Customer List';
		$customers = $this->customer->all(); // traer todo

		$this->load->view('includes/header', ['title' => $title]);
		$this->load->view('customers/index', ['title' => $title, 'customers' => $customers]);
		$this->load->view('includes/footer');
	}

	public function create()
	{
		$title = 'Create Customer';

		$this->load->view('includes/header', ['title' => $title]);
		$this->load->view('customers/create');
		$this->load->view('includes/footer');
	}

	public function store()
	{
		$data = [
			'first_name' => $this->input->post('first_name'),
			'last_name' => $this->input->post('last_name'),
			'email' => $this->input->post('email'),
			'document' => $this->input->post('document'),
			'phone' => $this->input->post('phone'),
		];
		$this->customer->store($data); // guardar registro
		redirect(base_url('customers')); // menos errores con base_url()
	}

	public function edit($id)
	{
		$title = 'Edit Customer';
		$customer = $this->customer->find($id);

		$this->load->view('includes/header', ['title' => $title]);
		$this->load->view('customers/edit', ['customer' => $customer]);
		$this->load->view('includes/footer');
	}

	public function update($id)
	{
		$data = [
			'first_name' => $this->input->post('first_name'),
			'last_name' => $this->input->post('last_name'),
			'email' => $this->input->post('email'),
			'document' => $this->input->post('document'),
			'phone' => $this->input->post('phone'),
		];
		$this->customer->update($data, $id);
		redirect(base_url('customers')); // menos errores con base_url()
	}

	public function delete($id)
	{
		$this->customer->delete($id);
		redirect(base_url('customers')); // menos errores con base_url()
	}
}
