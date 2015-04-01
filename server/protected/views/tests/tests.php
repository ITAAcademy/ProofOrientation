<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;

?>
<!--<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/style.css" type="text/css"/>-->
 <html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Сторінка завершення тестів</title>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/style2.css">
</head>
<body>
 	<div id="start_test">
		<div id="header">Тест завершено</div>
		<div id="content">
			<p>Тепер ви можете самостійно перевірити правильність ваших відповідей</p>
		</div>
		<div id="footer">
			<div class="inner">
				<button class="Button" onclick="show('block',this.id)">1</button>
			</div>
			<div class="inner">
				<button class="Button" onclick="show('block',this.id)">2</button>
			</div>
			<div class="inner">
				<button class="Button" onclick="show('block',this.id)">3</button>
			</div>
			<div class="inner">
				<button class="Button" onclick="show('block',this.id)">4</button>
			</div>
			<div class="inner">
				<button class="Button" onclick="show('block',this.id)">5</button>
			</div>
		</div> 
		<div class="block">
			<br /> <br /> <br /> <br /> <br />
    
	<button class="Button" style="width:200px;height:35px" onclick="route('tests','1')">Почати тест зараз</button>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/router.js"></script>
</div>	
		</div>  


</body>
</html>
