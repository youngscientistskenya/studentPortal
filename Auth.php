<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 22/11/2018
 * Time: 12:13
 */

class Auth extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->database();
	}

	public function outreach_details()
	{
		$this->load->view('outreach_details');

		if (isset($_POST['outreach_details'])) {
			$this->form_validation->set_rules('Day', 'Day', 'required');
			$this->form_validation->set_rules('Dates', 'Dates', 'required');
			$this->form_validation->set_rules('Host_school', 'Host_school', 'required');
			$this->form_validation->set_rules('Distance', 'Distance', 'required');
			$this->form_validation->set_rules('Time', 'Time', 'required');
			$this->form_validation->set_rules('County', 'County', 'required');
			$this->form_validation->set_rules('Region/Province', 'Region/Province', 'required');

		}

		//if form validation true
		if ($this->form_validation->run() == TRUE) {
			echo 'Details entered correctly';

//		add user in database
			$data = array(
				'Day' => $_POST['Day'],
				'Dates' => $_POST['Dates'],
				'County' => $_POST ['County'],
				'Region/Province' => $_POST ['Region/Province'],
				'Host_school' => $_POST ['Host_school'],
				'Distance' => $_POST ['Distance'],
				'Time' => $_POST ['Time'],


			);

			$this->db->insert('outreach_details', $data);

			$this->session->set_flashdata("success", "The details have been successfully inserted");
//	redirect("auth/login","refresh");

		}

	}

	public function outreach_participants()
	{
		$this->load->view('outreach_participants');

		if (isset($_POST['outreach_participants'])) {
			$this->form_validation->set_rules('Day', 'Day', 'required');
			$this->form_validation->set_rules('Dates', 'Dates', 'required');
			$this->form_validation->set_rules('County', 'County', 'required');
			$this->form_validation->set_rules('No_of_schools', 'No_of_schools', 'required');

		}

		//if form validation true
		if ($this->form_validation->run() == TRUE) {
			echo 'Registered successfully';

//		add user in database
			$data = array(
				'Day' => $_POST['Day'],
				'Dates' => $_POST ['Dates'],
				'County' => $_POST ['County'],
				'No_of_schools' => $_POST ['No_of_schools'],
				'Additional_details' => $_POST['Additional_details'],
				'University' => $_POST['University'],

			);

			$this->db->insert('outreach_participants', $data);

			$this->session->set_flashdata("success", "The details have been successfully inserted");
//	redirect("auth/login","refresh");

		}
	}

	public function project_details()
	{
		$this->load->view('project_details');

		if (isset($_POST['project_details'])) {
			$this->form_validation->set_rules('Project_title', 'Project_title', 'required');
			$this->form_validation->set_rules('Name_of_school', 'Name_of_school', 'required');
			$this->form_validation->set_rules('Student_name', 'Student_name', 'required');
			$this->form_validation->set_rules('Introduction', 'Introduction', 'required');
			$this->form_validation->set_rules('Method', 'Method', 'required');
			$this->form_validation->set_rules('Results', 'Results', 'required');
			$this->form_validation->set_rules('Conclusion', 'Conclusion', 'required');
			$this->form_validation->set_rules('Referees', 'Referees', 'required');
			$this->form_validation->set_rules('Acknowledge', 'Acknowledge', 'required');

		}

		//if form validation true
		if ($this->form_validation->run() == TRUE) {
			echo 'Registered successfully';

//		add user in database
			$data = array(
				'Project_title' => $_POST['Project_title'],
				'Name_of_school' => $_POST ['Name_of_school'],
				'Student_name' => $_POST ['Student_name'],
				'Introduction' => $_POST ['Introduction'],
				'Method' => $_POST['Method'],
				'Results' => $_POST['Results'],
				'Conclusion' => $_POST['Conclusion'],
				'Referees' => $_POST['Referees'],
				'Acknowledge' => $_POST['Acknowledge'],
			);

			$this->db->insert('project_details', $data);

			$this->session->set_flashdata("success", "The details have been successfully inserted");
//	redirect("auth/login","refresh");

		}
	}

	public function addAdmin()
	{
		$this->load->view('addAdmin');

		if (isset($_POST['addAdmin'])) {

			$this->form_validation->set_rules('Name', 'Name', 'required');
			$this->form_validation->set_rules('Email', 'Email', 'required');
			$this->form_validation->set_rules('Password', 'Password', 'min_length[5]', 'required');
			$this->form_validation->set_rules('Confirm password', 'Confirm password', 'min_length[5]', 'required');
		}

		//if form validation true
		if ($this->form_validation->run() == TRUE) {


//		add user in database
			$data = array(

				'Name' => $_POST['Name'],
				'Email' => $_POST['Email'],
				'Password' => md5($_POST['Password'])
			);

			$this->db->insert('admin', $data);

			$this->session->set_flashdata("success", "Registered successful");
	redirect("auth/adminRegistered","refresh");

		}
	}

	public function viewAdmin()
	{
		$this->load->view('viewAdmin');

		if (isset($_POST['viewAdmin'])) {

			$this->form_validation->set_rules('Name', 'Name', 'required');
			$this->form_validation->set_rules('Email', 'Email', 'required');
			$this->form_validation->set_rules('Password', 'Password', 'required');

		}

		//if form validation true
		if ($this->form_validation->run() == TRUE) {


//		add user in database
			$data = array(

				'Name' => $_POST['Name'],
				'Email' => $_POST['Email'],
				'Password'=>$_POST['Password'],

			);

			$this->db->insert('admin', $data);

			$this->session->set_flashdata("success", "Registered successful");
			redirect("auth/viewAdmin","refresh");

		}
	}


	public function adminLogin()
	{
		$this->form_validation->set_rules('Name', 'Name', 'required');
		$this->form_validation->set_rules('Password', 'Password', 'min_length[5]');

		if ($this->form_validation->run() == TRUE) {
			$Name = $_POST['Name'];
			$Password = md5($_POST['Password']);

			//check user in the database

			$this->db->select('*');
			$this->db->from('admin');
			$this->db->where(array('Name' => $Name, 'Password' => $Password));
			$query = $this->db->get();

			$admin = $query->row();

			//if admin exists

			if ($admin->Email) {
				//temporary message
				$this->session->set_flashdata("success", "You are logged in");

				$_SESSION['user_logged'] = TRUE;
				$_SESSION['Name'] = $admin->Name;

				//redirect to profile page

				redirect("auth/adminProfile", "refresh");
			}else {
			$this->session->set_flashdata("error", "Invalid. Please register.");

			redirect("auth/adminLogin", "refresh");
		}

	}
		$this->load->view('adminLogin');
	}

	public function mentors(){
		$this->load->view('mentors');
	}


	public function addmentors()
	{
		$this->load->view('addmentors');

		if (isset($_POST['mentors'])) {

			$this->form_validation->set_rules('Time/Date', 'Time/Date', 'required');
			$this->form_validation->set_rules('Email', 'Email', 'required');
			$this->form_validation->set_rules('Name', 'Name', 'required');
			$this->form_validation->set_rules('Phone', 'Phone','required');
			$this->form_validation->set_rules('Course', 'Course', 'required');
			$this->form_validation->set_rules('Student/Professional', 'Student/Professional', 'required');
			$this->form_validation->set_rules('Occupation', 'Occupation', 'required');
			$this->form_validation->set_rules('Skills', 'Skills','required');
			$this->form_validation->set_rules('Location', 'Location', 'required');
			$this->form_validation->set_rules('Reason', 'Reason', 'required');

		}

		//if form validation true
		if ($this->form_validation->run() == TRUE) {


//		add user in database
			$data = array(
				'Time/Date' => $_POST['Time/Date'],
				'Email' => $_POST['Email'],
				'Name' => $_POST['Name'],
				'Phone' => $_POST['Phone'],
				'Course' => $_POST['Course'],
				'Student/Professional' => $_POST['Student/Professional'],
				'Occupation' => $_POST['Occupation'],
				'Skills' => $_POST['Skills'],
				'Location' => $_POST['Location'],
				'Reason' => $_POST['Reason'],

			);

			$this->db->insert('mentors', $data);

			$this->session->set_flashdata("success", "Registered successful");
			redirect("auth/adminRegistered","refresh");

		}

	}

	public function waridiprofile()
	{
		$this->load->view('waridiprofile');
	}


	public function adminLogout()
	{
		redirect("auth/adminLogin", "refresh");

	}

	public function projects()
	{
		$this->load->view('layout/header');
		$this->load->view('projects');
		$this->load->view('layout/footer');

	}


	public function adminprofile()
	{
		$this->load->view('adminprofile');
	}

	public function adminRegistered()
	{

		$this->load->view('adminRegistered');
	}
	public function Outreach()
	{
		$this->load->view('Outreach');
	}



}
//	public function profile()
//	{
//
//		$this->load->view('profile');
//	}
//
//
//public function madaraka()
//	{
//		$this->load->view('madaraka');
//	}
//	public function adminlogin()
//	{
//		$this->form_validation->set_rules('name', 'name', 'required');
//		$this->form_validation->set_rules('password', 'password', 'min_length[5]');
//
//		if ($this->form_validation->run() == TRUE) {
//			$name = $_POST['name'];
//			$password = $_POST['password'];
//
//			//check user in the database
//
//			$this->db->select('*');
//			$this->db->from('admin');
//			$this->db->where(array('name' => $name, 'password' => $password));
//			$query = $this->db->get();
//
//			$admin = $query->row();
//
//			//if admin exists
//
//			if ($admin->email) {
//				//temporary message
//				$this->session->set_flashdata("success", "You are logged in");
//
//				$_SESSION['user_logged'] = TRUE;
//				$_SESSION['name'] = $admin->name;
//
//				//redirect to profile page
//
//				redirect("admin/adminprofile", "refresh");
//
//			} else {
//				$this->session->set_flashdata("error", "Invalid. Please register.");
//
//				redirect("auth/adminlogin", "refresh");
//			}
//		}
//		$this->load->view('adminlogin');
//
//	}
//	public function adminregister()
//	{
//
//		if(isset($_POST['adminregister']))
//		{
//			$this->form_validation->set_rules('name','name','required');
//			$this->form_validation->set_rules('phone','phone','required');
//			$this->form_validation->set_rules('email','email','required');
//			$this->form_validation->set_rules('password','password','min_length[5]');
//			$this->form_validation->set_rules('confirm password','confirm password','min_length[5]');
//
//		}
//
//		//if form validation true
//		if($this->form_validation->run() == TRUE)
//		{
//			echo 'Registered successfully';
//
////		add user in database
//			$data  = array(
//				'name' =>$_POST['name'],
//				'phone' =>$_POST['phone'],
//				'email' =>$_POST['email'],
//				'password' =>$_POST['password']
//
//			);
//
//			$this->db->insert('admin',$data);
//
//			$this->session->set_flashdata("success","The administrator has been registered.");
//			redirect("auth/adminregistered","refresh");
//
//		}
//
//		$this->load->view('adminregister');
//
//	}
//	public function adminregistered()
//	{
//
//		$this->load->view('adminregistered');
//	}
//
//	public function administrators()
//	{
//
//		$this->load->view('administrators');
//	}
//
//
//	public function ownerregister()
//	{
//
//		if(isset($_POST['ownerregister']))
//		{
//			$this->form_validation->set_rules('nationalId','nationalId','min_length[5]');
//			$this->form_validation->set_rules('name','name','required');
//			$this->form_validation->set_rules('hostelname','hostelname','required');
//			$this->form_validation->set_rules('phone','phone','required');
//			$this->form_validation->set_rules('password','password','min_length[5]');
//			$this->form_validation->set_rules('confirm password','confirm password','min_length[5]');
//
//		}
//
//		//if form validation true
//		if($this->form_validation->run() == TRUE)
//		{
//			echo 'Registered successfully';
//
////		add user in database
//			$data  = array(
//				'hostelname' =>$_POST['hostelname'],
//				'phone' =>$_POST['phone'],
//				'nationalId' =>$_POST['nationalId'],
//				'name' =>$_POST['name'],
//				'password' =>md5($_POST['password'])
//			);
//
//			$this->db->insert('owner',$data);
//
//			$this->session->set_flashdata("success","The administrator has been registered.");
//			redirect("auth/ownerregistered","refresh");
//
//		}
//
//		$this->load->view('ownerregister');
//
//	}
//
//	public function ownerlogout(){
//		redirect("auth/ownerlogin","refresh");
//
//	}
//
//	public function ownerprofile()
//	{
//		$this->load->view('ownerprofile');
//	}
//	public function waridiprofile()
//	{
//		$this->load->view('waridiprofile');
//	}
//	public function taarifprofile()
//	{
//		$this->load->view('taarifprofile');
//	}
//	public function ayanaprofile()
//	{
//		$this->load->view('ayanaprofile');
//	}
//	public function ownerlogin()
//	{
//		$this->form_validation->set_rules('name', 'name', 'required');
//		$this->form_validation->set_rules('password', 'password', 'min_length[5]');
//
//		if ($this->form_validation->run() == TRUE) {
//			$name = $_POST['name'];
//			$password = $_POST['password'];
//
//			//check user in the database
//
//			$this->db->select('*');
//			$this->db->from('owner');
//			$this->db->where(array('name' => $name, 'password' => $password));
//			$query = $this->db->get();
//
//			$owner = $query->row();
//
//			//if admin exists
//
//			if ($owner->hostelname) {
//				//temporary message
//				$this->session->set_flashdata("success", "You are logged in");
//
//				$_SESSION['user_logged'] = TRUE;
//				$_SESSION['name'] = $owner->name;
//
//				//redirect to profile page
//
//				redirect("auth/ownerprofile", "refresh");
//
//			} else {
//				$this->session->set_flashdata("error", "Invalid. Please register.");
//
//				redirect("auth/ownerlogin", "refresh");
//			}
//		}
//		$this->load->view('ownerlogin');
//
//	}
//	public function hostelregister()
//	{
//
//		if(isset($_POST['hostelregister']))
//		{
//			$this->form_validation->set_rules('name','name','required');
//			$this->form_validation->set_rules('mobile','mobile','required');
//			$this->form_validation->set_rules('address','address','required');
//			$this->form_validation->set_rules('sharing','sharing','min_length[1]');
//
//		}
//
//		//if form validation true
//		if($this->form_validation->run() == TRUE)
//		{
//			echo 'Registered successfully';
//
////		add user in database
//			$data  = array(
//				'name' =>$_POST['name'],
//				'mobile' =>$_POST['mobile'],
//				'address' =>$_POST['address'],
//				'sharing' =>$_POST['sharing']
//
//			);
//
//			$this->db->insert('hostel',$data);
//
//			$this->session->set_flashdata("success","Hostel successfully registered.");
//			redirect("auth/hostellogout","refresh");
//
//		}
//
//		$this->load->view('hostelregister');
//
//	}
//	public function waridibookings()
//	{
//
//		if(isset($_POST['waridibookings']))
//		{
//			$this->form_validation->set_rules('type','type','min_length[5]');
//			$this->form_validation->set_rules('date','date','required');
//			$this->form_validation->set_rules('hostelName','hostelName','required');
//
//		}
//
//		//if form validation true
//		if($this->form_validation->run() == TRUE)
//		{
//			echo 'Registered successfully';
//
////		add user in database
//			$data  = array(
//				'type' =>$_POST['type'],
//				'date' =>$_POST['date'],
//				'hostelName' =>$_POST['hostelName'],
//			);
//
//			$this->db->insert('bookings',$data);
//
//			$this->session->set_flashdata("success","You have booked.");
//			redirect("auth/waridiprofile","refresh");
//
//		}
//
//		$this->load->view('waridibookings');
//
//	}
//	public function ayanabookings()
//	{
//
//		if(isset($_POST['ayanabookings']))
//		{
//			$this->form_validation->set_rules('type','type','min_length[5]');
//			$this->form_validation->set_rules('date','date','required');
//			$this->form_validation->set_rules('hostelName','hostelName','required');
//
//		}
//
//		//if form validation true
//		if($this->form_validation->run() == TRUE)
//		{
//			echo 'Registered successfully';
//
////		add user in database
//			$data  = array(
//				'type' =>$_POST['type'],
//				'date' =>$_POST['date'],
//				'hostelName' =>$_POST['hostelName'],
//			);
//
//			$this->db->insert('bookings',$data);
//
//			$this->session->set_flashdata("success","The administrator has been registered.");
//			redirect("auth/ayanaprofile","refresh");
//
//		}
//
//		$this->load->view('ayanabookings');
//
//	}
//	public function taarifbookings()
//	{
//
//		if(isset($_POST['taarifbookings']))
//		{
//			$this->form_validation->set_rules('type','type','min_length[5]');
//			$this->form_validation->set_rules('date','date','required');
//			$this->form_validation->set_rules('hostelName','hostelName','required');
//
//		}
//
//		//if form validation true
//		if($this->form_validation->run() == TRUE)
//		{
//			echo 'Registered successfully';
//
////		add user in database
//			$data  = array(
//				'type' =>$_POST['type'],
//				'date' =>$_POST['date'],
//				'hostelName' =>$_POST['hostelName'],
//			);
//
//			$this->db->insert('bookings',$data);
//
//			$this->session->set_flashdata("success","The administrator has been registered.");
//			redirect("auth/taarifprofile","refresh");
//
//		}
//
//		$this->load->view('taarifbookings');
//
//	}
//}
