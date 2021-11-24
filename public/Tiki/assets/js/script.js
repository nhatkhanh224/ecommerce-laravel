// 
$('.owl-one').owlCarousel({
    loop:true,
    margin:10,
    autoplay:true,
    nav:false,
    dots:true,
    items : 1,
    autoplayTimeout:8000,
    responsive:{
        0:{
            items:2
        },
        600:{
            items:3
        },
        1000:{
            items:5
        }
    }
})
$('.owl-two').owlCarousel({
    loop:true,
    margin:10,
    autoplay:true,
    items : 1,
    autoplayTimeout:3000,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:2
        },
        1000:{
            items:2
        }
    }
})
$('.owl-three').owlCarousel({
    loop:false,
    margin:10,
    items : 1,
    autoplay:false,
    responsive:{
        0:{
            items:2
        },
        600:{
            items:3
        },
        1000:{
            items:6
        }
    }
})
$('.owl-four').owlCarousel({
    loop:false,
    margin:10,
    items : 1,
    autoplay:false,
    responsive:{
        0:{
            items:2
        },
        600:{
            items:3
        },
        1000:{
            items:6,
            nav:true
        }
    }
})
// Modal btn login- logout
var modal = document.getElementById("right__user-modal");
var btn = document.getElementById("right__user-btn");
var btnlogo = document.getElementById("right__user-logobtn");
var btnemail = document.getElementById("content__left-email");
var modallogin = document.getElementById("login__email-modal")
var btnback = document.getElementById("modal__btn-back");
var btnclose = document.getElementsByClassName("modal__btn-close")[0];
var btnclose2 = document.getElementById("modal__btn-close2");
var backlogin = document.getElementById('back__login-btn');
btn.onclick = function() {
modal.style.display = "block";
}
btnlogo.onclick = function() {
    modal.style.display = "block";
}
btnemail.onclick = function(){
    modal.style.display = "none";
    modallogin.style.display = "block";
}
btnback.onclick = function() {
    modal.style.display = "block";
    modallogin.style.display = "none";
}
btnclose.onclick = function() {
    modal.style.display = "none";
}
btnclose2.onclick = function(){
    modallogin.style.display = "none";
}
backlogin.onclick = function(){
    modal.style.display  = "block";
    dlvmodal.style.display = "none";

}
// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
if (event.target == modal) {
    modal.style.display = "none";
}
if (event.target == modallogin) {
    modallogin.style.display = "none";
}
}
// delivery modal
var dlvmodal = document.getElementById("delivery__modal");
var dlvbtn = document.getElementById("delivery__btn");
var dlvspan = document.getElementsByClassName("dmodal__content-btn")[0];

dlvbtn.onclick = function() {
    dlvmodal.style.display = "block";
}
dlvspan.onclick = function() {
    dlvmodal.style.display = "none";
}
window.onclick = function(event) {
    if (event.target == dlvmodal) {
        dlvmodal.style.display = "none";
    }
}
////show password
function myFunctionshowpass() {
    var x = document.getElementById("input__password");
    if (x.type === "password") {
    x.type = "text";
    } else {
    x.type = "password";
    }
}

// End Slider
// Img gallery 
function clickme(smallImg) {
    var fullImg = document.getElementById("imagebox");
    fullImg.src = smallImg.src; 
}
// quantity product increase decrease
function increaseValue() {
    var value = parseInt(document.getElementById('number').value, 10);
    value = isNaN(value) ? 0 : value;
    value++;
    document.getElementById('number').value = value;
  }
  
  function decreaseValue() {
    var value = parseInt(document.getElementById('number').value, 10);
    value = isNaN(value) ? 0 : value;
    value < 1 ? value = 1 : '';
    value--;
    document.getElementById('number').value = value;
  }
// See more description
function myFunction() {
    var dots1 = document.getElementById("words__seemore-dots");
    var moreText1 = document.getElementById("words__seemore-more");
    var btnText1 = document.getElementById("words__seemore-btn");
    if (dots1.style.display === "none") {
        dots1.style.display = "inline";
        btnText1.innerHTML = "Xem Thêm Nội Dung"; 
        moreText1.style.display = "none";
    } else {
        dots1.style.display = "none";
        btnText1.innerHTML = "Thu Gọn"; 
        moreText1.style.display = "inline";
    }
}
// ------------------- cart 
// ------------------- search page ----------------
function myFunction2() {
    var dots2 = document.getElementById("dots2");
    var moreText2 = document.getElementById("page__category-seemore");
    var btnText2 = document.getElementById("categoty__seemore-btn");
    if (dots2.style.display === "none") {
        dots2.style.display = "inline";
        btnText2.innerHTML = "Xem thêm"; 
        moreText2.style.display = "none";
    } else {
        dots2.style.display = "none";
        btnText2.innerHTML = "Thu gọn"; 
        moreText2.style.display = "inline";
    }
}
function myFunction3() {
    var dots3 = document.getElementById("dots3");
    var moreText3 = document.getElementById("page__location-seemore");
    var btnText3 = document.getElementById("location__seemore-btn");
    if (dots3.style.display === "none") {
        dots3.style.display = "inline";
        btnText3.innerHTML = "Xem thêm"; 
        moreText3.style.display = "none";
    } else {
        dots3.style.display = "none";
        btnText3.innerHTML = "Thu gọn"; 
        moreText3.style.display = "inline";
    }
}
// 
var dlvmodal2 = document.getElementById("delivery__modal");
var dlvbtn2 = document.getElementById("page__delivery-btn");
var dlvspan = document.getElementsByClassName("dmodal__content-btn")[0];
dlvbtn2.onclick = function() {
    dlvmodal2.style.display = "block";
}
dlvspan.onclick = function() {
    dlvmodal2.style.display = "none";
}
window.onclick = function(event) {
    if (event.target == dlvmodal) {
        dlvmodal.style.display = "none";
    }
}