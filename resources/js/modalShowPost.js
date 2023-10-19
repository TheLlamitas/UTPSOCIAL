import { toggleModal, calculateElapsedTime, chargeImage, updateModalClasses} from './functions.js';

document.addEventListener('DOMContentLoaded', function() {
    const modalShowPost = document.getElementById('showPost');
    const optionsPost = document.getElementById('options-post');
    const deletePost = optionsPost.querySelector('#delete-post');
    const titleDelete = optionsPost.querySelector('#title-delete');
    const deletePostConfirmed = optionsPost.querySelector('#delete-post-confirmed');
    const editPost = optionsPost.querySelector('#edit-post');

    document.querySelector('.container-posts').addEventListener('click', (event) => {
        if (!event.target.classList.contains('openModalStorePost')) {
            showPostModal(event.target);
        }
    });

    document.querySelector('.closeModalshowPost').addEventListener('click', (event) => {
        toggleModal(modalShowPost, 'invisible', true);
        optionsPost.setAttribute('data-post-id', '');
        optionsPost.setAttribute('data-user-id', '');
    });

    modalShowPost.addEventListener('click', function(event) { 
        if (event.target == document.getElementById('more-options')) {
            const modalAll = optionsPost.querySelector('#modal-all');

            const classesToUpdateModalAll = {
                'sm:max-w-lg': false,
                'min-[576px]:max-w-[400px]': false,
                'min-[992px]:max-w-[704px]': false,
                'sm:h-full': false,
                'min-[450px]:max-w-[400px]': true,
                'min-[992px]:max-h-[746px]': false,
                'min-[450px]:max-h-[400px]': true
            };
            updateModalClasses(modalAll, classesToUpdateModalAll);
            toggleModal(optionsPost, 'invisible', false);
        }
    });

    optionsPost.querySelector('#cancel').addEventListener('click', (event) => {
        toggleModal(optionsPost, 'invisible', true);
        toggleModal(deletePost, 'hidden', false);
        toggleModal(deletePost, 'flex', true);
        toggleModal(titleDelete, 'hidden', true);
        toggleModal(titleDelete, 'flex', false);
        toggleModal(editPost, 'hidden', false);
        toggleModal(editPost, 'flex', true);
        toggleModal(deletePostConfirmed, 'hidden', true);
        toggleModal(deletePostConfirmed, 'flex', false);
        
    });

    optionsPost.querySelector('#delete-post').addEventListener('click', (event) => {
        toggleModal(optionsPost, 'invisible', true);
        toggleModal(deletePost, 'hidden', true);
        toggleModal(deletePost, 'flex', false);
        toggleModal(titleDelete, 'hidden', false);
        toggleModal(titleDelete, 'flex', true);
        toggleModal(editPost, 'hidden', true);
        toggleModal(editPost, 'flex', false);
        toggleModal(deletePostConfirmed, 'hidden', false);
        toggleModal(deletePostConfirmed, 'flex', true);
        toggleModal(optionsPost, 'invisible', false);
    });

    optionsPost.querySelector('#delete-post-confirmed').addEventListener('click', (event) => {
        const post_id = optionsPost.getAttribute('data-post-id');
        const user_id = optionsPost.getAttribute('data-user-id');
        const formData = new FormData();
        formData.append('post_id', post_id);
        formData.append('user_id', user_id);
        formData.append('_method', 'delete');
    
        fetch('/api/destroy-post', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            console.log(data.message);
            setTimeout(function() {
                location.reload(); //pendiente revisar
            }, 1000);
        })
        .catch(error => {
            console.error('Error al Eliminar el post:', error);
        });         
    });

    

    

    // Cerrar el modal cuando se hace clic fuera de él
    document.addEventListener('click', function(event) {
        if (event.target == document.getElementById('backdrop-modal')) {
            toggleModal(optionsPost, 'invisible', true);
            toggleModal(deletePost, 'hidden', false);
            toggleModal(deletePost, 'flex', true);
            toggleModal(titleDelete, 'hidden', true);
            toggleModal(titleDelete, 'flex', false);
            toggleModal(editPost, 'hidden', false);
            toggleModal(editPost, 'flex', true);
            toggleModal(deletePostConfirmed, 'hidden', true);
            toggleModal(deletePostConfirmed, 'flex', false);
        }
    });

    function showPostModal(element) {
        const modalAll = modalShowPost.querySelector('#modal-all');
        const url = element.getAttribute('data-url');
        const description = element.getAttribute('data-description');
        let createdAt = element.getAttribute('data-created-at');
        const userId = element.getAttribute('data-userId');
        const postId = element.getAttribute('data-id');
    
        optionsPost.setAttribute('data-post-id', postId);
        optionsPost.setAttribute('data-user-id', userId);
        optionsPost.setAttribute('data-url', url);
        optionsPost.setAttribute('data-description', description);
        
        modalAll.innerHTML = '';
    
        fetch('/api/render-component-post-show?user_id='+userId)
        .then(response => response.text())
        .then(html => {
            // Reemplazar el contenido del componente con el nuevo HTML
            modalAll.innerHTML = html;
            const showDescription = modalShowPost.querySelector('#showDescription');
            const classesToUpdateModalAll = {
                'min-[992px]:max-w-[704px]': false,
                'min-[992px]:max-w-[1095px]': true,
                'min-[992px]:max-h-[746px]': false,
                'min-[992px]:max-h-[704px]': true,
                'rounded-lg': false
            };
            updateModalClasses(modalAll, classesToUpdateModalAll);
            toggleModal(modalShowPost, 'invisible', false);
            if(description) {
                createdAt = calculateElapsedTime(createdAt);
    
                const descriptionPost = document.getElementById('descriptionPost');
                descriptionPost.textContent = description;
    
                const createdAtDiv = document.getElementById('createdAtDiv');
                createdAtDiv.textContent = createdAt;
                toggleModal(showDescription, 'hidden', false);
            }

            chargeImage('canvas-show', url);
        })
        .catch(error => {
            console.error('Error al obtener el componente:', error);
        });
    }
    
});