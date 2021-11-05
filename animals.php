<?php
$category = "Animals";
include "header.php";
?>
<div class="card p-4">
    <div class="card-body">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-9 text-center">
                <h3 style="color:#d9dbf1"><?= $category ?></h3>
            </div>
        </div>
    </div>
</div>
<script src="src/js/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="src/js/main.js"></script>
<script>
    $(document).ready(function() {
        $.ajax({
            type: "GET",
            url: "api/animals.json",
            success: function(response) {
                console.log(response.data);
            }
        });
    });
</script>
</body>

</html>