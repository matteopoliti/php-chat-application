const form = document.querySelector(".login form"),
continueBtn = document.querySelector(".button input"),
erroreTxt = document.querySelector(".error-txt");

form.addEventListener("submit",(e)=>{
    e.preventDefault();
})

continueBtn.addEventListener("click", ()=>{
    //Ajax
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/login.php", true);
    xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
                if(data == "success"){
                    location.href= "users.php"
                }else{
                    erroreTxt.textContent = data;
                    erroreTxt.style.display = "block";
                }
            }
        }
    }
    let formData = new FormData(form);
    xhr.send(formData);
})