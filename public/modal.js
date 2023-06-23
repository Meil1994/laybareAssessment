const modal = document.getElementById('popup-modal');
const openButton = document.querySelector('[data-modal-toggle="popup-modal"]');
const closeButton = document.querySelector('[data-modal-hide="popup-modal"]');

function openModal() {
    modal.classList.remove('hidden');
    modal.setAttribute('aria-hidden', 'false');
    modal.setAttribute('aria-modal', 'true');
}

function closeModal() {
    modal.classList.add('hidden');
    modal.setAttribute('aria-hidden', 'true');
    modal.setAttribute('aria-modal', 'false');
}

openButton.addEventListener('click', openModal);
closeButton.addEventListener('click', closeModal);

modal.addEventListener('click', function(event) {
    if (event.target === modal) {
        closeModal();
    }
});
