<?php include("common/header.php");?>

<!-- section: services -->
<div id="upload" class="container-fluid bg-1 text-center">    
 <h2 class="margin">Print Your Own Notes</h2><br>
 <div class="row">
   <div class="col-sm-4">
     <h3 class="home-head">For Technical Support</h3>
     <img src="<?php echo base_url();?>assets/img/support.png" class="img-responsive margin" style= alt="Image">
   </div>
   <div class="col-sm-4"> 
     <h3 class="home-head">Upload Your Document</h3>
         				<?php echo $error;?>
						<div class="upload-form">
					<?php echo form_open_multipart('Upload/do_upload'); ?>			
		<input style="display:none;" type="file"  name="userfile" id="file-5" class="inputfile inputfile-6" data-multiple-caption="{count} files selected" multiple="" />
    <label for="file-5"><figure><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"></path></svg></figure> <span>Choose a file…</span></label><br><br>
		<!--<input type = "submit" class="submit btn btn-info" value = "upload" />-->
		<button type="submit" class="btn btn-warning btn-lg">Upload</button>
		</form>
		</div>
   </div>
   <div class="col-sm-4"> 
     <h3 class="home-head">Drop supporting Mail</h3>
     <img src="<?php echo base_url();?>assets/img/mailbox.png" class="img-responsive margin" style= alt="Image">
   </div>
 </div>
</div>

<!-- end spacer section -->

<?php include("common/footer.php");?>