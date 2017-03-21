// section update user
function check_empty() {
    if (document.getElementById('namePop').value == "" || document.getElementById('userPop').value == "" || document.getElementById('lastnamePop').value == "" || document.getElementById('emailPop').value == "") {
        cancelPopup("¡Error!", "Llene todos los campos");
    } else {
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

// Function to display user div update
function updateUserShow(id, username, name, lastname, email, type, sector) {
    document.getElementById('idPop').value=id;

    document.getElementById('userPop').value=username;
    document.getElementById('namePop').value=name;
    document.getElementById('lastnamePop').value=lastname;
    document.getElementById('emailPop').value=email;

    $("#typePop").val(type);
    $("#typePop").change();

    $("#sectorPop").val(sector);
    $("#sectorPop").change();

    document.getElementById('updateDiv').style.display = "block";
}

// Function to hide sector div update
function updateUserHide(){
    document.getElementById('updateDiv').style.display = "none";
    cancelPopup("¡Cancelado!", "Se canceló la actualización del usuario...");
}

// section create user

function check_empty2() {
    if (document.getElementById('namePop2').value == "" || document.getElementById('userPop2').value == "" || document.getElementById('lastnamePop2').value == "" || document.getElementById('emailPop2').value == "" || document.getElementById('passwordPop2').value == "") {
        cancelPopup("¡Error!", "Llene todos los campos");
    } else {
        swal({
            title: "¡Creando usuario!",
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
function createUserShow(id){
    document.getElementById('userPop2').value="";
    document.getElementById('namePop2').value="";
    document.getElementById('lastnamePop2').value="";
    document.getElementById('emailPop2').value="";
    document.getElementById('passwordPop2').value="";

    $("#typePop2").val(2);
    $("#typePop2").change();

    $("#sectorPop2").val(id);
    $("#sectorPop2").change();

    document.getElementById('createDiv').style.display = "block";
}

// Function to hide sector div create
function createUserhide(){
    document.getElementById('createDiv').style.display = "none";
    cancelPopup("¡Cancelado!", "Se canceló la creación de un usuario...");
}

// section delete user

// Confirm delete multiple users
function delMultipleUser(){
    if(stack.length <= 1){
        cancelPopup("¡Error!", "No seleccionó suficientes registros");
    } else{
        swal({
            title: "¿Desea eliminar los siguientes registros?",
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
                $.post("/users",{ids:stack},
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

// Confirm delete oneUser
function delOneUser(id, username, type){
    swal({
        title: "¿Desea eliminar el registro?",
        text: "Eliminará a el "  + type + " " + username,
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
function delMultipleUserArray(id){
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
