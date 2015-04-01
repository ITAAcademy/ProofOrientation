<?php
/* @var $this SiteController */


?>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>ProfOrientation</title>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/style.css">
</head>
<body>   
<div id="results">
<div id="content">
    <p ><strong>Ми пропонуємо Вам пройти шість тестів, які можуть
	полегшити обрання професії.</strong></p>
	<div id="fieldset">
	<div class="textalign row3" >
            <input type="text"placeholder="Введіть ваше ім'я"  id="align" />
        </div >
		
        <form >
        <fieldset ><legend>Оберіть стать</legend>
		<div class="textalign">
           <p class="font"><input type="radio" name="one" value="two"><label>Xлопець</p>
	   <p class="font"><input type="radio" name="one" value="three"><label>Дівчина</p>
	   </div>
	   </fieldset>
	</form>
	</div>
	     <p id="maiores" class="font">Шлях в тисячу миль починається з першого кроку<span class="right">..</span>
        З допомогою цих тестів-опитувальників Ви отримуєте можливість
        пізнати себе<span class="right">,</span> свої здібності<span class="right">,</span> нахили і напрямки в яких Ви можете
        розвивати свою особистість та зорієнтуватись у виборі професій<span class="right">,</span> якими
        Ви можете оволодіти щоб досягнути успіху</p>
                    <br>
       <div class="centr row3 arrow_box"> 
	<button class="Button" style="width:200px;height:35px" onclick="route('greetings','1')">Розпочати тестування</button>
	</div>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/router.js"></script>
</div>
</div>
</body>
</html>
