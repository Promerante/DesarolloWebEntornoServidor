<?php
class MiExcepcion extends Exception{
    // Crear plantilla y objeto "MiExcepcion" que hereda a la clase nativa excepción
    public function mensajePersonalizado(){
        // Damos la funcion personalizada para dar el mensaje del objeto
        return "Error piola echo por mi: [{$this->code}] {$this->message}\n";
    }
}
// *EJEMPLO:
/*try {
    // Lanza una excepción de prueba
    throw new MiExcepcion("Ocurrió un error inesperado", 123);
} catch (MiExcepcion $e) {
    // Maneja la excepción y muestra el mensaje personalizado
    echo $e->mensajePersonalizado();
}
    */
