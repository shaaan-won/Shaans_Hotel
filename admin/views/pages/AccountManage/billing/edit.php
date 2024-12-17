<?php
// echo Page::title(["title"=>"Edit Billing"]);
// echo Page::body_open();
// echo Html::link(["class"=>"btn btn-success", "route"=>"billing", "text"=>"Manage Billing"]);
// echo Page::context_open();
// echo Form::open(["route"=>"billing/update"]);
// 	echo Form::input(["label"=>"Id","type"=>"hidden","name"=>"id","value"=>"$billing->id"]);
// 	echo Form::input(["label"=>"Reservation","name"=>"reservation_id","table"=>"reservations","value"=>"$billing->reservation_id","display_column"=>"id"]);
// 	echo Form::input(["label"=>"User","name"=>"user_id","table"=>"users","value"=>"$billing->user_id"]);
// 	echo Form::input(["label"=>"Room","name"=>"room_id","table"=>"rooms","value"=>"$billing->room_id","display_column"=>"room_number"]);
// 	echo Form::input(["label"=>"Customer","name"=>"customer_id","table"=>"customers","value"=>"$billing->customer_id"]);
// 	echo Form::input(["label"=>"Check In Date","type"=>"date","name"=>"check_in_date","value"=>"$billing->check_in_date"]);
// 	echo Form::input(["label"=>"Check Out Date","type"=>"date","name"=>"check_out_date","value"=>"$billing->check_out_date"]);
// 	echo Form::input(["label"=>"Room Price","type"=>"text","name"=>"room_price","value"=>"$billing->room_price"]);
// 	echo Form::input(["label"=>"Tax","type"=>"text","name"=>"tax","value"=>"$billing->tax"]);
// 	echo Form::input(["label"=>"Discount","type"=>"text","name"=>"discount","value"=>"$billing->discount"]);
// 	echo Form::input(["label"=>"Other Service","name"=>"other_service_id","table"=>"other_services","value"=>"$billing->other_service_id"]);
// 	echo Form::input(["label"=>"Other Service Price","type"=>"text","name"=>"other_service_price","value"=>"$billing->other_service_price"]);
// 	echo Form::input(["label"=>"Cleaning Charges","type"=>"text","name"=>"cleaning_charges","value"=>"$billing->cleaning_charges"]);
// 	echo Form::input(["label"=>"Service Charges","type"=>"text","name"=>"service_charges","value"=>"$billing->service_charges"]);
// 	echo Form::input(["label"=>"Total Amount","type"=>"text","name"=>"total_amount","value"=>"$billing->total_amount"]);
// 	echo Form::input(["label"=>"Payment Method","name"=>"payment_method_id","table"=>"payment_methods","value"=>"$billing->payment_method_id"]);

// echo Form::input(["name"=>"update","class"=>"btn btn-success offset-2" , "value"=>"Save Chanage", "type"=>"submit"]);
// echo Form::close();
// echo Page::context_close();
// echo Page::body_close();
?>

<?php
// Example check-in and check-out dates
$check_in = $billing->check_in_date; // YYYY-MM-DD HH:MM:SS format
$check_out =  $billing->check_out_date; // YYYY-MM-DD HH:MM:SS format

// Create DateTime objects for check-in and check-out dates
$check_in_date = new DateTime($check_in);
$check_out_date = new DateTime($check_out);

// Calculate the difference between the two dates
$interval = $check_in_date->diff($check_out_date);

// Get the total number of days
$days = $interval->days;

// Output the result
// echo "Total days between check-in and check-out: " . $days . " day(s)";
?>

