require('../../connection.php');

$user = $_POST['user'];
$pass = $_POST['pass'];

$sql2 = "SELECT * FROM user WHERE user='$user' AND pass='$pass'";
$result = mysqli_query($link, $sql2);
$row = mysqli_fetch_assoc($result);


if(isset($row)){
	$data = [
		result => 0
	];
}else{
	$data = [
		result => -1,
		message => 'Wrong username or password.'
	];
}
header('Content-type: application/json');
echo json_encode($data);