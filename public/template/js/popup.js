
// Validating Empty Field
function check_empty() {
if (document.getElementById('namePop').value == "" || document.getElementById('userPop').value == "" || document.getElementById('lastnamePop').value == "" || document.getElementById('emailPop').value == "" || document.getElementById('typePop').value == "" || document.getElementById('sectorPop').value == "") {
alert("Por favor llene todos los campos");
} else {
document.getElementById('formPop').submit();
alert("Actualización correcta...");
}
}
//Function To Display Popup
function div_show(id, username, name, lastname, email, type, sector) {
document.getElementById('userPop').value=username;
document.getElementById('namePop').value=name;
document.getElementById('lastnamePop').value=lastname;
document.getElementById('emailPop').value=email;

$("#typePop").val(type);
$("#typePop").change();

$("#sectorPop").val(sector);
$("#sectorPop").change();

document.getElementById('abc').style.display = "block";
}
//Function to Hide Popup
function div_hide(){
document.getElementById('abc').style.display = "none";
}

// Confirm all
function div_show2(){
document.getElementById('abc2').style.display = "block";
}
function div_hide2(){
document.getElementById('abc2').style.display = "none";
}
function deleteRegAll(){
document.getElementById('formPop2').submit();
}

// Confirm one
function div_show3(id){
document.getElementById('abc3').style.display = "block";
}
function div_hide3(){
document.getElementById('abc3').style.display = "none";
}
function deleteReg(){
document.getElementById('formPop3').submit();
}
