<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // collect value of input field
    $name = $_POST['name'];
    $errors = '';

    if (!empty($name)) {
        include 'phar://ArPHP.phar/Arabic.php';
        // (A) OPEN IMAGE
        $img = imagecreatefromjpeg('assets/backgroundImage.jpg');
        
        $color = imagecolorallocate($img, 99, 37, 107);
        $font = "assets/Sukar-Regular.ttf";
        
        $obj = new I18N_Arabic('Glyphs');
        $name = $obj->utf8Glyphs($name);
        
        // $font = "C:\Windows\Fonts\arial.ttf";

        // THE IMAGE SIZE
        $width = imagesx($img);
        $height = imagesy($img);
        // THE TEXT SIZE
        $text_size = imagettfbbox(70, 0, $font, $name);
        $text_width = max([$text_size[2], $text_size[4]]) - min([$text_size[0], $text_size[6]]);
        $text_height = max([$text_size[5], $text_size[7]]) - min([$text_size[1], $text_size[3]]);
        // CENTERING THE TEXT BLOCK
        $centerX = CEIL(($width - $text_width) / 2);
        $centerX = $centerX < 0 ? 0 : $centerX;
        $centerY = CEIL(($height - $text_height) / 2);
        $centerY = $centerY < 0 ? 0 : $centerY;
        imagettftext($img, 70, 0, $centerX, $centerY + 650, $color, $font, $name);
        // (C) OUTPUT IMAGE
        header('Content-type: image/jpeg');
        imagejpeg($img);
        imagedestroy($img);
    } else {
        $errors = 'يرجا ادخال الاسم';
    }
}
?>

<!doctype html>
<html lang="ar" dir="rtl">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="assets/Logo.jpg">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.rtl.min.css">

    <title>بطاقة تهنئة</title>
    <style>
        @font-face {
            font-family: Tajawal-Regular;
            src: url("assets\\Tajawal-Regular.ttf");
        }
        * {
            font-family: Tajawal-Regular;
        }
        .form-control {
            border: 1px solid #ffc107;
            text-align: center;
        }
        .form-control:focus {
            border-color: #ffc107;
            box-shadow: 0 0 0 0.25rem rgb(255 193 7 / 25%);
        }
    </style>
</head>

<body>
    <section class="py-5 text-center container">
        <div class="row py-lg-5">
            <div class="col-lg-6 col-md-8 mx-auto">
                <img class="d-block mx-auto mb-4" src="assets/Logo.jpg" alt="Logo">
                <h2 class="fw-lighter">بارك لأحبابك بحلول شهر الخير ادخل الاسم واحصل علي بطاقه تهنئه باسمك</h2>
                <div class="text-danger mb-4 mt-5">
                    <?php if (!empty($errors)) echo $errors; ?>
                </div>
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                    <div class="col-auto">
                        <input type="text" class="form-control" name="name" id="name" placeholder="أدخل الاسم هنا">
                    </div>
                    <div class="col-auto mt-3">
                        <button type="submit" class="btn btn-warning text-white mb-3">
                            <img src="assets/eye-solid.svg" style="width:20px;">
                            عرض البطاقة
                        </button>
                    </div>
                </form>
                <h4 class="m-3">تقبل الله منا ومنكم صالح الأعمال وكل عام وانتم بخير</h4>
                <p>
                    اهداء من :
                    <br>
                    <a target="_blank" href="https://passionplatforms.com/">منصه شغف</a>
                    
                </p>
            </div>
        </div>
    </section>
</body>

</html>