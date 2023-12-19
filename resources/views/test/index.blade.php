<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulir dengan Tombol Opsi</title>
</head>

<body>



    <h2>Formulir dengan Tombol Opsi</h2>

    <div id="options">
        <button class="optionButton" data-row="1">Opsi 1</button>
        <button class="optionButton" data-row="2">Opsi 2</button>
        <button class="optionButton" data-row="3">Opsi 3</button>
        <button id="resetButton" style="display: none;">Reset</button>
    </div>

    <script>
        var optionButtons = document.querySelectorAll('.optionButton');
        var resetButton = document.getElementById('resetButton');
        document.addEventListener('DOMContentLoaded', function() {

            // Menangani klik pada tombol opsi
            optionButtons.forEach(function(button) {
                button.addEventListener('click', function() {
                    disableAllOptions();
                    var selectedOption = this.getAttribute('data-row');
                    displayResult(selectedOption);
                });
            });

            // Menangani klik pada tombol reset
            resetButton.addEventListener('click', function() {
                optionButtons.forEach(function(button) {
                    button.disabled = false;
                });
                resetButton.style.display = 'none';
                console.log('Keadaan tombol direset');
            });

            // Fungsi untuk menampilkan hasil sesuai dengan opsi yang dipilih
            function displayResult(selectedOption) {
                // Lakukan sesuatu dengan hasil, misalnya tampilkan di konsol
                console.log('Tombol ' + selectedOption + ' ditekan');

                // Anda dapat menambahkan logika lainnya sesuai kebutuhan

                // Contoh: Menampilkan hasil di halaman web
                var optionsDiv = document.getElementById('options');
                var resultParagraph = document.createElement('p');
                resultParagraph.textContent = 'Hasil: Tombol ' + selectedOption + ' ditekan';
                optionsDiv.appendChild(resultParagraph);

                // Menampilkan tombol reset
                resetButton.style.display = 'block';
            }

            // Fungsi untuk menonaktifkan semua tombol opsi
            function disableAllOptions() {
                optionButtons.forEach(function(button) {
                    button.disabled = true;
                });
            }

        });
    </script>
</body>

</html>