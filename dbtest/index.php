<!DOCTYPE html>
<html style="background-color: #f9f3db;">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Expirely (PHP)</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/Create-Form.css">
    <link rel="stylesheet" href="assets/css/Dynamic-Table.css">
    <link rel="stylesheet" href="assets/css/MUSA_no-more-tables.css">
    <link rel="stylesheet" href="assets/css/MUSA_panel-table.css">
</head>

<body>
    <div style="background-color: #f9f3db;">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h1>Expire.ly</h1>
                </div>
                <div class="col-md-4">
                    <ol class="breadcrumb" style="background-color: #f9f3db;">
                        <li class="breadcrumb-item"><a href="#"><span>Home</span></a></li>
                        <li class="breadcrumb-item"><a href="#"><span>Pantry</span></a></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div style="background-color: #f9f3db;">
        <div class="container"><link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>

<div class="container" style="background-color:White;">
    <div class="row">
    
        <div class="col-md-10 col-md-offset-1">

            <div class="panel panel-default panel-table">
              <div class="panel-heading">
                <div class="row">
                  <div class="col col-xs-6">
                    <h3 class="panel-title">Pantry</h3>
                  </div>
                  <div class="col col-xs-6 text-right">
                    <button type="button" class="btn btn-sm btn-primary btn-create" onclick="openForm()">Create New</button>
                  </div>
                </div>
              </div>
              <div class="panel-body">
                <table class="table table-striped table-bordered table-list" id="myTable">
                  <thead>
                    <tr>
                        <th><a class="btn btn-success"><em class="fa fa-filter"></em></a></th>
                        <th>Name</th>
                        <th>Amount</th>
                        <th>Expiration</th>
                        <th>Description</th>
                        <th>Image</th>
                    </tr> 
                  </thead>
                  <tbody>

                <?php

                    //Change the password to match your configuration
                    $link = mysqli_connect("localhost", "xpuser", "zz8Z1lc0CkYP#s39", "expirely");

                    // Check connection
                    if($link === false){
                        die("ERROR: Could not connect. " . mysqli_connect_error());
                    }
                    echo "<br>";
                    
                    $sql = "SELECT * FROM test";
                    $result = $link->query($sql);


                    
				    if ($result->num_rows > 0) {
	                    // output data of each row
                        while($row = $result->fetch_assoc()) {                        
                            echo "<tr>";
                                echo "<td align='center'>";
                                    echo "<a class='btn btn-danger' onclick='deleteRow()'><em class='fa fa-trash' id='trash'></em></a>";
                                echo "</td>";
                                echo "<td>" . $row["name"] . "</td>";
                                echo "<td>" . $row["amount"] . "</td>";
                                echo "<td>" . $row["expiration"] . "</td>";
                                echo "<td>" . $row["description"] . "</td>";
                                echo "<td align='center'><img src='" . $row["image"] . "' height='70' width='70'></td>";
                            echo "</tr>";
                        }
                    }
                    else {
                        echo "Sorry, nothing in your pantry! (0 results)";
                    }

                ?>
                        </tbody>
                </table>
            
              </div>
              <div class="panel-footer">
                <div class="row">
                  <div class="col col-xs-4">Page 1 of 5
                  </div>
                  <div class="col col-xs-8">
                    <ul class="pagination hidden-xs pull-right">
                      <li><a href="#">1</a></li>
                      <li><a href="#">2</a></li>
                      <li><a href="#">3</a></li>
                      <li><a href="#">4</a></li>
                      <li><a href="#">5</a></li>
                    </ul>
                    <ul class="pagination visible-xs pull-right">
                        <li><a href="#">«</a></li>
                        <li><a href="#">»</a></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
<script async src="https://cse.google.com/cse.js?cx=0000096038462138319625:3fpaisqpfsk"></script>
<div class="gcse-search"></div>
</div></div></div><div class="form-popup" id="myForm">
  <form class="form-container">
    <h1>Add Food Item</h1>

    <label for="name"><b>Name</b></label>
    <input id="foodName"  type="text" placeholder="Enter Name" name="name" required>

    <label for="amount"><b>Amount</b></label>
    <input id="foodAmount" type="text" placeholder="Enter Amount" name="amount" required>
      
     <label for="expiration"><b>Expiration</b></label>
    <input id="foodExpiration" type="text" placeholder="Todays date plus 3 days if Left over food" name="expiration" required>
      
     <label for="description"><b>Description</b></label>
    <input id="foodDescription" type="text" placeholder="Enter Description" name="description" required>
      
      <label for="image"><b>Image</b></label>
     <input type="file" id="foodImage" accept="image/*"  onchange="readURL(this)" name="image">
       <img id="blah" src="#" alt="your image" />
      <br><br>

      <input type="button" class="btn" onclick="addValues()" value="Add Item">
      <input type="button" class="btn" onclick="addValues()" value="Add Left overs">
    <input type="button" class="btn cancel" onclick="closeForm()" value="Close">
  </form>
</div><div>
    <script async src="https://cse.google.com/cse.js?cx=000096038462138319625:3fpaisqpfsk"></script>
</div></div>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/Create-Form.js"></script>
</body>

</html>