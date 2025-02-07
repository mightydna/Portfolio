var langBtnDe = document.querySelector("#lang_btn_de");
var langBtnEn = document.querySelector("#lang_btn_en");
var overlayLangBtnDe = document.getElementById("overlay_lang_btn_de");
var overlayLangBtnEn = document.getElementById("overlay_lang_btn_en");
var lang = "de";

// Eventlistener //

langBtnDe.addEventListener("click", changeLanguageDe);
langBtnEn.addEventListener("click", changeLanguageEn);
overlayLangBtnDe.addEventListener("click", changeLanguageDe);
overlayLangBtnEn.addEventListener("click", changeLanguageEn);

// Funktionen //
// Sprachwechsel Englisch //
function changeLanguageEn() {
    fetch("resources/languages/translations.json")
        .then(response => response.json())
        .then(data => {
            if (lang == "de") {
                document.querySelector("#menu_btn_about a").textContent = data["en"].menu_about;
                document.querySelector("#menu_btn_skills a").textContent = data["en"].menu_skills;
                document.querySelector("#menu_btn_projects a").textContent = data["en"].menu_projects;
                document.querySelector("#menu_btn_experience a").textContent = data["en"].menu_experience;
                document.querySelector("#menu_btn_contact a").textContent = data["en"].menu_contact;

                document.querySelector("#burgermenu_title").textContent = data["en"].burger_menu_title;
                document.querySelector("#burger_menu_btn_about a").textContent = data["en"].burger_menu_about;
                document.querySelector("#burger_menu_btn_skills a").textContent = data["en"].burger_menu_skills;
                document.querySelector("#burger_menu_btn_projects a").textContent = data["en"].burger_menu_projects;
                document.querySelector("#burger_menu_btn_experience a").textContent = data["en"].burger_menu_experience;
                document.querySelector("#burger_menu_btn_contact a").textContent = data["en"].burger_menu_contact;
                document.querySelector("#bmenu_language_menu_title").textContent = data["en"].burger_menu_language;
                document.querySelector("#bmenu_b2t a").textContent = data["en"].burger_menu_backtotop;

                document.querySelector("#hero_text_block h2").textContent = data["en"].hero_greeting;
                document.querySelector("#subheader").textContent = data["en"].hero_subheader;
                document.querySelector("#hero_text_block p").textContent = data["en"].hero_description;

                document.querySelector("#about_header").textContent = data["en"].about_header;
                document.querySelector("#about_desc_text").textContent = data["en"].about_description;

                document.querySelector("#skills_header").textContent = data["en"].skills_header;
                document.querySelector("#skills_subtext").textContent = data["en"].skills_subtext;

                document.querySelector("#certificates_header").textContent = data["en"].certificates_header;
                document.querySelector("#certificates_skills_desctext").textContent = data["en"].certificates_description;
                document.querySelector("#certificates_skills_header").textContent = data["en"].certificates_skills_header;
                document.querySelector("#certificates_cert_block_header").textContent = data["en"].certificates_cert_header;
                document.querySelector("#certificates_webdev").textContent = data["en"].fullstack_dev;

                // Projektpage-Keys hier einfügen //
                
                document.querySelector("#experience_header").textContent = data["en"].experience_header;
                document.querySelector("#experience_desctext").textContent = data["en"].experience_description;
                document.querySelector("#experience_block_gamedesign").textContent = data["en"].experience_gamedesign;
                document.querySelector("#experience_block_gd_desc").textContent = data["en"].experience_gamedesign_description;
                document.querySelector("#experience_block_mobilegames").textContent = data["en"].experience_mobile_games;
                document.querySelector("#experience_block_mobile_desc").textContent = data["en"].experience_mobile_games_description;
                document.querySelector("#experience_block_monetization").textContent = data["en"].experience_monetization;
                document.querySelector("#experience_block_monetization_desc").textContent = data["en"].experience_monetization_description;

                document.querySelector("#contact_header").textContent = data["en"].contact_header;
                document.querySelector("#contact_text_top").textContent = data["en"].contact_text_top;
                document.querySelector("#contact_text_btm").textContent = data["en"].contact_text_btm;
                document.querySelector("#contact_form_label_name").textContent = data["en"].contact_form_name;
                document.querySelector("#contact_form_label_mail").textContent = data["en"].contact_form_mail;
                document.querySelector("#contact_form_label_msg").textContent = data["en"].contact_form_message;
                var privacyText = data["en"].contact_form_privacy_text;
                document.querySelector("#form_dataprot_text").innerHTML = `${privacyText} <a id="form_dataprot_link">Datenschutzerklärung</a>.`;
                document.querySelector("#form_dataprot_text a").textContent = data["en"].contact_form_privacy_link;
                document.querySelector("#form_btnText").textContent = data["en"].contact_form_submit;

                lang = "en";
                languageButtonHighlight();
            }
        })
        .catch(error => {
            console.log("Fehler: ", error);
        });
}

