<?php
  if(!empty($_GET['tid'] && !empty($_GET['product']) && !empty($_GET['status']) && !empty($_GET['ts']) && !empty($_GET['name']))) {
    $GET = filter_var_array($_GET, FILTER_SANITIZE_STRING);

    $tid = $GET['tid'];
    $product = $GET['product'];
    $status = $GET['status'];
    $total = $GET['total']/100.0;
    $ts = $GET['ts'];
    $pay_date = date("Y-m-d H:i:s",$ts);
    $name = $GET['name'];
    $items = explode('.....',$product);
    $items[1] = str_replace( ";", '<br />', $items[1] );
  } else {
    header('Location: index.php');
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <title>HDBS - Thank You</title>
</head>
<body>
  <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom box-shadow">
      <a href="http://www.durgabari.org" target="_blank"><img class="mr-3" width="50" height="48" src="img\logo.jpg"></a><h5 class="my-0 mr-md-auto font-weight-normal">Houston Durgabari Society<br /><small>13944 Schiller Road, Houston TX 77082</small></h5>
  </div>
  <div class="pricing-header mx-auto text-center">
      <h4>Annual Drama Festival, 2018</h4>
      <p class="lead">Online Purchase Receipt</p>
  </div>

  <div class="container mt-4">
    <div class="row">
    <div class="col p-1 mb-0 bg-info text-white"><h6>Order Details :</h5></div>
    </div>
    <div class="row">
        <div class="col-sm-4"><span style="font-weight:bold"><?php echo rawurldecode($items[0]); ?></span></div>
        <div class="col-sm-4"><span style="font-weight:bold">Name : </span><?php echo rawurldecode($name); ?></div>
        <div class="col-sm-4"><span style="font-weight:bold">Items : </span><br /><?php echo rawurldecode($items[1]); ?></div>
    </div>
    <div class="row">
        <div class="col-sm-4"></div>
        <div class="col-sm-4 text-right"></div>
        <div class="col-sm-4"><span style="font-weight:bold">Total : $<?php echo $total; ?></div>
    </div>
    <div class="row">
    <div class="col p-1 mb-0 bg-info text-white"><h6>Transaction Details :</h5></div>
    </div>
    <div class="row">
        <div class="col-sm-4"><span style="font-weight:bold">ID : </span><?php echo $tid; ?></div>
        <div class="col-sm-4"><span style="font-weight:bold">Status : </span><?php echo $status; ?></div>
        <div class="col-sm-4"><span style="font-weight:bold">Purchased On : </span><?php echo $pay_date; ?></div>
    </div>
    <hr>
    <div class="row align-items-center">
        <div class="col-sm-6 text-center"><h4>Thank you! </h4></div>
        <div class="col-sm-4 text-right"><button class="btn btn-dark mt-2" onclick="window.print()">Print</button>
        <a href="index.php" class="btn btn-dark mt-2">Go Back</a></div>
    </div>

    <footer class="pt-2 my-md-3 pt-md-5 ">
      <div class="pricing-header mx-auto text-center">
        <p style="font-size:small; color:red">Check your email for more information. Please show the receipt at box office to pick up tickets.</p>
        <img class="mb-2 align-middle" src="favicon.ico">
        <small class="text-center text-muted">HDBS 2018-20</small>
      </div>
    </footer>


  </div>
  <script src="https://js.stripe.com/v3/"></script>

</body>
</html>
