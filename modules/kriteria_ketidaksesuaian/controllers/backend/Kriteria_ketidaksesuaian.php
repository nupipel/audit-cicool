<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
*| --------------------------------------------------------------------------
*| Kriteria Ketidaksesuaian Controller
*| --------------------------------------------------------------------------
*| Kriteria Ketidaksesuaian site
*|
*/
class Kriteria_ketidaksesuaian extends Admin	
{
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model('model_kriteria_ketidaksesuaian');
		$this->load->model('group/model_group');
		$this->lang->load('web_lang', $this->current_lang);
	}

	/**
	* show all Kriteria Ketidaksesuaians
	*
	* @var $offset String
	*/
	public function index($offset = 0)
	{
		$this->is_allowed('kriteria_ketidaksesuaian_list');

		$filter = $this->input->get('q');
		$field 	= $this->input->get('f');

		$this->data['kriteria_ketidaksesuaians'] = $this->model_kriteria_ketidaksesuaian->get($filter, $field, $this->limit_page, $offset);
		$this->data['kriteria_ketidaksesuaian_counts'] = $this->model_kriteria_ketidaksesuaian->count_all($filter, $field);

		$config = [
			'base_url'     => 'administrator/kriteria_ketidaksesuaian/index/',
			'total_rows'   => $this->data['kriteria_ketidaksesuaian_counts'],
			'per_page'     => $this->limit_page,
			'uri_segment'  => 4,
		];

		$this->data['pagination'] = $this->pagination($config);

		$this->template->title('Kriteria Ketidaksesuaian List');
		$this->render('backend/standart/administrator/kriteria_ketidaksesuaian/kriteria_ketidaksesuaian_list', $this->data);
	}
	
	/**
	* Add new kriteria_ketidaksesuaians
	*
	*/
	public function add()
	{
		$this->is_allowed('kriteria_ketidaksesuaian_add');

		$this->template->title('Kriteria Ketidaksesuaian New');
		$this->render('backend/standart/administrator/kriteria_ketidaksesuaian/kriteria_ketidaksesuaian_add', $this->data);
	}

	/**
	* Add New Kriteria Ketidaksesuaians
	*
	* @return JSON
	*/
	public function add_save()
	{
		if (!$this->is_allowed('kriteria_ketidaksesuaian_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}
		
		

		$this->form_validation->set_rules('id_task', 'Id Task', 'trim|required|max_length[11]');
		

		$this->form_validation->set_rules('id_kriteria', 'Id Kriteria', 'trim|required|max_length[20]');
		

		

		if ($this->form_validation->run()) {
		
			$save_data = [
				'id_task' => $this->input->post('id_task'),
				'id_kriteria' => $this->input->post('id_kriteria'),
				'bukti_objektif' => $this->input->post('bukti_objektif'),
				'target_waktu_selesai' => $this->input->post('target_waktu_selesai'),
				'penyebab' => $this->input->post('penyebab'),
				'tindakan' => $this->input->post('tindakan'),
				'status' => $this->input->post('status'),
				'penanggung_jawab' => $this->input->post('penanggung_jawab'),
				'keterangan' => $this->input->post('keterangan'),
				'auditor' => get_user_data('username'),
				'id_user' => $this->input->post('id_user'),
			];

			
			
//$save_data['_example'] = $this->input->post('_example');
			



			
			
			$save_kriteria_ketidaksesuaian = $id = $this->model_kriteria_ketidaksesuaian->store($save_data);
            

			if ($save_kriteria_ketidaksesuaian) {
				
				$id = $save_kriteria_ketidaksesuaian;
				
				
					
				
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $save_kriteria_ketidaksesuaian;
					$this->data['message'] = cclang('success_save_data_stay', [
						anchor('administrator/kriteria_ketidaksesuaian/edit/' . $save_kriteria_ketidaksesuaian, 'Edit Kriteria Ketidaksesuaian'),
						anchor('administrator/kriteria_ketidaksesuaian', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_save_data_redirect', [
						anchor('administrator/kriteria_ketidaksesuaian/edit/' . $save_kriteria_ketidaksesuaian, 'Edit Kriteria Ketidaksesuaian')
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/kriteria_ketidaksesuaian');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/kriteria_ketidaksesuaian');
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
	* Update view Kriteria Ketidaksesuaians
	*
	* @var $id String
	*/
	public function edit($id)
	{
		$this->is_allowed('kriteria_ketidaksesuaian_update');

		$this->data['kriteria_ketidaksesuaian'] = $this->model_kriteria_ketidaksesuaian->find($id);

		$this->template->title('Kriteria Ketidaksesuaian Update');
		$this->render('backend/standart/administrator/kriteria_ketidaksesuaian/kriteria_ketidaksesuaian_update', $this->data);
	}

	/**
	* Update Kriteria Ketidaksesuaians
	*
	* @var $id String
	*/
	public function edit_save($id)
	{
		if (!$this->is_allowed('kriteria_ketidaksesuaian_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}
				$this->form_validation->set_rules('id_task', 'Id Task', 'trim|required|max_length[11]');
		

		$this->form_validation->set_rules('id_kriteria', 'Id Kriteria', 'trim|required|max_length[20]');
		

		
		if ($this->form_validation->run()) {
		
			$save_data = [
				'id_task' => $this->input->post('id_task'),
				'id_kriteria' => $this->input->post('id_kriteria'),
				'bukti_objektif' => $this->input->post('bukti_objektif'),
				'target_waktu_selesai' => $this->input->post('target_waktu_selesai'),
				'penyebab' => $this->input->post('penyebab'),
				'tindakan' => $this->input->post('tindakan'),
				'status' => $this->input->post('status'),
				'penanggung_jawab' => $this->input->post('penanggung_jawab'),
				'keterangan' => $this->input->post('keterangan'),
				'auditor' => get_user_data('username'),
				'id_user' => $this->input->post('id_user'),
			];

			

			
//$save_data['_example'] = $this->input->post('_example');
			


			
			
			$save_kriteria_ketidaksesuaian = $this->model_kriteria_ketidaksesuaian->change($id, $save_data);

			if ($save_kriteria_ketidaksesuaian) {

				
				

				
				
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $id;
					$this->data['message'] = cclang('success_update_data_stay', [
						anchor('administrator/kriteria_ketidaksesuaian', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_update_data_redirect', [
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/kriteria_ketidaksesuaian');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/kriteria_ketidaksesuaian');
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
	* delete Kriteria Ketidaksesuaians
	*
	* @var $id String
	*/
	public function delete($id = null)
	{
		$this->is_allowed('kriteria_ketidaksesuaian_delete');

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
            set_message(cclang('has_been_deleted', 'kriteria_ketidaksesuaian'), 'success');
        } else {
            set_message(cclang('error_delete', 'kriteria_ketidaksesuaian'), 'error');
        }

		redirect_back();
	}

		/**
	* View view Kriteria Ketidaksesuaians
	*
	* @var $id String
	*/
	public function view($id)
	{
		$this->is_allowed('kriteria_ketidaksesuaian_view');

		$this->data['kriteria_ketidaksesuaian'] = $this->model_kriteria_ketidaksesuaian->join_avaiable()->filter_avaiable()->find($id);

		$this->template->title('Kriteria Ketidaksesuaian Detail');
		$this->render('backend/standart/administrator/kriteria_ketidaksesuaian/kriteria_ketidaksesuaian_view', $this->data);
	}
	
	/**
	* delete Kriteria Ketidaksesuaians
	*
	* @var $id String
	*/
	private function _remove($id)
	{
		$kriteria_ketidaksesuaian = $this->model_kriteria_ketidaksesuaian->find($id);

		
		
		return $this->model_kriteria_ketidaksesuaian->remove($id);
	}
	
	
	/**
	* Export to excel
	*
	* @return Files Excel .xls
	*/
	public function export()
	{
		$this->is_allowed('kriteria_ketidaksesuaian_export');

		$this->model_kriteria_ketidaksesuaian->export(
			'kriteria_ketidaksesuaian', 
			'kriteria_ketidaksesuaian',
			$this->model_kriteria_ketidaksesuaian->field_search
		);
	}

	/**
	* Export to PDF
	*
	* @return Files PDF .pdf
	*/
	public function export_pdf()
	{
		$this->is_allowed('kriteria_ketidaksesuaian_export');

		$this->model_kriteria_ketidaksesuaian->pdf('kriteria_ketidaksesuaian', 'kriteria_ketidaksesuaian');
	}


	public function single_pdf($id = null)
	{
		$this->is_allowed('kriteria_ketidaksesuaian_export');

		$table = $title = 'kriteria_ketidaksesuaian';
		$this->load->library('HtmlPdf');
      
        $config = array(
            'orientation' => 'p',
            'format' => 'a4',
            'marges' => array(5, 5, 5, 5)
        );

        $this->pdf = new HtmlPdf($config);
        $this->pdf->setDefaultFont('stsongstdlight'); 

        $result = $this->db->get($table);
       
        $data = $this->model_kriteria_ketidaksesuaian->find($id);
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


/* End of file kriteria_ketidaksesuaian.php */
/* Location: ./application/controllers/administrator/Kriteria Ketidaksesuaian.php */