// Sprachwechsel Deutsch //
function changeLanguageDe() {
    fetch("resources/languages/translations.json")
        .then(response => response.json())
        .then(data => {
            if (lang == "en") {
                document.querySelector("#menu_btn_about a").textContent = data["de"].menu_about;
                document.querySelector("#menu_btn_skills a").textContent = data["de"].menu_skills;
                document.querySelector("#menu_btn_projects a").textContent = data["de"].menu_projects;
                document.querySelector("#menu_btn_experience a").textContent = data["de"].menu_experience;
                document.querySelector("#menu_btn_contact a").textContent = data["de"].menu_contact;

                document.querySelector("#burgermenu_title").textContent = data["de"].burger_menu_title;
                document.querySelector("#burger_menu_btn_about a").textContent = data["de"].burger_menu_about;
                document.querySelector("#burger_menu_btn_skills a").textContent = data["de"].burger_menu_skills;
                document.querySelector("#burger_menu_btn_projects a").textContent = data["de"].burger_menu_projects;
                document.querySelector("#burger_menu_btn_experience a").textContent = data["de"].burger_menu_experience;
                document.querySelector("#burger_menu_btn_contact a").textContent = data["de"].burger_menu_contact;
                document.querySelector("#bmenu_language_menu_title").textContent = data["de"].burger_menu_language;
                document.querySelector("#bmenu_b2t a").textContent = data["de"].burger_menu_backtotop;

                document.querySelector("#hero_text_block h2").textContent = data["de"].hero_greeting;
                document.querySelector("#subheader").textContent = data["de"].hero_subheader;
                document.querySelector("#hero_text_block p").textContent = data["de"].hero_description;

                document.querySelector("#about_header").textContent = data["de"].about_header;
                document.querySelector("#about_desc_text").textContent = data["de"].about_description;

                document.querySelector("#skills_header").textContent = data["de"].skills_header;
                document.querySelector("#skills_subtext").textContent = data["de"].skills_subtext;

                document.querySelector("#certificates_header").textContent = data["de"].certificates_header;
                document.querySelector("#certificates_skills_desctext").textContent = data["de"].certificates_description;
                document.querySelector("#certificates_skills_header").textContent = data["de"].certificates_skills_header;
                document.querySelector("#certificates_cert_block_header").textContent = data["de"].certificates_cert_header;
                document.querySelector("#certificates_webdev").textContent = data["de"].fullstack_dev;

                // Projektpage-Keys hier einfügen //

                document.querySelector("#experience_header").textContent = data["de"].experience_header;
                document.querySelector("#experience_desctext").textContent = data["de"].experience_description;
                document.querySelector("#experience_block_gamedesign").textContent = data["de"].experience_gamedesign;
                document.querySelector("#experience_block_gd_desc").textContent = data["de"].experience_gamedesign_description;
                document.querySelector("#experience_block_mobilegames").textContent = data["de"].experience_mobile_games;
                document.querySelector("#experience_block_mobile_desc").textContent = data["de"].experience_mobile_games_description;
                document.querySelector("#experience_block_monetization").textContent = data["de"].experience_monetization;
                document.querySelector("#experience_block_monetization_desc").textContent = data["de"].experience_monetization_description;

                document.querySelector("#contact_header").textContent = data["de"].contact_header;
                document.querySelector("#contact_text_top").textContent = data["de"].contact_text_top;
                document.querySelector("#contact_text_btm").textContent = data["de"].contact_text_btm;
                document.querySelector("#contact_form_label_name").textContent = data["de"].contact_form_name;
                document.querySelector("#contact_form_label_mail").textContent = data["de"].contact_form_mail;
                document.querySelector("#contact_form_label_msg").textContent = data["de"].contact_form_message;
                var privacyText = data["de"].contact_form_privacy_text;
                document.querySelector("#form_dataprot_text").innerHTML = `${privacyText} <a id="form_dataprot_link">Datenschutzerklärung</a>.`;
                document.querySelector("#form_dataprot_text a").textContent = data["de"].contact_form_privacy_link;
                document.querySelector("#form_btnText").textContent = data["de"].contact_form_submit;

                lang = "de";
                languageButtonHighlight();
            }
        })
        .catch(error => {
            console.log("Fehler: ", error);
        });
}

// Language Button Highlight Function //
function languageButtonHighlight() {
    if(lang == "de") {
        langBtnDe.classList.add("menu_box_lang");
        overlayLangBtnDe.classList.add("burger_menu_box_lang");
        langBtnEn.classList.remove("menu_box_lang");
        overlayLangBtnEn.classList.remove("burger_menu_box_lang");
    } else if(lang == "en") {
        langBtnEn.classList.add("menu_box_lang");
        overlayLangBtnEn.classList.add("burger_menu_box_lang");
        langBtnDe.classList.remove("menu_box_lang");
        overlayLangBtnDe.classList.remove("burger_menu_box_lang");
    }
}
languageButtonHighlight();