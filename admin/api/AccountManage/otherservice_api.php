<?php
class OtherServiceApi{
	public function __construct(){
	}
	function index(){
		echo json_encode(["other_services"=>OtherService::all()]);
	}
	function pagination($data){
		$page=$data["page"];
		$perpage=$data["perpage"];
		echo json_encode(["other_services"=>OtherService::pagination($page,$perpage),"total_records"=>OtherService::count()]);
	}
	function find($data){
		echo json_encode(["otherservice"=>OtherService::find($data["id"])]);
	}
	function delete($data){
		OtherService::delete($data["id"]);
		echo json_encode(["success" => "yes"]);
	}
	function save($data,$file=[]){
		$otherservice=new OtherService();
		$otherservice->name=$data["name"];
		$otherservice->description=$data["description"];
		$otherservice->status_id=$data["status_id"];

		$otherservice->save();
		echo json_encode(["success" => "yes"]);
	}
	function update($data,$file=[]){
		$otherservice=new OtherService();
		$otherservice->id=$data["id"];
		$otherservice->name=$data["name"];
		$otherservice->description=$data["description"];
		$otherservice->status_id=$data["status_id"];

		$otherservice->update();
		echo json_encode(["success" => "yes"]);
	}
}
?>
