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
