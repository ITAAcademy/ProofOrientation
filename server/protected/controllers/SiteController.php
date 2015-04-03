<?php

class SiteController extends Controller
{

	public function actionIndex()
	{
            $jsonarray = array("response" => 0, 
							"errorDescription" => "", 
							"contentType" => "json", 
							"content" => array(
										"chapter" => "Акцентуації",
										"step" => "1",
										"description" => "Тут буде відображене запитання. Ви повинні обрати один з п'яти варіантів Вашого ставлення: -2 (зовсім не правильно), -1 (не правильно), 0 (важко відповісти), +1 (правильно), +2 (цілком правильно).",
										"tip" => "Намагайтесь уникати відповіді \"0\"",
										"startButtonText" => "Почати тест зараз",
										"buttons" => array(
														array(	"tip" => "описание над кнопкой0",
																"title" => "Дуже не подобається",
																"value" => -2
														),
														array(	"tip" => "описание над кнопкой1",
																"title" => "Не подобається",
																"value" => -1
														),
														array(	"tip" => "описание над кнопкой2",
																"title" => "Нейтрально",
																"value" => 0
														),
														array(	"tip" => "описание над кнопкой3",
																"title" => "Подобається",
																"value" => 1
														),
														array(	"tip" => "описание над кнопкой4",
																"title" => "Дуже подобається",
																"value" => 2
														)
													)
										)
							);
							
        	$this->renderJSON($this->renderPartial('index', array('jsonArray' => $jsonarray),true));
    }
    protected function renderJSON($data)
    {
        header('Content-type: application/json');
        echo $data;
        Yii::app()->end();
    }
}