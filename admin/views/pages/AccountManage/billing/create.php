<?php
// echo Page::title(["title"=>"Create Billing"]);
// echo Page::body_open();
// echo Html::link(["class"=>"btn btn-success", "route"=>"billing", "text"=>"Manage Billing"]);
// echo Page::context_open();
// echo Form::open(["route"=>"billing/save"]);
// 	echo Form::input(["label"=>"Reservation","name"=>"reservation_id","table"=>"reservations","display_column"=>"id"]);
// 	echo Form::input(["label"=>"User","name"=>"user_id","table"=>"users"]);
// 	echo Form::input(["label"=>"Room","name"=>"room_id","table"=>"rooms","display_column"=>"room_number"]);
// 	echo Form::input(["label"=>"Customer","name"=>"customer_id","table"=>"customers"]);
// 	echo Form::input(["label"=>"Check In Date","type"=>"date","name"=>"check_in_date"]);
// 	echo Form::input(["label"=>"Check Out Date","type"=>"date","name"=>"check_out_date"]);
// 	echo Form::input(["label"=>"Room Price","type"=>"text","name"=>"room_price"]);
// 	echo Form::input(["label"=>"Tax","type"=>"text","name"=>"tax"]);
// 	echo Form::input(["label"=>"Discount","type"=>"text","name"=>"discount"]);
// 	echo Form::input(["label"=>"Other Service","name"=>"other_service_id","table"=>"other_services"]);
// 	echo Form::input(["label"=>"Other Service Price","type"=>"text","name"=>"other_service_price"]);
// 	echo Form::input(["label"=>"Cleaning Charges","type"=>"text","name"=>"cleaning_charges"]);
// 	echo Form::input(["label"=>"Service Charges","type"=>"text","name"=>"service_charges"]);
// 	echo Form::input(["label"=>"Total Amount","type"=>"text","name"=>"total_amount"]);
// 	echo Form::input(["label"=>"Payment Method","name"=>"payment_method_id","table"=>"payment_methods"]);

// echo Form::input(["name"=>"create","class"=>"btn btn-primary offset-2", "value"=>"Save", "type"=>"submit"]);
// echo Form::close();
// echo Page::context_close();
// echo Page::body_close();
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
		box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
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
		<h2>Hotel Management Invoice</h2>
		<h3 style=" color:white">Invoice # <span id="invoice-id"><?php echo date("Ymd") . "-INV000" . Billing::get_last_id() + 1 ?></span></h3>
		<p>Date: <span id="invoice-date"><?php echo date("F j, Y") ?></span></p>
	</div>

	<!-- Customer & Billing Information Section -->
	<div class="row">
		<div class="col-md-6">
			<h5>Customer Details:</h5>
			<p>Name: <input type="text" id="customer-name-input" > <span id="customer-name"><?php echo Customer::html_select("customer_id") ?></span></p>
			<p>Email: <span id="customer-email">johndoe@example.com</span></p>
			<p>Phone: <span id="customer-phone">123-456-7890</span></p>
			<p>
				Address:
				<span id="customer-address">123 Main Street, Springfield, USA</span>
			</p>
		</div>
		<div class="col-md-6">
			<h5>Billing Information:</h5>
			<p>Room Type: <span id="room-type">Deluxe Room</span></p>
			<p>Check-In Date: <span id="check-in">2024-12-10</span></p>
			<p>Check-Out Date: <span id="check-out">2024-12-15</span></p>
			<p>Reservation ID: <span id="reservation-id">45678</span></p>
			<p>Status: <span id="status">Paid</span></p>
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
				<td>Room Price (5 nights)</td>
				<td id="room-price">$500.00</td>
			</tr>
			<tr>
				<td>Tax (15%)</td>
				<td id="tax">$75.00</td>
			</tr>
			<tr>
				<td>Discount (10%)</td>
				<td id="discount">-$50.00</td>
			</tr>
			<tr>
				<td>Service Charges</td>
				<td id="service-charges">$30.00</td>
			</tr>
			<tr>
				<td>Cleaning Charges</td>
				<td id="cleaning-charges">$20.00</td>
			</tr>
			<tr>
				<td>Extra Services (Spa)</td>
				<td id="extra-services">$100.00</td>
			</tr>
			<tr>
				<td><strong>Total Amount</strong></td>
				<td class="total-amount" id="total-amount">$675.00</td>
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
			<tr>
				<td>Credit Card</td>
				<td>$500.00</td>
				<td>Paid</td>
				<td>2024-12-15</td>
			</tr>
			<tr>
				<td>Cash</td>
				<td>$175.00</td>
				<td>Paid</td>
				<td>2024-12-17</td>
			</tr>
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
			<tr>
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
			</tr>
		</tbody>
	</table>

	<!-- Notes Section -->
	<div class="section-title">Special Notes</div>
	<p id="special-notes" style="align-items: center; text-align: center ; font-size: 20px; font-weight: bold">
		Thank you for staying with us. We hope you had a pleasant experience!
	</p>

	<div class="text-center">
		<h4>Total Due: <span id="final-total"><?php echo Payment::find($billing->reservation_id)->amount_due ?></span></h4>
		<h4>Amount Paid: <span id="amount-paid"><?php echo Payment::find($billing->reservation_id)->amount_received ?></span></h4>
		<h3>Status: <span id="status"><?php echo Payment::find($billing->reservation_id)->payment_status ?></span></h3>
		<button class="btn btn-primary" id="edit-invoice">Edit Invoice</button>
		<button class="btn btn-success" id="generate-invoice">
			Generate Invoice
		</button>
	</div>
</div>
<script>
	$(document).ready(function() {
		// alert('hello');
		$("#customer_id").on("change",function() {
			// $(this).text($(this).find(":selected").text());
		
			let customer_id = $(this).val();
			// alert (customer_id);
			$.ajax({
				url: "<?php echo $base_url ?>api/customer/find",
				type: "get",
				data: {
					customer_id: customer_id
				},
				success: function(response) {
					 console.log(response);
					let customer = JSON.parse(response);
					// console.log(customer);
					$("#customer-name-input").val(customer.name);
					$("#customer-email").val(customer.email);
					$("#customer-phone").val(customer.phone);
					$("#customer-address").val(customer.address);
				}
			});

		});
	});
</script>