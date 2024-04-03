var modal = document.getElementById("myModal");
var modal1 = document.getElementById("myArtikel");
var btn1 = document.getElementById("btn-artikel");
var span1 = document.getElementsByClassName("close1")[0]; 

btn1.onclick = function() {
  modal1.style.display = "block";
}

span1.onclick = function() {
  modal1.style.display = "none";
}

window.onclick = function(event) { 
  if (event.target == modal1) {
    modal1.style.display = "none";
  }
}

function tambahpreviewImage(event) {
  var reader1 = new FileReader();
  reader1.onload = function(){
    var output1 = document.getElementById('tambahpreview');
    output1.src = reader1.result;
    output1.style.display = 'block';
  };
  reader1.readAsDataURL(event.target.files[0]);
}

function previewImage(event) {
  var reader = new FileReader();
  reader.onload = function(){
    var output = document.getElementById('preview');
    output.src = reader.result;
    output.style.display = 'block';
  };
  reader.readAsDataURL(event.target.files[0]);
}