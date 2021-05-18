export default {
    parseCategories(categories) {
        let newCategories = [];

        categories.forEach(category => {
            newCategories.push({
                id: category.id,
                name: category.name
            });
        });

        return newCategories;
    },
    parseProducts(products) {
        let newProducts = [];

        products.forEach(product => {
            let newProduct = product;
            newProduct.categories = this.parseCategories(product.categories);
            newProducts.push(newProduct);
        });

        return newProducts;
    }
}