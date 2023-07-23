<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body style="background: #f7f9fa;padding:30px;font-family: Arial, Helvetica, sans-serif">
    <div style="width: 600px;background: #fff;padding:20px;border:1px solid #eee">
        <h3>Dear Admin</h3>
        <p>There is a new message</p>
        <p><b>Name</b> {{ $info['name'] }}</p>
        <p><b>Email</b> {{ $info['email'] }}</p>
        <p><b>Phone</b> {{ $info['phone'] }}</p>
        <p><b>Message</b> {{ $info['message'] }}</p>
        <br>
        <p>Best Regards</p>
    </div>
</body>
</html>
