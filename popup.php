<?php
// Массив с данными для кейсов
$casesData = [
    ['title' => 'Заголовок кейса 1', 'description' => 'Описание кейса 1', 'images' => ['https://via.placeholder.com/400x300', 'https://via.placeholder.com/400x300']],
    ['title' => 'Заголовок кейса 2', 'description' => 'Описание кейса 2', 'images' => ['https://via.placeholder.com/400x300', 'https://via.placeholder.com/400x300']],
    ['title' => 'Заголовок кейса 3', 'description' => 'Описание кейса 3', 'images' => ['https://via.placeholder.com/400x300', 'https://via.placeholder.com/400x300']],
    ['title' => 'Заголовок кейса 4', 'description' => 'Описание кейса 4', 'images' => ['https://via.placeholder.com/400x300', 'https://via.placeholder.com/400x300']],
    ['title' => 'Заголовок кейса 4', 'description' => 'Описание кейса 4', 'images' => ['https://via.placeholder.com/400x300', 'https://via.placeholder.com/400x300']],
    // Добавьте еще кейсы по мере необходимости
];
echo '<pre>';
var_dump($casesData);
echo '</pre>';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Попап с кейсами</title>
    <link rel="stylesheet" href="css/popup.css">
</head>
<body>

<!-- Контейнер для кнопок -->
<div id="button-container">
    <?php foreach ($casesData as $index => $case): ?>
        <button class="openPopup" data-popup="popup<?php echo $index + 1; ?>">Открыть попап <?php echo $index + 1; ?></button>
    <?php endforeach; ?>
</div>

<!-- Контейнер для попапов -->
<div id="popup-container">
    <?php foreach ($casesData as $index => $case): ?>
        <div class="popup" id="popup<?php echo $index + 1; ?>">
            <button class="close-popup" data-popup="popup<?php echo $index + 1; ?>">&times;</button>
            <h2><?php echo $case['title']; ?></h2>
            <p><?php echo $case['description']; ?></p>
            <div class="gallery">
                <?php foreach ($case['images'] as $image): ?>
                    <img src="<?php echo $image; ?>" alt="Картинка кейса">
                <?php endforeach; ?>
            </div>
            <p class="additional-text">Дополнительная информация по кейсу <?php echo $index + 1; ?>.</p>
        </div>
    <?php endforeach; ?>
</div>

<script src="script/popup.js"></script>
</body>
</html>