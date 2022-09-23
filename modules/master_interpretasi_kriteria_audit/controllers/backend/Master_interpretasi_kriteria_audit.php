<?php
defined('BASEPATH') or exit('No direct script access allowed');


/**
 *| --------------------------------------------------------------------------
 *| Master Interpretasi Kriteria Audit Controller
 *| --------------------------------------------------------------------------
 *| Master Interpretasi Kriteria Audit site
 *|
 */
class Master_interpretasi_kriteria_audit extends Admin
{

	public function __construct()
	{
		parent::__construct();

		$this->load->model('model_master_interpretasi_kriteria_audit');
		$this->load->model('group/model_group');
		$this->lang->load('web_lang', $this->current_lang);
	}

	/**
	 * show all Master Interpretasi Kriteria Audits
	 *
	 * @var $offset String
	 */
	public function index($offset = 0)
	{
		$this->is_allowed('master_interpretasi_kriteria_audit_list');

		$filter = $this->input->get('q');
		$field 	= $this->input->get('f');

		$this->data['master_interpretasi_kriteria_audits'] = $this->model_master_interpretasi_kriteria_audit->get($filter, $field, $this->limit_page, $offset);
		$this->data['master_interpretasi_kriteria_audit_counts'] = $this->model_master_interpretasi_kriteria_audit->count_all($filter, $field);

		$config = [
			'base_url'     => 'administrator/master_interpretasi_kriteria_audit/index/',
			'total_rows'   => $this->data['master_interpretasi_kriteria_audit_counts'],
			'per_page'     => $this->limit_page,
			'uri_segment'  => 4,
		];

		$this->data['pagination'] = $this->pagination($config);

		$this->template->title('Master Interpretasi Kriteria Audit List');
		$this->render('backend/standart/administrator/master_interpretasi_kriteria_audit/master_interpretasi_kriteria_audit_list', $this->data);
	}

	/**
	 * Add new master_interpretasi_kriteria_audits
	 *
	 */
	public function add()
	{
		$this->is_allowed('master_interpretasi_kriteria_audit_add');

		$this->template->title('Master Interpretasi Kriteria Audit New');
		$this->render('backend/standart/administrator/master_interpretasi_kriteria_audit/master_interpretasi_kriteria_audit_add', $this->data);
	}

	/**
	 * Add New Master Interpretasi Kriteria Audits
	 *
	 * @return JSON
	 */
	public function add_save()
	{
		if (!$this->is_allowed('master_interpretasi_kriteria_audit_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
			]);
			exit;
		}



		$this->form_validation->set_rules('id_kriteria', 'Parent Kriteria Audit', 'trim|required|max_length[20]');


		$this->form_validation->set_rules('interpretasi_kriteria', 'Interpretasi Kriteria', 'trim|required|max_length[255]');





