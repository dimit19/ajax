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
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct()
	{
		parent::__construct();
		// Your own constructor code
		 $this->load->model('blog');
	} 
	public function index()
	{
		$this->load->view('welcome_message');
	}
	public function insert()
	{
		$data = array();
		$data['standard'] = $this->input->get_post('standard');
		$data['studentname'] = $this->input->get_post('studentlist');
	    $result = $this->blog->insert_entry($data);
	    echo "data inserted";
	}
	public function insertSubject()
	{
		$this->load->view('subject');
	}
	public function insert_Subject()
	{
        $data = array();
		$data['standard'] = $this->input->get_post('standard');
		$data['studentname'] = $this->input->get_post('studentlist');
	    $result = $this->blog->insert_subjects($data);
	    echo "data inserted";
		
	}
	public function listing()
	{
		$this->load->view('listing');
	}
	public function fetch_student()
	{
		$data['standard'] = $this->input->get_post('standard');
	    $result = $this->blog->get_students($data);
	}
	public function fetch_subject()
	{
		$data['standard'] = $this->input->get_post('standard');
	    $result = $this->blog->get_subjects($data);
	}
	public function insertmarks()
	{
		$data['standard'] = $this->input->get_post('standard');
		$data['studentname'] = $this->input->get_post('studentname');
		$data['subjectmarks'] = $this->input->get_post('subjectmarks');
		$data['subjectname'] = $this->input->get_post('subjectname');
		$result = $this->blog->insert_subjects_marks($data);
	    echo "data inserted";
	}
	public function display()
	{	
		$this->load->view('display');
	}
	public function resultlist()
	{
	    $data['standard'] = $this->input->get_post('standard');
		$result = $this->blog->result($data);
	    
	}
}
