<?php
class PaymentMethodApi{
	public function __construct(){
	}
	function index(){
		echo json_encode(["payment_methods"=>PaymentMethod::all()]);
	}
	function pagination($data){
		$page=$data["page"];
		$perpage=$data["perpage"];
		echo json_encode(["payment_methods"=>PaymentMethod::pagination($page,$perpage),"total_records"=>PaymentMethod::count()]);
	}
	function find($data){
		echo json_encode(["paymentmethod"=>PaymentMethod::find($data["id"])]);
	}
	function delete($data){
		PaymentMethod::delete($data["id"]);
		echo json_encode(["success" => "yes"]);
	}
	function save($data,$file=[]){
		$paymentmethod=new PaymentMethod();
		$paymentmethod->name=$data["name"];
		$paymentmethod->description=$data["description"];

		$paymentmethod->save();
		echo json_encode(["success" => "yes"]);
	}
	function update($data,$file=[]){
		$paymentmethod=new PaymentMethod();
		$paymentmethod->id=$data["id"];
		$paymentmethod->name=$data["name"];
		$paymentmethod->description=$data["description"];

		$paymentmethod->update();
		echo json_encode(["success" => "yes"]);
	}
}
?>
