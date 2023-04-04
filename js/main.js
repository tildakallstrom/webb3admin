"use strict";
let coursesEl = document.getElementById("courses");
let createbtn = document.getElementById("create");
let coursenameInput = document.getElementById("coursename");
let schoolInput = document.getElementById("school");
let startsInput = document.getElementById("starts");
let stopsInput = document.getElementById("stops");

let worksEl = document.getElementById("works");
let createworkbtn = document.getElementById("createWork");
let workplaceInput = document.getElementById("workplace");
let titleInput = document.getElementById("title");
let cityInput = document.getElementById("city");
let countryInput = document.getElementById("country");
let descriptionworkInput = document.getElementById("descriptionwork");
let startInput = document.getElementById("start");
let stopInput = document.getElementById("stop");

let websitesEl = document.getElementById("websites");
let createwebsitebtn = document.getElementById("createWebsite");
let websiteTitleInput = document.getElementById("websiteTitle");
let descriptionInput = document.getElementById("description");
let urlInput = document.getElementById("url");
let imageInput = document.getElementById("image");

window.addEventListener('load', getCourses);
createbtn.addEventListener('click', function(e) {
    e.preventDefault();
    create();
});

window.addEventListener('load', getWorks);
createworkbtn.addEventListener('click', function(e) {
    e.preventDefault();
    createWork();
});

window.addEventListener('load', getWebsites);
createwebsitebtn.addEventListener('click', function(e) {
    e.preventDefault();
    createWebsite();
});

function getCourses() {
    coursesEl.innerHTML = '';
    fetch('https://studenter.miun.se/~tika1900/writeable/webbtjansten/courses.php')
    .then(response => response.json())
    .then(data =>  {
        data.forEach(course => {
            coursesEl.innerHTML += 
            `
            <tr class="courses">
            <td class="numeric">${course.id}</td>
            <td class="numeric">${course.coursename}</td>
            <td class="numeric">${course.school}</td>
            <td class="numeric"> ${course.start}</td>
            <td class="numeric">${course.stop}</td>
            <td class="numeric">
             <button id="coursedelete${course.id}" onClick="deleteCourse(${course.id})" class="btninform">Radera kurs</button>
             <button id="course${course.id}" onClick="getCourse('${course.id}', '${course.coursename}', '${course.school}', '${course.start}', '${course.stop}')" class="btninform">Uppdatera</button>
             </td>
             </tr>
` 
        })
    })
    
}

function getCourse(id, coursename, school, start, stop) {
 let element = document.getElementById("updateform");
            element.innerHTML = 
            `
            <form>
            <input type="hidden" name="courseidUpdate" id="courseidUpdate" value="${id}">
            <label for="coursenameUpdate">Kurs</label>
            <br>
            <input type="text" name="coursenameUpdate" id="coursenameUpdate" class="forminput" value="${coursename}">
            <br>
            <label for="schoolUpdate">Lärosäte</label>
            <br>
            <input type="text" name="schoolUpdate" id="schoolUpdate" class="forminput" value="${school}">
            <br>
            <label for="startsUpdate">Start</label>
            <br>
            <input type="date" name="startsUpdate" id="startsUpdate" class="forminput" value="${start}">
            <br>
            <label for="stopsUpdate">Slut</label>
            <br>
            <input type="date" name="stopsUpdate" id="stopsUpdate" class="forminput" value="${stop}">
            <br>
            <input type="submit" value="Uppdatera kurs" id="update" class="formbtn">

            </form>
       
` 
let updatebtn = document.getElementById("update");
updatebtn.addEventListener('click', function(e) {
    e.preventDefault();
    updateCourse();
});  
}

function updateCourse() {
     let course = {'id': courseidUpdate.value, 'coursename': coursenameUpdate.value, 'school': schoolUpdate.value, 'start': startsUpdate.value, 'stop': stopsUpdate.value};
     fetch('https://studenter.miun.se/~tika1900/writeable/webbtjansten/courses.php?id=' + courseidUpdate.value, {
        method: 'PUT',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(course),
    })
    .then(response => response.json())
    .then(data => {
        getCourses();
    })
    .catch(error => {
        console.log('Error: ', error);
    })
    }
    
function deleteCourse(id) {
    fetch('https://studenter.miun.se/~tika1900/writeable/webbtjansten/courses.php?id=' + id, {
        method: 'DELETE',
    })
    .then(response => response.json())
.then(data => {
    getCourses();
})
.catch(error => {
    console.log('Error: ', error);
})
}

    function create() {
        let coursename = coursenameInput.value;
        let school = schoolInput.value;
        let start = startsInput.value;
        let stop = stopsInput.value;
        let course = {'coursename': coursename, 'school': school, 'start': start, 'stop': stop}; 
    fetch('https://studenter.miun.se/~tika1900/writeable/webbtjansten/courses.php', {
    method: 'POST',
    body: JSON.stringify(course),
})

.catch(error => {
    console.log('Error: ', error);
}) 
.then(data => {
    getCourses();
})
}

