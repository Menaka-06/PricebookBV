<?php
class Ajax extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->model('product_model');
		$this->load->model('openingstock_model');
		$this->load->model('common_model');
		$this->load->model('saleinvoice_model');
		$this->load->model('pricebook_model');
	}


	public function SelectCategoryFromSubCat(){
		$resp=array('status'=>false,'data'=>"");
		$cat_id=$this->input->post('cat_id');
		$sub_cat=$this->product_model->getActiveMaterialSubCategory($cat_id);
		if(!empty($sub_cat)){
			$resp=array('status'=>true,'data'=>$sub_cat);
		}
		echo json_encode($resp);
	}


	public function SelectSubCatFromGroup(){
		$resp=array('status'=>false,'data'=>"");
		$sub_cat_id=$this->input->post('sub_cat_id');
		$sub_cat=$this->product_model->getActiveGroup($sub_cat_id);
		if(!empty($sub_cat)){
			$resp=array('status'=>true,'data'=>$sub_cat);
		}
		echo json_encode($resp);
	}

	public function getMobileNo(){
		$resp=array('status'=>false,'data'=>"");
		$user_id=$this->input->post('user_id');
		$user_details=$this->directseller_model->getMobileNoByID($user_id);
		if(!empty($user_details)){
			$resp=array('status'=>true,'data'=>$user_details);
		}
		echo json_encode($resp);
	}

	public function getEmailId(){
		$resp=array('status'=>false,'data'=>"");
		$user_id=$this->input->post('user_id');
		$user_details=$this->directseller_model->getEmailByID($user_id);
		if(!empty($user_details)){
			$resp=array('status'=>true,'data'=>$user_details);
		}
		echo json_encode($resp);
	}

	public function getProductbyGroup(){
		$resp=array('status'=>true,'data'=>'<tr><td colspan="9" align="center">No Records Found</td></tr>','msg'=>false);
		$group=$this->input->post('group');
		$product_details=$this->openingstock_model->getProductBasedOnGroup($group);
		$opening_stock='';
		$i=0;
		if(!empty($product_details)){
			foreach($product_details as $PRD){
				$opening_stock.='<tr>';
				$opening_stock.='<td><input type="checkbox" value="'.$i.'" name="product_sel_id[]" id="product_sel_id_'.$i.'" ></td>';
				$opening_stock.='<td><p>'.$PRD->productCode .'</p>
				<input type="hidden" name="product_id[]" id="product_id_'.$i.'" value="'.$PRD->id.'">
				<input type="hidden" name="product_code[]" id="product_code_'.$i.'" value="'.$PRD->productCode.'">  
				<input type="hidden"  name="product_name[]" id="product_name_'.$i.'" value="'.$PRD->productName.'"> 
				<input type="hidden" id="product_sku_'.$i.'" name="product_sku[]" value="'.$PRD->Sku.'">
				<input type="hidden" id="product_hsncode_'.$i.'" name="product_hsncode[]" value="'.$PRD->HSNCode.'">
				<input type="hidden" id="product_group_'.$i.'" name="product_group[]" value="'.$PRD->group_name.'">
				<input type="hidden" id="product_uom_'.$i.'" name="product_uom[]" value="'.$PRD->unit_of_measure.'">
				</td>';
				$opening_stock.='<td><p>'.$PRD->Sku.'</p></td>';
				$opening_stock.='<td><p>'.$PRD->productName.'</p></td>';
				$opening_stock.='<td><p>'.$PRD->HSNCode.'</p></td>';
				$opening_stock.='<td><input type="text" name="batch_no[]" id="batch_no_'.$i.'" class="form-control"></td>';
				$opening_stock.='<td><input type="text" name="control_no[]" id="control_no_'.$i.'" class="form-control"></td>';
				$opening_stock.='<td><input type="date" name="expiry[]" id="expiry_'.$i.'" class="form-control"></td>';
				$opening_stock.='<td><input type="text" onkeypress="return event.charCode > 47 && event.charCode < 58;" name="quantity[]" id="quantity_'.$i.'" class="form-control"></td>';
				$opening_stock.='</tr>';
				$i++;
			}

			$resp=array('status'=>true,'data'=>$opening_stock,'msg'=>true);
		}
		echo json_encode($resp);
	}


	public function getPriceBookbyId(){
		$resp=array('status'=>true,'data'=>'<tr><td colspan="9" align="center">No Records Found</td></tr>','msg'=>false);
		$price_book=$this->input->post('pricebookCode');
		$pricebook_details=$this->pricebook_model->getPriceBookBasedOnId($price_book);
		$price_book='';
		$i=0;
		if(!empty($pricebook_details)){
			foreach($pricebook_details as $PB){
				$price_book.='<tr>';
				$price_book.='<td><input type="checkbox" value="'.$i.'" name="pricebook_sel_id[]" id="pricebook_sel_id_'.$i.'" ></td>';
				$price_book.='<td><p>'.$PB->pricebookCode .'</p>
				<input type="hidden" name="pricebook_Code[]" id="pricebook_Code_'.$i.'" value="'.$PB->pricebookCode.'">

				<input type="hidden" name="product_sku[]" id="product_sku_'.$i.'" value="'.$PB->Sku.'">  
				<input type="hidden"  name="pricebook_name[]" id="pricebook_name_'.$i.'" value="'.$PB->pricebookName.'"> 

				
				<input type="hidden" id="product_hsncode_'.$i.'" name="product_hsncode[]" value="'.$PB->HSNCode.'">
				<input type="hidden" id="price_booklist_mrp_'.$i.'" name="price_booklist_mrp[]" value="'.$PB->MRP.'">
				<input type="hidden" id="price_booklist_discount_'.$i.'" name="price_booklist_discount[]" value="'.$PB->discount.'">
				<input type="hidden" id="price_booklist_damage_discount_'.$i.'" name="price_booklist_damage_discount[]" value="'.$PB->damageDiscount.'">
				<input type="hidden" id="price_booklist_dprice_'.$i.'" name="price_booklist_dpprice[]" value="'.$PB->DPPrice.'">
				<input type="hidden" id="price_booklist_bv_'.$i.'" name="price_booklist_bv[]" value="'.$PB->bv.'">


				</td>';
				$price_book.='<td><p>'.$PB->Sku.'</p></td>';
				$price_book.='<td><p>'.$PB->pricebookName.'</p></td>';
				$price_book.='<td><p>'.$PB->HSNCode.'</p></td>';
				$price_book.='<td><input type="text" name="pricebook_mrp[]" id="pricebook_mrp_'.$i.'" class="form-control"></td>';
				$price_book.='<td><input type="text" name="pricebook_discount[]" id="pricebook_discount_'.$i.'" class="form-control"></td>';
				$price_book.='<td><input type="text" name="pricebook_damage_discount[]" id="pricebook_damage_discount_'.$i.'" class="form-control"></td>';
				$price_book.='<td><input type="text" name="dpprice[]" id="dpprice_'.$i.'" class="form-control"></td>';
				$price_book.='<td><input type="text" name="pricebook_bv[]" id="pricebook_bv_'.$i.'" class="form-control"></td>';
				
				
				
				$price_book.='</tr>';
				$i++;
			}

			$resp=array('status'=>true,'data'=>$price_book,'msg'=>true);
		}
		echo json_encode($resp);
	}


	public function getCustomerByCustomerType(){
		$resp=array('status'=>false,'data'=>"");
		$customer_type=$this->input->post('customer_type');
		$customer=$this->common_model->getCustomerByCustomerType($customer_type);
		if(!empty($customer)){
			$resp=array('status'=>true,'data'=>$customer);
		}
		echo json_encode($resp);
	}

	public function getDistributerDetails(){
		$resp=array('status'=>false,'data'=>"");
		$distributer_id=$this->input->post('distributer_id');
		$distributer=$this->saleinvoice_model->getDistributerBillingDetails($distributer_id);
		if(!empty($distributer)){
			$resp=array('status'=>true,'data'=>$distributer);
		}
		echo json_encode($resp);
	}

	public function getProductbyCustomer(){
		$resp=array('status'=>true,'data'=>'<tr><td colspan="9" align="center">No Records Found</td></tr>','msg'=>false);
		$customer=$this->input->post('customer');
		$tax_type=$this->input->post('tax_type');

		$product_details=$this->saleinvoice_model->getProductBasedOncustomer($customer);
		$opening_stock='';
		$i=0;$cgst=$sgst=$igst=$cgst_amount=$sgst_amount=$igst_amount=0;
		if(!empty($product_details)){
			foreach($product_details as $PRD){
				if($tax_type=="GST"){
					$cgst=$sgst=$PRD->TaxPercent/2;
				}else if($tax_type=="IGST"){
					$igst=$PRD->TaxPercent;
				}

				$qty=$this->saleinvoice_model->getAvailableqty($customer,$PRD->id);
				$opening_stock.='<tr>';
				$opening_stock.='<td><input type="checkbox" value="'.$i.'" name="product_sel_id[]" id="product_sel_id_'.$i.'" ></td>';
				$opening_stock.='<td><p>'.$PRD->productCode .'</p>
				<input type="hidden" name="product_id[]" id="product_id_'.$i.'" value="'.$PRD->id.'">
				<input type="hidden" name="product_code[]" id="product_code_'.$i.'" value="'.$PRD->productCode.'">  
				<input type="hidden"  name="product_name[]" id="product_name_'.$i.'" value="'.$PRD->productName.'"> 
				<input type="hidden" id="product_sku_'.$i.'" name="product_sku[]" value="'.$PRD->Sku.'">
				<input type="hidden" id="product_hsncode_'.$i.'" name="product_hsncode[]" value="'.$PRD->HSNCode.'">
				<input type="hidden" id="product_batch_no_'.$i.'" name="product_batch_no[]" value="'.$PRD->BatchNo.'">
				<input type="hidden" id="product_control_no_'.$i.'" name="product_control_no[]" value="'.$PRD->ControlNo.'">
				<input type="hidden" id="expiry_date_'.$i.'" name="expiry_date[]" value="'.$PRD->DateOfExpiry.'">
				<input type="hidden" id="mrp_'.$i.'" name="mrp[]" value="'.$PRD->MRP.'">
				<input type="hidden" id="dpprice_'.$i.'" name="dpprice[]" value="'.$PRD->DPPrice.'">
				<input type="hidden" id="bv_'.$i.'" name="bv[]" value="'.$PRD->BV.'">
				<input type="hidden" id="avail_quantity_'.$i.'" name="avail_quantity[]" value="'.$qty.'">
				<input type="hidden" id="cgst_'.$i.'" name="cgst[]" value="'.$cgst.'">
				<input type="hidden" id="sgst_'.$i.'" name="sgst[]" value="'.$sgst.'">
				<input type="hidden" id="igst_'.$i.'" name="igst[]" value="'.$igst.'">
				</td>';
				$opening_stock.='<td><p>'.$PRD->Sku.'</p></td>';
				$opening_stock.='<td><p>'.$PRD->productName.'</p></td>';
				$opening_stock.='<td><p>'.$qty.'</p></td>';
				$opening_stock.='<td><p>'.$PRD->MRP.'</p></td>';
				$opening_stock.='<td><p>'.$PRD->DPPrice.'</p></td>';
				$opening_stock.='<td><p>'.$PRD->BV.'</p></td>';
				$opening_stock.='<td><input required type="text" onkeypress="return event.charCode > 47 && event.charCode < 58;" name="quantity[]" id="quantity_'.$i.'" class="form-control" value="0"></td>';
				$opening_stock.='</tr>';
				$i++;
			}

			$resp=array('status'=>true,'data'=>$opening_stock,'msg'=>true);
		}
		echo json_encode($resp);
	}
}