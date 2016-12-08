<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->library('Grocery_CRUD');

		if(!$this->ion_auth->is_admin()){
			redirect('auth/login');
			die();
		}
		$this->load->library('grocery_CRUD');
		$this->load->library('image_CRUD');
		$this->load->helper('url');
		$this->load->library('session');

	}

	public function index(){
		$this->load->view('admin/dashboard');
	}

	public function edit(){
		//$this->load->view('admin/edit_form');
	}

	public function master_filter(){
		$crud = new grocery_CRUD();
		$crud->set_table('master_filter');
		$crud->set_subject('Users Data');
		$crud->unset_columns('created_date');
		$crud->unset_add_fields('created_date');
		$crud->unset_edit_fields('created_date');
		$output = $crud->render();
		$this->load->view('admin/crud_view', $output);
	}

	public function customer(){
		$crud = new grocery_CRUD();
		$crud->set_table('customer');
		$crud->set_subject('Customer Data');
		$crud->unset_columns('created_date');
		$crud->unset_add_fields('created_date');
		$crud->unset_edit_fields('created_date');
		$output = $crud->render();
		$this->load->view('admin/crud_view', $output);
	}

    public function certificate_type(){
		$crud = new grocery_CRUD();
		$crud->set_table('certificate_type');
		$crud->set_subject('Certificate Type');
		$crud->unset_columns('created_date');
		$crud->unset_add_fields('created_date');
		$crud->unset_edit_fields('created_date');
		$crud->set_field_upload('certificate_image','assets/admin/certificate_image');
		$output = $crud->render();
		$this->load->view('admin/crud_view', $output);
	}

	public function product_details(){
		$filters_data_set['products'] = $this->db->get('product_ids')->result();
		$filters_data_set['master_filter'] = $this->db->get('master_filter')->result();
		foreach ($filters_data_set['products'] as $fr) {
			// $filters_data_set[$fr->product_id] = $this->db->query('SELECT * FROM master_table JOIN ON filter_table')->result();
			$dat[$fr->product_id] = $this->db->query('SELECT master_filter.value_type, filter_table.filter_value, master_filter.filter_name, master_filter.id AS mid, filter_table.id AS fid FROM filter_table JOIN product_ids ON filter_table.product_id = product_ids.product_id RIGHT JOIN master_filter ON filter_table.filter_id = master_filter.id AND product_ids.product_id = '.$fr->product_id)->result();
		}
		// print_r($filters_data_set);
		$filters_data_set['filter_data'] = $dat;
		$this->load->view('admin/product_details', $filters_data_set);
	}

	public function add_form(){
		$this->db->order_by('priority', 'ASC');
		$res = $this->db->get('master_filter')->result();
		foreach ($res as $value) {
			$data[$value->id] = $this->db->query('SELECT master_filter.id, master_filter.filter_name, master_filter.value_type, master_filter.id, filter_table.filter_id, GROUP_CONCAT(DISTINCT(filter_table.filter_value)) AS filter_value FROM filter_table JOIN master_filter ON filter_table.filter_id = master_filter.id WHERE filter_table.filter_value != "" AND filter_id = '.$value->id)->result();
		}

		$result_arr['type'] = $this->db->query("SELECT type FROM  `certificate_type`")->result_array();
		$customer = $this->db->get('customer')->result();
		$result_arr['customer'] = $customer;
		$result_arr['data'] = $data;
		$this->load->view('admin/add_form', $result_arr);
	}

	public function filter_item(){
		$this->db->order_by('priority', 'ASC');
		$res = $this->db->get('master_filter')->result();
		foreach ($res as $value) {
			$data[$value->id] = $this->db->query('SELECT master_filter.id, master_filter.filter_name, master_filter.value_type, master_filter.id, filter_table.filter_id, GROUP_CONCAT(DISTINCT(filter_table.filter_value)) AS filter_value FROM filter_table JOIN master_filter ON filter_table.filter_id = master_filter.id WHERE filter_table.filter_value != "" AND filter_id = '.$value->id)->result();
		}
		$result_arr['customer'] = $this->db->get('customer')->result();
		$result_arr['data'] = $data;


		$this->load->view('admin/filter', $result_arr);
	}

	public function filter_data(){
		$product_id = $this->input->post('id');
		$input_val = '';
		$filters = $this->db->get('master_filter')->result();
		$customer_name = $this->input->post('customer_name');
		$bill = $this->input->post('bill_status');
		// echo "product_id: ".$product_id;exit();
		if ($product_id =="") {
			$string = "SELECT product_id FROM filter_table where product_id !=0 AND product_id !=''";
		}else {
			$string = "SELECT product_id FROM filter_table where product_id =".$product_id;
		}

		//print_r($filters);exit();
		// foreach ($filters as $f){
		$started = FALSE;
		$count = count($filters);
		for ($i=0; $i < $count; $i++) {
			// $id = $f->id;
			$id = $filters[$i]->id;
			$value_type = $filters[$i]->value_type;
			if ($value_type == 'Dropdown') {
				// $input_str = 'master_dropdown_'.$f->id;
				$input_str = 'master_dropdown_'.$id;
				$input_val = $this->input->post($input_str);
				if ($input_val != 'SELECT') {
					if ($started==FALSE) {
						$string .= " AND ( (filter_id='".$id."' AND filter_value = '".$input_val."')";
						$started = TRUE;
					} else if ($started==TRUE) {
						$string .= " OR (filter_id='".$id."' AND filter_value = '".$input_val."')";
					}
				}
			} elseif ($value_type == 'Textbox') {
				$input_str = 'master_txt_'.$id;
				$input_val = $this->input->post($input_str);
				if ($input_val) {
					if ($started==FALSE) {
						$string .= " AND ( (filter_id='".$id."' AND filter_value = '".$input_val."')";
						$started = TRUE;
					} else if ($started==TRUE) {
						$string .= " OR (filter_id='".$id."' AND filter_value = '".$input_val."')";
					}
					// $string .= " AND filter_id='".$id."' AND filter_value = '".$input_val."'";
		        }

			} elseif ($value_type == 'Decimal') {
				$input_str = 'master_txt_'.$id;
				$input_val = $this->input->post($input_str);
				// $input_val2 = $this->input->post($input_str_upper);
				if ($input_val) {
					if ($started==FALSE) {
						$string .= " AND ( (filter_id='".$id."' AND filter_value = '".$input_val."')";
						$started = TRUE;
					} else if ($started==TRUE) {
						$string .= " OR (filter_id='".$id."' AND filter_value = '".$input_val."')";
					}
					// $string .= " AND filter_id='".$id."' AND filter_value = '".$input_val."'";
	            }
			} else if($customer_name != ''){
					$string .= " AND (filter_id='29' AND filter_value = '".$customer_name."')";
			// } else if($bill != ''){
			// 		$string .= " AND (filter_id='30' AND filter_value = '".$bill."')";
			}
		}
		if ($started==TRUE) {
			$string .= ")";
		}
		$string.=" GROUP BY product_id";
		// echo $string;exit();
		$filters_data_set = $this->db->query($string)->result();
		// $customer_name = $this->input->post('customer_name');
		// $bill = $this->input->post('bill_status');
		// print_r($customer_name);exit();
		if (count($filters_data_set)>0 ) {
			$data['filterData'] = $filters_data_set;
			// echo(count($data['filterData']) . "<br>");print_r($data['filterData']);exit();
		    $this->load->view('admin/filter_view', $data);
		}else{
            echo "<script type='text/javascript'>alert('enter valid value');</script>";
            $this->filter_item();
            // redirect('admin/filter_item');
		}
		// print_r($filters_data_set);exit();
	}

    public function certificate($item_id){
    	$id = array();
    	$odd_certificate_image = array();
		$even_certificate_image = array();
    	$type = '';
		if (strpos($item_id, ',') == true) {
			$a = explode(',',$item_id);
			foreach ($a as $key => $val) {
			 array_push($id,$val);
			}
		}else {
			array_push($id,$item_id);
		}
    	$certificate_data['id'] = $id;
        foreach ($id as  $value) {
        	$data[$value] = $this->db->query("SELECT master_filter.value_type, filter_table.filter_value, master_filter.filter_name, master_filter.id AS mid, filter_table.id AS fid FROM filter_table JOIN product_ids ON filter_table.product_id = product_ids.product_id RIGHT JOIN master_filter ON filter_table.filter_id = master_filter.id AND product_ids.product_id = '".$value."' ORDER BY master_filter.priority ASC")->result();
        }
        foreach ($data as $key => $value) {
        	foreach ($value as $k => $val) {
        		if ($val->mid == 4) {
        			$type .= "'".$val->filter_value."'".",";
        			$image = $this->db->query("SELECT * FROM certificate_type WHERE type='$val->filter_value'")->row();
        			$data[$key][$k]->certificate_image = $image->certificate_image;
        		}
        	}
        }
        $type1 = rtrim($type, ",");
        $certificate_image = $this->db->query("SELECT certificate_image FROM certificate_type WHERE type IN(".$type1.")")->result();
		// foreach($certificate_image as $key => $value) {
		// if ($key % 2 == 0) {
		// 	array_push($even_certificate_image, $value->certificate_image);
		// 	// $even_certificate_image[] = $value;
		// 	} else {
		// 		array_push($odd_certificate_image, $value->certificate_image);
		// 		// $odd_certificate_image[] = $value;
		// 	}
		// }
        $certificate_data['data'] = $data;
        // echo "<pre>";
        // print_r($certificate_data);exit();
        // $certificate_data['odd_certificate_image'] = $odd_certificate_image ;
        // $certificate_data['even_certificate_image'] = $even_certificate_image ;
        // $certificate_data['background_image'] = $certificate_image;
        // print_r($odd_certificate_image);
        // echo "<br>";
        // print_r($even_certificate_image);
        // print_r($certificate_data);exit();
        // $this->load->view('admin/certificate',$certificate_data);
        header("Content-type: application/pdf");
		// header("Content-Disposition:attachment;filename={$id}.pdf");
		// header("Content-type: application/force-download");
		$this->load->library('pdf');
		$this->pdf->set_base_path(realpath(FCPATH));
		$custompaper = array(0,0,575,830);
		$this->pdf->set_paper($custompaper);
		$this->pdf->load_view('admin/certificate',$certificate_data);
		$this->pdf->render();
		echo $this->pdf->output();
    }

    public function label($item_id){
    	$id = array();
		if (strpos($item_id, ',') == true) {
			$a = explode(',',$item_id);
			foreach ($a as $key => $val) {
			 array_push($id,$val);
			}
		}else {
			// echo $value;
			array_push($id,$item_id);
		}
    	$certificate_data['id'] = $id;
        foreach ($id as  $value) {
        	// $data[$value] = $this->db->query("SELECT master_filter.value_type, filter_table.filter_value, master_filter.filter_name, master_filter.id AS mid, filter_table.id AS fid FROM filter_table JOIN product_ids ON filter_table.product_id = product_ids.product_id RIGHT JOIN master_filter ON filter_table.filter_id = master_filter.id AND product_ids.product_id = '".$value."' ORDER BY master_filter.priority ASC")->result();
        	$data[$value] = $this->db->query('SELECT * FROM filter_table WHERE product_id = '.$value.' AND filter_id IN (4,5,6,7,20,22)')->result();
        }

        $certificate_data['data'] = $data ;
        // print_r($data);exit();
         // $this->load->view('admin/search_label',$certificate_data);
        header("Content-type: application/pdf");
		// header("Content-Disposition:attachment;filename={$id}.pdf");
		// header("Content-type: application/force-download");
		$this->load->library('pdf');
		$this->pdf->set_base_path(realpath(FCPATH));
		$custompaper = array(0,0,575,830);
		$this->pdf->set_paper($custompaper);
		$this->pdf->load_view('admin/search_label',$certificate_data);
		$this->pdf->render();
		echo $this->pdf->output();


    }

    public function bill($item_id){
    	$id = array();
		if (strpos($item_id, ',') == true) {
			$a = explode(',',$item_id);
			foreach ($a as $key => $val) {
			 array_push($id,$val);
			}
		}else {
			// echo $value;
			array_push($id,$item_id);
		}
    	$certificate_data['id'] = $id;
        foreach ($id as  $value) {
        	$data[$value] = $this->db->query("SELECT master_filter.value_type, filter_table.filter_value, master_filter.filter_name, master_filter.id AS mid, filter_table.id AS fid FROM filter_table JOIN product_ids ON filter_table.product_id = product_ids.product_id RIGHT JOIN master_filter ON filter_table.filter_id = master_filter.id AND product_ids.product_id = '".$value."' ORDER BY master_filter.priority ASC")->result();
        }

        $certificate_data['data'] = $data ;
         // $this->load->view('admin/search_label',$certificate_data);
        //  header("Content-type: application/pdf");
		// // header("Content-Disposition:attachment;filename={$id}.pdf");
		// // header("Content-type: application/force-download");
		// $this->load->library('pdf');
		// $this->pdf->set_base_path(realpath(FCPATH));
		// $custompaper = array(0,0,600,800);
		// $this->pdf->set_paper($custompaper);
		// $this->pdf->load_view('admin/search_label',$certificate_data);
		// $this->pdf->render();
		// echo $this->pdf->output();


    }

	public function filter_details(){
        $dat='';
        $dat_multi='';
		$ids = $this->input->post('id');
		// print_r($ids);exit();
		$idString = '';

		foreach ($ids as $key => $value) {
			if($i=0) {
				$idString = "" . $value['product_id'] . "";
			} else {
				$idString = $idString . "" . $value['product_id'] . ",";
			}
			$i++;
		}

		$idString = rtrim($idString, ',');
		// echo $idString;
		// exit;

		$i = 0;
		// $this->db->where("product_id", $id);
		$filters_data_set['products'] = $this->db->query("SELECT * FROM product_ids WHERE product_id IN (".$idString.")")->result();
		// print_r($products);exit();
		$this->db->order_by('priority', 'ASC');
		$filters_data_set['master_filter'] = $this->db->get('master_filter')->result();
		foreach ($filters_data_set['products'] as $fr) {
			$dat[$fr->product_id] = $this->db->query("SELECT master_filter.value_type, filter_table.filter_value, master_filter.filter_name, master_filter.id AS mid, filter_table.id AS fid FROM filter_table JOIN product_ids ON filter_table.product_id = product_ids.product_id RIGHT JOIN master_filter ON filter_table.filter_id = master_filter.id AND product_ids.product_id = '".$fr->product_id."' ORDER BY master_filter.priority ASC")->result();

		}
		$filters_data_set['filter_data'] = $dat;
		$filters_data_set['images'] = $dat_multi;
		echo json_encode($filters_data_set);
	}

    public function filter_data_submit(){
    	$selected_column = $this->input->post('selected_column');
    	$selected_item = $this->input->post('selected_item');
    	$selected_column_string = '';
    	// echo json_encode($selected_column);
    	foreach ($selected_column as $key => $value) {
    		$selected_column_string .= "'" . $value[0] . "',";
    	}
    	$selected_column_string = rtrim($selected_column_string, ',');
    	// echo $selected_column_string;
    	// exit();
        $data1 = array();
        $i = 0;
    	foreach ($selected_item as  $value) {
    		$data12 = $this->db->query("SELECT master_filter.value_type, filter_table.filter_value, master_filter.filter_name, master_filter.id AS mid, filter_table.id AS fid FROM filter_table JOIN product_ids ON filter_table.product_id = product_ids.product_id RIGHT JOIN master_filter ON filter_table.filter_id = master_filter.id AND product_ids.product_id = '" . $value . "' WHERE master_filter.filter_name IN (" . $selected_column_string . ") ORDER BY master_filter.priority ASC")->result_array();
    		// echo "sql: ". $this->db->last_query() ."<br>";
         	$data[$i++] = array(
         		'Id' => $value,
         		'datas' => $data12
         	);
    	}
    	$this->session->set_userdata('data', $data);
    	$this->session->set_flashdata('data', $data);
		echo json_encode($data);
	 }



	public function load_multiple_image($id){
			$this->db->where(array('product_id' => $id, 'filter_id' => '48'));
			$data['all_multiple'] = $this->db->get('filter_table')->result();
			$data['product_id'] = $id;
			// echo "<pre>";
			// print_r($data);
			// echo "</pre>";
			$this->load->view('admin/add_multiple',$data);
		}

	public function update_images($ids){
		$this->db->where(array('product_id' => $ids, 'filter_id' => '48'));
		$data_filter = $this->db->get('filter_table')->result();
		foreach ($data_filter as $data_values) {
			$id = "image_".$data_values->id;
			$idss = $data_values->id;
			//echo "<br>";
            	$config['upload_path'] = 'assets/muluploads/';
				$config['allowed_types'] = 'gif|jpg|png|jpeg';
				$config['encrypt_name'] = true;
				$this->load->library('upload');
				$this->upload->initialize($config);
            if (!empty($_FILES[$id]['name'])){
				if($this->upload->do_upload($id)){
					$pic_name = $this->upload->data();
					// $pic_name_ins = $pic_name["file_name"];
					$file_path     = $pic_name['file_path'];
				    $file         = $pic_name['full_path'];
				    $file_ext     = $pic_name['file_ext'];
				    $pic_name_ins = rand(10000, 99999).$file_ext;
				    rename($file, $file_path . $pic_name_ins);

					$data = array(
						'filter_value' => $pic_name_ins,
					);
					$this->db->where('id',$idss);
					$this->db->update('filter_table',$data);
					echo $this->db->last_query();
					echo "<br>";

				}else{
					die($this->upload->display_errors());
					exit;
				}
			}
		}
		redirect('admin/item');
	}

	public function upload_images($id){
		$image_crud = new image_CRUD();
		$image_crud->set_primary_key_field('product_id');
		$image_crud->set_url_field('url');
		$image_crud->set_table('product_images')
		->set_relation_field('product_id')
		->set_ordering_field('priority')
		->set_image_path('assets/uploads');

		$data = $image_crud->render();
		$this->load->view('admin/image_crud_view',$data);
	}

	public function add_images(){
		$res = $this->db->query("SELECT * FROM product_ids ORDER BY id DESC LIMIT 1")->row();
		redirect('admin/upload_images/'.$res->product_id);
	}


	public function upload_image($id){
		$image_crud = new image_CRUD();
		$image_crud->set_primary_key_field('product_id');
		$image_crud->set_url_field('url');
		$image_crud->set_table('product_images')
		->set_relation_field('product_id')
		->set_ordering_field('priority')
		->set_image_path('assets/uploads');

		$data = $image_crud->render();
		$this->load->view('admin/image_crud_view1',$data);
	}

	function _file_validator_images($files_to_upload,$field_info) {
		$type = $files_to_upload[$field_info->encrypted_field_name]['type'];
		$types = array('video/mp4');
		if (!in_array($type, $types)) {
			return 'Sorry, we can upload only jpeg/png here.';
		}
	}
     // done
	public function insert_productdetails(){
		$input_val = '';
		$product_id = $this->input->post('productids');
		$customer = $this->input->post('customer_name');
		$customer_name = $this->db->query('SELECT * from customer WHERE id ='.$customer)->result_array();
		// print_r($customer_name);
		// echo $customer_name[0]['name'];
		$bill = $this->input->post('bill');
		// $data1 = array(
		// 				'name' => $customer_name[0]['name'],
		// 	            'email' => $customer_name[0]['email'],
		// 				'bill' => $bill,
		// 				'item_id' => $product_id
		// 			);
		// // $this->db->where("id", $customer);
		// $this->db->insert('customer', $data1);

		$filters = $this->db->get('master_filter')->result();
		foreach ($filters as $f){
			$input_str = 'master_dropdown_'.$f->id;
			$input_str_txt = 'master_dropdown_'.$f->id.'_txt';
			if ($f->value_type == 'Dropdown') {
				if ($this->input->post($input_str_txt) == '') {
					$input_val = $this->input->post($input_str);
				} else {
					$input_val = $this->input->post($input_str_txt);
				}
				$data = array(
						'filter_value' => $input_val,
						'product_id'   => $product_id,
						'filter_id'    => $f->id,
					);
				$this->db->insert('filter_table', $data);
			} elseif ($f->value_type == 'Textbox' ) {
				if ($f->id == 29) {
					$data = array(
						'filter_value' => $customer_name[0]['name'],
						'product_id'   => $product_id,
						'filter_id'    => $f->id,
					);
				    $this->db->insert('filter_table', $data);
				}elseif ($f->id == 30) {
					$data = array(
						'filter_value' => $bill,
						'product_id'   => $product_id,
						'filter_id'    => $f->id,
					);
				    $this->db->insert('filter_table', $data);
				}else{
					$input_str = 'master_txt_'.$f->id;
					$input_val = $this->input->post($input_str);
					$data = array(
							'filter_value' => $input_val,
							'product_id'   => $product_id,
							'filter_id'    => $f->id,
						);
					$this->db->insert('filter_table', $data);
			    }
			}elseif ($f->value_type == 'Decimal' ) {
				$input_str = 'master_txt_'.$f->id;
				$input_val = $this->input->post($input_str);
				$data = array(
						'filter_value' => $input_val,
						'product_id'   => $product_id,
						'filter_id'    => $f->id,
					);
				$this->db->insert('filter_table', $data);
			}else if($f->value_type == "Image"){
				$ids = "master_img_".$f->id;
		 		$config['upload_path'] = 'assets/uploads/';
		 		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		 		// $config['encrypt_name'] = true;
		 		$this->load->library('upload');
		 		$this->upload->initialize($config);
             	if (!empty($_FILES[$ids]['name'])){
		 			if($this->upload->do_upload($ids)){
		 				$pic_name = $this->upload->data();
		 				// print_r($pic_name);
		 				$pic_name_ins = $pic_name["file_name"];
		 				$file_path     = $pic_name['file_path'];
				        $file         = $pic_name['full_path'];
				        $file_ext     = $pic_name['file_ext'];
				        // $pic_name_ins = rand(10000, 99999).$file_ext;

		 				$data = array(
							'filter_value' => $pic_name_ins,
							'product_id'   => $product_id,
							'filter_id'    => $f->id,
						);
						$this->db->insert('filter_table', $data);
				 	}
				}
			}

		// $this->load->view('admin/item');
	  }
	  $data['id'] = $product_id;
	  $this->load->view('admin/after_insert',$data);
   }
   //done
	public function edit_image($id){
		//$this->db->where("filter_id", "48");
		$filter_id = array('48', '49', '50');
		$this->db->where("product_id", $id);
        $this->db->where_in('filter_id', $filter_id);
		$data['images_data'] = $this->db->get("filter_table")->result();
		// $data['images_data'] = $this->db->query("SELECT * FROM filter_table WHERE product_id =".$id." AND filter_id = 48 ")->result();
		$data['product_id'] = $id;
		$this->load->view("admin/edit_image", $data);
	}
    //done
	public function delete_images(){
		$id = $this->input->post("id");
		echo $id;
		if ($this->db->query("DELETE FROM filter_table WHERE id = ".$id."")) {
			echo "success";
		}
	}
    //done
	public function add_more_images(){
		$image_type = $this->input->post("image_type");
        $config['upload_path'] = 'assets/uploads/';
 		$config['allowed_types'] = 'gif|jpg|png|jpeg';
 		// $config['encrypt_name'] = true;
 		$this->load->library('upload');
 		$this->upload->initialize($config);

     	// if (!empty($_FILES['master_multi_48']['name'])){
 			if($this->upload->do_upload('master_multi_48')){
 				$pic_name = $this->upload->data();
 				// print_r($pic_name);
 				$pic_name_ins = $pic_name["file_name"];
 				$file_path     = $pic_name['file_path'];
		        $file         = $pic_name['full_path'];
		        $file_ext     = $pic_name['file_ext'];
		        // $pic_name_ins = rand(10000, 99999).$file_ext;
		        if ($image_type == 'certificate_image') {
		        	$data = array(
					'filter_value' => $pic_name_ins,
					'product_id'   => $this->input->post("product_id"),
					'filter_id'    => 48,
				);
		        } elseif ($image_type == 'image1') {
		        	$data = array(
					'filter_value' => $pic_name_ins,
					'product_id'   => $this->input->post("product_id"),
					'filter_id'    => 49,
				);
		        } else{
		        	$data = array(
					'filter_value' => $pic_name_ins,
					'product_id'   => $this->input->post("product_id"),
					'filter_id'    => 50,
				);
		        }
		       $this->db->insert('filter_table', $data);
		 	// }
		}else{
			echo 'alert("file upload again")';
		}
      $this->load->view('admin/product_details1');
	}

	public function set_upload_options(){
	    $config = array();
	    $config['upload_path'] = 'assets/uploads/';
	    $config['allowed_types'] = 'gif|jpg|png|jpeg';
	    $config['max_size']      = '0';
	    $config['overwrite']     = FALSE;

	    return $config;
	}

	/******** Admin API's start  ********/
     // done
	public function get_product_last_id(){
		$date = explode('-', $this->input->post('date'));
		// $carat =  explode('.', $this->input->post('carat'));
		$year_last_2_no = substr($date[0], 2);
		$chose_Date = $this->input->post('date');
		$this->db->where('date',$chose_Date);
		$data = $this->db->get('product_ids')->row();
		if(empty($data)){
			$datas = array(
					'date' =>$chose_Date,
					'month' => $date[1],
					'year' => $year_last_2_no,
					'carat' => $this->input->post('carat'),
					'id' => '0001',
				);
		} else {
			$auto_generated = $data->auto_generated_id;
			$datas = array(
					'date' => $chose_Date,
					'month' => $date[1],
					'year' => $year_last_2_no,
					'carat' =>  $data->carat,
					'id' => sprintf("%'.04d\n", $data->auto_generated_id + 1),
				);
		}
		 // $id = $this->db->query('SELECT MAX(id) AS id FROM product_ids')->row();

		header('Access-Control-Allow-Origin: *');
		echo json_encode($datas);
	}
     // done
	public function check_id_exists(){
        $this->db->where('product_id', $this->input->post('id'));
		$res = $this->db->get('product_ids');
		if($res->num_rows() > 0){
			$data = array(
					'product_id' => 'unsuccess',
			);
		} else {
			$data = array(
					'product_id' => $this->input->post('id'),
					'date' => $this->input->post('date'),
					'auto_generated_id' => $this->input->post('auto_generated_id'),
					'carat' => $this->input->post('carat'),
				);
			$this->db->insert('product_ids', $data);
		}
		header('Access-Control-Allow-Origin: *');
		echo json_encode($data);
	}
    // done
	public function item(){
		$this->load->view('admin/product_details1');
	}
    //done
	public function user_data($id){
		$this->db->order_by('priority', 'ASC');
		$res = $this->db->get('master_filter')->result();
		foreach ($res as $value) {
			$data[$value->id] = $this->db->query('SELECT master_filter.id, master_filter.filter_name, master_filter.value_type, master_filter.id, filter_table.filter_id, GROUP_CONCAT(DISTINCT(filter_table.filter_value)) AS filter_value FROM filter_table JOIN master_filter ON filter_table.filter_id = master_filter.id WHERE filter_table.filter_value != "" AND filter_id = '.$value->id)->result();
		}

		$res_val = $this->db->query("SELECT * FROM filter_table WHERE product_id = ".$id)->result();
		foreach ($res_val as $f_value) {
			$fdata[$f_value->filter_id] = array(
					'filter_value' => $f_value->filter_value,
				);
		}
		$result_arr['filter_value'] = @$fdata;
		$result_arr['data'] = $data;
		$result_arr['id'] = $id;
		$this->load->view('admin/add_item_form',$result_arr);
	}

	public function update_data($id){

		$data = $this->db->get('master_filter')->result();
		foreach ($data as $value){
			// echo $value->value_type;
			if($value->value_type == "Dropdown" ){
				$ids = "master_dropdown_".$value->id;
				$data = array(
						'filter_value' => $this->input->post($ids),
					);

				$this->db->where('product_id',$id);
				$this->db->where('filter_id',$value->id);
				$this->db->update('filter_table',$data);
			}
			else if($value->value_type == "Textbox"){
				$ids = "master_txt_".$value->id;
				$data = array(
						'filter_value' => $this->input->post($ids),
					);

				$this->db->where('product_id',$id);
				$this->db->where('filter_id',$value->id);
				$this->db->update('filter_table',$data);
			// }else if($value->value_type == "Image"){
			// 	$ids = "master_img_".$value->id;
		 // 		$config['upload_path'] = 'assets/uploads/';
		 // 		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		 // 		$config['encrypt_name'] = true;
		 // 		$this->load->library('upload');
		 // 		$this->upload->initialize($config);
   //           	if (!empty($_FILES[$ids]['name'])){
		 // 			if($this->upload->do_upload($ids)){
		 // 				$pic_name = $this->upload->data();
		 // 				// $pic_name_ins = $pic_name["file_name"];
		 // 				$file_path     = $pic_name['file_path'];
			// 	        $file         = $pic_name['full_path'];
			// 	        $file_ext     = $pic_name['file_ext'];
			// 	        $pic_name_ins = time().$file_ext;
			// 	        rename($file, $file_path . $pic_name_ins);

		 // 				$data = array(
		 // 					'filter_value' => $pic_name_ins,
		 // 				);
			// 			$this->db->where('product_id',$id);
			// 			$this->db->where('filter_id',$value->id);
			// 			$this->db->update('filter_table',$data);
			// 			echo $this->db->last_query();
			// 			echo "<br>";
			// 	 	}
			// 	}
			}
		}

		redirect('admin/item');
	}

	public function get_product_details(){
		$i = 0;
		$filters_data_set['products'] = $this->db->get('product_ids')->result();
		$this->db->order_by('priority', 'ASC');
		$filters_data_set['master_filter'] = $this->db->get('master_filter')->result();
		foreach ($filters_data_set['products'] as $fr) {
			$dat[$fr->product_id] = $this->db->query("SELECT master_filter.value_type, filter_table.filter_value, master_filter.filter_name, master_filter.id AS mid, filter_table.id AS fid FROM filter_table JOIN product_ids ON filter_table.product_id = product_ids.product_id RIGHT JOIN master_filter ON filter_table.filter_id = master_filter.id AND product_ids.product_id = '".$fr->product_id."' ORDER BY master_filter.priority ASC")->result();
		}
		$filters_data_set['filter_data'] = $dat;
		echo json_encode($filters_data_set);
	}
    // done
	public function view_item($product_id){
		$this->db->where('product_id', $product_id);
		$filters_data_set['products'] = $this->db->get('product_ids')->result();
		$this->db->order_by('priority', 'ASC');
		$filters_data_set['master_filter'] = $this->db->get('master_filter')->result();
		foreach ($filters_data_set['products'] as $fr) {
			$dat[$fr->product_id] = $this->db->query("SELECT master_filter.value_type, filter_table.filter_value, master_filter.filter_name, master_filter.id AS mid, filter_table.id AS fid FROM filter_table JOIN product_ids ON filter_table.product_id = product_ids.product_id RIGHT JOIN master_filter ON filter_table.filter_id = master_filter.id AND product_ids.product_id = '".$fr->product_id."' ORDER BY master_filter.priority ASC")->result();
		}

		$filters_data_set['filter_data'] = $dat;
		$this->load->view('admin/view_items', $filters_data_set);
	}
     // done
	public function delete_item($product_id){
		$this->db->query("DELETE FROM product_ids WHERE product_id ='".$product_id."'");
		redirect('admin/item');
	}

	public function print_certificate($id){
		$type = '';
		$certificate_data['id'] = $id;
		$certificate_data['data'] = $this->db->query("SELECT * FROM filter_table WHERE product_id = ".$id)->result();
		foreach ($certificate_data['data'] as  $value) {
			if ($value->filter_id == 4) {
				$type = $value->filter_value;
			}
		}
		$certificate_image = $this->db->query("SELECT * FROM certificate_type WHERE type = "."'".$type."'")->result();
		$certificate_data['background_image'] = $certificate_image[0]->certificate_image;
		// $this->load->view('admin/add_item_certificate',$certificate_data);

		// $this->load->library('pdf');
		// $this->pdf->load_view('admin/certificate',$certificate_data);
		// $this->pdf->render();
		// $output = $this->pdf->output();
		// $file_to_save = './assets/uploads/pdf/'.$id.'.pdf';
		// file_put_contents($file_to_save, $output);


		header("Content-type: application/pdf");
		// header("Content-Disposition:attachment;filename={$id}.pdf");
		// header("Content-type: application/force-download");
		$this->load->library('pdf');
		$this->pdf->set_base_path(realpath(FCPATH));
		$custompaper = array(0,0,575,830);
		$this->pdf->set_paper($custompaper);
		$this->pdf->load_view('admin/add_item_certificate',$certificate_data);
		$this->pdf->render();
		echo $this->pdf->output();
	}

	public function print_label($id){
		$label_data['id'] = $id;
		$label_data['label_data'] = $this->db->query("SELECT * FROM filter_table WHERE product_id = ".$id." AND filter_id IN (4,5,6,7,20,22)")->result();
		// echo("<pre>");
		// print_r($label_data);exit();
		// $this->load->view('admin/add_item_label',$label_data);
		header("Content-type: application/pdf");
		// header("Content-Disposition:attachment;filename={$id}.pdf");
		// header("Content-type: application/force-download");
		$this->load->library('pdf');
		$this->pdf->set_base_path(realpath(FCPATH));
		$custompaper = array(0,0,180,220);
		$this->pdf->set_paper($custompaper);
		$this->pdf->load_view('admin/add_item_label',$label_data);
		$this->pdf->render();
		echo $this->pdf->output();
	}

	public function print_bill($id){
		//echo "<pre>";
		$bill_data = array();
		$ids = explode(',',$id);
		foreach ($ids as $key => $value) {
			$sql = "SELECT * FROM filter_table WHERE product_id = ".$value." AND filter_id = 4";
			$data = $this->db->query($sql)->result();
			$sql1 = "SELECT * FROM filter_table WHERE product_id = ".$value." AND filter_id = 7";
			$drill_data = $this->db->query($sql1)->result();
			
			foreach ($data as $key => $val) {
				// print_r($val);
				$sql = "SELECT * FROM certificate_type WHERE type = '" . $val->filter_value . "'";
				$certificate_type = $this->db->query($sql)->row();
				$customer_name = $this->db->query("SELECT * FROM filter_table WHERE product_id = ".$value." AND filter_id = 29")->result();

				$certificate_type->product_id = $value;
				foreach ($drill_data as $key => $val1) {
					$certificate_type->drill = $val1->filter_value;
				}
				foreach ($customer_name as $key => $val2) {
					$certificate_type->customer_name = $val2->filter_value;
				}
				array_push($bill_data, $certificate_type);
			}
		}
		
		//print_r($bill_data);
		$data['data'] = $bill_data;
		$this->load->view('admin/before_bill_form',$data);
	}

	public function pdf_html($id){
		$certificate_data['id'] = $id;
		$certificate_data['data'] = $this->db->query("SELECT * FROM filter_table WHERE product_id = ".$id)->result();
		$this->load->view('admin/label',$certificate_data);
	}

	public function pdftest(){
		$certificate_data['id'] = '0500011622';
		$certificate_data['data'] = $this->db->query("SELECT * FROM filter_table WHERE product_id = 0500011622")->result();
        // $culture ='fresh culture';
		header("Content-type: application/pdf");
		// header("Content-Disposition:attachment;filename=test.pdf");
		// header("Content-type: application/force-download");
		$this->load->library('pdf');
		$this->pdf->set_base_path(realpath(FCPATH));
		$custompaper = array(0,0,575,830);
		$this->pdf->set_paper($custompaper);
		$this->pdf->load_view('admin/pdf_certificate',$certificate_data);
		/*if ( $culture == 'culture') {
			$this->pdf->load_view('admin/culture',$certificate_data);
		} elseif ($culture == 'fresh culture') {
			$this->pdf->load_view('admin/fresh_culture',$certificate_data);
		}elseif ( $culture == 'fresh natural') {
			$this->pdf->load_view('admin/fresh_natural',$certificate_data);
		}elseif ( $culture == 'real') {
			$this->pdf->load_view('admin/real',$certificate_data);
		}elseif ( $culture == 'blister natural') {
			$this->pdf->load_view('admin/blister_natural',$certificate_data);
		}else{
			$this->pdf->load_view('admin/imitation',$certificate_data);
		}*/


		$this->pdf->render();
		echo $this->pdf->output();
	}

	public function test(){
		$certificate_data['id'] = '0500011622';
		$certificate_data['data'] = $this->db->query("SELECT * FROM filter_table WHERE product_id = 0500011622")->result();
		$this->load->view('admin/pdf_certificate',$certificate_data);
		// header("Content-type: application/pdf");
		// header("Content-Disposition:attachment;filename=test.pdf");
		// header("Content-type: application/force-download");
		// $this->load->library('pdf');
		// $this->pdf->set_base_path(realpath(FCPATH));
		// $custompaper = array(0,0,1000,1000);
		// $this->pdf->set_paper($custompaper);
		// $this->pdf->load_view('admin/test',$certificate_data);
		// $this->pdf->render();
		// echo $this->pdf->output();
	}


	public function invoice(){
	  // $this->load->view('admin/invoice');
		header("Content-type: application/pdf");
		// header("Content-Disposition:attachment;filename=test.pdf");
		// header("Content-type: application/force-download");
		$this->load->library('pdf');
		$this->pdf->set_base_path(realpath(FCPATH));
		$custompaper = array(0,0,1000,1000);
		$this->pdf->set_paper($custompaper);
		$this->pdf->load_view('admin/invoice');
		$this->pdf->render();
		echo $this->pdf->output();
	}

	public function pdf_test(){
		$certificate_data['id'] = '0500011622';
		$certificate_data['data'] = $this->db->query("SELECT * FROM filter_table WHERE product_id = 0500011622")->result();
		header("Content-type: application/pdf");
		$this->load->library('pdf');
		$this->pdf->set_base_path(realpath(FCPATH));
		$custompaper = array(0,0,575,830);
		$this->pdf->set_paper($custompaper);
		$this->pdf->load_view('admin/certificate_view',$certificate_data);
		$this->pdf->render();
		echo $this->pdf->output();
	}
}
/* End of file welcome.php */
/* Location: ./application/controllers/Admin.php */
