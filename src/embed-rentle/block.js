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
const {TextControl, SelectControl, PanelBody, PanelRow} = wp.components;

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
		paddingSize: {
			type: 'string'
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
