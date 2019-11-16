<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Member_Model extends CI_Model
{


    public function getMemberAdmin()
    {

        return $this->db->get_where('user')->result_array();
    }

    public function deleteMember($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('sell_cars');
    }

    public function getMemberId($id)
    {
        return $this->db->get_where('sell_cars', ['id' => $id])->result_array();
    }
}
