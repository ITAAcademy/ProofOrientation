<?php

class TestsController extends Controller
{
	public $something;
	
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
	$this->something = $this->renderJSON('{"response":0, 
							"errorDescription":"", 
							"contentType": "json", 
							"content":
								{
								"chapter":"Акцентуації",
								"step":"1",
								"description": "Тут буде відображення запитанняю бла-бла-бла. 
												Тут буде відображення запитанняю бла-бла-бла. 
												Тут буде відображення запитанняю бла-бла-бла. ",
								"tip": "подсказка",
								"startButtonText": "Почати тест зараз",
								"buttons":[{"tip":"описание над кнопкой",
											"title":"Дуже не подобається",
											"value": -2
											},
											{"tip":"описание над кнопкой",
											"title":"Не подобається",
											"value": -1
											},
											{"tip":"описание над кнопкой",
											"title":"Нейтрально",
											"value": 0
											},
											{"tip":"описание над кнопкой",
											"title":"Подобається",
											"value": 1
											},
											{"tip":"описание над кнопкой",
											"title":"Дуже подобається",
											"value": 2
											}]
								}
							}');
							
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		$this->render('testsJSON', array('something' => $something));
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