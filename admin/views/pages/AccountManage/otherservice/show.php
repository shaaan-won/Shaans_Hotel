<?php
echo Page::title(["title"=>"Show OtherService"]);
echo Page::body_open();
echo Html::link(["class"=>"btn btn-success", "route"=>"otherservice", "text"=>"Manage OtherService"]);
echo Page::context_open();
echo OtherService::html_row_details($id);
echo Page::context_close();
echo Page::body_close();
