<?php
echo Page::title(["title"=>"Create Payment"]);
echo Page::body_open();
echo Html::link(["class"=>"btn btn-success", "route"=>"payment", "text"=>"Manage Payment"]);
echo Page::context_open();
echo Form::open(["route"=>"payment/save"]);
	echo Form::input(["label"=>"Reservation","name"=>"reservation_id","table"=>"reservations","display_column"=>"id"]);
	echo Form::input(["label"=>"Amount","type"=>"text","name"=>"amount"]);
	echo Form::input(["label"=>"Amount Received","type"=>"text","name"=>"amount_received"]);
	echo Form::input(["label"=>"Amount Due","type"=>"text","name"=>"amount_due"]);
	echo Form::input(["label"=>"Payment Method","name"=>"payment_method_id","table"=>"payment_methods"]);
	echo Form::input(["label"=>"Payment Status","type"=>"text","name"=>"payment_status"]);

echo Form::input(["name"=>"create","class"=>"btn btn-primary offset-2", "value"=>"Save", "type"=>"submit"]);
echo Form::close();
echo Page::context_close();
echo Page::body_close();
