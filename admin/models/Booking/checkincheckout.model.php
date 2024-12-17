<?php
class CheckInCheckOut extends Model implements JsonSerializable{
	public $id;
	public $reservation_id;
	public $check_in_date;
	public $check_out_date;
	public $comments;
	public $created_at;

	public function __construct(){
	}
	public function set($id,$reservation_id,$check_in_date,$check_out_date,$comments,$created_at){
		$this->id=$id;
		$this->reservation_id=$reservation_id;
		$this->check_in_date=$check_in_date;
		$this->check_out_date=$check_out_date;
		$this->comments=$comments;
		$this->created_at=$created_at;

	}
	public function save(){
		global $db,$tx;
		$db->query("insert into {$tx}check_in_check_outs(reservation_id,check_in_date,check_out_date,comments,created_at)values('$this->reservation_id','$this->check_in_date','$this->check_out_date','$this->comments','$this->created_at')");
		return $db->insert_id;
	}
	public function update(){
		global $db,$tx;
		$db->query("update {$tx}check_in_check_outs set reservation_id='$this->reservation_id',check_in_date='$this->check_in_date',check_out_date='$this->check_out_date',comments='$this->comments',created_at='$this->created_at' where id='$this->id'");
	}
	public static function delete($id){
		global $db,$tx;
		$db->query("delete from {$tx}check_in_check_outs where id={$id}");
	}
	public function jsonSerialize():mixed{
		return get_object_vars($this);
	}
	public static function all(){
		global $db,$tx;
		$result=$db->query("select id,reservation_id,check_in_date,check_out_date,comments,created_at from {$tx}check_in_check_outs");
		$data=[];
		while($checkincheckout=$result->fetch_object()){
			$data[]=$checkincheckout;
		}
			return $data;
	}
	public static function pagination($page=1,$perpage=10,$criteria=""){
		global $db,$tx;
		$top=($page-1)*$perpage;
		$result=$db->query("select id,reservation_id,check_in_date,check_out_date,comments,created_at from {$tx}check_in_check_outs $criteria limit $top,$perpage");
		$data=[];
		while($checkincheckout=$result->fetch_object()){
			$data[]=$checkincheckout;
		}
			return $data;
	}
	public static function count($criteria=""){
		global $db,$tx;
		$result =$db->query("select count(*) from {$tx}check_in_check_outs $criteria");
		list($count)=$result->fetch_row();
			return $count;
	}
	public static function find($id){
		global $db,$tx;
		$result =$db->query("select id,reservation_id,check_in_date,check_out_date,comments,created_at from {$tx}check_in_check_outs where id='$id'");
		$checkincheckout=$result->fetch_object();
			return $checkincheckout;
	}
	static function get_last_id(){
		global $db,$tx;
		$result =$db->query("select max(id) last_id from {$tx}check_in_check_outs");
		$checkincheckout =$result->fetch_object();
		return $checkincheckout->last_id;
	}
	public function json(){
		return json_encode($this);
	}
	public function __toString(){
		return "		Id:$this->id<br> 
		Reservation Id:$this->reservation_id<br> 
		Check In Date:$this->check_in_date<br> 
		Check Out Date:$this->check_out_date<br> 
		Comments:$this->comments<br> 
		Created At:$this->created_at<br> 
";
	}

	//-------------HTML----------//

	static function html_select($name="cmbCheckInCheckOut"){
		global $db,$tx;
		$html="<select id='$name' name='$name'> ";
		$result =$db->query("select id,name from {$tx}check_in_check_outs");
		while($checkincheckout=$result->fetch_object()){
			$html.="<option value ='$checkincheckout->id'>$checkincheckout->name</option>";
		}
		$html.="</select>";
		return $html;
	}
	static function html_table($page = 1,$perpage = 10,$criteria="",$action=true){
		global $db,$tx,$base_url;
		$count_result =$db->query("select count(*) total from {$tx}check_in_check_outs $criteria ");
		list($total_rows)=$count_result->fetch_row();
		$total_pages = ceil($total_rows /$perpage);
		$top = ($page - 1)*$perpage;
		$result=$db->query("select id,reservation_id,check_in_date,check_out_date,comments,created_at from {$tx}check_in_check_outs $criteria limit $top,$perpage");
		$html="<table class='table'>";
			$html.="<tr><th colspan='3'>".Html::link(["class"=>"btn btn-success","route"=>"checkincheckout/create","text"=>"New CheckInCheckOut"])."</th></tr>";
		if($action){
			$html.="<tr><th>Id</th><th>Reservation Id</th><th>Check In Date</th><th>Check Out Date</th><th>Comments</th><th>Created At</th><th>Action</th></tr>";
		}else{
			$html.="<tr><th>Id</th><th>Reservation Id</th><th>Check In Date</th><th>Check Out Date</th><th>Comments</th><th>Created At</th></tr>";
		}
		while($checkincheckout=$result->fetch_object()){
			$action_buttons = "";
			if($action){
				$action_buttons = "<td><div class='btn-group' style='display:flex;'>";
				$action_buttons.= Event::button(["name"=>"show", "value"=>"Show", "class"=>"btn btn-info", "route"=>"checkincheckout/show/$checkincheckout->id"]);
				$action_buttons.= Event::button(["name"=>"edit", "value"=>"Edit", "class"=>"btn btn-primary", "route"=>"checkincheckout/edit/$checkincheckout->id"]);
				$action_buttons.= Event::button(["name"=>"delete", "value"=>"Delete", "class"=>"btn btn-danger", "route"=>"checkincheckout/confirm/$checkincheckout->id"]);
				$action_buttons.= "</div></td>";
			}
			$html.="<tr><td>$checkincheckout->id</td><td>$checkincheckout->reservation_id</td><td>$checkincheckout->check_in_date</td><td>$checkincheckout->check_out_date</td><td>$checkincheckout->comments</td><td>$checkincheckout->created_at</td> $action_buttons</tr>";
		}
		$html.="</table>";
		$html.= pagination($page,$total_pages);
		return $html;
	}
	static function html_row_details($id){
		global $db,$tx,$base_url;
		$result =$db->query("select id,reservation_id,check_in_date,check_out_date,comments,created_at from {$tx}check_in_check_outs where id={$id}");
		$checkincheckout=$result->fetch_object();
		$html="<table class='table'>";
		$html.="<tr><th colspan=\"2\">CheckInCheckOut Show</th></tr>";
		$html.="<tr><th>Id</th><td>$checkincheckout->id</td></tr>";
		$html.="<tr><th>Reservation Id</th><td>$checkincheckout->reservation_id</td></tr>";
		$html.="<tr><th>Check In Date</th><td>$checkincheckout->check_in_date</td></tr>";
		$html.="<tr><th>Check Out Date</th><td>$checkincheckout->check_out_date</td></tr>";
		$html.="<tr><th>Comments</th><td>$checkincheckout->comments</td></tr>";
		$html.="<tr><th>Created At</th><td>$checkincheckout->created_at</td></tr>";

		$html.="</table>";
		return $html;
	}
}
?>
