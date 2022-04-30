<?php

$con = mysqli_connect('localhost:3307', 'root', '', 'coffeeshop');

$que="SELECT * FROM `payments`";
$result = mysqli_query($con, $que);

if (isset($_POST['confirm_payment'])) {
  $order_no = $_POST['order_no'];
  $queo="UPDATE `orders` SET `status`='confirmed' WHERE `order_no`='$order_no'";
  $quep="UPDATE `payments` SET `payment_status`='confirmed' WHERE `order_no`='$order_no'";
  mysqli_query($con, $queo);
  mysqli_query($con, $quep);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Baristas Page
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
  <!-- CSS Files -->
  <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="../assets/css/paper-dashboard.css?v=2.0.1" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="../assets/demo/demo.css" rel="stylesheet" />
</head>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="white" data-active-color="danger">
      <div class="logo">
        <a href="https://www.creative-tim.com" class="simple-text logo-mini">
          <div class="logo-image-small">
            <img src="../assets/img/logo-small.png">
          </div>
        </a>
        <a href="https://www.creative-tim.com" class="simple-text logo-normal">
          Baristas Page
        </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li>
            <a href="./orderTable.php">
              <i class="nc-icon nc-diamond"></i>
              <p>Orders</p>
            </a>
          </li>
          <li>
            <a href="./tableArrangement.php">
              <i class="nc-icon nc-diamond"></i>
              <p>Table Status</p>
            </a>
          </li>
          <li class="active">
            <a href="./paymentTable.php">
              <i class="nc-icon nc-diamond"></i>
              <p>Payments</p>
            </a>
          </li>
        </ul>
      </div>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-toggle">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            <a class="navbar-brand" href="javascript:;">Customers Orders</a>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      <div class="content">
        
      <?php
        while($rows = mysqli_fetch_assoc($result))
        {
      ?>
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-body">
                <div class="places-buttons">
                    <table>
                      <tr>
                        <div class="row">
                          <div class="col-lg-11 ml-auto mr-auto">
                            <div class="row">
                              <div class="col-md-12">
                                <th><h4 class="btn btn-primary">Payment Number</h4></th>
                                <th><h4 class="btn btn-primary">Order Number</h4></th>
                                <th><h4 class="btn btn-primary">Mode</h4></th>
                                <th><h4 class="btn btn-primary">Amount</h4></th>
                                <th><h4 class="btn btn-primary">Payment Status</h4></th>
                              </div>
                            </div>
                          </div>
                        </div>
                      </tr>
                      <tr>
                        <div class="row">
                          <div class="col-lg-11 ml-auto mr-auto">
                            <div class="row">
                              <div class="col-md-12">
                                <td><h5 class="mt-2"><?php echo $rows['payment_id'];?></h5></td>
                                <td><h5 class="mt-2"><?php echo $rows['order_no'];?></h5></td>
                                <td><h5 class="mt-2"><?php echo $rows['payment_mode'];?></h5></td>
                                <td><h5 class="mt-2"><?php echo $rows['amount'];?></h5></td>
                                <td><h5 class="mt-2"><?php echo $rows['payment_status'];?></h5></td>
                              </div>
                            </div>
                          </div>
                        </div>
                      </tr>
                    </table>
                    <div class="col-lg-2 ml-auto mr-auto">
                      <form action="paymentTable.php" method="POST">
                        <input style="display:none;" type="text" name="order_no" value="<?php echo $rows['order_no']; ?>">
                        <input type="submit" name="confirm_payment" class="btn btn-success" value="Confirm Order">
                      </form>
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php
          }
        ?>
      </div>
    </div>
  </div>
  <!--   Core JS Files   -->
  <script src="../assets/js/core/jquery.min.js"></script>
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chart JS -->
  <script src="../assets/js/plugins/chartjs.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="../assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/paper-dashboard.min.js?v=2.0.1" type="text/javascript"></script><!-- Paper Dashboard DEMO methods, don't include it in your project! -->
  <script src="../assets/demo/demo.js"></script>
  <script>
    function SelectText(element) {
      var doc = document,
        text = element,
        range, selection;
      if (doc.body.createTextRange) {
        range = document.body.createTextRange();
        range.moveToElementText(text);
        range.select();
      } else if (window.getSelection) {
        selection = window.getSelection();
        range = document.createRange();
        range.selectNodeContents(text);
        selection.removeAllRanges();
        selection.addRange(range);
      }
    }
    window.onload = function() {
      var iconsWrapper = document.getElementById('icons-wrapper'),
        listItems = iconsWrapper.getElementsByTagName('li');
      for (var i = 0; i < listItems.length; i++) {
        listItems[i].onclick = function fun(event) {
          var selectedTagName = event.target.tagName.toLowerCase();
          if (selectedTagName == 'p' || selectedTagName == 'em') {
            SelectText(event.target);
          } else if (selectedTagName == 'input') {
            event.target.setSelectionRange(0, event.target.value.length);
          }
        }

        var beforeContentChar = window.getComputedStyle(listItems[i].getElementsByTagName('i')[0], '::before').getPropertyValue('content').replace(/'/g, "").replace(/"/g, ""),
          beforeContent = beforeContentChar.charCodeAt(0).toString(16);
        var beforeContentElement = document.createElement("em");
        beforeContentElement.textContent = "\\" + beforeContent;
        listItems[i].appendChild(beforeContentElement);

        //create input element to copy/paste chart
        var charCharac = document.createElement('input');
        charCharac.setAttribute('type', 'text');
        charCharac.setAttribute('maxlength', '1');
        charCharac.setAttribute('readonly', 'true');
        charCharac.setAttribute('value', beforeContentChar);
        listItems[i].appendChild(charCharac);
      }
    }
  </script>
</body>

</html>