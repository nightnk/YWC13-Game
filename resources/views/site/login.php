<html>
    <head>
    <title> :: Login :: </title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/login.css">
    </head>
    <body>

      <div class="container-fluid">
          <div class="row">
            <div class="col-md-8 col-md-offset-2 col-xs-10 col-xs-offset-1">

              <form action="#" method="post" id="loginForm" name="loginForm" class="contentCenter" >
                 <h3 class="text-center">Enter Password</h3>
                <div class="row row-number">
                  <button type="button" class="btn btn-number" name="btnNumber" id="btn_1">1</button>
                  <button type="button" class="btn btn-number" name="btnNumber"  id="btn_2">2</button>
                  <button type="button" class="btn btn-number" name="btnNumber"  id="btn_3">3</button>
                </div>
                <div class="row row-number">
                  <button type="button" class="btn btn-number" name="btnNumber"  id="btn_4">4</button>
                  <button type="button" class="btn btn-number" name="btnNumber"  id="btn_5">5</button>
                  <button type="button" class="btn btn-number" name="btnNumber"  id="btn_6">6</button>
                </div>
                <div class="row row-number">
                  <button type="button" class="btn btn-number" name="btnNumber" id="btn_7">7</button>
                  <button type="button" class="btn btn-number" name="btnNumber" id="btn_8">8</button>
                  <button type="button" class="btn btn-number" name="btnNumber" id="btn_9">9</button>
                </div>
                <div class="row row-number">
                  <button type="submit" class="btn btn-number" name="btnNumber">S</button>
                  <button type="button" class="btn btn-number" name="btnNumber id="btn_0"">0</button>
                  <button type="button" class="btn btn-number" name="btnNumber">-</button>
                </div>
				<input type="hidden" class="form-control" id="inputKey" placeholder="Password" name="key" value="">
              </form>

            </div>
          </div>
          </div>
          <script src="js/jquery.min.js"></script>
          <script>
		  $("[name='btnNumber']").click(function(){
			  var numberAdd=$(this).html();
			  console.log("numberAdd : "+numberAdd)
			  $("#inputKey").val($('#inputKey').val() + numberAdd);
			  var dataPass=$('#inputKey').val();
			  console.log("inputKey : "+$('#inputKey').val() );
			  if(dataPass.length==4) {
				  console.log("submit Form" );
				  submitForm();

			  }

		  });

          function submitForm(){
			  var dataForm=$("#loginForm").serialize();
			  $.ajax({
					url: "checklogin",
					type: "post",
					data: dataForm ,
					success: function (response) {
					   // you will get response from your php page (what you echo or print)
					   console.log("login :"+response.login)
					   if(response.code=="1"){
						   document.location.href="/";
					   }else {

					   }

					},
					error: function(jqXHR, textStatus, errorThrown) {
					   console.log(textStatus, errorThrown);
					}


				});

          }

          </script>
    </body>
</html>
