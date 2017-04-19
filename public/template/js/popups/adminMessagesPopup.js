function deleteAdminMessages() {
  var ids =  $('.table-check:checked');
  if(ids.length == 0){
    cancelPopup("¡Error!", "No hay mensajes seleccionados");
  }else if(ids.length >= 1){
    swal({
        title: "Aviso",
        text: "¿Desea eliminar los mensajes seleccionados?",
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
      var idsnum = [];
      for(var i = 0; i < ids.length ; i++){
        idsnum[i] = ids[i].value;
      }
        if(isConfirm){
            $.post(postRoute,{ids:idsnum},
            function(data,status){
                swal({
                    title: "¡Eliminado!",
                    text: "Los mensajes se han eliminado",
                    type: "success",
                    timer: 1500,
                    showConfirmButton: false
                },
                function(){
                    location.reload();
                });
            }).fail(function(){
              cancelPopup("Error", "No fue posible borrar los mensajes");
            });
        } else {
            cancelPopup("Cancelado", "No se ha borrado ningún mensaje");
        }
    });
  }
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

$(document).ready(function(){
    $(':checkbox:checked').prop('checked',false);
});
