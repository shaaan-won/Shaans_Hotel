<?php
class CustomerFeedbackApi{
	public function __construct(){
	}
	function index(){
		echo json_encode(["customer_feedback"=>CustomerFeedback::all()]);
	}
	function pagination($data){
		$page=$data["page"];
		$perpage=$data["perpage"];
		echo json_encode(["customer_feedback"=>CustomerFeedback::pagination($page,$perpage),"total_records"=>CustomerFeedback::count()]);
	}
	function find($data){
		echo json_encode(["customerfeedback"=>CustomerFeedback::find($data["id"])]);
	}
	function delete($data){
		CustomerFeedback::delete($data["id"]);
		echo json_encode(["success" => "yes"]);
	}
	function save($data,$file=[]){
		$customerfeedback=new CustomerFeedback();
		$customerfeedback->user_id=$data["user_id"];
		$customerfeedback->comments=$data["comments"];
		$customerfeedback->rating=$data["rating"];

		$customerfeedback->save();
		echo json_encode(["success" => "yes"]);
	}
	function update($data,$file=[]){
		$customerfeedback=new CustomerFeedback();
		$customerfeedback->id=$data["id"];
		$customerfeedback->user_id=$data["user_id"];
		$customerfeedback->comments=$data["comments"];
		$customerfeedback->rating=$data["rating"];

		$customerfeedback->update();
		echo json_encode(["success" => "yes"]);
	}
}
?>
