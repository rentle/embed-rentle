import {__} from '@wordpress/i18n';
import {useBlockProps, InspectorControls} from '@wordpress/block-editor';
import {TextControl, ToggleControl, SelectControl, PanelBody, PanelRow} from "@wordpress/components";

/**
 * Lets webpack process CSS, SASS or SCSS files referenced in JavaScript files.
 * Those files can contain any CSS code that gets applied to the editor.
 *
 * @see https://www.npmjs.com/package/@wordpress/scripts#using-css
 */
import './editor.scss';


// Import from lib
import {validteFields} from "./lib/validation";
import TwiceCommerceLogo from "./lib/twice-commerce-logo";

/**
 * The edit function describes the structure of your block in the context of the
 * editor. This represents what the editor will render when the block is used.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/block-api/block-edit-save/#edit
 *
 * @return {Element} Element to render.
 */
export default function Edit({attributes, setAttributes}) {
	return (
		<>
			<InspectorControls>
				<PanelBody>
					<PanelRow>
						<TextControl
							value={attributes.shopId}
							type="string"
							onChange={(value) => setAttributes({shopId: value})}
							placeholder={__("Shop ID", "embed-rentle")}
							label={__("Shop ID", "embed-rentle")}
							__next40pxDefaultSize={true}
							__nextHasNoMarginBottom={true}
						/>
					</PanelRow>
					<PanelRow>
						<TextControl
							value={attributes.locationId}
							type="string"
							onChange={(value) => setAttributes({locationId: value})}
							placeholder={__("Location ID", "embed-rentle")}
							label={__("Location ID", "embed-rentle")}
							__next40pxDefaultSize={true}
							__nextHasNoMarginBottom={true}
						/>
					</PanelRow>
					<PanelRow>
						<TextControl
							value={attributes.categoryId}
							type="string"
							onChange={(value) => setAttributes({categoryId: value})}
							placeholder={__("Category ID", "embed-rentle")}
							label={__("Category ID", "embed-rentle")}
							__next40pxDefaultSize={true}
							__nextHasNoMarginBottom={true}
						/>
					</PanelRow>
					<PanelRow>
						<TextControl
							value={attributes.productId}
							type="string"
							onChange={(value) => setAttributes({productId: value})}
							placeholder={__("Product ID", "embed-rentle")}
							label={__("Product ID", "embed-rentle")}
							__next40pxDefaultSize={true}
							__nextHasNoMarginBottom={true}
						/>
					</PanelRow>
					<PanelRow>
						<TextControl
							value={attributes.height}
							type="string"
							onChange={(value) => setAttributes({height: value})}
							placeholder={__("Height", "embed-rentle")}
							label={__("Height", "embed-rentle")}
							help={__("If you want to define custom height for the block, define it here. Example 100% or 800px.", "embed-rentle")}
							__next40pxDefaultSize={true}
							__nextHasNoMarginBottom={true}
						/>
					</PanelRow>
					<PanelRow>
						<ToggleControl
							label={__("Disable auto scroll", "embed-rentle")}
							checked={attributes.disableAutoScroll}
							help={__("By default, your website user is automatically scrolled to the top of the embedded store when the page changes or a dialog is shown inside the embed. This improves user experience in most cases, but you can disable this by enabling this setting.", "embed-rentle")}
							onChange={() =>
								setAttributes({
									disableAutoScroll: !attributes.disableAutoScroll,
								})
							}
							__nextHasNoMarginBottom={true}
						/>
					</PanelRow>
					<PanelRow>
						<ToggleControl
							label={__("Disable height animation", "embed-rentle")}
							checked={attributes.disableHeightAnimation}
							help={__("By default, when the height of the embedded store changes, the height is animated to its new value to prevent stutter. You can disable by enabling this setting.", "embed-rentle")}
							onChange={() =>
								setAttributes({
									disableHeightAnimation: !attributes.disableHeightAnimation,
								})
							}
							__nextHasNoMarginBottom={true}
						/>
					</PanelRow>
					<PanelRow>
						<ToggleControl
							label={__("Locations view", "embed-rentle")}
							checked={attributes.locationsView}
							help={__("If you have multiple stores and want to display all the store options for the customer, enable this setting.", "embed-rentle")}
							onChange={() =>
								setAttributes({locationsView: !attributes.locationsView})
							}
							__nextHasNoMarginBottom={true}
						/>
					</PanelRow>
					<PanelRow>
						<SelectControl
							label={__("Padding for block", "embed-rentle")}
							help={__("This is for classic themes. For FSE-themes, look for styles tab in the block settings to define margins and paddings.", "embed-rentle")}
							value={attributes.paddingSize}
							options={[
								{label: __("No padding", "embed-rentle"), value: "no-padding"},
								{label: __("Small padding", "embed-rentle"), value: "small-padding"},
								{label: __("Medium padding", "embed-rentle"), value: "medium-padding"},
								{label: __("Large padding", "embed-rentle"), value: "large-padding"},
							]}
							onChange={(value) => setAttributes({paddingSize: value})}
							__next40pxDefaultSize={true}
							__nextHasNoMarginBottom={true}
						/>
					</PanelRow>
				</PanelBody>
			</InspectorControls>
			<div {...useBlockProps()}>
				{TwiceCommerceLogo()}
				{!attributes.shopId &&
					validteFields(
						attributes.shopId,
						attributes.locationId,
						attributes.categoryId,
						attributes.productId,
					) && (
						<p className={"wp-block-embed-rentle-shop-block__warning"}>
							{__("You need to define shop id.", "embed-rentle")}
						</p>
					)}
				{attributes.shopId &&
					!validteFields(
						attributes.shopId,
						attributes.locationId,
						attributes.categoryId,
						attributes.productId,
					) && (
						<p className={"wp-block-embed-rentle-shop-block__warning"}>
							{__("There is something wrong with the settings. Shop, location, category or product ID should include only letters or numbers.", "embed-rentle")}
						</p>
					)}
				{attributes.shopId &&
					validteFields(
						attributes.shopId,
						attributes.locationId,
						attributes.categoryId,
						attributes.productId,
					) && (
						<p>
							{__("Your widget is ready. Just preview the page and see it in action.", "embed-rentle")}
						</p>
					)}
			</div>
		</>
	);
}
