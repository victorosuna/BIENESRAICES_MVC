<?php  

namespace Controllers;

use MVC\Router;
use Model\Propiedad;
use PHPMailer\PHPMailer\PHPMailer;


class PaginasController{
    public static function index(Router $router){
        $propiedades = Propiedad::get(3);
        $inicio = true;

        $router->render('paginas/index', [
            'propiedades' => $propiedades,
            'inicio' => $inicio
        ]);
    }

    public static function nosotros(Router $router){
        

        $router->render('paginas/nosotros');
    }

    public static function propiedades(Router $router){
        
        $propiedades = Propiedad::all();

        $router->render('paginas/propiedades', [
            'propiedades' => $propiedades
        ]);
    }
        public static function propiedad(Router $router){

            $id = validarORedireccionar('/propiedades');
            $propiedad = Propiedad::find($id);
            
            $id = $_GET['id'];
            $id = filter_var($id, FILTER_VALIDATE_INT);

                if(!$id){
                    header ("location: /");
                }
            
            $router->render('paginas/propiedad', [
                'propiedad' => $propiedad
            ]);
        }

        public static function blog(Router $router){
            

            $router->render('paginas/blog', []);
        }

        public static function entrada(Router $router){
            $router->render('paginas/entrada', []);
        }

        public static function contacto(Router $router){

            $mensaje = null;
       
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            
            $respuestas = $_POST['contacto'];


            //Create an instance; passing `true` enables exceptions
            $mail = new PHPMailer();



            
                //Server settings                    //Enable verbose debug output
                $mail->isSMTP();                                            //Send using SMTP
                $mail->Host = 'smtp.mailtrap.io';                     //Set the SMTP server to send through
                $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                $mail->Username   = '74bbac7b09d5aa';                     //SMTP username
                $mail->Password   = '23008376b80e6b';                               //SMTP password
                $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
                $mail->Port       = 2525;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

                //Recipients
                $mail->setFrom('kinorace@gmail.com', 'Kino Race');
                $mail->addAddress('vmot813456@gmail.com', 'Victor');     //Add a recipient
                //Set email format to HTML
                $mail->Subject = 'Here is the subject';

                //Content
                $mail->isHTML(true); 
                $mail->CharSet = 'UTF-8';    
                
                
                $contenido = '<html>';
                $contenido .= '<p>Tienes un nuevo mensaje</p>';
                $contenido .= '<p>Hola ' . $respuestas['nombre'] . ' ' .  $respuestas['apellido'] . '</p>';
                
                //Enviar de forma condicional algunos campos de email o telefono
                if($respuestas['contacto'] === 'telefono'){
                $contenido .= '<p>Telefono ' . $respuestas['telefono'] . '</p>';
                }else{
                    //Es email, entonces agregamos el campo de email
                    $contenido .= '<p>Correo ' . $respuestas['email'] . '</p>';
                }

          
                $contenido .= '<p>Mensaje ' . $respuestas['mensaje'] . '</p>';
                $contenido .= '<p>Tipo ' . $respuestas['tipo'] . '</p>';
                $contenido .= '</html>';

                $mail->Body    = $contenido;



                if($mail->send()){
                    $mensaje = "Mensaje enviado correctamente";
                } else{
                    $mensaje= "El mensaje no se pudo enviar";
                }
   
            }
        
            $router->render('paginas/contacto', [
                'mensaje'=> $mensaje
            ]);
    
       
        }

  

}
    
    
