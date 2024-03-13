const connect = true
const url1 = "one day"
const url2 = "one day"
const url3 = "one day"
const url4 = "one day"

function downloading(url){
    return new Promise(function(resolve,reject){
        console.log(`กำลังดาวโหลด ${url}`)
       setTimeout(() => {
            if(connect){
                resolve(`โหลด ${url} เรียบร้อย`)
            }else{
                reject(`error`)
            }
       }, 2000);
    })
}
// promise//
//downloading(url1).then(function(result){
//    console.log(result)
 //   return downloading(url2)
//}).then(function(result){
//    console.log(result)
//    return downloading(url3)
//})
// async & await
async function satrt(){
    console.log(await downloading(url1))
    console.log(await downloading(url2))
    console.log(await downloading(url3))
    console.log(await downloading(url4))
    
}

satrt()