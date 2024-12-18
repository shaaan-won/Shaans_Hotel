<?php
class PaymentMethoApi{
	public function __construct(){
	}
	function index(){
		echo json_encode(["payment_methos"=>PaymentMetho::all()]);
	}
	function pagination($data){
		$page=$data["page"];
		$perpage=$data["perpage"];
		echo json_encode(["payment_methos"=>PaymentMetho::pagination($page,$perpage),"total_records"=>PaymentMetho::count()]);
	}
	function find($data){
		echo json_encode(["paymentmetho"=>PaymentMetho::find($data["id"])]);
	}
	function delete($data){
		PaymentMetho::delete($data["id"]);
		echo json_encode(["success" => "yes"]);
	}
	function save($data,$file=[]){
		$paymentmetho=new PaymentMetho();

		$paymentmetho->save();
		echo json_encode(["success" => "yes"]);
	}
	function update($data,$file=[]){
		$paymentmetho=new PaymentMetho();
		$paymentmetho->id=$data["id"];

		$paymentmetho->update();
		echo json_encode(["success" => "yes"]);
	}
}
?>
