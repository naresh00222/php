
<?php

require __DIR__ . '/vendor/autoload.php';

use Mexitek\PHPColors\Color;

// Reads the colour value from the submitted form
$baseHex = $_POST['base'] ?? '#3445db';

//This code uses the PHPColors library
$color = new Color($baseHex);
$amount =(int) $_POST['amount'] ?? '10';
$lighter = $color->lighten($amount);
$darker = $color->darken($amount);
// $complementary = $color->complementary();;


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PHPColors demo</title>
    <link href="./css/style.css" type="text/css" rel="stylesheet">
</head>
<body>

    <h1>PHPColors demo</h1>

    <form action="<?php echo $_SERVER['PHP_SELF'] ?>"  method="post">
        <div class="form-ctrl">
        <label>Choose a base colour:
            <input type="color" name="base" value="<?php echo $baseHex; ?>">
        </label>
        </div>
        <div class="form-ctrl">
        <label>
            Choose an amount to lighten/darken by:
            <input type="number" name="amount" min="0" max="50" value="<?php echo $amount; ?>">
        </label>
    </div>
    <div class="form-ctrl">
            <button type="submit">Update</button>
    </div>
    </form>
    <div class="swatch-holder">

        <div class="swatch">
            <div class="swatch-color" style="background:<?php echo $baseHex; ?>;"></div>
            <div class="swatch-info">
                <div class="swatch-name">Base Colour</div>
                <div class="swatch-hex"><?php echo $baseHex ?></div>
            </div>
        </div>

         <div class="swatch">
            <div class="swatch-color" style="background:#<?php echo $lighter; ?>;"></div>
            <div class="swatch-info">
                <div class="swatch-name">Lighter</div>
                <div class="swatch-hex"><?php echo $lighter ?></div>
            </div>
        </div>
        <!-- Darker swatch -->
         <div class="swatch">
            <div class="swatch-color" style="background:<?php echo $darker; ?>;"></div>
            <div class="swatch-info">
                <div class="swatch-name">Darker</div>
                <div class="swatch-hex"><?php echo $darker; ?></div>
            </div>
        </div>



    </div>

</body>
</html>


