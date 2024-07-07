<!DOCTYPE html>
<html>
<head>
    <title>Password Reset OTP</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            background-color: #ffffff;
            margin: 50px auto;
            padding: 20px;
            max-width: 600px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .header {
            background-color: #007BFF;
            padding: 10px;
            text-align: center;
            border-radius: 8px 8px 0 0;
            color: #ffffff;
        }
        .content {
            padding: 20px;
            text-align: center;
        }
        .otp {
            font-size: 24px;
            font-weight: bold;
            margin: 20px 0;
            padding: 10px;
            background-color: #f8f8f8;
            border: 1px dashed #007BFF;
            display: inline-block;
        }
        .footer {
            padding: 10px;
            text-align: center;
            font-size: 12px;
            color: #777777;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>{{$content['subject']}}</h1>
        </div>
        <div class="content">
            <p>Hi {{$content['model']->username}},</p>
            <p>{{$content['message']}}</p>
       
        </div>
        <div class="footer">
            <p>Thank you, <br> The medlifeiLink Team</p>
        </div>
    </div>
</body>
</html>
