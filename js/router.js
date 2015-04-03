function route(path,data,id){
 switch (path){
  case 'greetings':
  {
   getData(
    function (data)
    {
     $(id).html(data);
    },
    {"data":data}
   );
  }
  break;
  case 'tests':
  {
   getTests(
    function (data)
    {
		$("#content").hide();
		$("#header").html(data.content.chapter);
		$("#content_tests").html(data.content.description);
		
		for(var i=0; i<5; i++){
			//alert(data.content.buttons[i].title);
			var buttonChoise =  $('<button/>', {
						text: data.content.buttons[i].value, 
						click: function () { alert('hi');},
						}
						);
						$("#buttons").append(buttonChoise);
		}
		/*$.each(data.content.buttons, function() {
			$.each(this, function(k, v) {
				if(k == 'value'){
					var buttonChoise =  $('<button/>', {
						text: v, 
						click: function () { alert(data.content.buttons[0].tip); },
						}
						);
						$("#buttons").append(buttonChoise);
						console.log(data.content.buttons[i].title);
						i++;
				}
				
		    }
			
		
		)});*/
		$("#tip").html(data.content.tip);
		
		var test =  $('<button/>', {
				text: data.content.startButtonText, 
				click: function () { alert('hi'); }});
		$("#start_button").append(test);
		
    },
    {"data":data}
   );
  }
  break;
}
}

function getData(successFunction,request,errorFunction)
{
   url = "http://po.itatests.com/server/index.php?r=tests/testsJSON";
   $.ajax({
   url: url,
   cache: false,
   crossDomain: true,
   type: "POST",
   data:request,
   dataType: 'json',
   success: function(data){
    successFunction(data);
     },
   error: function (errormessage) {
               alert("Error");
               errorFunction(errorMessage);
               }
   });
}

function getTests(successFunction,request)
{
	
   url = "http://po.itatests.com/server/index.php?r=tests/testsJSON";
   $.ajax({
   url: url,
   cache: false,
   crossDomain: true,
   type: "POST",
   data:request,
   dataType: 'json',
   success: function(data){
	   console.log(data);
     successFunction(data);
     },
   error: function (errormessage) {
               alert("Error");
               }
   });
}

function route2(path,dataProviderFunction, successFunction, errorFunction)
{
  switch (path){
      case 'greetings':
      {
        getData(successFunction,dataProviderFunction(),errorFunction);
      }
      break;
      case 'tests':
      {
       getTests(
        function (data)
        {
                    $("#content").hide();
                    $("#header").html(data.content.chapter);
                    $("#content_tests").html(data.content.description);

                    for(var i=0; i<5; i++){
                            //alert(data.content.buttons[i].title);
                            var buttonChoise =  $('<button/>', {
                                                    text: data.content.buttons[i].value, 
                                                    click: function () { alert('hi');},
                                                    }
                                                    );
                                                    $("#buttons").append(buttonChoise);
                    }
                    /*$.each(data.content.buttons, function() {
                            $.each(this, function(k, v) {
                                    if(k == 'value'){
                                            var buttonChoise =  $('<button/>', {
                                                    text: v, 
                                                    click: function () { alert(data.content.buttons[0].tip); },
                                                    }
                                                    );
                                                    $("#buttons").append(buttonChoise);
                                                    console.log(data.content.buttons[i].title);
                                                    i++;
                                    }

                        }


                    )});*/
                    $("#tip").html(data.content.tip);

                    var test =  $('<button/>', {
                                    text: data.content.startButtonText, 
                                    click: function () { alert('hi'); }});
                    $("#start_button").append(test);

        },
        {"data":data}
       );
      }
  break;
}
}