<?php
class StaffController extends Controller{
	public function __construct(){
	}
	public function index(){
		view("Staff");
	}
	public function create(){
		view("Staff");
	}
public function save($data,$file){
	if(isset($data["create"])){
	$errors=[];
/*
	if(!preg_match("/^[\s\S]+$/",$_POST["txtName"])){
		$errors["name"]="Invalid name";
	}
	if(!preg_match("/^[\s\S]+$/",$data["role_id"])){
		$errors["role_id"]="Invalid role_id";
	}
	if(!is_valid_email($data["email"])){
		$errors["email"]="Invalid email";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtPhone"])){
		$errors["phone"]="Invalid phone";
	}
	if(!preg_match("/^[\s\S]+$/",$data["address"])){
		$errors["address"]="Invalid address";
	}
	if(!preg_match("/^[\s\S]+$/",$data["work_schedule"])){
		$errors["work_schedule"]="Invalid work_schedule";
	}
	if(!preg_match("/^[\s\S]+$/",$data["hired_date"])){
		$errors["hired_date"]="Invalid hired_date";
	}
	if(!preg_match("/^[\s\S]+$/",$data["performance_score"])){
		$errors["performance_score"]="Invalid performance_score";
	}

*/
		if(count($errors)==0){
			$staff=new Staff();
		$staff->name=$data["name"];
		$staff->role_id=$data["role_id"];
		$staff->email=$data["email"];
		$staff->phone=$data["phone"];
		$staff->address=$data["address"];
		$staff->work_schedule=$data["work_schedule"];
		$staff->hired_date=$data["hired_date"];
		$staff->performance_score=$data["performance_score"];
		$staff->created_at=$now;
		$staff->updated_at=$now;

			$staff->save();
		redirect();
		}else{
			 print_r($errors);
		}
	}
}
public function edit($id){
		view("Staff",Staff::find($id));
}
public function update($data,$file){
	if(isset($data["update"])){
	$errors=[];
/*
	if(!preg_match("/^[\s\S]+$/",$_POST["txtName"])){
		$errors["name"]="Invalid name";
	}
	if(!preg_match("/^[\s\S]+$/",$data["role_id"])){
		$errors["role_id"]="Invalid role_id";
	}
	if(!is_valid_email($data["email"])){
		$errors["email"]="Invalid email";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtPhone"])){
		$errors["phone"]="Invalid phone";
	}
	if(!preg_match("/^[\s\S]+$/",$data["address"])){
		$errors["address"]="Invalid address";
	}
	if(!preg_match("/^[\s\S]+$/",$data["work_schedule"])){
		$errors["work_schedule"]="Invalid work_schedule";
	}
	if(!preg_match("/^[\s\S]+$/",$data["hired_date"])){
		$errors["hired_date"]="Invalid hired_date";
	}
	if(!preg_match("/^[\s\S]+$/",$data["performance_score"])){
		$errors["performance_score"]="Invalid performance_score";
	}

*/
		if(count($errors)==0){
			$staff=new Staff();
			$staff->id=$data["id"];
		$staff->name=$data["name"];
		$staff->role_id=$data["role_id"];
		$staff->email=$data["email"];
		$staff->phone=$data["phone"];
		$staff->address=$data["address"];
		$staff->work_schedule=$data["work_schedule"];
		$staff->hired_date=$data["hired_date"];
		$staff->performance_score=$data["performance_score"];
		$staff->created_at=$now;
		$staff->updated_at=$now;

		$staff->update();
		redirect();
		}else{
			 print_r($errors);
		}
	}
}
	public function confirm($id){
		view("Staff");
	}
	public function delete($id){
		Staff::delete($id);
		redirect();
	}
	public function show($id){
		view("Staff",Staff::find($id));
	}
}
?>
