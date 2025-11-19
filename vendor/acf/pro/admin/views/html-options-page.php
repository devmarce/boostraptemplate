<div class="wrap acf-settings-wrap">
	
	<h1><?php echo $page_title; ?></h1>
	
	<form id="post" method="post" name="post">
		
		<?php 
		
		// render post data
		acf_form_data(array(
			'screen'	=> 'options',
			'post_id'	=> $post_id,
		));
		
		wp_nonce_field( 'meta-box-order', 'meta-box-order-nonce', false );
		wp_nonce_field( 'closedpostboxes', 'closedpostboxesnonce', false );
		
		?>
		
		<div id="poststuff">
			
			<div id="post-body" class="metabox-holder columns-<?php echo 1 == get_current_screen()->get_columns() ? '1' : '2'; ?>">
				
				<div id="postbox-container-1" class="postbox-container">
					
					<?php do_meta_boxes('acf_options_page', 'side', null); ?>

				</div>
				
				<div id="postbox-container-2" class="postbox-container">
					
					<?php do_meta_boxes('acf_options_page', 'normal', null); ?>
					
				</div>
				<?php if (function_exists('central_get_banners')): ?>
					<?php
					/*
					** Si es el admin menu de pagina de inicio:
					*/
					$banners = central_get_banners();
					if (get_current_screen()->parent_base == 'acf-options-pagina-de-inicio' && $banners): ?>
						<div class="postbox" style="float: left; width: 100%;">
							<h2 class="hndle ui-sortable-handle"><span>Banners de la central</span></h2>
							<div class="inside">
								<?php foreach ($banners as $key => $value): ?>
									<a href="#" id="add-gallery-image" class="central-image js-ajax-upload-<?php echo $key; ?>" data-url="<?php echo $value['url']; ?>">
										<img src="<?php echo $value['sizes']['thumbnail']; ?>">
									</a>

									<script>
										jQuery(document).ready(function($){
											$('.js-ajax-upload-<?php echo $key; ?>').on('click', function(e){
												e.preventDefault();
												var t = $(this);
												t.addClass('downloading');
												console.log('Descargando imagen...');
												var data = {
													action: 'upload_my_image',
													url: '<?php echo $value['url']; ?>',
													title: '<?php echo $value['title']; ?>'
												};
												$.post(ajaxurl, data, function(response) {
													var data = $.parseJSON(response)
													console.log(data);
													var template = `
													<div class="acf-gallery-attachment -image" data-id="`+data.id+`">
													<input name="acf[field_5b33af0bf67b2][]" value="`+data.id+`" type="hidden">
													<div class="margin">
													<div class="thumbnail">
													<img src="`+'<?php echo $value['sizes']['thumbnail']; ?>'+`" alt="" title="broken-car-old-2071">
													</div>
													</div>
													<div class="actions">
													<a class="acf-icon -cancel dark acf-gallery-remove" href="#" data-id="`+data.id+`" title="Remove"></a>
													</div>
													</div>
													`;
													$('#acf-field_5b33af0bf67b2 .acf-gallery-attachments').append(template);
													t.removeClass('downloading');
												});
											});
										});
									</script>
								<?php endforeach; ?>
							</div>
						</div>

						<style>
						.central-image img{
							width: 150px;
							height: 150px; 
							object-fit: cover;
							object-position: center;
						}
						.central-image{
							display: inline-block;
							position: relative;
							line-height: 1;
							outline: none;
						}
						.central-image.downloading{
							pointer-events: none;
						}
						.central-image.downloading:before{
							content: '';
							position: absolute;
							top: 0;
							left: 0;
							width: 100%;
							height: 100%;
							background-image: url('<?php echo get_template_directory_uri(); ?>/img/loading.gif');
							background-size: 50px;
							background-repeat: no-repeat;
							background-position: center;
							background-color: rgba(0, 0, 0, 0.6);
						}
						.central-image.downloading:after{
							content: 'Descargando imágen...';
							position: absolute;
							bottom: 15px;
							left: 0;
							right: 0;
							text-align: center;
							color: white;
							font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,Oxygen-Sans,Ubuntu,Cantarell,"Helvetica Neue",sans-serif;
						}
					</style>
				<?php endif; ?>

				<script>
					/* Disabled metabox drag */
					jQuery(document).ready( function($) {
						$('.meta-box-sortables').sortable({
							disabled: true
						});

						$('.postbox .hndle').css('cursor', 'pointer');
					});
				</script>
			<?php endif; ?>


		</div>

		<br class="clear">

	</div>

</form>

</div>