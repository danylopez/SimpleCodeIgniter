<?php
    /*
     * this class is for playlist
     */
    class Model_playlist extends CI_Model
    {  
        function __construct() {
            parent::__construct();
        }
                
        /*Return the playlists (playlist table)*/
        function getPlaylists() {
            $query = $this->db->get('playlist');
            
            if ($query->num_rows() > 0) {
                return $query->result();
            } else {
                return NULL;
            }
        }

        /*Return one playlist by id*/
        function getPlaylist($id_playlist) {
            $where['id_playlist'] = $id_playlist;
            $query = $this->db->get_where('playlist', $where);
            return $query->result();
        }

        /*Insert new playlist*/
        function setPlaylist($data) {
            $this->db->insert('playlist', $data);
        }
    }