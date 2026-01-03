document.addEventListener("DOMContentLoaded", () => {

    const form = document.querySelector("form");
    const username = document.querySelector('input[name="username"]');
    const password = document.querySelector('input[name="password"]');

    form.addEventListener("submit", (e) => {
        let errori = [];

        // validazione username
        if (username.value.trim() === "") {
            errori.push("Lo username è obbligatorio");
        }

        // validazione password
        if (password.value.trim() === "") {
            errori.push("La password è obbligatoria");
        } else if (password.value.length < 8) {
            errori.push("La password deve contenere almeno 8 caratteri");
        }

        // se ci sono errori blocco il submit
        if (errori.length > 0) {
            e.preventDefault();
            alert(errori.join("\n"));
        }
    });

});
