<!DOCTYPE html>
<html>
<head>
    <title>Appointment Confirmation - Himalaya Medical Centre</title>
</head>
<body>
    <p>Dear {{ $mailData['name'] }},</p>
    <p>Thank you for booking your appointment with Himalaya Medical Centre.</p>
    <p>The details of your appointment are below:</p>
    <ul>
        <li>Time & Date: {{ $mailData['time'] }}, {{ $mailData['date'] }}</li>
        <li>With: Dr. {{ $mailData['doctorName'] }}</li>
        <li>Location: Biratnagar</li>
        <li>Contact: 9876543210</li>
    </ul>
    <br>
    <p>We look forward to seeing you then!</p>
    <p>Sincerely,</p>
    <p>Himalaya Medical Centre</p>
</body>
</html>
