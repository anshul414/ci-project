<?php include_once('admin_header.php'); ?>

<div class="container">
	<?php echo form_open_multipart('admin/store_article' , ['class'=>'form-horizontal']) ?>
	<?php echo form_hidden('user_id', $this->session->userdata('user_id')); ?>
  <?php echo form_hidden('created_at', date('Y-m-d H:i:s') )?>
  <fieldset>
    <legend>Add Article</legend>

    <div class="form-group">
      <label for="inputEmail1" class="col-lg-4 control-label">Article Title</label>
      <div class="col-lg-8">
      <?php echo form_input(['name'=>'title','class'=>'form-control', 'placeholder'=>'Article Title', 'value'=>set_value('title')]); ?>
      <!--<input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="username"> -->
      <?php echo form_error('title'); ?>
  	  </div>
    </div>
    <div class="form-group">
      <label for="inputPassword" class="col-lg-4 control-label">Article Body</label>
      <div class="col-lg-8">
      <?php echo form_textarea(['name'=>'body','class'=>'form-control', 'placeholder'=>'Article Body', 'value'=>set_value('body')]); ?>
      <!-- <input type="password" class="form-control" id="exampleInputPassword1" placeholder="password">  -->
      <?php echo form_error('body'); ?>
  	</div>
    </div>
    <div class="form-group">
      <label for="inputEmail1" class="col-lg-4 control-label">Select Image</label>
      <div class="col-lg-8">
      <?php echo form_upload(['name'=>'userfile','class'=>'form-control']); ?>
      <!--<input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="username"> -->
      <?php if(isset($upload_error) ) echo $upload_error; ?>
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

<?php include_once('admin_footer.php'); ?>