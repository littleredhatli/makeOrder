$conn = mysqli_connect('localhost', 'root' ,'' , 'makeorder');
if (mysqli_connect_errno() !== 0) {
    die(mysqli_connect_error());
}
