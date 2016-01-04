<html>
<head>
    <title> :: station :: </title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/station.css">
    </head>
<body>
  <div class="container-fluid">
      <div class="row">
        <div class="col-md-8 col-md-offset-2 col-xs-10 col-xs-offset-1">

        <div class="panel panel-default">
            <div class="panel-body">
              <p>
              <?php
              if($correctChoice==1) echo "ตอบคำถามถูกต้อง";
              else if($correctChoice==-1) echo "ตอบคำถามไม่ถูกต้อง";

              echo "<br> คะแนนรวม : ".$point;


               ?>
             </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
