<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use AmyBoyd\PgnParser\Game;
use AmyBoyd\PgnParser\PgnParser;
use AmyBoyd\PgnParser\Util;

class Site extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->view('footer');
        $this->load->library('session');
    }

    public function index()
    {
        $this->load->view('header');
        $this->load->view('uploadfile');
    }

    public function upload()
    {
        $config['upload_path']          = './assets/pgnfiles/';
        $config['allowed_types']        = '*';
        $config['max_size']             = 100000;

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('pgnfile'))
        {   
                $error = array('error' => $this->upload->display_errors());
                $this->load->view('header');
                $this->load->view('uploadfile');
                $this->load->view('error_upload',$error);
        }
        else
        {       
            $content = file_get_contents($_FILES['pgnfile']['tmp_name']);
            $name = $_FILES['pgnfile']['name'];
            $file_parts = pathinfo($name);
            if($file_parts['extension'] != "pgn"){
                $this->load->view('header');
                $this->load->view('uploadfile');
                $this->load->view('error_ext');
            }
            elseif($content == ""){
                $this->load->view('header');
                $this->load->view('uploadfile');
                $this->load->view('error_blank_file');
            }
            else{
                $data = array('upload_data' => $this->upload->data());
                $name = $_FILES['pgnfile']['name'];
                $mime = $_FILES['pgnfile']['type'];
                $gamedata = file_get_contents($_FILES['pgnfile']['tmp_name']);
                $this->load->model('main_model');
                $this->main_model->save($name,$mime,$gamedata);
                $_SESSION['data'] = $data;
                $this->load->view('header2');
                $this->load->view('analyze', $data);
        }
            }
            
    }

    public function playgame()
    {
        $this->load->view('header');
        $this->load->view('playgame');
    }

}
