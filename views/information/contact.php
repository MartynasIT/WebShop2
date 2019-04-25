<?php $this->load->view('templates/page_header'); ?>
<?php $this->load->view('templates/page_header_bottom'); ?>


<?php echo $this->session->flashdata('success_msg'); ?>
<?php echo $this->session->flashdata('error_msg'); ?>
<div class="main">
    <div class="content">
    	<div class="section group">
				<div class="col span_2_of_3">
				  <div class="contact-form">
						<h2>Contact with us</h2>
						<h3 style="color:red">*- required </h3>
					    <form role="form" method="post" name="contact" enctype="multipart/form-data">
					    	<div class="cv">
						    	<span><label>Name *</label></span>
						    	<span><input class="form-control" type="text" name="name" /></span>
							</div>
							<div>
								<span><label>Email *</label></span>
									<span><input class="form-control" type="email" name="mailas" /></span>
								</div>					
							<div>								
						    	<span><label>Company Name *</label></span>
						    	<span><input class="form-control" name="companyname" type="text" ></span>
							</div>
							
						    	<span><label>Shortly describe problem (max length 1000 characters)</label></span>
						    	<span><textarea name="subject" maxlength="1000" id="text"> </textarea></span>
                                <span><input name="res" type="reset" value="Reset" class="myButton"></span>
						   		<span> <input type="submit" class="btn btn-warning" name="commentSubmit" value="Add"></span></div>
					    </form>
				   </div>
  
                   <div class="col span_1_of_3">
					<div class="contact_info">
    	 				<h3>Find Us Here</h3>
					    	  <div class="map">
									   <iframe width="100%" height="175" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=Naugarduko g. 24,+ Vilnius&amp;aq=4&amp;oq=light&amp;54.6760425,25.2716849&amp;spn=0.006313,0.01133&amp;ie=UTF8&amp;hq=&amp;hnear=Naugarduko g. 24,+ Vilnius&amp;t=m&amp;z=14&amp;ll=54.6760425,25.2716849&amp;output=embed"></iframe></a></small>			
												  </div>
      				</div>
      			<div class="company_address">
				     	<h3>Company Information :</h3>
						    	<p>24 Naugarduko,</p>
						   		<p>Lithuania</p>
				   		<p>Phone: 776-2323</p>
				 	 	<p>Email: <span><a href="mailto:gedas.atraskevicius@mif.stud.vu.lt?Subject=Susisiekime">gedas.atraskevicius@mif.stud.vu.lt</a></span></p>
				   </div>
				 
			  </div>		
         </div>
         <?php $this->load->view('templates/page_footer'); ?>
         