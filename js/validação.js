document.addEventListener("DOMContentLoaded", function () {

    const formulario = document.querySelector("form");

    if(formulario){

        formulario.addEventListener("submit", function(e){

            let placa = document.querySelector('input[name="placa"]');

            if(placa && placa.value.trim() === ""){

                alert("Informe a placa do veículo.");
                e.preventDefault();

            }

        });

    }

});