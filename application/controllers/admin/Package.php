<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Package extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->load->model('admin/Package_model', 'Package_model');
		if ($this->session->userdata("logged_in") !== "admin") {
			redirect("/");
		}
	}

	public function index()
	{
		$data["page_title"] = "Kelola Paket Grooming";

		$this->load->view("admin/packages/index_view", $data);
	}

	public function ajaxList()
	{
		$list = $this->Package_model->getDatatables();
		$data = array();
		$no = $_POST['start'];
		$i = 1;
		foreach ($list as $package) {
			$no++;
			$row = array();
			$row[] = $i++;
			$row[] = $package->name;
			$row[] = $package->slug;
			$row[] = $package->description;
			$row[] = "IDR. " . number_format($package->cost_for_cat);
			$row[] = "IDR. " . number_format($package->cost_for_dog);

			$row[] = '<a class="btn btn-icon btn-warning" href="javascript:void(0)" title="Edit" onclick="editPackage(' . "'" . $package->package_id . 			"'" . ')"><i class="fas fa-edit"></i></a>
				  <a class="btn btn-icon btn-danger" href="javascript:void(0)" title="Hapus" onclick="deletePackage(' . "'" . $package->package_id . "'" . ')"><i class="fas fa-trash"></i></a>';

			$data[] = $row;
		}
		$output = array(
			"draw" => $_POST["draw"],
			"recordsTotal" => $this->Package_model->countAll(),
			"recordsFiltered" => $this->Package_model->countFiltered(),
			"data" => $data,
		);

		echo json_encode($output);
	}

	public function ajaxEdit($id)
	{
		$data = $this->Package_model->getById($id);
		echo json_encode($data);
	}

	public function ajaxAdd()
	{
		$this->_validate();
		$name = htmlspecialchars($this->input->post("name", true));
		//Buat slug
		$string = preg_replace('/[^a-zA-Z0-9 \&%|{.}=,?!*()"-_+$@;<>\']/', '', $name); //filter karakter unik dan replace dengan kosong ('')
		$trim = trim($string); // hilangkan spasi berlebihan dengan fungsi trim
		$pre_slug = strtolower(str_replace(" ", "-", $trim)); // hilangkan spasi, kemudian ganti spasi dengan tanda strip (-)
		$slug = $pre_slug; // tambahkan ektensi .html pada slug
		$description = $this->input->post("description");
		$costForCat = $this->input->post("cost_for_cat");
		$costForDog = $this->input->post("cost_for_dog");

		$data = array(
			"name" => $name,
			"slug" => $slug,
			"description" => $description,
			"cost_for_cat" => $costForCat,
			"cost_for_dog" => $costForDog
		);

		$this->Package_model->save($data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajaxUpdate()
	{
		$this->_validate();
		$name = htmlspecialchars($this->input->post("name", true));
		//Buat slug
		$string = preg_replace('/[^a-zA-Z0-9 \&%|{.}=,?!*()"-_+$@;<>\']/', '', $name); //filter karakter unik dan replace dengan kosong ('')
		$trim = trim($string); // hilangkan spasi berlebihan dengan fungsi trim
		$pre_slug = strtolower(str_replace(" ", "-", $trim)); // hilangkan spasi, kemudian ganti spasi dengan tanda strip (-)
		$slug = $pre_slug; // tambahkan ektensi .html pada slug
		$description = $this->input->post("description");
		$costForCat = $this->input->post("cost_for_cat");
		$costForDog = $this->input->post("cost_for_dog");

		$data = array(
			"name" => $name,
			"slug" => $slug,
			"description" => $description,
			"cost_for_cat" => $costForCat,
			"cost_for_dog" => $costForDog
		);
		$this->Package_model->update(array("package_id" => $this->input->post("package_id")), $data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajaxDelete($id)
	{
		$this->Package_model->deleteById($id);
		echo json_encode("status", TRUE);
	}

	private function _validate()
	{
		$data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = TRUE;

		if ($this->input->post('name') == '') {
			$data['inputerror'][] = 'name';
			$data['error_string'][] = 'Nama paket harus diisi';
			$data['status'] = FALSE;
		}

		if ($this->input->post('cost_for_cat') == '') {
			$data['inputerror'][] = 'cost_for_cat';
			$data['error_string'][] = 'Biaya Grooming harus diisi';
			$data['status'] = FALSE;
		}

		if ($this->input->post('cost_for_dog') == '') {
			$data['inputerror'][] = 'cost_for_dog';
			$data['error_string'][] = 'Biaya Grooming harus diisi';
			$data['status'] = FALSE;
		}

		if ($data['status'] === FALSE) {
			echo json_encode($data);
			exit();
		}
	}
}
