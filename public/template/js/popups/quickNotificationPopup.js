function cancelPopup(message, message2){
    swal({
        title: message,
        text: message2,
        type: "error",
        showConfirmButton: true
    });
}

function checkQuickNotif() {
    if (document.getElementById('title').value == "" || document.getElementById('body').value == "") {
        cancelPopup("¡Error!", "Todos los campos son requeridos");
    } else {
        swal({
            title: "Notificación",
            text: "Notificación enviada",
            type: "success",
            showConfirmButton: true
        },
        function(){
            document.getElementById('quickNotifForm').submit();
        });
    }
}
