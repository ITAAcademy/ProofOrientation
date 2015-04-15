<?php 

$jsonArray = array("response" => 0, 
                    "errorDescription" => "", 
                    "contentType" => "json", 
                    "content" => array(
                        "chapter" => "Акцентуації",
                        "step" => "1",
                        "description" => $test1->text,
                        "startButtonText" => "Наступне запитання",
                        "tip" => "Намагайтесь уникати відповіді \"0\"",
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
                                            "value" => "+1"
                            ),
                            array(	"tip" => "описание над кнопкой4",
                                            "title" => "Дуже подобається",
                                            "value" => "+2"
                            )
                    )
                        )
                    );
      $jsonArray['token'] = $userSession->secretkey;
      echo CJSON::encode($jsonArray);
?>