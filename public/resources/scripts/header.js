//var header_size = 1;
var menu_btn_about = document.querySelector("#menu_btn_about");
var menu_btn_contact = document.querySelector("#menu_btn_contact");


/*
menu_btn_contact.addEventListener("click", function() {
    if (header_size == 1) {
        var contact = document.querySelector("#contact");
        contact.style.scrollMarginTop = "10vh";
        console.log(about.style);
    } else if (header_size == 0) {
        var contact = document.querySelector("#contact");
        contact.style.scrollMarginTop = "15vh";
        window.scrollTo({ top: document.documentElement.scrollHeight, behavior: "smooth" });
        setTimeout(() => {
            window.scrollTo({ top: document.documentElement.scrollHeight, behavior: "smooth" });
            console.log("warte...");
        }, 900);
        
        header_placeholder.style.display = "flex";
        console.log(about.style);
    }
})


menu_btn_about.addEventListener("click", function() {
    if (header_size == 1) {
        var about = document.querySelector("#about");
        about.style.scrollMarginTop = "10vh";
        console.log(about.style);
    } else if (header_size == 0) {
        var about = document.querySelector("#about");
        about.style.scrollMarginTop = "5vh";
        console.log(about.style);
    }
})

window.addEventListener("scroll", function() {
    var header = document.querySelector("#header");
    console.log(window.scrollY);
    if (window.scrollY > 4000) {
        if (header_size == 0) {
            header.classList.remove("shrink");
            header_size = 1;
        }
        
    } else if (window.scrollY > 450 ){
        if (header_size == 1) {
            header.classList.add("shrink");
            header_size = 0;
        }
        
    } else if (window.scrollY < 200) {
        if (header_size == 0) {
            header.classList.remove("shrink");
            header_size = 1;
            console.log("wtf");
        }
        
    }
});
*/