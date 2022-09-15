<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
*| --------------------------------------------------------------------------
*| Audit Tasks Controller
*| --------------------------------------------------------------------------
*| Audit Tasks site
*|
*/
class Audit_tasks extends Admin	
{
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model('model_audit_tasks');
		$this->load->model('group/model_group');
		$this->lang->load('web_lang', $this->current_lang);
	}

	/**
	* show all Audit Taskss
	*
	* @var $offset String
	*/
	public function index($offset = 0)
	{
		$this->is_allowed('audit_tasks_list');

		$filter = $this->input->get('q');
		$field 	= $this->input->get('f');

		$this->data['audit_taskss'] = $this->model_audit_tasks->get($filter, $field, $this->limit_page, $offset);
		$this->data['audit_tasks_counts'] = $this->model_audit_tasks->count_all($filter, $field);

		$config = [
			'base_url'     => 'administrator/audit_tasks/index/',
			'total_rows'   => $this->data['audit_tasks_counts'],
			'per_page'     => $this->limit_page,
			'uri_segment'  => 4,
		];

		$this->data['pagination'] = $this->pagination($config);

		$this->template->title('Audit Tasks List');
		$this->render('backend/standart/administrator/audit_tasks/audit_tasks_list', $this->data);
	}
	
	/**
	* Add new audit_taskss
	*
	*/
	public function add()
	{
		$this->is_allowed('audit_tasks_add');

		$this->template->title('Audit Tasks New');
		$this->render('backend/standart/administrator/audit_tasks/audit_tasks_add', $this->data);
	}

	/**
	* Add New Audit Taskss
	*
	* @return JSON
	*/
	public function add_save()
	{
		if (!$this->is_allowed('audit_tasks_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}
		
		

		$this->form_validation->set_rules('nama_perusahaan', 'Nama Perusahaan', 'trim|required|max_length[255]');
		

		$this->form_validation->set_rules('kantor_cabang', 'Kantor Cabang', 'trim|max_length[255]');
		

		$this->form_validation->set_rules('jenis_industri', 'Jenis Industri', 'trim|max_length[255]');
		

		$this->form_validation->set_rules('lingkup_audit[]', 'Lingkup Audit', 'trim|max_length[10]');
		

		$this->form_validation->set_rules('tanggal', 'Tanggal', 'trim|required');
		

		$this->form_validation->set_rules('tempat', 'Tempat', 'trim|max_length[255]');
		

		$this->form_validation->set_rules('jadwal', 'Jadwal', 'trim|max_length[10]');
		

		$this->form_validation->set_rules('kriteria_audit', 'Kriteria Audit', 'trim|max_length[10]');
		

		$this->form_validation->set_rules('uraian_tdk_sesuai', 'Uraian Tdk Sesuai', 'trim|max_length[10]');
		

		$this->form_validation->set_rules('uraian_temuan', 'Uraian Temuan', 'trim|max_length[10]');
		

		$this->form_validation->set_rules('lead', 'Lead', 'trim|required|max_length[10]');
		

		$this->form_validation->set_rules('member1', 'Member1', 'trim|required|max_length[10]');
		

		$this->form_validation->set_rules('member2', 'Member2', 'trim|required|max_length[10]');
		

		

		if ($this->form_validation->run()) {
		
			$save_data = [
				'nama_perusahaan' => $this->input->post('nama_perusahaan'),
				'kantor_cabang' => $this->input->post('kantor_cabang'),
				'jenis_industri' => $this->input->post('jenis_industri'),
				'lingkup_audit' => implode(',', (array) $this->input->post('lingkup_audit')),
				'tanggal' => $this->input->post('tanggal'),
				'tempat' => $this->input->post('tempat'),
				'tujuan' => $this->input->post('tujuan'),
				'proses_produksi' => $this->input->post('proses_produksi'),
				'penerapan_k3' => $this->input->post('penerapan_k3'),
				'jadwal' => $this->input->post('jadwal'),
				'kriteria_audit' => $this->input->post('kriteria_audit'),
				'ket_kriteria_tdk_berlaku' => $this->input->post('ket_kriteria_tdk_berlaku'),
				'uraian_tdk_sesuai' => $this->input->post('uraian_tdk_sesuai'),
				'uraian_temuan' => $this->input->post('uraian_temuan'),
				'lead' => $this->input->post('lead'),
				'member1' => $this->input->post('member1'),
				'member2' => $this->input->post('member2'),
			];

			
			
//$save_data['_example'] = $this->input->post('_example');
			



			
			
			$save_audit_tasks = $id = $this->model_audit_tasks->store($save_data);
            

			if ($save_audit_tasks) {
				
				$id = $save_audit_tasks;
				
				
					
				
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $save_audit_tasks;
					$this->data['message'] = cclang('success_save_data_stay', [
						anchor('administrator/audit_tasks/edit/' . $save_audit_tasks, 'Edit Audit Tasks'),
						anchor('administrator/audit_tasks', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_save_data_redirect', [
						anchor('administrator/audit_tasks/edit/' . $save_audit_tasks, 'Edit Audit Tasks')
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/audit_tasks');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/audit_tasks');
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
	* Update view Audit Taskss
	*
	* @var $id String
	*/
	public function edit($id)
	{
		$this->is_allowed('audit_tasks_update');

		$this->data['audit_tasks'] = $this->model_audit_tasks->find($id);

		$this->template->title('Audit Tasks Update');
		$this->render('backend/standart/administrator/audit_tasks/audit_tasks_update', $this->data);
	}

	/**
	* Update Audit Taskss
	*
	* @var $id String
	*/
	public function edit_save($id)
	{
		if (!$this->is_allowed('audit_tasks_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}
				$this->form_validation->set_rules('nama_perusahaan', 'Nama Perusahaan', 'trim|required|max_length[255]');
		

		$this->form_validation->set_rules('kantor_cabang', 'Kantor Cabang', 'trim|max_length[255]');
		

		$this->form_validation->set_rules('jenis_industri', 'Jenis Industri', 'trim|max_length[255]');
		

		$this->form_validation->set_rules('lingkup_audit[]', 'Lingkup Audit', 'trim|max_length[10]');
		

		$this->form_validation->set_rules('tanggal', 'Tanggal', 'trim|required');
		

		$this->form_validation->set_rules('tempat', 'Tempat', 'trim|max_length[255]');
		

		$this->form_validation->set_rules('jadwal', 'Jadwal', 'trim|max_length[10]');
		

		$this->form_validation->set_rules('kriteria_audit', 'Kriteria Audit', 'trim|max_length[10]');
		

		$this->form_validation->set_rules('uraian_tdk_sesuai', 'Uraian Tdk Sesuai', 'trim|max_length[10]');
		

		$this->form_validation->set_rules('uraian_temuan', 'Uraian Temuan', 'trim|max_length[10]');
		

		$this->form_validation->set_rules('lead', 'Lead', 'trim|required|max_length[10]');
		

		$this->form_validation->set_rules('member1', 'Member1', 'trim|required|max_length[10]');
		

		$this->form_validation->set_rules('member2', 'Member2', 'trim|required|max_length[10]');
		

		
		if ($this->form_validation->run()) {
		
			$save_data = [
				'nama_perusahaan' => $this->input->post('nama_perusahaan'),
				'kantor_cabang' => $this->input->post('kantor_cabang'),
				'jenis_industri' => $this->input->post('jenis_industri'),
				'lingkup_audit' => implode(',', (array) $this->input->post('lingkup_audit')),
				'tanggal' => $this->input->post('tanggal'),
				'tempat' => $this->input->post('tempat'),
				'tujuan' => $this->input->post('tujuan'),
				'proses_produksi' => $this->input->post('proses_produksi'),
				'penerapan_k3' => $this->input->post('penerapan_k3'),
				'jadwal' => $this->input->post('jadwal'),
				'kriteria_audit' => $this->input->post('kriteria_audit'),
				'ket_kriteria_tdk_berlaku' => $this->input->post('ket_kriteria_tdk_berlaku'),
				'uraian_tdk_sesuai' => $this->input->post('uraian_tdk_sesuai'),
				'uraian_temuan' => $this->input->post('uraian_temuan'),
				'lead' => $this->input->post('lead'),
				'member1' => $this->input->post('member1'),
				'member2' => $this->input->post('member2'),
			];

			

			
//$save_data['_example'] = $this->input->post('_example');
			


			
			
			$save_audit_tasks = $this->model_audit_tasks->change($id, $save_data);

			if ($save_audit_tasks) {

				
				

				
				
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $id;
					$this->data['message'] = cclang('success_update_data_stay', [
						anchor('administrator/audit_tasks', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_update_data_redirect', [
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/audit_tasks');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/audit_tasks');
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
	* delete Audit Taskss
	*
	* @var $id String
	*/
	public function delete($id = null)
	{
		$this->is_allowed('audit_tasks_delete');

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
            set_message(cclang('has_been_deleted', 'audit_tasks'), 'success');
        } else {
            set_message(cclang('error_delete', 'audit_tasks'), 'error');
        }

		redirect_back();
	}

		/**
	* View view Audit Taskss
	*
	* @var $id String
	*/
	public function view($id)
	{
		$this->is_allowed('audit_tasks_view');

		$this->data['audit_tasks'] = $this->model_audit_tasks->join_avaiable()->filter_avaiable()->find($id);

		$this->template->title('Audit Tasks Detail');
		$this->render('backend/standart/administrator/audit_tasks/audit_tasks_view', $this->data);
	}
	
	/**
	* delete Audit Taskss
	*
	* @var $id String
	*/
	private function _remove($id)
	{
		$audit_tasks = $this->model_audit_tasks->find($id);

		
		
		return $this->model_audit_tasks->remove($id);
	}
	
	
	/**
	* Export to excel
	*
	* @return Files Excel .xls
	*/
	public function export()
	{
		$this->is_allowed('audit_tasks_export');

		$this->model_audit_tasks->export(
			'audit_tasks', 
			'audit_tasks',
			$this->model_audit_tasks->field_search
		);
	}

	/**
	* Export to PDF
	*
	* @return Files PDF .pdf
	*/
	public function export_pdf()
	{
		$this->is_allowed('audit_tasks_export');

		$this->model_audit_tasks->pdf('audit_tasks', 'audit_tasks');
	}


	public function single_pdf($id = null)
	{
		$this->is_allowed('audit_tasks_export');

		$table = $title = 'audit_tasks';
		$this->load->library('HtmlPdf');
      
        $config = array(
            'orientation' => 'p',
            'format' => 'a4',
            'marges' => array(5, 5, 5, 5)
        );

        $this->pdf = new HtmlPdf($config);
        $this->pdf->setDefaultFont('stsongstdlight'); 

        $result = $this->db->get($table);
       
        $data = $this->model_audit_tasks->find($id);
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


/* End of file audit_tasks.php */
/* Location: ./application/controllers/administrator/Audit Tasks.php */