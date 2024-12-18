<?php
class StaffRoleApi{
	public function __construct(){
	}
	function index(){
		echo json_encode(["staff_roles"=>StaffRole::all()]);
	}
	function pagination($data){
		$page=$data["page"];
		$perpage=$data["perpage"];
		echo json_encode(["staff_roles"=>StaffRole::pagination($page,$perpage),"total_records"=>StaffRole::count()]);
	}
	function find($data){
		echo json_encode(["staffrole"=>StaffRole::find($data["id"])]);
	}
	function delete($data){
		StaffRole::delete($data["id"]);
		echo json_encode(["success" => "yes"]);
	}
	function save($data,$file=[]){
		$staffrole=new StaffRole();
		$staffrole->role_name=$data["role_name"];

		$staffrole->save();
		echo json_encode(["success" => "yes"]);
	}
	function update($data,$file=[]){
		$staffrole=new StaffRole();
		$staffrole->id=$data["id"];
		$staffrole->role_name=$data["role_name"];

		$staffrole->update();
		echo json_encode(["success" => "yes"]);
	}
}
?>
