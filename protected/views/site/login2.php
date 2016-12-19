<div class="container">
	<div class="row">
		<div class="block block-breadcrumbs">
			<ul>
				<li class="home">
					<a href="<?=Yii::app()->createUrl("site/index")?>"><i class="fa fa-home"></i></a>
					<span></span>
				</li>
				<li>Tedarikçi Girişi Yap</li>
			</ul>
		</div>
		<div class="main-page">
			<h1 class="page-title">Tedarikçi girişi</h1>
			<div class="page-content">
				<div class="row">
					<div class="col-sm-6">
						<div class="box-border">
							<h4>Hala Tedarikçimiz Değil misiniz ?</h4>
							<p>
								<small>Tedarikçimiz olmak için lütfen <b>Tedarikçimiz olun</b> butonuna tıklayın.</small>
							</p>
							<p>
								<a href="<?=Yii::app()->createUrl("site/uyeol",array("login" => 2))?>" class="button"><i class="fa fa-users"></i> Tedarikçimiz olun</a>
							</p>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="box-border">
							<h4>Zaten tedarikçi misin?</h4>
							<p>
								<label>Email Adresiniz (*)</label>
								<input type="text" id="supplier_login_username" value="" />
							</p>
							<p>
								<label>Şifreniz (*)</label>
								<input type="password" id="supplier_login_password" />
							</p>
							<p  class="pull-left">
								<a href="#">Şifremi Unuttum?</a>
							</p>
							<p class="pull-right">
								<input type="checkbox" id="supplier_login_rememberme" value="1" /> Beni Hatırla
							</p>
							<div class="clearfix"></div>

							<p id="supplier_login_error" class="alert alert-danger error_system" role="alert"></p>

							<p>
								<button onclick="supplierlogin()" class="button"><i class="fa fa-lock"></i> Giriş yap</button>
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

</div>