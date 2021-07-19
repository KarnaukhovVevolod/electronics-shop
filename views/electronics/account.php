<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;
?>

<!doctype html>
<html class="no-js" lang="">
    
    <body>

        <!-- Add your site or application content here -->

		<!-- HEADER-AREA START -->
		
		<!-- HEADER AREA END -->
		<!-- START PAGE-CONTENT -->
		<section class="page-content">
                                    
			<!-- Start Account-Create-Area -->
			<div class="account-create-area">
				<div class="container">
                                    <!--
					<div class="row">
						<div class="col-md-12">
							<ul class="page-menu">
								<li><a href="index.html">Home</a></li>
								<li class="active"><a href="account.html">Account</a></li>
							</ul>
						</div>
					</div>
                                    -->
                                    <?php $this->params['crumbs'][] = 'Создать Аккаунт' ?>
					<div class="row">
						<div class="col-md-12">
							<div class="area-title">
								<h3 class="title-group gfont-1">Создать аккаунт</h3>
							</div>
						</div>
					</div>
                                        <!-- flash -сообщение -->
                                    <?php if(Yii::$app->session->hasFlash('registration_message')): ?>
                                        <div class="alert alert-success alert-dismissable" role="alert">
                                            <button type="button" class="close close_flash close-alert" data-dimiss="alert" aria-label="Close"><span arria-hidden="true">&times;</span></button>
                                            <?= Yii::$app->session->getFlash('registration_message')  ?>
                                        </div>
                                    <?php endif; ?>
                                        
					<div class="account-create">
                                            <?php $registr_form = ActiveForm::begin(); ?>
						<form action="#">
							<div class="row">
								<div class="col-md-12">
                                                                    <?php ?>
									<div class="account-create-box">
										<h2 class="box-info">Персональная информация</h2>
										<div class="row">
											<div class="col-sm-4 col-xs-12">
												<div class="single-create">
													<!--<p>First Name <sup>*</sup></p>-->
													<!--<input class="form-control" type="text" name="firstname"/>-->
                                                                                                        <?= $registr_form->field($registration_form, 'first_name')->textInput(['maxlength' => true]) ?> 
												</div>
											</div>
											<div class="col-sm-4 col-xs-12">
												<div class="single-create">
													<!--<p>Last Name <sup>*</sup></p>-->
													<!--<input class="form-control" type="text" name="lastname"/> -->
                                                                                                        <?= $registr_form->field($registration_form, 'last_name')->textInput(['maxlength' => true]) ?>
												</div>
											</div>
											<div class="col-sm-4 col-xs-12">
												<div class="single-create">
													<!--<p>Email Address <sup>*</sup></p>-->
													<!--<input class="form-control" type="email" name="email"/>-->
                                                                                                        <?= $registr_form->field($registration_form, 'email')->textInput(['maxlength' => true]) ?>
												</div>
											</div>
                                                                                    <!--
											<div class="col-xs-12">
												<p class="for-newsletter"><input type="checkbox" /> Sign Up for Newsletter</p>
											</div>
                                                                                    -->
										</div>
									</div>
									<div class="account-create-box">
										<h2 class="box-info">Логин и пароль</h2>
										<div class="row">
                                                                                        <div class="col-md-4 col-sm-6 col-xs-12">
												<div class="single-create">
													<!--<p>Password <sup>*</sup></p>-->
													<!--<input class="form-control" type="password" name="firstname"/>-->
                                                                                                        <?= $registr_form->field($registration_form, 'login')->textInput(['maxlength' => true]) ?>
												</div>
											</div>
											<div class="col-md-4 col-sm-6 col-xs-12">
												<div class="single-create">
													<!--<p>Password <sup>*</sup></p>-->
													<!--<input class="form-control" type="password" name="firstname"/>-->
                                                                                                        <?= $registr_form->field($registration_form, 'password')->passwordInput(['maxlength' => true]) ?>
												</div>
											</div>
											<div class="col-md-4 col-sm-6 col-xs-12">
												<div class="single-create">
                                                                                                        <!--<p>Confirm Password <sup>*</sup></p>-->
													<!--<input class="form-control" type="password" name="firstname"/>-->
                                                                                                        <?= $registr_form->field($registration_form, 'confirm_password')->passwordInput(['maxlength' => true]) ?>
												</div>
											</div>
										</div>
									</div>
									<div class="submit-area">
										<p class="required text-right">Необходимо заполнить все поля</p>
										<!--<button type="submit" class="btn btn-primary floatright">submit</button>-->
                                                                                <div class="form-group">
                                                                                    <?= Html::submitButton('Отправить',['class'=>'btn btn-primary floatright']) ?>
                                                                                </div>
										<!--<a href="login.html" class="float-left"><span><i class="fa fa-angle-double-left"></i></span> Back</a>-->
									</div>
                                                                    <?php ?>
								</div>
							</div>
						</form>
                                            <?php ActiveForm::end(); ?>
					</div>
				</div>
			</div>
			<!-- End Account-Create-Area -->
			<!-- START BRAND-LOGO-AREA -->
			
			<!-- END BRAND-LOGO-AREA -->
			<!-- START SUBSCRIBE-AREA -->
			
			<!-- END SUBSCRIBE-AREA -->
		</section>
		<!-- END PAGE-CONTENT -->
		<!-- FOOTER-AREA START -->
		
		<!-- FOOTER-AREA END -->
                <!-- jquery
		============================================ -->		
        <script src="/js/jquery-1.11.3.min.js"></script>
		<!-- bootstrap JS
		============================================ -->		
        <script src="/js/bootstrap.min.js"></script>
		<!-- wow JS
		============================================ -->		
        <script src="/js/wow.min.js"></script>
		<!-- meanmenu JS
		============================================ -->		
        <script src="/js/jquery.meanmenu.js"></script>
		<!-- owl.carousel JS
		============================================ -->		
        <script src="/js/owl.carousel.min.js"></script>
		<!-- scrollUp JS
		============================================ -->		
        <!--<script src="/js/jquery.scrollUp.min.js"></script>-->
        <!-- countdon.min JS
		============================================ -->		
        <script src="/js/countdon.min.js"></script>
        <!-- jquery-price-slider js
		============================================ --> 
        <script src="/js/jquery-price-slider.js"></script>
        <!-- Nivo slider js
		============================================ --> 		
		<script src="/js/jquery.nivo.slider.js" type="text/javascript"></script>
		<!-- plugins JS
		============================================ -->		
        <script src="/js/plugins.js"></script>
		<!-- main JS
		============================================ -->		
        <script src="/js/main.js"></script>
        

    </body>
</html>
