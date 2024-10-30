		<div class="mwpsectiontitle">
			<h2>
			<div class="mpwsectiontitleico"><img src="<?php echo $mwp_url_icons; ?>ico-config.png" width="30" /></div>
			<strong>Messages for Elementor</strong>
			</h2>
		</div>
		<div class="mwpsectioncontent">
			<h3>INTEGRAÇÃO</h3>
			<form method="post" action="options.php" class="conect-settings">
			<?php wp_nonce_field('update-options') ?>
			<div class="mwp-box">
				<p class="col col-1-3 text">
				<strong>ENDPOINT</strong>
				<input type="text" name="mwp_end_point" placeholder="END POINT" value="<?php echo esc_html(get_option('mwp_end_point')); ?>" />
				</p>
				<p class="col col-1-3 text">
				<strong>TOKEN</strong>
				<input type="text" name="mwp_key_api" placeholder="TOKEN API WHATSAPP" value="<?php echo esc_html(get_option('mwp_key_api')); ?>" />
				</p>
				<p class="col col-1-3">
					<strong>DDI</strong>
					<input type="number" name="mwp_whatsapp_ddi" placeholder="55" value="<?php echo esc_html(get_option('mwp_whatsapp_ddi')); ?>"  />
				</p>
				<?php if(get_option('mwp_end_point') AND get_option('mwp_key_api')){ ?>
				<p class="col col-1-1">Para utilizar é necessário contratar a <strong>API Whats Total</strong>. <a href="https://www.whatstotal.com.br/" target="blank">Clique aqui para conhecer</a>.</p>
				<?php } ?>
				<p class="col col-1-1 text">
				<input type="hidden" name="action" value="update" />
				<input type="hidden" name="page_options" value="mwp_whatsapp_ddi,mwp_end_point,mwp_key_api" />
				<input type="submit" name="Submit" class="mwpbuttonupdatesection" id="mwpbuttonupdatesection" value="Atualizar" />
				</p>
			</div>
			</form>
		<?php include "mestres-wp-copyright.php"; ?>
		</div>