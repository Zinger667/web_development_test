<?php ?>

<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>World Bank Publications</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    
</head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<body class="container">

    <div class="wrap">

        <div class="content">

            <header>

                <div class="images">
                    <div class="logo"></div>
                    <div class="phones"></div>
                </div>

                <!-- Панель навигации -->
                <ul class="banner"> 
                    <li>
                        <a href="#">Кредитные карты</a>
                    </li>
                    <li>
                        <a href="#">Вклады</a>
                    </li>
                    <li>
                        <a href="#">Дебетовая карта</a>
                    </li>
                    <li>
                        <a href="#">Страхование</a>
                    </li>
                    <li>
                        <a href="#">Друзья</a>
                    </li>
                    <li>
                        <a href="#">Интернет-банк</a>
                    </li>
                </ul>



            </header>
            <!-- "Хлебные крошки" -->
            <div class="crumbs">
                <a href="#">Главная</a>
                -
                <a href="#">Вклады</a>
                -
                <a>Калькулятор</a>
            </div>
            <!-- Калькулятор -->
            <form class="calc" id="form">

                <div class="title">Калькулятор</div>

                <div class="items">

                    <div class="itemline">
                        <p>Дата оформления вклада</p>
                        <input type="text" class="values" name="dateOfContribution" id="date" autocomplete="off">
                    </div>

                    <div class="itemline">
                        <p>Сумма вклада</p>
                        <div class="slidertext">
                            <input name="sumOfContribution" type="number" class="values" name="sum1" min="1000" max="3000000" value="10000" id="sumOfContributionBox1" oninput="SetSliderValueFromNumBox1()" autocomplete="off">
                            <span class="leftborder">1 тыс. руб.</span>
                            <input class="slider" type="range" min="1000" max="3000000" value="10000" id="sumOfContributionSlider1" onmousemove="SetNumBoxValueFromSlider1()">
                            <span class="rightborder">3 000 000</span>
                        </div>

                    </div>

                    <div class="itemline">
                        <p>Срок вклада</p>
                        <select name="timeOfContribution" class="values" list="listyears" id="checkBox">
                            <option value="1">1 год</option>
                            <option value="2">2 года</option>
                            <option value="3">3 года</option>
                            <option value="4">4 года</option>
                            <option value="5">5 лет</option>
                        </select>
                    </div>

                    <div class="itemline">
                        <p>Пополнение вклада</p>
                        <input type="radio" class="radiobuttons" name="selectedOptionReplenishment" value="no" checked>
                        <div>Нет</div>
                        <input type="radio" class="radiobuttons" name="selectedOptionReplenishment" value="yes">
                        <div>Да</div>
                    </div>

                    <div class="itemline">
                        <p>Сумма пополнения вклада</p>
                        <div class="slidertext"> <!-- Ползунок -->
                            <input name="sumOfReplenishment" type="number" class="values" name="sum2" min="1000" max="3000000" value="10000" id="sumOfContributionBox2" oninput="SetSliderValueFromNumBox2()" autocomplete="off">
                            <span class="leftborder">1 тыс. руб.</span>

                            <input class="slider" type="range" min="1000" max="3000000"" id="sumOfContributionSlider2" value="10000" onmousemove="SetNumBoxValueFromSlider2()">
                            <span class="rightborder">3 000 000</span>
                        </div>
                    </div>

                </div>

                <div class="counting">
                    <input type="submit" value="Рассчитать">
                    <p>Результат:</p>
                    <div id="result" class="result"></div>
                </div>

            </form>

        </div>
        <!-- Футер -->
        <footer class="footer">
            <div class="links">
                <a href="#">Кредитные карты</a>
                <a href="#">Вклады</a>
                <a href="#">Дебетовая карта</a>
                <a href="#">Страхование</a>
                <a href="#">Друзья</a>
                <a href="#">Интернет-банк</a>
            </div>
        </footer>

    </div>

</body>
<script src="js/script.js"></script>
<script src="js/datepicker-ru.js"></script>
</html>