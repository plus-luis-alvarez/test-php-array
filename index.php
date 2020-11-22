<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <button class="btn btn-primary" data-toggle="modal" data-target="#ModalTask">Agregar</button>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <button class="btn btn-warning" onclick="saveAll()">Save All</button>
        <table class="table table-bordered table-striped m-5">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Description</th>
                </tr>
            </thead>
            <tbody id="tbData"></tbody>
        </table>
    </div>
    <div class="modal fade" tabindex="-1" role="dialog" id="ModalTask">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Task</h5>
                    <button class="close" data-dismiss="modal">
                        &times;
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="form-group">
                            <label for="">Title:</label>
                            <input type="text" class="form-control" id="edtTitle">
                            <label for="">Descruption</label>
                            <input type="text" class="form-control" id="edtDescription">   
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-success" onclick="addTask()">Add</button>
                    <button class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        var sendData = {};
        var list = [];
        var title = document.getElementById("edtTitle");
        var description = document.getElementById("edtDescription");
        var table = document.getElementById("tbData");
        var addTask = () => {
            var item = {
                title : title.value,
                description : description.value
            };

            list.push(item);
            viewlist();
        }

        var viewlist = () => {

            if(list.length > 0){
                var viewItem = "";
                list.map((item,index) => {
                    item.id = index+1;
                    viewItem +=  `<tr>`;
                    viewItem +=  `<td>${item.id}</td>`;
                    viewItem +=  `<td>${item.title}</td>`;
                    viewItem +=  `<td>${item.description}</td>`;
                    viewItem +=  `</tr>`;
                });
                table.innerHTML = viewItem;
            }
        }
        var idtest1 = 2;
        var idtest2 = 3;
        var saveAll = () => {
            if(list.length >0 ){
                sendData.id = 1;
                sendData.idProfesor = idtest1;
                sendData.idAsignatura = idtest2;
                sendData.data = list;

                fetch("api.php",{method:"POST" , body: JSON.stringify(sendData)})
                    .then( response => response.json())
                    .then(response => console.log(response));
            }else{
                alert("Registrar Tareas!");
            }
            
        }
    </script>
</body>
</html>