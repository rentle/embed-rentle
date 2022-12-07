# Embed Rentle WP plugin

## Requirements
Rentle.io account needed.

## How to use
Once plugin is activated, rentle shop block can be added via Gutenberg blocks. Plugin can be used also via shortcode, see below.

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

Following shortcode can be used: `[rentle_shop]`

Shortcode can take different attributes:
- `shop` ==> Your rentle.io shop id/name
- `location` ==>  Your rentle.io location id/name
- `category` ==> category id you want to show
- `product` ==> specific product you want to show
- `padding` ==> vertical padding of the shop block. Can be one of the following: `no-padding`, `small-padding`, `medium-padding`, `large-padding`
- `height` ==> height of the shop, example `100%` or `700px` or `100vh`
- `disableautoscroll` ==> set to true, if you want to disable auto scroll
- `disableheightanimation` ==> set to true, if you want to disable height animation
- `locationsview` => set to true, if you want to list all store options
- `class` ==> if you want to wrap the element to custom class

Example: `[rentle_shop shop="myshop" location="mylocation"]` ==> would show rentle iframe from the selected location.

This project was bootstrapped with [Create Guten Block](https://github.com/ahmadawais/create-guten-block).

Below you will find some information on how to run scripts.

>You can find the most recent version of this guide [here](https://github.com/ahmadawais/create-guten-block).

## 👉  `npm start`
- Use to compile and run the block in development mode.
- Watches for any changes and reports back any errors in your code.

## 👉  `npm run build`
- Use to build production code for your block inside `dist` folder.
- Runs once and reports back the gzip file sizes of the produced code.

## 👉  `npm run eject`
- Use to eject your plugin out of `create-guten-block`.
- Provides all the configurations so you can customize the project as you want.
- It's a one-way street, `eject` and you have to maintain everything yourself.
- You don't normally have to `eject` a project because by ejecting you lose the connection with `create-guten-block` and from there onwards you have to update and maintain all the dependencies on your own.

---

###### Feel free to tweet and say 👋 at me [@MrAhmadAwais](https://twitter.com/mrahmadawais/)

[![npm](https://img.shields.io/npm/v/create-guten-block.svg?style=flat-square)](https://www.npmjs.com/package/create-guten-block) [![npm](https://img.shields.io/npm/dt/create-guten-block.svg?style=flat-square&label=downloads)](https://www.npmjs.com/package/create-guten-block)  [![license](https://img.shields.io/github/license/mashape/apistatus.svg?style=flat-square)](https://github.com/ahmadawais/create-guten-block) [![Tweet for help](https://img.shields.io/twitter/follow/mrahmadawais.svg?style=social&label=Tweet%20@MrAhmadAwais)](https://twitter.com/mrahmadawais/) [![GitHub stars](https://img.shields.io/github/stars/ahmadawais/create-guten-block.svg?style=social&label=Stars)](https://github.com/ahmadawais/create-guten-block/stargazers) [![GitHub followers](https://img.shields.io/github/followers/ahmadawais.svg?style=social&label=Follow)](https://github.com/ahmadawais?tab=followers)
