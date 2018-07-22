<?php
##
##  *** Utility Functions
##
  // Query to get and update Order ID
  function getOID($conn,$incOID)
  {

      $r_oid = 0;
      $query = "LOCK TABLES idnumbers WRITE";
      if (!mysqli_query($conn, $query))
      {
      echo("Error description: " . mysqli_error($conn));
      }
      //
      $query = "SELECT * FROM idnumbers" ;
      if (!($result = mysqli_query($conn, $query)))
      {
        echo("Error description: " . mysqli_error($conn));
      } else {
        $row = mysqli_fetch_array($result);
        $r_oid=$row["oid"] + $incOID;
      }
      //
      $query = "UPDATE idnumbers SET oid = oid + 1";
      if (!($result = mysqli_query($conn, $query)))
      {
        echo("Error description: " . mysqli_error($conn));
      }  //
      $query = "UNLOCK TABLES";
      if (!mysqli_query($conn, $query))
      {
        echo("Error description: " . mysqli_error($conn));
      }
      return($r_oid);
  }

  // Query to Insert in tickets table all items
  function insertItems($conn,$oid,$customer,$items,$amount,$txn_id,$trn_dt,$status)
  {

     $name = $customer["name"];
     $email = $customer["email"];
     $city = $customer["city"];
     $state = $customer["state"];
     $zip = $customer["zip"];
     $pay_date = date("Y-m-d",$trn_dt);
     $txn_date = date("Y-m-d H:i:s",$trn_dt);
     $numitems = count($items);

     $rcode = array_fill(0, 2, 0);

     //insert tansaction data into the database
      $sqlQuery = "INSERT INTO tickets(oid,name,email,city,state,zip,amount,pay_date,txn_id,status,created_on,item_name,item_number,item_cost) VALUES ";
      if (isset($items[0])){    //at least one item

        for($i=0; $i<$numitems; $i++) {

                if ($i == $numitems-1){
                    $sqlQuery = $sqlQuery."('{$oid}','{$name}','{$email}','{$city}','{$state}','{$zip}','{$amount}','{$pay_date}','{$txn_id}','{$status}','{$txn_date}','{$items[$i][0]}', '{$items[$i][1]}', '{$items[$i][2]}');";
                }else{
                    $sqlQuery = $sqlQuery."('{$oid}','{$name}','{$email}','{$city}','{$state}','{$zip}','{$amount}','{$pay_date}','{$txn_id}','{$status}','{$txn_date}','{$items[$i][0]}', '{$items[$i][1]}', '{$items[$i][2]}'),";
                }

        }
        //
        // Run the query on the server
        if (!mysqli_query($conn, $sqlQuery)) {
            echo("Error description: " . mysqli_error($conn));
        } else {
          $rcode[0] = 1;
        }
        
	      
      }
      // insert into payment details table
      $query = "INSERT INTO puja_payment_detail (reg_uid, oid, pay_mode, pay_type, pay_for, pay_date, cc_name, amount, status, cc_ref_no, created_on) VALUES (99999, '{$oid}', 'CC', 'OTHER', 'TICKET / Drama', '{$pay_date}', '{$name}', '{$amount}', '{$status}', '{$txn_id}', '{$txn_date}')" ;
      // Run the query on the server
      if (!mysqli_query($conn, $query)) {
        echo("Error description: " . mysqli_error($conn));
      } else {
        $rcode[1] = 1;
      }
      
      return ($rcode);
  }

?>