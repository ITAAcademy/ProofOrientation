<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;

?>
 <html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title></title>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/style2.css">
</head>
<body>
 	<div id="start_test">
		<div id="header"></div>
		<div id="content_tests">
			<p>Тут буде відображене запитання. Ви повинні обрати один з пяти варіантів Вашого ставлення: -2(зовсім не правильно), -1(не правильно), 0(важко відповісти), +1(правильно), +2(цілком правильно).</p>
		</div>
		<div id="footer">
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
			<div class="inner"><p class="small" >Дуже подобаэться<p>
				<button class="Button" onclick="show('block',this.id)">+2</button>
			</div>
		 
		<br /> <br /> <br /> <br /> <br />
		<div class="block">
		<button class="Button" style="width:200px;height:35px" onclick="route('tests','1', '#start_test')">Почати тест зараз</button>
		</div>
		<div id="myButton"></div>
	</div>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/router.js"></script>
</div>

</body>
</html>