function getWorks() {
    worksEl.innerHTML = '';
    fetch('https://studenter.miun.se/~tika1900/writeable/webbtjansten/workplaces.php')
    .then(response => response.json())
    .then(data =>  {
        data.forEach(work => {
            worksEl.innerHTML += 
            `
            <tr class="works">
            <td class="numeric">${work.id} </td>
            <td class="numeric">${work.workplace}</td>
            <td class="numeric">${work.title}</td>
            <td class="numeric">${work.city}</td>
            <td class="numeric">${work.country}</td>
            <td class="numeric">${work.description}</td>
            <td class="numeric">${work.start}</td>
            <td class="numeric">${work.stop}</td>
            <td class="numeric">
            <button id="workdelete${work.id}" onClick="deleteWork(${work.id})" class="btninform">Radera arbete</button>
            <button id="work${work.id}" onClick="getWork('${work.id}', '${work.workplace}', '${work.title}', '${work.city}', '${work.country}', '${work.description}', '${work.start}', '${work.stop}')" class="btninform">Uppdatera</button>
             </td>
             </tr>
`    
        })
    })
    
}

function createWork() {
    let workplace = workplaceInput.value;
    let title = titleInput.value;
    let city = cityInput.value;
    let country = countryInput.value;
    let descriptionwork = descriptionworkInput.value;
    let start = startInput.value;
    let stop = stopInput.value;
    let work = {'workplace': workplace, 'title': title, 'city': city, 'country': country, 'description': descriptionwork, 'start': start, 'stop': stop}; 
fetch('https://studenter.miun.se/~tika1900/writeable/webbtjansten/workplaces.php', {
method: 'POST',
body: JSON.stringify(work),
})

.catch(error => {
console.log('Error: ', error);
}) 
.then(data => {
getWorks();
})
}

function getWork(id, workplace, title, city, country, descriptionwork, start, stop) {
    let element = document.getElementById("updateformwork");
               element.innerHTML = 
               `
               <h2 class="userh2">Uppdatera arbete</h2>

               <form>
               <input type="hidden" name="workidUpdate" id="workidUpdate" value="${id}">
               <label for="workplaceUpdate">Arbetsplats</label>
               <br>
               <input type="text" name="workplaceUpdate" id="workplaceUpdate" class="forminput" value="${workplace}">
               <br>
               <label for="titleUpdate">Titel</label>
               <br>
               <input type="text" name="titleUpdate" id="titleUpdate" class="forminput" value="${title}">
               <br>
               <label for="cityUpdate">Stad</label>
               <br>
               <input type="text" name="cityUpdate" id="cityUpdate" class="forminput" value="${city}">
               <br>
               <label for="countryUpdate">Land</label>
               <br>
               <input type="text" name="countryUpdate" id="countryUpdate" class="forminput" value="${country}">
               <br>
               <label for="descriptionworkUpdate">Beskrivning</label>
               <br>
               <input type="text" name="descriptionworkUpdate" id="descriptionworkUpdate" class="forminput" value="${descriptionwork}">
               <br>
               <label for="startUpdate">Start</label>
               <br>
               <input type="date" name="startUpdate" id="startUpdate" class="forminput" value="${start}">
               <br>
               <label for="stopsUpdate">Slut</label>
               <br>
               <input type="date" name="stopUpdate" id="stopUpdate" class="forminput" value="${stop}">
               <br>
               <input type="submit" value="Uppdatera Arbete" id="updatework" class="formbtn">
   
               </form>
          
   ` 
   let updatebtn = document.getElementById("updatework");
   updatebtn.addEventListener('click', function(e) {
       e.preventDefault();
       updateWork();
   });  
   }
   
function updateWork() {
     let work = {'id': workidUpdate.value,'workplace': workplaceUpdate.value, 'title': titleUpdate.value, 'city': cityUpdate.value, 'country': countryUpdate.value, 'description': descriptionworkUpdate.value, 'start': startUpdate.value, 'stop': stopUpdate.value};
     fetch('https://studenter.miun.se/~tika1900/writeable/webbtjansten/workplaces.php?id=' + workidUpdate.value, {
        method: 'PUT',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(work),
    })
    .then(response => response.json())
    
    .catch(error => {
        console.log('Error: ', error);
    })
    .then(data => {
        getWorks();
    })
    }
     
function deleteWork(id) {
    fetch('https://studenter.miun.se/~tika1900/writeable/webbtjansten/workplaces.php?id=' + id, {
        method: 'DELETE',
    })
    .then(response => response.json())
.then(data => {
    getWorks();
})
.catch(error => {
    console.log('Error: ', error);
})
}

