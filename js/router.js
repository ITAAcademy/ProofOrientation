function route(path,data){
 switch (path){
  case 'greetings':
  {
   getData(
    function (data)
    {
     $("#results").html(data);
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
     $("#start_test").html(data);
    },
    {"data":data}

   );
  }
  break;
  /*
  case 'conclusion':
  {
   getData(
    function (html)
    {
     $("#results").html(html);
    },
    {"data":data},
    "http://localhost/prooforientation/web/index3.php"
   );
  }
  break;*/
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
	
   url = "http://po.itatests.com/index.php?r=tests/testsJSON";
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