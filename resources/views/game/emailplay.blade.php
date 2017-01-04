<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="utf-8">
</head>
<body>
<div class="container">
    <h2>Message play game</h2>

    <div>
        Thanks for play game with own website.

        Your information play bellow:

        <p>Your name: <?php echo $data['name'];?></p>
        <p>Your email: <?php echo $data['email'];?></p>
        <table border="1">
            <thead>
            <tr>
                <th>#</th>
                <th>Number</th>
                <th>Price</th>
            </tr>
            </thead>
            <tbody>
            <?php $i=0; foreach ($data['items'] as $item) : $i++; ?>
            <tr>
                <td><?php echo $i;?></td>
                <td><?php echo $item['number'];?></td>
                <td align="right"><?php echo $item['price'];?></td>
            </tr>
            <?php endforeach; ?>
            <tr>
                <td>Total:</td>
                <td colspan="2" align="right"><?php echo $data['total'];?></td>
            </tr>
            </tbody>
        </table>

        <br/>
        <br/>
        CK game: {{ URL::to('/') }}.<br/>
    </div>
</div>

</body>
</html>