function getWebsites() {
    websitesEl.innerHTML = '';
    fetch('https://studenter.miun.se/~tika1900/writeable/webbtjansten/websites.php')
    .then(response => response.json())
    .then(data =>  {
        data.forEach(website=> {
            websitesEl.innerHTML += 
            `
            <tr class="websites">
            <td class="numeric">${website.id}</td>
            <td class="numeric">${website.title}</td>
            <td class="numeric">${website.description}</td>
            <td class="numeric"> <a href="${website.url}">${website.url}</a></td>
            <td class="numeric"> <a href="img/${website.image}.png" data-lightbox="image-1" data-title="${website.image}.png">
            <picture>
              <img src="img/${website.image}.png" alt="${website.image}" class="tdimg">
           </picture>
 </a>
            <td class="numeric">
             <button id="webdelete${website.id}" onClick="deleteWebsite(${website.id})" class="btninform">Radera webbplats</button>
             <button id="web${website.id}" onClick="getWebsite('${website.id}', '${website.title}', '${website.description}', '${website.url}', '${website.image}')" class="btninform">Uppdatera</button>
             </td>
             </tr>
`    
        })
    })
    
}


function getWebsite(id, title, description, url, image) {
 let element = document.getElementById("updateformwebsite");
            element.innerHTML = 
            `
            <h2 class="userh2">Uppdatera webbplats</h2>
            <form>
            <input type="hidden" name="websiteidUpdate" id="websiteidUpdate" value="${id}">
            <label for="websitetitleUpdate">Titel</label>
            <br>
            <input type="text" name="websiteTitleUpdate" id="websiteTitleUpdate" class="forminput" value="${title}">
            <br>
            <label for="descriptionUpdate">Beskrivning</label>
            <br>
            <input type="text" name="descriptionUpdate" id="descriptionUpdate" class="forminput" value="${description}">
            <br>
            <label for="urlUpdate">Url</label>
            <br>
            <input type="text" name="urlUpdate" id="urlUpdate" class="forminput" value="${url}">
            <br>
            <label for="imageUpdate">Bild</label>
            <br>
            <input type="text" name="imageUpdate" id="imageUpdate" class="forminput" value="${image}">
            <br>
            <input type="submit" value="Uppdatera webbplats" id="updatewebsite" class="formbtn">

            </form>
       
` 

let updatewebsitebtn = document.getElementById("updatewebsite");
updatewebsitebtn.addEventListener('click', function(e) {
    e.preventDefault();
    updateWebsite();
});  
}

function updateWebsite() {
     let website = {'id': websiteidUpdate.value, 'title': websiteTitleUpdate.value, 'description': descriptionUpdate.value, 'url': urlUpdate.value, 'image': imageUpdate.value};
     fetch('https://studenter.miun.se/~tika1900/writeable/webbtjansten/websites.php?id=' + websiteidUpdate.value, {
        method: 'PUT',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(website),
    })
    .then(response => response.json())
    .then(data => {
        getWebsites();
    })
    .catch(error => {
        console.log('Error: ', error);
    })
    }
    
function deleteWebsite(id) {
    fetch('https://studenter.miun.se/~tika1900/writeable/webbtjansten/websites.php?id=' + id, {
        method: 'DELETE',
    })
    .then(response => response.json())
.then(data => {
    getWebsites();
})
.catch(error => {
    console.log('Error: ', error);
})
}

function getImgEmpty() {
    imageInput.value = "empty";
   }
   //aangens
   function getImgAangens() {
    imageInput.value = "aangens";
   }
   //gorton
   function getImgGorton() {
    imageInput.value = "gorton";
   }
   //hundbloggen
   function getImgHundbloggen() {
    imageInput.value = "hundbloggen";
   }
   //merlinsfoto
   function getImgMerlins() {
    imageInput.value = "merlinsfoto";
   }
   //röris
   function getImgRoris() {
    imageInput.value = "roris";
   }
   //skog
   function getImgSkog() {
    imageInput.value = "skog";
   }
   //vandringsguiden
   function getImgVandringsguiden() {
    imageInput.value = "vandringsguiden";
   }
   //vikens
   function getImgVikens() {
    imageInput.value = "vikens";
   }

    function createWebsite() {
        let websiteTitle = websiteTitleInput.value;
        let description = descriptionInput.value;
        let url = urlInput.value;
        let image = imageInput.value;
        let website = {'title': websiteTitle, 'description': description, 'url': url, 'image': image}; 
    fetch('https://studenter.miun.se/~tika1900/writeable/webbtjansten/websites.php', {
    method: 'POST',
    body: JSON.stringify(website),
})

.catch(error => {
    console.log('Error: ', error);
}) 
.then(data => {
    getWebsites();
})
}