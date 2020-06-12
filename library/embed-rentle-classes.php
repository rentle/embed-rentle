<?php

class Rentle_Content_Creator {
	public static function create_rentle_content( $attributes ) {
		?>
		<div class="<?php echo self::get_classes( $attributes ) ?>">
			<?php
			if ( empty( $attributes['shopId'] ) || empty( $attributes['locationId'] ) ) {
				self::errorrr();
			} else {
				?>
				<iframe width="100%" height="100%" src="<?php echo self::create_iframe_src( $attributes ) ; ?>"></iframe>
				<?php
			}
			?>
		</div>
		<?php
	}

	private static function get_classes( $attributes ) {
		$array = array( 'wp-block-embed-rentle-shop-block' );

		// Look for align property
		if ( ! empty( $attributes['align'] ) ) {
			$array[] = 'align' . $attributes['align'];
		}

		// Look for padding size
		if ( ! empty( $attributes['paddingSize'] ) ) {
			$array[] = $attributes['paddingSize'];
		} else {
			$array[] = 'medium-padding';
		}

		// Look for custom block classnames inserted to block
		if ( ! empty( $attributes['className'] ) ) {
			$array[] = $attributes['className'];
		}

		return implode( ' ', $array );
	}

	public static function create_iframe_src( $attributes ) {
		$url = "https://rentle.shop/${attributes['shopId']}/${attributes['locationId']}/";

		if ( ! empty( $attributes['categoryId'] ) ) {
			$url .= "categories/${attributes['categoryId']}/";

			if ( ! empty( $attributes['productId'] ) ) {
				$url .= "products/${attributes['productId']}";
			}
		}

		return $url;
	}

	private static function errorrr() {
		echo '<p>' . __( 'Can\'t create iframe. Shop and location ID need to be specified.' ) . '</p>';
	}
}
