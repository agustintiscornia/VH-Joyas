<?php

    $name = $mail = $country = $message = $body = $success = $error = "";

    if(isset($_POST["submit"])){

        $name = test_input($_POST["name"]);
        $mail = test_input($_POST["mail"]);
        $message = test_input($_POST["message"]);
        $country = test_input($_POST["country"]);

        // ENVIO DEL FORMULARIO
        if($name != "" and $mail != "" and $message != "" and $country != ""){

            $to = "vhjoyas@gmail.com";

            $subject = "CLIENTE NUEVO";

            $body .= "Nombre: ".$name."\r\n";
            $body .= "Mail: ".$mail."\r\n";
            $body .= "País: ".$country."\r\n";
            $body .= "Mensaje: ".$message;

            if(mail($to,$subject,$body)){
                $success = "Tu mensaje ha sido enviado ¡Gracias!";
                $name = $mail = $message = $country = "";
            } else {
                $error = "No se pudo enviar el mensaje";
            }

        } else {
            $error = "Porfavor complete todos los campos";
        }

    }

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

?>