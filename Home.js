const dispman = document.getElementById('disp-man');
const btnclose = document.getElementById('btn-close');

const offcanvas = document.getElementById('offcanvas');
const modal = document.getElementById('modal');
const btnhov = document.getElementById('header');
const headtext = document.getElementById('headtext');

btnhov.classList.remove('bhover');
headtext.classList.remove('visually-hidden');

dispman.addEventListener("click", function () {
    offcanvas.classList.add('show');
    modal.classList.add('showModal');
    btnhov.classList.add('bhover');
    headtext.classList.add('visually-hidden');

});

btnclose.addEventListener('click', function () {
    offcanvas.classList.remove('show');
    modal.classList.remove('showModal');
    btnhov.classList.remove('bhover');
    headtext.classList.remove('visually-hidden');
});


window.addEventListener('click', function (event) {
    if (event.target === modal) {
        offcanvas.classList.remove('show');
        modal.classList.remove('showModal');
        btnhov.classList.remove('bhover');
        headtext.classList.remove('visually-hidden');
    }
});

