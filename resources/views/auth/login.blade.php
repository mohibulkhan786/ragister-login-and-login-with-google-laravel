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
							<h5>Login to Blockbarster</h5>
						</div>
						<div class="fxt-form">
                        <form action="{{ route('login.post') }}" method="POST">
                          @csrf
								<div class="form-group">
									<label for="email" class="input-label">Email Address</label>
									<input type="email" id="email" class="form-control" name="email" placeholder="demo@gmail.com" required="required">
								</div>
								<div class="form-group mb-4">
									<label for="password" class="input-label">Password</label>
									<input id="password" type="password" class="form-control" name="password" placeholder="********" required="required">
									<i toggle="#password" class="icon-eye field-icon"></i>
								</div>
								<div class="form-group mb-4">
									<div class="fxt-checkbox-area">
										<div class="custom-checkbox">
											<input id="checkbox1" type="checkbox">
											<label for="checkbox1">Keep me logged in</label>
										</div>
										<a href="forgot-password.html" class="switcher-text">Forgot Password</a>
									</div>
								</div>
								<div class="form-group mb-4">
									<button type="submit" class="fxt-btn-fill mb-0">Login to my account</button>
								</div>

								<div class="text-center mb-4 orDivider">
					              	<p class="fw-bold mb-0">OR</p>
					            </div>

					           	<div class="social-login mb-4">
						            <a class="fxt-btn-br ether mb-3" href="#!" role="button">Sign in With Ethereum Wallet 
                                        <i class="fab icon-eth me-2"></i></a>
						            <a class="fxt-btn-br google" href="{{ url('auth/google') }}" role="button">Sign in With Google 
                                        <i class="fab me-2">
                                            <img src="{{asset('assets/images/google.png')}}" width="56" height="19" alt="google" />
                                        </i>
                                    </a>
                                    <a class="fxt-btn-br google" href="#!" role="button">Sign in With Facebook 
                                        <i class="fa fa-facebook-square fab me-2">
                                            <!-- <img src="{{asset('assets/images/google.png')}}" width="56" height="19" alt="google" /> -->
                                       </i>
                                </a>
                                    <a class="fxt-btn-br facebook" href=""><i class="fab icon-eth me-2"></i>sjc,c</a>
					            
                                </div>
							</form>
						</div>
						<div class="fxt-footer">
							<p>New to blockbarster? <a href="{{ route('register') }}" class="switcher-text2 inline-text">Create Account</a></p>
						</div>
					</div>
				</div>
			</div>
            </div>
            </section>
@endsection