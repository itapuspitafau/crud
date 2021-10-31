<?php
class M_matakuliah extends CI_Model{
    public function TampilMatakuliah(){
        return $this->db->get('matakuliah');
    }

    public function SimpanMatakuliah($data=null){
        $this->db->insert('matakuliah',$data);
    }
    public function hapusMatakuliah($whare=null){
        $this->db->delete('matakuliah',$whare);
    }
    public function matkulwhere($where){
        return $this->db->get_where('matakuliah', $where);
        
    }
    public function updateMatakuliah($data=null,$where=null){
        $this->db->update('matakuliah', $data, $where);
    }
}