<style>
	/* General Styles */
	/* body {
		font-family: "Arial", sans-serif;
		background-color: #f4f6f9;
		color: #333;
	} */

	.container {
		background-color: #fff;
		max-width: 90%;
		padding: 30px;
		border-radius: 8px;
		box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
		margin-top: 50px;
	}

	/* Header Styling */
	.invoice-header {
		text-align: center;
		margin-bottom: 40px;
	}

	.invoice-header h2 {
		font-size: 2.5rem;
		font-weight: bold;
		color: #0056b3;
		margin-bottom: 10px;
	}

	.invoice-header p {
		font-size: 1.1rem;
		margin: 5px 0;
	}

	/* Section Titles */
	.section-title {
		font-size: 1.4rem;
		font-weight: bold;
		text-align: center;
		color: #333;
		margin-top: 40px;
		border-bottom: 2px solid #0056b3;
		padding-bottom: 5px;
		margin-bottom: 20px;
	}

	/* Customer & Billing Information */
	.row>.col-md-6 {
		margin-bottom: 20px;
	}

	.col-md-6 h5 {
		font-size: 1.2rem;
		color: #333;
		margin-bottom: 15px;
		font-weight: 600;
	}

	.col-md-6 p {
		font-size: 1rem;
		margin: 5px 0;
	}

	.col-md-6 span {
		font-weight: 500;
	}

	/* Table Styles */
	.invoice-table {
		width: 100%;
		margin-top: 20px;
		border-collapse: collapse;
	}

	.invoice-table th,
	.invoice-table td {
		padding: 12px;
		text-align: center;
		border: 1px solid #ddd;
	}

	.invoice-table th {
		background-color: #f8f9fa;
		font-weight: 600;
		color: #495057;
	}

	.invoice-table td {
		font-size: 1.1rem;
		color: #333;
	}

	.invoice-table .total-amount {
		font-size: 1.5rem;
		font-weight: bold;
		color: #28a745;
	}

	.invoice-table .btn-primary,
	.invoice-table .btn-success {
		margin: 10px 5px;
		padding: 10px 20px;
		font-size: 1rem;
	}

	/* Final Total Section */
	.text-center h3 {
		font-size: 2rem;
		font-weight: bold;
		color: #333;
		margin-bottom: 30px;
	}

	.text-center button {
		width: 200px;
	}

	/* Responsive Design */
	@media (max-width: 768px) {
		.container {
			padding: 20px;
		}

		.invoice-header h2 {
			font-size: 2rem;
		}

		.invoice-table th,
		.invoice-table td {
			padding: 8px;
		}

		.invoice-table {
			margin-top: 15px;
		}

		.section-title {
			font-size: 1.2rem;
		}

		.text-center h3 {
			font-size: 1.8rem;
		}
	}
</style>

