const opt = document.querySelector("#opt");
const ch  = document.querySelector(".change");
const del = document.querySelector(".delete");

opt.addEventListener("change",()=>{
    if (opt.value === 'change') {
        del.style.display = "none";
        ch.style.display = "block";
    }
    else{
        ch.style.display = "none";
        del.style.display = "block";
    }
});
