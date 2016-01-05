<html>
<head>
    <title> ::Station:: </title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/fonts/quark.css">
    <link rel="stylesheet" href="/css/station.css">
</head>
<body>

      <div class="container-fluid">
          <div class="row">
            <div class="col-md-12 text-center">
              <img style="width:50%;" src="/img/logo.png" />
            </div>

            <div class="col-md-8 col-md-offset-2 col-xs-10 col-xs-offset-1">
              <div class="score-border">
                <form class="form-horizontal" id="questionForm" action="<?php echo App::make('url')->to('submitQ'); ?>" method="post">

                <div class="text-center question-text">
                  <h2><?php echo $question->text; ?></h2>
                </div>

                <div class="text-center question">
                  <img src="/img/line.png">
                </div>
                <?php
                foreach ($choices as $choice) {

                  echo "<div class=\"radio\">";
                  echo "<label class=\"choice\">";
                  echo "<input type=\"radio\" name=\"inputChoice\" id=\"".$choice->choiceId."\"  value=\"".$choice->choiceId."\" >";
                  echo "<div class=\"ans-text text-center\">";
                  echo  $choice->text;
                  echo "</div>";
                  echo "</label>";
                  echo "</div>";
                }
                  echo "<input type=\"hidden\" name=\"questionID\" value=\"".$question->id."\" >";
                  echo "<input type=\"hidden\" name=\"stationID\" value=\"".$question->stationId."\" >";
                 ?>
                </form>
              </div>
            </div>
           </div>
        </div>
    <script src="/js/jquery.min.js"></script>
    <script>

    $("[name='inputChoice']").click(function(){
      setTimeout(function() {
       $("#questionForm").submit();
        return true;
      }, 1000);
    });

    $(document).ready(function(){
       setTimeout(
        function()
        {
          alert("Time out!!!");
          $("#questionForm").submit();
        }, 15000);
    });

    </script>
</body>
</html>
