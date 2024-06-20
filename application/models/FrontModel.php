<?php

class FrontModel extends CI_Model
{
    public function insertBooking($data)
    {
        $bookingTime=$data['bookingTime'];
        $this->db->where('bookingTime', $bookingTime);
        $query = $this->db->get('booking');
        $result = $query->result();
      
        if (count($result) > 0) {
            // booking time is not available
            return false;
        }else{
            $this->db->insert('booking', $data);
            return $this->db->insert_id();
        }
    }

    

    public function updateBooking($data)
    {
        echo $data['id'];
    }
}
