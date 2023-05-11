/*const head = document.querySelector('.header')
fetch('/js/header.html')
.then(res=>res.text())
.then(data=>{ 
    head.innerHTML=data
}) 
const foot = document.querySelector('.footer')
fetch('/js/footer.html')
.then(res=>res.text())
.then(data=>{ 
    foot.innerHTML=data
}) 
*/



var currentUrl = window.location.href;
var navLinks = document.querySelectorAll(".nav-link");

for (var i = 0; i < navLinks.length; i++) {
    var linkUrl = navLinks[i].getAttribute("href");
    if (currentUrl.includes(linkUrl)) {
        navLinks[i].classList.add("active");

        var dropdownParent = navLinks[i].closest(".dropdown-item");
        console.log(dropdownParent);
        if (dropdownParent !== null) {
            dropdownParent.querySelector(".nav-link").classList.add("active");
        }
    }
}






