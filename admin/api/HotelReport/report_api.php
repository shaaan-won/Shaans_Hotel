<?php
class ReportApi{
	public function __construct(){
	}
	function index(){
		echo json_encode(["reports"=>Report::all()]);
	}
	function pagination($data){
		$page=$data["page"];
		$perpage=$data["perpage"];
		echo json_encode(["reports"=>Report::pagination($page,$perpage),"total_records"=>Report::count()]);
	}
	function find($data){
		echo json_encode(["report"=>Report::find($data["id"])]);
	}
	function delete($data){
		Report::delete($data["id"]);
		echo json_encode(["success" => "yes"]);
	}
	function save($data,$file=[]){
		$report=new Report();
		$report->report_type=$data["report_type"];

		$report->save();
		echo json_encode(["success" => "yes"]);
	}
	function update($data,$file=[]){
		$report=new Report();
		$report->id=$data["id"];
		$report->report_type=$data["report_type"];

		$report->update();
		echo json_encode(["success" => "yes"]);
	}
}
?>
