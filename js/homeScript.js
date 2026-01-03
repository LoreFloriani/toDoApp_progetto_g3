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
/*
        // --- UPDATE DATABASE ---
        try {
            const response = await fetch("updateStato.php", {
                method: "POST",
                headers: { "Content-Type": "application/json" },
                body: JSON.stringify({ id, stato: nuovoStato })
            });

            if (!response.ok) throw new Error();

        } catch (err) {
            // rollback UI in caso di errore
            evento.classList.toggle("completato");
            location.reload();
        }

 */
    });

});
