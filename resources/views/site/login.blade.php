<html>
    <head>
    <title> :: Login :: </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/fonts/quark.css">
    <link rel="stylesheet" href="/css/login.css">
    <link rel="stylesheet" type="text/css" href="/css/animate.css">
    </head>
    <body>

      <div class="container-fluid">
          <div class="row">
            <div class="col-md-12 text-center">
              <img class="logo" src="/img/logo.png" />
            </div>
            <div class="col-md-10 col-md-offset-2 col-xs-12 ">
              <div style="height: 2rem">

              </div>
              <form action="#" method="post" id="loginForm" name="loginForm" class="contentCenter" >


                 <h4 class="title text-center">กรุณากรอกรหัส</h4>
                 <div class="passcodes animated">
                  <div class="each"></div>
                  <div class="each"></div>
                  <div class="each"></div>
                  <div class="each"></div>
                 </div>

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
                <div class="row row-number" style="text-align: center;">
                  <!-- <button type="submit" class="btn btn-number" name="btnNumber">S</button> -->
                  <button type="button" class="btn btn-number" name="btnNumber" id="btn_0">0</button>
                  <!-- <button type="button" class="btn btn-number" name="btnNumber">-</button> -->
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

        var $bullets = $('.passcodes .each');
        console.log('bullets:', $bullets);
        $bullets.removeClass('filled');
        $bullets.each(
          function (i) {
            console.log('i:', i);
            if (i < dataPass.length) {
              $(this).addClass('filled');
            }
          });

			  console.log("inputKey : "+$('#inputKey').val() );
			  if(dataPass.length === 4) {
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
            console.log('response:', response);
					   console.log("login :"+response.login);
					   if(response.code === "1"){
                if (response.url !== '/') {
                  document.location.href = '/' + response.url;
                }
                else {
                  document.location.href = "/";
                }
					   }else {
              $('.passcodes')
               .addClass('shake')
               .delay(1000)
               .queue(function () {
                $(this).removeClass('shake');
                $('#inputKey').val('');
                var $bullets = $('.passcodes .each');
                $bullets.removeClass('filled');
                $(this).dequeue();
               });
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
