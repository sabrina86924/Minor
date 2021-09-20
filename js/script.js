// Tabel sorteren //
function tabelSorteren(n) {

  let tabel, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
  tabel = document.getElementById("mijnTabel");
  switching = true;
  dir = "asc";

  while (switching) {
    switching = false;
    rows = tabel.rows;
    for (i = 1; i < (rows.length - 1); i++) {
      shouldSwitch = false;
      x = rows[i].getElementsByTagName("TD")[n];
      y = rows[i + 1].getElementsByTagName("TD")[n];

      if (dir == "asc") {
        if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
          shouldSwitch = true;
          break;
        }
      } else if (dir == "desc") {
        if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
          shouldSwitch = true;
          break;
        }
      }
    }
    if (shouldSwitch) {
      rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
      switching = true;
      switchcount++;
    } else {
      if (switchcount == 0 && dir == "asc") {
        dir = "desc";
        switching = true;
      }
    }
  }
}

// Datum //
const maanden = ["januari", "februari", "maart", "april", "mei", "juni", "juli", "augustus", "september", "oktober", "november", "december"];
const dagen = ['maandag', 'dinsdag', 'woensdag', 'donderdag', 'vrijdag', 'zaterdag', 'zondag']

function nul(i) {
  if (i < 10) {
    i = "0" + i;
  } return i;
}


let datum = new Date();
let dag = datum.getDay() - 1;
let nummer = datum.getDate();
let maand = datum.getMonth();
let jaar = datum.getFullYear();
let uur = nul(datum.getHours());
let minuut = nul(datum.getMinutes());
let seconde = nul(datum.getSeconds());


setInterval(function () {
  let datum = new Date();
  let dag = datum.getDay() - 1;
  let nummer = datum.getDate();
  let maand = datum.getMonth();
  let jaar = datum.getFullYear();
  let uur = nul(datum.getHours());
  let minuut = nul(datum.getMinutes());
  let seconde = nul(datum.getSeconds());
  document.getElementById('datum').innerHTML = "Het is vandaag " + dagen[dag] + " " + nummer + " " + maanden[maand] + " " + jaar + ", <br>" + uur + ":" + minuut + ":" + seconde + ".";

}, 1000);


