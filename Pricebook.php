<?php
class Pricebook extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$this->common_model->check_login();

		$this->load->model("pricebook_model");
	}

	public function listPriceBook(){

		$data['page_name']='List Price Book';
		$data['sub_page']='pricebook/listPricebook';
		$config['base_url'] = base_url()."pricebook/listPriceBook"; 
		$config['total_rows'] = $this->common_model->getTotalRecords('tbl_pricebook','');
		$config['per_page'] = PAGINATION_COUNT; 
		$config=$this->common_model->paginationStyle($config);
		$this->pagination->initialize($config); 
		$lmt=0;
		$lmt=$this->uri->segment(3);
		
		$data['price_book'] = $this->pricebook_model->GetPriceBookList($config['per_page'],$lmt);
		$this->load->view('user_index',$data);
	}

	public function viewPricebookList($id){
		$id=$this->common_model->decode($id);
        $data['page_name']='List Price Book';
		$data['sub_page']='pricebook/viewPricebookList';

		$data['price_booklist'] = $this->pricebook_model->ViewPriceBookListById($id);
		$this->load->view('user_index',$data);
	
	}
	public function addPriceBook(){
        $data['page_name']='Add Price Book';
		$data['sub_page']='pricebook/addPriceBook';
		$data['price_book']=$this->pricebook_model->getPriceBookDet();
		$data['price_book_list']=$this->pricebook_model->GetPriceBookListDetail();
		$count=$this->common_model->get_general_settings('Pricebook_Count');
		
		$this->load->view('user_index',$data);
    }
    public function createPriceBook()
    {
    	if(isset($_POST['PriceBook_Inv']))
    	{
    		$price_book_name=$this->security->xss_clean($this->input->post('price_book_name'));
    		$price_book_code=$this->security->xss_clean($this->input->post('price_book_code'));
    		$scheme_code=$this->security->xss_clean($this->input->post('scheme_code'));
    		$description=$this->security->xss_clean($this->input->post('description'));

    		$last_table_count=$this->security->xss_clean($this->input->post('last_table_count'));

    		$pricebook_snum=$this->security->xss_clean($this->input->post('pricebook_snum'));
    		$pricebook_SKU=$this->xss_clean($this->input->post('pricebook_SKU'));
    		$product_name=$this->xss_clean($this->input->post('product_name'));
    		$HSN_code=$this->xss_clean($this->input->post('HSN_code'));

    		$MRP_pb=$this->security->xss_clean($this->input->post('MRP_pb'));
    		$discount_pb=$this->security->xss_clean($this->input->post('discount_pb'));
    		
    		$damage_discount_pb=$this->security->xss_clean($this->input->post('damage_discount_pb'));
    		$DP_pb=$this->security->xss_clean($this->input->post('DP_pb'));
    		$BV_pb=$this->security->xss_clean($this->input->post('BV_pb'));
    		    		   		
    		
    		$i=0;$len=count($pricebook_snum);

    		$count=$this->common_model->get_general_settings('Pricebook_Count');
    		$price_book_code=$this->common_model->generate_emp_code($count->Description,PREFIX_LENGTH,3);
    		
    		$price_book=array(
    			'pricebookName'=>$price_book_name,
    			'pricebookCode'=>$price_book_code,
    			'schemeCode'=>$scheme_code,
    			'pricebookDescription'=>$description,
    			
				);
    			$pricebookId= $this->pricebook_model->insertPriceBook($price_book);

    			for($i=0;$i<$len;$i++){
    				$pricebooklist=array(
    			'Snum'=>$pricebook_snum,
				'MRP'=>$MRP_pb[$i],
				'discount'=>$discount_pb[$i],
				'DPPrice'=>$DP_pb[$i],
				'damageDiscount'=>$damage_discount_pb[$i],
				'BV'=>$BV_pb[$i],		
				'Sku'=>$product_SKU[$i],
				'productName'=>$product_name[$i],
				'HSNCode'=>$HSN_code[$i],
				'createdBy'=>$this->session->userdata('user_id'),
				'createdAt'=>date('Y-m-d h:i:s'),	
    		);
    		$this->pricebook_model->insertPriceBookList($pricebooklist);
    	}
    	
    		$this->common_model->updateEmpCount('Pricebook_Count');
			$this->session->set_flashdata('success','PriceBook Created Successfully');
            redirect(base_url().'Pricebook/listPriceBook');
        }
		 else {
			$this->session->set_flashdata('error','Invalid Request');
            redirect(base_url().'Pricebook/listPriceBook');
		}

    	}
	
}