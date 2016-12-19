<div id="content" class="site-content" tabindex="-1">
	<div class="container">

		<div id="primary" class="content-area">
			<main id="main" class="site-main">
				<article class="post-2508 page type-page status-publish hentry" id="post-2508">
					<div itemprop="mainContentOfPage" class="entry-content">
						<div class="map" style="width: 100vw; position: relative; margin-left: -50vw; left: 50%; margin-bottom: 3em;">
							<?php if(!empty($model[0]["maps"])) :?>
							<iframe height="514" allowfullscreen="" style="border: 0px none; pointer-events: none;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2481.593303940039!2d-0.15470444843858283!3d51.53901886611164!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x48761ae62edd5771%3A0x27f2d823e2be0249!2sPrincess+Rd%2C+London+NW1+8JR%2C+UK!5e0!3m2!1sen!2s!4v1458827996435"></iframe>
							<?php endif; ?>
						</div>
						<div class="vc_row-full-width vc_clearfix"></div>
						<div class="vc_row wpb_row vc_row-fluid">
							<div class="contact-form wpb_column vc_column_container vc_col-sm-6 col-sm-6">
								<div class="vc_column-inner ">
									<div class="wpb_wrapper">
										<div class="wpb_text_column wpb_content_element ">
											<div style="font-size: 16px;" class="wpb_wrapper">
												<h2 class="contact-page-title">İletişim</h2>
												<?php foreach ($model as $key => $value) : ?>
												<p><strong>Organizetedarik</strong></p>
												<p><?=$value->address?></p>
												<p><i class="fa fa-phone" aria-hidden="true"></i> &nbsp; <?=$value->phone_number?></p>
												<p><i class="fa fa-fax" aria-hidden="true"></i> &nbsp; <?=$value->fax_number?></p>
												<p><i class="fa fa-envelope" aria-hidden="true"></i> &nbsp; <a
														href="mailto:<?=$value->email_address?>"><?=$value->email_address?></a></p>
												<?php endforeach; ?>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="store-info wpb_column vc_column_container vc_col-sm-6 col-sm-6">
								<div class="vc_column-inner ">
									<div style="font-size: 16px;"  class="wpb_wrapper">
										<div class="wpb_text_column wpb_content_element ">
											<div class="wpb_wrapper wpb_wrapper1">
												<h2 class="contact-page-title">Sosyal Medya'da bize ulaşın</h2>
												<ul>
													<?php $modelSocial = Func::getSocial(); foreach ($modelSocial as $key => $value) : ?>
														<li><a target="_blank" class="fa fa-<?=strtolower($value->socialnetwork_name);?>  <?=strtolower($value->socialnetwork_name);?>" href="<?=$value->socialnetwork_url;?>"></a></li>
													<?php endforeach; ?>
												</ul>
												<div class="clearfix"></div>
												<h3>Kariyer Fırsatları</h3>
												<p class="inner-right-md">Kariyer fırsatlarından yararlanmak için CV'nizi bize mail atın: <a href="mailto:kariyer@organizetedarik.com">kariyer@organizetedarik.com</a></p>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</article>
			</main><!-- #main -->
		</div><!-- #primary -->
	</div><!-- .container -->
</div><!-- #content -->