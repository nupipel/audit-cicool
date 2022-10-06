<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
*| --------------------------------------------------------------------------
*| Departemen Controller
*| --------------------------------------------------------------------------
*| Departemen site
*|
*/
class Departemen extends Admin	
{
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model('model_departemen');
		$this->load->model('group/model_group');
		$this->lang->load('web_lang', $this->current_lang);
	}

	/**
	* show all Departemens
	*
	* @var $offset String
	*/
	public function index($offset = 0)
	{
		$this->is_allowed('departemen_list');

		$filter = $this->input->get('q');
		$field 	= $this->input->get('f');

		$this->data['departemens'] = $this->model_departemen->get($filter, $field, $this->limit_page, $offset);
		$this->data['departemen_counts'] = $this->model_departemen->count_all($filter, $field);

		$config = [
			'base_url'     => 'administrator/departemen/index/',
			'total_rows'   => $this->data['departemen_counts'],
			'per_page'     => $this->limit_page,
			'uri_segment'  => 4,
		];

		$this->data['pagination'] = $this->pagination($config);

		$this->template->title('Departemen List');
		$this->render('backend/standart/administrator/departemen/departemen_list', $this->data);
	}
	
	/**
	* Add new departemens
	*
	*/
	public function add()
	{
		$this->is_allowed('departemen_add');

		$this->template->title('Departemen New');
		$this->render('backend/standart/administrator/departemen/departemen_add', $this->data);
	}

	/**
	* Add New Departemens
	*
	* @return JSON
	*/
	public function add_save()
	{
		if (!$this->is_allowed('departemen_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}
		
		

		$this->form_validation->set_rules('section', 'Section', 'trim|required|max_length[255]');
		

		

		if ($this->form_validation->run()) {
		
			$save_data = [
				'section' => $this->input->post('section'),
			];

			
			



			
			
			$save_departemen = $id = $this->model_departemen->store($save_data);
            

			if ($save_departemen) {
				
				
					
				
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $save_departemen;
					$this->data['message'] = cclang('success_save_data_stay', [
						anchor('administrator/departemen/edit/' . $save_departemen, 'Edit Departemen'),
						anchor('administrator/departemen', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_save_data_redirect', [
						anchor('administrator/departemen/edit/' . $save_departemen, 'Edit Departemen')
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/departemen');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/departemen');
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
	* Update view Departemens
	*
	* @var $id String
	*/
	public function edit($id)
	{
		$this->is_allowed('departemen_update');

		$this->data['departemen'] = $this->model_departemen->find($id);

		$this->template->title('Departemen Update');
		$this->render('backend/standart/administrator/departemen/departemen_update', $this->data);
	}

	/**
	* Update Departemens
	*
	* @var $id String
	*/
	public function edit_save($id)
	{
		if (!$this->is_allowed('departemen_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}
				$this->form_validation->set_rules('section', 'Section', 'trim|required|max_length[255]');
		

		
		if ($this->form_validation->run()) {
		
			$save_data = [
				'section' => $this->input->post('section'),
			];

			

			


			
			
			$save_departemen = $this->model_departemen->change($id, $save_data);

			if ($save_departemen) {

				

				
				
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $id;
					$this->data['message'] = cclang('success_update_data_stay', [
						anchor('administrator/departemen', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_update_data_redirect', [
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/departemen');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/departemen');
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
	* delete Departemens
	*
	* @var $id String
	*/
	public function delete($id = null)
	{
		$this->is_allowed('departemen_delete');

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
            set_message(cclang('has_been_deleted', 'departemen'), 'success');
        } else {
            set_message(cclang('error_delete', 'departemen'), 'error');
        }

		redirect_back();
	}

		/**
	* View view Departemens
	*
	* @var $id String
	*/
	public function view($id)
	{
		$this->is_allowed('departemen_view');

		$this->data['departemen'] = $this->model_departemen->join_avaiable()->filter_avaiable()->find($id);

		$this->template->title('Departemen Detail');
		$this->render('backend/standart/administrator/departemen/departemen_view', $this->data);
	}
	
	/**
	* delete Departemens
	*
	* @var $id String
	*/
	private function _remove($id)
	{
		$departemen = $this->model_departemen->find($id);

		
		
		return $this->model_departemen->remove($id);
	}
	
	
	/**
	* Export to excel
	*
	* @return Files Excel .xls
	*/
	public function export()
	{
		$this->is_allowed('departemen_export');

		$this->model_departemen->export(
			'departemen', 
			'departemen',
			$this->model_departemen->field_search
		);
	}

	/**
	* Export to PDF
	*
	* @return Files PDF .pdf
	*/
	public function export_pdf()
	{
		$this->is_allowed('departemen_export');

		$this->model_departemen->pdf('departemen', 'departemen');
	}


	public function single_pdf($id = null)
	{
		$this->is_allowed('departemen_export');

		$table = $title = 'departemen';
		$this->load->library('HtmlPdf');
      
        $config = array(
            'orientation' => 'p',
            'format' => 'a4',
            'marges' => array(5, 5, 5, 5)
        );

        $this->pdf = new HtmlPdf($config);
        $this->pdf->setDefaultFont('stsongstdlight'); 

        $result = $this->db->get($table);
       
        $data = $this->model_departemen->find($id);
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


/* End of file departemen.php */
/* Location: ./application/controllers/administrator/Departemen.php */