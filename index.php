<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">

    <title>HDBS - Tickets</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link rel="stylesheet" href="css/pricing.css">
    <!-- Validate Input -->
    <script src="js/val_tickets.js"></script>

  </head>

  <body>

    <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom box-shadow">
      <a href="http://www.durgabari.org" target="_blank"><img class="mr-3" width="50" height="48" src="img\logo.jpg"></a><h5 class="my-0 mr-md-auto font-weight-normal">Houston Durgabari Society<br /><small>13944 Schiller Road, Houston TX 77082</small></h5>
      <!--a class="btn btn-outline-primary" href="http://www.durgabari.org" target="_blank">HDBS Home</a-->
    </div>

    <div class="pricing-header mx-auto text-center">
      <h1 class="display-6">Annual Drama Festival, 2018</h1>
      <p class="lead">Select Ticket type & Quantity</p>
    </div>
    <div class="container">
      <!--form action="precharge.php" method="post" id="item-form"-->
      <form method="post" name="item-form" id="item-form" >

      <div class="card-deck text-center">
              <div class="card border-dark mb-3">
                <div class="card-header" style="background-color:#00cc00; color:#fff">
                  <h4 class="my-0 font-weight-normal">Saturday</br><small>May 26</small></h4>
                </div>
                <div class="card-body">
                  <h1 class="card-title pricing-card-title"><small><sup>$</sup></small>25<span style="font-size:small">/ person</span></h1>
                  <p class="card-text font-weight-bold">Select Quantity</p>
                      <input type="number" min="0" class="form-control" id="qty0" name="qty[0]" placeholder="0">
                      <input type="hidden" class="form-control" id="price0" name="price[0]" value="25">
                      <input type="hidden" class="form-control" id="desc0" name="desc[0]" value="Saturday - May 26">

                  <!--button type="button" class="btn btn-primary">Sign up for free</button-->
                  <!-- a href="#" class="btn btn-primary">Purchase</a -->
                </div>
              </div>
              <div class="card border-dark mb-3">
                <div class="card-header" style="background-color:#4d79ff; color:#fff">
                  <h4 class="my-0 font-weight-normal">Sunday</br><small>May 27</small></h4>
                </div>
                <div class="card-body">
                  <h1 class="card-title pricing-card-title"><small><sup>$</sup></small>20<span style="font-size:small">/ person</span></h1>
                  <p class="card-text font-weight-bold">Select Quantity</p>
                      <input type="number" min="0" class="form-control" id="qty1" name="qty[1]" placeholder="0">
                      <input type="hidden" class="form-control" id="price1" name="price[1]" value="20">
                      <input type="hidden" class="form-control" id="desc1" name="desc[1]" value="Sunday - May 27">

                  <!--button type="button" class="btn btn-primary">Sign up for free</button-->
                  <!-- a href="#" class="btn btn-primary">Purchase</a -->
                </div>
              </div>
              <div class="card border-dark mb-3">
                <div class="card-header" style="background-color:#ff6666; color:#fff">
                  <h4 class="my-0 font-weight-normal">Season</br><small>All Days</small></h4>
                </div>
                <div class="card-body">
                  <h1 class="card-title pricing-card-title"><small><sup>$</sup></small>30<span style="font-size:small">/ person</span></h1>
                  <p class="card-text font-weight-bold">Select Quantity</p>
                      <input type="number" min="0" class="form-control" id="qty2" name="qty[2]" placeholder="0">
                      <input type="hidden" class="form-control" id="price2" name="price[2]" value="30">
                      <input type="hidden" class="form-control" id="desc2" name="desc[2]" value="Season Pass">

                  <!--button type="button" class="btn btn-primary">Sign up for free</button-->
                  <!-- a href="#" class="btn btn-primary">Purchase</a -->
                </div>
              </div>
              <div class="card border-dark mb-3">
                <div class="card-header" style="background-color:#800000; color:#fff">
                  <h4 class="my-0 font-weight-normal">Sponsor</br></h4><small>2 season tickets; front-row seating; Saturday dinner for 2</small>
                </div>
                <div class="card-body">
                  <h1 class="card-title pricing-card-title"><small><sup>$</sup></small>150<span style="font-size:small">/ package</span></h1>
                  <p class="card-text font-weight-bold">Select Quantity</p>
                      <input type="number" min="0" class="form-control" id="qty3" name="qty[3]" placeholder="0">
                      <input type="hidden" class="form-control" id="price3" name="price[3]" value="150">
                      <input type="hidden" class="form-control" id="desc3" name="desc[3]" value="Sponsor">

                  <!--button type="button" class="btn btn-primary">Sign up for free</button-->
                  <!-- a href="#" class="btn btn-primary">Purchase</a -->
                </div>
              </div>
              <input type="hidden" class="form-control" id="maxitem" name="maxitem" value="4">
      </div>
      <button class="btn btn-lg btn-primary btn-block" type="submit" onclick="form_validate(this.form,'precharge.php')">Continue</button>
    </form>
    <footer class="pt-4 my-md-3 pt-md-5 ">
      <div class="pricing-header mx-auto text-center">
        <img class="mb-2 align-middle" src="favicon.ico">
        <small class="text-center text-muted">HDBS 2018-20</small>
      </div>
    </footer>

    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"><\/script>')</script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/holder/2.9.4/holder.min.js"></script>
    <script src="https://js.stripe.com/v3/"></script>
  </body>
</html>
