/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
function startTesting()
{
	route('greetings',compileNameAndSex(),showTest,errorAlert);
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
                //$("#buttons_tr button").prop('disabled', true);
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
													click: function(){clickToAnswer(data.token, button.value);}
												}
											));
								$("#buttons_tr").append(buttonChoise);
							}
				)
		
		$("#tip").html(data.content.tip);
		
		var test =  $('<button/>', {
				text: data.content.startButtonText, 
				click: function () { startTest(data.token) }, 
				class: "button"});
		$("#start_button").html(test);
}

function clickToAnswer(key, value)
{
	route('tests', prepareAnswerData(key, value), showTest, errorAlert);
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

function prepareAnswerData(key, value)
{
	return function()
	{
		var data = {
			"code": key,
			"answer": value
			};
		return data;
	};
}

function startTest(key)
{
    route('tests',prepareTestData(key),showTest,errorAlert);
}