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
          <img style="width:50%;" src="/img/logo.png" />
        </div>

        <div class="col-md-8 col-md-offset-2 col-xs-10 col-xs-offset-1">
          <div class="score-border">
            <p>
            <div class="text-center">
              <h1>กลุ่ม {{ $groupID }}</h1>
              <h3>ได้คะแนน</h3> <br/>
              <div class="score-circle tossing center-block">
                {{ $resultPoint->point }}
              </div>
            </div>
            </p>
          </div>
        </div>
      </div>
  </div>
</body>
</html>
