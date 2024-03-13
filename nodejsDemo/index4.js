const connet = true
const sd1 = "hi1"
const sd2 = "hi2"

function downloading(url){
    return new Promise(function(resolve,reject){
        console.log(`loading${url}`)
        setTimeout(() => {
            if(connet){
                resolve(`on ${url} loading`)
            }else{
                reject(`error`)
            }
        }, 2000);
    })
}
async function start(){
    console.log(await downloading(sd1))
    console.log(await downloading(sd2))
}
start()