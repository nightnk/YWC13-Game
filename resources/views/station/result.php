<html>
<head>
    <title> :: station :: </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/fonts/quark.css">
    <link rel="stylesheet" href="/css/station.css">
    </head>
<body>
  <div class="container-fluid">
      <div class="row">
        <div class="col-md-12 text-center">
          <img class="logo" src="/img/logo.png" />
        </div>

        <div class="col-md-12">
          <div class="score-border">
              <p class="notice-font border ">
              <?php
              $tmpStation=array(9,6,10,14,19);
              if(in_array($stationID,$tmpStation)){
                echo "ฐานนี้ไม่มีคะแนนให้ นะครับ ^-^";
              }
              else {
                if($correctChoice ==0) echo "ตอบไม่ทันเวลา";
                else if($correctChoice==1) echo "ตอบคำถามถูกต้อง";
                else if($correctChoice==-1) echo "ตอบคำถามไม่ถูกต้อง";
              }


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
