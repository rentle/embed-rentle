// Import classnames
import classNames from 'classnames';

//  Import CSS.
import './editor.scss';
import './style.scss';

// Import Icon
import Logo from '../rentle-logo';
import BlockLogo from "../block-logo";

//Import WP stuff
const {__} = wp.i18n; // Import __() from wp.i18n
const {registerBlockType} = wp.blocks; // Import registerBlockType() from wp.blocks
const {InspectorControls} = wp.blockEditor;
const {Fragment, RawHTML} = wp.element;
const {TextControl, ToggleControl, SelectControl, PanelBody, PanelRow} = wp.components;

//Import lib
import {validateSingleField, validteFields} from './lib/validation'

/**
 * Registering rentle shop block
 */
registerBlockType('embed-rentle/shop-block', {
	title: __('Rentle shop block'), // Block title.
	icon: BlockLogo(),
	category: 'widgets',
	keywords: [
		__('rentle'),
	],

	// Enable or disable support for low-level features
	supports: {
		html: false,
		reusable: true,
		align: ['full', 'wide']
	},

	// Set up data model for custom block
	attributes: {
		shopId: {
			type: 'string'
		},
		locationId: {
			type: 'string'
		},
		categoryId: {
			type: 'string'
		},
		productId: {
			type: 'string'
		},
		height: {
			type: 'string'
		},
		paddingSize: {
			type: 'string'
		},
		disableAutoScroll: {
			type: 'boolean',
			default: false
		},
		disableHeightAnimation: {
			type: 'boolean',
			default: false
		},
		locationsView: {
			type: 'boolean',
			default: false
		}
	},

	edit: props => {
		// Pull out the props we'll use
		const {attributes, className, setAttributes} = props;

		return (
			<Fragment>
				<InspectorControls>
					<PanelBody>
						<PanelRow>
							<TextControl
								value={attributes.shopId}
								type="string"
								onChange={value => setAttributes({shopId: value})}
								placeholder="Shop ID"
								label="Shop ID"
							/>
						</PanelRow>
						<PanelRow>
							<TextControl
								value={attributes.locationId}
								type="string"
								onChange={value => setAttributes({locationId: value})}
								placeholder="Location ID"
								label="Location ID"
							/>
						</PanelRow>
						<PanelRow>
							<TextControl
								value={attributes.categoryId}
								type="string"
								onChange={value => setAttributes({categoryId: value})}
								placeholder="Category ID"
								label="Category ID"
							/>
						</PanelRow>
						<PanelRow>
							<TextControl
								value={attributes.productId}
								type="string"
								onChange={value => setAttributes({productId: value})}
								placeholder="Product ID"
								label="Product ID"
							/>
						</PanelRow>
						<PanelRow>
							<TextControl
								value={attributes.height}
								type="string"
								onChange={value => setAttributes({height: value})}
								placeholder="Height"
								label="Height"
								help={`If you want to define custom height for the block, define it here. Example 100% or 800px.`}
							/>
						</PanelRow>
						<PanelRow>
							<ToggleControl
								label={__('Disable auto scroll')}
								checked={ attributes.disableAutoScroll }
								help={`By default, your website user is automatically scrolled to the top of the embedded store when the page changes or a dialog is shown inside the embed. This improves user experience in most cases, but you can disable this by enabling this setting.`}
								onChange={ () => setAttributes( { disableAutoScroll: ! attributes.disableAutoScroll } ) }
							/>
						</PanelRow>
						<PanelRow>
							<ToggleControl
								label={__('Disable height animation')}
								checked={ attributes.disableHeightAnimation }
								help={`By default, when the height of the embedded store changes, the height is animated to its new value to prevent stutter. You can disable by enabling this setting.`}
								onChange={ () => setAttributes( { disableHeightAnimation: ! attributes.disableHeightAnimation } ) }
							/>
						</PanelRow>
						<PanelRow>
							<ToggleControl
								label={__('Locations view')}
								checked={ attributes.locationsView }
								help={`If you have multiple stores and want to display all the store options for the customer, enable this setting.`}
								onChange={ () => setAttributes( { locationsView: ! attributes.locationsView } ) }
							/>
						</PanelRow>
						<PanelRow>
							<SelectControl
								label={__('Padding')}
								value={attributes.paddingSize}
								options={[
									{label: 'No padding', value: 'no-padding'},
									{label: 'Small padding', value: 'small-padding'},
									{label: 'Medium padding', value: 'medium-padding'},
									{label: 'Large padding', value: 'large-padding'},
								]}
								onChange={value => setAttributes({paddingSize: value})}
							/>
						</PanelRow>
					</PanelBody>
				</InspectorControls>
				<div className={classNames(className, attributes.paddingSize)}>
					{Logo()}
					{(!attributes.shopId && validteFields(attributes.shopId, attributes.locationId, attributes.categoryId, attributes.productId)) &&
					<p className={'wp-block-embed-rentle-shop-block__warning'}>{__('You need to define shop id.')}</p>}
					{(attributes.shopId && ! validteFields(attributes.shopId, attributes.locationId, attributes.categoryId, attributes.productId)) &&
					<p className={'wp-block-embed-rentle-shop-block__warning'}>{__('There is something wrong with the settings. Shop, location, category or product ID should include only letters or numbers.')}</p>}
					{(attributes.shopId && validteFields(attributes.shopId, attributes.locationId, attributes.categoryId, attributes.productId)) &&
					<p>{__('Your widget is ready. Just preview the page and see it in action.')}</p>}
				</div>
			</Fragment>
		)
	},

	save: props => {
		//output via PHP
		return null;
	}
});
