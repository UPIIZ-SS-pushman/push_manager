// section update sector
function check_empty(){
    if(document.getElementById('namePop').value == ""){
        cancelPopup("¡Error!", "Llene el campo");
    } else{
        swal({
            title: "¡Actualizando!",
            text: "Realizando cambios en la base de datos..",
            type: "success",
            timer: 1500,
            showConfirmButton: false
        },
        function(){
            document.getElementById('formPop').submit();
        });
    }
}

// Function to display sector div update
function updateSectorShow(id, name){
    document.getElementById('namePop').value = name;
    document.getElementById('idPop').value = id;
    
    document.getElementById('updateDiv').style.display = "block";
}

// Function to hide sector div update
function updateSectorHide(){
    document.getElementById('updateDiv').style.display = "none";
    cancelPopup("¡Cancelado!", "Se canceló la actualización del tipo de usuario...");
}

// section create sector

function check_empty2(){
    if(document.getElementById('namePop2').value == ""){
        cancelPopup("¡Error!", "Llene el campo");
    } else{
        swal({
            title: "¡Actualizando!",
            text: "Realizando cambios en la base de datos..",
            type: "success",
            timer: 1500,
            showConfirmButton: false
        },
        function(){
            document.getElementById('formPop2').submit();
        });
    }
}

// Function to display sector div create
function createSectorShow(id, name){
    document.getElementById('namePop2').value = "";
    
    document.getElementById('createDiv').style.display = "block";
}

// Function to gide sector div create
function createSectorHide(){
    document.getElementById('createDiv').style.display = "none";
    cancelPopup("¡Cancelado!", "Se canceló la creación del sector...");
}

// section delete sector

// Confirm delete oneSector
function delOneSector(id, name){
    swal({
        title: "¿Désea eliminar el registro?",
        text: "Eliminará " + name,
        type: "warning",
        showCancelButton: true,
        confirmButtonClass: "btn btn-rounded btn-inline btn-danger",
        confirmButtonText: "Si",
        cancelButtonClass: "btn btn-rounded btn-inline btn-primary",
        cancelButtonText: "No",
        closeOnConfirm: false,
        closeOnCancel: false
    },
    function(isConfirm) {
        if (isConfirm) {
            swal({
                title: "¡Eliminado!",
                text: "El registro se ha eliminado",
                type: "success",
                timer: 1500,
                showConfirmButton: false
            },
            function(){
                document.getElementById('idDel').value = id;
                document.getElementById('formDel').submit();
            });
                
        } else {
            cancelPopup("¡Cancelado!", "Se canceló la operación...");
        }
    });
}

// Confirm delete multiple sectors
function delMultipleSector(){
    if(stack.length <= 1){
        cancelPopup("¡Error!", "No seleccionó suficientes registros");
    } else{
        swal({
            title: "¿Désea eliminar los siguientes registros?",
            text: "Eliminarán: " + stack,
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
                $.post("/types",{ids:stack},
                function(data,status){
                    swal({
                        title: "¡Eliminado!",
                        text: "Los registros se han eliminado",
                        type: "success",
                        timer: 1500,
                        showConfirmButton: false
                    },
                    function(){
                        location.reload(); 
                    });
                });
            } else {
                cancelPopup("¡Cancelado!", "Se canceló la operación...");
            }
        });
    }   
}

// General functions
function cancelPopup(message, message2){
    swal({
        title: message,
        text: message2,
        type: "error",
        timer: 1000,
        showConfirmButton: false
    });
}

var stack = [];
function delMultipleSectorArray(id){
    for(var i = 0; i < stack.length; i++){
        if(stack[i] == id){
            stack.splice( i, 1 );            
            return;
        }
    }
    stack.push(id);    
}

$(document).ready(function(){
    $(':checkbox:checked').prop('checked',false);
});
 
