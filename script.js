
let a = false ;//show , если 0 = то включено если 1 то нет

const gg = document.getElementsByClassName("closeshow")[0];
const gg1 = document.querySelector('.shower');
function ggz(){
    if (a){
        gg.style.display = "none";
        gg1.value = '▶';
    }
    else{
        gg.style.display = "block";
        gg1.value = '◀';
    } 
  	console.log(a);
    a =!a; 

}