<div class="container">
	<div class="invoice-header" style="background-color:rgb(165, 167, 160); color:white">
		<h2>Shaan's Hotel Invoice</h2>
		<h3 style=" color:white ">Invoice #<span id="invoice-id"><?php echo $billing->id ?></span></h3>
		<p>Date: <span id="invoice-date"><?php echo date("F j, Y", strtotime($billing->created_at)) ?></span></p>
	</div>

	<!-- Customer & Billing Information Section -->
	<div class="row">
		<div class="col-md-6">
			<h5>Customer Details:</h5>
			<p>Name: <span id="customer-name"><?php echo Customer::find($billing->customer_id)->name ?></span></p>
			<p>Email: <span id="customer-email"><?php echo Customer::find($billing->customer_id)->email ?></span></p>
			<p>Phone: <span id="customer-phone"><?php echo Customer::find($billing->customer_id)->phone ?></span></p>
			<p>
				Address:
				<span id="customer-address"><?php echo Customer::find($billing->customer_id)->address ?></span>
			</p>
		</div>
		<div class="col-md-6">
			<h5>Billing Information:</h5>
			<p>Room Type: <span id="room-type"><?php echo RoomType::find($billing->room_id)->name ?></span></p>
			<p>Check-In Date: <span id="check-in"><?php echo date("F j, Y:h:i A", strtotime($billing->check_in_date)) ?></span></p>
			<p>Check-Out Date: <span id="check-out"><?php echo date("F j, Y:h:i A", strtotime($billing->check_out_date)) ?></span></p>
			<p>Reservation ID: <span id="reservation-id"><?php echo $billing->reservation_id ?></span></p>
			<p>Status: <span id="status"><?php echo Payment::find($billing->reservation_id)->payment_status ?></span></p>
		</div>
	</div>

	<!-- Billing Table -->
	<div class="section-title">Billing Details</div>
	<table class="table table-bordered invoice-table">
		<thead>
			<tr>
				<th>Description</th>
				<th>Amount</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>Room Price (<?php echo $days ?> nights)</td>
				<td id="room-price">$<?php echo $billing->room_price ?></td>
			</tr>
			<tr>
				<td>Tax (10%)</td>
				<td id="tax">$<?php echo $billing->tax ?></td>
			</tr>
			<tr>
				<td>Discount (10%)</td>
				<td id="discount">-$<?php echo $billing->discount ?></td>
			</tr>
			<tr>
				<td>Service Charges</td>
				<td id="service-charges">$<?php echo $billing->service_charges ?></td>
			</tr>
			<tr>
				<td>Cleaning Charges</td>
				<td id="cleaning-charges">$<?php echo $billing->cleaning_charges ?></td>
			</tr>
			<tr>
				<td>Extra Services (<?php echo OtherService::find($billing->other_service_id)->name ?>)</td>
				<td id="extra-services">$<?php echo $billing->other_service_price ?></td>
			</tr>
			<tr>
				<td><strong>Total Amount</strong></td>
				<td class="total-amount" id="total-amount">$<?php echo $billing->total_amount ?></td>
			</tr>
		</tbody>
	</table>

	<!-- Payment History Section -->
	<div class="section-title">Payment History</div>
	<table class="table table-bordered invoice-table">
		<thead>
			<tr>
				<th>Payment Method</th>
				<th>Amount Paid</th>
				<th>Status</th>
				<th>Payment Date</th>
			</tr>
		</thead>
		<tbody>
			<!-- <?php
			$payments = Payment::find($billing->reservation_id);
			// print_r($payments);
			foreach ($payments as  $payment) {
			?>
				<tr>
					<td><?php echo PaymentMethod::find($payment->payment_method_id)->name ?></td>
					<td>$<?php echo $payment->amount_received ?></td>
					<td><?php echo $payment->payment_status ?></td>
					<td><?php echo date("F j, Y", strtotime($payment->payment_date)) ?></td>
				</tr>
			<?php
			}
			?> -->
		</tbody>
	</table>

	<!-- Service Requests Section -->
	<div class="section-title">Service Requests</div>
	<table class="table table-bordered invoice-table">
		<thead>
			<tr>
				<th>Service</th>
				<th>Description</th>
				<th>Status</th>
				<th>Cost</th>
			</tr>
		</thead>
		<tbody>
			<!-- <tr>
				<td>Spa</td>
				<td>Full body massage</td>
				<td>Completed</td>
				<td>$100.00</td>
			</tr>
			<tr>
				<td>Room Service</td>
				<td>Breakfast</td>
				<td>Completed</td>
				<td>$25.00</td>
			</tr> -->
			<!-- <?php
			$otherservices = OtherService::find($billing->reservation_id);
			foreach ($otherservices as $otherservice) {
			?>
				<tr>
					<td><?php echo OtherService::find($otherservice->service_id)->name ?></td>
					<td><?php echo $otherservice->description ?></td>
					<td><?php echo $otherservice->status ?></td>
					<td>$<?php echo $otherservice->cost ?></td>
				</tr>
			<?php
			}
			?> -->
		</tbody>
	</table>

	<!-- Notes Section -->
	<div class="section-title">Special Notes</div>
	<p id="special-notes" style="align-items: center; text-align: center ; font-size: 20px; font-weight: bold">
		Thank you for staying with us. We hope you had a pleasant experience!
	</p>

	<!-- Final Total Section -->
	<div class="text-center">
		<h3>Total Due: <span id="final-total">$675.00</span></h3>
		<button class="btn btn-primary" id="edit-invoice">Edit Invoice</button>
		<button class="btn btn-success" id="generate-invoice">
			Generate Invoice
		</button>
	</div>
</div>