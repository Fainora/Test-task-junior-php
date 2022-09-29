<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="public/css/style.css">
</head>
<body>
    <?php
        $src = 'image/banner.jpeg';
    ?>
    <p>Добавить id к картинкам и в css задать размер</p>
    <img src="public/<?=$src; ?>" alt="" id="preview">
    <img src="public/<?=$src; ?>" alt="" id="news">
    <img src="public/<?=$src; ?>" alt="" id="mobile">
    
    <p>
        Или можно загрузить изображение, получить его размеры, изменить размер с помощью
        imagecopyresized(), сохранить и загрузить. Но в этом случае картинок будет уже не 1
        и качество ухудшится
    </p>
    <?php
        list($width, $height, $type, $attr) = getimagesize("image/banner.jpeg");
        $percent = 0.5;

        $new_width = $width * $percent;
        $new_height = $height * $percent;

        $thumb = imagecreatetruecolor($new_width, $new_height);
        $source = imagecreatefromjpeg($src);

        imagecopyresized($thumb, $source, 0, 0, 0, 0, $new_width, $new_height, $width, $height);

        imagejpeg($thumb, 'image/new.jpeg');

        echo "<img src=\"public/image/new.jpeg\" alt=\"\" />";
    ?>
    
</body>
</html>
