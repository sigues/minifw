Mini intento de fw

====================================

Debes tener activado mod_rewrite

Crear un controller en application/controllers y la clase debe tener el mismo nombre del archivo
la clase debe extender de core_controller, y en caso de poner un __construct, debes ejecutar el construct de parent (parent::construct)

En la clase debes especificar la tabla (_table) y el id(_id) de la tabla sobre la que vas a trabajar, una vez cargados estos datos vas a tener un modelo cargado en:

```
class controller extends core_controller{
    protected $_table = "table_name";
    protected $_id = "id_table_name";

    public function index(){
        var_dump($this->model)
    }

}

```

Donde tendrás disponibles funciones que son generadas automáticamente



Funciones del modelo

=====================================

Función Get


