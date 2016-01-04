<html>
<head>
    <title> ::Station:: </title>
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
            <form class="form-horizontal" id="questionForm" action="<?php echo App::make('url')->to('submitQ'); ?>" method="post">
            <h2><?php echo $question->text; ?></h2>
            <?php
            foreach ($choices as $choice) {

              echo "<div class=\"radio\">";
              echo "<label>";
              echo "<input type=\"radio\" name=\"inputChoice\" id=\"".$choice->choiceId."\"  value=\"".$choice->choiceId."\" >";
              echo  $choice->text;
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
    </div>
    <script src="/js/jquery.min.js"></script>
    <script>


    function submitForm(){
      $("#questionForm").submit();
      $.ajax({
            url: "<?php echo App::make('url')->to('submitQ'); ?>",
            type: "post",
            data: dataForm ,
            success: function (response) {
               // you will get response from your php page (what you echo or print)
               console.log(response);
            },
            error: function(jqXHR, textStatus, errorThrown) {
               console.log(textStatus, errorThrown);
            }


        });
        return false;
    }
    $("[name='inputChoice']").click(function(){
       $("#questionForm").submit();
        return true;
    });
    $(document).ready(function(){
      /*
       setTimeout(
        function()
        {
          alert("Time out!!!");

        }, 5000);
      */
    });

    </script>
</body>
</html>
