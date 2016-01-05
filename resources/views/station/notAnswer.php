<html>
<head>
    <title> :: station :: </title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/fonts/quark.css">
    <link rel="stylesheet" href="/css/station.css">
    </head>
<body>

  <div class="container-fluid">
      <div class="row">
        <div class="col-md-8 col-md-offset-2 col-xs-10 col-xs-offset-1">
          
        <div class="col-md-12 text-center">
          <img style="width:50%;" src="/img/logo.png" />
        </div>

        <div class="col-md-8 col-md-offset-2 col-xs-10 col-xs-offset-1">
          <div class="score-border text-center">
              <p class="notice-font">
                <?php
                  if($status=="station") echo "สถานนี้มีคนเล่นอยู่";
                  else if($status=="submited") echo "เล่นฐานนี้ไปแล้ว";
                  else if($status=="time") echo "ต้องรอเวลา";
                 ?>
              </p>
           </div>
         </div>
       </div>
     </div>
   </div>
</body>
</html>
