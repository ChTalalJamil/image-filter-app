<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Image Filter App</title>
    <style>
        .image-container {
            position: relative;
            display: inline-block;
            text-align: center;
        }
        .image-container img{
            width: 45%;
        }
        .image-name {
            background-color: rgba(0, 0, 0, 0.5);
            color: #fff;
            font-size: 24px;
            padding: 10px;
            margin: 0;
        }
    </style>
</head>

<body>
    <div class="image-container">
        <h2 class="image-name">John Doe</h2>
        <img src="{{ asset('display-image.jpg') }}" alt="My Image">
    </div>
</body>

</html>