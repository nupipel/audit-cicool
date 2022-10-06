<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
*| --------------------------------------------------------------------------
*| Images Controller
*| --------------------------------------------------------------------------
*| Images site
*|
*/
class Images extends Admin	
{
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model('model_images');
		$this->load->model('group/model_group');
		$this->lang->load('web_lang', $this->current_lang);
	}

	/**
	* show all Imagess
	*
	* @var $offset String
	*/
	public function index($offset = 0)
	{
		$this->is_allowed('images_list');

		$filter = $this->input->get('q');
		$field 	= $this->input->get('f');

		$this->data['imagess'] = $this->model_images->get($filter, $field, $this->limit_page, $offset);
		$this->data['images_counts'] = $this->model_images->count_all($filter, $field);

		$config = [
			'base_url'     => 'administrator/images/index/',
			'total_rows'   => $this->data['images_counts'],
			'per_page'     => $this->limit_page,
			'uri_segment'  => 4,
		];

		$this->data['pagination'] = $this->pagination($config);

		$this->template->title('Images List');
		$this->render('backend/standart/administrator/images/images_list', $this->data);
	}
	
	/**
	* Add new imagess
	*
	*/
	public function add()
	{
		$this->is_allowed('images_add');

		$this->template->title('Images New');
		$this->render('backend/standart/administrator/images/images_add', $this->data);
	}

	/**
	* Add New Imagess
	*
	* @return JSON
	*/
	public function add_save()
	{
		if (!$this->is_allowed('images_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}
		
		

		$this->form_validation->set_rules('nama', 'Nama', 'trim|required|max_length[255]');
		

		$this->form_validation->set_rules('images_image_name', 'Image', 'trim|required');
		

		

		if ($this->form_validation->run()) {
			$images_image_uuid = $this->input->post('images_image_uuid');
			$images_image_name = $this->input->post('images_image_name');
		
			$save_data = [
				'nama' => $this->input->post('nama'),
			];

			
			
//$save_data['_example'] = $this->input->post('_example');
			



			
			if (!is_dir(FCPATH . '/uploads/images/')) {
				mkdir(FCPATH . '/uploads/images/');
			}

			if (!empty($images_image_name)) {
				$images_image_name_copy = date('YmdHis') . '-' . $images_image_name;

				rename(FCPATH . 'uploads/tmp/' . $images_image_uuid . '/' . $images_image_name, 
						FCPATH . 'uploads/images/' . $images_image_name_copy);

				if (!is_file(FCPATH . '/uploads/images/' . $images_image_name_copy)) {
					echo json_encode([
						'success' => false,
						'message' => 'Error uploading file'
						]);
					exit;
				}

				$save_data['image'] = $images_image_name_copy;
			}
		
			
			$save_images = $id = $this->model_images->store($save_data);
            

			if ($save_images) {
				
				$id = $save_images;
				
				
					
				
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $save_images;
					$this->data['message'] = cclang('success_save_data_stay', [
						anchor('administrator/images/edit/' . $save_images, 'Edit Images'),
						anchor('administrator/images', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_save_data_redirect', [
						anchor('administrator/images/edit/' . $save_images, 'Edit Images')
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/images');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/images');
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
	* Update view Imagess
	*
	* @var $id String
	*/
	public function edit($id)
	{
		$this->is_allowed('images_update');

		$this->data['images'] = $this->model_images->find($id);

		$this->template->title('Images Update');
		$this->render('backend/standart/administrator/images/images_update', $this->data);
	}

	/**
	* Update Imagess
	*
	* @var $id String
	*/
	public function edit_save($id)
	{
		if (!$this->is_allowed('images_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}
				$this->form_validation->set_rules('nama', 'Nama', 'trim|required|max_length[255]');
		

		$this->form_validation->set_rules('images_image_name', 'Image', 'trim|required');
		

		
		if ($this->form_validation->run()) {
			$images_image_uuid = $this->input->post('images_image_uuid');
			$images_image_name = $this->input->post('images_image_name');
		
			$save_data = [
				'nama' => $this->input->post('nama'),
			];

			

			
//$save_data['_example'] = $this->input->post('_example');
			


			
			if (!is_dir(FCPATH . '/uploads/images/')) {
				mkdir(FCPATH . '/uploads/images/');
			}

			if (!empty($images_image_uuid)) {
				$images_image_name_copy = date('YmdHis') . '-' . $images_image_name;

				rename(FCPATH . 'uploads/tmp/' . $images_image_uuid . '/' . $images_image_name, 
						FCPATH . 'uploads/images/' . $images_image_name_copy);

				if (!is_file(FCPATH . '/uploads/images/' . $images_image_name_copy)) {
					echo json_encode([
						'success' => false,
						'message' => 'Error uploading file'
						]);
					exit;
				}

				$save_data['image'] = $images_image_name_copy;
			}
		
			
			$save_images = $this->model_images->change($id, $save_data);

			if ($save_images) {

				
				

				
				
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $id;
					$this->data['message'] = cclang('success_update_data_stay', [
						anchor('administrator/images', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_update_data_redirect', [
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/images');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/images');
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
	* delete Imagess
	*
	* @var $id String
	*/
	public function delete($id = null)
	{
		$this->is_allowed('images_delete');

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
            set_message(cclang('has_been_deleted', 'images'), 'success');
        } else {
            set_message(cclang('error_delete', 'images'), 'error');
        }

		redirect_back();
	}

		/**
	* View view Imagess
	*
	* @var $id String
	*/
	public function view($id)
	{
		$this->is_allowed('images_view');

		$this->data['images'] = $this->model_images->join_avaiable()->filter_avaiable()->find($id);

		$this->template->title('Images Detail');
		$this->render('backend/standart/administrator/images/images_view', $this->data);
	}
	
	/**
	* delete Imagess
	*
	* @var $id String
	*/
	private function _remove($id)
	{
		$images = $this->model_images->find($id);

		if (!empty($images->image)) {
			$path = FCPATH . '/uploads/images/' . $images->image;

			if (is_file($path)) {
				$delete_file = unlink($path);
			}
		}
		
		
		return $this->model_images->remove($id);
	}
	
	/**
	* Upload Image Images	* 
	* @return JSON
	*/
	public function upload_image_file()
	{
		if (!$this->is_allowed('images_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		$uuid = $this->input->post('qquuid');

		echo $this->upload_file([
			'uuid' 		 	=> $uuid,
			'table_name' 	=> 'images',
		]);
	}

	/**
	* Delete Image Images	* 
	* @return JSON
	*/
	public function delete_image_file($uuid)
	{
		if (!$this->is_allowed('images_delete', false)) {
			echo json_encode([
				'success' => false,
				'error' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		echo $this->delete_file([
            'uuid'              => $uuid, 
            'delete_by'         => $this->input->get('by'), 
            'field_name'        => 'image', 
            'upload_path_tmp'   => './uploads/tmp/',
            'table_name'        => 'images',
            'primary_key'       => 'id',
            'upload_path'       => 'uploads/images/'
        ]);
	}

	/**
	* Get Image Images	* 
	* @return JSON
	*/
	public function get_image_file($id)
	{
		if (!$this->is_allowed('images_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => 'Image not loaded, you do not have permission to access'
				]);
			exit;
		}

		$images = $this->model_images->find($id);

		echo $this->get_file([
            'uuid'              => $id, 
            'delete_by'         => 'id', 
            'field_name'        => 'image', 
            'table_name'        => 'images',
            'primary_key'       => 'id',
            'upload_path'       => 'uploads/images/',
            'delete_endpoint'   => 'administrator/images/delete_image_file'
        ]);
	}
	
	
	/**
	* Export to excel
	*
	* @return Files Excel .xls
	*/
	public function export()
	{
		$this->is_allowed('images_export');

		$this->model_images->export(
			'images', 
			'images',
			$this->model_images->field_search
		);
	}

	/**
	* Export to PDF
	*
	* @return Files PDF .pdf
	*/
	public function export_pdf()
	{
		$this->is_allowed('images_export');

		$this->model_images->pdf('images', 'images');
	}


	public function single_pdf($id = null)
	{
		$this->is_allowed('images_export');

		$table = $title = 'images';
		$this->load->library('HtmlPdf');
      
        $config = array(
            'orientation' => 'p',
            'format' => 'a4',
            'marges' => array(5, 5, 5, 5)
        );

        $this->pdf = new HtmlPdf($config);
        $this->pdf->setDefaultFont('stsongstdlight'); 

        $result = $this->db->get($table);
       
        $data = $this->model_images->find($id);
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


/* End of file images.php */
/* Location: ./application/controllers/administrator/Images.php */