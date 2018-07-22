<?php

 // Sanitize POST Array
 $POST = filter_var_array($_POST, FILTER_SANITIZE_STRING);

 $maxitemtyp = $POST['maxitem'];
 $qtya = array();
 $qtya = $POST['qty'];
 $itema = array();
 $itema = $POST['desc'];
 $pricea = array();
 $pricea = $POST['price'];
 $amount = 0.0;
 $desc = "";
 $itemlst = "";
 $itemqty = "";
 $itemamt = "";
 $numitem = 0;
 $tqtya = array();
 $titema = array();
 $tpricea = array();
 $cost = array();

 for ($x = 0; $x < $maxitemtyp; $x++)
 {
   $qtya[$x] = intval($qtya[$x]);
   $cost[$x] = 0.0;
   if($qtya[$x] > 0) {
     ++$numitem;
     $itemlst = $itemlst.$itema[$x].", ";
     $itemqty = $itemqty.$qtya[$x].", ";
     $cost[$x] = $qtya[$x]*$pricea[$x];
     $itemamt = $itemamt.$cost[$x].", ";
     $desc = $desc.$qtya[$x]." Ticket(s) for ".$itema[$x]." @ $".$pricea[$x].";";
     $amount += $cost[$x];
   }
 }
 $itemlst = rtrim(trim($itemlst), ",");
 $itemqty = rtrim(trim($itemqty), ",");
 $itemamt = rtrim(trim($itemamt), ",");


