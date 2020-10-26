<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
body{
    color:#435567;
    background-color: #F4F5F7;
}
a{
    text-decoration: none;
}
.message{
    background-color: white;
    margin: auto;
    width: 600px;
    padding: 15px;
    border-radius: 15px;
    border: 1px solid #ddd;
}
button{
    cursor: pointer;
    height: 41px;
    width: 250px;
    border-radius: 10px;
    border: 1px solid #ddd;
    background: #1886C4;
    color: white;
    font-size: 16px;
    font-weight: bold;
    letter-spacing: 1px;
    margin: auto;
    display: block;
    text-decoration: none;
}
    </style>
</head>
<body>
<div class="message">
    <h2>Hi {{$username}} !</h2>
    <h3>There was a request to change you password </h3>
    <p>If you did not make this request, just ignore this email, Otherwise, please click the button below to change your password </p>
    <a href="{{route('lostpassword.newpassword',$token.'?email='.$email)}}"><button>Change Password</button></a>
</div>

</body>
</html>
