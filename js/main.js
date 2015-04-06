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
                    "sex" : $("#sex").val()
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
		
		for(var i=0; i < Object.keys(data.content.buttons).length; i++){
			
			var tdChoise =  $('<td/>', {
						text: data.content.buttons[i].title
						}
						);
			$("#tests_title_tr").append(tdChoise);
			var buttonChoise =  $('<td/>').append($('<button/>', {
						text: data.content.buttons[i].value, 
						click: function () { alert('hi');},
						class:'ButtonTest',
						title: data.content.buttons[i].tip
						}
						));
			$("#buttons_tr").append(buttonChoise);
		}
		
		$("#tip").html(data.content.tip);
		
		var test =  $('<button/>', {
				text: data.content.startButtonText, 
				click: function () { alert('hi'); }, 
				class: "button"});
		$("#start_button").append(test);
}

function clickToAnswer(value)
{
    alert(value);
}