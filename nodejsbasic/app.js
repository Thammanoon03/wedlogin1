const express = require('express')
const path = require('path')
const cookieParser = require('cookie-parser')
const session = require('express-session')
const router = require('./routes/Myrouter')
const app = express()

//ลำดับการทำงาน
//การตั้งค่าการทำงานที่ตัวserver
app.set('views',path.join(__dirname,'views'))
app.set('view engine','ejs')

app.use(express.urlencoded({extended:false}))
app.use(cookieParser())
app.use(session({secret:"mysession",resave:false,saveUninitialized:false}))
app.use(router)
app.use(express.static(path.join(__dirname,'public')))

//กำหนดport ของserver
app.listen(8080,()=>{
    console.log("Run server port 8080")
})