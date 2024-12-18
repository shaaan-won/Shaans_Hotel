<?php
class PerformanceReviewApi{
	public function __construct(){
	}
	function index(){
		echo json_encode(["performance_reviews"=>PerformanceReview::all()]);
	}
	function pagination($data){
		$page=$data["page"];
		$perpage=$data["perpage"];
		echo json_encode(["performance_reviews"=>PerformanceReview::pagination($page,$perpage),"total_records"=>PerformanceReview::count()]);
	}
	function find($data){
		echo json_encode(["performancereview"=>PerformanceReview::find($data["id"])]);
	}
	function delete($data){
		PerformanceReview::delete($data["id"]);
		echo json_encode(["success" => "yes"]);
	}
	function save($data,$file=[]){
		$performancereview=new PerformanceReview();
		$performancereview->staff_id=$data["staff_id"];
		$performancereview->review_date=$data["review_date"];
		$performancereview->review_comments=$data["review_comments"];

		$performancereview->save();
		echo json_encode(["success" => "yes"]);
	}
	function update($data,$file=[]){
		$performancereview=new PerformanceReview();
		$performancereview->id=$data["id"];
		$performancereview->staff_id=$data["staff_id"];
		$performancereview->review_date=$data["review_date"];
		$performancereview->review_comments=$data["review_comments"];

		$performancereview->update();
		echo json_encode(["success" => "yes"]);
	}
}
?>
