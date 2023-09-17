document.addEventListener("DOMContentLoaded", function () {
    // Funciones para abrir y cerrar el modal
    function openModal() {
        document.getElementById('task-modal').style.display = 'block';
    }

    function closeModal() {
        document.getElementById('task-modal').style.display = 'none';
    }

    // Vinculamos las funciones a los eventos correspondientes
    const createTaskButton = document.getElementById('create-task');
    const closeModalButton = document.querySelector('.close-modal');

    createTaskButton.addEventListener('click', openModal);
    closeModalButton.addEventListener('click', closeModal);

    document.getElementById('togglePanel').addEventListener('click', function () {
        const asideElement = document.querySelector('aside');

        if (asideElement.classList.contains('aside-collapsed')) {
            asideElement.classList.remove('aside-collapsed');
        } else {
            asideElement.classList.add('aside-collapsed');
        }
    });


});
