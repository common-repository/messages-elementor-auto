<?php
$mwp_url_icons = "https://www.mestresdowp.com.br/admin/images/";
$mwp_pages_admin = array(
	'config'=>array('name'=>'Configurações','url'=>''),
	'documentacao'=>array('name'=>'Documentação','url'=>'https://www.mestresdowp.com.br/messages-for-elementor/'),
	'plugins'=>array('name'=>'Plugins','url'=>'https://www.mestresdowp.com.br/desenvolvimento-de-plugins-wordpress/')
);
?>
<div class="wrap">
<h2></h2>
<div class="mwpbody">
	<div class="mwpbrcolone">
		<div class="mwp-title">
			<img src="<?php echo MEMWP_PLUGIN_ADMIN_URL; ?>assets/images/mwp-logotipo.png" width="" />
		</div>
		<div class="mwp-sections">
			<ul>
				<?php $i=0; foreach($mwp_pages_admin as $mwp_pages_key => $mwp_pages_value){ ?>
				<li class="<?php if($i==0){ echo 'mpcw-section-active'; } ?> <?php echo $mwp_pages_key; ?> box_menu">
				<?php if($mwp_pages_value['url']){ ?><a href="<?php echo $mwp_pages_value['url']; ?>" target="blank"><?php }else{ ?><a href="#<?php echo $mwp_pages_key; ?>" class="aba"><?php } ?>
					<h4><?php echo $mwp_pages_value['name']; ?></h4>
					<img src="<?php echo $mwp_url_icons; ?>ico-<?php echo $mwp_pages_key; ?>.png" width="30" />
				</a>
				</li>
				<?php $i++; } ?>
			</ul>
		</div>
	</div>
	<div class="mwpbrcoltwo">
	<?php $i=0; foreach($mwp_pages_admin as $mwp_pages_key => $mwp_pages_value){ ?>
	<div class="<?php echo $mwp_pages_key; ?> <?php if($i==0){ echo 'active'; } ?> box_section" id="<?php echo $mwp_pages_key; ?>"><?php include "html/".$mwp_pages_key.".php"; ?></div>
	<?php $i++; } ?>
	</div>
	<?php include "html/mestres-wp-sidebar.php"; ?>
</div>
</div>