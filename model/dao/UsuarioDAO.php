<?php
//En esta clase se implementa el patron de diseño DAO, para separar la capa de acceso
//a datos de la lógica de la aplicación. Aqui se crea una instancia de la clase de la 
//conexión para realizar las consultas pertinentes a la base de datos.
//Tambien se llama a las clases planas para guardar la informacion, por ejemplo 
//la clase Usuario


//Con require_once se incluye el archivo especificado, en este caso DataSource.php y 
//Usuario.php
require_once ("DataSource.php");
require_once (__DIR__."/../entity/Usuario.php");

class UsuarioDAO {
     
     //Con este metodo se hace la validacion para saber si el usuario ingresado
     //en el login se encuentra registrado en la base de datos
	 public function autenticarUsuario($correo, $password){
        
        //Se crea la instancia de DataSource para hacer la conexión
        $data_source = new DataSource();

        //Se llama al metodo ejecutarConsulta para devolver el usuario
        //que cumpla con el correo y contraseña recibidos del login
        $data_table= $data_source->ejecutarConsulta("SELECT * FROM usuario WHERE correo = :correo AND password = :password",array(':correo'=>$correo,':password'=>$password));

        $usuario=null;
        //Si $data_table retornó una fila, quiere decir que se encontro el usuario en la base de datos
        if(count($data_table)==1){
            
            //Se guarda la informacion del usuario en un objeto de tipo Usuario
            foreach($data_table as $indice => $valor){
                //Los nombres de los campos corresponden a los nombres que tienen en la 
                //base de datos, por ejemplo: id, nombre, correo, password, etc.
                $usuario = new Usuario(
                        $data_table[$indice]["id"],
                        $data_table[$indice]["nroCedula"],
                        $data_table[$indice]["nombres"],
                        $data_table[$indice]["apellidos"],
                        $data_table[$indice]["correo"],
                        $data_table[$indice]["password"],
                        $data_table[$indice]["direccion"],
                        $data_table[$indice]["telefono"]
                        );
                        $usuario->setImagen($data_table[0]["imagen"]);
            }
        }
        //se retorna el objeto usuario, retorna null en el caso de que no encuentre el usuario
        //en la base de datos 
        return $usuario;
    }    

    public function verificarUsuarioPorCedula($nrocedula){
        //Se crea la instancia de DataSource para hacer la conexión
        $data_source = new DataSource();

        //Se llama al metodo ejecutarConsulta para devolver el usuario
        //que cumpla con la numero de cedula recibido del registro
        $data_table= $data_source->ejecutarConsulta("SELECT * FROM usuario WHERE nroCedula = :nroCedula",array(':nroCedula'=>$nrocedula));

        $usuario=null;
        //Si $data_table retornó una fila, quiere decir que se encontro el usuario en la base de datos
        if(count($data_table)==1){
            $usuario = count($data_table);
        }
        //se retorna el objeto usuario, retorna null en el caso de que no encuentre el usuario
        //en la base de datos 
        return $usuario;
    }

    public function verificarUsuarioPorCorreo($correo){
        //Se crea la instancia de DataSource para hacer la conexión
        $data_source = new DataSource();

        //Se llama al metodo ejecutarConsulta para devolver el usuario
        //que cumpla con la numero de cedula recibido del registro
        $data_table= $data_source->ejecutarConsulta("SELECT * FROM usuario WHERE correo = :correo",array(':correo'=>$correo));

        $usuario=null;
        //Si $data_table retornó una fila, quiere decir que se encontro el usuario en la base de datos
        if(count($data_table)==1){
            $usuario = count($data_table);
        }
        //se retorna el objeto usuario, retorna null en el caso de que no encuentre el usuario
        //en la base de datos 
        return $usuario;
    }
    public function verUsuarioPorCorreo($correo){
        $data_source = new DataSource();
        
        $data_table = $data_source->ejecutarConsulta("SELECT * FROM usuario WHERE correo = :correo", array(':correo'=>$correo));

        $usuario=null;
        //Si $data_table retornó una fila, quiere decir que se encontro el usuario en la base de datos
        if(count($data_table)==1){
            $usuario = new Usuario(
                    $data_table[0]["id"],
                    $data_table[0]["nroCedula"],
                    $data_table[0]["nombres"],
                    $data_table[0]["apellidos"],
                    $data_table[0]["correo"],
                    $data_table[0]["password"],
                    $data_table[0]["direccion"],
                    $data_table[0]["telefono"]
                    );
                    $usuario->setImagen("");
        }

        
        return $usuario;
    }

