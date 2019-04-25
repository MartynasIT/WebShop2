<?php echo $this->session->flashdata('success_msg'); ?>
<?php echo $this->session->flashdata('error_msg'); ?>

         <div class="main">
    <div class="content">
    	<div class="section group">
				<div class="col span_2_of_3">
				  <div class="contact-form">
						<h2>Application for the job</h2>
						<h3 style="color:red">*- required </h3>
					    <form role="form" method="post" name="job" enctype="multipart/form-data" onsubmit="return(validate());">
					    	<div class="cv">
						    	<span><label>Name *</label></span>
						    	<span><input class="form-control" type="text" name="name" pattern="[A-Za-z]{1,}"  /></span>
							</div>
							<div>
								<span><label>Surname *</label></span>
									<span><input class="form-control" type="text" name="surname" pattern="[A-Za-z]{1,}" /></span>
								</div>
						    <div>
							<div>
								<span><label>Gender *</label></span>
											<input type="radio" name="gender" value="male"> Male<br>
											<input type="radio" name="gender" value="female"> Female<br>
											<input type="radio" name="gender" value="other"> Other
							</div>
							<div>
									<span><label>Birthday *</label></span>
									<input class="form-control"  type="date" name="bdate" max="2018-12-31" min="1900-01-01">
								  </div>
							
						    	<span><label>E-mail *</label></span>
						    	<span><input class="form-control" name="mail" type="email" class="email" pattern="[A-Za-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$"></span>
							</div>
							<div><label><span>Telephone no. *</span></label>
							<input name="telno" type="tel"  pattern= "[0-9]{1,}">
							</div>
							<div>
									<span><label>Job you are looking for *</label></span>
									<input type="radio" name="job" value="Marketing Director"> Marketing Director<br>
									<input type="radio" name="job" value="Website Designer" > Website Designer<br>
					       </div>
						    	<span><label>Shortly describe yourself (max length 1000 characters)</label></span>
						    	<span><textarea name="aboutme" maxlength="1000" id="text"> </textarea></span>
						   
						   
							<div><label><span>Insert your CV (PDFs only) *</span></label></div>
								<span><input class="form-control" type="file" name="picture" accept="application/pdf" /></span>	
								<span><input name="res" type="reset" value="Reset" class="myButton"></span>
						   		<span> <input type="submit" class="btn btn-warning" name="userSubmit" value="Add"></span></div>
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