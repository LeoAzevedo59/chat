const searchBar = document.querySelector(".users .search input"),
searchBtn = document.querySelector(".users .search button"),
usersList = document.querySelector(".users .users-list"),
searchIcon = document.querySelector(".users .search .icon-search"),
searchClosed = document.querySelector(".users .search .icon-closed");

searchBtn.onclick =  ()=>{
    searchBar.classList.toggle("active-input");
    searchBar.focus();
    searchBtn.classList.toggle("active-button");
    searchIcon.classList.toggle("icon-search-none");
    searchClosed.classList.toggle("icon-closed-block");
    searchBar.value = "";
}

searchBar.onkeyup = ()=> {
    let searchTerm = searchBar.value;
    if(searchTerm != ""){
        searchBar.classList.add("active");
    }else {
        searchBar.classList.remove("active"); 
    }
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "./back-end/search.php", true);
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
}

setInterval(() =>{
    let xhr = new XMLHttpRequest();
    xhr.open("GET", "./back-end/users.php", true);
    xhr.onload = ()=>{ 
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response; 
                if(!searchBar.classList.contains("active")){
                    usersList.innerHTML = data;
                }
            }
        }
    }
    xhr.send();
}, 500);