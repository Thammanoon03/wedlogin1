const express = require('express')
const mysql = require('mysql')
const ejs = require('ejs')
const util = require('util');
const path = require('path');
const router = express.Router(); 
const app = express();

app.set('views',path.join(__dirname,'views'))
app.set('view engine','ejs')
app.use('/',router)
app.use(express.urlencoded({extended : false}))
app.use(express.json())
// app.use(express.json())//แปลงjson odjectให้เป็นjavascript odject


//Mysql connettion
const connection = mysql.createConnection({
    host: 'localhost',
    user: 'root',
    password: 'root',
    database: 'db_data32',
    port: '3306'
})
connection.connect((err)=>{
    if (err) {
        console.log("Error connection to mysql")
        return;
    }
    console.log("Mysql connected successfully")
})

router.get('/',(req,res)=>{
    res.render('index')
})

router.get('/back',(req,res)=>{
    res.render('index')
})

//ดึงข้อมูลออกมาแสดง
const query = util.promisify(connection.query).bind(connection);

app.get('/user', async (req, res) => {
  try {
    const users = await query('SELECT * FROM tbl_data');
    res.render('user', { users: users });
  } catch (error) {
    console.error('เกิดข้อผิดพลาดในการดึงข้อมูล: ' + error.stack);
    res.status(500).send('มีข้อผิดพลาดเกิดขึ้น');
  }
});

//ส่งข้อมูล
app.post('/sudmit', async(req,res)=>{
    const{email,name,password} = req.body
    const fromdata = {email,name,password}

    try{
        await insertData(fromdata)
        console.log('successfully')
        // res.status(200).send('successfully to mysql')
        res.redirect('/');
    }catch (error){
        console.error('error tomysql' + error.stack)
        res.status(500).send('error')
    }
})
//function data to mysql
function insertData(fromdata){
    return new Promise((resolve, reject) => {
        connection.query('INSERT INTO tbl_data SET ?',fromdata,(err,result)=>{
            if (err) {
                reject(err)
            }else{
                resolve(result)
            }
        })
    })
}

app.listen(5500,()=>{
    console.log("Run server 8000")
})