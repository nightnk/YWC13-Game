<html>
<head>
    <title> ::Station:: </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/fonts/quark.css">
    <link rel="stylesheet" href="/css/station.css">

    <script type="text/javascript" src="/js/jquery.min.js"></script>
    <script type="text/javascript" src="/js/bootstrap.min.js"></script>
</head>
<body>

      <div class="progress-bar">
        <div class="bar">
          <div class="peg">

          </div>
        </div>
      </div>

      <div id="cheating-modal" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">โกงป่ะ! #teamBee</h4>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-success" data-dismiss="modal" onclick="goHome();">ค่ะ !</button>
            </div>
          </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
      </div><!-- /.modal -->

      <div id="timeout-modal" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">หมดเวลาแล้ว...</h4>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-success" data-dismiss="modal" onclick="submitForm();">จ่ะ !</button>
            </div>
          </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
      </div><!-- /.modal -->

      <div class="container-fluid">
          <div class="row">
            <div class="col-md-12 text-center">
              <img class="logo" src="/img/logo.png" />
            </div>

            <div class="col-md-8 col-md-offset-2 col-xs-10 col-xs-offset-1">
              <div class="score-border">
                <form class="form-horizontal" id="questionForm" action="<?php echo App::make('url')->to('submitQ'); ?>" method="post">

                <div class="text-center question-text">
                  <h2><?php echo $question->text; ?></h2>
                </div>

                <!-- <div class="text-center question">
                  <img src="/img/line.png">
                </div> -->
                <?php
                foreach ($choices as $choice) {

                  echo "<div class=\"radio\">";
                  // echo "<label class=\"choice\">";
                  // echo "</label>";
                  // echo "<input type=\"radio\" name=\"inputChoice\" id=\"".$choice->choiceId."\"  value=\"".$choice->choiceId."\" >";
                  echo "<button name=\"inputChoice\" id=\"".$choice->choiceId."\"  value=\"".$choice->choiceId."\" class=\"btn btn-default btn-lg btn-block btn-answer\">";
                  echo  $choice->text;
                  echo "</button>";
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
    <script>

    <?php
      $length = 16;
      $randomString = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);
    ?>

    var token = '<?=$randomString?>';

    var isValid = true;

    console.log('token:', token);
    console.log('storageToken:', localStorage.getItem(token));

    if (!localStorage.getItem(token)) {
      localStorage.setItem(token, true);
    } else {
      // duplicate token
      showCheating();
      console.log('fuck you !');
      throw new Error('fuck youuuu');
    }

    $("[name='inputChoice']").click(function(){
      setTimeout(function() {
       $("#questionForm").submit();
        return true;
      }, 1000);
    });

    function submitForm() {
      console.log('submitting form');
      $("#questionForm").submit();
    }

    function showCheating() {
      isValid = false;
      $('#cheating-modal').modal();
    }

    function goHome() {
      console.log('closing...');
      window.location = '/';
    }

    $(document).ready(function(){

      var $progressbar = $('.progress-bar .bar');

      function set(progress) {
        $progressbar.width(progress * 100 + '%');
      }

      function showModal() {
        $('#timeout-modal').modal();
      }

      var total = 15000;
      var interval = 150;

      var left = total;
      set(1.0);
      var intervalId = setInterval(function () {
        left -= interval;
        set(left / total);

        if (left <= 5000) {
          $progressbar.addClass('red');
        }

        if (!isValid) {
          // จะไม่โชว์ ถ้าเค้าโกง
          clearInterval(intervalId);
        }

        if (left <= 0) {
          clearInterval(intervalId);

          console.log('timeout');
          showModal();
        }
      }, interval);

    });

    </script>
</body>
</html>
