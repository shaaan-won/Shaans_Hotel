<?php
class WorkScheduleApi{
	public function __construct(){
	}
	function index(){
		echo json_encode(["work_schedules"=>WorkSchedule::all()]);
	}
	function pagination($data){
		$page=$data["page"];
		$perpage=$data["perpage"];
		echo json_encode(["work_schedules"=>WorkSchedule::pagination($page,$perpage),"total_records"=>WorkSchedule::count()]);
	}
	function find($data){
		echo json_encode(["workschedule"=>WorkSchedule::find($data["id"])]);
	}
	function delete($data){
		WorkSchedule::delete($data["id"]);
		echo json_encode(["success" => "yes"]);
	}
	function save($data,$file=[]){
		$workschedule=new WorkSchedule();
		$workschedule->staff_id=$data["staff_id"];
		$workschedule->day_of_week=$data["day_of_week"];

		$workschedule->save();
		echo json_encode(["success" => "yes"]);
	}
	function update($data,$file=[]){
		$workschedule=new WorkSchedule();
		$workschedule->id=$data["id"];
		$workschedule->staff_id=$data["staff_id"];
		$workschedule->day_of_week=$data["day_of_week"];

		$workschedule->update();
		echo json_encode(["success" => "yes"]);
	}
}
?>
