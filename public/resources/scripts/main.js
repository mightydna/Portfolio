// Variablen //
var form_submit = document.querySelector("#form_submit");
var form_btnText = document.querySelector("#form_btnText");
var form = document.querySelector("#contact_form");

var burgermenu_button = document.querySelector("#burgermenu");
var burger = document.querySelector("#burgermenu_main");
var burgermenu_overlay = document.querySelector("#burgermenu_overlay");
var overlay_close = document.querySelector("#bmenu_overlay_close_btn");
var body = document.querySelector("body");
var menu_btn_about = document.querySelector("#menu_btn_about");
var menu_btn_contact = document.querySelector("#menu_btn_contact");
// Burgermenu Buttons //
var bmenu_btn_about = document.querySelector("#burger_menu_btn_about");
var bmenu_btn_skills = document.querySelector("#burger_menu_btn_skills");
var bmenu_btn_projects = document.querySelector("#burger_menu_btn_projects");
var bmenu_btn_experience = document.querySelector("#burger_menu_btn_experience");
var bmenu_btn_contact = document.querySelector("#burger_menu_btn_contact");
var bmenu_btn_b2t = document.querySelector("#bmenu_b2t");
//var header_size = 1;

burger.addEventListener("click", toggleOverlay);
overlay_close.addEventListener("click", toggleOverlay)

bmenu_btn_about.addEventListener("click", toggleOverlay);
bmenu_btn_skills.addEventListener("click", toggleOverlay);
bmenu_btn_projects.addEventListener("click", toggleOverlay);
bmenu_btn_experience.addEventListener("click", toggleOverlay);
bmenu_btn_contact.addEventListener("click", toggleOverlay);
bmenu_btn_b2t.addEventListener("click", toggleOverlay);

function toggleOverlay() {
    burgermenu_overlay.classList.toggle("bm_visible");
    body.classList.toggle("no_scroll");
    burgermenu_button.classList.toggle("bm_invisible");
}

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


// Kontaktformular Funktionalität //
form_submit.onclick = (e) => {
    e.preventDefault();
    if (form.checkValidity()) {
        form_submit.classList.add("disabled");
        form_btnText.innerHTML = "Danke!";
        form_submit.classList.add("active");
        
        let formData = new FormData(form);

        fetch('/api/contact_form.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.text())
        .then(data => {
            setTimeout(() => {
                //form.submit();
                form.reset();
                form_submit.classList.add("reverse"); 
                setTimeout(() => {
                    form_btnText.innerHTML = "Absenden"; 
                    form_submit.classList.remove("active", "reverse");
                    form_submit.classList.remove("disabled");
                }, 1000);
            }, 5000);
        })
        .catch(error => {
            console.error('Fehler:', error);
        });
    } else {
        form.reportValidity();
    }
};