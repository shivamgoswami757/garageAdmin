<?php
$servername = "localhost";
$username = "root";
$password = "123456";
$dbname = "garage_hub";
//
// $conn = new mysqli($servername, $username, $password, $dbname);
//
// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// }
// $conn->query("SET NAMES utf8");
//
// $sql = "INSERT INTO `garage_hub`.`residents` (`id`, `email`, `name`, `surname`, `date_of_birth`, `access_level`, `balance`, `team`, `project`, `password`, `time_in_garage`, `date_of_registration`) VALUES (NULL, 'ingoilya99@gmail.com', 'Юзверь', 'Ждунович', '2017-03-01', '9', '172564', NULL, 'mdkjshgjfcnb', '11111111', '12345678909876543', '2017-06-14');";
//
//
// if ($conn->query($sql) === TRUE) {
//     echo "New record created successfully";
// } else {
//     echo "Error: " . $sql . "<br>" . $conn->error;
// }
//
// $conn->close();
 ?>

 <div id="addResident">
   <table>
     <tr>
       <th>имя</th>
       <th>фамилия</th>
       <th>почта</th>
       <th>дата рождения</th>
     </tr>
     <tr>
       <td><input id="name" type="text" name="" value=""></td>
       <td><input id="surname"type="text" name="" value=""></td>
       <td><input id="email" type="text" name="" value=""></td>
       <td><input id="dateOfBirth" type="text" name="" value=""></td>
     </tr>
     <tr>
       <td id="nameError" class="inputError"></td>
       <td id="surnameError" class="inputError"></td>
       <td id="emailError" class="inputError"></td>
       <td id="dateOfBirthError" class="inputError"></td>
     </tr>
     <tr>
       <th>уровень доступа</th>
       <th>команда</th>
       <th>пароль</th>
     </tr>
     <tr>
       <td><input id="accessLevel"type="text" name="" value=""></td>
       <td><input id="team" type="text" name="" value=""></td>
       <td><input id="password" type="text" name="" value="garage"></td>
       <td id="createBtn"><span>cоздать немедленно</span></td>
     </tr>
     <tr>
       <td id="accessLevelError" class="inputError"></td>
       <td id="teamError" class="inputError"></td>
       <td id="passwordError" class="inputError"></td>
       <td id="createError" class="inputError"></td>
     </tr>
   </table>

 </div>
 <script type="text/javascript">
function colorValidationOnBlur() {
  if (this.isValid) {
    this.style["border-color"] = "#BDBDBD";
  } else {
    this.oninput();
    this.style["border-color"] = "red";
  }
}

function colorValidationOnFocus() {
  if (this.isValid) {
    this.style["border-color"] = "#4DB6AC";
  } else {
    this.oninput();
    this.style["border-color"] = "red";
  }
}

function createNewUser() {
  var valid = true;
  for (i in input) {
    valid = input[i].isValid && valid;
  }
  if (valid) {
    this.inputError.innerHTML = "создаем нового резидента";
    this.style.color = "#4DB6AC";

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        if(this.responseText == "OK") {
          createBtn.style.color = "";
          createBtn.inputError.innerHTML = this.responseText;
          loadResidentsTable();

        } else {
          createBtn.style.color = "red";
          createBtn.inputError.innerHTML = "ошибка на сервере"
        }
      }
    };
    xhttp.open("POST", "request/createResident.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("name="+input["name"].value+"&surname="+input["surname"].value+"&email=" +
                input["email"].value+"&dateOfBirth="+(input["dateOfBirth"].date.getTime() - input["dateOfBirth"].date.getTimezoneOffset()*60000) +
                "&accessLevel="+input["accessLevel"].value+"&team="+input["team"].value +
                "&password="+input["password"].value);

  } else {
    this.inputError.innerHTML = "шото непровально заполнил";
    this.style.color = "";
  }
}

function enterKeyPress(e) {
  if (e.which == 13) {
    createBtn.onclick();
  }
}
 var input = [];
 input["name"] = document.getElementById("name");
 input["name"].isValid = false;
 input["name"].inputError = document.getElementById("nameError");
 input["name"].oninput = function() {
   if (this.value.length > 100 || this.value.length == 0) {
     this.style["border-color"] = "red";
     this.inputError.innerHTML = "тут слишком много букв, или мало";
     this.isValid = false;
   } else {
     this.style["border-color"] = "#4DB6AC";
     this.isValid = true;
     this.inputError.innerHTML = "";

   }
 }
 input["name"].onblur = colorValidationOnBlur;
 input["name"].onfocus = colorValidationOnFocus;

 input["surname"] = document.getElementById("surname");
 input["surname"].isValid = false;
 input["surname"].inputError = document.getElementById("surnameError");
 input["surname"].oninput = input["name"].oninput;
 input["surname"].onblur = colorValidationOnBlur;
 input["surname"].onfocus = colorValidationOnFocus;



 input["dateOfBirth"] = document.getElementById("dateOfBirth");
 input["dateOfBirth"].isValid = false;
 input["dateOfBirth"].inputError = document.getElementById("dateOfBirthError");
 input["dateOfBirth"].oninput = function() {
   if (this.value.length === 2 || this.value.length === 7) {
     this.value += " / ";

   }
   var strDate = this.value.split(" / ");
   this.date = new Date(strDate[2], strDate[1] - 1, strDate[0]);
   if (this.date.toString() !== "Invalid Date") {
     this.style["border-color"] = "#4DB6AC";
     this.inputError.innerHTML = ""
     this.isValid = true;
   } else {
     this.style["border-color"] = "red";
     this.inputError.innerHTML = "разве есть такая дата?";
     this.isValid = false;
   }
 }
 input["dateOfBirth"].onblur = colorValidationOnBlur;
 input["dateOfBirth"].onfocus = colorValidationOnFocus;

 input["email"] = document.getElementById("email");
 input["email"].isValid = false;
 input["email"].inputError = document.getElementById("emailError");
 input["email"].oninput = function() {
   if (/^[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/.test(this.value)) {
     this.style["border-color"] = "#4DB6AC";
     this.inputError.innerHTML = ""
     this.isValid = true;
   } else {
     this.style["border-color"] = "red";
     this.inputError.innerHTML = "как-то не очень похоже на почту";
     this.isValid = false;
   }
 }
 input["email"].onblur = colorValidationOnBlur;
 input["email"].onfocus = colorValidationOnFocus;

 input["accessLevel"] = document.getElementById("accessLevel");
 input["accessLevel"].isValid = false;
 input["accessLevel"].inputError = document.getElementById("accessLevelError");
 input["accessLevel"].oninput = function() {
   if (this.value <= 10 && this.value > 0 && /[0-9]/.test(this.value)) {
     this.style["border-color"] = "#4DB6AC";
     this.inputError.innerHTML = ""
     this.isValid = true;
   } else {
     this.style["border-color"] = "red";
     this.inputError.innerHTML = "неверный формат уровня доступа";
     this.isValid = false;
   }
 }
 input["accessLevel"].onblur = colorValidationOnBlur;
 input["accessLevel"].onfocus = colorValidationOnFocus;

 input["team"] = document.getElementById("team");
 input["team"].isValid = true;
 input["team"].inputError = document.getElementById("teamError");

 input["password"] = document.getElementById("password");
 input["password"].isValid = true;
 input["password"].inputError = document.getElementById("passwordError");


 for (var i in input) {
   input[i].onkeyup = enterKeyPress;
 }

 var createBtn = document.getElementById("createBtn");
 createBtn.onclick = createNewUser;
 createBtn.inputError = document.getElementById("createError");



 </script>
