<div class="box-typical box-typical-padding">
				<p>
					Examples of standard form controls supported in an example form layout. Individual form controls automatically receive some global styling. All textual <code>&lt;input&gt;</code>, <code>&lt;textarea&gt;</code>, and <code>&lt;select&gt;</code>; elements with <code>.form-control</code> are set to <code>width: 100%;</code> by default. Wrap labels and controls in <code>.form-group</code> for optimum spacing. Labels in horizontal form require <code>.control-label</code> class.
				</p>

				<h5 class="m-t-lg with-border">Horizontal Inputs</h5>

				<form>
					<div class="form-group row">
						<label class="col-sm-2 form-control-label">Text</label>
						<div class="col-sm-10">
							<p class="form-control-static"><input type="text" class="form-control" id="inputPassword" placeholder="Text"></p>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-2 form-control-label">Text Disabled</label>
						<div class="col-sm-10">
							<p class="form-control-static"><input type="text" disabled="" class="form-control" id="inputPassword" placeholder="Text Disabled"></p>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-2 form-control-label">Text Readonly</label>
						<div class="col-sm-10">
							<p class="form-control-static"><input type="text" readonly="" class="form-control" id="inputPassword" placeholder="Text Readonly"></p>
						</div>
					</div>
					<div class="form-group row">
						<label for="inputPassword" class="col-sm-2 form-control-label">Password</label>
						<div class="col-sm-10">
							<input type="password" class="form-control" id="inputPassword" placeholder="Password">
						</div>
					</div>
					<div class="form-group row">
						<label for="exampleSelect" class="col-sm-2 form-control-label">Select</label>
						<div class="col-sm-10">
							<select id="exampleSelect" class="form-control">
								<option>1</option>
								<option>2</option>
								<option>3</option>
								<option>4</option>
							</select>
						</div>
					</div>
					<div class="form-group row">
						<label for="exampleSelect2" class="col-sm-2 form-control-label">Multiple select</label>
						<div class="col-sm-10">
							<select multiple="" class="form-control" id="exampleSelect2">
								<option>1</option>
								<option>2</option>
								<option>3</option>
								<option>4</option>
								<option>5</option>
							</select>
						</div>
					</div>
					<div class="form-group row">
						<label for="exampleSelect" class="col-sm-2 form-control-label">Textarea</label>
						<div class="col-sm-10">
							<textarea rows="4" class="form-control" placeholder="Textarea"></textarea>
						</div>
					</div>
				</form>

				<h5 class="m-t-lg with-border">Vertical Inputs</h5>

				<div class="row">
					<div class="col-lg-4">
						<fieldset class="form-group">
							<label class="form-label semibold" for="exampleInput">First Name</label>
							<input type="text" class="form-control" id="exampleInput" placeholder="First Name">
							<small class="text-muted">We'll never share your email with anyone else.</small>
						</fieldset>
					</div>
					<div class="col-lg-4">
						<fieldset class="form-group">
							<label class="form-label" for="exampleInputEmail1">Email address</label>
							<input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email" value="mail@mail.com">
						</fieldset>
					</div>
					<div class="col-lg-4">
						<fieldset class="form-group">
							<label class="form-label" for="exampleInputPassword1">Password</label>
							<input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
						</fieldset>
					</div>
				</div><!--.row-->


				<div class="row">
					<div class="col-md-4 col-sm-6">
						<fieldset class="form-group">
							<label class="form-label" for="exampleInputDisabled">Disabled</label>
							<input type="email" class="form-control" id="exampleInputDisabled" placeholder="First Name" disabled="">
						</fieldset>
					</div>
					<div class="col-md-4 col-sm-6">
						<fieldset class="form-group">
							<label class="form-label" for="exampleInputDisabled2">Readonly</label>
							<input type="password" readonly="" class="form-control" id="exampleInputDisabled2">
						</fieldset>
					</div>
					<div class="col-md-4 col-sm-6">
						<fieldset class="form-group">
							<label class="form-label" for="exampleInputError">Error</label>
							<input type="text" class="form-control form-control-error" id="exampleInputError" placeholder="First Name" value="First Name">
						</fieldset>
					</div>
				</div><!--.row-->

				<h5 class="m-t-lg with-border">Custom Validation Styles</h5>

				<div class="row">
					<div class="col-md-4 col-sm-6">
						<fieldset class="form-group form-group-error">
							<label class="form-label" for="exampleError">Username</label>
							<input type="text" class="form-control" id="exampleError">
							<small class="text-muted">Username must not be empty</small>
						</fieldset>
					</div>
					<div class="col-md-4 col-sm-6">
						<fieldset class="form-group form-group-error">
							<label class="form-label" for="exampleError2">Username</label>
							<div class="form-control-wrapper">
								<input type="text" class="form-control" id="exampleError2">
								<div class="form-tooltip-error">Username must be between 6 and 18 characters. No special characters allowed.</div>
							</div>
							<small class="text-muted">Username must not be empty</small>
						</fieldset>
					</div>
					<div class="col-md-4 col-sm-6">
						<fieldset class="form-group form-group-error">
							<label class="form-label" for="exampleError3">Password</label>
							<div class="form-control-wrapper">
								<input type="text" class="form-control" id="exampleError3">
								<div class="form-tooltip-error sm">Password must be at least 6 characters</div>
							</div>
							<small class="text-muted">Password must not be empty</small>
						</fieldset>
					</div>
				</div><!--.row-->

				<h5 class="m-t-lg with-border">TouchSpin</h5>

				<div class="row">
					<div class="col-lg-3">
						<div class="form-group">
							<div class="input-group bootstrap-touchspin"><span class="input-group-btn"><button class="btn btn-default bootstrap-touchspin-down" type="button">-</button></span><span class="input-group-addon bootstrap-touchspin-prefix" style="display: none;"></span><input id="demo1" type="text" value="55" name="demo1" class="form-control" style="display: block;"><span class="input-group-addon bootstrap-touchspin-postfix">%</span><span class="input-group-btn"><button class="btn btn-default bootstrap-touchspin-up" type="button">+</button></span></div>
						</div>
					</div>
					<div class="col-lg-3">
						<div class="form-group">
							<div class="input-group bootstrap-touchspin"><span class="input-group-btn"><button class="btn btn-default bootstrap-touchspin-down" type="button">-</button></span><span class="input-group-addon bootstrap-touchspin-prefix">$</span><input id="demo2" type="text" value="0" name="demo2" class="col-md-8 form-control" style="display: block;"><span class="input-group-addon bootstrap-touchspin-postfix" style="display: none;"></span><span class="input-group-btn"><button class="btn btn-default bootstrap-touchspin-up" type="button">+</button></span></div>
						</div>
					</div>
					<div class="col-lg-3">
						<div class="form-group">
							<div class="input-group bootstrap-touchspin"><span class="input-group-addon bootstrap-touchspin-prefix" style="display: none;"></span><input id="demo_vertical" type="text" value="" name="demo_vertical" class="form-control" style="display: block;"><span class="input-group-addon bootstrap-touchspin-postfix" style="display: none;"></span><span class="input-group-btn-vertical"><button class="btn btn-default bootstrap-touchspin-up" type="button"><i class="glyphicon glyphicon-chevron-up"></i></button><button class="btn btn-default bootstrap-touchspin-down" type="button"><i class="glyphicon glyphicon-chevron-down"></i></button></span></div>
						</div>
					</div>
					<div class="col-lg-3">
						<div class="form-group">
							<div class="input-group bootstrap-touchspin"><span class="input-group-addon bootstrap-touchspin-prefix" style="display: none;"></span><input id="demo_vertical2" type="text" value="" name="demo_vertical2" class="form-control" style="display: block;"><span class="input-group-addon bootstrap-touchspin-postfix" style="display: none;"></span><span class="input-group-btn-vertical"><button class="btn btn-default bootstrap-touchspin-up" type="button"><i class="glyphicon glyphicon-plus"></i></button><button class="btn btn-default bootstrap-touchspin-down" type="button"><i class="glyphicon glyphicon-minus"></i></button></span></div>
						</div>
					</div>
				</div><!--.row-->
				<div class="row">
					<div class="col-lg-3">
						<div class="form-group">
							<div class="input-group bootstrap-touchspin"><span class="input-group-btn"><button class="btn btn-default bootstrap-touchspin-down" type="button">-</button></span><span class="input-group-addon bootstrap-touchspin-prefix" style="display: none;"></span><input id="demo3" type="text" value="" name="demo3" class="form-control" style="display: block;"><span class="input-group-addon bootstrap-touchspin-postfix" style="display: none;"></span><span class="input-group-btn"><button class="btn btn-default bootstrap-touchspin-up" type="button">+</button></span></div>
						</div>
					</div>
					<div class="col-lg-3">
						<div class="form-group">
							<div class="input-group bootstrap-touchspin input-group-sm"><span class="input-group-btn"><button class="btn btn-default bootstrap-touchspin-down" type="button">-</button></span><span class="input-group-addon bootstrap-touchspin-prefix" style="display: none;"></span><input id="demo4" type="text" value="" name="demo4" class="input-sm form-control" style="display: block;"><span class="input-group-addon bootstrap-touchspin-postfix btn btn-default">a button</span><span class="input-group-btn"><button class="btn btn-default bootstrap-touchspin-up" type="button">+</button></span></div>
						</div>
					</div>
					<div class="col-lg-3">
						<div class="form-group">
							<div class="input-group input-group-lg bootstrap-touchspin">
								<span class="input-group-btn"><button class="btn btn-default bootstrap-touchspin-down" type="button">-</button></span><span class="input-group-addon bootstrap-touchspin-prefix" style="display: none;"></span><input id="demo4_2" type="text" value="" name="demo4_2" class="form-control input-lg" style="display: block;"><span class="input-group-addon bootstrap-touchspin-postfix btn btn-default">a button</span><span class="input-group-btn"><button class="btn btn-default bootstrap-touchspin-up" type="button">+</button></span>
							</div>
						</div>
					</div>
					<div class="col-lg-3">
						<div class="form-group">
							<div class="input-group bootstrap-touchspin"><span class="input-group-btn"><button class="btn btn-default-outline bootstrap-touchspin-down" type="button">-</button></span><span class="input-group-addon bootstrap-touchspin-prefix" style="display: none;"></span><input id="demo6" type="text" value="" name="demo6" class="form-control" style="display: block;"><span class="input-group-addon bootstrap-touchspin-postfix" style="display: none;"></span><span class="input-group-btn"><button class="btn btn-default-outline bootstrap-touchspin-up" type="button">+</button></span></div>
						</div>
					</div>
				</div><!--.row-->
				<div class="row">
					<div class="col-lg-6">
						<div class="form-group">
							<div class="input-group bootstrap-touchspin">
								<span class="input-group-btn"><button class="btn btn-default bootstrap-touchspin-down" type="button">-</button></span><span class="input-group-addon bootstrap-touchspin-prefix">pre</span><input id="demo5" type="text" class="form-control" name="demo5" value="50" style="display: block;"><span class="input-group-addon bootstrap-touchspin-postfix">post</span>
								<div class="input-group-btn"><button class="btn btn-default bootstrap-touchspin-up" type="button">+</button>
									<button type="button" class="btn btn-default">Action</button>
									<button type="button" class="btn dropdown-toggle btn-default" data-toggle="dropdown">
										<span class="caret"></span>
										<span class="sr-only">Toggle Dropdown</span>
									</button>
									<ul class="dropdown-menu pull-right" role="menu">
										<li><a href="#">Action</a></li>
										<li><a href="#">Another action</a></li>
										<li><a href="#">Something else here</a></li>
										<li class="divider"></li>
										<li><a href="#">Separated link</a></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div><!--.row-->

				<h5 class="m-t-lg with-border">Icons</h5>

				<div class="row">
					<div class="col-lg-3">
						<div class="form-group">
							<label class="form-label semibold">Left Icon:</label>
							<div class="form-control-wrapper form-control-icon-left">
								<input type="text" class="form-control" placeholder="Left">
								<i class="font-icon font-icon-pin"></i>
							</div>
						</div>
					</div>
					<div class="col-lg-3">
						<div class="form-group">
							<label class="form-label semibold">Right Icon:</label>
							<div class="form-control-wrapper form-control-icon-right">
								<input type="text" class="form-control" placeholder="Right">
								<i class="font-icon font-icon-github"></i>
							</div>
						</div>
					</div>
					<div class="col-lg-3">
						<div class="form-group">
							<label class="form-label semibold">Left Glyphicon:</label>
							<div class="form-control-wrapper form-control-icon-left">
								<input type="text" class="form-control" placeholder="Left">
								<i class="glyphicon glyphicon-heart"></i>
							</div>
						</div>
					</div>
					<div class="col-lg-3">
						<div class="form-group">
							<label class="form-label semibold">Right Glyphicon:</label>
							<div class="form-control-wrapper form-control-icon-right">
								<input type="text" class="form-control" placeholder="Right">
								<i class="glyphicon glyphicon-magnet"></i>
							</div>
						</div>
					</div>
				</div><!--.row-->
				<div class="row">
					<div class="col-lg-3">
						<div class="form-group">
							<label class="form-label semibold">Left Font Awesome:</label>
							<div class="form-control-wrapper form-control-icon-left">
								<input type="text" class="form-control" placeholder="Left">
								<i class="fa fa-youtube-play"></i>
							</div>
						</div>
					</div>
					<div class="col-lg-3">
						<div class="form-group">
							<label class="form-label semibold">Right Font Awesome:</label>
							<div class="form-control-wrapper form-control-icon-right">
								<input type="text" class="form-control" placeholder="Right">
								<i class="fa fa-mail-forward"></i>
							</div>
						</div>
					</div>
					<div class="col-lg-3">
						<div class="form-group">
							<label class="form-label semibold">Blue Icon:</label>
							<div class="form-control-wrapper form-control-icon-left">
								<input type="text" class="form-control" placeholder="Left">
								<i class="font-icon font-icon-comments color-blue"></i>
							</div>
						</div>
					</div>
					<div class="col-lg-3">
						<div class="form-group">
							<label class="form-label semibold">Green Icon:</label>
							<div class="form-control-wrapper form-control-icon-left">
								<input type="text" class="form-control" placeholder="Left">
								<i class="font-icon font-icon-check-bird color-green"></i>
							</div>
						</div>
					</div>
				</div><!--.row-->
				<div class="row">
					<div class="col-lg-3">
						<div class="form-group">
							<label class="form-label semibold">Red Icon:</label>
							<div class="form-control-wrapper form-control-icon-left">
								<input type="text" class="form-control" placeholder="Left">
								<i class="font-icon font-icon-close-2 color-red"></i>
							</div>
						</div>
					</div>
					<div class="col-lg-3">
						<div class="form-group">
							<label class="form-label semibold">Green Icon:</label>
							<div class="form-control-wrapper form-control-icon-left">
								<input type="text" class="form-control" placeholder="Left">
								<i class="font-icon font-icon-clock color-orange"></i>
							</div>
						</div>
					</div>
					<div class="col-lg-3">
						<div class="form-group">
							<label class="form-label semibold">Purple Icon:</label>
							<div class="form-control-wrapper form-control-icon-left">
								<input type="text" class="form-control" placeholder="Left">
								<i class="font-icon font-icon-earth color-purple"></i>
							</div>
						</div>
					</div>
					<div class="col-lg-3">
						<div class="form-group">
							<label class="form-label semibold">Dark Icon:</label>
							<div class="form-control-wrapper form-control-icon-left">
								<input type="text" class="form-control" placeholder="Left">
								<i class="font-icon font-icon-i-circle color-black-blue"></i>
							</div>
						</div>
					</div>
				</div><!--.row-->
				<div class="row">
					<div class="col-lg-3">
						<div class="form-group">
							<label class="form-label semibold">Left Large:</label>
							<div class="form-control-wrapper form-control-icon-left">
								<input type="text" class="form-control form-control-lg" placeholder="Left">
								<i class="font-icon font-icon-page"></i>
							</div>
						</div>
					</div>
					<div class="col-lg-3">
						<div class="form-group">
							<label class="form-label semibold">Right Large:</label>
							<div class="form-control-wrapper form-control-icon-right">
								<input type="text" class="form-control form-control-lg" placeholder="Right">
								<i class="font-icon font-icon-cam-video"></i>
							</div>
						</div>
					</div>
					<div class="col-lg-3">
						<div class="form-group">
							<label class="form-label semibold">Left Small:</label>
							<div class="form-control-wrapper form-control-icon-left">
								<input type="text" class="form-control form-control-sm" placeholder="Left">
								<i class="font-icon font-icon-picture"></i>
							</div>
						</div>
					</div>
					<div class="col-lg-3">
						<div class="form-group">
							<label class="form-label semibold">Right Small:</label>
							<div class="form-control-wrapper form-control-icon-right">
								<input type="text" class="form-control form-control-sm" placeholder="Right">
								<i class="font-icon font-icon-pencil"></i>
							</div>
						</div>
					</div>
				</div><!--.row-->
				<div class="row">
					<div class="col-lg-3">
						<div class="form-group">
							<label class="form-label semibold">Left Rounded:</label>
							<div class="form-control-wrapper form-control-icon-left">
								<input type="text" class="form-control form-control-rounded" placeholder="Left">
								<i class="font-icon font-icon-dropbox"></i>
							</div>
						</div>
					</div>
					<div class="col-lg-3">
						<div class="form-group">
							<label class="form-label semibold">Right Rounded:</label>
							<div class="form-control-wrapper form-control-icon-right">
								<input type="text" class="form-control form-control-rounded" placeholder="Right">
								<i class="font-icon font-icon-cam-photo"></i>
							</div>
						</div>
					</div>
				</div><!--.row-->

				<h5 class="m-t-lg with-border">Validation</h5>

				<div class="row">
					<div class="col-lg-4">
						<div class="form-group has-success">
							<label class="form-label" for="inputSuccess1">Input with success</label>
							<input type="text" class="form-control form-control-success" id="inputSuccess1">
						</div>
					</div>
					<div class="col-lg-4">
						<div class="form-group has-warning">
							<label class="form-label" for="inputWarning1">Input with warning</label>
							<input type="text" class="form-control form-control-warning" id="inputWarning1">
						</div>
					</div>
					<div class="col-lg-4">
						<div class="form-group has-danger">
							<label class="form-label" for="inputDanger1">Input with danger</label>
							<input type="text" class="form-control form-control-danger" id="inputDanger1">
						</div>
					</div>
				</div><!--.row-->
				<div class="row">
					<div class="col-lg-4">
						<div class="form-group">
							<input type="text" class="form-control form-control-blue-fill">
						</div>
					</div>
					<div class="col-lg-4">
						<div class="form-group">
							<input type="text" class="form-control form-control-red-fill">
						</div>
					</div>
					<div class="col-lg-4">
						<div class="form-group">
							<input type="text" class="form-control form-control-orange-fill">
						</div>
					</div>
				</div><!--.row-->
				<div class="row">
					<div class="col-lg-4">
						<div class="form-group">
							<input type="text" class="form-control form-control-green-fill">
						</div>
					</div>
					<div class="col-lg-4">
						<div class="form-group">
							<input type="text" class="form-control form-control-purple-fill">
						</div>
					</div>
				</div><!--.row-->

			</div>