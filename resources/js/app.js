// Initialization for ES Users
import {
    Tab,
    Alert,
    initTE,
  } from "tw-elements";
  
  initTE({ Tab, Alert });

$(document).ready(function () {
    $('.openModal').on('click', function(e){
        $('#interestModal').removeClass('invisible');
    });
    $('.closeModal').on('click', function(e){
        $('#interestModal').addClass('invisible');
        location.reload();
    });
});

$(document).ready(function () {

    const input = document.getElementById('dropzone-file');
    const step1 = document.getElementById('step1');
    const title = document.getElementById('title');
    const headerTitle = document.getElementById('header-title');
    const back = document.getElementById('back');
    const next = document.getElementById('next');

    input.addEventListener('change', function(event) {
        let file = input.files[0];
    
        let formData = new FormData();
        formData.append('file', file);
    
        $.ajax({
            url: '/api/crop-image',
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                let imagePath = response.imagePath;
                let imageName = response.imageName;

                // Cargar la imagen en un objeto de imagen
                let img = new Image();
                img.onload = function() {
                    // Obtener el contexto 2D del canvas
                    let canvas = document.getElementById('canvas');
                    let ctx = canvas.getContext('2d');

                    let width;
                    let height;

                    if (window.innerWidth <= 767) {
                        // El usuario está en un dispositivo móvil
                        width = 400;
                        height = 400;
                    } else {
                        // El usuario está en una computadora de escritorio
                        width = 704;
                        height = 704;
                    }

                    // Establecer el tamaño del canvas al tamaño de la imagen
                    canvas.width = width;
                    canvas.height = height;

                    // Dibujar la imagen en el canvas
                    ctx.drawImage(img, 0, 0, width, height);
                };

                // Establecer la fuente de la imagen en el objeto de imagen
                img.src = imagePath;
                step1.classList.add('hidden');
                title.textContent = "Recortar";
                headerTitle.classList.remove('justify-center');
                headerTitle.classList.add('justify-between');
                back.classList.remove('hidden');
                next.classList.remove('hidden');
                canvas.style.display = 'block';
                // Crea un nuevo elemento de input hidden
                let inputPhoto = document.createElement('input');
                inputPhoto.type = 'hidden';
                inputPhoto.name = 'photo'; // Asigna el nombre "photo"
                inputPhoto.value = imageName; // Asigna el valor del campo si es necesario

                // Agrega el input hidden al formulario o a cualquier otro elemento del DOM
                document.getElementById('store-post').appendChild(inputPhoto);

                if (input) {
                    // Elimina el campo de entrada de tipo archivo del DOM
                    input.parentNode.removeChild(input);
                }
            },
            error: function(error) {
                console.error('Error al recortar el archivo:', error);
            }
        });
    });

    $('#button-back').on('click', function(e){
        location.reload();
    });

    $('#next-a').on('click', function(e){
        const modalAll = document.getElementById('modal-all');
        const description = document.getElementById('description');
        modalAll.classList.remove('min-[992px]:max-w-[704px]');
        modalAll.classList.add('min-[992px]:max-w-[1095px]');
        description.classList.remove('hidden');

        const next_a = document.getElementById('next-a');
        next_a.textContent = 'Compartir';

        // Agrega un event listener para el evento click al enlace
        next_a.addEventListener('click', function(event) {
            // Previene el comportamiento predeterminado del enlace (navegación)
            event.preventDefault();

            // Encuentra el formulario por su ID y envíalo
            let storePost = document.getElementById('store-post');
            storePost.submit();
        });

    });
});


