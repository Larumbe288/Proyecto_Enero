<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
        crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
<div>
    <form method="POST" action="#" class="d-flex justify-content-center align-items-center flex-column" name="editar">
        <div class="mb-3 row mx-2">
            <label for="staticEmail" class="col-sm-2 col-form-label">ID</label>
            <div class="col-sm-10">
                <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?php echo $info[0] ?>">
            </div>
        </div>
        <div class="mb-3 row mx-2">
            <label for="inputPassword" class="col-sm-2 col-form-label">Name</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="inputPassword" value="<?php echo $info[1] ?>">
            </div>
        </div>
        <div class="mb-3 mx-2" width="50%">
            <span class="input-group-text">Description</span>
            <textarea class="form-control" aria-label="With textarea"><?php echo $info[2] ?></textarea>
        </div>
        <div class="mb-3 row mx-2">
            <label for="formFile" class="col-sm-2 col-form-label">Image</label>
            <div class="col-sm-10">
                <input type="file" class="form-control" id="formFile" value="<?php echo $info[3] ?>">
                <img id="previewImg" src="https://www.w3schools.com/images/img_fullaccess_300.png">
            </div>
        </div>
        <button name="submit" type="submit" class="btn btn-secondary">Submit</button>
    </form>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
    function previewFile(input){
        var file = $("input[type=file]").get(0).files[0];

        if(file){
            var reader = new FileReader();

            reader.onload = function(){
                $("#previewImg").attr("src", reader.result);
            }

            reader.readAsDataURL(file);
        }
    }
</script>