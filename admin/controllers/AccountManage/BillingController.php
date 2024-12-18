<?php
class BillingController extends Controller{
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
	if(!preg_match("/^[\s\S]+$/",$data["reservation_id"])){
		$errors["reservation_id"]="Invalid reservation_id";
	}
	if(!preg_match("/^[\s\S]+$/",$data["user_id"])){
		$errors["user_id"]="Invalid user_id";
	}
	if(!preg_match("/^[\s\S]+$/",$data["room_id"])){
		$errors["room_id"]="Invalid room_id";
	}
	if(!preg_match("/^[\s\S]+$/",$data["customer_id"])){
		$errors["customer_id"]="Invalid customer_id";
	}
	if(!preg_match("/^[\s\S]+$/",$data["room_price"])){
		$errors["room_price"]="Invalid room_price";
	}
	if(!preg_match("/^[\s\S]+$/",$data["tax"])){
		$errors["tax"]="Invalid tax";
	}
	if(!preg_match("/^[\s\S]+$/",$data["discount"])){
		$errors["discount"]="Invalid discount";
	}
	if(!preg_match("/^[\s\S]+$/",$data["other_service_id"])){
		$errors["other_service_id"]="Invalid other_service_id";
	}
	if(!preg_match("/^[\s\S]+$/",$data["other_service_price"])){
		$errors["other_service_price"]="Invalid other_service_price";
	}
	if(!preg_match("/^[\s\S]+$/",$data["cleaning_charges"])){
		$errors["cleaning_charges"]="Invalid cleaning_charges";
	}
	if(!preg_match("/^[\s\S]+$/",$data["service_charges"])){
		$errors["service_charges"]="Invalid service_charges";
	}
	if(!preg_match("/^[\s\S]+$/",$data["total_amount"])){
		$errors["total_amount"]="Invalid total_amount";
	}
	if(!preg_match("/^[\s\S]+$/",$data["payment_method_id"])){
		$errors["payment_method_id"]="Invalid payment_method_id";
	}

*/	
		global $now;
		if(count($errors)==0){
			$billing=new Billing();
		$billing->reservation_id=$data["reservation_id"];
		$billing->user_id=$data["user_id"];
		$billing->room_id=$data["room_id"];
		$billing->customer_id=$data["customer_id"];
		$billing->check_in_date=date("Y-m-d",strtotime($data["check_in_date"]));
		$billing->check_out_date=date("Y-m-d",strtotime($data["check_out_date"]));
		$billing->room_price=$data["room_price"];
		$billing->tax=$data["tax"];
		$billing->discount=$data["discount"];
		$billing->other_service_id=$data["other_service_id"];
		$billing->other_service_price=$data["other_service_price"];
		$billing->cleaning_charges=$data["cleaning_charges"];
		$billing->service_charges=$data["service_charges"];
		$billing->total_amount=$data["total_amount"];
		$billing->payment_method_id=$data["payment_method_id"];
		$billing->payment_date=$now;
		$billing->created_at=$now;

			$billing->save();
		redirect();
		}else{
			 print_r($errors);
		}
	}
}
public function edit($id){
		view("AccountManage",Billing::find($id));
}
public function update($data,$file){
	if(isset($data["update"])){
	$errors=[];
/*
	if(!preg_match("/^[\s\S]+$/",$data["reservation_id"])){
		$errors["reservation_id"]="Invalid reservation_id";
	}
	if(!preg_match("/^[\s\S]+$/",$data["user_id"])){
		$errors["user_id"]="Invalid user_id";
	}
	if(!preg_match("/^[\s\S]+$/",$data["room_id"])){
		$errors["room_id"]="Invalid room_id";
	}
	if(!preg_match("/^[\s\S]+$/",$data["customer_id"])){
		$errors["customer_id"]="Invalid customer_id";
	}
	if(!preg_match("/^[\s\S]+$/",$data["room_price"])){
		$errors["room_price"]="Invalid room_price";
	}
	if(!preg_match("/^[\s\S]+$/",$data["tax"])){
		$errors["tax"]="Invalid tax";
	}
	if(!preg_match("/^[\s\S]+$/",$data["discount"])){
		$errors["discount"]="Invalid discount";
	}
	if(!preg_match("/^[\s\S]+$/",$data["other_service_id"])){
		$errors["other_service_id"]="Invalid other_service_id";
	}
	if(!preg_match("/^[\s\S]+$/",$data["other_service_price"])){
		$errors["other_service_price"]="Invalid other_service_price";
	}
	if(!preg_match("/^[\s\S]+$/",$data["cleaning_charges"])){
		$errors["cleaning_charges"]="Invalid cleaning_charges";
	}
	if(!preg_match("/^[\s\S]+$/",$data["service_charges"])){
		$errors["service_charges"]="Invalid service_charges";
	}
	if(!preg_match("/^[\s\S]+$/",$data["total_amount"])){
		$errors["total_amount"]="Invalid total_amount";
	}
	if(!preg_match("/^[\s\S]+$/",$data["payment_method_id"])){
		$errors["payment_method_id"]="Invalid payment_method_id";
	}

*/		
		global $now;
		if(count($errors)==0){
			$billing=new Billing();
			$billing->id=$data["id"];
		$billing->reservation_id=$data["reservation_id"];
		$billing->user_id=$data["user_id"];
		$billing->room_id=$data["room_id"];
		$billing->customer_id=$data["customer_id"];
		$billing->check_in_date=date("Y-m-d",strtotime($data["check_in_date"]));
		$billing->check_out_date=date("Y-m-d",strtotime($data["check_out_date"]));
		$billing->room_price=$data["room_price"];
		$billing->tax=$data["tax"];
		$billing->discount=$data["discount"];
		$billing->other_service_id=$data["other_service_id"];
		$billing->other_service_price=$data["other_service_price"];
		$billing->cleaning_charges=$data["cleaning_charges"];
		$billing->service_charges=$data["service_charges"];
		$billing->total_amount=$data["total_amount"];
		$billing->payment_method_id=$data["payment_method_id"];
		$billing->payment_date=$now;
		$billing->created_at=$now;

		$billing->update();
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
		Billing::delete($id);
		redirect();
	}
	public function show($id){
		view("AccountManage",Billing::find($id));
	}
}
?>
