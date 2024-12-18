<?php
class BillingApi{
	public function __construct(){
	}
	function index(){
		echo json_encode(["billings"=>Billing::all()]);
	}
	function pagination($data){
		$page=$data["page"];
		$perpage=$data["perpage"];
		echo json_encode(["billings"=>Billing::pagination($page,$perpage),"total_records"=>Billing::count()]);
	}
	function find($data){
		echo json_encode(["billing"=>Billing::find($data["id"])]);
	}
	function delete($data){
		Billing::delete($data["id"]);
		echo json_encode(["success" => "yes"]);
	}
	function save($data,$file=[]){
		$billing=new Billing();
		$billing->reservation_id=$data["reservation_id"];
		$billing->user_id=$data["user_id"];
		$billing->room_id=$data["room_id"];
		$billing->customer_id=$data["customer_id"];
		$billing->check_in_date=$data["check_in_date"];
		$billing->check_out_date=$data["check_out_date"];
		$billing->other_service_id=$data["other_service_id"];
		$billing->payment_method_id=$data["payment_method_id"];

		$billing->save();
		echo json_encode(["success" => "yes"]);
	}
	function update($data,$file=[]){
		$billing=new Billing();
		$billing->id=$data["id"];
		$billing->reservation_id=$data["reservation_id"];
		$billing->user_id=$data["user_id"];
		$billing->room_id=$data["room_id"];
		$billing->customer_id=$data["customer_id"];
		$billing->check_in_date=$data["check_in_date"];
		$billing->check_out_date=$data["check_out_date"];
		$billing->other_service_id=$data["other_service_id"];
		$billing->payment_method_id=$data["payment_method_id"];

		$billing->update();
		echo json_encode(["success" => "yes"]);
	}
}
?>
