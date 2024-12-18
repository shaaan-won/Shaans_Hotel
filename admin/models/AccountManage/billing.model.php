<?php
class Billing extends Model implements JsonSerializable{
	public $id;
	public $reservation_id;
	public $user_id;
	public $room_id;
	public $customer_id;
	public $check_in_date;
	public $check_out_date;
	public $room_price;
	public $tax;
	public $discount;
	public $other_service_id;
	public $other_service_price;
	public $cleaning_charges;
	public $service_charges;
	public $total_amount;
	public $payment_method_id;
	public $payment_date;
	public $created_at;

	public function __construct(){
	}
	public function set($id,$reservation_id,$user_id,$room_id,$customer_id,$check_in_date,$check_out_date,$room_price,$tax,$discount,$other_service_id,$other_service_price,$cleaning_charges,$service_charges,$total_amount,$payment_method_id,$payment_date,$created_at){
		$this->id=$id;
		$this->reservation_id=$reservation_id;
		$this->user_id=$user_id;
		$this->room_id=$room_id;
		$this->customer_id=$customer_id;
		$this->check_in_date=$check_in_date;
		$this->check_out_date=$check_out_date;
		$this->room_price=$room_price;
		$this->tax=$tax;
		$this->discount=$discount;
		$this->other_service_id=$other_service_id;
		$this->other_service_price=$other_service_price;
		$this->cleaning_charges=$cleaning_charges;
		$this->service_charges=$service_charges;
		$this->total_amount=$total_amount;
		$this->payment_method_id=$payment_method_id;
		$this->payment_date=$payment_date;
		$this->created_at=$created_at;

	}
	public function save(){
		global $db,$tx;
		$db->query("insert into {$tx}billings(reservation_id,user_id,room_id,customer_id,check_in_date,check_out_date,room_price,tax,discount,other_service_id,other_service_price,cleaning_charges,service_charges,total_amount,payment_method_id,payment_date,created_at)values('$this->reservation_id','$this->user_id','$this->room_id','$this->customer_id','$this->check_in_date','$this->check_out_date','$this->room_price','$this->tax','$this->discount','$this->other_service_id','$this->other_service_price','$this->cleaning_charges','$this->service_charges','$this->total_amount','$this->payment_method_id','$this->payment_date','$this->created_at')");
		return $db->insert_id;
	}
	public function update(){
		global $db,$tx;
		$db->query("update {$tx}billings set reservation_id='$this->reservation_id',user_id='$this->user_id',room_id='$this->room_id',customer_id='$this->customer_id',check_in_date='$this->check_in_date',check_out_date='$this->check_out_date',room_price='$this->room_price',tax='$this->tax',discount='$this->discount',other_service_id='$this->other_service_id',other_service_price='$this->other_service_price',cleaning_charges='$this->cleaning_charges',service_charges='$this->service_charges',total_amount='$this->total_amount',payment_method_id='$this->payment_method_id',payment_date='$this->payment_date',created_at='$this->created_at' where id='$this->id'");
	}
	public static function delete($id){
		global $db,$tx;
		$db->query("delete from {$tx}billings where id={$id}");
	}
	public function jsonSerialize():mixed{
		return get_object_vars($this);
	}
	public static function all(){
		global $db,$tx;
		$result=$db->query("select id,reservation_id,user_id,room_id,customer_id,check_in_date,check_out_date,room_price,tax,discount,other_service_id,other_service_price,cleaning_charges,service_charges,total_amount,payment_method_id,payment_date,created_at from {$tx}billings");
		$data=[];
		while($billing=$result->fetch_object()){
			$data[]=$billing;
		}
			return $data;
	}
	public static function pagination($page=1,$perpage=10,$criteria=""){
		global $db,$tx;
		$top=($page-1)*$perpage;
		$result=$db->query("select id,reservation_id,user_id,room_id,customer_id,check_in_date,check_out_date,room_price,tax,discount,other_service_id,other_service_price,cleaning_charges,service_charges,total_amount,payment_method_id,payment_date,created_at from {$tx}billings $criteria limit $top,$perpage");
		$data=[];
		while($billing=$result->fetch_object()){
			$data[]=$billing;
		}
			return $data;
	}
	public static function count($criteria=""){
		global $db,$tx;
		$result =$db->query("select count(*) from {$tx}billings $criteria");
		list($count)=$result->fetch_row();
			return $count;
	}
	public static function find($id){
		global $db,$tx;
		$result =$db->query("select id,reservation_id,user_id,room_id,customer_id,check_in_date,check_out_date,room_price,tax,discount,other_service_id,other_service_price,cleaning_charges,service_charges,total_amount,payment_method_id,payment_date,created_at from {$tx}billings where id='$id'");
		$billing=$result->fetch_object();
			return $billing;
	}
	static function get_last_id(){
		global $db,$tx;
		$result =$db->query("select max(id) last_id from {$tx}billings");
		$billing =$result->fetch_object();
		return $billing->last_id;
	}
	public function json(){
		return json_encode($this);
	}
	public function __toString(){
		return "		Id:$this->id<br> 
		Reservation Id:$this->reservation_id<br> 
		User Id:$this->user_id<br> 
		Room Id:$this->room_id<br> 
		Customer Id:$this->customer_id<br> 
		Check In Date:$this->check_in_date<br> 
		Check Out Date:$this->check_out_date<br> 
		Room Price:$this->room_price<br> 
		Tax:$this->tax<br> 
		Discount:$this->discount<br> 
		Other Service Id:$this->other_service_id<br> 
		Other Service Price:$this->other_service_price<br> 
		Cleaning Charges:$this->cleaning_charges<br> 
		Service Charges:$this->service_charges<br> 
		Total Amount:$this->total_amount<br> 
		Payment Method Id:$this->payment_method_id<br> 
		Payment Date:$this->payment_date<br> 
		Created At:$this->created_at<br> 
";
	}

