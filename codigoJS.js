//VERIFICAR SI SE MUESTRA EL LOGIN
var login = document.getElementById('txtName');

if (login) {

  document.getElementById('txtName').value = "Test2"
  document.getElementById('txtPassword').value = "Testing123!"
  document.getElementById("btnLogin").click();

  console.log("PANTALLA DE LOGIN");
} else {
  console.log("PANTALLA DE INGRESO");

}

//CREAR BOTON
var boton = "<input type='button' id='btnAccion' value='Validar'style='padding:2%; background: #fff'> <div id='divTabla'></div>";

var componente = document.getElementById("listitem")
componente.style.display = "block";
document.getElementById("listitem").style.textAlign = "center";
document.getElementById("listitem").innerHTML = boton;

//VERIFICAR SI 
var errorMSG = document.getElementsByClassName('red');
var successMSG = document.getElementsByClassName('green');

if (errorMSG.length > 0) { //EXISTE
  statusTicket("DISAPPROVED");
}
if (successMSG.length > 0) { //EXISTE
  statusTicket("APPROVED");
}

//BUSCAR PRIMER TICKET NO VALIDADO
async function recargar() {
  var resp = await fetch('https://dadoroom.com/tickets/Tickets/buscarTicket');
  const ticket = await resp.json();
  if (ticket != null) {

    console.log(ticket)
    console.log(ticket.ticketNumber)
    document.getElementById("txtCardNr").value = ticket.ticketNumber;
    document.cookie = "idTicket=" + ticket.idTicket;
    document.cookie = "ticket=" + ticket.ticketNumber;
    document.getElementById("btnSendODSRequest").click();
  } else {
    console.log("NO HAY TICKETS");
  }
}

document.getElementById("btnAccion").onclick = function () {
  recargar();
};

//STATUS DEL TICKET
async function statusTicket(status) {
  var idTicket = getCookie("idTicket");
  var ticket = getCookie("ticket");

  document.getElementById("PanelMessages").innerHTML += "<div style='display:inline-block;margin:2% auto;'>No se aprobo el ticket " + ticket + "</div>";

  console.log("No se aprobo el ticket " + ticket);

  var resp = await fetch('https://dadoroom.com/tickets/Tickets/estatusTicket?' +
    'estatus=' + status +
    '&idTicket=' + idTicket +
    '&ticket=' + ticket
  );
  const respuesta = await resp.json();
  console.log(respuesta);
}
async function tabla() {

  var resp = await fetch('https://dadoroom.com/tickets/Tickets/tabla');
  const ticket = await resp.json();
  var tablaStyle = " style='background: #fff;width: 100%;border: solid 1px;padding: 1%;margin-top:2%;'";
  var headStyle = " style='background: #fff;width: 100%;border: solid 1px;padding: 1%;'";
  var tableHead = "<thead><th>Name</th><th>Email</th><th>Ticket Number</th><th>Status</th><th>Time</th></thead>"
  var tabla = "<table " + tablaStyle + ">" + tableHead;
  tabla += "<tbody>";
  ticket.forEach(function (value) {
    tabla += "<tr>";

    tabla += "<td>" + value.name + "</td>";
    tabla += "<td>" + value.email + "</td>";
    tabla += "<td>" + value.ticketNumber + "</td>";
    tabla += "<td>" + value.statusTicket + "</td>";
    tabla += "<td>" + value.dateRegister + "</td>";
    tabla += "</tr>";
  });
  tabla += "</tbody>"
  tabla += "</table>"
  document.getElementById("divTabla").innerHTML += tabla;

}

function getCookie(cname) {
  let name = cname + "=";
  let decodedCookie = decodeURIComponent(document.cookie);
  let ca = decodedCookie.split(';');
  for (let i = 0; i < ca.length; i++) {
    let c = ca[i];
    while (c.charAt(0) == ' ') {
      c = c.substring(1);
    }
    if (c.indexOf(name) == 0) {
      return c.substring(name.length, c.length);
    }
  }
  return "";
}
//setTimeout(aprobar, 5000);
tabla();