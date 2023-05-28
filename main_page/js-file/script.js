const button = document.getElementsByClassName('button')[0]
const navbarLinks = document.getElementsByClassName('navbar-links')[0]

button.addEventListener('click', () => {
    navbarLinks.classList.toggle('active')
})

const arrow = document.getElementsByClassName('arrow')[0]
const panel = document.getElementsByClassName('panel')[0]

arrow.addEventListener('click', () => {
    panel.classList.toggle('active'),
    arrow.classList.toggle('clicked')
})

const slideValue = document.querySelector(".rangeValueSpan");
const inputSlider = document.querySelector(".range");
    inputSlider.oninput = (()=>{
        let value = inputSlider.value;
        slideValue.textContent = value;
        let percentage = (95 * value / inputSlider.max) + 2;
        slideValue.style.left = (percentage) + "%";
        slideValue.classList.add("show");
    });
    inputSlider.onblur = (()=>{
        slideValue.classList.remove("show");
    });