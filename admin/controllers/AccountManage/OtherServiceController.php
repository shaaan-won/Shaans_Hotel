<?php
class OtherServiceController extends Controller{
	public function __construct(){
	}
	public function index(){
		view("AccountManage");
	}
	public function create(){
		view("AccountManage");
	}
public function save($data,$file){
	if(isset($data["create"])){
	$errors=[];
/*
	if(!preg_match("/^[\s\S]+$/",$_POST["txtName"])){
		$errors["name"]="Invalid name";
	}
	if(!preg_match("/^[\s\S]+$/",$data["description"])){
		$errors["description"]="Invalid description";
	}
	if(!preg_match("/^[\s\S]+$/",$data["status_id"])){
		$errors["status_id"]="Invalid status_id";
	}
	if(!preg_match("/^[\s\S]+$/",$data["price"])){
		$errors["price"]="Invalid price";
	}

*/		global $now;
		if(count($errors)==0){
			$otherservice=new OtherService();
		$otherservice->name=$data["name"];
		$otherservice->description=$data["description"];
		$otherservice->status_id=$data["status_id"];
		$otherservice->price=$data["price"];
		$otherservice->created_at=$now;

			$otherservice->save();
		redirect();
		}else{
			 print_r($errors);
		}
	}
}
public function edit($id){
		view("AccountManage",OtherService::find($id));
}
public function update($data,$file){
	if(isset($data["update"])){
	$errors=[];
/*
	if(!preg_match("/^[\s\S]+$/",$_POST["txtName"])){
		$errors["name"]="Invalid name";
	}
	if(!preg_match("/^[\s\S]+$/",$data["description"])){
		$errors["description"]="Invalid description";
	}
	if(!preg_match("/^[\s\S]+$/",$data["status_id"])){
		$errors["status_id"]="Invalid status_id";
	}
	if(!preg_match("/^[\s\S]+$/",$data["price"])){
		$errors["price"]="Invalid price";
	}

*/		global $now;
		if(count($errors)==0){
			$otherservice=new OtherService();
			$otherservice->id=$data["id"];
		$otherservice->name=$data["name"];
		$otherservice->description=$data["description"];
		$otherservice->status_id=$data["status_id"];
		$otherservice->price=$data["price"];
		$otherservice->created_at=$now;

		$otherservice->update();
		redirect();
		}else{
			 print_r($errors);
		}
	}
}
	public function confirm($id){
		view("AccountManage");
	}
	public function delete($id){
		OtherService::delete($id);
		redirect();
	}
	public function show($id){
		view("AccountManage",OtherService::find($id));
	}
}
?>
