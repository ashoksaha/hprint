<?php
//$this->load->view('admin/salsevwHeader');
?>
<!DOCTYPE html>
<html>
    <head> 
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Print Your Own Notes</title>
    <link href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css')?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/datatables/css/dataTables.bootstrap.css')?>" rel="stylesheet">
    </head> 
<body>
    <div class="container">
        <h1 style="font-size:20pt"></h1>
<button><a href="<?php echo base_url(); ?>admin/home/logout"><i class="fa fa-power-off"></i> Log Out</a></button>
        <h3>All Orders</h3>
        <br />
        <table id="table" class="table table-striped table-bordered" cellspacing="0">
            <thead>
                <tr>
                    <th>amount</th>
                    <th>No_Of_Page</th>
                    <th>No_Of_Copies</th>
                    <th>firstname</th>
					<th>Mobile No</th>
                    <th>email</th>
                    <th>Address Details</th>
                    <th>order_status</th>
                    <th>Downloads</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>

<script src="<?php echo base_url('assets/jquery/jquery-2.1.4.min.js')?>"></script>
<script src="<?php //echo base_url('assets/bootstrap/js/bootstrap.min.js')?>"></script>
<script src="<?php echo base_url('assets/datatables/js/jquery.dataTables.min.js')?>"></script>
<script src="<?php echo base_url('assets/datatables/js/dataTables.bootstrap.js')?>"></script>


<script type="text/javascript">

var save_method; //for save method string
var table;

$(document).ready(function() {

    //datatables
    table = $('#table').DataTable({ 

        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.

        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('admin/sales/ajax_list')?>",
            "type": "POST"
        },
       
    });

});

</script>
</body>
</html>
<?php
//$this->load->view('admin/vwFooter');
?>