document.addEventListener("DOMContentLoaded", () => {

    document.addEventListener("click", async (e) => {
        const evento = e.target.closest(".evento");
        if (!evento) return;

        const id = evento.dataset.id;

        // stato attuale letto dal DOM
        const eraCompletato = evento.classList.contains("completato");
        const nuovoStato = eraCompletato ? 0 : 1;

        // --- UI UPDATE IMMEDIATO ---
        evento.classList.toggle("completato");

        if (nuovoStato === 1) {
            // va nei completati
            document.getElementById("completati").appendChild(evento);
        } else {
            // torna incompleto → ricarico la pagina
            // (serve per rimetterlo nella sezione corretta)
            location.reload();
            return;
        }

    });


    document.getElementById("floatingBtn").addEventListener("click", () => {
        alert("Floating button cliccato!");
    });



});
