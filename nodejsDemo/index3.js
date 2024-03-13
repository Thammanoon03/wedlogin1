
const fs =require('fs')

//การเขียนไฟล์
//fs.readFile("myfile/input.txt",'utf-8',(err,data)=>{
//    if(err) return console.log("error",err)
//    const outputText = `Hello Node.js\n${data}\nไฟล์ถูกเขียนเมือ${new Date()}`
//    fs.writeFile("myfile/output.txt",outputText,err=>{
//        if(err) return console.log("error",err)
//        console.log("end")
//    })
//})
//การอ่านไฟล์
fs.readFile("myfile/input.txt",'utf-8',(err,data)=>{
    if(err) return console.log("error",err)
    console.log(data)
    setTimeout(() => {
        console.log("end")
    }, 2000);
    
})