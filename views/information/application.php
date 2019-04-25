<?php echo $this->session->flashdata('success_msg'); ?>
<?php echo $this->session->flashdata('error_msg'); ?>

         <div class="main">
    <div class="content">
    	<div class="section group">
				<div class="col span_2_of_3">
				  <div class="contact-form">
						<h2>Application for the job</h2>
					    <form role="form" method="post" enctype="multipart/form-data">
					    	<div class="cv">
						    	<span><label>Name</label></span>
						    	<span><input class="form-control" type="text" name="name" /></span>
							</div>
							<div>
								<span><label>Surname</label></span>
									<span><input class="form-control" type="text" name="surname" /></span>
								</div>
						    <div>
							<div>
								<span><label>Gender</label></span>
											<input type="radio" name="gender" value="male"> Male<br>
											<input type="radio" name="gender" value="female"> Female<br>
											<input type="radio" name="gender" value="other"> Other
							</div>
							<div>
									<span><label>Birthday</label></span>
									<input class="form-control"  type="date" name="bdate" max="2018-12-31" min="1900-01-01">
								  </div>
							
						    	<span><label>E-mail</label></span>
						    	<span><input class="form-control" name="mail" type="email" class="email"></span>
							</div>
							<div><label><span>Telephone no.</span></label>
							<input name="telno" type="tel">
							</div>
							<div>
									<span><label>Job you are looking for</label></span>
									<input type="radio" name="job" value="Marketing Director"> Marketing Director<br>
									<input type="radio" name="job" value="Website Designer" > Website Designer<br>
					       </div>
						    	<span><label>Shortly describe yourself (max length 1000 characters)</label></span>
						    	<span><textarea name="aboutme" maxlength="1000"> </textarea></span>
						   
						   
							<div><label><span>Insert your CV (PDFs only)</span></label></div>
								<span><input class="form-control" type="file" name="picture" /></span>	
								<span><input name="res" type="reset" value="Reset" class="myButton"></span>
						   		<span> <input type="submit" class="btn btn-warning" name="userSubmit" value="Add"></span></div>
					    </form>
						
				   </div>
				   
		<div class="col span_1_of_3">
      			<div class="company_address">
				     	<h3>Company Information :</h3>
						    	<p>24 Naugarduko,</p>
						   		<p>Lithuania</p>
				   		<p>Phone: 776-2323</p>
				 	 	<p>Email: <span><a href="mailto:gedas.atraskevicius@mif.stud.vu.lt?Subject=Susisiekime">gedas.atraskevicius@mif.stud.vu.lt</a></span></p>
				 </div>
			  </div>		
         </div>
         