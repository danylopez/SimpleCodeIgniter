<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Controller_video extends CI_Controller {

    function __construct() {
        parent::__construct();
        /*Always load the models*/
        $this->load->model('model_video');
        $this->load->model('model_playlist');
    }

	public function index($id_playlist) {
		$this->load_videos($id_playlist);
	}

    /*Load videos by Id_playlist and Edit View*/
	public function load_videos ($id_playlist) {
        $data['playlist'] = $this->model_playlist->getPlaylist($id_playlist);
        $data['videos'] = $this->model_video->getvideos($id_playlist);
        $this->load->view('edit_playlist', $data);
    }

    /*Load videos by id_video and play View*/
    public function load_play($id_video) {
        /*get the id for the playlist*/
        $data['video'] = $video = $this->model_video->getvideo($id_video);
        $id_playlist = $video[0]->id_playlist;

        $data['videos'] = $this->model_video->getvideos($id_playlist);
        $data['playlist'] = $this->model_playlist->getPlaylist($id_playlist);
        /*Falta colocar el video inicial */
        $this->load->view('play_playlist', $data);
    }

    /*Load videos by id_playlist and play View*/
    public function load_playid($id_playlist) {
        $data['videos'] = $this->model_video->getvideos($id_playlist);
        $data['playlist'] = $this->model_playlist->getPlaylist($id_playlist);
        $this->load->view('play_playlistid', $data);
    }

    /*create data and load load_videos*/
    public function insert_video($id_playlist) {
        $data['name'] = $this->input->post('name');
        $data['url'] = $this->input->post('url');
        $data['id_playlist'] = $this->input->post('id_playlist');
        /*$data['id_playlist'] = $id_playlist;*/
        $this->model_video->setvideo($data);
        $this->load_videos($id_playlist);
    }

    /*Delete the video*/
    public function delete_video($id_video) {
        /*get the id for the playlist*/
        $video = $this->model_video->getvideo($id_video);
        $id_playlist = $video[0]->id_playlist;

        $this->model_video->deletevideo($id_video);
        $this->load_videos($id_playlist);
    }
}