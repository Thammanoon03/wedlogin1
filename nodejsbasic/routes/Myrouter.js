const express = require('express')
const router = express.Router()
const Product = require('../model/products')
//const path = require('path')

const multer = require('multer')

const storage = multer.diskStorage({
    destination:function(req,file,cd){
        cd(null,'./public/images/products')//Location file
    },
    filename:function(req,file,cd){
        cd(null,Date.now()+".jpg")//rename file 
    }
})
// start upload
const upload = multer({
    storage:storage
})

//เป็นส่วนการทำงานโดยใช้ mongood
//ส่วนของหน้าindex
router.get('/',async (req,res)=>{
   try{
    const products = await Product.find().exec();
    res.render('index',{products:products});
   }catch(error){
    console.log('Error findching products',error);
    res.status(500).send('Error findching products');
   }
    
})

router.get('/add-product',(req,res)=>{
    if (req.session.login) {
        res.render('form')
    }else{
        res.render('admin')
    }
})

//ในส่วนของmanageจะเป็นการส่งข้อมูลจากฐานข้อมูลมาทำงาน
router.get('/manage',async (req,res)=>{
    if (req.session.login) {
        try{
        const products = await Product.find().exec();
        res.render('manage',{products:products});
       }catch(error){
        console.log('Error findching products',error);
        res.status(500).send('Error findching products');
       }
    }else{
        res.render('admin')
    }
    
})

// การลบข้อมูลในโค้ดนี้จะเรียงลำดับการทำงานดังนี้  
//promis
router.get('/delete/:id', (req, res) => {
    Product.findByIdAndDelete(req.params.id, { useFindAndModify: false }) //เริ่มด้วยการทำขั้นตอนแกให้เสร็จก่อน
        .then(() => {   //ตามด้วยขั้นตอนที่สองคือการให้redirectกลับมายังmanage
            res.redirect('/manage');
        })
        .catch(err => { //ส่วนcatchคือถ้าเกิดข้อผิดพลาดให้แสดงerrorออกมา
            console.error(err);
            res.status(500).send('Error deleting product');
        });
});

router.get('/logout',(req,res)=>{
   req.session.destroy((err)=>{
         res.redirect('/manage')
   })
    
})

//get
//แยกกันระหว่างget กับ post เพื่อไม่ให้ตัว router งง
//post


//ในส่วนของการส่งข้อมูลไปยังmongodb 
 router.post('/insert',upload.single("image"),(req,res)=>{
    let data = new Product({
        name:req.body.name,
        price:req.body.price,
        image:req.file.filename,
        description:req.body.description
    });

    Product.saveProduct(data, (err) => {
       if(err) console.log(err)
       res.redirect('/')  
    });
});

//ค้นหาทีละfileใช้ในหน้าสอบถามข้อมูล
//Product.findById() เพื่อค้นหาสินค้าที่มี _id ตรงกับค่าที่ถูกส่งมาในพารามิเตอร์ id ของ URL โดยใช้ req.params.id และเรียกใช้ exec() เพื่อรันคำสั่ง
//if (!product_id) { ... }: ในส่วนนี้ เราตรวจสอบว่าสินค้าที่ค้นหาพบหรือไม่ หากไม่พบ (ค่า product_id เป็น null หรือ undefined) เราจะส่งสถานะการตอบกลับ 404 "Product not found"
router.get('/:id', async (req, res) => {
    try {
        const product_id = await Product.findById(req.params.id).exec();
        if (!product_id) {
            return res.status(404).send('Product not found');
        }
        res.render('product', { product: product_id });
        console.log(product_id);
    } catch (error) {
        console.log('Error fetching product', error);
        res.status(500).send('Error fetching product');
    }
})

router.post('/edit', async (req, res) => {
    try {
        const edit_id = req.body.edit_id; // รับค่า edit_id จากฟอร์มแก้ไขข้อมูล
        console.log(edit_id)
        const doc = await Product.findOne({ _id: edit_id }).exec(); // ค้นหาข้อมูลของสินค้าที่ต้องการแก้ไขจากฐานข้อมูล
        if (!doc) {
            return res.status(404).send('Product not found'); // หากไม่พบสินค้า ให้ส่งข้อความว่า "Product not found"
        }
        res.render('edit', { product: doc }); // ส่งข้อมูลของสินค้าที่ค้นหาได้ไปแสดงผลในฟอร์มแก้ไข
        console.log(doc); // แสดงข้อมูลของสินค้าที่ค้นหาได้ใน console เพื่อตรวจสอบ
    } catch (error) {
        console.log('Error fetching product', error); // ถ้าเกิดข้อผิดพลาดในการค้นหาข้อมูล ให้แสดงข้อความ "Error fetching product" พร้อมกับข้อผิดพลาดใน console
        res.status(500).send('Error fetching product'); // ส่งข้อความ "Error fetching product" พร้อมสถานะ 500 ในกรณีที่เกิดข้อผิดพลาด
    }
});

//แก้ไขข้อมูลสิ้นค้าใชงานpromisในการทำงาน
router.post('/update',(req,res)=>{
    //ข้อมูลใหม่ที่ถูกส่งมาจากแบบฟอมแก้ไข
    const update_id = req.body.update_id
    let data = ({
        name:req.body.name,
        price:req.body.price,
        description:req.body.description
    });

    Product.findByIdAndUpdate(update_id,data,{useFindAndModify:false})
        .then(() => {   
            res.redirect('/manage');
            console.log(data)
        })
        .catch(err => { 
            console.error(err);
            res.status(500).send('Error deleting product');
        });
});

router.post('/login',(req,res)=>{
    const username = req.body.username
    const password = req.body.password
    const timeExpire = 20000

    if (username === "admin" && password === "1234") {
        //create session
        req.session.username =username
        req.session.password =password
        req.session.login =true
        req.session.cookie.maxAge=timeExpire
        res.redirect('/manage')
    }else {
        res.render('404')
    }
})


module.exports = router