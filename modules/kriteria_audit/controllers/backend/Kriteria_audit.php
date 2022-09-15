<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
*| --------------------------------------------------------------------------
*| Kriteria Audit Controller
*| --------------------------------------------------------------------------
*| Kriteria Audit site
*|
*/
class Kriteria_audit extends Admin	
{
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model('model_kriteria_audit');
		$this->load->model('group/model_group');
		$this->lang->load('web_lang', $this->current_lang);
	}

	/**
	* show all Kriteria Audits
	*
	* @var $offset String
	*/
	public function index($offset = 0)
	{
		$this->is_allowed('kriteria_audit_list');

		$filter = $this->input->get('q');
		$field 	= $this->input->get('f');

		$this->data['kriteria_audits'] = $this->model_kriteria_audit->get($filter, $field, $this->limit_page, $offset);
		$this->data['kriteria_audit_counts'] = $this->model_kriteria_audit->count_all($filter, $field);

		$config = [
			'base_url'     => 'administrator/kriteria_audit/index/',
			'total_rows'   => $this->data['kriteria_audit_counts'],
			'per_page'     => $this->limit_page,
			'uri_segment'  => 4,
		];

		$this->data['pagination'] = $this->pagination($config);

		$this->template->title('Kriteria Audit List');
		$this->render('backend/standart/administrator/kriteria_audit/kriteria_audit_list', $this->data);
	}
	
	/**
	* Add new kriteria_audits
	*
	*/
	public function add()
	{
		$this->is_allowed('kriteria_audit_add');

		$this->template->title('Kriteria Audit New');
		$this->render('backend/standart/administrator/kriteria_audit/kriteria_audit_add', $this->data);
	}

	/**
	* Add New Kriteria Audits
	*
	* @return JSON
	*/
	public function add_save()
	{
		if (!$this->is_allowed('kriteria_audit_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}
		
		

		$this->form_validation->set_rules('no_kriteria', 'No Kriteria', 'trim|required');
		

		$this->form_validation->set_rules('kriteria', 'Kriteria', 'trim|required|max_length[255]');
		

		

		if ($this->form_validation->run()) {
		
			$save_data = [
				'no_kriteria' => $this->input->post('no_kriteria'),
				'kriteria' => $this->input->post('kriteria'),
			];

			
			



			
			
			$save_kriteria_audit = $id = $this->model_kriteria_audit->store($save_data);
            

			if ($save_kriteria_audit) {
				
				
					
				
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $save_kriteria_audit;
					$this->data['message'] = cclang('success_save_data_stay', [
						anchor('administrator/kriteria_audit/edit/' . $save_kriteria_audit, 'Edit Kriteria Audit'),
						anchor('administrator/kriteria_audit', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_save_data_redirect', [
						anchor('administrator/kriteria_audit/edit/' . $save_kriteria_audit, 'Edit Kriteria Audit')
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/kriteria_audit');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/kriteria_audit');
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
	* Update view Kriteria Audits
	*
	* @var $id String
	*/
	public function edit($id)
	{
		$this->is_allowed('kriteria_audit_update');

		$this->data['kriteria_audit'] = $this->model_kriteria_audit->find($id);

		$this->template->title('Kriteria Audit Update');
		$this->render('backend/standart/administrator/kriteria_audit/kriteria_audit_update', $this->data);
	}

	/**
	* Update Kriteria Audits
	*
	* @var $id String
	*/
	public function edit_save($id)
	{
		if (!$this->is_allowed('kriteria_audit_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}
				$this->form_validation->set_rules('no_kriteria', 'No Kriteria', 'trim|required');
		

		$this->form_validation->set_rules('kriteria', 'Kriteria', 'trim|required|max_length[255]');
		

		
		if ($this->form_validation->run()) {
		
			$save_data = [
				'no_kriteria' => $this->input->post('no_kriteria'),
				'kriteria' => $this->input->post('kriteria'),
			];

			

			


			
			
			$save_kriteria_audit = $this->model_kriteria_audit->change($id, $save_data);

			if ($save_kriteria_audit) {

				

				
				
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $id;
					$this->data['message'] = cclang('success_update_data_stay', [
						anchor('administrator/kriteria_audit', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_update_data_redirect', [
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/kriteria_audit');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/kriteria_audit');
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
	* delete Kriteria Audits
	*
	* @var $id String
	*/
	public function delete($id = null)
	{
		$this->is_allowed('kriteria_audit_delete');

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
            set_message(cclang('has_been_deleted', 'kriteria_audit'), 'success');
        } else {
            set_message(cclang('error_delete', 'kriteria_audit'), 'error');
        }

		redirect_back();
	}

		/**
	* View view Kriteria Audits
	*
	* @var $id String
	*/
	public function view($id)
	{
		$this->is_allowed('kriteria_audit_view');

		$this->data['kriteria_audit'] = $this->model_kriteria_audit->join_avaiable()->filter_avaiable()->find($id);

		$this->template->title('Kriteria Audit Detail');
		$this->render('backend/standart/administrator/kriteria_audit/kriteria_audit_view', $this->data);
	}
	
	/**
	* delete Kriteria Audits
	*
	* @var $id String
	*/
	private function _remove($id)
	{
		$kriteria_audit = $this->model_kriteria_audit->find($id);

		
		
		return $this->model_kriteria_audit->remove($id);
	}
	
	
	/**
	* Export to excel
	*
	* @return Files Excel .xls
	*/
	public function export()
	{
		$this->is_allowed('kriteria_audit_export');

		$this->model_kriteria_audit->export(
			'kriteria_audit', 
			'kriteria_audit',
			$this->model_kriteria_audit->field_search
		);
	}

	/**
	* Export to PDF
	*
	* @return Files PDF .pdf
	*/
	public function export_pdf()
	{
		$this->is_allowed('kriteria_audit_export');

		$this->model_kriteria_audit->pdf('kriteria_audit', 'kriteria_audit');
	}


	public function single_pdf($id = null)
	{
		$this->is_allowed('kriteria_audit_export');

		$table = $title = 'kriteria_audit';
		$this->load->library('HtmlPdf');
      
        $config = array(
            'orientation' => 'p',
            'format' => 'a4',
            'marges' => array(5, 5, 5, 5)
        );

        $this->pdf = new HtmlPdf($config);
        $this->pdf->setDefaultFont('stsongstdlight'); 

        $result = $this->db->get($table);
       
        $data = $this->model_kriteria_audit->find($id);
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


/* End of file kriteria_audit.php */
/* Location: ./application/controllers/administrator/Kriteria Audit.php */