
function openForm() {
  document.getElementById("myForm").style.display = "block";
}

function closeForm() {
  document.getElementById("myForm").style.display = "none";
}

function addValues() {
  var table = document.getElementById("myTable");
    
  var row = table.insertRow(1);
    
  var cell0 = row.insertCell(0);
  cell0.align = "center";
  var cell1 = row.insertCell(1);
  var cell2 = row.insertCell(2);
  var cell3 = row.insertCell(3);
  var cell4 = row.insertCell(4);
  var cell5 = row.insertCell(5);
  cell5.align = "center";
  var cell6 = row.insertCell(6); //this is row good idk y wont link
    
  cell6.innerHTML = '<div align="center" style="font-size: 30px;"><i class="fas fa-circle" style="color: green;"></i></div>';
    
  cell0.innerHTML = '<a class="btn btn-danger" onclick="deleteRow(this)"><em class="fa fa-trash" id="trash"></em></a>';
    
  cell1.innerHTML = document.getElementById("foodName").value;
  cell2.innerHTML = document.getElementById("foodAmount").value;;
  cell3.innerHTML = document.getElementById("foodExpiration").value;
  cell4.innerHTML = document.getElementById("foodDescription").value;

  var newImage = document.createElement("IMG");
  newImage.src = URL.createObjectURL(document.getElementById("foodImage").files[0]);
  newImage.height = "70";
  newImage.width = "70";
  cell5.appendChild(newImage);
    
  //cell6.innerHTML = document.getElementById("goodYeah").value;
  
 
}
//this always deletes row 1 no matter what
//function deleteRow(input) {
   // var i = r.parentNode.parentNode.rowIndex;
    //document.getElementById("myTable").deleteRow(input);// was 1 needs the input 
//}
function deleteRow(btn) {
  var row = btn.parentNode.parentNode;
  row.parentNode.removeChild(row);
}

function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#blah')
                    .attr('src', e.target.result)
                    .width(70)
                    .height(70);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }