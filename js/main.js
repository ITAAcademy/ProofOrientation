/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
function startTesting()
{
    route2('greetings',compileNameAndSex(),changeContent,errorAlert);
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
                    "sex" : $("#one").val()
                    };
        return data;
    }
}

function errorAlert(errorMessage)
{
    alert(errorMessage);
}