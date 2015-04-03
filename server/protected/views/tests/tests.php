<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;

?>
 <html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title></title>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/style.css">
</head>
<body>
 	<div id="start_test">
        <div id="logo"><a href="#">Career Oriented</a></div>
        <div id="main">
            <div id="header"></div>
            <p>Тут буде відображене запитання. Ви повинні обрати один з пяти варіантів Вашого ставлення: -2(зовсім не правильно), -1(не правильно), 0(важко відповісти), +1(правильно), +2(цілком правильно).</p>
            <div id="fieldset">
                <div id="text">
                    <div class="inner">
                        <button class="Button" onclick="show('block',this.id)">-2</button>
                    </div>
                    <div class="inner">
                        <button class="Button" onclick="show('block',this.id)">-1</button>
                    </div>
                    <div class="inner">
                        <button class="Button" onclick="show('block',this.id)">0</button>
                    </div>
                    <div class="inner">
                        <button class="Button" onclick="show('block',this.id)">+1</button>
                    </div>
                    <div class="inner">
                        <button class="Button" onclick="show('block',this.id)">+2</button>
                    </div>
                    <p>“Шлях в тисячу миль починається з першого кроку, і для того щоб усвідомити куди йти, потрібно мати певний план дій, що допоможе досягти результатів...“</p>
                </div>
                <div class="buttonLocation">
                    <button class="Button" style="width:200px;height:35px" onclick="route('tests','1', '#start_test')">Далі</button>
                </div>
            </div>
        </div>

        <div id="footer">
            <div id="menu_footer"></div>
            <div id="down_footer">&copy; Copyright 2015 <b>IT Academy</b></div>
        </div>
	</div>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/router.js"></script>
</div>

</body>
</html>
