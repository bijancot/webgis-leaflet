<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Properti_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get properti by PropertiID
     */
    function get_properti($PropertiID)
    {
        return $this->db->get_where('properti',array('PropertiID'=>$PropertiID))->row_array();
    }
        
    /*
     * Get all properti
     */
    function get_all_properti()
    {
        $this->db->order_by('PropertiID', 'desc');
        return $this->db->get('properti')->result_array();
    }
        
    /*
     * function to add new properti
     */
    function add_properti($params)
    {
        $this->db->insert('properti',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update properti
     */
    function update_properti($PropertiID,$params)
    {
        $this->db->where('PropertiID',$PropertiID);
        return $this->db->update('properti',$params);
    }
    
    /*
     * function to delete properti
     */
    function delete_properti($PropertiID)
    {
        return $this->db->delete('properti',array('PropertiID'=>$PropertiID));
    }
}
