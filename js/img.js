"use strict";
function myFunction() {
    let dots = document.getElementById("dots");
    let moreText = document.getElementById("more");
    let btnText = document.getElementById("myBtn");
  
    if (dots.style.display === "none") {
      dots.style.display = "inline";
      btnText.innerHTML = "+";
      moreText.style.display = "none";
    } else {
      dots.style.display = "none";
      btnText.innerHTML = "-";
      moreText.style.display = "inline";
    }
  }
//Hämtar in knapparna
const readMore = document.getElementsByClassName("readMore");

//Lägger en händelselyssnare på varje knapp
for (let i = 0; i < readMore.length; i++) {

    readMore[i].addEventListener("click", function () {
        //Hämtar in nästa element vilket blir article-elementet efter knappen som trycks
        let textExpand = this.nextElementSibling;

        //Kontroll om article är synlig
        if (textExpand.style.display === "block") {
            //Är den synlig så döljs den med css
            textExpand.style.display = "none";

            //Ändrar aria-expended från true till false(infälld knapp)
            this.setAttribute("aria-expanded", "false");
           
        } else {
            //article-visas
            textExpand.style.display = "block";

            //Ändrar aria-expanded från false till true(utvidgad knapp)
            this.setAttribute("aria-expanded", "true");

        }
        
    })
    
}