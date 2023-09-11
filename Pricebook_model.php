<?php 
class Pricebook_model extends CI_Model{

	public function GetPriceBookList($limit,$start){
        $this->db->select('*')->from('tbl_pricebook');
        $this->db->limit($limit,$start);
        $this->db->order_by('id','desc');
        return $this->db->get()->result();
    }
    public function ViewPriceBookListById($id){
        return $this->db->where(array('pricebookId'=>$id))->get('tbl_pricebook_list')->result();
      
    }
    public function getPriceBookDet()
    {
        return $this->db->get('tbl_pricebook')->result();
        
    }
    public function GetPriceBookListDetail()
    {
        return $this->db->get('tbl_pricebook_list')->result();
       
    }
    public function insertPriceBook($data){

       return $this->db->insert('tbl_pricebook',$data);
      return $this->db->insert_id();

    }
    public function insertPriceBookList($data)
    {
         return $this->db->insert('tbl_pricebook',$data);
        return $this->db->insert('tbl_products',$data);

    }
    public function getPriceBookBasedOnId($id)
    {
        return $this->db->select('PB.*,PBL.*,PRD.*')->from('tbl_pricebook as PB')->join('tbl_pricebook_list as PBL')->join('tbl_products as PRD')->where(array('PB.status'=>1))->get()->result();
    }
    
    
}