const mongoose = require('mongoose');

const dbUrl ='mongodb://localhost:27017/productDB';
mongoose.connect(dbUrl).catch(err => console.log(err));

//schemaคือโครงสร้างในการเก็บข้อมูลของmongodb
const productSchema = mongoose.Schema({
    name: String,
    price: Number,
    image: String,
    description: String
});

const Product = mongoose.model("products", productSchema);

module.exports = Product;

//ต้องใช่งานasync await เท่านั้นเพราะmongodbมันไม่suppost callbackในการส่งข้อมูลไปยังmogodbแล้ว 
module.exports.saveProduct = async function(model, data) {
    try {
        await model.save();
        console.log('Product saved successfully');
        data(null); // ไม่มีข้อผิดพลาด โดยส่ง null เป็นอาร์กิวเมนต์แรกของ data
    } catch (error) {
        console.error('Error saving product:', error);
        data(error); // ถ้าเกิดข้อผิดพลาดในการบันทึกข้อมูล ให้ส่ง error เป็นอาร์กิวเมนต์แรกของ data
    }
};

