
<div class="form-group">
<form name='signUpForm' method='POST' onsubmit="return validateSignUpForm()" class="form-horizontal" role="form">
  <div class="form-group">
    <label class="control-label col-sm-2 Label" for="email">Email:</label>
    <div class="col-sm-10">
      <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email for Password Recovery" required="required">
    </div>
  </div>

  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
	  <button type='submit' name='resendPassword' class="btn btn-default" >Resend Password</button>
    </div>
  </div>
</form>
</div>