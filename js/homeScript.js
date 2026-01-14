document.addEventListener("DOMContentLoaded", () => {

    const floatBtn = document.getElementById("newEvent");
    const newEventForm = document.getElementById("newEventForm");
    const closeFormBtn = document.querySelector('.newEventForm .closeForm');

    //Gestione pulsante floating + apertura form
    floatBtn.addEventListener("click", () => {
        // Apri overlay
        newEventForm.style.display = 'flex';
    });

    //Chiusura form con pulsante X
    if (closeFormBtn) {
        closeFormBtn.addEventListener('click', () => {
            newEventForm.style.display = 'none';
        });
    }

    //Chiusura form cliccando fuori dal form
    newEventForm.addEventListener('click', (e) => {
        if (e.target === newEventForm) {
            newEventForm.style.display = 'none';
        }
    });

    const titolo = document.getElementById("titolo");
    const descrizione = document.getElementById("descrizione");
    const scadenza = document.getElementById("scadenza");

    newEventForm.addEventListener("submit", (e) => {
        let errori = [];


        // validazione titolo
        if (titolo.value.trim() === "") {
            errori.push("Il titolo è obbligatorio");
        }
        // validazione descrizione
        if (descrizione.value.trim() === "") {
            errori.push("La descrizione è obbligatorio");
        }

        // validazione scadenza
        let dataInserita = new Date(scadenza.value);
        const now = new Date();
        const dateMin = new Date(
            now.getFullYear(),
            now.getMonth(),
            now.getDate(),
        );
        if (scadenza.value.trim() === "") {
            errori.push("La dataNascita è obbligatoria");
        }else if (dataInserita.getTime() <= dateMin.getTime()){
            errori.push("Non puoi inserire una data di scadenza gia passata");
        }


        // se ci sono errori blocco il submit
        if (errori.length > 0) {
            e.preventDefault();
            alert(errori.join("\n"));
        }
    });

    document.querySelectorAll('.btn-evento-completato, .btn-evento-nCompletato').forEach(btn => {
        btn.addEventListener('click', (e) => {
            const idEvento = btn.dataset.id;
            if (!idEvento) return;

            const formData = new FormData();
            formData.append('idEvento', idEvento);

            fetch('private/handleChangeState.php', {
                method: 'POST',
                body: formData
            })
                .then(response => {
                    if (!response.ok) throw new Error('Errore nella richiesta');
                    return response.text();
                })
                .then(() => location.reload())
                .catch(err => {
                    console.error(err);
                    alert('Errore nel cambio stato evento.');
                });
        });
    });

    document.querySelectorAll('.btn-elimina-Ev').forEach(btn => {
        btn.addEventListener('click', (e) => {
            const idEvento = btn.dataset.id;
            if (!idEvento) return;
            const eventoDiv = btn.closest('.evento');
            const titolo = eventoDiv.querySelector('h3').textContent;
            if (confirm(`Sei sicuro di voler eliminare l'evento "${titolo}"?`)){

                const formData = new FormData();
                formData.append('idEvento', idEvento);

                fetch('private/hendleDelateEvent.php', {
                    method: 'POST',
                    body: formData
                })
                    .then(response => {
                        if (!response.ok) throw new Error('Errore nella richiesta');
                        return response.text();
                    })
                    .then(() => location.reload())
                    .catch(err => {
                        console.error(err);
                        alert('Errore nel eliminazione dell evento.');
                    });
            }
        });
    });




});
