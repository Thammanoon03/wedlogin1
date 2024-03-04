<!DOCTYPE html>
<html>
<head>
  <title>From</title>
  <style>
    .form-group {
      margin-bottom: 20px;
    }
    
    label {
      display: block;
      margin-bottom: 5px;
    }
    
    input[type="text"], select {
      width: 200px;
      padding: 5px;
      background-color: #f0f0f0;
      border: none;
    }
    
    input[type="submit"] {
      padding: 10px 20px;
      background-color: #4CAF50;
      color: white;
      border: none;
      cursor: pointer;
    }

    .form-container {
      width: 400px;
      margin: 0 auto;
      padding: 20px;
      border: 1px solid #ccc;
      border-radius: 5px;
      box-shadow: 5px 20px 50px #000;
      background-color: #bbdcfa;
      
    }
    
    .form-group {
      margin-bottom: 20px;
    }
    
    label {
      display: block;
      margin-bottom: 5px;
    }
    
    input[type="text"], select {
      width: 100%;
      padding: 5px;
    }
    
    input[type="submit"] {
      padding: 10px 20px;
      background-color: #14bebe;
      color: white;
      border: none;
      cursor: pointer;
    }
    body{
        background:repeating-linear-gradient(
          -45deg,
          #fff 0px,
          #fff 10px,
          #4ee3c2 10px,
          #4ee3c2 20px
        );
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
    h1{
        text-align: center;
    }
    input[type="number"],select{
        width: 100%;
        padding: 5px;
        background-color: #f0f0f0;
        border: none;
    }
    input[type="email"],select{
        width: 100%;
        padding: 5px;
        background-color: #f0f0f0;
        border: none;
    }
    input[type="password"],select{
        width: 100%;
        padding: 5px;
        background-color: #f0f0f0;
        border: none;
    }
  </style>
  
  <script>
    function validateForm() {
      var name = document.getElementById("name").value;
      var surname = document.getElementById("surname").value;
      var gender = document.getElementById("gender").value;
      var age = document.getElementById("age").value;
      var id = document.getElementById("id").value;
      var grade = document.getElementById("grade").value;
      var faculty = document.getElementById("faculty").value;
      var major = document.getElementById("major").value;
      var phone = document.getElementById("phone").value;
      var email = document.getElementById("email").value;
      var username = document.getElementById("username").value;
      var password = document.getElementById("password").value;
      if (
        name === "" ||
        surname === "" ||
        gender === "mal" ||  
        age === "" ||
        id === "" ||
        grade === "mal" ||  
        faculty === "" ||
        major === "" ||
        phone === "" ||
        email === "" ||
        username === "" ||
        password === ""
      ) {
        alert("กรุณากรอกข้อมูลให้ครบทุกช่อง");
        return false; 
      }else{
        alert("บันทึกข้อมูลเสร็จสิ้น");
      return true;
      }
    }
  </script>
</head>
<body>
    <div class="form-container">
  <h1>Form</h1>
  <form action="adddata.php" method="post" enctype="multipart/form-data">
    <div class="form-group">
      <label for="name">ชื่อ:</label>
      <input type="text" id="name" name="name">
    </div>
    
    <div class="form-group">
      <label for="surname">นามสกุล:</label>
      <input type="text" id="surname" name="surname">
    </div>
    
    <div class="form-group">
      <label for="gender">เพศ:</label>
      <select id="gender" name="gender">
        <option value="mal"></option>
        <option value="male">ชาย</option>
        <option value="female">หญิง</option>
        <option value="other">อื่น ๆ</option>
      </select>
    </div>
    
    <div class="form-group">
      <label for="age">อายุ:</label>
      <input type="number" id="age" name="age">
    </div>
    
    <div class="form-group">
      <label for="id">รหัสนักศึกษา:</label>
      <input type="number" id="id" name="id">
    </div>
    
    <div class="form-group">
      <label for="grade">ชั้นปี:</label>
      <select id="grade" name="grade">
        <option value="mal"></option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
      </select>
    </div>
    
    <div class="form-group">
      <label for="faculty">คณะ:</label>
      <input type="text" id="faculty" name="faculty">
    </div>
    
    <div class="form-group">
      <label for="major">สาขา:</label>
      <input type="text" id="major" name="major">
    </div>
    
    <div class="form-group">
      <label for="phone">เบอร์โทร:</label>
      <input type="text" id="phone" name="phone">
    </div>
    
    <div class="form-group">
      <label for="email">อีเมลล์:</label>
      <input type="email" id="email" name="email" pattern="[a-z0-9._%+\-]+@[a-z0-9.\-]+\.[a-z]{2,}$">
    </div>
    
    <div class="form-group">
      <label for="image">รูปภาพ:</label>
      <input type="file" id="image" name="image">
    </div>
    
    <div class="form-group">
      <label for="username">Username:</label>
      <input type="text" id="username" name="username" pattern="[0-9a-z]{12}" title="Three letter country code">
    </div>
    
    <div class="form-group">
      <label for="password">Password:</label>
      <input type="password" id="password" name="password" pattern=".{8,}" title="Eight or more characters">
    </div>
    
    <input type="submit" value="Submit" onclick="return validateForm();">
  </form>
    </div>
</body>
</html>