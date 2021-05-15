export default {
    getAll(order) {
        return new Promise(async (resolve, reject) => {
            try {
                let response = await axios.get("api/product", {
                    params: { sortKey: "price", sortValue: order },
                });
                resolve(response.data);
            } catch (e) {
                reject(e);
            }
        });
    },
    getAllByCategory(category, sortValue = 'asc', sortKey = 'price') {
        return new Promise(async (resolve, reject) => {
            try {
                let response = await axios.get(`api/product/category/${category}`, {
                    params: { sortKey, sortValue },
                });
                resolve(response.data);
            } catch (e) {
                reject(e);
            }
        });
    }
}
