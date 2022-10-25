<?php
    require_once "connection/Connection.php";

    class Cliente {

        public static function getAll() {
            $db = new Connection();
            $query = "SELECT *FROM clientes";
            $resultado = $db->query($query);
            $datos = [];
            if($resultado->num_rows) {
                while($row = $resultado->fetch_assoc()) {
                    $datos[] = [
                        'Id' => $row['Id'],
                        'Cedula' => $row['Cedula'],
                        'Nombre' => $row['Nombre'],
                        'Correo' => $row['Correo'],

                        
                     
                    ];
                }//end while
                return $datos;
            }//end if
            return $datos;
        }//end getAll

        public static function getWhere($id_cliente) {
            $db = new Connection();
            $query = "SELECT *FROM clientes WHERE Id=$id_cliente";
            $resultado = $db->query($query);
            $datos = [];
            if($resultado->num_rows) {
                while($row = $resultado->fetch_assoc()) {
                    $datos[] = [
                        'Id' => $row['Id'],
                        'Cedula' => $row['Cedula'],
                        'Nombre' => $row['Nombre'],
                        'Correo' => $row['Correo'],

                    ];
                }//end while
                return $datos;
            }//end if
            return $datos;
        }//end getWhere

        public static function insert($Cedula, $Nombre, $Correo) {
            $db = new Connection();
            $query = "INSERT INTO clientes (Cedula, Nombre, Correo)
            VALUES('".$Cedula."', '".$Nombre."', '".$Correo."')";
            $db->query($query);
            if($db->affected_rows) {
                return TRUE;
            }//end if
            return FALSE;
        }//end insert

        public static function update($Cedula, $Nombre, $Correo) {
            $db = new Connection();
            $query = "UPDATE clientes SET
            Cedula='".$Cedula."', Nombre='".$Nombre."', Correo='".$Correo."' 
            WHERE Id=$id_cliente";
            $db->query($query);
            if($db->affected_rows) {
                return TRUE;
            }//end if
            return FALSE;
        }//end update

        public static function delete($id_cliente) {
            $db = new Connection();
            $query = "DELETE FROM clientes WHERE Id=$id_cliente";
            $db->query($query);
            if($db->affected_rows) {
                return TRUE;
            }//end if
            return FALSE;
        }//end delete

        
    }//end class Cliente