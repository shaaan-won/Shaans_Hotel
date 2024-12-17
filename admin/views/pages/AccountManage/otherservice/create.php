<?php
echo Page::title(["title"=>"Create OtherService"]);
echo Page::body_open();
echo Html::link(["class"=>"btn btn-success", "route"=>"otherservice", "text"=>"Manage OtherService"]);
echo Page::context_open();
echo Form::open(["route"=>"otherservice/save"]);
	echo Form::input(["label"=>"Name","type"=>"text","name"=>"name"]);
	echo Form::input(["label"=>"Description","type"=>"textarea","name"=>"description"]);
	echo Form::input(["label"=>"Status","name"=>"status_id","table"=>"status"]);
	echo Form::input(["label"=>"Price","type"=>"text","name"=>"price"]);

echo Form::input(["name"=>"create","class"=>"btn btn-primary offset-2", "value"=>"Save", "type"=>"submit"]);
echo Form::close();
echo Page::context_close();
echo Page::body_close();
