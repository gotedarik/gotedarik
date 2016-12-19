
<div class="container">
	<div class="block block-breadcrumbs">
		<ul>
			<li class="home">
				<a href="<?=Yii::app()->createUrl("site/index")?>"><i class="fa fa-home"></i></a>
				<span></span>
			</li>
			<li>Üye ol</li>
		</ul>
	</div>
		<!-- block category -->
		<div class="block block-category">
			<div class="block-head">
				<ul class="nav-tab">
					<li class="<?php if(!isset($_GET["login"])){?>active<?php }?>"><a data-toggle="tab" href="#tab-categories">Üye ol</a></li>
					<li class="<?php if(isset($_GET["login"]) && $_GET["login"]==2){?>active<?php }?>"><a data-toggle="tab" href="#tab-guarantee">Tedarikçi ol</a></li>
				</ul>
			</div>
			<div class="block-inner">
				<div class="tab-container">
					<div id="tab-categories" class="tab-panel <?php if(!isset($_GET["login"])){?>active<?php }?>">
						<div class="box-border">
							<h4>Üyemiz ol</h4>
							<hr>
							<p>
								<label>Adınız Soyadınız (*)</label>
								<input type="text"  id="user_register_name" value="" />
							</p>
							<p id="user_register_error_name" class="alert alert-danger error_system" role="alert"></p>
							<p>
								<label>Email adresiniz (*)</label>
								<input type="text" id="user_register_email" />
							</p>
							<p id="user_register_error_email" class="alert alert-danger error_system" role="alert"></p>
							<p>
								<label>Email adresiniz (Tekrar) (*)</label>
								<input type="text" id="user_register_remail" />
							</p>
							<p id="user_register_error_remail" class="alert alert-danger error_system" role="alert"></p>
							<p>
								<label>Şifreniz (*)</label>
								<input type="password"  id="user_register_password"  />
							</p>
							<p id="user_register_error_password" class="alert alert-danger error_system" role="alert"></p>



							<p id="user_register_error" class="alert alert-danger error_system" role="alert"></p>

							<p>
								<button onclick="userregister()" name="register" class="button"><i class="fa fa-lock"></i> Üye ol</button>
							</p>
						</div>
					</div>
					<div id="tab-guarantee" class="tab-panel <?php if(isset($_GET["login"]) && $_GET["login"]==2){?>active<?php }?>">
						<div class="box-border">
							<h4>Tedarikçimiz ol</h4>
							<hr>
							<p>
								<label>Adınız Soyadınız (*)</label>
								<input type="text"  id="supplier_register_name" value="" />
							</p>
							<p id="supplier_register_error_name" class="alert alert-danger error_system" role="alert"></p>
							<p>
								<label>Email adresiniz (*)</label>
								<input type="text" id="supplier_register_email" />
							</p>
							<p id="supplier_register_error_email" class="alert alert-danger error_system" role="alert"></p>
							<p>
								<label>Email adresiniz (Tekrar) (*)</label>
								<input type="text" id="supplier_register_remail" />
							</p>
							<p id="supplier_register_error_remail" class="alert alert-danger error_system" role="alert"></p>
							<p>
								<label>Şifreniz (*)</label>
								<input type="password"  id="supplier_register_password"  />
							</p>
							<p id="supplier_register_error_password" class="alert alert-danger error_system" role="alert"></p>



							<p id="supplier_register_error" class="alert alert-danger error_system" role="alert"></p>

							<p>
								<button onclick="supplierregister()" name="register" class="button"><i class="fa fa-lock"></i> Tedarikçi ol</button>
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- ./block category -->

	</div>
