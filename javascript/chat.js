const form = document.querySelector(".typing-area"),
inputField = form.querySelector(".input-field"),
sendBtn = form.querySelector("button");

form.addEventListener("submit",(e)=>{
    e.preventDefault();
})

sendBtn.addEventListener("click", () =>{
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/insert-chat.php", true);
    xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                inputField.value = ""; //quando il messaggio viene inserito nel database l'input torna vuoto
            }
        }
    }
    let formData = new FormData(form);
    xhr.send(formData);
})