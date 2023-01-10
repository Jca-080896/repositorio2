<?php

if ($_SERVER['REQUEST_METHOD'] == "POST")
{
    $user=$_POST['username'];
    $pass = $_POST['password'];
    $priv=$_POST['privilegio'];

    $ins = json_encode(array("username" => $user, "password" => $pass,"privilegio" =>$priv));

    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => 'http://127.0.0.1/api_restful/controllers/Usuario.php?op=selectall',
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'GET',
      CURLOPT_POSTFIELDS =>$ins,
      CURLOPT_HTTPHEADER => array(
        'Content-Type: text/plain'
      ),
    ));
    
    $response = curl_exec($curl);
    
    curl_close($curl);
    
    $data = json_decode($response, true);

    if ($data[0]["username"] == $user && $data[0]["password"] == $pass)
    {
        $entrar='loginsi';
        echo "<script>
             alert('Bienvenido');
            location.href = 'index.php';
    </script>";
    }else
    {
        $entrar='loginno';
        echo "<script>
              alert('Usuario o contraseña incorrecta');
               location.href = 'login+
               -.php';
     </script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <div class="container">
     <center>   
             <h1>Iniciar Sesión</h1>
    </center>
        <center>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form">
                <input type="text" name="user" id="usuariolbl" class="form">
                <label for="usuario">Usuario</label>
            </div>
            <div class="form">
                <input type="password" name="pwd" id="passwordlbl" class="form">
                <label for="passwordlbl">Contraseña</label>
            </div>
            <br>
            <input type="submit" name="enviar" value="Enviar" class="btn btn-success">
        </form>
    </div>
</body>
</html>