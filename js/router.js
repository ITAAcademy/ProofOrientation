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
		$("#header").html(data.content.chapter);
		$("#header").append(data.content.description);
		$("#header").append(data.content.step);
		$("#header").append(data.content.tip);
		
    },
    {"data":data}
   );
  }
  break;
}
}

function getData(successFunction,request)
{
   url = "http://po.itatests.com/server/index.php?r=tests/tests";
   $.ajax({
   url: url,
   cache: false,
   crossDomain: true,
   type: "POST",
   data:request,
   success: function(data){
    successFunction(data);
     },
   error: function (errormessage) {
               alert("Error");
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