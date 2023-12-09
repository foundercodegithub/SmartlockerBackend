/*--===== Open Clicked Modal =====--*/

const modals = document.querySelectorAll('.modal');
const cardBtns = document.querySelectorAll('.card_btn');
const closeBtns = document.querySelectorAll('.close_btn');

const openModal = (index) => {
    modals[index].classList.add('open');
};

const closeModal = (index) => {
    modals[index].classList.remove('open');
};


// opening the clicked Modal.
cardBtns.forEach((currCardBtn, index) => {
    currCardBtn.addEventListener('click', () => {
        openModal(index);
    });
});


// closing the current opened Modal.
closeBtns.forEach((currCloseBtn, index) => {
    currCloseBtn.addEventListener('click', () => {
        closeModal(index);
    });
});


// closing the current opened Modal on clicking outside.
window.addEventListener('click', (e) => {
    if (e.target.className === 'modal_wrapper') {
        modals.forEach((currModal) => {
            currModal.classList.remove('open');
        });
    }
});