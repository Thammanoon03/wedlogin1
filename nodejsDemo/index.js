const url1 ="yuui"
const url2 ="yuui"
const url3 ="yuui"

function downloading(url,callback){
    console.log(`กำลังดาวโหลด ${url}`)
    setTimeout(() => {
        callback(url)
    }, 3000);
    
}

downloading(url1,function(result){
    console.log(`เสร็จสิ้น ${result} !!!`)
    downloading(url2,function(result){
        console.log(`เสร็จสิ้น ${result} !!!`)
        downloading(url3,function(result){
            console.log(`เสร็จสิ้น ${result} !!!`)
        })
    })
})
