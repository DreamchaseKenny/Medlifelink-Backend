<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointment Confirmation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 100%;
            max-width: 600px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .header {
            background-color: #007BFF;
            color: #fff;
            padding: 10px;
            border-radius: 8px 8px 0 0;
        }
        .content {
            padding: 20px;
        }
        .footer {
            background-color: #f4f4f4;
            color: #777;
            text-align: center;
            padding: 10px;
            border-radius: 0 0 8px 8px;
            font-size: 12px;
        }
        .button {
            display: inline-block;
            padding: 10px 20px;
            margin: 20px 0;
            background-color: #007BFF;
            color: #fff;
            text-decoration: none;
            border-radius: 4px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Appointment Confirmation</h1>
        </div>
        <div class="content">
            <p>Dear {{$content['user']->fullname}},</p>
            <p>{{$content['message']}}</p>
            <p>
                <strong>Date:</strong>  {{$content['appointment']->appointment_time}}<br>
                <strong>Time:</strong> [Appointment Time]<br>
                <strong>Location:</strong> [Appointment Location]<br>
            </p>
            <p>If you have any questions or need to reschedule, please contact us at [Contact Information].</p>
            <p>Thank you!</p>
            <p>Best regards,<br>[Your Company Name]</p>
            <a href="[Appointment Details Link]" class="button">View Appointment Details</a>
        </div>
        <div class="footer">
            <p>&copy; [Year] [Your Company Name]. All rights reserved.</p>
        </div>
    </div>
</body>
</html>
