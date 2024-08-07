const searchBar = document.querySelector(".users .search input"),
searchBtn = document.querySelector(".users .search button"),
usersList = document.querySelector(".users .users-list");


searchBtn.addEventListener("click", ()=>{
    searchBar.classList.toggle("active");
    searchBar.focus();
    searchBtn.classList.toggle("active")
    searchBar.value = "";
})

searchBar.addEventListener("keyup", ()=>{
    let searchTerm = searchBar.value;
    //Ajax
    if(searchTerm != ""){ // aggiungo una classe active per far partire la chiamata solo quando non c'è la classe
        searchBar.classList.add("active")
    }else{
        searchBar.classList.remove("active")
    }
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/search.php", true);
    xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
                usersList.innerHTML = data;
            }
        }
    }
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send("searchTerm=" + searchTerm);
})

setInterval(()=>{
    //Ajax
    let xhr = new XMLHttpRequest();
    xhr.open("GET", "php/users.php", true);
    xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
                if(!searchBar.classList.contains("active")){ //se active non c'è in searchbar allora aggiungiamo questi dati
                    usersList.innerHTML = data;
                }
            }
        }
    }
    xhr.send();
}, 500) //funzione vhe viene chiamata ogni 500ms