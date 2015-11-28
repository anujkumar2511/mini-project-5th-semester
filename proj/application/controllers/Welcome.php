<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('mod');
		$this->load->database();
	}
	public function index()
	{
		$this->load->view('homepage');
	}
	public function query1()
	{
		$year=$_POST['year'];
		$top=$_POST['top'];
		$mf=$_POST['mf'];
		$data['dta']=$this->mod->query1($year,$top,$mf);
		$this->load->view('query1',$data);
	}
	public function query2()
	{
		$this->load->view('query2');
	}
	public function query3()
	{
		$year=$_POST['year'];
		$name=$_POST['name'];
		$data['dta']=$this->mod->query2($year,$name);
		$this->load->view('query3',$data);
	}
}
