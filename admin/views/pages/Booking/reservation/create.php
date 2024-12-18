<?php
echo Page::title(["title"=>"Create Reservation"]);
echo Page::body_open();
echo Html::link(["class"=>"btn btn-success", "route"=>"reservation", "text"=>"Manage Reservation"]);
echo Page::context_open();
echo Form::open(["route"=>"reservation/save"]);
	echo Form::input(["label"=>"User","name"=>"user_id","table"=>"users"]);
	echo Form::input(["label"=>"Customer","name"=>"customer_id","table"=>"customers"]);
	echo Form::input(["label"=>"Room","name"=>"room_id","table"=>"rooms","display_column"=>"room_number"]);
	echo Form::input(["label"=>"Check In Date","type"=>"text","name"=>"check_in_date"]);
	echo Form::input(["label"=>"Check Out Date","type"=>"text","name"=>"check_out_date"]);
	echo Form::input(["label"=>"Special Requests","type"=>"textarea","name"=>"special_requests"]);
	echo Form::input(["label"=>"Room Price","type"=>"text","name"=>"room_price"]);
	echo Form::input(["label"=>"Discount","type"=>"text","name"=>"discount"]);
	echo Form::input(["label"=>"Tax","type"=>"text","name"=>"tax"]);
	echo Form::input(["label"=>"Total Amount","type"=>"text","name"=>"total_amount"]);
	echo Form::input(["label"=>"Remaining Amount","type"=>"text","name"=>"remaining_amount"]);
	echo Form::input(["label"=>"Service","name"=>"other_service_id","table"=>"other_services"]);
	echo Form::input(["label"=>"Service Charges","name"=>"other_service_price","type"=>"text"]);
	echo Form::input(["label"=>"Payment Status","table"=>"status","name"=>"payment_status"]);
	echo Form::input(["label"=>"Payment Status","table"=>"payment_methods","name"=>"payment_method_id"]);

echo Form::input(["name"=>"create","class"=>"btn btn-primary offset-2", "value"=>"Save", "type"=>"submit"]);
echo Form::close();
echo Page::context_close();
echo Page::body_close();
