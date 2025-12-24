<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$to = "asanheyaa@gmail.com"; // Твоя пошта
	$subject = "New Ride Request";

	// Збираємо всі поля
	$body = "New request:\n\n";
	$body .= "Legal Name: " . $_POST['legal-name'] . "\n";
	$body .= "Preferred Name: " . $_POST['preferred-name'] . "\n";
	$body .= "Email: " . $_POST['email'] . "\n";
	$body .= "Phone: " . $_POST['phone-number'] . "\n";
	$body .= "Date: " . $_POST['date'] . "\n";
	$body .= "Time: " . $_POST['time'] . "\n";
	$body .= "From Address: " . $_POST['from-address'] . "\n";
	$body .= "To Address: " . $_POST['to-address'] . "\n";
	$body .= "Additional Riders: " . $_POST['number-addit-riders'] . "\n";
	$body .= "Riders Names: " . $_POST['names-adit-riders'] . "\n";
	$body .= "Message: " . $_POST['message'] . "\n";

	$headers = "From: " . $_POST['email'];

	if (mail($to, $subject, $body, $headers)) {
		echo "<h2>Thank you! Your request has been sent.</h2>";
	} else {
		echo "<h2>Sorry, something went wrong. Please try again.</h2>";
	}
}
?>