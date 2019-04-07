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
                const sectionElt = document.getElementById('comments');
                let pElt = document.createElement('p');
                let rowElt = document.createElement('div');
                rowElt.className = "row"; 
                sectionElt.appendChild(rowElt);
                pElt.id = 'msg';
                pElt.textContent = 'Signalement envoyé';
                pElt.className = "col-4 col-sm-2 col-md-3 alert alert-success";
                rowElt.appendChild(pElt);

                setTimeout(function() {
                    pElt.innerHTML='';
                    pElt.style.opacity= 0 ;
                }, 2000);
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log('report NOK');
            }
        });
    });
});