export default {
    getAllCategories() {
        return new Promise(async (resolve, reject) => {
            try {
                let response = await axios.get('/api/category');
                resolve(response.data);
            } catch (e) {
                reject(e);
            }
        });
    },
    getAllProducts(category, sortingBy, sortingOrder) {
        return new Promise(async (resolve, reject) => {
            try {
                let response = await axios.get(`/api/category/${category}`);
                resolve(response.data);
            } catch (e) {
                reject(e);
            }
        });
    }
}
