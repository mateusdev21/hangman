<?php
$category = "Animals";
include "header.php";
?>
<div class="card p-4">
    <div class="card-body">
        <div class="row">
            <div class="col-md-3 text-center pt-5">
                <p style="color: white;" class="align-middle"><strong>Dead Counter = <span id="life" style="color: red;"></span> Life Remaining</strong></p>
            </div>
            <div class="col-md-9 text-center pt-5">
                <h3 style="color:#d9dbf1" class="mb-5"><?= $category ?></h3>
                <div class="row justify-content-center mt-5 input-area">
                </div>
                <p class="wrong-feedback" style="color: red; display: none"><strong>WRONG!</strong></p>
                <p class="correct-feedback" style="color: green; display: none"><strong>CORRECT!</strong></p>
                <button class="btn btn-success mt-5" onclick="location.reload()"><strong>RELOAD</strong></button>
            </div>
        </div>
    </div>
</div>
<script src="src/js/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="src/js/main.js"></script>
<script>
    let life = 5;

    function generateWord(words_arr) {
        let random = Math.floor(Math.random() * 10);
        let word = words_arr[random].name;
        return word;
    };

    function addInputBox(word) {
        for (let i = 1; i <= word.length; i++) {
            let input_box = '<div id="box-' + i + '" class="col-md-1 mb-4">' +
                '<input oninput="this.value = this.value.toUpperCase()" type="text" class="form-control input-answer" id="' + i + '" maxlength="1">' +
                '</div>';
            $(".input-area").append(input_box);
        }
    };

    function lifeDecrease(){
        life = life - 1;
        console.log(life);
        $("#life").text(life);
        if (life <= 0) {
            alert("YOU LOSE!");
            $(".input-answer").attr("disabled");
        }
    }

    $(document).ready(function() {
        $("#life").text(life);
        $.ajax({
            type: "GET",
            url: "api/animals.json",
            success: function(response) {
                let words_arr = response.data;
                console.log(words_arr);
                word = generateWord(words_arr);
                let word_arr = [];
                for (let i = 0; i < word.length; i++) {
                    let character = word.substr(i, 1);
                    word_arr.push(character);
                }
                console.log(word);
                console.log(word_arr);
                addInputBox(word);
                let input_arr = [];
                $(".input-answer").on("change", function() {
                    let id_selected = $(this).attr("id") - 1;
                    let input_char = $(this).val();
                    console.log("(" + id_selected + ")" + input_char);
                    console.log(word_arr[id_selected]);
                    if (input_char == word_arr[id_selected]) {
                        $(".wrong-feedback").css("display", "none");
                        $(".correct-feedback").css("display", "block");
                        input_arr[id_selected] = input_char;
                        $(this).css("background-color", "#67CD7D");
                    } else {
                        lifeDecrease();
                        $(".correct-feedback").css("display", "none");
                        $(".wrong-feedback").css("display", "block");
                        $(this).css("background-color", "#B84D4D");
                    };

                    if (JSON.stringify(word_arr) == JSON.stringify(input_arr)) {
                        alert("YOU WIN !!");
                    }
                })
            }
        });
    });
</script>
</body>

</html>