	//-------------HTML----------//

	static function html_select($name="cmbBilling"){
		global $db,$tx;
		$html="<select id='$name' name='$name'> ";
		$result =$db->query("select id,name from {$tx}billings");
		while($billing=$result->fetch_object()){
			$html.="<option value ='$billing->id'>$billing->name</option>";
		}
		$html.="</select>";
		return $html;
	}



	static function html_table($page = 1,$perpage = 10,$criteria="",$action=true){
		global $db,$tx,$base_url;
		$count_result =$db->query("select count(*) total from {$tx}billings $criteria ");
		list($total_rows)=$count_result->fetch_row();
		$total_pages = ceil($total_rows /$perpage);
		$top = ($page - 1)*$perpage;
		$result=$db->query("select id,reservation_id,user_id,room_id,customer_id,check_in_date,check_out_date,room_price,tax,discount,other_service_id,other_service_price,cleaning_charges,service_charges,total_amount,payment_method_id,payment_date,created_at from {$tx}billings $criteria limit $top,$perpage");
		$html="<div class='table-responsive'><table class='table'>";
			$html.="<tr><th colspan='3'>".Html::link(["class"=>"btn btn-success","route"=>"billing/create","text"=>"New Billing"])."</th></tr>";
		if($action){
			$html.="<tr><th>Id</th><th>Reservation Id</th><th>User Id</th><th>Room Id</th><th>Customer Id</th><th>Check In Date</th><th>Check Out Date</th><th>Room Price</th><th>Tax</th><th>Discount</th><th>Other Service Id</th><th>Other Service Price</th><th>Cleaning Charges</th><th>Service Charges</th><th>Total Amount</th><th>Payment Method Id</th><th>Payment Date</th><th>Created At</th><th>Action</th></tr>";
		}else{
			$html.="<tr><th>Id</th><th>Reservation Id</th><th>User Id</th><th>Room Id</th><th>Customer Id</th><th>Check In Date</th><th>Check Out Date</th><th>Room Price</th><th>Tax</th><th>Discount</th><th>Other Service Id</th><th>Other Service Price</th><th>Cleaning Charges</th><th>Service Charges</th><th>Total Amount</th><th>Payment Method Id</th><th>Payment Date</th><th>Created At</th></tr>";
		}
		while($billing=$result->fetch_object()){
			$action_buttons = "";
			if($action){
				$action_buttons = "<td><div class='btn-group' style='display:flex;'>";
				$action_buttons.= Event::button(["name"=>"show", "value"=>"Show", "class"=>"btn btn-info", "route"=>"billing/show/$billing->id"]);
				$action_buttons.= Event::button(["name"=>"edit", "value"=>"Edit", "class"=>"btn btn-primary", "route"=>"billing/edit/$billing->id"]);
				$action_buttons.= Event::button(["name"=>"delete", "value"=>"Delete", "class"=>"btn btn-danger", "route"=>"billing/confirm/$billing->id"]);
				$action_buttons.= "</div></td>";
			}
			$html.="<tr><td>$billing->id</td><td>$billing->reservation_id</td><td>$billing->user_id</td><td>$billing->room_id</td><td>$billing->customer_id</td><td>$billing->check_in_date</td><td>$billing->check_out_date</td><td>$billing->room_price</td><td>$billing->tax</td><td>$billing->discount</td><td>$billing->other_service_id</td><td>$billing->other_service_price</td><td>$billing->cleaning_charges</td><td>$billing->service_charges</td><td>$billing->total_amount</td><td>$billing->payment_method_id</td><td>$billing->payment_date</td><td>$billing->created_at</td> $action_buttons</tr>";
		}
		$html.="</table> </div>";
		$html.= pagination($page,$total_pages);
		return $html;
	}
	
