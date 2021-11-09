<?php include "header.php" ?>
<div class="card p-4">
    <div class="card-body">
        <h5 class="card-title">Hangman</h5>
        <div class="row">
            <h6 class="ml-3 mb-4" style="color: #C5854D;">Select Category :</h6>
        </div>
        <div class="row">
            <div class="col-md-2 d-flex justify-content-center mb-2">
                <button class="btn btn-categories p-2 text-capitalize">animals</button>
            </div>
            <div class="col-md-2 d-flex justify-content-center mb-2">
                <button class="btn btn-categories p-2 text-capitalize">fruits</button>
            </div>
            <div class="col-md-2 d-flex justify-content-center mb-2">
                <button class="btn btn-categories p-2 text-capitalize">movies</button>
            </div>
            <div class="col-md-2"></div>
            <div class="col-md-2"></div>
            <div class="col-md-2"></div>
        </div>
    </div>
</div>
<script src="src/js/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="src/js/main.js"></script>
<script>
    $(document).ready(function() {
        $("button").on("click", function() {
            let category = $(this).text();
            window.location.href = category + ".php";
        });
    });
</script>
</body>

</html>