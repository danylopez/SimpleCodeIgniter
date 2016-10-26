<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Controller_playlist extends CI_Controller {

    function __construct() {
        parent::__construct();
        /*Always load the model*/
        $this->load->model('model_playlist');
    }

	public function index() {
		$this->load_playlist();
	}

    /*Call getPlaylists and load view_playlist*/
	public function load_playlist() {
        $data['playlists'] = $this->model_playlist->getPlaylists();
		$this->load->view('view_playlist', $data);
	}

    /*Create data and call setPlaylist*/
    public function insert_playlist() {
        $data['name'] = $this->input->post('name');
        $this->model_playlist->setPlaylist($data);
        redirect('Controller_playlist/index');
    }
}
