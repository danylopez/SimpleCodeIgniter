<?php
    /*
     * this class is for videos
     */
    class Model_video extends CI_Model
    {  
        function __construct() {
            parent::__construct();
        }
        
        /*Return the videos by id_playlist*/
        function getvideos($id_playlist) {
            $where['id_playlist'] = $id_playlist;
            $query = $this->db->get_where('video', $where);
            if ($query->num_rows() > 0) {
                return $query->result();
            } else {
                return NULL;
            }
        }
        /*Return video by id*/
        function getvideo($id_video) {
            $where['id_video'] = $id_video;
            $query = $this->db->get_where('video', $where);
            return $query->result();
        }

        /*Insert video */
        function setvideo($data) {
            $this->db->insert('video', $data);
        }

        /*Delete video by id*/
        function deletevideo($id_video) {
            $this->db->where('id_video', $id_video);
            $this->db->delete('video'); 
        }
    }