<?php

class SiteController extends Controller
{

	public function actionIndex()
	{
            $jsonarray = ["response" => 0, 
							"errorDescription" => "", 
							"contentType" => "json", 
							"content" => array(
										"chapter" => "Акцентуації",
										"step" => "1",
										"description" => "Тут буде відображення запитання.",
										"tip" => "подсказка",
										"startButtonText" => "Почати тест зараз",
										"buttons" => array(
														array(	"tip" => "описание над кнопкой",
																"title" => "Дуже не подобається",
																"value" => -2
														),
														array(	"tip" => "описание над кнопкой",
																"title" => "Не подобається",
																"value" => -1
														),
														array(	"tip" => "описание над кнопкой",
																"title" => "Нейтрально",
																"value" => 0
														),
														array(	"tip" => "описание над кнопкой",
																"title" => "Подобається",
																"value" => 1
														),
														array(	"tip" => "описание над кнопкой",
																"title" => "Дуже подобається",
																"value" => 2
														)
													)
										)
                                                                                ];
							
        	$this->renderPartial('index', array('jsonArray' => $jsonarray));
                Yii::app()->end();
	}
}