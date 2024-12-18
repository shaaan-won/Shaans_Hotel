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

<?php
// print_r($reservation);
// Example check-in and check-out dates
$check_in = $reservation->check_in_date; // YYYY-MM-DD HH:MM:SS format
$check_out =  $reservation->check_out_date; // YYYY-MM-DD HH:MM:SS format

// Create DateTime objects for check-in and check-out dates
$check_in_date = new DateTime($check_in);
$check_out_date = new DateTime($check_out);

// Calculate the difference between the two dates
$interval = $check_in_date->diff($check_out_date);

// Get the total number of days
$days = $interval->days;

?>

<div class="container">
    <div class="invoice-header">
        <h2>Hotel Management Invoice</h2>
        <p>Invoice #<span id="invoice-id"><?php echo Billing::find($reservation->id)->id ?></span></p>
        <p>Date: <span id="invoice-date"><?php echo date("F j, Y", strtotime(Billing::find($reservation->id)->created_at)) ?></span></p>
    </div>

    <!-- Customer & Billing Information Section -->
    <div class="row">
        <div class="col-md-6">
            <h5>Customer Details:</h5>
            <p>Name: <span id="customer-name"><?php echo Customer::find($reservation->customer_id)->name; ?></span></p>
            <p>Email: <span id="customer-email"><?php echo Customer::find($reservation->customer_id)->email; ?></span></p>
            <p>Phone: <span id="customer-phone"><?php echo Customer::find($reservation->customer_id)->phone; ?></span></p>
            <p>
                Address:
                <span id="customer-address"><?php echo Customer::find($reservation->customer_id)->address; ?></span>
            </p>
        </div>
        <div class="col-md-6">
            <h5>Billing Information:</h5>
            <p>Room Type: <span id="room-type"><?php echo RoomType::find($reservation->room_id)->name; ?></span></p>
            <p>Check-In Date: <span id="check-in"><?php echo date("F j, Y", strtotime($reservation->check_in_date)) ?></span></p>
            <p>Check-Out Date: <span id="check-out"><?php echo date("F j, Y", strtotime($reservation->check_out_date)) ?></span></p>
            <p>Reservation ID: <span id="reservation-id"><?php echo $reservation->id; ?></span></p>
            <p>Status: <span id="status"><?php echo $reservation->payment_status; ?></span></p>
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
                <td id="room-price"><?php echo $reservation->room_price ?></td>
            </tr>
            <tr>
                <td>Tax (15%)</td>
                <td id="tax">$<?php echo $reservation->tax ?></td>
            </tr>
            <tr>
                <td>Discount (10%)</td>
                <td id="discount">-$<?php echo $reservation->discount ?></td>
            </tr>
            <tr>
                <td>Special Request</td>
                <td id="special-request"><?php echo $reservation->special_requests ?></td>
            </tr>
            <tr>
                <td>Cleaning Charges</td>
                <td id="cleaning-charges">$<?php echo Billing::find($reservation->id)->cleaning_charges ?></td>
            </tr>
            <tr>
                <td>Extra Services (<?php echo OtherService::find(Billing::find($reservation->id)->other_service_id)->name ?>)</td>
                <td id="extra-services">$<?php echo Billing::find($reservation->id)->other_service_price ?></td>
            </tr>
            <tr>
                <td><strong>Total Amount</strong></td>
                <td class="total-amount" id="total-amount">$<?php echo Billing::find($reservation->id)->total_amount ?></td>
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
                <td>Cash</td>
                <td>$<?php echo Billing::find($reservation->id)->total_amount ?></td>
                <td>Completed</td>
                <td><?php echo date("F j, Y", strtotime(Billing::find($reservation->id)->created_at)) ?></td>
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
                <td><?php echo OtherService::find(Billing::find($reservation->id)->other_service_id)->name ?></td>
                <td><?php echo OtherService::find(Billing::find($reservation->id)->other_service_id)->description ?></td>
                <td><?php echo Statu::find(OtherService::find(Billing::find($reservation->id)->other_service_id)->status_id)->name ?></td>
                <td>$<?php echo Billing::find($reservation->id)->other_service_price ?></td>
            </tr>
        </tbody>
    </table>

    <!-- Notes Section -->
    <div class="section-title">Special Notes</div>
    <p id="special-notes" style="align-items: center; text-align: center ; font-size: 20px; font-weight: bold">
        Thank you for staying with us. We hope you had a pleasant experience!
    </p>

    <!-- Final Total Section -->
    <div class="text-center">
        <h3 >Status: <span id="status" class="text-success" ><?php echo Payment::find($reservation->id)->payment_status ?></span></h3>
        <h3>Amount Paid: <span id="amount-paid">$<?php echo Payment::find($reservation->id)->amount_received ?></span></h3>
        <h4>Total Due: <span id="final-total">$<?php echo Payment::find($reservation->id)->amount_due ?></span></h4>
        <button class="btn btn-primary" id="edit-invoice">Edit Invoice</button>
        <button class="btn btn-success" id="generate-invoice">
            Generate Invoice
        </button>
    </div>
</div>