    public function registrarUsuario(Usuario $usuario){
        $data_source = new DataSource();
        
        $stmt1 = "INSERT INTO usuario (id, nroCedula, nombres, apellidos, correo, password, direccion, telefono) VALUES (NULL, :nroCedula, :nombres, :apellidos, :correo, :password, :direccion, :telefono)"; 
        
        $resultado = $data_source->ejecutarActualizacion($stmt1, array(
            ':nroCedula' => $usuario->getNroCedula(),
            ':nombres' => $usuario->getNombres(),
            ':apellidos' => $usuario->getApellidos(),
            ':correo' => $usuario->getCorreo(),
            ':password' => $usuario->getPassword(),
            ':direccion'=>$usuario->getDireccion(),
            ':telefono'=>$usuario->getTelefono()
            )
        ); 

      return $resultado;
    }

    public function verUsuarios(){
        $data_source = new DataSource();
        
        $data_table = $data_source->ejecutarConsulta("SELECT * FROM usuario", NULL);

        $usuario=null;
        $usuarios=array();

        foreach($data_table as $indice => $valor){
            $usuario = new Usuario(
                    $data_table[$indice]["id"],
                    $data_table[$indice]["nombre"],
                    $data_table[$indice]["correo"], 
                    $data_table[$indice]["password"],
                    $data_table[$indice]["telefono"],
                    $data_table[$indice]["fechanac"],
                    $data_table[$indice]["sexo"],
                    $data_table[$indice]["pesokg"],
                    $data_table[$indice]["administrador"]
                    );
            array_push($usuarios,$usuario);
        }
        
    return $usuarios;
    }

    function emailExiste($email){

        include '../modelo/conexion.php';
            
        $sentencia = "SELECT id_usuario FROM usuarios WHERE correo = '$email' LIMIT 1";
        $resultado = $conexion->query($sentencia) or die ("Error al buscar email: ".mysqli_error($conexion));
        $num = mysqli_num_rows($resultado);
            
        if ($num > 0){
            return true;
        }else{
            return false;	
        }
    }

    public function eliminarUsuario($idUsuario){
        $data_source = new DataSource();
        
        $stmt1 = "DELETE FROM usuario WHERE id = :idUsuario"; 
        
        $resultado = $data_source->ejecutarActualizacion($stmt1, array(
            ':idUsuario' => $idUsuario
            )
        ); 

      return $resultado;
    }

    public function verUsuarioPorId($idUsuario){
        $data_source = new DataSource();
        
        $data_table = $data_source->ejecutarConsulta("SELECT * FROM usuario WHERE id = :idUsuario", array(':idUsuario'=>$idUsuario));

        $usuario=null;
        //Si $data_table retornó una fila, quiere decir que se encontro el usuario en la base de datos
        if(count($data_table)==1){
            $usuario = new Usuario(
                    $data_table[0]["id"],
                    $data_table[0]["nroCedula"],
                    $data_table[0]["nombres"],
                    $data_table[0]["apellidos"],
                    $data_table[0]["correo"],
                    $data_table[0]["password"],
                    $data_table[0]["direccion"],
                    $data_table[0]["telefono"]
                    );
                    $usuario->setImagen($data_table[0]["imagen"]);
        }

        
        return $usuario;
    }

    public function editarUsuario($usuario){
        $data_source = new DataSource();
        
        $stmt1 = "UPDATE usuario SET nroCedula = :nroCedula, nombres = :nombres, apellidos = :apellidos, correo = :correo, direccion = :direccion, telefono = :telefono WHERE id = :idUsuario"; 
        
        $resultado = $data_source->ejecutarActualizacion($stmt1, array(
            ':nroCedula' => $usuario->getNroCedula(),
            ':nombres' => $usuario->getNombres(),
            ':apellidos' => $usuario->getApellidos(),
            ':correo' => $usuario->getCorreo(),
            ':direccion'=>$usuario->getDireccion(),
            ':telefono'=>$usuario->getTelefono(),
            ':idUsuario' => $usuario->getIdUsuario()
            )
        ); 

      return $resultado;
    }

    public function editarImagen($usuario){
        $data_source = new DataSource();
        
        $stmt1 = "UPDATE usuario SET imagen = :imagen WHERE id = :idUsuario"; 
        
        $resultado = $data_source->ejecutarActualizacion($stmt1, array(
            ':idUsuario' => $usuario->getIdUsuario(),
            ':imagen' => $usuario->getImagen()
            )
        ); 

      return $resultado;
    }
    function generaTokenPass($idUsuario){
        $data_source = new DataSource();
    
        $token = generateToken();
            
        $sentencia = "UPDATE usuario SET token_password = '$token', password_request = 1 WHERE id_usuario = '$idUsuario' ";
        $conexion->query($sentencia) or die ("Error al actualizar datos de usuario: ".mysqli_error($conexion));
            
        return $token;
    }
}



