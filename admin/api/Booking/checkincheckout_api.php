<?php
class CheckInCheckOutApi{
	public function __construct(){
	}
	function index(){
		echo json_encode(["check_in_check_outs"=>CheckInCheckOut::all()]);
	}
	function pagination($data){
		$page=$data["page"];
		$perpage=$data["perpage"];
		echo json_encode(["check_in_check_outs"=>CheckInCheckOut::pagination($page,$perpage),"total_records"=>CheckInCheckOut::count()]);
	}
	function find($data){
		echo json_encode(["checkincheckout"=>CheckInCheckOut::find($data["id"])]);
	}
	function delete($data){
		CheckInCheckOut::delete($data["id"]);
		echo json_encode(["success" => "yes"]);
	}
	function save($data,$file=[]){
		$checkincheckout=new CheckInCheckOut();
		$checkincheckout->reservation_id=$data["reservation_id"];
		$checkincheckout->check_in_date=$data["check_in_date"];
		$checkincheckout->check_out_date=$data["check_out_date"];
		$checkincheckout->comments=$data["comments"];

		$checkincheckout->save();
		echo json_encode(["success" => "yes"]);
	}
	function update($data,$file=[]){
		$checkincheckout=new CheckInCheckOut();
		$checkincheckout->id=$data["id"];
		$checkincheckout->reservation_id=$data["reservation_id"];
		$checkincheckout->check_in_date=$data["check_in_date"];
		$checkincheckout->check_out_date=$data["check_out_date"];
		$checkincheckout->comments=$data["comments"];

		$checkincheckout->update();
		echo json_encode(["success" => "yes"]);
	}
}
?>
