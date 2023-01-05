<?php
class Event_model extends CI_Model
{
    public function getEventById($user_id)
    {
        $data = [];
        $res = $this->db
            ->select('*')
            ->where('user_id', $user_id)
            ->get('events')
            ->result();
        foreach ($res as $row) {
            $rows['event_id'] = $row->id;
            $rows['event_name'] = $row->event_name;
            $rows['venue'] = $row->venue;
            $rows['location'] = $row->location;
            $rows['event_time'] = $row->event_time;
            $rows['event_date'] = $row->date;
            $rows['category'] = $this->getCategoriesByEventId($row->id);

            $data[] = $rows;
        }
        return $data;
    }

    public function getEventDetails($user_id, $event_id)
    {
        $data = [];
        $res = $this->db
            ->select('*')
            ->where('user_id', $user_id)
            ->where('id', $event_id)
            ->get('events')
            ->row();

        $data['event_id'] = $res->id;
        $data['event_name'] = $res->event_name;
        $data['venue'] = $res->venue;
        $data['location'] = $res->location;
        $data['event_img'] = $res->event_img;
        $data['event_time'] = $res->event_time;
        $data['event_date'] = $res->date;
        $data['category'] = $this->getCategoriesByEventId($res->id);

        return $data;
    }

    public function getOrgByEventId($id)
    {
        $result = $this->db
            ->select('*')
            ->where('id', $id)
            ->get('events')
            ->row();
        return $result->user_id;
    }

    public function getCategoriesByEventId($event_id)
    {
        $res = $this->db
            ->select('id,name')
            ->where('event_id', $event_id)
            ->get('event_category')
            ->result();
        return $res;
    }

    public function addEvent($data){
        $this->db->set($data);
        $this->db->insert('events');
        if($this->db->affected_rows() > 0)
        return $this->db->insert_id(); 
    }

    public function addEventCategory($data){
        $this->db->set($data);
        $this->db->insert('event_category');
        if($this->db->affected_rows() > 0)
        return true; 
    }
}
