// Variablen //
var form_submit = document.querySelector("#form_submit");
var form_btnText = document.querySelector("#form_btnText");
var form = document.querySelector("#contact_form");

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