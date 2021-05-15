export default class ProductService {
    async getAllProducts(order) {
        return new Promise((resolve, reject) => {
            try {
                let response = await axios.get("api/product", {
                    params: { sortKey: "price", sortValue: order },
                });
                console.log(response);
                //
                resolve(response.data);
            } catch (err) {
                console.error(err);
                // alert("Error");
                reject(err);
            }
        });
    }
}
