<?php

class SiteController extends Controller
{
        public $jsonarray = array("response" => 0, 
							"errorDescription" => "", 
							"contentType" => "json",
                            "rulesContent" => true, 
							"content" => array(
										"chapter" => "Акцентуації",
										"step" => "1",
										"description" => "Тут буде відображене запитання. Ви повинні обрати один з п'яти варіантів Вашого ставлення: -2 (зовсім не правильно), -1 (не правильно), 0 (важко відповісти), +1 (правильно), +2 (цілком правильно).",
										"tip" => "Намагайтесь уникати відповіді \"0\"",
										"startButtonText" => "Почати тест зараз",
										"buttons" => array(
														array(	"tip" => "описание над кнопкой0",
																"title" => "Дуже не подобається",
																"value" => "-2"
														),
														array(	"tip" => "описание над кнопкой1",
																"title" => "Не подобається",
																"value" => "-1"
														),
														array(	"tip" => "описание над кнопкой2",
																"title" => "Нейтрально",
																"value" => "0"
														),
														array(	"tip" => "описание над кнопкой3",
																"title" => "Подобається",
																"value" => "+1"
														),
														array(	"tip" => "описание над кнопкой4",
																"title" => "Дуже подобається",
																"value" => "+2"
														)
													)
										)
							);
   
    public function actionIndex()
    {
        $code = Yii::app()->request->getParam('code');

        if($code == NULL || $code == '')
        {
            $name = Yii::app()->request->getParam('name');
            $sex  = Yii::app()->request->getParam('sex');
            $this->startTest($name, $sex);
        }
        else 
        {
            $userSession = UserSession::model()->findByAttributes(array('secretkey'=>$code));
            if(!$userSession)
            {
                throw new CHttpException(405,'Method Not Allowed');
            }
            else 
            {
                $answer = Yii::app()->request->getParam('answer');
                $testid = Yii::app()->request->getParam('testid');
                $availableToAnswer = Yii::app()->request->getParam('availableToAnswer');
                if($answer == NULL || $answer == ''){
                    $this->getNextTest($userSession);
                } else {
                    $answer1 = new Answers();
                    $answer1->testNumber = 1;
                    $answer1->answer = $testid;
                    $answer1->value = $answer;
                    $answer1->user_id = $userSession->id;
                    $this->saveAnswer($userSession, $answer1, $availableToAnswer);
                }

            }
        }

    }
    
    protected function startTest($name, $sex)
    {
            if($name == "")
            {
                throw new CHttpException(402,'Should be Authorized');  
            }

            if(!(($sex == 1)||($sex == 2)))
            {
                throw new CHttpException(403,'Should be Authorized');  
            }
            $userSession = new UserSession();
            $userSession->username = $name;
            $userSession->sex  = $sex;
            if(!$userSession->save())
            {
                var_dump($userSession);
            }
            else 
            { 
                $this->renderJSON($this->renderPartial('index', array('jsonArray' => $this->jsonarray, 'secretKey'=> $userSession->secretkey),true));                
            }
            
    }

    private function getNextTest(UserSession $userSession)
    {
        $lastAnswer = Answers::model()->findByAttributes(array('user_id'=>$userSession->id),array('order'=>'answer desc', 'limit'=>1));
        $nextID = 0;
        if(!$lastAnswer)
        {
            $nextID = 1;
        }
        else 
        {
            $nextID = $lastAnswer->answer + 1;
        }
        $test = Test1::model()->findByPk($nextID);
        $this->renderJSON($this->renderPartial('test1', array('test1' => $test, 'userSession'=> $userSession),true));
    }
            
    private function saveAnswer(UserSession $userSession, Answers $answer, $availableToAnswer)
    {
        $lastAnswer = Answers::model()->findByAttributes(array('user_id'=>$userSession->id),array('order'=>'answer desc', 'limit'=>1));
                
        $answer->save();

         $nextID = $lastAnswer->answer + 1;
       
         $test = Test1::model()->findByPk($nextID);
        $this->renderJSON($this->renderPartial('test1', array('test1' => $test, 'userSession'=> $userSession, 'availableToAnswer'=> $availableToAnswer),true));
    }
    protected function renderJSON($data)
    {
        header('Content-type: application/json');
        echo $data;
        Yii::app()->end();
    }
}