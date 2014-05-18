# Mini intento de fw

====================================

## Intro

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

====================================

## Routing

Se debe tener activado **mod_rewrite**

El ruteo se hace automáticamente tomando como el primer parámetro el *controller* y como segundo el *method*

**Ejemplo**
```
appurl/index.php/controller/method
```

El ejemplo ejecutará el controlador guardado en *application/controllers/controller.php* y ejecutará el método *method()*

Los parámetros que se envien después del *method* se tomarán como parámetros y están disponibles en:

```
$this->uri;

//ejemplo
//url: minifw/index.php/controller/index/usuario/valor/

var_dump($this->uri);

/*

array(5) {
  [0]=>
  string(9) "index.php"
  [1]=>
  string(10) "controller"
  [2]=>
  string(5) "index"
  [3]=>
  string(7) "usuario"
  [4]=>
  string(5) "valor"
}

*/


```


=====================================

## Funciones del modelo

Función Get


