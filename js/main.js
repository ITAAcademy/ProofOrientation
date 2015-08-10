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
<<<<<<< HEAD
=======
		highlight: function(element) {
            $(element).addClass('errorField');
            if(element.name === "one")
            	$('#sexFieldset').addClass("errorField");
        }, 
        unhighlight: function(element) {
            $(element).removeClass('errorField');
            if(element.name === "one")
            	$('#sexFieldset').removeClass("errorField");
        },
>>>>>>> parent of 52f2745... validation, adaptability, hidden button, the table is replaced by virgins, etc.
        errorElement : 'div',
  		errorLabelContainer: '.errorTxt',
        submitHandler: function(form) {
            route('greetings',compileNameAndSex(),showTest,errorAlert);
            return false;
        },
	    invalidHandler: function(form) {
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
<<<<<<< HEAD
								var tdChoise =  $('<div/>',{
												text: this.title,
												class:'tit_b'
								});
								var buttonChoise =  $('<div/>').append($('<button/>', {
=======
								var tdChoise =  $('<td/>', {
												text: this.title
												}
												);
								$("#tests_title_tr").append(tdChoise);
								var buttonChoise =  $('<td/>').append($('<button/>', {
>>>>>>> parent of 52f2745... validation, adaptability, hidden button, the table is replaced by virgins, etc.
													text: button.value, 
													title: button.tip,
													class:'buttonTest',
													click: function(){
														clickToAnswer(data.token, button.value, data.testid, true);
													}
												}
											));
								$("#buttons_tr").append(buttonChoise);
								if(data.rulesContent)
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

$(document).ready(function(){
	$("#male").click(function(){
		if($("#sex1").attr("checked") != "checked"){
	 		$("#sex1").attr("checked","checked");
	 		$("#male").addClass("border");
	 		$("#sex2").attr("checked", false);
	 		$("#female").removeClass("border");
		}
	});

	$("#female").click(function(){
		if($("#sex2").attr("checked") != "checked"){
	 		$("#sex2").attr("checked","checked");
	 		$("#female").addClass("border");
	 		$("#sex1").attr("checked", false);
	 		$("#male").removeClass("border");
		}
	});
});

