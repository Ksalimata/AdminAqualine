<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login V3</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100" style="">
			<div class="wrap-login100" style="background: -webkit-linear-gradient(top, #7579ff, #ffffff);">
				<form class="form-horizontal login100-form validate-form"  method="POST" action="{{ route('login') }}">
                    {{ csrf_field() }}
					<span class="login100-form-logo">
						<i class=""> <img src="{{asset('images/autocollant-sticker.jpg')}}" style="height:100px; width:95%;border-radius: 52%;"> </i>
					</span>

					<span class="login100-form-title p-b-34 p-t-27">
						Connexion
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Saisir votre nom d'utilisateur">
						<input class="input100" type="text" name="username" placeholder="Nom d'utilisateur">
                        <span class="focus-input100" data-placeholder="&#xf207;"></span>
                        @if ($errors->has('username'))
                            <span class="help-block">
                                <strong>{{ $errors->first('username') }}</strong>
                            </span>
                        @endif
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100" type="password" name="password" placeholder="Password">
                        <span class="focus-input100" data-placeholder="&#xf191;"></span>
                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn" style="margin-bottom: 25px">
							&nbsp;Connecter
                        </button>
                        @if (session()->has('echec_connexion'))
                            <span class="help-block">
                                <strong style="color:red;"><i class="fa fa-exclamation-triangle"></i> {{ session("echec_connexion") }} </strong>
                            </span>
                        @endif
					</div>

					<div class="text-center p-t-90">
						<a class="txt1" href="{{ route('password.request') }}" style="color:black">
							Forgot Password?
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>

<!-- <div id="login">
        <h3 class="text-center text-white pt-5">Connexion</h3>
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form" method="POST" action="{{ route('login') }}">
                    	{{ csrf_field() }}
                            <h3 class="text-center text-info">login</h3>
                            <div class="form-group">
                                <label for="username" class="text-info">Nom d'utilisateur:</label><br>
                                <input type="text" name="username" id="username" class="form-control">
                                <span class="focus-input100"></span>
		                        @if ($errors->has('username'))
		                            <span class="help-block">
		                                <strong>{{ $errors->first('username') }}</strong>
		                            </span>
		                        @endif
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-info">Mot de passe:</label><br>
                                <input type="text" name="password" id="password" class="form-control">
                                <span class="focus-input100"></span>
		                        @if ($errors->has('password'))
		                            <span class="help-block">
		                                <strong>{{ $errors->first('password') }}</strong>
		                            </span>
                        		@endif
                            </div>
                            <div class="form-group">
                                <a class="txt1" href="{{ route('password.request') }}">
									Forgot Password?
								</a><br>
                                <input type="submit" name="submit" class="btn btn-info btn-md" value="Valider">
                                @if (session()->has('echec_connexion'))
		                            <span class="help-block">
		                                <strong style="color:yellow;"><i class="fa fa-exclamation-triangle"></i> {{ session("echec_connexion") }} </strong>
		                            </span>
		                        @endif
                            </div>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div> -->