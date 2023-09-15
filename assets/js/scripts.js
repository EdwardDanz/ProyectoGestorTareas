document.addEventListener('DOMContentLoaded', function() {
    var btnRegister = document.querySelector('.btn-register');
    if (btnRegister) {
        btnRegister.addEventListener('click', showRegisterForm);
    }
    
    var closeRegister = document.querySelector('#registerForm button[onclick="hideRegisterForm()"]');
    if (closeRegister) {
        closeRegister.removeEventListener('click', hideRegisterForm); // Por si acaso, vamos a remover el anterior evento
        closeRegister.addEventListener('click', hideRegisterForm);
    }
});

function showRegisterForm() {
    document.getElementById('loginForm').style.display = 'none';
    document.getElementById('registerForm').style.display = 'block';
}

function hideRegisterForm() {
    document.getElementById('loginForm').style.display = 'block';
    document.getElementById('registerForm').style.display = 'none';
}

//PARA ANIMAR EL TÍTULO 

document.addEventListener('DOMContentLoaded', function() {
    var titleText = document.getElementById("animatedTitle").textContent;
    var colorfulTitle = "";

    var colors = ["red", "blue", "green", "orange", "purple", "pink", "cyan", "yellow", "lime", "brown"];

    for(let i = 0; i < titleText.length; i++) {
        if(titleText[i] !== " ") {
            colorfulTitle += `<span style="color: ${colors[i % colors.length]}">${titleText[i]}</span>`;
        } else {
            colorfulTitle += titleText[i];
        }
    }

    document.getElementById("animatedTitle").innerHTML = colorfulTitle;

    // Aplicar animación con anime.js
    anime({
        targets: '#animatedTitle span',
        translateY: [-100, 0],
        delay: (el, i, l) => i * 50,
        easing: 'easeOutBounce',
        duration: 2000
    });
});
