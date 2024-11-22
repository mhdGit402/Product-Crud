"# Product-Crud"

MVC architecture:
In short terms, your model performs all operations on the data (be it incoming, outgoing, database, files ... data), and your view should take care of displaying the data. The controller should call the necessary model methods to get the data ready to be passed to the view. The controller shouldn't perform any changes to the data, but it should test it to get the necessary action done properly.

in other hands,
In programming, model-view-controller (MVC) is an architectural design pattern that organizes an application's logic into distinct layers, each of which carries out a specific set of tasks.

MVC design layers
The MVC methodology separates an application's logic into three distinct layers:

1- Model. The model layer is responsible for the application's data logic and storing and retrieving data from back-end data stores. The model layer might also include mechanisms for validating data and carrying out other data-related tasks. This layer is responsible for maintaining all aspects of the data and ensuring its integrity and accessibility.

2- View. The view layer provides the UI necessary to interact with the application. It includes components needed to display the data and enables users to interact with that data. For example, the view layer might include buttons, links, tables, drop-down lists or text boxes.

3- Controller. The controller layer contains the application logic necessary to facilitate communications across the application, acting as an interface between the view and model layers. The controller is sometimes viewed as the brains of the application, keeping everything moving and in sync.

---

--- Autoload in PHP (use class which is in another directory and file, from file in another directory):

To autoload class in php follow below steps:\
1- In terminal run composer init\
2- Edit created composer.json as below or change the parameters in 1 step:\
"autoload": {\
"psr-4": {\
"app\\": "./"\  
}\
}\

- Which "app\\" is the name that we can use in our code like "use app\Controller\ProductController".\
- And "./" is the directory of your classes file and etc.\
  3(optional - if you edited composer.json)- Then run composer update.\  
  4- In your class file('root(app)/Controller/ProductController.php') add this line: namespace app\Controller.\
  5- In the file('root(app)/View/product/index.php') which your gonna use this class add this lines:\
- require_once '../../vendor/autoload.php'.\
- use app\Controller\ProductController.\
  6- Then you can access to class and its methods by calling related item like: ProductController::store($product).\
