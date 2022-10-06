<?php
defined('BASEPATH') or exit('No direct script access allowed');


/**
 *| --------------------------------------------------------------------------
 *| Master Kriteria Audit Controller
 *| --------------------------------------------------------------------------
 *| Master Kriteria Audit site
 *|
 */
class Master_kriteria_audit extends Admin
{

	public function __construct()
	{
		parent::__construct();

		$this->load->model('model_master_kriteria_audit');
		$this->load->model('group/model_group');
		$this->lang->load('web_lang', $this->current_lang);
	}

	/**
	 * show all Master Kriteria Audits
	 *
	 * @var $offset String
	 */
	public function index($offset = 0)
	{
		$this->is_allowed('master_kriteria_audit_list');

		$filter = $this->input->get('q');
		$field 	= $this->input->get('f');

		$this->data['master_kriteria_audits'] = $this->model_master_kriteria_audit->get($filter, $field, $this->limit_page, $offset);
		$this->data['master_kriteria_audit_counts'] = $this->model_master_kriteria_audit->count_all($filter, $field);

		$config = [
			'base_url'     => 'administrator/master_kriteria_audit/index/',
			'total_rows'   => $this->data['master_kriteria_audit_counts'],
			'per_page'     => $this->limit_page,
			'uri_segment'  => 4,
		];

		$this->data['pagination'] = $this->pagination($config);

		$this->template->title('Master Kriteria Audit List');
		$this->render('backend/standart/administrator/master_kriteria_audit/master_kriteria_audit_list', $this->data);
	}

	/**
	 * Add new master_kriteria_audits
	 *
	 */
	public function add()
	{
		$this->is_allowed('master_kriteria_audit_add');

		$this->template->title('Master Kriteria Audit New');
		$this->render('backend/standart/administrator/master_kriteria_audit/master_kriteria_audit_add', $this->data);
	}

	/**
	 * Add New Master Kriteria Audits
	 *
	 * @return JSON
	 */
	public function add_save()
	{
		if (!$this->is_allowed('master_kriteria_audit_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
			]);
			exit;
		}



		$this->form_validation->set_rules('id_subklausul', 'Parent Subklausul Audit', 'trim|required|max_length[20]');


		$this->form_validation->set_rules('kriteria_audit', 'Kriteria Audit', 'trim|required|max_length[255]');