?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">

    <title>Checkout</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="css/form-validation.css" rel="stylesheet">
  </head>

  <body class="bg-light">
    <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom box-shadow">
        <a href="http://www.durgabari.org" target="_blank"><img class="mr-3" width="50" height="48" src="img\logo.jpg"></a><h5 class="my-0 mr-md-auto font-weight-normal">Houston Durgabari Society<br /><small>13944 Schiller Road, Houston TX 77082</small></h5>
    </div>
    <div class="pricing-header mx-auto text-center">
        <h4>Annual Drama Festival, 2018</h4>
        <p class="lead">Purchase Summary</p>
    </div>

    <div class="container">
      <div class="py-1 text-center">
        <p class="p-3 mb-2 bg-info text-white">Verify your purchases and fill in your contact information, before submitting your Credit Card details for payment.</p>
      </div>

      <div class="row">
        <div class="col-md-4 order-md-2 mb-4">
          <h5 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-muted">Items</span>
            <span class="badge badge-secondary badge-pill"><?php echo $numitem ?></span>
          </h5>
          <ul class="list-group mb-3">
            <li class="list-group-item d-flex justify-content-between lh-condensed">
              <div>
                <h6 class="my-0"><?php echo $itema[0] ?></h6>
                <small class="text-muted">Number of Tickets <?php echo $qtya[0] ?> </small>
              </div>
              <span class="text-muted">$<?php echo $cost[0] ?></span>
            </li>
            <li class="list-group-item d-flex justify-content-between lh-condensed">
              <div>
                <h6 class="my-0"><?php echo $itema[1] ?></h6>
                <small class="text-muted">Number of Tickets <?php echo $qtya[1] ?> </small>
              </div>
              <span class="text-muted">$<?php echo $cost[1] ?></span>
            </li>
            <li class="list-group-item d-flex justify-content-between lh-condensed">
              <div>
                <h6 class="my-0"><?php echo $itema[2] ?></h6>
                <small class="text-muted">Number of Tickets <?php echo $qtya[2] ?> </small>
              </div>
              <span class="text-muted">$<?php echo $cost[2] ?></span>
            </li>
            <li class="list-group-item d-flex justify-content-between lh-condensed">
              <div>
                <h6 class="my-0"><?php echo $itema[3] ?></h6>
                <small class="text-muted">Number of Tickets <?php echo $qtya[3] ?> </small>
              </div>
              <span class="text-muted">$<?php echo $cost[3] ?></span>
            </li>
            <li class="list-group-item d-flex justify-content-between">
              <span>Total (USD)</span>
              <strong>$<?php echo $amount ?></strong>
            </li>
          </ul>
          <form action="index.php">
          <div class="input-group">
              <input type="text" class="form-control" style="color:red" value="Change Tickets">
              <div class="input-group-append">
                <button type="submit" class="btn btn-warning">  Go Back  </button>
              </div>
            </div>
          </form>
        </div>
        <div class="col-md-8 order-md-1">
          <h5 class="mb-3">Contact Details</h5>
          <form class="needs-validation" novalidate action="charge.php" method="post" id="payment-form">
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="first_name">First name</label>
                <input type="text" class="form-control" id="first_name" name="first_name" placeholder="" value="" required>
                <div class="invalid-feedback">
                  Valid first name is required.
                </div>
              </div>
              <div class="col-md-6 mb-3">
                <label for="last_name">Last name</label>
                <input type="text" class="form-control" id="last_name" name="last_name" placeholder="" value="" required>
                <div class="invalid-feedback">
                  Valid last name is required.
                </div>
              </div>
            </div>

            <div class="mb-3">
              <label for="email">Email <span class="text-muted">(Mandatory - email receipts)</span></label>
              <input type="email" class="form-control" id="email" name="email" placeholder="you@example.com" value="" required>
              <div class="invalid-feedback">
                Please enter a valid email address for payment processing and purchase confirmation.
              </div>
            </div>

            <div class="row">
              <div class="col-md-5 mb-3">
                <label for="city">City</label>
                <input type="text" class="form-control" id="city" name="city" placeholder="" value="" required>
                <div class="invalid-feedback">
                  Please enter a City.
              </div>

              </div>
              <div class="col-md-4 mb-3">
                <label for="state">State</label>
                <select class="custom-select d-block w-100" id="state" name="state" >
                  <option value="">Select One</option>
                  <optgroup label="U.S. States/Territories">
                    <option value="AK">Alaska</option>
                    <option value="AL">Alabama</option>
                    <option value="AR">Arkansas</option>
                    <option value="AZ">Arizona</option>
                    <option value="CA">California</option>
                    <option value="CO">Colorado</option>
                    <option value="CT">Connecticut</option>
                    <option value="DC">District of Columbia</option>
                    <option value="DE">Delaware</option>
                    <option value="FL">Florida</option>
                    <option value="GA">Georgia</option>
                    <option value="HI">Hawaii</option>
                    <option value="IA">Iowa</option>
                    <option value="ID">Idaho</option>
                    <option value="IL">Illinois</option>
                    <option value="IN">Indiana</option>
                    <option value="KS">Kansas</option>
                    <option value="KY">Kentucky</option>
                    <option value="LA">Louisiana</option>
                    <option value="MA">Massachusetts</option>
                    <option value="MD">Maryland</option>
                    <option value="ME">Maine</option>
                    <option value="MI">Michigan</option>
                    <option value="MN">Minnesota</option>
                    <option value="MO">Missouri</option>
                    <option value="MS">Mississippi</option>
                    <option value="MT">Montana</option>
                    <option value="NC">North Carolina</option>
                    <option value="ND">North Dakota</option>
                    <option value="NE">Nebraska</option>
                    <option value="NH">New Hampshire</option>
                    <option value="NJ">New Jersey</option>
                    <option value="NM">New Mexico</option>
                    <option value="NV">Nevada</option>
                    <option value="NY">New York</option>
                    <option value="OH">Ohio</option>
                    <option value="OK">Oklahoma</option>
                    <option value="OR">Oregon</option>
                    <option value="PA">Pennsylvania</option>
                    <option value="PR">Puerto Rico</option>
                    <option value="RI">Rhode Island</option>
                    <option value="SC">South Carolina</option>
                    <option value="SD">South Dakota</option>
                    <option value="TN">Tennessee</option>
                    <option value="TX">Texas</option>
                    <option value="UT">Utah</option>
                    <option value="VA">Virginia</option>
                    <option value="VT">Vermont</option>
                    <option value="WA">Washington</option>
                    <option value="WI">Wisconsin</option>
                    <option value="WV">West Virginia</option>
                    <option value="WY">Wyoming</option>
                  </optgroup>
                  <optgroup label="Canadian Provinces">
                    <option value="AB">Alberta</option>
                    <option value="BC">British Columbia</option>
                    <option value="MB">Manitoba</option>
                    <option value="NB">New Brunswick</option>
                    <option value="NF">Newfoundland</option>
                    <option value="NT">Northwest Territories</option>
                    <option value="NS">Nova Scotia</option>
                    <option value="NU">Nunavut</option>
                    <option value="ON">Ontario</option>
                    <option value="PE">Prince Edward Island</option>
                    <option value="QC">Quebec</option>
                    <option value="SK">Saskatchewan</option>
                    <option value="YT">Yukon Territory</option>
                  </optgroup>
                </select>
                <div class="invalid-feedback">
                  Please provide a valid state.
                </div>
              </div>
              <div class="col-md-3 mb-3">
                <label for="zip">Zip</label>
                <input type="text" class="form-control" id="zip" name="zip" placeholder="" required>
                <div class="invalid-feedback">
                  Zip code required.
                </div>
              </div>
            </div>
            <input type="hidden" id="desc" name="desc" value="<?php echo $desc ?>">
            <input type="hidden" id="amount" name="amount" value="<?php echo $amount ?>">
            <input type="hidden" id="allitem" name="allitem" value="<?php echo $itemlst ?>">
            <input type="hidden" id="allqty" name="allqty" value="<?php echo $itemqty ?>">
            <input type="hidden" id="allamt" name="allamt" value="<?php echo $itemamt ?>">
            <div class="mb-3">
              <div id="card-element" class="form-control">
			          <!-- a Stripe Element will be inserted here. -->
			        </div>
                <!-- Used to display form errors -->
              <div id="card-errors" role="alert"></div>
            </div>
            <p class="text-danger text-center font-weight-bold" ><small>Once tickets are purchased, no refunds will be made.<br />Tickets will be distributed at the box-office on showing evidence of this purchase.</br> (Email receipts or Transaction ID).</small></p>
            <button class="btn btn-primary btn-lg btn-block" type="submit">Submit Payment</button>
          </form>
          <footer class="pt-2 my-md-3 pt-md-5 border-top">
            <div class="pricing-header mx-auto text-center">
              <img class="mb-2 align-middle" src="favicon.ico">
              <small class="text-center text-muted">HDBS 2018-20</small>
            </div>
          </footer>

        </div>
      </div>

    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"><\/script>')</script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/holder/2.9.4/holder.min.js"></script>
    <script>
      // Example starter JavaScript for disabling form submissions if there are invalid fields
      (function() {
        'use strict';

        window.addEventListener('load', function() {
          // Fetch all the forms we want to apply custom Bootstrap validation styles to
          var forms = document.getElementsByClassName('needs-validation');

          // Loop over them and prevent submission
          var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
              if (form.checkValidity() === false) {
                event.preventDefault();
                event.stopPropagation();
              }
              form.classList.add('was-validated');
            }, false);
          });
        }, false);
      })();
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://js.stripe.com/v3/"></script>
    <script src="./js/charge.js"></script>
  </body>
</html>
