import { toggleModal, chargeImage } from './functions.js';

document.addEventListener('DOMContentLoaded', function() {
    const modalEditPost = document.getElementById('editPost');
    const backEdit = modalEditPost.querySelector('#back');
    const nextEdit = modalEditPost.querySelector('#next');
    const headerTitle = modalEditPost.querySelector('#header-title');
    const optionsPost = document.getElementById('options-post');

    document.querySelector('#edit-post').addEventListener('click', (event) => {
        let modalAll = modalEditPost.querySelector('#modal-all');
        const post_id = optionsPost.getAttribute('data-post-id');
        const user_id = optionsPost.getAttribute('data-user-id');
        const url = optionsPost.getAttribute('data-url');
        const description = optionsPost.getAttribute('data-description');
        // const editPostForm = document.getElementById('edit-post');
        modalAll.style.minWidth = '992px';
        modalAll.style.maxWidth = '1095px';
        toggleModal(backEdit, 'hidden', false);
        toggleModal(nextEdit, 'hidden', false);
        toggleModal(headerTitle, 'justify-center', false);
        toggleModal(headerTitle, 'justify-between', true);
        chargeImage('canvas-edit', url);
        // toggleModal(description, 'hidden', false);
        // nextButton.textContent = 'Listo';
        // nextButton.addEventListener('click', function() {
        //     editPostForm.submit();
        // });
        toggleModal(modalEditPost, 'invisible', false);
    });

    backEdit.addEventListener('click', function(event) {
        toggleModal(modalEditPost, 'invisible', true);
    });






    

    



    
});