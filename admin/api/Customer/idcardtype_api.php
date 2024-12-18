<?php
class IdCardTypeApi{
	public function __construct(){
	}
	function index(){
		echo json_encode(["id_card_types"=>IdCardType::all()]);
	}
	function pagination($data){
		$page=$data["page"];
		$perpage=$data["perpage"];
		echo json_encode(["id_card_types"=>IdCardType::pagination($page,$perpage),"total_records"=>IdCardType::count()]);
	}
	function find($data){
		echo json_encode(["idcardtype"=>IdCardType::find($data["id"])]);
	}
	function delete($data){
		IdCardType::delete($data["id"]);
		echo json_encode(["success" => "yes"]);
	}
	function save($data,$file=[]){
		$idcardtype=new IdCardType();
		$idcardtype->name=$data["name"];

		$idcardtype->save();
		echo json_encode(["success" => "yes"]);
	}
	function update($data,$file=[]){
		$idcardtype=new IdCardType();
		$idcardtype->id=$data["id"];
		$idcardtype->name=$data["name"];

		$idcardtype->update();
		echo json_encode(["success" => "yes"]);
	}
}
?>
