function addStyle() {
  var head = document.getElementsByTagName('HEAD')[0];
  var link = document.createElement('link');
  link.rel = 'stylesheet';
  link.type = 'text/css';
  link.href = 'https://dadoroom.com/tickets/styleInject.css';
  head.appendChild(link);
}
function addBootstratp() {
  var head = document.getElementsByTagName('HEAD')[0];
  var link = document.createElement('link');
  link.rel = 'stylesheet';
  link.type = 'text/css';
  link.href = 'https://dadoroom.com/tickets/assets/local/bootstrap.min.css';
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

//CREAR 
var boton;
if (getCookie("automatico") == "true" || getCookie("automatico") == true) {
  boton = "<input type='button' id='btnDesactivar' value='Desactivar' class='btn btn-warning'> <div id='divTabla' class='container'></div>";
} else {
  boton = "<input type='button' id='btnActivar' value='Activar' class='btn btn-warning'> <div id='divTabla' class='container'></div>";

}
var componente = document.getElementById("listitem")
componente.innerHTML = boton;
componente.style.display = "block";

//VERIFICAR SI 
var errorMSG = document.getElementsByClassName('red');
var successMSG = document.getElementsByClassName('green');

if (errorMSG.length > 0) { //EXISTE
  statusTicket("DISAPPROVED");
}
if (successMSG.length > 0) { //EXISTE
  statusTicket("VALITED");
}

async function recargar() {
  //BUSCAR PRIMER TICKET NO VALIDADO 
  console.log("Recargar")
  var resp = await fetch('https://dadoroom.com/tickets/Tickets/buscarTicket');
  const ticket = await resp.json();
  console.log(ticket)
  if (ticket != null) {

    console.log(ticket)
    console.log(ticket.ticketNumber)
    document.getElementById("txtCardNr").value = ticket.ticketNumber;
    document.cookie = "idTicket=" + ticket.idTicket;
    document.cookie = "ticket=" + ticket.ticketNumber;
    document.getElementById("btnSendODSRequest").click();
  } else {
    console.log("NO HAY TICKETS");
    document.cookie = "automatico=false";
    window.location.replace("http://50.246.39.154:9000/WebValidationManager");
  }
}
console.log("automatico: " + getCookie("automatico"))

if (getCookie("automatico") == "true") {

  document.getElementById("btnDesactivar").onclick = function () {
    document.cookie = "automatico=false";
  };
  setTimeout(recargar, 5000);
} else {
  document.getElementById("btnActivar").onclick = function () {
    document.cookie = "automatico=true";
  };

}


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
    var tabla = "<table id='table_tickets' class='table' >" + tableHead;
    tabla += "<tbody>";
    ticket.forEach(function (value) {
      tabla += "<tr>";

      tabla += "<td>" + value.name + "</td>";
      tabla += "<td>" + value.email + "</td>";
      tabla += "<td>" + value.ticketNumber + "</td>";
      tabla += "<td class='" + value.statusTicket + "'>" + value.statusTicket + "</td>";
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

addStyle();
addBootstratp();
tabla();