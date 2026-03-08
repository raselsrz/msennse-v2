<!DOCTYPE html>
<html>
<head>
    <title>Welcome Email</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 20px auto;
            background: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .header {
            background: #e74901;
            color: white;
            text-align: center;
            padding: 15px;
            border-top-left-radius: 8px;
            border-top-right-radius: 8px;
        }
        .content {
            padding: 20px;
            text-align: center;
            color: #11161e;
        }
        .content h2 {
            color: #4CAF50;
        }
        .footer {
            text-align: center;
            padding: 15px;
            font-size: 14px;
            color: #777;
            border-top: 1px solid #ddd;
        }
        .btn {
            display: inline-block;
            background: #4CAF50;
            color: white;
            padding: 12px 20px;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 15px;
        }
        .btn:hover {
            background: #45a049;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="header">
        <img src="{{get_option('logo','')}}" alt="Logo" style="max-width: 100px;">
    </div>
    <div class="content">
        {!!  $details['message'] !!}
    </div>
    <div class="footer">
        <p>Best regards,</p>
        <p><strong>AustraliaPWC Community</strong></p>
    </div>
</div>

</body>
</html>
