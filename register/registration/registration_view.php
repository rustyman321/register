<?php
if(serialkey !== 1){
	header("location:../?page=registration");
}
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>
			REGISTER
		</title>
		<link href="style/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
		<link href="style/style.css" rel="stylesheet" type="text/css" />
	</head>
	<body>
		<br/><br/>
		<div class="container">
			<div class="row">
				<div class="col-md-5 pull-right">
					<div class="panel panel-default">
						<div class="panel-heading">
							<center>
								<div id="result-notif">
								</div>
								<img src="style/images/royal-caribbean-cruises-ltd-logo_172439.png" alt="logo" class="img-responsive"/>
							</center>
						</div>
						<div class="modal-body">
							<div class="form-group">
								<form class="form center-block" method="POST" action="registration/registration_controller.php">
										<div class="form-group">
										<div class="input-group">
											<span class="input-group-addon"><i class="glyphicon glyphicon-barcode"></i></span>
											<input class="form-control input-lg"type="text" maxlength="7" id="pin" placeholder="Personal Identification Number*" name="pin"required/>
										</div>
									</div>
									<div class="form-group">
										<div class="input-group">
											<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
											<input class="form-control input-lg"type="text" id="fname" placeholder="First Name*" name="fname"required/>
										</div>
									</div>
									<div class="form-group">
										<div class="input-group">
											<span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
											<input class="form-control input-lg" type="text" id="lname" placeholder="Last Name*" name="lname"required/>
										</div>
									</div>
									<div class="form-group">
										<div class="input-group">
												<span class="input-group-addon"><i class="glyphicon glyphicon-tower"></i></span>
								                <select class="form-control input-lg" id="title" name="title" required>
								                        <option value="mr">Mr</option>
								                        <option value="ms">Ms</option>
								                        <option value="miss">Miss</option>
								                        <option value="mrs">Mrs</option>
								                 </select>
						                	</div>
						                </div>
						                <div class="form-group">
											<div class="input-group">
												<label>Gender*:</label>&nbsp;&nbsp;&nbsp;
												<label class="radio-inline input-lg">
											      	<input type="radio" class="radio" name="gender" value="0" required>Female
											    </label>
											    <label class="radio-inline input-lg">
											      	<input type="radio" class="radio" value="1" name="gender">Male
											    </label>
											</div>
										</div>
						            	<div class="form-group">
											<div class="input-group">
												<span class="input-group-addon"><i class="glyphicon glyphicon-flag"></i></span>
								                <select class="form-control input-lg" id="citizenship" name="citizenship" required="">
								                <?php
													require_once 'config/config.php';

													if($act->get_countries())
													{
														$countries = $act->cntrs;
														foreach($countries as $country){
															echo "<option value=".$country['country_code'].">".$country['country_name']."</option>";
														}

													}
												?>
								        		 </select>
											</div>
										</div>
										<div class="form-group">
										      <label>Comment:</label>
										      <textarea class="form-control" id="comment" rows="3" name="comment"></textarea>
									    </div>
										 <div class="row-fluid">
										      <div class="span4 offset4 text-center">
											        <input class="btn btn-primary btn-lg"type="submit" value="SIGN UP" id="submit" name="submit" />
											        <input class="btn btn-default btn-lg"type="submit" value="RESET" id="reset" name="reset" />
										      </div>
									    </div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<script type="text/javascript" src="scripts/jquery.js"></script>
		<script type="text/javascript" src="scripts/custom.js"></script>
	</body>
</html>

