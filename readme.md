# Embed Twice Commerce WP plugin

## Requirements
Twice Commerce account needed.

## How to use
Once plugin is activated, Twice Commerce shop block can be added via Gutenberg blocks. Plugin can be used also via shortcode, see below.

Block has few settings when it's selected:
- shop id (mandatory)
- location
- category
- product
- height
- disable auto scroll
- disable height animation
- locations view
- padding options
- custom class can be added to Gutenberg editor

As said, only shop id/name is mandatory. You can customise the output by defining more settings, such as location, category and/or product.

### Using shortcode

Following shortcode can be used: `[twice_commerce_shop]`

Shortcode can take different attributes:
- `shop` ==> Your Twice Commerce shop id/name
- `location` ==>  Your Twice Commerce location id/name
- `category` ==> category id you want to show
- `product` ==> specific product you want to show
- `padding` ==> vertical padding of the shop block. Can be one of the following: `no-padding`, `small-padding`, `medium-padding`, `large-padding`
- `height` ==> height of the shop, example `100%` or `700px` or `100vh`
- `disableautoscroll` ==> set to true, if you want to disable auto scroll
- `disableheightanimation` ==> set to true, if you want to disable height animation
- `locationsview` => set to true, if you want to list all store options
- `class` ==> if you want to wrap the element to custom class

Example: `[twice_commerce_shop shop="myshop" location="mylocation"]` ==> would show Twice Commerce iframe from the selected location.

### Dev instructions

This plugin is made using @wordpress/create-block. Use following commands to make dev work and build.

`npm start` ==> to start dev work and watch for changes

`npm run build` => build js/css for production
