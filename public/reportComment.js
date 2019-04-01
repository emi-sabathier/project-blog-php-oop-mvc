document.querySelectorAll('a[id^="comment"]').forEach((button) => {
    button.addEventListener('click', (e) => {
        e.preventDefault();
        $.ajax({
            url: document.getElementById(button.id).getAttribute('href'),
            type: 'POST',
            data: {
                reportNb: 1
            },
            success: function (data) {
                console.log("ok");
                // const pElt = document.createElement('p');
                // pElt.id = 'msg';
                // pElt.textContent = 'Signalement envoyé';
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log("Nok");
            }
        });
    });
});