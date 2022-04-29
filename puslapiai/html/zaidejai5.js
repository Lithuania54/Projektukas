let http = new XMLHttpRequest();
http.open('get', 'products.json', true);
http.send();
http.onload = function(){
   if(this.readyState == 4 && this.status == 200){
      let products = JSON.parse(this.responseText);
      let output = "";
      for(let item of products){
         output += `
            <div class="product">
               <img src="${item.image}" alt="${item.description}">
               <p class="title">${item.Zaidejas}</p>
               <p class="price">
                  <span2 class="span2">Klubas - </span2>
                  <span>${item.Klubas}</span>
               </p>
               <p class="price">
                  <span2 class="span2">Vidurkis - </span2>
                  <span>${item.Vidurkis}</span>
               </p>
            </div>
         `;
      }
      document.querySelector(".products").innerHTML = output;
   }
}