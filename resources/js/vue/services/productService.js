export default {
    getAll(sortingBy, sortingOrder) {
        return new Promise(async (resolve, reject) => {
            try {
                let response = await axios.get('/api/product', {
                    params: { 'sort[by]': sortingBy, 'sort[order]': sortingOrder },
                });
                resolve(response.data);
            } catch (e) {
                reject(e);
            }
        });
    }
}