	static function html_row_details($id){
		global $db,$tx,$base_url;
		$result =$db->query("select id,reservation_id,user_id,room_id,customer_id,check_in_date,check_out_date,room_price,tax,discount,other_service_id,other_service_price,cleaning_charges,service_charges,total_amount,payment_method_id,payment_date,created_at from {$tx}billings where id={$id}");
		$billing=$result->fetch_object();
		$html="<table class='table'>";
		$html.="<tr><th colspan=\"2\">Billing Show</th></tr>";
		$html.="<tr><th>Id</th><td>$billing->id</td></tr>";
		$html.="<tr><th>Reservation Id</th><td>$billing->reservation_id</td></tr>";
		$html.="<tr><th>User Id</th><td>$billing->user_id</td></tr>";
		$html.="<tr><th>Room Id</th><td>$billing->room_id</td></tr>";
		$html.="<tr><th>Customer Id</th><td>$billing->customer_id</td></tr>";
		$html.="<tr><th>Check In Date</th><td>$billing->check_in_date</td></tr>";
		$html.="<tr><th>Check Out Date</th><td>$billing->check_out_date</td></tr>";
		$html.="<tr><th>Room Price</th><td>$billing->room_price</td></tr>";
		$html.="<tr><th>Tax</th><td>$billing->tax</td></tr>";
		$html.="<tr><th>Discount</th><td>$billing->discount</td></tr>";
		$html.="<tr><th>Other Service Id</th><td>$billing->other_service_id</td></tr>";
		$html.="<tr><th>Other Service Price</th><td>$billing->other_service_price</td></tr>";
		$html.="<tr><th>Cleaning Charges</th><td>$billing->cleaning_charges</td></tr>";
		$html.="<tr><th>Service Charges</th><td>$billing->service_charges</td></tr>";
		$html.="<tr><th>Total Amount</th><td>$billing->total_amount</td></tr>";
		$html.="<tr><th>Payment Method Id</th><td>$billing->payment_method_id</td></tr>";
		$html.="<tr><th>Payment Date</th><td>$billing->payment_date</td></tr>";
		$html.="<tr><th>Created At</th><td>$billing->created_at</td></tr>";

		$html.="</table>";
		return $html;
	}

	static function html_row_details_with_booking($id, $page = 1,$perpage = 10,$criteria="",$action=true){
		global $db,$tx,$base_url;
		$count_result =$db->query("select count(*) total from {$tx}billings $criteria ");
		list($total_rows)=$count_result->fetch_row();
		$total_pages = ceil($total_rows /$perpage);
		$top = ($page - 1)*$perpage;
		$result=$db->query("select id,reservation_id,user_id,room_id,customer_id,check_in_date,check_out_date,room_price,tax,discount,other_service_id,other_service_price,cleaning_charges,service_charges,total_amount,payment_method_id,payment_date,created_at from {$tx}billings where reservation_id=$id limit $top,$perpage");
		$html="<div class='table-responsive'><table class='table'>";
			$html.="<tr><th colspan='3'>".Html::link(["class"=>"btn btn-success","route"=>"billing/create","text"=>"New Billing"])."</th></tr>";
		if($action){
			$html.="<tr><th>Id</th><th>Reservation Id</th><th>User Id</th><th>Room Id</th><th>Customer Id</th><th>Check In Date</th><th>Check Out Date</th><th>Room Price</th><th>Tax</th><th>Discount</th><th>Other Service Id</th><th>Other Service Price</th><th>Cleaning Charges</th><th>Service Charges</th><th>Total Amount</th><th>Payment Method Id</th><th>Payment Date</th><th>Created At</th><th>Action</th></tr>";
		}else{
			$html.="<tr><th>Id</th><th>Reservation Id</th><th>User Id</th><th>Room Id</th><th>Customer Id</th><th>Check In Date</th><th>Check Out Date</th><th>Room Price</th><th>Tax</th><th>Discount</th><th>Other Service Id</th><th>Other Service Price</th><th>Cleaning Charges</th><th>Service Charges</th><th>Total Amount</th><th>Payment Method Id</th><th>Payment Date</th><th>Created At</th></tr>";
		}
		while($billing=$result->fetch_object()){
			$action_buttons = "";
			if($action){
				$action_buttons = "<td><div class='btn-group' style='display:flex;'>";
				$action_buttons.= Event::button(["name"=>"show", "value"=>"Show", "class"=>"btn btn-info", "route"=>"billing/show/$billing->id"]);
				$action_buttons.= Event::button(["name"=>"edit", "value"=>"Edit", "class"=>"btn btn-primary", "route"=>"billing/edit/$billing->id"]);
				$action_buttons.= Event::button(["name"=>"delete", "value"=>"Delete", "class"=>"btn btn-danger", "route"=>"billing/confirm/$billing->id"]);
				$action_buttons.= "</div></td>";
			}
			$html.="<tr><td>$billing->id</td><td>$billing->reservation_id</td><td>$billing->user_id</td><td>$billing->room_id</td><td>$billing->customer_id</td><td>$billing->check_in_date</td><td>$billing->check_out_date</td><td>$billing->room_price</td><td>$billing->tax</td><td>$billing->discount</td><td>$billing->other_service_id</td><td>$billing->other_service_price</td><td>$billing->cleaning_charges</td><td>$billing->service_charges</td><td>$billing->total_amount</td><td>$billing->payment_method_id</td><td>$billing->payment_date</td><td>$billing->created_at</td> $action_buttons</tr>";
		}
		$html.="</table> </div>";
		$html.= pagination($page,$total_pages);
		return $html;
	}


	
}
?>
