<?php
class ReservationController extends Controller
{
	public function __construct() {}
	public function index()
	{
		view("Booking");
	}
	public function create()
	{
		view("Booking");
	}
	public function save($data, $file)
	{
		if (isset($data["create"])) {
			$errors = [];
			global $now;
			if (count($errors) == 0) {
				$reservation = new Reservation();
				$reservation->user_id = $data["user_id"];
				$reservation->customer_id = $data["customer_id"];
				$reservation->booking_date = $now;
				$reservation->room_id = $data["room_id"];
				$reservation->check_in_date = $data["check_in_date"];
				$reservation->check_out_date = $data["check_out_date"];
				$reservation->special_requests = $data["special_requests"];
				$reservation->room_price = $data["room_price"];
				$reservation->discount = $data["discount"];
				$reservation->tax = $data["tax"];
				$reservation->total_amount = $data["total_amount"];
				$reservation->remaining_amount = $data["remaining_amount"];
				$reservation->payment_status = $data["payment_status"];
				$reservation->created_at = $now;
				$reservation->updated_at = $now;
				$reservation_id = $reservation->save();


				if (count($errors) == 0) {
					$billing = new Billing();
					$billing->reservation_id = $reservation_id;
					$billing->user_id = $data["user_id"];
					$billing->room_id = $data["room_id"];
					$billing->customer_id = $data["customer_id"];
					$billing->check_in_date = date("Y-m-d", strtotime($data["check_in_date"]));
					$billing->check_out_date = date("Y-m-d", strtotime($data["check_out_date"]));
					$billing->room_price = $data["room_price"];
					$billing->tax = $data["tax"];
					$billing->discount = $data["discount"];
					$billing->other_service_id = 0; //$data["other_service_id"];
					$billing->other_service_price = 0; //$data["other_service_price"];
					$billing->cleaning_charges = 0; //$data["cleaning_charges"];
					$billing->service_charges = 0; //$data["service_charges"];
					$billing->total_amount = $data["total_amount"];
					$billing->payment_method_id = $data["payment_method_id"];
					$billing->payment_date = $now;
					$billing->created_at = $now;

					$billing->save();





					redirect();
				} else {
					print_r($errors);
				}
			}
		}
	}
	public function edit($id)
	{
		view("Booking", Reservation::find($id));
	}
	public function update($data, $file)
	{
		if (isset($data["update"])) {
			$errors = [];
			/*
	if(!preg_match("/^[\s\S]+$/",$data["user_id"])){
		$errors["user_id"]="Invalid user_id";
	}
	if(!preg_match("/^[\s\S]+$/",$data["customer_id"])){
		$errors["customer_id"]="Invalid customer_id";
	}
	if(!preg_match("/^[\s\S]+$/",$data["room_id"])){
		$errors["room_id"]="Invalid room_id";
	}
	if(!preg_match("/^[\s\S]+$/",$data["check_in_date"])){
		$errors["check_in_date"]="Invalid check_in_date";
	}
	if(!preg_match("/^[\s\S]+$/",$data["check_out_date"])){
		$errors["check_out_date"]="Invalid check_out_date";
	}
	if(!preg_match("/^[\s\S]+$/",$data["special_requests"])){
		$errors["special_requests"]="Invalid special_requests";
	}
	if(!preg_match("/^[\s\S]+$/",$data["room_price"])){
		$errors["room_price"]="Invalid room_price";
	}
	if(!preg_match("/^[\s\S]+$/",$data["discount"])){
		$errors["discount"]="Invalid discount";
	}
	if(!preg_match("/^[\s\S]+$/",$data["tax"])){
		$errors["tax"]="Invalid tax";
	}
	if(!preg_match("/^[\s\S]+$/",$data["total_amount"])){
		$errors["total_amount"]="Invalid total_amount";
	}
	if(!preg_match("/^[\s\S]+$/",$data["remaining_amount"])){
		$errors["remaining_amount"]="Invalid remaining_amount";
	}
	if(!preg_match("/^[\s\S]+$/",$data["payment_status"])){
		$errors["payment_status"]="Invalid payment_status";
	}

*/
			global $now;
			if (count($errors) == 0) {
				$reservation = new Reservation();
				$reservation->id = $data["id"];
				$reservation->user_id = $data["user_id"];
				$reservation->customer_id = $data["customer_id"];
				$reservation->booking_date = $now;
				$reservation->room_id = $data["room_id"];
				$reservation->check_in_date = $data["check_in_date"];
				$reservation->check_out_date = $data["check_out_date"];
				$reservation->special_requests = $data["special_requests"];
				$reservation->room_price = $data["room_price"];
				$reservation->discount = $data["discount"];
				$reservation->tax = $data["tax"];
				$reservation->total_amount = $data["total_amount"];
				$reservation->remaining_amount = $data["remaining_amount"];
				$reservation->payment_status = $data["payment_status"];
				$reservation->created_at = $now;
				$reservation->updated_at = $now;

				$reservation->update();
				redirect();
			} else {
				print_r($errors);
			}
		}
	}
	public function confirm($id)
	{
		view("Booking");
	}
	public function delete($id)
	{
		Reservation::delete($id);
		redirect();
	}
	public function show($id)
	{
		view("Booking", Reservation::find($id));
	}
	public function bill($id)
	{
		view("Booking", Reservation::find($id));
	}
}
