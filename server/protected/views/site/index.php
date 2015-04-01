<?php
/* @var $this SiteController */


?>
<!--<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/style.css" type="text/css"/>-->
 <html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Сторінка привітання</title>
	<!--<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/style.css">-->
</head>
<body>   
<div class="block" id="results">
     <p id="a">Ми пропонуємо Вам пройти шість тестів які можуть</p>
     <p>полегшити обрання професії</p>

	<div>
	   <label for="n">Ведіть ваше ім'я</label>
	   <input type="text" id="align" />
	 </div>
	 <br/>
	 <form>
		  <p id="x"><input type="radio" name="one" value="two" class="inner"><label>Xлопець</p>
		  <p id="xy"><input type="radio" name="one" value="three" class="inner"><label>Дівчина</p>
	 </form>
	<br/>
	<br/>
	<p><strong>Шлях в тисячу миль починається з першого кроку<span class="right">.</span><span class="right">.</span><strong></p> 
	<p<strong>З допомогою цих тестів-опитувальників Ви отримуєте можливість<strong><p>
	<p><strong>пізнати себе<span class="right">,</span> свої здібності<span class="right">,</span> нахили і напрямки в яких Ви можете<strong></p> 
	<p><strong>розвивати свою особистість та зорієнтуватись у виборі професій<span class="right">.</span> якими<strong></p> 
	<p><strong>Ви можете оволодіти щоб досягнути успіху<strong></p>

	<br/>
	<button class="Button" style="width:200px;height:35px" onclick="route('greetings','1')">Розпочати тестування</button>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/router.js"></script>
</div>

</body>
</html>
