<?php
echo Page::title(["title"=>"Show CheckInCheckOut"]);
echo Page::body_open();
echo Html::link(["class"=>"btn btn-success", "route"=>"checkincheckout", "text"=>"Manage CheckInCheckOut"]);
echo Page::context_open();
echo CheckInCheckOut::html_row_details($id);
echo Page::context_close();
echo Page::body_close();
