<?php

class Rentle_Content_Creator {
	public static function create_rentle_content( $attributes ) {
		$attributes = self::change_keys( $attributes ); //if this is a shortcode render, need to modify keys
		?>
		<div class="<?php echo self::get_classes( $attributes ) ?>">
			<?php
			if ( empty( $attributes['shopId'] ) ) {
				self::errorrr();
			} else {
				?>
				<iframe width="100%" height="100%" src="<?php echo self::create_iframe_src( $attributes ); ?>"></iframe>
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
		$url = "https://rentle.shop/${attributes['shopId']}/";

		if ( ! empty( $attributes['locationId'] ) ) {
			$url .= "${attributes['locationId']}/";

			if ( ! empty( $attributes['categoryId'] ) ) {
				$url .= "categories/${attributes['categoryId']}/products/";

				if ( ! empty( $attributes['productId'] ) ) {
					$url .= "${attributes['productId']}/";
				}
			}
		}

		// Adding lang code
		$url .= self::setting_iframe_locale();

		return $url;
	}

	private static function setting_iframe_locale() {
		$string = '?lang=' . get_locale();

		// Look for polylang installation
		if ( function_exists( 'pll_current_language' ) ) {
			$string = '?lang=' . pll_current_language();
		}

		return $string;
	}

	private static function errorrr() {
		echo '<p>' . __( 'Can\'t create iframe. Shop ID need to be specified.' ) . '</p>';
	}

	/**
	 * Change keys in array since shortcode doesn't approve camelcase
	 * See: https://codex.wordpress.org/Shortcode_API#Handling_Attributes
	 *
	 * Attributes for shortcode:
	 * shop (shop name)
	 * location (location name)
	 * category (category name)
	 * product (product name)
	 * padding (padding size)
	 * class (custom class name)
	 *
	 * @param $atts
	 *
	 * @return mixed
	 */
	private static function change_keys( $atts ) {
		if ( isset( $atts['shop'] ) ) {
			$atts['shopId'] = $atts['shop'];
			unset( $atts['shop'] );
		}

		if ( isset( $atts['location'] ) ) {
			$atts['locationId'] = $atts['location'];
			unset( $atts['location'] );
		}

		if ( isset( $atts['category'] ) ) {
			$atts['categoryId'] = $atts['category'];
			unset( $atts['category'] );
		}

		if ( isset( $atts['product'] ) ) {
			$atts['productId'] = $atts['product'];
			unset( $atts['product'] );
		}

		if ( isset( $atts['padding'] ) ) {
			$atts['paddingSize'] = $atts['padding'];
			unset( $atts['padding'] );
		}

		if ( isset( $atts['class'] ) ) {
			$atts['className'] = $atts['class'];
			unset( $atts['class'] );
		}

		return $atts;
	}
}
