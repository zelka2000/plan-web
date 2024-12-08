<?php
require_once 'db.php';
$db = new Database();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap"
          rel="stylesheet">
    <link rel="stylesheet" href="css/popup.css">
</head>
<body>
<?php include "components/header.php" ?>

<div class="text-content parallax-container">
    <h3 class="text-content1 parallax-element">Сайты, брендинг, продижение</h3>
    <h2 class="text-content2 parallax-element">Комплексное решение ваших задач</h2>
    <h3 class="text-content3 parallax-element">Мы создаем сайты, которые помогают вашему бизнесу масштабироваться и
        увеличивать прибыль, превращая идеи в результативные решения.</h3>
    <button class="form parallax-element">Обсудить проект</button>
</div>
<div class="case">
    <div class="case-colum">
        <h2 class="case-text">Работы</h2>
        <div class="case-content1">
            <img class="case-img1" src="
                <?php
                    $sql = "SELECT * FROM `post` WHERE `id` = 1";
                    $result = $db->query($sql);
                    $text = $result->fetch_assoc();
                    echo $text['img1'];
                ?>
            "
                 alt="Кейс план веб <?php echo $text['title']; ?>">
            <div class="case-text1">
                <h3 class="case-h3">
                    <?php
                    echo $text['title'];
                    ?>
                </h3>
                <p class="case-p1">
                    <?php
                    echo $text['description'];
                    ?>
                </p>
                <div class="case-button1">
                    <a class="case-button11 openPopup btn-hover" data-popup="popup1">
                        Подробнее
                    </a>
                    <a href="<?php echo $text['site']; ?>" target="_blank" class="case-button12 btn-hover">
                        Сайт
                    </a>
                </div>
            </div>
        </div>
        <div class="case-site">

            <?php
                // Выполняем запрос
                $sql = "SELECT * FROM `post`";
                $result = $db->query($sql);

                // Получаем все строки результата в массив
                $texts = $result->fetch_all(MYSQLI_ASSOC);
                $texts_index = array_slice($texts, 1);

                // Перебираем каждую строку
                foreach ($texts_index as $row):
            ?>

                <div class="card">
                    <img src="<?php echo $row['img1']; ?>" class="card-img" alt="Кейс план веб <?php echo $row['title']; ?>">
                    <h3 class="card-title"><?php echo $row['title']; ?></h3>
                    <p class="card-text">
                        <?php echo $row['description']; ?>
                    </p>
                    <div class="card-button">

                        <?php
                            if (empty($row['site'])) {
                                echo '<a class="card-button1 openPopup btn-hover" style="width: 100%" data-popup="popup' . $row['id'] . '">Подробнее</a>';
                                echo '<a href="' . $row['site'] . '" target="_blank" class="card-button2 no-site btn-hover">Сайт</a>';
                            } else {
                                echo '<a class="card-button1 openPopup btn-hover" data-popup="popup' . $row['id'] . '">Подробнее</a>';
                                echo '<a href="' . $row['site'] . '" target="_blank" class="card-button2 btn-hover">Сайт</a>';
                            }
                        ?>
                    </div>
                </div>

            <?php endforeach; ?>

            <div class="card" style="justify-content: center; background-color: #FE4A49">
                <p class="card-pro">Место для вашего проекта</p>
                <p class="card-pro1">Обсудить проект</p>
            </div>
        </div>
    </div>
</div>
<div class="plan-web">
    <div class="plan-colum">
        <h2 class="plan-about">
            Прозрачное ценообразование и эффективное взаимодействие. Предлагаем полный цикл работ "под ключ" или выполнение отдельных этапов
        </h2>

    </div>
</div>


<!-- Контейнер для попапов -->
<div id="popup-container">
    <?php
    // Выполняем запрос
    $sql = "SELECT * FROM `post`";
    $result = $db->query($sql);

    // Получаем все строки результата в массив
    $texts = $result->fetch_all(MYSQLI_ASSOC);

    // Перебираем каждую строку
    foreach ($texts as $row):
        ?>

        <div class="popup" id="popup<?php echo $row['id']; ?>">
            <button class="close-popup" data-popup="popup<?php echo $row['id']; ?>">&times;</button>
            <h2 class="popup-title"><?php echo $row['title']; ?></h2>
            <p class="popup-description"><?php echo $row['description']; ?></p>
            <div class="popup-content">
                <div class="img-button">
                    <img class="popup-img" src="<?php echo $row['img1']; ?>" alt="Кейс план веб <?php echo $row['title']; ?>">
                    <?php
                    if (empty($row['site'])) {
                        echo '<a href="' . $row['site'] . '" target="_blank" class="popup-button" style="display: none;">Сайт</a>';
                    } else {
                        echo '<a href="' . $row['site'] . '" target="_blank" class="popup-button">Сайт</a>';
                    }
                    ?>
                </div>
                <p class="popup-text1">
                    <?php echo $row['text']; ?>
                </p>
            </div>
            <div class="img-text">
                <img class="img-content" src="<?php echo $row['img2']; ?>" alt="Кейс план веб <?php echo $row['title']; ?>">
                <img class="img-content" src="<?php echo $row['img3']; ?>" alt="Кейс план веб <?php echo $row['title']; ?>">
                <img class="img-content" style="margin-top: 39px;" src="<?php echo $row['img4']; ?>" alt="Кейс план веб <?php echo $row['title']; ?>">
                <div class="content4" style="margin-top: 39px;">
                    <p class="text-content4"><?php echo $row['text2']; ?></p>
                </div>
            </div>
        </div>

    <?php endforeach; ?>
</div>



<!-- Подключаем GSAP и ScrollTrigger через CDN -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.2/gsap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.2/ScrollTrigger.min.js"></script>
<script src="script/paralax.js"></script>
<script src="script/menu_fixed.js"></script>
<script src="script/popup.js"></script>
</body>
</html>
