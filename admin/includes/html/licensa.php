		<div class="mwpsectiontitle">
			<h2>
			<div class="mpwsectiontitleico"><img src="<?php echo $mwp_url_icons; ?>ico-licensa.png" width="30" /></div>
			<strong>Licença</strong>
			</h2>
		</div>
		<div class="mwpsectioncontent">
			<form method="post" action="options.php#licensa" class="conect-settings">
			<?php if(get_option('cwmp_license_memwp_active')==true){ ?>
			<div class="mwp-box">
				<p class="col col-1-1">Preencha o campo abaixo informando o e-mail que utilizou para comprar a licença.</p>
				<p class="col col-1-2 text">
				<strong><?php echo esc_html(get_option('cwmp_license_memwp_email')); ?></strong>
				<input type="hidden" name="cwmp_license_memwp_email" placeholder="E-mail" value="<?php echo esc_html(get_option('cwmp_license_memwp_email')); ?>" />
				<input type="hidden" name="cwmp_license_memwp_product" placeholder="E-mail" value="6316" />
				<input type="hidden" name="cwmp_license_memwp_url" placeholder="E-mail" value="<?php echo bloginfo('url'); ?>" />
				</p>
				<p class="col col-2-2 texto green">
				<strong>Sua licença está ativa.</strong>
				</p>
			</div>
			<input type="submit" name="Submit" class="mwpbuttonupdatesection" id="memp_license_memwp_button_remove" value="Desconectar" />
			<?php }else{ ?>
			<div class="mwp-box">
				<p class="col col-1-1">Preencha o campo abaixo informando o e-mail que utilizou para comprar a licença.</p>
				<p class="col col-1-2">
				<input type="text" name="cwmp_license_memwp_email" placeholder="E-mail" value="<?php echo esc_html(get_option('cwmp_license_memwp_email')); ?>" />
				<input type="hidden" name="cwmp_license_memwp_product" placeholder="E-mail" value="6316" />
				<input type="hidden" name="cwmp_license_memwp_url" placeholder="E-mail" value="<?php echo bloginfo('url'); ?>" />
				</p>
				<p class="col col-2-2 texto red">
				<strong>Ative sua licença, <a href="https://www.mestresdowp.com.br/checkout-woocommerce-mestres-do-wp/">registre sua licença</a>.</strong>
				</p>
			</div>
			<input type="submit" name="Submit" class="mwpbuttonupdatesection" id="memp_license_memwp_button" value="Conectar" />
			<?php } ?>
			</form>
		<?php include "mestres-wp-copyright.php"; ?>
		</div>