function addStyle() {
  var head = document.getElementsByTagName('HEAD')[0];
  var link = document.createElement('link');
  link.rel = 'stylesheet';
  link.type = 'text/css';
  link.href = 'https://dadoroom.com/tickets/styleInject.css';
  head.appendChild(link);
}

//VERIFICAR SI SE MUESTRA EL LOGIN
var login = document.getElementById('txtName');

if (login) {
  loginAutomatic()

  console.log("PANTALLA DE LOGIN");
} else {
  console.log("PANTALLA DE INGRESO");

}

async function loginAutomatic() {
  var resp = await fetch('https://dadoroom.com/tickets/Tickets/useData');
  const response = await resp.json();
  document.getElementById('txtName').value = response.user
  document.getElementById('txtPassword').value = response.pass
  document.getElementById("btnLogin").click();
}

//CREAR BOTON
var boton = "<input type='button' id='btnAccion' value='Validar' > <div id='divTabla'></div>";
document.getElementById("listitem").innerHTML = boton;

//VERIFICAR SI 
var errorMSG = document.getElementsByClassName('red');
var successMSG = document.getElementsByClassName('green');

if (errorMSG.length > 0) { //EXISTE
  statusTicket("DISAPPROVED");
}
if (successMSG.length > 0) { //EXISTE
  statusTicket("VALITED");
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

  if (status == "APPROVED") {

    document.getElementById("PanelMessages").innerHTML += "<div class='mensaje' >Se aprobo el ticket " + ticket + "</div>";
  } else if (status == "DISAPPROVED") {
    document.getElementById("PanelMessages").innerHTML += "<div class='mensaje' >No se aprobo el ticket " + ticket + "</div>";

  }

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
  if (ticket != null) {

    var tableHead = "<thead><th>Name</th><th>Email</th><th>Ticket Number</th><th>Status</th><th>Time</th></thead>"
    var tabla = "<table id='table_tickets' >" + tableHead;
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
addStyle();
tabla();