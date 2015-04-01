<?php

class TestsController extends Controller
{
	public $jsonarray;
	
	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	//  public function init()
   // {
    //    $this->layout = false;
    //}
	
	public function actionTestsJSON()
	{ 
	$this->jsonarray = array("response" => 0, 
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
							);
							
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		$this->renderJSON($this->jsonarray);
	}
	public function actionTests()
	{ 
	
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		$this->renderPartial('tests');
	}
	
	protected function renderJSON($data)
{
    header('Content-type: application/json');
    echo CJSON::encode($data);

    foreach (Yii::app()->log->routes as $route) {
        if($route instanceof CWebLogRoute) {
            $route->enabled = false; // disable any weblogroutes
        }
    }
    Yii::app()->end();
}
	
}