<?php include("common/header.php");?>
<style>
.input-group-addon{
background-color: #1abc9c;
color: #fff;
}
</style>
<div class="container-fluid bg-2 text-center"> 
<section>
  
    <form name="form2" id="form2" method="post" action="final_step/" class="form-input" onsubmit="javascript: return validation(this.val);" name="form2" id="form2" class="ng-pristine ng-valid">
	<h3 class="home-head  text-center">Your file was successfully uploaded!</h3>
                    <div class="col-sm-2">
                    <div class="form-group">
                      <div class="input-group">
                        <div class="input-group-addon">Pages</div>
                        <input name="pages" class="form-control" id="up" min="1" value="<?php echo $val = $this->session->userdata('noofpage');?>" type="number" required="">
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-2">
                    <div class="form-group">
                      <div class="input-group">
                        <div class="input-group-addon">Copies</div>
                        <input type="number" class="form-control" name="copies" id="up" min="1" value="1" required="">
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-2">
                    <div class="form-group">
                      <div class="input-group">
                        <div class="input-group-addon">Size</div>
                        <select id="bin up" name="paper_size" class="form-control">
                          <option value="A3">A3</option>
                          <option value="A4" selected="selected">A4</option>
                          <option value="A5">A5</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <div class="form-group">
                      <div class="input-group">
                        <div class="input-group-addon">Sides</div>
                        <select id="bin up" name="print_type" class="form-control">
                          <option value="S" selected="selected">Single Side</option>
                                                    <option value="D">Back 2 Back</option>
                                                  </select>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <div class="form-group">
                      <div class="input-group">
                        <div class="input-group-addon">Color</div>
                        <select name="colour_type" id="up" class="form-control">
                          <option value="B" selected="selected">Black &amp; White</option>
                          <option value="C">Colour</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <div class="form-group">
                      <div class="input-group">
                        <div class="input-group-addon">Paper</div>
                        <select id="bin up" name="paper_type" class="form-control">
                          <option value="75GSM" selected="selected">75GSM - Normal Paper</option>
                          <option value="90GSM">90GSM - Bond Paper</option>
                          <option value="100GSM">100GSM - Silky Paper</option>
                          <option value="170GSM">170GSM - Matte Paper</option>
                          <option value="270GSM">270GSM - Matte Paper</option>
                          <option value="300GSM">300GSM - Matte Paper</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <div class="form-group">
                      <div class="input-group">
                        <div class="input-group-addon">Binding</div>
                        <select id="bin up" name="binding_type" class="form-control">
                          <option value="NO BINDING" selected="selected">No Binding</option>
                                                     <option value="CORNER STAPLED">Corner Stapled</option>
                            <option value="STAPLE BINDING">Stapled Binding</option>
                          <option value="WIRO BINDING">Wiro Binding</option>
                          <option value="SPIRAL BINDING">Spiral Binding</option>
                           <option value="GLUE BINDING">Glue  Binding</option>
                            <option value="SOFT COVER BINDING">Soft Cover Binding</option>
                          <option value="HARD BINDING">Hard Binding</option>
                          <option value="HARD BINDING AND GOLDEN PRINT">Hard Binding And Golden Print</option> 
              </select>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="form-group">
                      <input name="remarks" id="up" placeholder="Special Instructions" type="text" class="form-control" valign="">
                    </div>
                  </div>

    <div class="col-md-12 text-center"><input name="submit" type="submit" value="Review your order  " class="btn btn-lg btn-primary" id="submit">
    </div>
    </form>
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
</section>
</div>
  <script>
      function myFunction() {
      var inpObj = document.getElementById("form2");
      if (inpObj.checkValidity() == false) {
        allert('Please input page no');
      }
   }
  </script>
<?php include("common/footer.php");?>