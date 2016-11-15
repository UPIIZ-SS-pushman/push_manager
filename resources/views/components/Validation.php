<div class="col-md-6">
							<form id="form-signup_v1" name="form-signup_v1" method="POST">
								<div class="form-group">
									<label class="form-label" for="signup_v1-username">Username</label>
									<div class="form-control-wrapper">
										<input id="signup_v1-username" class="form-control" name="signup_v1[username]" type="text" data-validation="[L>=6, L<=18, MIXED]" data-validation-message="$ must be between 6 and 18 characters. No special characters allowed." data-validation-regex="/^((?!admin).)*$/i" data-validation-regex-message="The word &quot;Admin&quot; is not allowed in the $">
									</div>
								</div>
								<div class="form-group">
									<label class="form-label" for="signup_v1-password">Password</label>
									<div class="form-control-wrapper">
										<input id="signup_v1-password" class="form-control" name="signup_v1[password]" type="password" data-validation="[L>=6]" data-validation-message="$ must be at least 6 characters">
									</div>
								</div>
								<div class="form-group">
									<label class="form-label" for="signup_v1-password-confirm">Confirm Password</label>
									<div class="form-control-wrapper">
										<input id="signup_v1-password-confirm" class="form-control" name="signup_v1[password-confirm]" type="password" data-validation="[V==signup_v1[password]]" data-validation-message="$ does not match the password">
									</div>
								</div>
								<div class="form-group">
									<label class="form-label" for="signup_v1-email">Email</label>
									<div class="form-control-wrapper">
										<input id="signup_v1-email" class="form-control" name="signup_v1[email]" type="text" data-validation="[EMAIL]">
									</div>
								</div>
								<div class="form-group">
									<label class="form-label" for="signup_v1-email-confirm">Confirm Email</label>
									<div class="form-control-wrapper">
										<input id="signup_v1-email-confirm" class="form-control" name="signup_v1[email-confirm]" type="text" data-validation="[V==signup_v1[email]]" data-validation-message="$ does not match the email">
									</div>
								</div>
								<div class="form-group">
									<button type="submit" class="btn">Sign up!</button>
								</div>
							</form>
						</div>