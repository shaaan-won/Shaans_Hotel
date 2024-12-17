<?php
class OtherService extends Model implements JsonSerializable{
	public $id;
	public $name;
	public $description;
	public $status_id;
	public $price;
	public $created_at;

	public function __construct(){
	}
	public function set($id,$name,$description,$status_id,$price,$created_at){
		$this->id=$id;
		$this->name=$name;
		$this->description=$description;
		$this->status_id=$status_id;
		$this->price=$price;
		$this->created_at=$created_at;

	}
	public function save(){
		global $db,$tx;
		$db->query("insert into {$tx}other_services(name,description,status_id,price,created_at)values('$this->name','$this->description','$this->status_id','$this->price','$this->created_at')");
		return $db->insert_id;
	}
	public function update(){
		global $db,$tx;
		$db->query("update {$tx}other_services set name='$this->name',description='$this->description',status_id='$this->status_id',price='$this->price',created_at='$this->created_at' where id='$this->id'");
	}
	public static function delete($id){
		global $db,$tx;
		$db->query("delete from {$tx}other_services where id={$id}");
	}
	public function jsonSerialize():mixed{
		return get_object_vars($this);
	}
	public static function all(){
		global $db,$tx;
		$result=$db->query("select id,name,description,status_id,price,created_at from {$tx}other_services");
		$data=[];
		while($otherservice=$result->fetch_object()){
			$data[]=$otherservice;
		}
			return $data;
	}
	public static function pagination($page=1,$perpage=10,$criteria=""){
		global $db,$tx;
		$top=($page-1)*$perpage;
		$result=$db->query("select id,name,description,status_id,price,created_at from {$tx}other_services $criteria limit $top,$perpage");
		$data=[];
		while($otherservice=$result->fetch_object()){
			$data[]=$otherservice;
		}
			return $data;
	}
	public static function count($criteria=""){
		global $db,$tx;
		$result =$db->query("select count(*) from {$tx}other_services $criteria");
		list($count)=$result->fetch_row();
			return $count;
	}
	public static function find($id){
		global $db,$tx;
		$result =$db->query("select id,name,description,status_id,price,created_at from {$tx}other_services where id='$id'");
		$otherservice=$result->fetch_object();
			return $otherservice;
	}
	static function get_last_id(){
		global $db,$tx;
		$result =$db->query("select max(id) last_id from {$tx}other_services");
		$otherservice =$result->fetch_object();
		return $otherservice->last_id;
	}
	public function json(){
		return json_encode($this);
	}
	public function __toString(){
		return "		Id:$this->id<br> 
		Name:$this->name<br> 
		Description:$this->description<br> 
		Status Id:$this->status_id<br> 
		Price:$this->price<br> 
		Created At:$this->created_at<br> 
";
	}

	//-------------HTML----------//

	static function html_select($name="cmbOtherService"){
		global $db,$tx;
		$html="<select id='$name' name='$name'> ";
		$result =$db->query("select id,name from {$tx}other_services");
		while($otherservice=$result->fetch_object()){
			$html.="<option value ='$otherservice->id'>$otherservice->name</option>";
		}
		$html.="</select>";
		return $html;
	}
	static function html_table($page = 1,$perpage = 10,$criteria="",$action=true){
		global $db,$tx,$base_url;
		$count_result =$db->query("select count(*) total from {$tx}other_services $criteria ");
		list($total_rows)=$count_result->fetch_row();
		$total_pages = ceil($total_rows /$perpage);
		$top = ($page - 1)*$perpage;
		$result=$db->query("select id,name,description,status_id,price,created_at from {$tx}other_services $criteria limit $top,$perpage");
		$html="<table class='table'>";
			$html.="<tr><th colspan='3'>".Html::link(["class"=>"btn btn-success","route"=>"otherservice/create","text"=>"New OtherService"])."</th></tr>";
		if($action){
			$html.="<tr><th>Id</th><th>Name</th><th>Description</th><th>Status Id</th><th>Price</th><th>Created At</th><th>Action</th></tr>";
		}else{
			$html.="<tr><th>Id</th><th>Name</th><th>Description</th><th>Status Id</th><th>Price</th><th>Created At</th></tr>";
		}
		while($otherservice=$result->fetch_object()){
			$action_buttons = "";
			if($action){
				$action_buttons = "<td><div class='btn-group' style='display:flex;'>";
				$action_buttons.= Event::button(["name"=>"show", "value"=>"Show", "class"=>"btn btn-info", "route"=>"otherservice/show/$otherservice->id"]);
				$action_buttons.= Event::button(["name"=>"edit", "value"=>"Edit", "class"=>"btn btn-primary", "route"=>"otherservice/edit/$otherservice->id"]);
				$action_buttons.= Event::button(["name"=>"delete", "value"=>"Delete", "class"=>"btn btn-danger", "route"=>"otherservice/confirm/$otherservice->id"]);
				$action_buttons.= "</div></td>";
			}
			$html.="<tr><td>$otherservice->id</td><td>$otherservice->name</td><td>$otherservice->description</td><td>$otherservice->status_id</td><td>$otherservice->price</td><td>$otherservice->created_at</td> $action_buttons</tr>";
		}
		$html.="</table>";
		$html.= pagination($page,$total_pages);
		return $html;
	}
	static function html_row_details($id){
		global $db,$tx,$base_url;
		$result =$db->query("select id,name,description,status_id,price,created_at from {$tx}other_services where id={$id}");
		$otherservice=$result->fetch_object();
		$html="<table class='table'>";
		$html.="<tr><th colspan=\"2\">OtherService Show</th></tr>";
		$html.="<tr><th>Id</th><td>$otherservice->id</td></tr>";
		$html.="<tr><th>Name</th><td>$otherservice->name</td></tr>";
		$html.="<tr><th>Description</th><td>$otherservice->description</td></tr>";
		$html.="<tr><th>Status Id</th><td>$otherservice->status_id</td></tr>";
		$html.="<tr><th>Price</th><td>$otherservice->price</td></tr>";
		$html.="<tr><th>Created At</th><td>$otherservice->created_at</td></tr>";

		$html.="</table>";
		return $html;
	}
}
?>
