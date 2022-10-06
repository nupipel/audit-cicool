<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
*| --------------------------------------------------------------------------
*| Dashboard Controller
*| --------------------------------------------------------------------------
*| For see your board
*|
*/
class Dashboard extends Admin	
{
	
	public function __construct()
	{
		parent::__construct();
			$this->load->model('web/model_home_front');
	}

	public function index()
	{
		if (!$this->aauth->is_allowed('dashboard')) {
			redirect('/', 'refresh');
		}
	//	$data = [];
		$this->data['dashboard_semua'] = $this->model_home_front->dashboard_semua();
		$this->data['dashboard_kriteria_1'] = $this->model_home_front->dashboard_kriteria(1);
		$this->data['dashboard_kriteria_2'] = $this->model_home_front->dashboard_kriteria(2);
		$this->data['dashboard_kriteria_3'] = $this->model_home_front->dashboard_kriteria(3);
		$this->data['dashboard_kriteria_4'] = $this->model_home_front->dashboard_kriteria(4);
		$this->data['dashboard_kriteria_5'] = $this->model_home_front->dashboard_kriteria(5);
		$this->data['dashboard_kriteria_6'] = $this->model_home_front->dashboard_kriteria(6);
		$this->data['dashboard_kriteria_7'] = $this->model_home_front->dashboard_kriteria(7);
		$this->data['dashboard_kriteria_8'] = $this->model_home_front->dashboard_kriteria(8);
		$this->data['dashboard_kriteria_9'] = $this->model_home_front->dashboard_kriteria(9);
		$this->data['dashboard_kriteria_10'] = $this->model_home_front->dashboard_kriteria(10);
		$this->data['dashboard_kriteria_11'] = $this->model_home_front->dashboard_kriteria(11);
		$this->data['dashboard_kriteria_12'] = $this->model_home_front->dashboard_kriteria(12);
			$this->render('backend/standart/dashboard', $this->data);
	//	$this->render('backend/standart/dashboard', $data);
	}

	public function chart()
	{
		if (!$this->aauth->is_allowed('dashboard')) {
			redirect('/','refresh');
		}

		$data = [];
				$this->render('backend/standart/chart', $data);
	
	}
}

/* End of file Dashboard.php */
/* Location: ./application/controllers/administrator/Dashboard.php */