		if ($this->form_validation->run()) {
			$ids = $this->input->post('id_subklausul');

			$this->db->select('id');
			$getID = $this->db->where('id_subklausul', $ids)->order_by("abs(id)", "desc")->limit(1)->get('master_kriteria_audit')->row();

			$end = substr($getID->id, -1) + 1;
			$start = substr($getID->id, 0, strlen($getID->id) - 1);
			$maxID = $start . $end;

			$save_data = [
				'id' => $maxID,
				'id_subklausul' => $this->input->post('id_subklausul'),
				'kriteria_audit' => $this->input->post('kriteria_audit'),
			];


			$this->db->insert('master_kriteria_audit', $save_data);
			if ($this->db->affected_rows() > 0) {
				$save_master_kriteria_audit = $maxID;

				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $save_master_kriteria_audit;
					$this->data['message'] = cclang('success_save_data_stay', [
						anchor('administrator/master_kriteria_audit/edit/' . $save_master_kriteria_audit, 'Edit Master Kriteria Audit'),
						anchor('administrator/master_kriteria_audit', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_save_data_redirect', [
							anchor('administrator/master_kriteria_audit/edit/' . $save_master_kriteria_audit, 'Edit Master Kriteria Audit')
						]),
						'success'
					);

					$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/master_kriteria_audit');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/master_kriteria_audit');
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
	 * Update view Master Kriteria Audits
	 *
	 * @var $id String
	 */
	public function edit($id)
	{
		$this->is_allowed('master_kriteria_audit_update');

		$this->data['master_kriteria_audit'] = $this->model_master_kriteria_audit->find($id);

		$this->template->title('Master Kriteria Audit Update');
		$this->render('backend/standart/administrator/master_kriteria_audit/master_kriteria_audit_update', $this->data);
	}

	/**
	 * Update Master Kriteria Audits
	 *
	 * @var $id String
	 */
	public function edit_save($id)
	{
		if (!$this->is_allowed('master_kriteria_audit_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
			]);
			exit;
		}
		$this->form_validation->set_rules('id_subklausul', 'Parent Subklausul Audit', 'trim|required|max_length[20]');


		$this->form_validation->set_rules('kriteria_audit', 'Kriteria Audit', 'trim|required|max_length[255]');



		if ($this->form_validation->run()) {

			$save_data = [
				'id' => $this->input->post('id'),
				'id_subklausul' => $this->input->post('id_subklausul'),
				'kriteria_audit' => $this->input->post('kriteria_audit'),
			];




			//$save_data['_example'] = $this->input->post('_example');





			$save_master_kriteria_audit = $this->model_master_kriteria_audit->change($id, $save_data);

			if ($save_master_kriteria_audit) {






				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $id;
					$this->data['message'] = cclang('success_update_data_stay', [
						anchor('administrator/master_kriteria_audit', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_update_data_redirect', []),
						'success'
					);

					$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/master_kriteria_audit');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/master_kriteria_audit');
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
	 * delete Master Kriteria Audits
	 *
	 * @var $id String
	 */
	public function delete($id = null)
	{
		$this->is_allowed('master_kriteria_audit_delete');

		$this->load->helper('file');

		$arr_id = $this->input->get('id');
		$remove = false;

		if (!empty($id)) {
			$remove = $this->_remove($id);
		} elseif (count($arr_id) > 0) {
			foreach ($arr_id as $id) {
				$remove = $this->_remove($id);
			}
		}

		if ($remove) {
			set_message(cclang('has_been_deleted', 'master_kriteria_audit'), 'success');
		} else {
			set_message(cclang('error_delete', 'master_kriteria_audit'), 'error');
		}

		redirect_back();
	}

	/**
	 * View view Master Kriteria Audits
	 *
	 * @var $id String
	 */
	public function view($id)
	{
		$this->is_allowed('master_kriteria_audit_view');

		$this->data['master_kriteria_audit'] = $this->model_master_kriteria_audit->join_avaiable()->filter_avaiable()->find($id);

		$this->template->title('Master Kriteria Audit Detail');
		$this->render('backend/standart/administrator/master_kriteria_audit/master_kriteria_audit_view', $this->data);
	}

	/**
	 * delete Master Kriteria Audits
	 *
	 * @var $id String
	 */
	private function _remove($id)
	{
		$master_kriteria_audit = $this->model_master_kriteria_audit->find($id);



		return $this->model_master_kriteria_audit->remove($id);
	}


	/**
	 * Export to excel
	 *
	 * @return Files Excel .xls
	 */
	public function export()
	{
		$this->is_allowed('master_kriteria_audit_export');

		$this->model_master_kriteria_audit->export(
			'master_kriteria_audit',
			'master_kriteria_audit',
			$this->model_master_kriteria_audit->field_search
		);
	}

	/**
	 * Export to PDF
	 *
	 * @return Files PDF .pdf
	 */
	public function export_pdf()
	{
		$this->is_allowed('master_kriteria_audit_export');

		$this->model_master_kriteria_audit->pdf('master_kriteria_audit', 'master_kriteria_audit');
	}


	public function single_pdf($id = null)
	{
		$this->is_allowed('master_kriteria_audit_export');

		$table = $title = 'master_kriteria_audit';
		$this->load->library('HtmlPdf');

		$config = array(
			'orientation' => 'p',
			'format' => 'a4',
			'marges' => array(5, 5, 5, 5)
		);

		$this->pdf = new HtmlPdf($config);
		$this->pdf->setDefaultFont('stsongstdlight');

		$result = $this->db->get($table);

		$data = $this->model_master_kriteria_audit->find($id);
		$fields = $result->list_fields();

		$content = $this->pdf->loadHtmlPdf('core_template/pdf/pdf_single', [
			'data' => $data,
			'fields' => $fields,
			'title' => $title
		], TRUE);

		$this->pdf->initialize($config);
		$this->pdf->pdf->SetDisplayMode('fullpage');
		$this->pdf->writeHTML($content);
		$this->pdf->Output($table . '.pdf', 'H');
	}
}


/* End of file master_kriteria_audit.php */
/* Location: ./application/controllers/administrator/Master Kriteria Audit.php */