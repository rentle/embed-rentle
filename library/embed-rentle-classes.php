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
				<rentle-store <?php self::set_web_component_attributes( $attributes ); ?> />
				<?php
			}
			?>
		</div>
		<?php
	}

	public static function set_web_component_attributes( $attributes ) {
		if ( ! empty( $attributes['shopId'] ) ) {
			echo ' shop="' . esc_attr( $attributes['shopId'] ) . '"';
		}

		if ( ! empty( $attributes['locationId'] ) ) {
			echo ' store="' . esc_attr( $attributes['locationId'] ) . '"';
		}

		if ( ! empty( $attributes['categoryId'] ) ) {
			echo ' category="' . esc_attr( $attributes['categoryId'] ) . '"';
		}

		if ( ! empty( $attributes['productId'] ) ) {
			echo ' product="' . esc_attr( $attributes['productId'] ) . '"';
		}

		if ( ! empty( $attributes['height'] ) ) {
			echo ' height="' . esc_attr( $attributes['height'] ) . '"';
		}

		if ( isset( $attributes['disableAutoScroll'] ) && true === $attributes['disableAutoScroll'] ) {
			echo ' disableautoscroll="true"';
		}

		if ( isset( $attributes['disableHeightAnimation'] ) && true === $attributes['disableHeightAnimation'] ) {
			echo ' disableheightanimation="true"';
		}

		if ( isset( $attributes['locationsView'] ) && true === $attributes['locationsView'] ) {
			echo ' locationsview="true"';
		}

		// Add lang automatically
		echo ' lang="' . esc_attr( self::get_locale() ) . '"';
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

	private static function get_locale() {
		// Look for polylang installation
		if ( function_exists( 'pll_current_language' ) ) {
			return pll_current_language();
		}

		return substr( get_locale(), 0, 2 );
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

		if ( isset( $atts['disableautoscroll'] ) ) {
			$atts['disableAutoScroll'] = $atts['disableautoscroll'];
			unset( $atts['disableautoscroll'] );
		}

		if ( isset( $atts['disableheightanimation'] ) ) {
			$atts['disableHeightAnimation'] = $atts['disableheightanimation'];
			unset( $atts['disableheightanimation'] );
		}

		if ( isset( $atts['locationsview'] ) ) {
			$atts['locationsView'] = $atts['locationsview'];
			unset( $atts['locationsview'] );
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
