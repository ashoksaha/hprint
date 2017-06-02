<?php include("common/header.php");?>
<?php
// Merchant key here as provided by Payu
$MERCHANT_KEY = "gtKFFx"; //Please change this value with live key for production
$hash_string = '';
// Merchant Salt as provided by Payu
$SALT = "eCwWELxi"; //Please change this value with live salt for production

// End point - change to https://secure.payu.in for LIVE mode
$PAYU_BASE_URL = "https://test.payu.in";

$action = '';

$posted = array();
if(!empty($_POST)) {
    //print_r($_POST);
  foreach($_POST as $key => $value) {    
    $posted[$key] = $value; 
  
  }
}

$formError = 0;

if(empty($posted['txnid'])) {
   // Generate random transaction id
  $txnid = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
} else {
  $txnid = $posted['txnid'];
}
$hash = '';
// Hash Sequence
$hashSequence = "key|txnid|amount|productinfo|firstname|email|udf1|udf2|udf3|udf4|udf5|udf6|udf7|udf8|udf9|udf10";
if(empty($posted['hash']) && sizeof($posted) > 0) {
  if(
          empty($posted['key'])
          || empty($posted['txnid'])
          || empty($posted['amount'])
          || empty($posted['firstname'])
          || empty($posted['email'])
          || empty($posted['phone'])
          || empty($posted['productinfo'])
         
  ) {
    $formError = 1;
  } else {
    
  $hashVarsSeq = explode('|', $hashSequence);
 
  foreach($hashVarsSeq as $hash_var) {
      $hash_string .= isset($posted[$hash_var]) ? $posted[$hash_var] : '';
      $hash_string .= '|';
    }

    $hash_string .= $SALT;


    $hash = strtolower(hash('sha512', $hash_string));
    $action = $PAYU_BASE_URL . '/_payment';
  }
} elseif(!empty($posted['hash'])) {
  $hash = $posted['hash'];
  $action = $PAYU_BASE_URL . '/_payment';
}
?>
<html>
<head>
<title></title>
<script>
    var hash = '<?php echo $hash ?>';
    function submitPayuForm() {
      if(hash == '') {
        return;
      }
      var payuForm = document.forms.payuForm;
      payuForm.submit();
    }
  </script>
</head>
<body  onload="submitPayuForm()">
<div class="container-fluid bg-5 text-center"> 
<section class="section orange">
<h3 class="home-head text-center" >Your Order Details </h3>
<div class="table-responsive">
<table border="1" class="table">
  <tbody>
    <tr class="info">
      <th>No Of Pages</th>
      <th>Total Amount</th>
      <th>No of Copies</th>
      <th>Size</th>
      <th>Color</th>
    </tr>
    <?php
         foreach ($result as $result)  
         {  
         ?>
     <tr>
      <td><?php echo $result->pages;?></td>
      <td><?php echo $result->price;?></td>
      <td><?php echo $result->copies; ?></td>
      <td><?php echo $result->size; ?></td>
      <td><?php echo $result->color; ?></td>

     </tr>
     <?php } ?>
  </tbody>
  
</table>
</div>
</div>
    <br/>

	
    <form class="form-horizontal"  action="<?php echo $action; ?>" method="post" name="payuForm" >
	<legend>Please Enter Your Details</legend>
	    <?php if($formError) { ?>
      <h3 class="home-head text-center" style="color:red">Please fill all mandatory fields.</h3>
    <?php } ?>
      <input type="hidden" name="key" value="<?php echo $MERCHANT_KEY ?>" />
      <input type="hidden" name="hash" value="<?php echo $hash ?>"/>
      <input type="hidden" name="txnid" value="<?php echo $txnid ?>" />
   
      <input type="hidden" name="surl" value="<?php echo base_url();?>Order_Payment/response" />   <!--Please change this parameter value with your success page absolute url like http://mywebsite.com/response.php. -->
     <input type="hidden" name="furl" value="<?php echo base_url();?>Order_Payment/response" /><!--Please change this parameter value with your failure page absolute url like http://mywebsite.com/response.php. -->
             <tr>
          <td><input name="amount" type="hidden" value="<?php echo $result->price;?>" /></td>
        </tr>
	<div class="form-group">
      <label class="control-label col-sm-2" for="firstname">Name:</label>
      <div class="col-sm-8">
        <input type="text" class="form-control" id="firstname"  name="firstname" value="<?php echo (empty($posted['firstname'])) ? '' : $posted['firstname']; ?>">
      </div>
    </div>
	<div class="form-group">
      <label class="control-label col-sm-2" for="email">Email:</label>
      <div class="col-sm-8">
        <input type="email" class="form-control" id="email"  name="email" value="<?php echo (empty($posted['email'])) ? '' : $posted['email']; ?>">
      </div>
    </div>
	<div class="form-group">
      <label class="control-label col-sm-2" for="phone">Phone:</label>
      <div class="col-sm-8">
        <input type="tel" class="form-control" id="phone"  name="phone" value="<?php echo (empty($posted['phone'])) ? '' : $posted['phone']; ?>">
      </div>
    </div>
	<div class="form-group">
      <label class="control-label col-sm-2" for="phone">Address:</label>
      <div class="col-sm-8">
	  <!--<textarea class="form-control" rows="5" id="productinfo" name="productinfo" value=value='<?php //echo $info?>'></textarea> -->
	  
	  <textarea class="form-control" rows="5" id="productinfo" name="productinfo" value="<?php echo (empty($posted['productinfo'])) ? '' : $posted['productinfo'] ?>"><?php echo (empty($posted['productinfo'])) ? '' : $posted['productinfo'] ?></textarea>
	  
      
      </div>
    </div>
	<div class="form-group text-center">
	          <?php if(!$hash) { ?>
            <input  type="submit" class="btn text-center btn-success btn-lg
"   value="Place Order" />
          <?php } ?>
		   </div>
		<!--
      <table border="1" style="width:50!important%;" class="table  table-hover">

        <tr>
        <th>Enter your Name</th>
          <td><input name="firstname" type="text" id="firstname" value="<?php //echo (empty($posted['firstname'])) ? '' : $posted['firstname']; ?>" /></td>
        </tr>
        <tr>
        <th>Enter your Email</th>
          <td><input name="email" type="text" id="email" value="<?php //echo (empty($posted['email'])) ? '' : $posted['email']; ?>" /></td>
        </tr>
        <tr>
          <th>Enter your Mobile No</th>
          <td><input name="phone" type="text" value="<?php //echo (empty($posted['phone'])) ? '' : $posted['phone']; ?>" /></td>
        </tr>
        <tr>
          <th>Enter your Address</th>
          <td><input name="productinfo" id="productinfo" type="text" value="<?php //echo (empty($posted['productinfo'])) ? '' : $posted['productinfo'] ?>" /></td>
        </tr>

          <?php if(!$hash) { ?>
            <td align="center" colspan="4"><input  type="submit" class="btn btn-info btn-lg
"   value="Checkout Order_Payment" /></td>
          <?php } ?>
        </tr>
      </table>
	  -->
    </form>
    
    
</section>
</div>
</body>
</html>
<?php include("common/footer.php");?>