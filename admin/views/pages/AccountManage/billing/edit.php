<?php
echo Page::title(["title"=>"Edit Billing"]);
echo Page::body_open();
echo Html::link(["class"=>"btn btn-success", "route"=>"billing", "text"=>"Manage Billing"]);
echo Page::context_open();
echo Form::open(["route"=>"billing/update"]);
	echo Form::input(["label"=>"Id","type"=>"hidden","name"=>"id","value"=>"$billing->id"]);
	echo Form::input(["label"=>"Reservation","name"=>"reservation_id","table"=>"reservations","value"=>"$billing->reservation_id","display_column"=>"id"]);
	echo Form::input(["label"=>"User","name"=>"user_id","table"=>"users","value"=>"$billing->user_id"]);
	echo Form::input(["label"=>"Room","name"=>"room_id","table"=>"rooms","value"=>"$billing->room_id","display_column"=>"room_number"]);
	echo Form::input(["label"=>"Customer","name"=>"customer_id","table"=>"customers","value"=>"$billing->customer_id"]);
	echo Form::input(["label"=>"Check In Date","type"=>"date","name"=>"check_in_date","value"=>"$billing->check_in_date"]);
	echo Form::input(["label"=>"Check Out Date","type"=>"date","name"=>"check_out_date","value"=>"$billing->check_out_date"]);
	echo Form::input(["label"=>"Room Price","type"=>"text","name"=>"room_price","value"=>"$billing->room_price"]);
	echo Form::input(["label"=>"Tax","type"=>"text","name"=>"tax","value"=>"$billing->tax"]);
	echo Form::input(["label"=>"Discount","type"=>"text","name"=>"discount","value"=>"$billing->discount"]);
	echo Form::input(["label"=>"Other Service","name"=>"other_service_id","table"=>"other_services","value"=>"$billing->other_service_id"]);
	echo Form::input(["label"=>"Other Service Price","type"=>"text","name"=>"other_service_price","value"=>"$billing->other_service_price"]);
	echo Form::input(["label"=>"Cleaning Charges","type"=>"text","name"=>"cleaning_charges","value"=>"$billing->cleaning_charges"]);
	echo Form::input(["label"=>"Service Charges","type"=>"text","name"=>"service_charges","value"=>"$billing->service_charges"]);
	echo Form::input(["label"=>"Total Amount","type"=>"text","name"=>"total_amount","value"=>"$billing->total_amount"]);
	echo Form::input(["label"=>"Payment Method","name"=>"payment_method_id","table"=>"payment_methods","value"=>"$billing->payment_method_id"]);

echo Form::input(["name"=>"update","class"=>"btn btn-success offset-2" , "value"=>"Save Chanage", "type"=>"submit"]);
echo Form::close();
echo Page::context_close();
echo Page::body_close();
?>

