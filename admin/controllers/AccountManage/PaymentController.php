<?php
class PaymentController extends Controller{
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
	if(!preg_match("/^[\s\S]+$/",$data["amount"])){
		$errors["amount"]="Invalid amount";
	}
	if(!preg_match("/^[\s\S]+$/",$data["amount_received"])){
		$errors["amount_received"]="Invalid amount_received";
	}
	if(!preg_match("/^[\s\S]+$/",$data["amount_due"])){
		$errors["amount_due"]="Invalid amount_due";
	}
	if(!preg_match("/^[\s\S]+$/",$data["payment_method_id"])){
		$errors["payment_method_id"]="Invalid payment_method_id";
	}
	if(!preg_match("/^[\s\S]+$/",$data["payment_status"])){
		$errors["payment_status"]="Invalid payment_status";
	}

*/
		if(count($errors)==0){
			$payment=new Payment();
		$payment->reservation_id=$data["reservation_id"];
		$payment->amount=$data["amount"];
		$payment->amount_received=$data["amount_received"];
		$payment->amount_due=$data["amount_due"];
		$payment->payment_method_id=$data["payment_method_id"];
		$payment->payment_status=$data["payment_status"];
		$payment->payment_date=$now;
		$payment->created_at=$now;

			$payment->save();
		redirect();
		}else{
			 print_r($errors);
		}
	}
}
public function edit($id){
		view("AccountManage",Payment::find($id));
}
public function update($data,$file){
	if(isset($data["update"])){
	$errors=[];
/*
	if(!preg_match("/^[\s\S]+$/",$data["reservation_id"])){
		$errors["reservation_id"]="Invalid reservation_id";
	}
	if(!preg_match("/^[\s\S]+$/",$data["amount"])){
		$errors["amount"]="Invalid amount";
	}
	if(!preg_match("/^[\s\S]+$/",$data["amount_received"])){
		$errors["amount_received"]="Invalid amount_received";
	}
	if(!preg_match("/^[\s\S]+$/",$data["amount_due"])){
		$errors["amount_due"]="Invalid amount_due";
	}
	if(!preg_match("/^[\s\S]+$/",$data["payment_method_id"])){
		$errors["payment_method_id"]="Invalid payment_method_id";
	}
	if(!preg_match("/^[\s\S]+$/",$data["payment_status"])){
		$errors["payment_status"]="Invalid payment_status";
	}

*/
		if(count($errors)==0){
			$payment=new Payment();
			$payment->id=$data["id"];
		$payment->reservation_id=$data["reservation_id"];
		$payment->amount=$data["amount"];
		$payment->amount_received=$data["amount_received"];
		$payment->amount_due=$data["amount_due"];
		$payment->payment_method_id=$data["payment_method_id"];
		$payment->payment_status=$data["payment_status"];
		$payment->payment_date=$now;
		$payment->created_at=$now;

		$payment->update();
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
		Payment::delete($id);
		redirect();
	}
	public function show($id){
		view("AccountManage",Payment::find($id));
	}
}
?>
