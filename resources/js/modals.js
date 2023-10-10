document.addEventListener('DOMContentLoaded', function() {
    const modalStorePost = document.getElementById('storePost');
    const modalShowPost = document.getElementById('showPost');
    const input = document.getElementById('dropzone-file');
    const nextButton = document.getElementById('next-a');
    const description = modalStorePost.querySelector('#description');
    const descriptionTextarea = modalStorePost.querySelector('#descriptionTextarea');
    const divEmoji = modalStorePost.querySelector('#emoji');

    document.querySelectorAll('.openModalStorePost').forEach(function (element) {
        element.addEventListener('click', function() {
            toggleModal(modalStorePost, 'invisible', false);
        });
    });

    document.querySelector('.closeModalStorePost').addEventListener('click', function(element) {
        toggleModal(modalStorePost, 'invisible', true);
    });

    document.querySelector('.container-posts').addEventListener('click', (event) => {
        if (event.target.classList.contains('openModalStorePost')) {
            toggleModal(modalStorePost, 'invisible', false);
        } else {
            showPostModal(event.target);   
        }
    });

    document.querySelector('.closeModalshowPost').addEventListener('click', (event) => {
        toggleModal(modalShowPost, 'invisible', true);
    });

    // Agregar un evento de entrada al textarea
    descriptionTextarea.addEventListener('input', function() {
        countCharacter(); 
    });

    function countCharacter() {
        // Obtener el contenido del textarea
        let content = descriptionTextarea.value;
        const countDescription = document.getElementById('countDescription');
        // Limitar la longitud del contenido a 191 caracteres
        countDescription.textContent = content.length+'/191';
        if (content.length > 191) {
            descriptionTextarea.value = content.substring(0, 191);
            countDescription.textContent = (content.length - 1)+'/191';
        }
    }

    document.querySelector('#openEmoji').addEventListener('click', function(element) {
        divEmoji.innerHTML="";
        const pickerOptions = { 
            set: 'native', // Estilo de emojis (puedes usar 'apple' o 'twitter' si prefieres)
            locale: 'es',
            previewPosition: 'none',
            searchPosition: 'none',
            navPosition: 'bottom',
            emojiSize: '18',
            categories: 'frequent, activity, nature, foods, objects, people, symbols, places',
            onEmojiSelect: emoji => {
                console.log(descriptionTextarea.value.length);
                descriptionTextarea.value = descriptionTextarea.value+emoji.native;
                countCharacter();
                divEmoji.innerHTML="";
                toggleModal(divEmoji, 'hidden', true);
            },
         }
        const picker = new EmojiMart.Picker(pickerOptions);
        divEmoji.appendChild(picker);
        toggleModal(divEmoji, 'hidden', false);
    });

    // Cerrar el modal cuando se hace clic fuera de él
    document.addEventListener('click', function(event) {
        if (event.target !== divEmoji && !divEmoji.contains(event.target) && event.target !== document.getElementById('openEmoji')) {
            toggleModal(divEmoji, 'hidden', true);
            divEmoji.innerHTML="";
        }
    });

    if (input) {
        input.addEventListener('change', handleFileUpload);
    };

    document.getElementById('button-back').addEventListener('click', function() {
        location.reload(); //pendiente revisar
    });

    nextButton.addEventListener('click', function(event) {
        let modalAll = modalStorePost.querySelector('#modal-all');
        const storePostForm = document.getElementById('store-post');
        modalAll.style.minWidth = '992px';
        modalAll.style.maxWidth = '1095px';
        toggleModal(description, 'hidden', false);
        nextButton.textContent = 'Compartir';
    
        nextButton.addEventListener('click', function() {
            event.preventDefault();
            storePostForm.submit();
        });
    });

    function toggleModal(modal, className, addClass) {
        if (addClass) {
            modal.classList.add(className);
        } else {
            modal.classList.remove(className);
        }
    }

    function showPostModal(element) {
        let modalAll = modalShowPost.querySelector('#modal-all');
        let url = element.getAttribute('data-url');
        let description = element.getAttribute('data-description');
        let createdAt = element.getAttribute('data-created-at');
        let userId = element.getAttribute('data-userId');
        
        modalAll.innerHTML = '';

        fetch('/api/render-component-post-show?user_id='+userId)
        .then(response => response.text())
        .then(html => {
            // Reemplazar el contenido del componente con el nuevo HTML
            modalAll.innerHTML = html;
            let showDescription = document.getElementById('showDescription');
            toggleModal(modalAll, 'min-[992px]:max-w-[704px]', false);
            toggleModal(modalAll, 'min-[992px]:max-w-[1095px]', true);
            toggleModal(modalAll, 'min-[992px]:max-h-[746px]', false);
            toggleModal(modalAll, 'min-[992px]:max-h-[704px]', true);
            toggleModal(modalAll, 'rounded-lg', false);
            toggleModal(showPost, 'invisible', false);
            if(description) {
                createdAt = calculateElapsedTime(createdAt);
    
                let descriptionPost = document.getElementById('descriptionPost');
                descriptionPost.textContent = description;
    
                let createdAtDiv = document.getElementById('createdAtDiv');
                createdAtDiv.textContent = createdAt;
                toggleModal(showDescription, 'hidden', false);
            }

            // Cargar la imagen en un objeto de imagen
            let img = new Image();
            // Obtener el contexto 2D del canvas
            let canvas = document.getElementById('canvas-show');
            let ctx = canvas.getContext('2d');
            
            img.onload = function() {

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
            img.src = url;
            canvas.style.display = 'block';
        })
        .catch(error => {
            console.error('Error al obtener el componente:', error);
        });
    }

    function handleFileUpload(event) {
        
        const step1 = document.getElementById('step1');
        const spinner = document.getElementById('spinner');
        toggleModal(step1, 'hidden', true);
        toggleModal(spinner, 'hidden', false);
        toggleModal(spinner, 'flex', true);

        const title = document.getElementById('title');
        const headerTitle = document.getElementById('header-title');
        const back = document.getElementById('back');
        const next = document.getElementById('next');
        const canvas = document.getElementById('canvas');
        const file = input.files[0];
        const formData = new FormData();
        formData.append('file', file);

        fetch('/api/crop-image', {
            method: 'POST', // Método de solicitud HTTP (en este caso, POST)
            body: formData // Datos a enviar en la solicitud (en este caso, un objeto FormData)
        })
        .then(response => response.json()) // Convertir la respuesta a JSON
        .then(data => {
            const imagePath = data.imagePath; // Extraer el valor de la propiedad 'imagePath' del objeto JSON
            const imageName = data.imageName; // Extraer el valor de la propiedad 'imageName' del objeto JSON

            const img = new Image();
            img.onload = function() {
                const canvasContext = canvas.getContext('2d');
                let width;
                let height;

                if (window.innerWidth <= 710) {
                    width = 400;
                    height = 400;
                } else {
                    width = 704;
                    height = 704;
                }

                canvas.width = width;
                canvas.height = height;
                canvasContext.drawImage(img, 0, 0, width, height);
                
                title.textContent = "Recortar";
                toggleModal(headerTitle, 'justify-center', false);
                toggleModal(headerTitle, 'justify-between', true);
                toggleModal(back, 'hidden', false);
                toggleModal(next, 'hidden', false);
                toggleModal(spinner, 'hidden', true);
                canvas.style.display = 'block';

                const inputPhoto = document.createElement('input');
                inputPhoto.type = 'hidden';
                inputPhoto.name = 'photo';
                inputPhoto.value = imageName;
                document.getElementById('store-post').appendChild(inputPhoto);

                if (input) {
                    input.parentNode.removeChild(input);
                }
            };
            img.src = imagePath;
        })
        .catch(error => {
            console.error('Error al recortar el archivo:', error);
        });
    }

    function calculateElapsedTime(createdAt) {
        const now = new Date();
        const postDate = new Date(createdAt);
        const secondsElapsed = Math.floor((now - postDate) / 1000);
    
        if (secondsElapsed < 5) {
            return 'hace menos de 5 segundos';
        } else {
            return formatTime(secondsElapsed);
        }
    }
    
    function formatTime(secondsElapsed) {
        const secondsInMinute = 60;
        const secondsInHour = 3600;
        const secondsInDay = 86400;
    
        if (secondsElapsed < secondsInMinute) {
            return `hace ${secondsElapsed} segundo${secondsElapsed > 1 ? 's' : ''}`;
        } else if (secondsElapsed < secondsInHour) {
            const minutes = Math.floor(secondsElapsed / secondsInMinute);
            return `hace ${minutes} minuto${minutes > 1 ? 's' : ''}`;
        } else if (secondsElapsed < secondsInDay) {
            const hours = Math.floor(secondsElapsed / secondsInHour);
            return `hace ${hours} hora${hours > 1 ? 's' : ''}`;
        } else {
            const days = Math.floor(secondsElapsed / secondsInDay);
            return `hace ${days} día${days > 1 ? 's' : ''}`;
        }
    }
    
});