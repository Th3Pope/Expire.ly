
function openForm() {
  document.getElementById("myForm").style.display = "block";
}
function openForm2() {
  document.getElementById("myForm2").style.display = "block";
}
function closeForm() {
    document.getElementById("myForm").style.display = "none";
    document.getElementById("foodName").value = "";
    document.getElementById("foodAmount").value = "";
    document.getElementById("foodExpiration").value = "";
    document.getElementById("foodDescription").value = "";
    document.getElementById("foodImage").value = "";

    $('#blah').attr("src", "image.jpg");
}
function closeForm2() {
  document.getElementById("myForm2").style.display = "none";
    document.getElementById("leftName").value = "";
    document.getElementById("leftAmount").value = "";
    document.getElementById("leftExpiration").value = "";
    document.getElementById("leftDescription").value = "";
}

function addValues() {
    
  var table = document.getElementById("myTable")||document.getElementById("myTable2"); 
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
    
  cell1.innerHTML = document.getElementById("foodName").value||document.getElementById("leftName").value;
    
  cell3.innerHTML = document.getElementById("foodAmount").value||document.getElementById("leftAmount").value;
    
  var str = " days from ";
    
  cell2.innerHTML = document.getElementById("foodExpiration").value||document.getElementById("leftExpiration").value + str + today; 
    
  cell4.innerHTML = document.getElementById("foodDescription").value||document.getElementById("leftDescription").value;

var newImage = document.createElement("IMG");
  newImage.src = URL.createObjectURL(document.getElementById("foodImage").files[0]);
  newImage.height = "70";
  newImage.width = "70";
  cell5.appendChild(newImage);  
 }

function deleteRow(btn) {
  var row = btn.parentNode.parentNode;
  row.parentNode.removeChild(row);
}

function readURL(input) {

    if (input.files[0]) {
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

/* When the user clicks on the button,
toggle between hiding and showing the dropdown content */
function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}

function filterFunction() {
  var input, filter, ul, li, a, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  div = document.getElementById("myDropdown");
  a = div.getElementsByTagName("a");
  for (i = 0; i < a.length; i++) {
    txtValue = a[i].textContent || a[i].innerText;
    if (txtValue.toUpperCase().indexOf(filter) > -1) {
      a[i].style.display = "";
    } else {
      a[i].style.display = "none";
    }
  }
}

var expanded = false;
    function showCheckboxes(){
        var checkboxes = document.getElementById("checkboxes");
        if(!expanded){
            checkboxes.style.display = "block";
            expanded = true;
        }else{
            checkboxes.style.display = "none";
            expanded = false;
        }
    }

