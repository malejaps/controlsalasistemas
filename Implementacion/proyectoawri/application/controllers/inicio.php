<?php
class Inicio extends CI_Controller {

   
    public function index() {
        /* data['menu'] sirve para cargar cualquier menu en la vista
         * La clave 'menu' del arreglo tiene que quedar asi porque asi esta definido en el template
         * el contenido 'ejemplo' se puede reemplazar por cualquiera de los otros usuarios* */
        $data['menu'] = 'inicio';
        $data['titulo'] = 'Inicio';
        /* data['contenido'] es el que llama cualquier contenido de x sesion
         * La clave 'contenido' del arreglo tiene que quedar asi porque asi esta definido en el template
         * 'ejemplo' llama a cualquier formulario puesto en la carpeta forms de la sesion definida arriba* */
        $data['contenido'] = 'inicio';

        /* Renderiza la vista template */
        $this->load->view('includes/template', $data);
    }

}
