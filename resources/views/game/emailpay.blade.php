<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="utf-8">
</head>
<body>
<div class="container">
    <h2>Message pay money</h2>

    <div>
        Thanks for play game with own website.

        Your information pay bellow:

        <p>Your name: <?php echo $data['name'];?></p>
        <p>Your email: <?php echo $data['email'];?></p>
        <p>Your money pay: <?php echo $data['valueAdd'];?></p>
        <p>Your money current: <?php echo $data['valueNow'];?></p>
        <br/>
        <br/>
        CK game: {{ URL::to('/') }}.<br/>
    </div>
</div>

</body>
</html>
