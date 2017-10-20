
<div class="form-group">
<form name='signUpForm' method='POST' onsubmit="return validateSignUpForm()" class="form-horizontal" role="form">
  <div class="form-group">
    <label class="control-label col-sm-2 Label" for="email">Email:</label>
    <div class="col-sm-10">
      <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" required="required">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2 Label" for="password">Password:</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" id="password" name="password" placeholder="Enter password" required="required" >
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2 Label" for="reTypePassword">Password:</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" id="reTypePassword" name="reTypePassword" placeholder="Re Type password" required="required" >
    </div>
  </div>

  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
	  <button type='submit' name='signUp' class="btn btn-default" >Sign Up</button>
    </div>
  </div>
</form>
</div>