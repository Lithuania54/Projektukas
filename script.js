    
    var icon = document.getElementById('icon')
    icon.onclick = function (){
        document.body.classList.toggle("light");
        if(document.body.classList.contains("light")){
            icon.src = "images/moon.png";
        }
        else{
            icon.src = "images/sun.png";
        }
    }