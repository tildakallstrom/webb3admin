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
const readMore = document.getElementsByClassName("readMore");

for (let i = 0; i < readMore.length; i++) {

    readMore[i].addEventListener("click", function () {
        let textExpand = this.nextElementSibling;
        if (textExpand.style.display === "block") {
            textExpand.style.display = "none";
            this.setAttribute("aria-expanded", "false");
        } else {
            textExpand.style.display = "block";
            this.setAttribute("aria-expanded", "true");
        }
    })
}