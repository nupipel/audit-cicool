<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
*| --------------------------------------------------------------------------
*| Lokasi Kerja Controller
*| --------------------------------------------------------------------------
*| Lokasi Kerja site
*|
*/
class Lokasi_kerja extends Admin	
{
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model('model_lokasi_kerja');
		$this->load->model('group/model_group');
		$this->lang->load('web_lang', $this->current_lang);
	}

	/**
	* show all Lokasi Kerjas
	*
	* @var $offset String
	*/
	public function index($offset = 0)
	{
		$this->is_allowed('lokasi_kerja_list');

		$filter = $this->input->get('q');
		$field 	= $this->input->get('f');

		$this->data['lokasi_kerjas'] = $this->model_lokasi_kerja->get($filter, $field, $this->limit_page, $offset);
		$this->data['lokasi_kerja_counts'] = $this->model_lokasi_kerja->count_all($filter, $field);

		$config = [
			'base_url'     => 'administrator/lokasi_kerja/index/',
			'total_rows'   => $this->data['lokasi_kerja_counts'],
			'per_page'     => $this->limit_page,
			'uri_segment'  => 4,
		];

		$this->data['pagination'] = $this->pagination($config);

		$this->template->title('Lokasi Kerja List');
		$this->render('backend/standart/administrator/lokasi_kerja/lokasi_kerja_list', $this->data);
	}
	
	/**
	* Add new lokasi_kerjas
	*
	*/
	public function add()
	{
		$this->is_allowed('lokasi_kerja_add');

		$this->template->title('Lokasi Kerja New');
		$this->render('backend/standart/administrator/lokasi_kerja/lokasi_kerja_add', $this->data);
	}

	/**
	* Add New Lokasi Kerjas
	*
	* @return JSON
	*/
	public function add_save()
	{
		if (!$this->is_allowed('lokasi_kerja_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}
		
		

		$this->form_validation->set_rules('nama', 'Nama', 'trim|required|max_length[255]');
		

		$this->form_validation->set_rules('kode_lokasi', 'Kode Lokasi', 'trim|required|max_length[20]');
		

		$this->form_validation->set_rules('lokasi', 'Lokasi', 'trim|required|max_length[200]');
		

		

		if ($this->form_validation->run()) {
		
			$save_data = [
				'nama' => $this->input->post('nama'),
				'kode_lokasi' => $this->input->post('kode_lokasi'),
				'lokasi' => $this->input->post('lokasi'),
			];

			
			



			
			
			$save_lokasi_kerja = $id = $this->model_lokasi_kerja->store($save_data);
            

			if ($save_lokasi_kerja) {
				
				
					
				
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $save_lokasi_kerja;
					$this->data['message'] = cclang('success_save_data_stay', [
						anchor('administrator/lokasi_kerja/edit/' . $save_lokasi_kerja, 'Edit Lokasi Kerja'),
						anchor('administrator/lokasi_kerja', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_save_data_redirect', [
						anchor('administrator/lokasi_kerja/edit/' . $save_lokasi_kerja, 'Edit Lokasi Kerja')
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/lokasi_kerja');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/lokasi_kerja');
				}
			}

		} else {
			$this->data['success'] = false;
			$this->data['message'] = 'Opss validation failed';
			$this->data['errors'] = $this->form_validation->error_array();
		}

		$this->response($this->data);
	}
	
		/**
	* Update view Lokasi Kerjas
	*
	* @var $id String
	*/
	public function edit($id)
	{
		$this->is_allowed('lokasi_kerja_update');

		$this->data['lokasi_kerja'] = $this->model_lokasi_kerja->find($id);

		$this->template->title('Lokasi Kerja Update');
		$this->render('backend/standart/administrator/lokasi_kerja/lokasi_kerja_update', $this->data);
	}

	/**
	* Update Lokasi Kerjas
	*
	* @var $id String
	*/
	public function edit_save($id)
	{
		if (!$this->is_allowed('lokasi_kerja_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}
				$this->form_validation->set_rules('nama', 'Nama', 'trim|required|max_length[255]');
		

		$this->form_validation->set_rules('kode_lokasi', 'Kode Lokasi', 'trim|required|max_length[20]');
		

		$this->form_validation->set_rules('lokasi', 'Lokasi', 'trim|required|max_length[200]');
		

		
		if ($this->form_validation->run()) {
		
			$save_data = [
				'nama' => $this->input->post('nama'),
				'kode_lokasi' => $this->input->post('kode_lokasi'),
				'lokasi' => $this->input->post('lokasi'),
			];

			

			


			
			
			$save_lokasi_kerja = $this->model_lokasi_kerja->change($id, $save_data);

			if ($save_lokasi_kerja) {

				

				
				
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $id;
					$this->data['message'] = cclang('success_update_data_stay', [
						anchor('administrator/lokasi_kerja', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_update_data_redirect', [
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/lokasi_kerja');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/lokasi_kerja');
				}
			}
		} else {
			$this->data['success'] = false;
			$this->data['message'] = 'Opss validation failed';
			$this->data['errors'] = $this->form_validation->error_array();
		}

		$this->response($this->data);
	}
	
	/**
	* delete Lokasi Kerjas
	*
	* @var $id String
	*/
	public function delete($id = null)
	{
		$this->is_allowed('lokasi_kerja_delete');

		$this->load->helper('file');

		$arr_id = $this->input->get('id');
		$remove = false;

		if (!empty($id)) {
			$remove = $this->_remove($id);
		} elseif (count($arr_id) >0) {
			foreach ($arr_id as $id) {
				$remove = $this->_remove($id);
			}
		}

		if ($remove) {
            set_message(cclang('has_been_deleted', 'lokasi_kerja'), 'success');
        } else {
            set_message(cclang('error_delete', 'lokasi_kerja'), 'error');
        }

		redirect_back();
	}

		/**
	* View view Lokasi Kerjas
	*
	* @var $id String
	*/
	public function view($id)
	{
		$this->is_allowed('lokasi_kerja_view');

		$this->data['lokasi_kerja'] = $this->model_lokasi_kerja->join_avaiable()->filter_avaiable()->find($id);

		$this->template->title('Lokasi Kerja Detail');
		$this->render('backend/standart/administrator/lokasi_kerja/lokasi_kerja_view', $this->data);
	}
	
	/**
	* delete Lokasi Kerjas
	*
	* @var $id String
	*/
	private function _remove($id)
	{
		$lokasi_kerja = $this->model_lokasi_kerja->find($id);

		
		
		return $this->model_lokasi_kerja->remove($id);
	}
	
	
	/**
	* Export to excel
	*
	* @return Files Excel .xls
	*/
	public function export()
	{
		$this->is_allowed('lokasi_kerja_export');

		$this->model_lokasi_kerja->export(
			'lokasi_kerja', 
			'lokasi_kerja',
			$this->model_lokasi_kerja->field_search
		);
	}

	/**
	* Export to PDF
	*
	* @return Files PDF .pdf
	*/
	public function export_pdf()
	{
		$this->is_allowed('lokasi_kerja_export');

		$this->model_lokasi_kerja->pdf('lokasi_kerja', 'lokasi_kerja');
	}


	public function single_pdf($id = null)
	{
		$this->is_allowed('lokasi_kerja_export');

		$table = $title = 'lokasi_kerja';
		$this->load->library('HtmlPdf');
      
        $config = array(
            'orientation' => 'p',
            'format' => 'a4',
            'marges' => array(5, 5, 5, 5)
        );

        $this->pdf = new HtmlPdf($config);
        $this->pdf->setDefaultFont('stsongstdlight'); 

        $result = $this->db->get($table);
       
        $data = $this->model_lokasi_kerja->find($id);
        $fields = $result->list_fields();

        $content = $this->pdf->loadHtmlPdf('core_template/pdf/pdf_single', [
            'data' => $data,
            'fields' => $fields,
            'title' => $title
        ], TRUE);

        $this->pdf->initialize($config);
        $this->pdf->pdf->SetDisplayMode('fullpage');
        $this->pdf->writeHTML($content);
        $this->pdf->Output($table.'.pdf', 'H');
	}

	
}


/* End of file lokasi_kerja.php */
/* Location: ./application/controllers/administrator/Lokasi Kerja.php */