		if ($this->form_validation->run()) {
			$ids = $this->input->post('id_kriteria');

			$this->db->select('id');
			$getID = $this->db->where('id_kriteria', $ids)->order_by("INET_ATON(id)", "desc")->limit(1)->get('master_interpretasi_kriteria_audit')->row();
			if ($getID) {
				$end = substr($getID->id, -1) + 1;
				$start = substr($getID->id, 0, strlen($getID->id) - 1);
			} else {
				$start = $this->input->post('id_kriteria');
				$end = ".1";
			}
			$maxID = $start . $end;
			$save_data = [
				'id' => $maxID,
				'id_kriteria' => $this->input->post('id_kriteria'),
				'interpretasi_kriteria' => $this->input->post('interpretasi_kriteria'),
			];

			//$save_data['_example'] = $this->input->post('_example');
			$this->db->insert('master_interpretasi_kriteria_audit', $save_data);
			if ($this->db->affected_rows() > 0) {
				$save_master_interpretasi_kriteria_audit = $maxID;

				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $save_master_interpretasi_kriteria_audit;
					$this->data['message'] = cclang('success_save_data_stay', [
						anchor('administrator/master_interpretasi_kriteria_audit/edit/' . $save_master_interpretasi_kriteria_audit, 'Edit Master Interpretasi Kriteria Audit'),
						anchor('administrator/master_interpretasi_kriteria_audit', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_save_data_redirect', [
							anchor('administrator/master_interpretasi_kriteria_audit/edit/' . $save_master_interpretasi_kriteria_audit, 'Edit Master Interpretasi Kriteria Audit')
						]),
						'success'
					);

					$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/master_interpretasi_kriteria_audit');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/master_interpretasi_kriteria_audit');
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
	 * Update view Master Interpretasi Kriteria Audits
	 *
	 * @var $id String
	 */
	public function edit($id)
	{
		$this->is_allowed('master_interpretasi_kriteria_audit_update');

		$this->data['master_interpretasi_kriteria_audit'] = $this->model_master_interpretasi_kriteria_audit->find($id);

		$this->template->title('Master Interpretasi Kriteria Audit Update');
		$this->render('backend/standart/administrator/master_interpretasi_kriteria_audit/master_interpretasi_kriteria_audit_update', $this->data);
	}

	/**
	 * Update Master Interpretasi Kriteria Audits
	 *
	 * @var $id String
	 */
	public function edit_save($id)
	{
		if (!$this->is_allowed('master_interpretasi_kriteria_audit_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
			]);
			exit;
		}
		$this->form_validation->set_rules('id_kriteria', 'Parent Kriteria Audit', 'trim|required|max_length[20]');


		$this->form_validation->set_rules('interpretasi_kriteria', 'Interpretasi Kriteria', 'trim|required|max_length[255]');



		if ($this->form_validation->run()) {

			$save_data = [
				'id' => $this->input->post('id'),
				'id_kriteria' => $this->input->post('id_kriteria'),
				'interpretasi_kriteria' => $this->input->post('interpretasi_kriteria'),
			];




			//$save_data['_example'] = $this->input->post('_example');





			$save_master_interpretasi_kriteria_audit = $this->model_master_interpretasi_kriteria_audit->change($id, $save_data);

			if ($save_master_interpretasi_kriteria_audit) {






				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $id;
					$this->data['message'] = cclang('success_update_data_stay', [
						anchor('administrator/master_interpretasi_kriteria_audit', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_update_data_redirect', []),
						'success'
					);

					$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/master_interpretasi_kriteria_audit');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/master_interpretasi_kriteria_audit');
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
	 * delete Master Interpretasi Kriteria Audits
	 *
	 * @var $id String
	 */
	public function delete($id = null)
	{
		$this->is_allowed('master_interpretasi_kriteria_audit_delete');

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
			set_message(cclang('has_been_deleted', 'master_interpretasi_kriteria_audit'), 'success');
		} else {
			set_message(cclang('error_delete', 'master_interpretasi_kriteria_audit'), 'error');
		}

		redirect_back();
	}

	/**
	 * View view Master Interpretasi Kriteria Audits
	 *
	 * @var $id String
	 */
	public function view($id)
	{
		$this->is_allowed('master_interpretasi_kriteria_audit_view');

		$this->data['master_interpretasi_kriteria_audit'] = $this->model_master_interpretasi_kriteria_audit->join_avaiable()->filter_avaiable()->find($id);

		$this->template->title('Master Interpretasi Kriteria Audit Detail');
		$this->render('backend/standart/administrator/master_interpretasi_kriteria_audit/master_interpretasi_kriteria_audit_view', $this->data);
	}

	/**
	 * delete Master Interpretasi Kriteria Audits
	 *
	 * @var $id String
	 */
	private function _remove($id)
	{
		$master_interpretasi_kriteria_audit = $this->model_master_interpretasi_kriteria_audit->find($id);



		return $this->model_master_interpretasi_kriteria_audit->remove($id);
	}


	/**
	 * Export to excel
	 *
	 * @return Files Excel .xls
	 */
	public function export()
	{
		$this->is_allowed('master_interpretasi_kriteria_audit_export');

		$this->model_master_interpretasi_kriteria_audit->export(
			'master_interpretasi_kriteria_audit',
			'master_interpretasi_kriteria_audit',
			$this->model_master_interpretasi_kriteria_audit->field_search
		);
	}

	/**
	 * Export to PDF
	 *
	 * @return Files PDF .pdf
	 */
	public function export_pdf()
	{
		$this->is_allowed('master_interpretasi_kriteria_audit_export');

		$this->model_master_interpretasi_kriteria_audit->pdf('master_interpretasi_kriteria_audit', 'master_interpretasi_kriteria_audit');
	}


	public function single_pdf($id = null)
	{
		$this->is_allowed('master_interpretasi_kriteria_audit_export');

		$table = $title = 'master_interpretasi_kriteria_audit';
		$this->load->library('HtmlPdf');

		$config = array(
			'orientation' => 'p',
			'format' => 'a4',
			'marges' => array(5, 5, 5, 5)
		);

		$this->pdf = new HtmlPdf($config);
		$this->pdf->setDefaultFont('stsongstdlight');

		$result = $this->db->get($table);

		$data = $this->model_master_interpretasi_kriteria_audit->find($id);
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


/* End of file master_interpretasi_kriteria_audit.php */
/* Location: ./application/controllers/administrator/Master Interpretasi Kriteria Audit.php */