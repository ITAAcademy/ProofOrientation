/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
function startTesting()
{
	$('#myform').validate({ 
        rules: {
            inputName: {
                required: true
            }, 
			one: {
			    required: true
			}
        },
		messages: {
		    inputName: {
		        required: 'Поле "ім\'я" обов\'язкове'
		    }, 
		    one: {
		        required: "Оберіть стать"
		    }
		},
        errorElement : 'div',
  		errorLabelContainer: '.errorTxt',
        submitHandler: function(form) {
            route('greetings',compileNameAndSex(),showTest,errorAlert);
            return false;
        },
	    invalidHandler: function(form) {
            $('#phName').addClass("errorField");
		    $('#sexFieldset').addClass("errorField");
            return false;
        }
    }); 

}

function changeContent(data)
{
	$("#content").html(data);
}

function compileNameAndSex()
{
	return function()
	{
		var data = {"name": $("#phName").val(),
					"sex" : $('input[name=one]:checked').val()
				};
		return data;
	};
}



function errorAlert(errorMessage)
{
	alert(errorMessage);
}

function showTest(data)
{
		$("#greeting").hide();
		$("#start_test").show();
		$("#header").html(data.content.chapter);
		$("#content_tests").html(data.content.description);
                $("#secretKey").html(data.token);
                $("#tests_title_tr").empty();
                $("#buttons_tr").empty();
        $.each(data.content.buttons, function(index, button)
							{
								var tdChoise =  $('<td/>', {
												text: this.title
												}
												);
								$("#tests_title_tr").append(tdChoise);
								var buttonChoise =  $('<td/>').append($('<button/>', {
													text: button.value, 
													title: button.tip,
													class:'buttonTest',
													click: function(){
														clickToAnswer(data.token, button.value, data.testid, false);
													}
												}
											));
								$("#buttons_tr").append(buttonChoise);
								if(data.availableToAnswer || data.rulesContent)
									$("#buttons_tr button").prop('disabled', true);
							}
				)
		
		$("#tip").html(data.content.tip);
		
		var test =  $('<button/>', {
				text: data.content.startButtonText, 
				click: function () { startTest(data.token) }, 
				class: "button"});
		$("#start_button").html(test);
}

function clickToAnswer(key, value, testid, availableToAnswer)
{
	route('tests', prepareAnswerData(key, value, testid, availableToAnswer), showTest, errorAlert);
	
}

function prepareTestData(key)
{
    return function()
	{
            var data = {
               "code": key
                };
            return data;
	};
}

function prepareAnswerData(key, value, testid, availableToAnswer)
{
	
	return function()
	{
		var data = {
			"code": key,
			"answer": value,
			"testid":testid,
			"availableToAnswer":availableToAnswer
			};
		return data;
	};
}

function startTest(key)
{
    route('tests',prepareTestData(key),showTest,errorAlert);
}