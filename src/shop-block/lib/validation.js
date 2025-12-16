const validateSingleField = (string) => {
	return string.match("^[A-Za-z0-9]+$");
};

export const validteFields = (shopId, locationId, categoryId, productId) => {
	if(shopId) {
		if(! validateSingleField(shopId)) {
			return false;
		}
	}

	if(locationId) {
		if(! validateSingleField(locationId)) {
			return false;
		}
	}

	if(categoryId) {
		if(! validateSingleField(categoryId)) {
			return false;
		}
	}

	if(productId) {
		if(! validateSingleField(productId)) {
			return false;
		}
	}

	return true;
};
