@extends('layout')
  
@section('content')
<section class="bbrLoginWrap">
		<a class="homeRightIcon" href="/"><i class="icon-home"></i></a>
		<div class="container-fluid">
			<div class="row align-items-start">
				<div class="col-lg-6 col-12 login-bg-wrap-left">
					<div class="log-bg-img">
						<div class="log-header">
							<div class="fxt-transformY-50 fxt-transition-delay-1">
								<a href="/" class="logo-center"><img src="images/BB-logo.svg" alt="Logo"></a>
							</div>
							<div class="LoginLeftContent">
								<img src="images/textPath.svg" alt="text" />
								<h3>in rare collectibles</h3>
								<p>Blockbarster is a platform that offers NFTs (digital assets) directly from luxury liquor brands, watches and more… </p>
								<a class="brBtn" href="#">Explore More..</a>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-6 col-12 fxt-bg-color">
					<div class="fxt-content">
						<div class="formTitle">
							<h5>Sign Up to Blockbarster</h5>
						</div>
						<div class="fxt-form">
                        <form action="{{ route('register.post') }}" method="POST">
                          @csrf
								<div class="form-group">
									<label for="Name" class="input-label">Name</label>
									<input type="text" id="Name" class="form-control" name="name" placeholder="Enter Name" required="required">
								</div>
								<div class="form-group">
									<label for="email" class="input-label">Email Address</label>
									<input type="email" id="email" class="form-control" name="email" placeholder="demo@gmail.com" required="required">
								</div>
								<!-- <div class="form-group">
									<label for="phone-number" class="input-label">Phone Number</label>
									<div class="countrySelectWrap">
										<div class="countrySelectNumber">
											<select>
												<option>+91</option>
												<option>+91</option>
												<option>+91</option>
											</select>
										</div>
										<input type="text" id="phone-number" class="form-control" name="Phone Number" placeholder="Enter Phone" required="required">	
									</div>
									
								</div> -->
								<div class="form-group">
									<label for="password" class="input-label">Password</label>
									<input id="password" type="password" class="form-control" name="password" placeholder="********" required="required">
									<i toggle="#password" class="icon-eye field-icon"></i>
								</div>
								<div class="form-group">
									<label for="password" class="input-label">Confirm Password</label>
									<input id="password" type="password" class="form-control" name="confirm-password" placeholder="********" required="required">
									<i toggle="#password" class="icon-eye field-icon"></i>
								</div>
								<div class="form-group">
									<div class="fxt-checkbox-area">
										<div class="custom-checkbox">
											<input id="checkbox1" type="checkbox">
											<label for="checkbox1">By creating an account you agree to the Terms of Service and Privacy Policy</label>
										</div>
									</div>
								</div>
								<div class="form-group">
									<button type="submit" class="fxt-btn-fill mb-0">Create new account</button>
								</div>

								<div class="text-center mb-4 orDivider">
					              	<p class="fw-bold mb-0">OR</p>
					            </div>

					           	<div class="social-login mb-4">
						            <a class="fxt-btn-br ether mb-3 text-center" href="#!" role="button"><i class="fab icon-eth me-2"></i>Sign in with Ethereum Wallet</a>
						            <a class="fxt-btn-br google mb-3 text-center" href="#!" role="button"> <i class="fab fa-google me-2"></i>Sign in with google</a>
					            </div>

							</form>
						</div>
						<div class="fxt-footer">
							<p>Already have an account? <a href="login.html" class="switcher-text2 inline-text">Login</a></p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
@endsection