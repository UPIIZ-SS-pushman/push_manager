function deleteNotification(notid) {
    swal({
        title: "Aviso",
        text: "¿Desea eliminar el registro de esta notificación?",
        type: "warning",
        showCancelButton: true,
        confirmButtonClass: "btn btn-rounded btn-inline btn-danger",
        confirmButtonText: "Si",
        cancelButtonClass: "btn btn-rounded btn-inline btn-primary",
        cancelButtonText: "No",
        closeOnConfirm: false,
        closeOnCancel: false
    },
    function(isConfirm){
      if(isConfirm){
          $.post(postRoute,{notid:notid},
          function(data,status){
              swal({
                  title: "¡Eliminado!",
                  text: "El registro se ha eliminado",
                  type: "success",
                  timer: 1500,
                  showConfirmButton: false
              },
              function(){
                location.href = calendRoute;
              });
          }).fail(function(){
            cancelPopup("Error", "No fue posible borrar el registro");
          });
      } else {
          cancelPopup("Cancelado", "No se ha borrado ningún registro");
      }
    });
}

function cancelPopup(message, message2){
    swal({
        title: message,
        text: message2,
        type: "error",
        timer: 1000,
        showConfirmButton: false
    });
}
