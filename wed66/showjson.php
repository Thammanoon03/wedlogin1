
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php
$json = file_get_contents("http://localhost:89/wed66//jsondata.php");
$data = json_decode($json);
$checklogin='0';
foreach($data as $keylogin) {
    if($keylogin->username==$_POST['username'] and $keylogin->password==$_POST['password']){
        $checklogin=$keylogin->username;
    }
}
if($checklogin == '0'){
    echo "<script language='javascript'> alert('รหัสผ่านไม่ถูกต้อง');
 window.location='login.php';</script>";
}
?>
<style>
    body{
        background:rgb(196, 247, 244);
    }
    th{
        background:rgb(151, 166, 250);
    }
    button{
        width: 60px;
	    height: 40px;
	    margin: 2px auto;
	    justify-content: center;
	    display: block;
        border: none;
        outline: none;
        border-radius: 5px;
        font-family: 'Times New Roman', Times, serif;
        float: center;
        background:#00ff40 ;
    }
</style>
<body>
<div class="container-fluid">
    <h2>ข้อมูลผู้ลงทะเบียน</h2>
    <table class="table table-striped table-bordered ">
        <thead>
            <tr>
                <th>Name</th>
                <th>Surname</th>
                <th>Gender</th>
                <th>age</th>
                <th>id</th>
                <th>grade</th>
                <th>faculty</th>
                <th>major</th>
                <th>phone</th>
                <th>email</th>
                <th>username</th>
                <th>password</th>
                <th>image</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data as $keyjson) : ?>
                <tr>
                    <td><?php echo $keyjson->name; ?></td>
                    <td><?php echo $keyjson->surname; ?></td>
                    <td><?php echo $keyjson->gender; ?></td>
                    <td><?php echo $keyjson->age; ?></td>
                    <td><?php echo $keyjson->id; ?></td>
                    <td><?php echo $keyjson->grade; ?></td>
                    <td><?php echo $keyjson->faculty; ?></td>
                    <td><?php echo $keyjson->major; ?></td>
                    <td><?php echo $keyjson->phone; ?></td>
                    <td><?php echo $keyjson->email; ?></td>
                    <td><?php echo $keyjson->username; ?></td>
                    <td><?php echo $keyjson->password; ?></td>
                    <td><img src='image77/<?php echo $keyjson->image; ?> ' width ="160" height ="90"></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <button><a  href="login.php">Back</a></button>
</div>
</body>
