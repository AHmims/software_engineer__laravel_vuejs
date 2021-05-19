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
            let newProduct = {};

            newProduct.id = product.id;
            newProduct.name = product.name;
            newProduct.description = product.description;
            newProduct.price = product.price;
            newProduct.image = product.image;
            newProduct.categories = this.parseCategories(product.categories);
            newProduct.joinedCategories = newProduct.categories.map(category => category.name).join(' ');

            newProducts.push(newProduct);
        });

        return newProducts;
    }
}