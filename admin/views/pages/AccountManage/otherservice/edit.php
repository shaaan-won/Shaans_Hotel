<?php
echo Page::title(["title"=>"Edit OtherService"]);
echo Page::body_open();
echo Html::link(["class"=>"btn btn-success", "route"=>"otherservice", "text"=>"Manage OtherService"]);
echo Page::context_open();
echo Form::open(["route"=>"otherservice/update"]);
	echo Form::input(["label"=>"Id","type"=>"hidden","name"=>"id","value"=>"$otherservice->id"]);
	echo Form::input(["label"=>"Name","type"=>"text","name"=>"name","value"=>"$otherservice->name"]);
	echo Form::input(["label"=>"Description","type"=>"textarea","name"=>"description","value"=>"$otherservice->description"]);
	echo Form::input(["label"=>"Status","name"=>"status_id","table"=>"status","value"=>"$otherservice->status_id"]);
	echo Form::input(["label"=>"Price","type"=>"text","name"=>"price","value"=>"$otherservice->price"]);

echo Form::input(["name"=>"update","class"=>"btn btn-success offset-2" , "value"=>"Save Chanage", "type"=>"submit"]);
echo Form::close();
echo Page::context_close();
echo Page::body_close();
