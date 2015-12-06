<?php
/**
 * Single Product Meta
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $post, $product;

$cat_count = sizeof( get_the_terms( $post->ID, 'product_cat' ) );
$tag_count = sizeof( get_the_terms( $post->ID, 'product_tag' ) );

?>
<a class="product_meta">

	<?php do_action( 'woocommerce_product_meta_start' ); ?>

	<?php if ( wc_product_sku_enabled() && ( $product->get_sku() || $product->is_type( 'variable' ) ) ) : ?>

		<span class="sku_wrapper"><?php _e( 'SKU:', 'woocommerce' ); ?> <span class="sku" itemprop="sku"><?php echo ( $sku = $product->get_sku() ) ? $sku : __( 'N/A', 'woocommerce' ); ?></span></span>

	<?php endif; ?>

	<?php echo $product->get_categories( ', ', '<span class="posted_in">' . _n( 'Hãng:', 'Hãng:', $cat_count, 'woocommerce' ) . ' ', '</span>' ); ?>

	<?php echo $product->get_tags( ', ', '<span class="tagged_as">' . _n( 'Tag:', 'Tags:', $tag_count, 'woocommerce' ) . ' ', '</span>' ); ?>

	<?php do_action( 'woocommerce_product_meta_end' ); ?>
	<div class="contact-order">
		<h3>Liên hệ</h3>
		<p>Điện thoại: </p>
		<p>Email: </p>
		<p>Fax: </p>
	</div>

	<a href="javascript:void(0)" id="dathang">
		<span class="wanted-ads-link button-product">Đặt hàng</span>
	</a>
	
	<form action="" method="post" class="form-email-order">
		<span class="label">Họ tên: </span>
		<input type="text" class="text required" name="hoten" id="hoten" value="" /><br/>
		<span class="text error" id="hoten_error" ></span><br/>
		<span class="label">Email: </span>
		<input type="text" class="text required" name="email" id="email" value="" /><br/>
		<span class="text error" id="email_error" ></span><br/>
		<span class="label">Số điện thoại: </span>
		<input type="text" class="text required" name="sdt" id="sdt" value="" /><br/>
		<span class="text error" id="sdt_error" ></span><br/>
		<span class="label">Địa chỉ: </span>
		<input type="text" class="text required" name="diachi" id="diachi" value="" /><br/>
		<span class="text error" id="diachi_error"></span><br/>
		<span class="label loinhan">Lời nhắn: </span>
		<textarea rows="4" cols="50" name="loi_nhan" id="loi_nhan" >
		</textarea><br/>
		<span class="text" id="loi_nhan_error"></span>
		<input type="hidden" name="product_title" id="product_title" value="<?php echo $product->get_title() ?>" />
		<input type="hidden" name="product_sku" id="product_sku" value="<?php echo $product->get_sku() ?>" />
		<a href="javascript:void(0)" id="accept-wanted">
		<span class="button-product wanted-ads-link">Gửi email</span>
		</a>
		<p class="status_email"></p>
	</form>

</div>

<script type="text/javascript">
jQuery(function($){
	$('.form-email-order').hide();
	$('#dathang').click(function(){
		$('.form-email-order').toggle();
	});
	$('#accept-wanted').click(function(){
		var url = '<?php echo get_site_url() . "/wp-admin/admin-ajax.php"; ?>'; 
		var hoten = $('#hoten').val();
		var email = $('#email').val();
		var sdt = $('#sdt').val();
		var loinhan = $('#loi_nhan').val();
		var diachi = $('#diachi').val();
		var title = $('#product_title').val();
		var sku = $('#product_sku').val();
		var siteurl = '<?php echo the_permalink() ?>';
		var error = false;
		if(!(hoten) || hoten == ''){
			$('#hoten_error').html('Mời bạn nhập họ tên!');
			$('#hoten_error').fadeIn();
			error = true;
		}else{
			$('#hoten_error').fadeOut();
		}
		if(!(email) || email == ''){
			$('#email_error').html('Mời bạn nhập email!');
			$('#email_error').fadeIn();
			error = true;
		}else{
			$('#email_error').fadeOut();
		}
		if(!(sdt) || sdt == ''){
			$('#sdt_error').html('Mời bạn nhập số điện thoại!');
			$('#sdt_error').fadeIn();
			error = true;
		}else{
			$('#sdt_error').fadeOut();
		}
		if(!(loinhan) || loinhan == ''){
			$('#loi_nhan_error').html('Mời bạn nhập lời nhắn!');
			$('#loi_nhan_error').fadeIn();
			error = true;
		}else{
			$('#loi_nhan_error').fadeOut();
		}
		if(!(diachi) || diachi == ''){
			$('#diachi_error').html('Mời bạn nhập đia chỉ!');
			$('#diachi_error').fadeIn();
			error = true;
		}else{
			$('#diachi_error').fadeOut();
		}
		if(error == false){
			$.post(
			url, 
			{
				  'action': 'email_order',
				  'email': email,
				  'hoten': hoten,
				  'sdt': sdt,
				  'loinhan': loinhan,
				  'title': title,
				  'url': siteurl,
				  'diachi': diachi,
				  'sku': sku

			},
			function(response){
				$('.status_email').html("Gửi email thành công. Cảm ơn bạn.");
				$('#hoten').val("");
				$('#email').val("");
				$('#sdt').val("");
				$('#loi_nhan').val("");
				$('#diachi').val("");
			}
		);
		}
	});
});
</script>