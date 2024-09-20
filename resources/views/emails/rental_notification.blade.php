<!-- resources/views/emails/rental_notification.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Rental Notification</title>
</head>
<body>
    <h2>New Car Rental Notification</h2>
    <p>Hello Admin,</p>
    <p>{{ $customerName }} has rented a car with the following details:</p>
    <ul>
        <li><strong>Car:</strong> {{ $carDetails->car->name }}</li>
        <li><strong>Rental Period:</strong> From {{ $carDetails->start_date }} to {{ $carDetails->end_date }}</li>
        <li><strong>Total Cost:</strong> ${{ $carDetails->total_cost }}</li>
    </ul>
</body>
</html>
