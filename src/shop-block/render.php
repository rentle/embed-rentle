<?php
// Look for padding attribute and apply to main class, if found
$padding = $attributes['paddingSize'];
?>

<div <?php echo get_block_wrapper_attributes( [ 'class' => ! empty( $padding ) ? esc_attr( $padding ) : '' ] ); // xss ok ?>>
	<?php
	if ( empty( $attributes['shopId'] ) ) {
		Rentle_Content_Creator::errorrr();
	} else {
		?>
		<rentle-store <?php Rentle_Content_Creator::set_web_component_attributes( $attributes ); ?> />
		<?php
	}
	?>
</div>
