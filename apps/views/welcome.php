<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome To MVC Simple</title>
    <link rel="stylesheet" href="<?php echo $this->asset('css/w3.css');?>">
    <style>
        .container-small {
            width: 600px;
            margin: 5% auto;
        }
    </style>
</head>
<body>
    <div class="container-small">
        <div class="w3-container w3-row">
            <span class="w3-text-red w3-small" id="err-msg"></span>
            <input type="text" class="w3-input w3-border" placeholder="Apa yang anda pikirkan?">
        </div>
    </div>
</body>
</html>