// Variablen //
var form_submit = document.querySelector("#form_submit");
var form_btnText = document.querySelector("#form_btnText");
var form = document.querySelector("#contact_form");

var burgermenu_button = document.querySelector("#burgermenu");
var burger = document.querySelector("#burgermenu_main");
var burgermenu_overlay = document.querySelector("#burgermenu_overlay");
var overlay_close = document.querySelector("#bmenu_overlay_close_btn");
var body = document.querySelector("body");

// Burgermenu Buttons //
var bmenu_btn_about = document.querySelector("#burger_menu_btn_about");
var bmenu_btn_skills = document.querySelector("#burger_menu_btn_skills");
var bmenu_btn_projects = document.querySelector("#burger_menu_btn_projects");
var bmenu_btn_experience = document.querySelector("#burger_menu_btn_experience");
var bmenu_btn_contact = document.querySelector("#burger_menu_btn_contact");
var bmenu_btn_b2t = document.querySelector("#bmenu_b2t");

var dataprot_btn = document.querySelector("#form_dataprot_link");
var dataprot_overlay = document.querySelector("#dataprot_overlay");
var dataprot_overlay_close_btn = document.querySelector("#dataprot_overlay_close_btn");
var imprint_btn = document.querySelector("#footer_copyright_text");
var imprint_btn_small = document.querySelector("#footer_copyright_text_small");
var imprint_overlay = document.querySelector("#imprint_overlay");
var imprint_overlay_close_btn = document.querySelector("#imprint_overlay_close_btn");

// Eventlistener //
burger.addEventListener("click", toggleOverlay);
overlay_close.addEventListener("click", toggleOverlay)

bmenu_btn_about.addEventListener("click", toggleOverlay);
bmenu_btn_skills.addEventListener("click", toggleOverlay);
bmenu_btn_projects.addEventListener("click", toggleOverlay);
bmenu_btn_experience.addEventListener("click", toggleOverlay);
bmenu_btn_contact.addEventListener("click", toggleOverlay);
bmenu_btn_b2t.addEventListener("click", toggleOverlay);

dataprot_btn.addEventListener("click", toggleDataprotOverlay);
dataprot_overlay_close_btn.addEventListener("click", toggleDataprotOverlay);

imprint_btn.addEventListener("click", toggleImprintOverlay);
imprint_btn_small.addEventListener("click", toggleImprintOverlay);
imprint_overlay_close_btn.addEventListener("click", toggleImprintOverlay);


// Funktionen //
// Overlay Toggle-Funktionen //
function toggleOverlay() {
    burgermenu_overlay.classList.toggle("bm_visible");
    body.classList.toggle("no_scroll");
    burgermenu_button.classList.toggle("bm_invisible");
}

function toggleDataprotOverlay() {
    dataprot_overlay.classList.toggle("dataprot_visible");
    body.classList.toggle("no_scroll");
}

function toggleImprintOverlay() {
    imprint_overlay.classList.toggle("imprint_visible");
    body.classList.toggle("no_scroll");
}


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



document.addEventListener("DOMContentLoaded", function () {
    const wrapper = document.querySelector(".projects_wrapper");
    const projects = document.querySelectorAll(".project_box");
    const prevBtn = document.getElementById("prevProject");
    const nextBtn = document.getElementById("nextProject");

    const projectsPerView = 3;
    let currentIndex = 0;
    const maxIndex = Math.ceil(projects.length / projectsPerView) - 1;

    function updateView() {
        const projectWidth = 328 + 35;
        const offset = currentIndex * projectWidth; // Scrollbreite inkl. Abstand
        wrapper.style.transform = `translateX(-${offset}px)`;
    }

    nextBtn.addEventListener("click", () => {
        if (currentIndex < maxIndex) {
            currentIndex++;
            updateView();
        }
    });

    prevBtn.addEventListener("click", () => {
        if (currentIndex > 0) {
            currentIndex--;
            updateView();
        }
    });
});