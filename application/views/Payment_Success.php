<?php include("common/header.php");?>
<?php 
$abc = $this->session->userdata('user_data');
//print_r($abc);
//print_r($abc['hash']);
?>

<div class="container-fluid bg-1 text-center">
    <div class="row">
        <div class="well col-xs-10 col-sm-10 col-md-6 col-xs-offset-1 col-sm-offset-1 col-md-offset-3">
            <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <address>
                        <strong>Flavido Store</strong>
                        <br>
                        Bougainvillea Marg, Plot No 24,
                        <br>
                        DLF Phase 2, Gurgaon,
                        <br>
                        <abbr title="Phone">Call Us:</abbr>  91-9555923039
                    </address>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6 text-right">
                    
                        <em>Date: 1st November, 2013</em>
                    
                    <br>
                        Transaction Id: <em><?php echo $abc['t_xnid'];?></em>
                    
                </div>
            </div>
            <div class="row">
                <div class="text-center">
                    <h1>Thank You For Your Order</h1>
                </div>
                </span>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>PDF</th>
                            <th class="text-center">Price</th>
                            <th class="text-center">Order Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="col-md-9"><em><?php echo $abc['file_name'];?></em></h4></td>
                            <td class="col-md-1 text-center"><?php echo $abc['amount'];?></td>
                            <td class="col-md-1 text-center"><?php echo $abc['order_status'];?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
			<div class="row">
			                <div class="text-center">
								<h1>Shipping Address</h1>
							</div>
				<table class="table table-hover">
				                    <thead>
                        <tr>
                            <th>Name :</th>
                            <th class="text-center">Email Address :</th>
                            <th class="text-center">Address</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="col-md-9"><em><?php echo $abc['firstname'];?></em></h4></td>
                            <td class="col-md-1 text-center"><?php echo $abc['email'];?></td>
                            <td class="col-md-1 text-center"><?php echo $abc['productinfo'];?></td>
                        </tr>
                    </tbody>
				</table>
			</div>
        </div>
    </div>
</div>


<!--
<section class="section orange">
<div class="w3-center">
<h4>Thank You For Ordering</h4>
</div>
<div class="container">
  <table class="table table-condensed">
    <thead>
      <tr>
        <th>Name</th>
        <th>Email Id</th>
        <th>Transaction In</th>
        <th>Amount</th>
        <th>Order Status</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td><?php //echo $abc['firstname'];?></td>
        <td><?php //echo $abc['email'];?></td>
        <td><?php //echo $abc['t_xnid'];?></td>
        <td><?php //echo $abc['amount'];?></td>
        <td><?php //echo $abc['order_status'];?></td>
      </tr>
    </tbody>
  </table>
  <br><br><br>
  <table class="w3-right">
    <thead>
      <th>Address</th>
    </thead>
    <tbody>
      <td><?php //echo $abc['productinfo'];?><td>
    </tbody>
    <br><br><br><br>
    
  </table>
  
</div>
<button class="w3-right" onclick="myFunction()">Print this page</button>
</section>
-->

<script>
function myFunction() {
    window.print();
}
</script>
<?php include("common/footer.php");?>