document.addEventListener("DOMContentLoaded", () => {

    const floatBtn = document.getElementById("floatingBtn");
    floatBtn.addEventListener("click", () => {
        alert("Floating button premuto!");

    });

    document.querySelectorAll('.evento').forEach(evento => {
        evento.addEventListener('click', () => {
            const idEvento = evento.dataset.id;
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

});
