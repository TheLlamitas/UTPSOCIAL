import { toggleModal, countCharacter, chargeImage } from './functions.js';

document.addEventListener('DOMContentLoaded', function() {
    const modalStorePost = document.getElementById('storePost');
    const PostDescriptionStore = modalStorePost.querySelector('#descriptionTextarea');
    const divEmojiStore = modalStorePost.querySelector('#emoji');
    const inputStore = modalStorePost.querySelector('#dropzone-file');
    const nextButtonStore = modalStorePost.querySelector('#next-a');
    const descriptionDivStore = modalStorePost.querySelector('#description');

    document.querySelectorAll('.openModalStorePost').forEach(function (element) {
        element.addEventListener('click', function() {
            toggleModal(modalStorePost, 'invisible', false);
        });
    });

    modalStorePost.querySelector('.closeModalStorePost').addEventListener('click', function(event) {
        toggleModal(modalStorePost, 'invisible', true);
    });

    // Agregar un evento de entrada al textarea
    PostDescriptionStore.addEventListener('input', function() {
        countCharacter(PostDescriptionStore); 
    });

    modalStorePost.querySelector('#openEmoji').addEventListener('click', function(event) {
        divEmojiStore.innerHTML="";
        const pickerOptions = { 
            set: 'native', // Estilo de emojis (puedes usar 'apple' o 'twitter' si prefieres)
            locale: 'es',
            previewPosition: 'none',
            searchPosition: 'none',
            navPosition: 'bottom',
            emojiSize: '18',
            categories: 'frequent, activity, nature, foods, objects, people, symbols, places',
            onEmojiSelect: emoji => {
                PostDescriptionStore.value = PostDescriptionStore.value+emoji.native;
                countCharacter(PostDescriptionStore);
                divEmojiStore.innerHTML="";
                toggleModal(divEmojiStore, 'hidden', true);
            },
         }
        const picker = new EmojiMart.Picker(pickerOptions);
        divEmojiStore.appendChild(picker);
        toggleModal(divEmojiStore, 'hidden', false);
    });

    // Cerrar el modal cuando se hace clic fuera de él
    modalStorePost.addEventListener('click', function(event) {
        if (event.target !== divEmojiStore && !divEmojiStore.contains(event.target) && event.target !== modalStorePost.querySelector('#openEmoji')) {
            toggleModal(divEmojiStore, 'hidden', true);
            divEmojiStore.innerHTML="";
        }
    });

    if (inputStore) {
        inputStore.addEventListener('change', handleFileUpload);
    };

    modalStorePost.querySelector('#button-back').addEventListener('click', function() {
        location.reload(); //pendiente revisar
    });

    nextButtonStore.addEventListener('click', function(event) {
        const modalAll = modalStorePost.querySelector('#modal-all');
        const storePostForm = modalStorePost.querySelector('#store-post');
        modalAll.style.minWidth = '992px';
        modalAll.style.maxWidth = '1095px';
        toggleModal(descriptionDivStore, 'hidden', false);
        nextButtonStore.textContent = 'Compartir';
        nextButtonStore.addEventListener('click', function() {
            event.preventDefault();
            storePostForm.submit();
        });
    });
    
    function handleFileUpload() {
        const step1 = modalStorePost.querySelector('#step1');
        const spinner = modalStorePost.querySelector('#spinner');
        const title = modalStorePost.querySelector('#title');
        const headerTitle = modalStorePost.querySelector('#header-title');
        const backStore = modalStorePost.querySelector('#back');
        const nextStore = modalStorePost.querySelector('#next');
        const file = inputStore.files[0];
        const formData = new FormData();
        formData.append('file', file);

        toggleModal(step1, 'hidden', true);
        toggleModal(spinner, 'hidden', false);
        toggleModal(spinner, 'flex', true);
    
        fetch('/api/crop-image', {
            method: 'POST', // Método de solicitud HTTP (en este caso, POST)
            body: formData // Datos a enviar en la solicitud (en este caso, un objeto FormData)
        })
        .then(response => response.json()) // Convertir la respuesta a JSON
        .then(data => {
            const imagePath = data.imagePath; // Extraer el valor de la propiedad 'imagePath' del objeto JSON
            const imageName = data.imageName; // Extraer el valor de la propiedad 'imageName' del objeto JSON
    
            title.textContent = "Recortar";
            toggleModal(headerTitle, 'justify-center', false);
            toggleModal(headerTitle, 'justify-between', true);
            toggleModal(backStore, 'hidden', false);
            toggleModal(nextStore, 'hidden', false);
            toggleModal(spinner, 'hidden', true);

            chargeImage('canvas', imagePath);

            const inputPhoto = document.createElement('input');
            inputPhoto.type = 'hidden';
            inputPhoto.name = 'photo';
            inputPhoto.value = imageName;
            modalStorePost.querySelector('#store-post').appendChild(inputPhoto);

            if (inputStore) {
                inputStore.parentNode.removeChild(inputStore);
            }

        })
        .catch(error => {
            console.error('Error al recortar el archivo:', error);
        });
    }
    
});