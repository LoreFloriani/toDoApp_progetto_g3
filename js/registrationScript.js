document.addEventListener("DOMContentLoaded", () => {

    const form = document.getElementById("login-form");
    const nome = document.getElementById("nome");
    const cognome = document.getElementById("cognome");
    const email = document.getElementById("email");
    const dataNascita = document.getElementById("dataNascita");
    const username = document.getElementById("username");
    const password = document.getElementById("password");
    const cPassword = document.getElementById("cPassword");

    form.addEventListener("submit", (e) => {
        let errori = [];


        // validazione nome
        if (nome.value.trim() === "") {
            errori.push("Il nome è obbligatorio");
        }
        // validazione cognome
        if (cognome.value.trim() === "") {
            errori.push("Il cognome è obbligatorio");
        }
        // validazione email
        if (email.value.trim() === "") {
            errori.push("La email è obbligatoria");
        }
        // validazione dataNascita
        let dataInserita = new Date(dataNascita.value);
        const now = new Date();
        const dateMin = new Date(
            now.getFullYear() - 14,
            now.getMonth(),
            now.getDate(),
        );
        if (dataNascita.value.trim() === "") {
            errori.push("La dataNascita è obbligatoria");
        }else if (dataInserita.getTime() > dateMin.getTime()){
            errori.push("Devi avere almeno 14 anni per usare il nostro servizio");
        }

        // validazione username
        if (username.value.trim() === "") {
            errori.push("Io username è obbligatorio");
        }

        // validazione password/cPassword
        if (password.value.trim() === "" || cPassword.value.trim() === "") {
            errori.push("La password è obbligatoria");
        }else if (password.value.length < 8) {
            errori.push("La password deve contenere almeno 8 caratteri");
        }else if (password.value !== cPassword.value) {
            errori.push("Le 2 password non corrispondono");
        }

        // se ci sono errori blocco il submit
        if (errori.length > 0) {
            e.preventDefault();
            alert(errori.join("\n"));
        }
    });

});
