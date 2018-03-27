<?php include('public_header.php'); ?>
<div class="container">
<?php echo form_open('login/admin_login' , ['class'=>'form-horizontal']) ?>
  <fieldset>
    <legend>Admin Login</legend>
    <?php if( $error = $this->session->flashdata('login_failed') ): ?>
    <div class="col-lg-10">
    <div class="alert alert-dismissible alert-danger">
    <?php echo $error ?>
    </div>
    </div>
    <?php endif; ?>
    <div class="form-group">
      <label for="inputEmail1" class="col-lg-2 control-label">Username</label>
      <div class="col-lg-10">
      <?php echo form_input(['name'=>'username','class'=>'form-control', 'placeholder'=>'Username', 'value'=>set_value('username')]); ?>
      <!--<input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="username"> -->
      <?php echo form_error('username'); ?>
  	  </div>
    </div>
    <div class="form-group">
      <label for="inputPassword" class="col-lg-2 control-label">Password</label>
      <div class="col-lg-10">
      <?php echo form_password(['name'=>'password','class'=>'form-control', 'placeholder'=>'Password']); ?>
      <!-- <input type="password" class="form-control" id="exampleInputPassword1" placeholder="password">  -->
      <?php echo form_error('password'); ?>
  	</div>
    </div>
    <div class="form-group">
    <div class="col-lg-10 col-lg-offset-2">
    	<?php echo form_reset(['name'=>'reset','class'=>'btn btn-default', 'value'=>'Reset']); ?>
    	<!-- <button type="reset" class="btn btn-default">Reset</button>  -->
    	<?php echo form_submit(['name'=>'submit','class'=>'btn btn-primary', 'value'=>'Submit']); ?>
    	<!-- <button type="submit" class="btn btn-primary">Submit</button>  -->
	</div>
    </div>
  </fieldset>
</form>
</div>
<?php include('public_footer.php'); ?>