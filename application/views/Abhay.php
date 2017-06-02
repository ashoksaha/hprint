<?php include("common/header.php");?>

<!-- section: services -->
<section id="services" class="section orange">
<div class="container">
	<h4>PYON (Print Your Own Notes)</h4>
	<!-- Four columns -->
	<div class="row">
			<div class="span3 animated-fast flyIn">
			<div class="service-box">
				<img src="<?php echo img;?>icons/camera.png" alt="" />
				<h2>For Technical Support</h2>
				<p>
					 <button type="button" class="btn btn-info">999999999</button>
				</p>
			</div>
		</div>	
		<div class="span6 animated-fast flyIn">
			<div class="service-box">
				<h2>Upload Your Document</h2>
    				<?php echo $error;?>
					<?php echo form_open_multipart('Upload/do_upload'); ?>			
		<input type="file"  name="userfile" id="file-5" class="inputfile inputfile-6" data-multiple-caption="{count} files selected" multiple="" />
    <label for="file-5"><figure><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"></path></svg></figure> <span>Choose a file…</span></label><br><br>
		<input type = "submit" class="submit btn btn-info" value = "upload" />
		</form>
			</div>
		</div>

		<div class="span3 animated-slow flyIn">
			<div class="service-box">
				<img src="<?php echo img;?>icons/basket.png" alt="" />
				<h2>Drop supporting Mail</h2>
				<p>
					 <button type="button" class="btn btn-info">abc@gmail.com</button>
				</p>
			</div>
		</div>
	</div>
</div>
</section>
<!-- end spacer section -->
<!-- section: contact -->
<section id="contact" class="section green">
<div class="container">
	<h4>Get in Touch</h4>
	<p>
		 Reque facer nostro et ius, cu persius mnesarchum disputando eam, clita prompta et mel vidisse phaedrum pri et. Facilisis posidonium ex his. Mutat iudico vis in, mea aeque tamquam scripserit an, mea eu ignota viderer probatus. Lorem legere consetetur ei eum. Sumo aeque assentior te eam, pri nominati posidonium consttuam
	</p>
	<div class="blankdivider30">
	</div>
	<div class="row">
		<div class="span12">
			<div class="cform" id="contact-form">
				<div id="sendmessage">Your message has been sent. Thank you!</div>
                <div id="errormessage"></div>
				<form action="" method="post" role="form" class="contactForm">
					<div class="row">
						<div class="span6">
							<div class="field your-name form-group">
								<input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                                <div class="validation"></div>
							</div>
							<div class="field your-email form-group">
								<input type="text" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                                <div class="validation"></div>
							</div>
							<div class="field subject form-group">
								<input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                                <div class="validation"></div>
							</div>
						</div>
						<div class="span6">
							<div class="field message form-group">
								<textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
                                <div class="validation"></div>
							</div>
							<input type="submit" value="Send message" class="btn btn-theme pull-left">
						</div>
					</div>
				</form>
			</div>
		</div>
		<!-- ./span12 -->
	</div>
</div>
</section>
<?php include("common/footer.php");?>