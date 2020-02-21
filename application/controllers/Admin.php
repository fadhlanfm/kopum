<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends MY_Controller {

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

	public function __construct(){
		parent::__construct();
		$this->load->library('session');
		$this->load->library('upload');
		$this->load->helper('url', 'form');
	}

    
	public function index()
	{   
		$this->isAdmin();
		$temp_data['page_title'] = 'Admin Log In - KOPUM IATMI';
		$this->load->view('admin_pages/login', $temp_data, false);
    }

    public function loginProcess()
	{   
		$inputPIN = md5($this->input->post('inputPIN'));
		$query_login = $this->Mysql->read('admins', array('PIN'=>$inputPIN), null, null, null, null);
		if($query_login->num_rows()>0){
			foreach($query_login->result() as $result){
				$id = $result->id;
				$isSuperAdmin = $result->isSuperAdmin; // admin or superadmin
			}
			$this->session->set_userdata('user_id', $id);
			$this->session->set_userdata('isSuperAdmin', $isSuperAdmin);
				redirect(site_url('admin/showDashboard'), 'refresh');
		}else{
			$this->session->set_flashdata('message', '1');
            redirect(site_url('admin'));
        }
	}
	
	public function logoutProcess(){
		session_destroy();
		redirect(site_url('admin'), 'refresh');
	}

    public function showDashboard(){
		$this->isNotAdmin();
		$this->data['page_title'] = 'Dashboard - KOPUM IATMI';
        $this->data['query_trainings'] = $this->Mysql->read('trainings', null, 'id', 'ASC', null, null);
        $this->data['query_tai'] = $this->Mysql->read('trainings_and_instructors', null, 'id', 'ASC', null, null);
		$this->data['user'] = $this->session->userdata('id');
        $temp_data['content'] = $this->load->view('admin_pages/dashboard', $this->data, true);
		$this->load->view('admin_pages/layout', $temp_data, false);
	}

	/* start TRAININGS group */
	public function showTrainings(){
		$this->isNotAdmin();
		$this->isNotSuperAdmin();
		$this->data['page_title'] = 'List of Trainings - KOPUM IATMI';
		$this->data['query'] = $this->Mysql->read('trainings', null, 'id', 'ASC', null, null);
		$this->data['query_instructors'] = $this->Mysql->read('instructors', null, 'id', 'ASC', null, null);
		$this->data['query_tai'] = $this->Mysql->read('trainings_and_instructors', null, 'id', 'ASC', null, null);
        $temp_data['content'] = $this->load->view('admin_pages/show_trainings', $this->data, true);
		$this->load->view('admin_pages/layout', $temp_data, false);
	}

	public function addTraining(){
		$this->isNotAdmin();
		$this->isNotSuperAdmin();
		$this->data['page_title'] = 'Add New Training - KOPUM IATMI';
        $this->data['query_trainings'] = $this->Mysql->read('trainings', null, 'id', 'ASC', null, null);
        $this->data['query_formats'] = $this->Mysql->read('formats', null, 'format', 'ASC', null, null);
        $this->data['query_disciplines'] = $this->Mysql->read('disciplines', null, 'discipline', 'ASC', null, null);
        $this->data['query_instructors'] = $this->Mysql->read('instructors', null, 'name', 'ASC', null, null);
        $temp_data['content'] = $this->load->view('admin_pages/add_training', $this->data, true);
		$this->load->view('admin_pages/layout', $temp_data, false);
	}

	public function addTrainingProcess(){
		$this->isNotAdmin();
		$this->isNotSuperAdmin();
		
		if(!empty($_FILES["proposal"]["name"])){
			$config2['upload_path']          = './uploads/proposals/';
			$config2['allowed_types']        = 'pdf';
			$config2['max_size']             = 11000;
			$this->load->library('upload', $config2);
			$this->upload->initialize($config2);
			$this->upload->do_upload('proposal');
			$proposalPath = $this->upload->data('file_name');  
		}else{
			$proposalPath='';
		}
		
		if(!empty($_FILES["flyer"]["name"])){
			$config1['upload_path']          = './uploads/flyers/';
			$config1['allowed_types']        = 'jpg|png';
			$config1['max_size']             = 310;
			$this->load->library('upload', $config1);
			$this->upload->initialize($config1);
			$this->upload->do_upload('flyer');
			$flyerPath = $this->upload->data('file_name'); 
		}else{
			$flyerPath='';
		}
		
		$discipline = $this->input->post('discipline');
		foreach($discipline as $index => $disciplines){
			$discipline[$index] = $disciplines;
		}
		

		$topic = $this->input->post('topic');
        $city = $this->input->post('city');
        $venue = $this->input->post('venue');
		$discipline_1 = $discipline[0];
		$discipline_2 = $discipline[1];
		$discipline_3 = $discipline[2];
        $format = $this->input->post('format');
        $startDate = $this->input->post('startDate');
        $endDate = $this->input->post('endDate');
        $feeMember = $this->input->post('feeMember');
        $feeNonMember = $this->input->post('feeNonMember');
        $synopsis = $this->input->post('synopsis');
        $reservationLink = $this->input->post('reservationLink');
        $contactPerson1 = $this->input->post('contactPerson1');
        $telephone1 = $this->input->post('telephone1');
        $contactPerson2 = $this->input->post('contactPerson2');
        $telephone2 = $this->input->post('telephone2');
        $additionalInformation = $this->input->post('additionalInformation');

		$data   = array(
			'topic'=>$topic, 
			'city'=>$city, 
			'venue'=>$venue, 
			'discipline_1'=>$discipline_1, 
			'discipline_2'=>$discipline_2, 
			'discipline_3'=>$discipline_3, 
			'format'=>$format, 
			'start_date'=>$startDate, 
			'end_date'=>$endDate, 
			'fee_for_member'=>$feeMember, 
			'fee_for_nonmember'=>$feeNonMember, 
			'synopsis'=>$synopsis, 
			'reservation_link'=>$reservationLink, 
			'contact_person_1'=>$contactPerson1, 
			'telephone_1'=>$telephone1, 
			'contact_person_2'=>$contactPerson2, 
			'telephone_2'=>$telephone2, 
			'additional_information'=>$additionalInformation,
			'flyer'=>$flyerPath,
			'proposal'=>$proposalPath,
			'created_at' => date('Y-m-d')
		);
		$insert = $this->Mysql->create('trainings', $data);

		$instructor = $this->input->post('instructor');
		$totalInstructor = count($instructor);
		$query = $this->Mysql->getLatest('trainings');
		if($query->num_rows()>0){
			foreach($query->result() as $result){
				$latestTrainingID=$result->id;
			}
		}

		for ($i=0; $i<$totalInstructor ; $i++){
			$data   = array(
				'id_training'=>$latestTrainingID, 
				'id_instructor'=>$instructor[$i]
			);
			$insert = $this->Mysql->create('trainings_and_instructors', $data);
		}

		$this->session->set_flashdata('message', 'add_success');
		$this->session->set_flashdata('object', $topic);
		$this->session->set_flashdata('id', $latestTrainingID);

        redirect(site_url('admin/showTrainings'));
	}

	public function deleteTrainingProcess(){
		$this->isNotAdmin();
		$this->isNotSuperAdmin();
        $id = $this->input->post('id');
		$topic = $this->input->post('topic');
		
		$query = $this->Mysql->read('trainings', array('id'=>$id), 'flyer', 'ASC', null, null);
		if($query->num_rows()>0){
			foreach($query->result() as $result){
				$flyer = $result->flyer;
				$proposal = $result->proposal;
				}
			}

		$delete = $this->Mysql->delete(array('id'=>$id), 'trainings');

		unlink('uploads/flyers/'.$flyer);
		unlink('uploads/proposals/'.$proposal);

		$this->session->set_flashdata('message', 'delete_success');
		$this->session->set_flashdata('object', $topic);
		$this->session->set_flashdata('id', $this->input->post('id'));
		$delete = $this->Mysql->delete(array('id_training'=>$id), 'trainings_and_instructors');
		redirect(site_url('admin/showTrainings'));
	}

	public function processDeleteFlyer($id){
		$this->isNotAdmin();
		$this->isNotSuperAdmin();
		$this->load->helper("file");

		$query = $this->Mysql->read('trainings', array('id'=>$id), 'flyer', 'ASC', null, null);
		if($query->num_rows()>0){
			foreach($query->result() as $result){
				$flyer = $result->flyer;
				unlink('uploads/flyers/'.$flyer);
				}
			}
		$update = $this->Mysql->update(array('id'=>$id), 'trainings', array('flyer'=>''));
		redirect(site_url('admin/editTraining/'.$id));
	}

	public function processDeleteProposal($id){
		$this->isNotAdmin();
		$this->isNotSuperAdmin();
		$this->load->helper("file");

		$query = $this->Mysql->read('trainings', array('id'=>$id), 'proposal', 'ASC', null, null);
		if($query->num_rows()>0){
			foreach($query->result() as $result){
				$proposal = $result->proposal;
				unlink('uploads/proposals/'.$proposal);
				}
			}
		$update = $this->Mysql->update(array('id'=>$id), 'trainings', array('proposal'=>''));
		redirect(site_url('admin/editTraining/'.$id));
	}

	public function editTraining($id){
		$this->isNotAdmin();
		$this->isNotSuperAdmin();
		$this->data['query'] = $this->Mysql->read('trainings', array('id'=>$id), 'id', 'ASC', null, null);
		$query = $this->Mysql->read('trainings', array('id'=>$id), 'id', 'ASC', null, null);
		if($query->num_rows()>0){
			foreach($query->result() as $result){
				$topic = $result->topic;
				}
			}
		$this->data['query_formats'] = $this->Mysql->read('formats', null, 'format', 'ASC', null, null);
        $this->data['query_disciplines'] = $this->Mysql->read('disciplines', null, 'discipline', 'ASC', null, null);
        $this->data['query_instructors'] = $this->Mysql->read('instructors', null, 'name', 'ASC', null, null);
        $this->data['query_trainings_and_instructors'] = $this->Mysql->read('trainings_and_instructors', array('id_training'=>$id), 'id', 'ASC', null, null);
		$this->data['page_title'] = 'Edit Training ('.$topic.') - KOPUM IATMI';
        $temp_data['content'] = $this->load->view('admin_pages/edit_training', $this->data, true);
		$this->load->view('admin_pages/layout', $temp_data, false);
	}

	public function editTrainingProcess($id){
		$this->isNotAdmin();
		$this->isNotSuperAdmin();

		$query = $this->Mysql->read('trainings', array('id'=>$id), 'flyer', 'ASC', null, null);
		if($query->num_rows()>0){
			foreach($query->result() as $result){
				$flyer = $result->flyer;
				$proposal = $result->proposal;
				}
			}

		if(!empty($_FILES["proposal"]["name"])){
			unlink('uploads/proposals/'.$proposal);
			$config2['upload_path']          = './uploads/proposals/';
			$config2['allowed_types']        = 'pdf';
			$config2['max_size']             = 11000;
			$this->load->library('upload', $config2);
			$this->upload->initialize($config2);
			$this->upload->do_upload('proposal');
			$proposalNew = $this->upload->data('file_name');  
		}else{
			$proposalNew=$cv;
		}
		
		if(!empty($_FILES["flyer"]["name"])){
			unlink('uploads/flyers/'.$flyer);
			$config1['upload_path']          = './uploads/flyers/';
			$config1['allowed_types']        = 'jpg|png';
			$config1['max_size']             = 310;
			$this->load->library('upload', $config1);
			$this->upload->initialize($config1);
			$this->upload->do_upload('flyer');
			$flyerNew = $this->upload->data('file_name'); 
		}else{
			$flyerNew=$flyer;
		}

		$discipline = $this->input->post('discipline');
		foreach($discipline as $index => $disciplines){
			$discipline[$index] = $disciplines;
		}

		$topic = $this->input->post('topic');
        $city = $this->input->post('city');
        $venue = $this->input->post('venue');
		$discipline_1 = $discipline[0];
		$discipline_2 = $discipline[1];
		$discipline_3 = $discipline[2];
        $format = $this->input->post('format');
        $startDate = $this->input->post('startDate');
        $endDate = $this->input->post('endDate');
        $feeMember = $this->input->post('feeMember');
        $feeNonMember = $this->input->post('feeNonMember');
        $synopsis = $this->input->post('synopsis');
        $reservationLink = $this->input->post('reservationLink');
        $contactPerson1 = $this->input->post('contactPerson1');
        $telephone1 = $this->input->post('telephone1');
        $contactPerson2 = $this->input->post('contactPerson2');
        $telephone2 = $this->input->post('telephone2');
        $additionalInformation = $this->input->post('additionalInformation');

		$data   = array(
			'topic'=>$topic, 
			'city'=>$city, 
			'venue'=>$venue, 
			'discipline_1'=>$discipline_1, 
			'discipline_2'=>$discipline_2, 
			'discipline_3'=>$discipline_3, 
			'format'=>$format, 
			'start_date'=>$startDate, 
			'end_date'=>$endDate, 
			'fee_for_member'=>$feeMember, 
			'fee_for_nonmember'=>$feeNonMember, 
			'synopsis'=>$synopsis, 
			'reservation_link'=>$reservationLink, 
			'contact_person_1'=>$contactPerson1, 
			'telephone_1'=>$telephone1, 
			'contact_person_2'=>$contactPerson2, 
			'telephone_2'=>$telephone2, 
			'additional_information'=>$additionalInformation,
			'flyer'=>$flyerNew,
			'proposal'=>$proposalNew,
			'updated_at' => date('Y-m-d')
		);

		$update = $this->Mysql->update(array('id'=>$id), 'trainings', $data);

		$delete = $this->Mysql->delete(array('id_training'=>$id), 'trainings_and_instructors');

		$instructor = $this->input->post('instructor');
		$totalInstructor = count($instructor);

		for ($i=0; $i<$totalInstructor ; $i++){
			$data   = array(
				'id_training'=>$id, 
				'id_instructor'=>$instructor[$i]
			);
			$insert = $this->Mysql->create('trainings_and_instructors', $data);
		}

		$this->session->set_flashdata('message', 'edit_success');
		$this->session->set_flashdata('object', $topic);
		$this->session->set_flashdata('id', $id);

		redirect(site_url('admin/editTraining/'.$id));
	}
	/* end TRAININGS group */

	/* start SYLLABUSES group */

	public function showSyllabuses(){
		$this->isNotAdmin();
		$this->isNotSuperAdmin();
		$this->data['page_title'] = 'List of Syllabuses - KOPUM IATMI';
        $this->data['query_syllabuses'] = $this->Mysql->read('syllabuses', null, 'id', 'ASC', null, null);
        $this->data['query_trainings'] = $this->Mysql->read('trainings', null, 'id', 'ASC', null, null);
        $this->data['query_instructors'] = $this->Mysql->read('instructors', null, 'id', 'ASC', null, null);
        $this->data['query_trainings_and_instructors'] = $this->Mysql->read('trainings_and_instructors', null, 'id', 'ASC', null, null);
        $temp_data['content'] = $this->load->view('admin_pages/show_syllabuses', $this->data, true);
		$this->load->view('admin_pages/layout', $temp_data, false);
	}
	
	public function syllabusOf($id){
		$this->isNotAdmin();
		$this->isNotSuperAdmin();
		$query = $this->Mysql->read('trainings', array('id'=>$id), null, 'ASC', null, null);
		if($query->num_rows()>0){
			foreach($query->result() as $result){
				$topic = $result->topic;
				}
			}
		$this->data['page_title'] = 'Insert syllabus ('.$topic.') - KOPUM IATMI';
		$this->data['query_syllabuses'] = $this->Mysql->read('syllabuses', null, 'id', 'ASC', null, null);
        $this->data['query_trainings'] = $this->Mysql->read('trainings', array('id'=>$id), 'id', 'ASC', null, null);
        $this->data['query_instructors'] = $this->Mysql->read('instructors', null, 'id', 'ASC', null, null);
        $this->data['query_trainings_and_instructors'] = $this->Mysql->read('trainings_and_instructors', null, 'id', 'ASC', null, null);
        $temp_data['content'] = $this->load->view('admin_pages/insert_syllabus', $this->data, true);
		$this->load->view('admin_pages/layout', $temp_data, false);
	}

	public function insertSyllabusProcess(){
		$this->isNotAdmin();
		$this->isNotSuperAdmin();
		$id_training=$this->input->post('training');
        $data = array(
			'syllabus'=>$this->input->post('syllabus'),
			'instructor'=>$this->input->post('instructor'),
			'training'=>$this->input->post('training'),
			'day'=>$this->input->post('day'),
			'created_at' => date('Y-m-d')
		);
		$update = $this->Mysql->create('syllabuses',$data);
		

		$this->session->set_flashdata('message', 'add_success');
		$this->session->set_flashdata('object', $this->input->post('syllabus'));
		$query = $this->Mysql->getLatest('syllabuses');
		if($query->num_rows()>0){
			foreach($query->result() as $result){
				$id=$result->id;
				$id_training=$result->training;
			}
		}
		$yes=1;
		$update = $this->Mysql->update(array('id'=>$id_training), 'trainings', array('isSyllabusDefined'=>$yes));
		$this->session->set_flashdata('id', $id);

		redirect(site_url('admin/syllabusOf/'.$id_training));
	}

	public function deleteSyllabusProcess(){
		$this->isNotAdmin();
		$this->isNotSuperAdmin();
        $id = $this->input->post('id');
        $training = $this->input->post('training');
		$delete = $this->Mysql->delete(array('id'=>$id), 'syllabuses');
		$query = $this->Mysql->read('syllabuses', array('training'=>$training), 'id', 'ASC', null, null);
		if($query->num_rows()==0){
			$no=0;
			$update = $this->Mysql->update(array('id'=>$training), 'trainings', array('isSyllabusDefined'=>$no));
		}
		$this->session->set_flashdata('message', 'delete_success');
		$this->session->set_flashdata('object', $this->input->post('syllabus'));
		$this->session->set_flashdata('id', $this->input->post('id'));
		redirect(site_url('admin/syllabusOf/'.$training));
	}

	public function editSyllabusProcess(){
		$this->isNotAdmin();
		$this->isNotSuperAdmin();
		$id_training=$this->input->post('training');
		$id=$this->input->post('id');
        $data = array(
			'syllabus'=>$this->input->post('syllabus'),
			'instructor'=>$this->input->post('instructor'),
			'training'=>$this->input->post('training'),
			'day'=>$this->input->post('day'),
			'updated_at' => date('Y-m-d')
		);
		$yes=1;
		$update = $this->Mysql->update(array('id'=>$id), 'syllabuses',$data);
		

		$this->session->set_flashdata('message', 'edit_success');
		$this->session->set_flashdata('object', $this->input->post('syllabus'));
		$this->session->set_flashdata('id', $id);

		redirect(site_url('admin/syllabusOf/'.$id_training));
	}
	/* end SYLLABUSES group */
	

	/* start INSTRUCTORS GROUP */
	public function showInstructors(){
		$this->isNotAdmin();
		$this->isNotSuperAdmin();
		$this->data['page_title'] = 'List of Instructors - KOPUM IATMI';
        $this->data['query'] = $this->Mysql->read('instructors', null, 'id', 'ASC', null, null);
        $temp_data['content'] = $this->load->view('admin_pages/show_instructors', $this->data, true);
		$this->load->view('admin_pages/layout', $temp_data, false);
	}

	public function addInstructor(){
		$this->isNotAdmin();
		$this->isNotSuperAdmin();
		$this->data['page_title'] = 'Add New Instructor - KOPUM IATMI';
        $this->data['query'] = $this->Mysql->read('instructors', null, 'id', 'ASC', null, null);
        $temp_data['content'] = $this->load->view('admin_pages/add_instructor', $this->data, true);
		$this->load->view('admin_pages/layout', $temp_data, false);
	}

	public function addInstructorProcess(){
		$this->isNotAdmin();
		$this->isNotSuperAdmin();
		
		if(!empty($_FILES["cv"]["name"])){
			$config2['upload_path']          = './uploads/doc/';
			$config2['allowed_types']        = 'pdf';
			$config2['max_size']             = 1100;
			$this->load->library('upload', $config2);
			$this->upload->initialize($config2);
			$this->upload->do_upload('cv');
			$docPath = $this->upload->data('file_name');  
		}else{
			$docPath='';
		}
		
		if(!empty($_FILES["photo"]["name"])){
			$config1['upload_path']          = './uploads/img/';
			$config1['allowed_types']        = 'jpg|png';
			$config1['max_size']             = 310;
			$this->load->library('upload', $config1);
			$this->upload->initialize($config1);
			$this->upload->do_upload('photo');
			$photoPath = $this->upload->data('file_name'); 
		}else{
			$photoPath='';
		}
		 

		$frontAcademic = $this->input->post('frontAcademic');
        $fullName = $this->input->post('fullName');
        $backAcademic = $this->input->post('backAcademic');
        $jobTitle = $this->input->post('jobTitle');
        $company = $this->input->post('company');
        $specialization = $this->input->post('specialization');
        $cityAddress = $this->input->post('cityAddress');
        $nationality = $this->input->post('nationality');
        $bachelorMajor = $this->input->post('bachelorMajor');
        $bachelorUniversity = $this->input->post('bachelorUniversity');
        $masterMajor = $this->input->post('masterMajor');
        $masterUniversity = $this->input->post('masterUniversity');
        $doctorMajor = $this->input->post('doctorMajor');
        $doctorUniversity = $this->input->post('doctorUniversity');
        $linkedin = $this->input->post('linkedin');
        $facebook = $this->input->post('facebook');
        $twitter = $this->input->post('twitter');
        $instagram = $this->input->post('instagram');
        $google_plus = $this->input->post('google_plus');
        $web = $this->input->post('web');
		$email = $this->input->post('email');
		

		$data   = array(
			'academic_title_front'=>$frontAcademic, 
			'name'=>$fullName, 
			'academic_title_back'=>$backAcademic, 
			'job_title'=>$jobTitle, 
			'company'=>$company, 
			'specialization'=>$specialization, 
			'city_address'=>$cityAddress, 
			'nationality'=>$nationality, 
			'bachelor_major'=>$bachelorMajor, 
			'bachelor_university'=>$bachelorUniversity, 
			'master_major'=>$masterMajor, 
			'master_university'=>$masterUniversity, 
			'doctor_major'=>$doctorMajor, 
			'doctor_university'=>$doctorUniversity, 
			'linkedin'=>$linkedin, 
			'facebook'=>$facebook, 
			'instagram'=>$instagram, 
			'twitter'=>$twitter, 
			'google_plus'=>$google_plus, 
			'blog'=>$web, 
			'email'=>$email, 
			'photo'=>$photoPath, 
			'cv'=>$docPath,
			'created_at' => date('Y-m-d')
		);
		$insert = $this->Mysql->create('instructors', $data);

		$this->session->set_flashdata('message', 'add_success');
		$this->session->set_flashdata('object', $fullName);
		$query = $this->Mysql->getLatest('instructors');
		if($query->num_rows()>0){
			foreach($query->result() as $result){
				$id=$result->id;
			}
		}
		$this->session->set_flashdata('id', $id);

        redirect(site_url('admin/showInstructors'));
	}

	public function deleteInstructorProcess(){
		$this->isNotAdmin();
		$this->isNotSuperAdmin();
        $id = $this->input->post('id');
		$fullName = $this->input->post('fullName');
		
		$query = $this->Mysql->read('instructors', array('id'=>$id), 'photo', 'ASC', null, null);
		if($query->num_rows()>0){
			foreach($query->result() as $result){
				$photo = $result->photo;
				$cv = $result->cv;
				}
			}

		$delete = $this->Mysql->delete(array('id'=>$id), 'instructors');

		
		unlink('uploads/doc/'.$cv);
		unlink('uploads/img/'.$photo);


		$this->session->set_flashdata('message', 'delete_success');
		$this->session->set_flashdata('object', $fullName);
		$this->session->set_flashdata('id', $this->input->post('id'));
		redirect(site_url('admin/showInstructors'));
	}

	public function editInstructor($id){
		$this->isNotAdmin();
		$this->isNotSuperAdmin();
		$this->data['query'] = $this->Mysql->read('instructors', array('id'=>$id), 'id', 'ASC', null, null);
		$query = $this->Mysql->read('instructors', array('id'=>$id), 'id', 'ASC', null, null);
		if($query->num_rows()>0){
			foreach($query->result() as $result){
				$name = $result->name;
				}
			}
		$this->data['page_title'] = 'Edit Instructor ('.$name.') - KOPUM IATMI';
        $temp_data['content'] = $this->load->view('admin_pages/edit_instructor', $this->data, true);
		$this->load->view('admin_pages/layout', $temp_data, false);
	}

	public function editInstructorProcess($id){
		$this->isNotAdmin();
		$this->isNotSuperAdmin();

		$query = $this->Mysql->read('instructors', array('id'=>$id), 'photo', 'ASC', null, null);
		if($query->num_rows()>0){
			foreach($query->result() as $result){
				$photo = $result->photo;
				$cv = $result->cv;
				}
			}

		if(!empty($_FILES["cv"]["name"])){
			unlink('uploads/doc/'.$cv);
			$config2['upload_path']          = './uploads/doc/';
			$config2['allowed_types']        = 'pdf';
			$config2['max_size']             = 1100;
			$this->load->library('upload', $config2);
			$this->upload->initialize($config2);
			$this->upload->do_upload('cv');
			$docPath = $this->upload->data('file_name');  
		}else{
			$docPath=$cv;
		}
		
		if(!empty($_FILES["photo"]["name"])){
			unlink('uploads/img/'.$photo);
			$config1['upload_path']          = './uploads/img/';
			$config1['allowed_types']        = 'jpg|png';
			$config1['max_size']             = 310;
			$this->load->library('upload', $config1);
			$this->upload->initialize($config1);
			$this->upload->do_upload('photo');
			$photoPath = $this->upload->data('file_name'); 
		}else{
			$photoPath=$photo;
		}

		$frontAcademic = $this->input->post('frontAcademic');
        $fullName = $this->input->post('fullName');
        $backAcademic = $this->input->post('backAcademic');
        $jobTitle = $this->input->post('jobTitle');
        $company = $this->input->post('company');
        $specialization = $this->input->post('specialization');
        $cityAddress = $this->input->post('cityAddress');
        $nationality = $this->input->post('nationality');
        $bachelorMajor = $this->input->post('bachelorMajor');
        $bachelorUniversity = $this->input->post('bachelorUniversity');
        $masterMajor = $this->input->post('masterMajor');
        $masterUniversity = $this->input->post('masterUniversity');
        $doctorMajor = $this->input->post('doctorMajor');
        $doctorUniversity = $this->input->post('doctorUniversity');
        $linkedin = $this->input->post('linkedin');
        $facebook = $this->input->post('facebook');
        $twitter = $this->input->post('twitter');
        $instagram = $this->input->post('instagram');
        $google_plus = $this->input->post('google_plus');
        $web = $this->input->post('web');
		$email = $this->input->post('email');

		$data   = array(
			'academic_title_front'=>$frontAcademic, 
			'name'=>$fullName, 
			'academic_title_back'=>$backAcademic, 
			'job_title'=>$jobTitle, 
			'company'=>$company, 
			'specialization'=>$specialization, 
			'city_address'=>$cityAddress, 
			'nationality'=>$nationality, 
			'bachelor_major'=>$bachelorMajor, 
			'bachelor_university'=>$bachelorUniversity, 
			'master_major'=>$masterMajor, 
			'master_university'=>$masterUniversity, 
			'doctor_major'=>$doctorMajor, 
			'doctor_university'=>$doctorUniversity, 
			'linkedin'=>$linkedin, 
			'facebook'=>$facebook, 
			'instagram'=>$instagram, 
			'twitter'=>$twitter, 
			'google_plus'=>$google_plus, 
			'blog'=>$web, 
			'email'=>$email,
			'photo'=>$photoPath, 
			'cv'=>$docPath,
			'updated_at' => date('Y-m-d')
		);

		$update = $this->Mysql->update(array('id'=>$id), 'instructors', $data);
		$this->session->set_flashdata('message', 'edit_success');
		$this->session->set_flashdata('object', $fullName);
		$this->session->set_flashdata('id', $id);

		redirect(site_url('admin/editInstructor/'.$id));
	}

	public function processDeletePhoto($id){
		$this->isNotAdmin();
		$this->isNotSuperAdmin();
		$this->load->helper("file");

		$query = $this->Mysql->read('instructors', array('id'=>$id), 'photo', 'ASC', null, null);
		if($query->num_rows()>0){
			foreach($query->result() as $result){
				$photo = $result->photo;
				unlink('uploads/img/'.$photo);
				}
			}
		$update = $this->Mysql->update(array('id'=>$id), 'instructors', array('photo'=>''));
		redirect(site_url('admin/editInstructor/'.$id));
	}

	public function processDeleteCV($id){
		$this->isNotAdmin();
		$this->isNotSuperAdmin();
		$this->load->helper("file");

		$query = $this->Mysql->read('instructors', array('id'=>$id), 'cv', 'ASC', null, null);
		if($query->num_rows()>0){
			foreach($query->result() as $result){
				$cv = $result->cv;
				unlink('uploads/doc/'.$cv);
				}
			}
		$update = $this->Mysql->update(array('id'=>$id), 'instructors', array('cv'=>''));
		redirect(site_url('admin/editInstructor/'.$id));
	}
	/* end INSTRUCTORS GROUP */

	/* start formats GROUP */
	public function showFormats(){
		$this->isNotAdmin();
		$this->isNotSuperAdmin();
		$this->data['page_title'] = 'List of Formats - KOPUM IATMI';
        $this->data['query'] = $this->Mysql->read('formats', null, 'id', 'ASC', null, null);
        $temp_data['content'] = $this->load->view('admin_pages/show_formats', $this->data, true);
		$this->load->view('admin_pages/layout', $temp_data, false);
	}

	public function addFormatProcess(){
		$this->isNotAdmin();
		$this->isNotSuperAdmin();
        $data = array(
			'format'=>$this->input->post('format'),
			'created_at' => date('Y-m-d')
		);
		$update = $this->Mysql->create('formats',$data);

		$this->session->set_flashdata('message', 'add_success');
		$this->session->set_flashdata('object', $this->input->post('format'));
		$query = $this->Mysql->getLatest('formats');
		if($query->num_rows()>0){
			foreach($query->result() as $result){
				$id=$result->id;
			}
		}
		$this->session->set_flashdata('id', $id);
		redirect(site_url('admin/showFormats'));
	}

	public function editFormatProcess(){
		$this->isNotAdmin();
		$this->isNotSuperAdmin();
        $id = $this->input->post('id');
		$format = $this->input->post('format');
		$date=date('Y-m-d');
		$update = $this->Mysql->update(array('id'=>$id), 'formats', array('format'=>$format, 'updated_at'=>$date));
		$this->session->set_flashdata('message', 'edit_success');
		$this->session->set_flashdata('object', $this->input->post('format'));
		$this->session->set_flashdata('id', $this->input->post('id'));
		redirect(site_url('admin/showFormats'));
	}

	public function deleteFormatProcess(){
		$this->isNotAdmin();
		$this->isNotSuperAdmin();
        $id = $this->input->post('id');
        $format = $this->input->post('format');
		$delete = $this->Mysql->delete(array('id'=>$id), 'formats');
		$this->session->set_flashdata('message', 'delete_success');
		$this->session->set_flashdata('object', $this->input->post('format'));
		$this->session->set_flashdata('id', $this->input->post('id'));
		redirect(site_url('admin/showFormats'));
	}
	/* end FORMATS GROUP */

	/* start discipline GROUP */
	public function showDisciplines(){
		$this->isNotAdmin();
		$this->isNotSuperAdmin();
		$this->data['page_title'] = 'List of Disciplines - KOPUM IATMI';
        $this->data['query'] = $this->Mysql->read('disciplines', null, 'id', 'ASC', null, null);
        $temp_data['content'] = $this->load->view('admin_pages/show_disciplines', $this->data, true);
		$this->load->view('admin_pages/layout', $temp_data, false);
	}

	public function addDisciplineProcess(){
		$this->isNotAdmin();
		$this->isNotSuperAdmin();
        $data = array(
			'discipline'=>$this->input->post('discipline'),
			'created_at' => date('Y-m-d')
		);
		$update = $this->Mysql->create('disciplines',$data);

		$this->session->set_flashdata('message', 'add_success');
		$this->session->set_flashdata('object', $this->input->post('discipline'));
		$query = $this->Mysql->getLatest('formats');
		if($query->num_rows()>0){
			foreach($query->result() as $result){
				$id=$result->id;
			}
		}
		$this->session->set_flashdata('id', $id);

		redirect(site_url('admin/showDisciplines'));
	}

	public function editDisciplineProcess(){
		$this->isNotAdmin();
		$this->isNotSuperAdmin();
        $id = $this->input->post('id');
		$discipline = $this->input->post('discipline');
		$date=date('Y-m-d');
		$update = $this->Mysql->update(array('id'=>$id), 'disciplines', array('discipline'=>$discipline, 'updated_at'=>$date));
		$this->session->set_flashdata('message', 'edit_success');
		$this->session->set_flashdata('object', $this->input->post('discipline'));
		$this->session->set_flashdata('id', $this->input->post('id'));
		redirect(site_url('admin/showDisciplines'));
	}

	public function deleteDisciplineProcess(){
		$this->isNotAdmin();
		$this->isNotSuperAdmin();
        $id = $this->input->post('id');
        $discipline = $this->input->post('discipline');
		$delete = $this->Mysql->delete(array('id'=>$id), 'disciplines');
		$this->session->set_flashdata('message', 'delete_success');
		$this->session->set_flashdata('object', $this->input->post('discipline'));
		$this->session->set_flashdata('id', $this->input->post('id'));
		redirect(site_url('admin/showDisciplines'));
	}
	/* end discipline GROUP */


	/* start PUBLIC DOCUMENTS group */
	public function showDocuments(){
		$this->isNotAdmin();
		$this->isNotSuperAdmin();
		$this->data['page_title'] = 'List of Public Documents - KOPUM IATMI';
        $this->data['query'] = $this->Mysql->read('documents', null, 'id', 'ASC', null, null);
        $temp_data['content'] = $this->load->view('admin_pages/show_documents', $this->data, true);
		$this->load->view('admin_pages/layout', $temp_data, false);
	}

	public function addDocumentProcess(){
		$this->isNotAdmin();
		$this->isNotSuperAdmin();

		if(!empty($_FILES["doc"]["name"])){
			$config2['upload_path']          = './uploads/public_documents/';
			$config2['allowed_types']        = '*';
			$config2['max_size']             = 11000;
			$this->load->library('upload', $config2);
			$this->upload->initialize($config2);
			$this->upload->do_upload('doc');
			$location = $this->upload->data('file_name');  
			$type = $this->upload->data('file_ext');  
			$name = $this->input->post('name');
			
			$data   = array(
				'location'=>$location, 
				'type'=>$type, 
				'name'=>$name,
				'created_at' => date('Y-m-d')
			);
			$insert = $this->Mysql->create('documents', $data);
			redirect(site_url('admin/showDocuments'));
		}else{
			redirect(site_url('admin/showDocuments'));
		}
	}

	public function deleteDocumentProcess(){
		$this->isNotAdmin();
		$this->isNotSuperAdmin();

        $id = $this->input->post('id');
        $name = $this->input->post('name');
		
		$query = $this->Mysql->read('documents', array('id'=>$id), 'id', 'ASC', null, null);
		if($query->num_rows()>0){
			foreach($query->result() as $result){
				$location = $result->location;
				}
			}

		$delete = $this->Mysql->delete(array('id'=>$id), 'documents');

		unlink('uploads/public_documents/'.$location);

		$this->session->set_flashdata('message', 'delete_success');
		$this->session->set_flashdata('object', $name);
		$this->session->set_flashdata('id', $this->input->post('id'));
		redirect(site_url('admin/showDocuments'));
	}

	public function editDocumentProcess($id){
		$this->isNotAdmin();
		$this->isNotSuperAdmin();

		$query = $this->Mysql->read('documents', array('id'=>$id), 'id', 'ASC', null, null);
		if($query->num_rows()>0){
			foreach($query->result() as $result){
				$location = $result->location;
				$type = $result->type;
				}
			}

		$name = $this->input->post('name');

		if(!empty($_FILES["doc"]["name"])){
			$config2['upload_path']          = './uploads/public_documents/';
			$config2['allowed_types']        = '*';
			$config2['max_size']             = 11000;
			$this->load->library('upload', $config2);
			$this->upload->initialize($config2);
			$this->upload->do_upload('doc');
			$location = $this->upload->data('file_name');  
			$type = $this->upload->data('file_ext');
		}else{
			$location=$location;
			$type=$type;
		}

		$data   = array(
			'name'=>$name, 
			'type'=>$type, 
			'location'=>$location,
			'updated_at' => date('Y-m-d')
		);

		$update = $this->Mysql->update(array('id'=>$id), 'documents', $data);

		$this->session->set_flashdata('message', 'edit_success');
		$this->session->set_flashdata('object', $name);
		$this->session->set_flashdata('id', $id);

		redirect(site_url('admin/showDocuments'));
	}
	/* end PUBLIC DOCUMENTS group */

	/* start GALLERY group */
	public function showGallery(){
		$this->isNotAdmin();
		$this->isNotSuperAdmin();
		$this->data['page_title'] = 'Gallery - KOPUM IATMI';
        $this->data['query_gallery'] = $this->Mysql->read('gallery', null, 'id', 'ASC', null, null);
        $this->data['query_trainings'] = $this->Mysql->read('trainings', null, 'id', 'ASC', null, null);
        $temp_data['content'] = $this->load->view('admin_pages/show_gallery', $this->data, true);
		$this->load->view('admin_pages/layout', $temp_data, false);
	}

	public function addGalleryProcess(){
		$this->isNotAdmin();
		$this->isNotSuperAdmin();
		
		$id_training = $this->input->post('id_training');
        $url = $this->input->post('url');
        $title = $this->input->post('title');

		$data   = array(
			'id_training'=>$id_training, 
			'url'=>$url, 
			'title'=>$title
		);
		$insert = $this->Mysql->create('gallery', $data);

		$query = $this->Mysql->getLatest('gallery');
		if($query->num_rows()>0){
			foreach($query->result() as $result){
				$latestGalleryID=$result->id;
			}
		}

		$this->session->set_flashdata('message', 'add_success');
		$this->session->set_flashdata('object', $title);
		$this->session->set_flashdata('id', $latestGalleryID);

        redirect(site_url('admin/showGallery'));
	}

	public function editGalleryProcess(){
		$this->isNotAdmin();
		$this->isNotSuperAdmin();
		$id=$this->input->post('id_gallery');
        $data = array(
			'url'=>$this->input->post('url'),
			'title'=>$this->input->post('title')
		);

		$update = $this->Mysql->update(array('id'=>$id), 'gallery',$data);
		

		$this->session->set_flashdata('message', 'edit_success');
		$this->session->set_flashdata('object', $this->input->post('title'));
		$this->session->set_flashdata('id', $id);

		redirect(site_url('admin/showGallery'));
	}

	public function deleteGalleryProcess(){
		$this->isNotAdmin();
		$this->isNotSuperAdmin();
        $id = $this->input->post('id');
        $title = $this->input->post('title');
		$delete = $this->Mysql->delete(array('id'=>$id), 'gallery');

		$this->session->set_flashdata('message', 'delete_success');
		$this->session->set_flashdata('object', $title);
		$this->session->set_flashdata('id', $id);
		redirect(site_url('admin/showGallery'));
	}

	/* end GALLERY group */
	

	/* start TESTIMONIALS group */
	public function showTestimonials(){
		$this->isNotAdmin();
		$this->isNotSuperAdmin();
		$this->data['page_title'] = 'Testimonials - KOPUM IATMI';
        $this->data['query_testimonials'] = $this->Mysql->read('testimonials', null, 'id', 'ASC', null, null);
        $this->data['query_trainings'] = $this->Mysql->read('trainings', null, 'id', 'ASC', null, null);
        $temp_data['content'] = $this->load->view('admin_pages/show_testimonials', $this->data, true);
		$this->load->view('admin_pages/layout', $temp_data, false);
	}
	
	public function addTestiProcess(){
		$this->isNotAdmin();
		$this->isNotSuperAdmin();
		
		$id_training = $this->input->post('id_training');
        $commenter_name = $this->input->post('name');
        $commenter_title = $this->input->post('title');
        $commenter_company = $this->input->post('company');
        $comment = $this->input->post('testimony');
        $overall = $this->input->post('overall');

		$data   = array(
			'id_training'=>$id_training, 
			'commenter_name'=>$commenter_name,
			'commenter_title'=>$commenter_title,
			'commenter_company'=>$commenter_company,
			'comment'=>$comment,
			'overall'=>$overall
		);
		$insert = $this->Mysql->create('testimonials', $data);

		$query = $this->Mysql->getLatest('testimonials');
		if($query->num_rows()>0){
			foreach($query->result() as $result){
				$latestTestimonyID=$result->id;
			}
		}

		$this->session->set_flashdata('message', 'add_success');
		$this->session->set_flashdata('object', $comment);
		$this->session->set_flashdata('id', $latestTestimonyID);

        redirect(site_url('admin/showTestimonials'));
	}

	public function editTestiProcess(){
		$this->isNotAdmin();
		$this->isNotSuperAdmin();
		$id_t1=$this->input->post('id_t1');
		$testimony=$this->input->post('testimony');
		$overall=$this->input->post('overall');
        $data = array(
			'overall'=>$overall,
			'comment'=>$testimony
		);

		$update = $this->Mysql->update(array('id'=>$id_t1), 'testimonials', $data);
		

		$this->session->set_flashdata('message', 'edit_success');
		$this->session->set_flashdata('object', $testimony);
		$this->session->set_flashdata('id', $id);

		redirect(site_url('admin/showTestimonials'));
	}

	public function deleteTestiProcess(){
		$this->isNotAdmin();
		$this->isNotSuperAdmin();
        $id = $this->input->post('id');
        $testimony = $this->input->post('testimony');
		$delete = $this->Mysql->delete(array('id'=>$id), 'testimonials');

		$this->session->set_flashdata('message', 'delete_success');
		$this->session->set_flashdata('object', $testimony);
		$this->session->set_flashdata('id', $id);
		redirect(site_url('admin/showTestimonials'));
	}
	/* end TESTIMONIALS group */

	/* start SETTINGS group */
	public function settings(){
		$this->isNotAdmin();
		$this->isNotSuperAdmin();
		$temp_data['page_title'] = 'Settings - KOPUM IATMI';
        $this->data['query'] = $this->Mysql->read('admins', array('id'=>1), 'email', 'ASC', null, null);
        $temp_data['content'] = $this->load->view('admin_pages/settings', $this->data, true);
		$this->load->view('admin_pages/layout', $temp_data, false);
	}

	public function changeSuperAdminPasswordProcess(){
		$this->isNotAdmin();
		$this->isNotSuperAdmin();
        $oldPIN = md5($this->input->post('oldPIN'));
        $newPIN = md5($this->input->post('newPIN'));
		$confirmNewPIN = md5($this->input->post('confirmNewPIN'));
		$query = $this->Mysql->read('admins', array('id'=>1), null, null, null, null);
		if($query->num_rows()>0){
			foreach($query->result() as $result){
				$id=$result->id;
				$PIN = $result->PIN;
			}
		}

		//compare
		$query_compare = $this->Mysql->read('admins', array('id'=>2), null, null, null, null);
		if($query_compare->num_rows()>0){
			foreach($query_compare->result() as $result){
				$PIN_compare = $result->PIN;
			}
		}

		if($newPIN == $confirmNewPIN && $oldPIN == $PIN && $newPIN != $PIN_compare){
			$update = $this->Mysql->update(array('id'=>1), 'admins', array('PIN'=>$newPIN));
			echo "<script>alert('PIN has been changed');</script>";
		}else{
			echo "<script>alert('Sorry, failed to change PIN');</script>";
		}
		redirect(site_url('admin/settings'), 'refresh');
	}

	public function changeAdminPasswordProcess(){
		$this->isNotAdmin();
		$this->isNotSuperAdmin();
        $oldPIN = md5($this->input->post('oldPIN'));
        $newPIN = md5($this->input->post('newPIN'));
		$confirmNewPIN = md5($this->input->post('confirmNewPIN'));
		$query = $this->Mysql->read('admins', array('id'=>2), null, null, null, null);
		if($query->num_rows()>0){
			foreach($query->result() as $result){
				$id=$result->id;
				$PIN = $result->PIN;
			}
		}

		//compare
		$query_compare = $this->Mysql->read('admins', array('id'=>1), null, null, null, null);
		if($query_compare->num_rows()>0){
			foreach($query_compare->result() as $result){
				$PIN_compare = $result->PIN;
			}
		}

		if($newPIN == $confirmNewPIN && $oldPIN == $PIN && $newPIN != $PIN_compare){
			$update = $this->Mysql->update(array('id'=>2), 'admins', array('PIN'=>$newPIN));
			echo "<script>alert('PIN has been changed');</script>";
		}else{
			echo "<script>alert('Sorry, failed to change PIN');</script>";
		}
		redirect(site_url('admin/settings'), 'refresh');
	}

	public function changeEmailBackupProcess(){
		$this->isNotAdmin();
		$this->isNotSuperAdmin();
        $checkPIN = md5($this->input->post('PIN'));
        $newBackupEmail = $this->input->post('newBackupEmail');
		$confirmNewBackupEmail = $this->input->post('confirmNewBackupEmail');
		$query = $this->Mysql->read('admins', array('id'=>1), null, null, null, null);
		if($query->num_rows()>0){
			foreach($query->result() as $result){
				$id=$result->id;
				$PIN = $result->PIN;
				$email = $result->email;
			}
		}

		if($checkPIN == $PIN && $newBackupEmail == $confirmNewBackupEmail && $newBackupEmail != $email){
			$update = $this->Mysql->update(array('id'=>1), 'admins', array('email'=>$newBackupEmail));
			echo "<script>alert('Backup email has been changed');</script>";
		}else{
			echo "<script>alert('Sorry, failed to change backup email');</script>";
		}
		redirect(site_url('admin/settings'), 'refresh');
	}
	/* end SETTINGS group */
}
