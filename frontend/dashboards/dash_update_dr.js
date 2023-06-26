let json_ret;
let json_ret_len;

function set_status_complete(deli_id) {
  let xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      console.log(this.responseText);

      // send data to php

      // Data to be sent to PHP
let data = {
  delivery_id: deli_id
};

// AJAX request using Fetch API
fetch('../set_status/set_complete.php', {
  method: 'POST',
  headers: {
    'Content-Type': 'application/json',
  },
  body: JSON.stringify(data),
})
  .then(response => response.json())
  .then(result => {
    // Handle the response from PHP
    console.log(result);
  })
  .catch(error => {
    // Handle any errors
    console.error(error);
  });







    }
  };

  xhttp.open("GET", "../set_status/set_completed.php", false);
  xhttp.send();
}

function set_status_ongoing() {
  let xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      console.log("ready Action: done");
    }
  };

  xhttp.open("GET", "../set_status/set_ongoing.php", true);
  xhttp.send();
}

function load_cur_del() {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      json_ret = JSON.parse(this.responseText);
      console.log(json_ret);
      json_ret_len = json_ret.length;
      console.log(json_ret.length);
      console.log("b4 loop");
      let tbody = document.getElementById("tbody_cur");

      let i = 0;
      while (i < json_ret_len) {
        console.log("in loop");
        let finishbtn = document.createElement("button");
        finishbtn.textContent = "Mark as completed"
        finishbtn.classList.add("action-btn");
        finishbtn.type = 'button';
       

        let rowid = 'complete_btn' + i

        let td = "<td>" + json_ret[i].order_desc + "</td>" +
          "<td>" + json_ret[i].delivery_location + "</td>" +
          "<td>" + json_ret[i].truck_no_plate + "</td>" +
          "<td>" + json_ret[i].delivery_date_end + "</td>" +
          "<td>" + json_ret[i].order_qty + "</td>" +
          "<td id='" + rowid + "' >" + "</td>";

        let row = document.createElement("tr");
        row.innerHTML = td;
        // row.appendChild(finishbtn)
        row.dataset.del_id = json_ret[i].delivery_id;

        tbody.appendChild(row);
        finishbtn.addEventListener('click', function(e) {
          let del_id = e.target.closest('tr').dataset.del_id;
          url = set_status_complete(del_id);
          console.log('competed clicked')
          console.log(url)
          console.log("function executing")

          setTimeout(function (){
            window.location.reload();
          }, 1000)
          

        });
        document.getElementById(rowid).appendChild(finishbtn);

        i++;
      }
    }
  };
  xhttp.open("GET", "../textscripts/curDel.php", true);
  xhttp.send();
}

function load_rec_del() {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      json_ret = JSON.parse(this.responseText);
      console.log(json_ret);
      json_ret_len = json_ret.length;
      console.log(json_ret.length);
      console.log("b4 loop");
      let tbody = document.getElementById("tbody_rec");

      let i = 0;
      while (i < json_ret_len) {
        console.log("in loop");

        let td = "<td>" + json_ret[i].order_desc + "</td>" +
          "<td>" + json_ret[i].delivery_location + "</td>" +
          "<td>" + json_ret[i].truck_no_plate + "</td>" +
          "<td>" + json_ret[i].delivery_date_end + "</td>" +
          "<td>" + json_ret[i].order_qty + "</td>";
        let row = document.createElement("tr");
        row.innerHTML = td;
        tbody.appendChild(row);

        i++;
      }
    }
  };
  xhttp.open("GET", "../textscripts/recDel.php", true); // Corrected the file path
  xhttp.send();
}

// function load_up_del() {
//   var xhttp = new XMLHttpRequest();
//   xhttp.onreadystatechange = function() {
//     if (this.readyState == 4 && this.status == 200) {
//       json_ret = JSON.parse(this.responseText);
//       console.log(json_ret);
//       json_ret_len = json_ret.length;
//       console.log(json_ret.length);
//       console.log("b4 loop");
//       let tbody = document.getElementById("tbody_up");

//       let i = 0;
//       while (i < json_ret_len) {
//         console.log("in loop");

//         let td = "<td>" + json_ret[i].order_desc + "</td>" +
//           "<td>" + json_ret[i].delivery_location + "</td>" +
//           "<td>" + json_ret[i].truck_no_plate + "</td>" +
//           "<td>" + json_ret[i].delivery_date_end + "</td>" +
//           "<td>" + json_ret[i].order_qty + "</td>";
//         let row = document.createElement("tr");
//         row.innerHTML = td;
//         tbody.appendChild(row);

//         i++;
//       }
//     }
//   };
//   xhttp.open("GET", "./textscripts/upDel.php", true); // Corrected the file path
//   xhttp.send();
// }

function load_up_del() {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      json_ret = JSON.parse(this.responseText);
      console.log(json_ret);
      json_ret_len = json_ret.length;
      console.log(json_ret.length);
      console.log("b4 loop");
      let tbody = document.getElementById("tbody_up");

      let i = 0;
      while (i < json_ret_len) {
        console.log("in loop");
        let ongoingbtn = document.createElement("button");
        ongoingbtn.textContent = "Start"
        ongoingbtn.classList.add("action-btn");
        ongoingbtn.type = 'button';
        ongoingbtn.addEventListener('click', function(e) {
          url = set_status_ongoing();
          console.log(url)

          setTimeout(function (){
            window.location.reload();
          }, 1000)
          

        });

        let td = "<td>" + json_ret[i].order_desc + "</td>" +
          "<td>" + json_ret[i].delivery_location + "</td>" +
          "<td>" + json_ret[i].truck_no_plate + "</td>" +
          "<td>" + json_ret[i].delivery_date_end + "</td>" +
          "<td>" + json_ret[i].order_qty + "</td>" +
          "<td id="+'ongoing-btn' + i +">"+"</td>";

        let row = document.createElement("tr");
        row.innerHTML = td;
        tbody.appendChild(row);
        document.getElementById('ongoing-btn'+i).appendChild(ongoingbtn);

        i++;
      }
    }
  };
  xhttp.open("GET", "../textscripts/upDel.php", true);
  xhttp.send();
}

load_cur_del();
load_rec_del();
load_up_del();


