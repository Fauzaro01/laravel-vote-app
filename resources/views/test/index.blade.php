<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Formulir dengan Tombol Opsi</title>
</head>

<body>

    <h2>Formulir {{$post->title}}</h2>

    <div id="main">

    </div>
    <div id="options">
        @foreach($post->votes as $index => $vote)
        <button class="optionButton btn btn-outline-dark py-1 px-4" id="{{$vote->id}}" data-row="{{$index+1}}">{{$vote->name}}</button>
        @endforeach
        <div id="kikuk" class="d-none">
            <button id="resetButton" class="btn btn-lg btn-danger px-2 my-2">Reset</button>
            <button id="submitButton" class="btn btn-lg btn-success px-2 my-2">Submit</button>
        </div>
    </div>

    <form id="formSaya" action="{{route('vote.send')}}" method="post">
        @csrf
        <input type="hidden" name="post_id" value="{{$post->id}}">
    </form>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11">
        const Swal = require('sweetalert2')
    </script>
    <script>
        var optionButtons = document.querySelectorAll('.optionButton');
        var divKikuk = document.getElementById('kikuk');
        var resetButton = document.getElementById('resetButton');
        var submitButton = document.getElementById('submitButton');

        document.addEventListener('DOMContentLoaded', function() {
            // data sementara
            var db;

            // Menangani klick pada tombol submit

            submitButton.addEventListener('click', function() {
                var hiddenInput = document.createElement('input');
                hiddenInput.type = "hidden";
                hiddenInput.name = "vote_id";
                hiddenInput.value = db;
                var formSaya = document.getElementById('formSaya');
                formSaya.appendChild(hiddenInput)
                formSaya.submit();
                console.log(db)
            });

            // Menangani klik pada tombol opsi
            optionButtons.forEach(function(button) {
                button.addEventListener('click', function() {
                    var selectedOption = this.getAttribute('data-row');
                    console.log('value', button.value)
                    console.log('Tombol ' + selectedOption + ' ditekan');
                    db = button.id
                    toggleOpsiButton();
                    displayResult(selectedOption);
                });
            });

            // Menangani klik pada tombol reset
            resetButton.addEventListener('click', function() {
                toggleOpsiButton()
                divKikuk.className = "d-none"
            });

            // Fungsi untuk menampilkan hasil sesuai dengan opsi yang dipilih
            function displayResult(selectedOption) {
                // Lakukan sesuatu dengan hasil, misalnya tampilkan di konsol
                // Anda dapat menambahkan logika lainnya sesuai kebutuhan
                // Contoh: Menampilkan hasil di halaman web
                var optionsDiv = document.getElementById('options');
                var resultParagraph = document.createElement('p');
                resultParagraph.textContent = 'Hasil: Tombol ' + selectedOption + ' ditekan';
                optionsDiv.appendChild(resultParagraph);

                // Menampilkan tombol reset
                divKikuk.className = "d-block"
            }

            // Fungsi Toggle menonaktifkan dan mengaktifkan tombol opsi
            function toggleOpsiButton() {
                optionButtons.forEach(function(button) {
                    if (button.disabled !== true) {
                        button.disabled = true
                    } else {
                        button.disabled = false;
                    }
                });
            }


        });
    </script>
</body>

</html>