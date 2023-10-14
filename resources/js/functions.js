export function toggleModal(modal, className, addClass) {
    if (addClass) {
        modal.classList.add(className);
    } else {
        modal.classList.remove(className);
    }
}

export function updateModalClasses(modal, classes) {
    Object.entries(classes).forEach(([className, shouldAdd]) => {
        toggleModal(modal, className, shouldAdd);
    });
}

export function calculateElapsedTime(createdAt) {
    const now = new Date();
    const postDate = new Date(createdAt);
    const secondsElapsed = Math.floor((now - postDate) / 1000);

    if (secondsElapsed < 5) {
        return 'hace menos de 5 segundos';
    } else {
        return formatTime(secondsElapsed);
    }
}

export function formatTime(secondsElapsed) {
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

export function countCharacter(descriptionTextarea) {
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

export function chargeImage(canvasId, url) {
    // Cargar la imagen en un objeto de imagen
    let img = new Image();
    // Obtener el contexto 2D del canvas
    let canvas = document.getElementById(canvasId);
    let ctx = canvas.getContext('2d');
    
    img.onload = function() {

        let width;
        let height;

        if (window.innerWidth <= 710) {
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
}