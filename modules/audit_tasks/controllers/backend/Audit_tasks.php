<?php
defined('BASEPATH') or exit('No direct script access allowed');


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


	// public function test()
	// {
	// 	// $this->is_allowed('audit_tasks_list');

	// 	var_dump($this->input->post('lingkup_audit'));
	// 	die;
	// }

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


		// $this->form_validation->set_rules('lingkup_audit[]', 'Lingkup Audit', 'trim|max_length[10]');


		$this->form_validation->set_rules('tanggal', 'Tanggal', 'trim|required');


		$this->form_validation->set_rules('tempat', 'Tempat', 'trim|max_length[255]');


		$this->form_validation->set_rules('lead', 'Lead', 'trim|required|max_length[10]');


		$this->form_validation->set_rules('member1', 'Member1', 'trim|required|max_length[10]');


		$this->form_validation->set_rules('member2', 'Member2', 'trim|required|max_length[10]');




		if ($this->form_validation->run()) {
			$audit_task = [
				'nama_perusahaan' => $this->input->post('nama_perusahaan'),
				'kantor_cabang' => $this->input->post('kantor_cabang'),
				'jenis_industri' => $this->input->post('jenis_industri'),
				// 'lingkup_audit' => $this->input->post('lingkup_audit'),
				'tanggal' => $this->input->post('tanggal'),
				'tempat' => $this->input->post('tempat'),
				'tujuan' => $this->input->post('tujuan'),
				'proses_produksi' => $this->input->post('proses_produksi'),
				'penerapan_k3' => $this->input->post('penerapan_k3'),
				'lead' => $this->input->post('lead'),
				'member1' => $this->input->post('member1'),
				'member2' => $this->input->post('member2'),
			];

			$save_audit_tasks = $id = $this->model_audit_tasks->store($audit_task);

			if ($save_audit_tasks) {

				// SAVE LINGKUP 
				$lingkup_audit = $this->input->post('lingkup_audit');
				$data = [];
				foreach ($lingkup_audit as $lingkup) {
					$data[] = [
						'id_task' => $save_audit_tasks,
						'id_departemen' => $lingkup,
					];
				}
				$save_lingkup = $this->db->insert_batch('lingkup_audit', $data);
				// END SAVE LINGKUP 


				// SAVE JADWAL AUDIT 
				$jadwal = [
					[
						'id_task'	=> $save_audit_tasks,
						'kegiatan' => 'Pertemuan Awal',
						'waktu'	=> $this->input->post('awal_waktu'),
						'keterangan'	=> $this->input->post('awal_keg'),
						'penghubung'	=> $this->input->post('awal_penghubung'),
					], [
						'id_task'	=> $save_audit_tasks,
						'kegiatan' => 'Pemeriksaan dan penilaian kriteria',
						'waktu'	=> $this->input->post('periksa_waktu'),
						'keterangan'	=> $this->input->post('periksa_keg'),
						'penghubung'	=> $this->input->post('periksa_penghubung'),
					], [
						'id_task'	=> $save_audit_tasks,
						'kegiatan' => 'Pertemuan Akhir',
						'waktu'	=> $this->input->post('akhir_waktu'),
						'keterangan'	=> $this->input->post('akhir_keg'),
						'penghubung'	=> $this->input->post('akhir_penghubung'),
					]
				];

				$save_jadwal = $this->db->insert_batch('jadwal', $jadwal);
				// END SAVE JADWAL AUDIT 



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
						]),
						'success'
					);

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
						cclang('success_update_data_redirect', []),
						'success'
					);

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
		} elseif (count($arr_id) > 0) {
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
		$this->pdf->Output($table . '.pdf', 'H');
	}

	function audit_pemenuhan($id_task)
	{
		$data = [
			'id_task'	=> $id_task,
		];
		$this->render('backend/standart/administrator/audit_tasks/audit_pemenuhan', $data);
	}


	function save_audit_pemenuhan()
	{

		$audit_master = $this->db->get('master_interpretasi_kriteria_audit')->result();

		$datas = $this->input->post();

		// var_dump($datas);
		$penjelasan = [];
		$ketidaksesuaian = [];
		$observasi = [];
		foreach ($datas as $key => $data) {
			if (substr($key, 0, 11) == "penjelasan_") {
				array_push($penjelasan, [
					'id_task'		=> $this->input->post('id_task'),
					'id_kriteria' 	=> str_replace("_", ".", substr($key, 11)),
					'penjelasan'	=> $data,
				]);
			}
			if (substr($key, 0, 13) == "tidak_sesuai_") {
				array_push($ketidaksesuaian, [
					'id_task'			=> $this->input->post('id_task'),
					'id_kriteria' 		=> str_replace("_", ".", substr($key, 13)),
					'penyebab'			=> $data,
					'status'			=> "open"
				]);
			}
			if (substr($key, 0, 10) == "observasi_") {
				array_push($observasi, [
					'id_task'			=> $this->input->post('id_task'),
					'id_kriteria' 		=> str_replace("_", ".", substr($key, 10)),
					'bukti_objektif'	=> $data,
					'status'			=> "open"
				]);
			}
		}

		$save_data_kriteria_tidak_berlaku = $this->db->insert_batch('kriteria_tidak_berlaku', $penjelasan);
		$save_data_ketidaksesuaian = $this->db->insert_batch('kriteria_ketidaksesuaian', $ketidaksesuaian);
		$save_data_observasi = $this->db->insert_batch('kriteria_observasi', $observasi);

		$audit_pemenuhan = [];
		foreach ($audit_master as $audit) {
			if ($this->input->post('radio_' . str_replace(".", "_", $audit->id))) {
				array_push($audit_pemenuhan, [
					'id_task'		=> $this->input->post('id_task'),
					'id_kriteria'	=> $audit->id,
					'pemenuhan'		=> $this->input->post('radio_' . str_replace(".", "_", $audit->id)),
					'created_at'	=> date("Y-m-d H:i:s"),
					'created_by'	=> $this->session->userdata('username')
				]);
			}
		}

		$save_data_audit_pemenuhan = $this->db->insert_batch('audit_pemenuhan', $audit_pemenuhan);

		if ($save_data_audit_pemenuhan) {
			// UPDATE STATUS AUDIT TASK 
			$IDTASK =  $this->input->post('id_task');
			$this->db->update('audit_tasks', ['status' => 1], ['id' => $IDTASK]);


			if ($this->input->post('save_type') == 'stay') {
				$this->data['success'] = true;
				$this->data['id'] 	   = $save_data_audit_pemenuhan;
				$this->data['message'] = cclang('success_save_data_stay', [
					// anchor('administrator/audit_tasks/edit/' . $save_data, 'Edit Audit Tasks'),
					// anchor('administrator/audit_tasks', ' Go back to list')
				]);
			} else {
				set_message(
					cclang('success_save_data_redirect', [
						// anchor('administrator/audit_tasks/edit/' . $save_data, 'Edit Audit Tasks')
					]),
					'success'
				);

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
		$this->response($this->data);
	}


	public function review_audit($id_task)
	{
		// $this->is_allowed('audit_tasks_update');

		$data = [
			'id_task' 	=> $id_task,
			'audit_task' 	=> $this->model_audit_tasks->find($id_task),
			'hasil_audits'	=> $this->model_audit_tasks->getHasilAudit($id_task),
			'tidak_berlaku'		=> $this->model_audit_tasks->auditTidakBerlaku($id_task),
			'ketidak_sesuaian'	=> $this->model_audit_tasks->auditKetidakSesuaian($id_task),
			'observasi'			=> $this->model_audit_tasks->auditObservasi($id_task),
		];
		$this->render('backend/standart/administrator/audit_tasks/review_audit', $data);
	}

	public function audit_perbaikan($id_task)
	{
		$data = [
			'id_task' 	=> $id_task,
			'audit_task' 	=> $this->model_audit_tasks->find($id_task),
			'hasil_audits'	=> $this->model_audit_tasks->getHasilAudit($id_task),
			'tidak_berlaku'		=> $this->model_audit_tasks->auditTidakBerlaku($id_task),
			'ketidak_sesuaian'	=> $this->model_audit_tasks->auditKetidakSesuaian($id_task),
			'observasi'			=> $this->model_audit_tasks->auditObservasi($id_task),
		];
		$this->render('backend/standart/administrator/audit_tasks/audit_perbaikan', $data);
	}

	function save_batas_waktu_perbaikan()
	{
		$id_task = $this->input->post('id_task');
		$this->form_validation->set_rules('batas_waktu', 'Batas Waktu', 'trim');

		if ($this->form_validation->run()) {
			$waktu = $this->input->post('batas_waktu');
			$data = [
				'batas_waktu'	=> $waktu ? $waktu : null,
				'status'		=> $waktu ? 2 : 1,
			];

			$update_data_audit_tasks = $this->db->update('audit_tasks', $data, ['id' => $id_task]);

			if ($update_data_audit_tasks) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $update_data_audit_tasks;
					$this->data['message'] = cclang('success_save_data_stay', [
						// anchor('administrator/audit_tasks/edit/' . $update_data_audit_tasks, 'Edit Audit Tasks'),
						// anchor('administrator/audit_tasks', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_save_data_redirect', [
							// anchor('administrator/audit_tasks/edit/' . $update_data_audit_tasks, 'Edit Audit Tasks')
						]),
						'success'
					);

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

	function save_audit_perbaikan()
	{
		$id_task = $this->input->post('id_task');
		$inputs = $this->input->post();

		$penyebab = [];
		$tindakan = [];

		$rekomendasi = [];

		foreach ($inputs as $key => $data) {
			if (substr($key, 0, 9) == "penyebab_") {
				array_push($penyebab, [
					'id'		=> substr($key, 9),
					'penyebab'	=> $data,
				]);
			}
			if (substr($key, 0, 9) == "tindakan_") {
				array_push($tindakan, [
					'id'		=> substr($key, 9),
					'tindakan'	=> $data,
				]);
			}
			if (substr($key, 0, 10) == "observasi_") {
				array_push($rekomendasi, [
					'id'		=> substr($key, 10),
					'rekomendasi'	=> $data,
				]);
			}
		}

		// UPDATE KRITERIA_KETIDAKSESUAIAN 

		$save_penyebab = $this->db->update_batch('kriteria_ketidaksesuaian', $penyebab, 'id');
		$save_tindakan = $this->db->update_batch('kriteria_ketidaksesuaian', $tindakan, 'id');
		$save_rekomendasi = $this->db->update_batch('kriteria_observasi', $rekomendasi, 'id');


		if ($save_tindakan) {
			// update status audit_tasks
			$this->db->update('audit_tasks', ['status' => 3, 'waktu_perbaikan' => date('Y-m-d H:i:s')], ['id' => $id_task]);

			if ($this->input->post('save_type') == 'stay') {
				$this->data['success'] = true;
				$this->data['id'] 	   = $save_tindakan;
				$this->data['message'] = cclang('success_save_data_stay', [
					// anchor('administrator/audit_tasks/edit/' . $update_data_audit_tasks, 'Edit Audit Tasks'),
					// anchor('administrator/audit_tasks', ' Go back to list')
				]);
			} else {
				set_message(
					cclang('success_save_data_redirect', [
						// anchor('administrator/audit_tasks/edit/' . $update_data_audit_tasks, 'Edit Audit Tasks')
					]),
					'success'
				);

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

		$this->response($this->data);
	}

	function audit_review_perbaikan($id_task)
	{
		$data = [
			'id_task' 	=> $id_task,
			'audit_task' 	=> $this->model_audit_tasks->find($id_task),
			'hasil_audits'	=> $this->model_audit_tasks->getHasilAudit($id_task),
			'tidak_berlaku'		=> $this->model_audit_tasks->auditTidakBerlaku($id_task),
			'ketidak_sesuaian'	=> $this->model_audit_tasks->auditKetidakSesuaian($id_task),
			'observasi'			=> $this->model_audit_tasks->auditObservasi($id_task),
		];
		$this->render('backend/standart/administrator/audit_tasks/audit_review_perbaikan', $data);
	}
}


/* End of file audit_tasks.php */
/* Location: ./application/controllers/administrator/Audit Tasks.php */
