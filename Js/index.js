"use strict";
function verificarCaracter(teclaPresionada) {
    teclaPresionada.value = "X";
}
/*function inicializarValoresCabecera() {
    document.getElementById('oficina').value = `${(new Date()).getHours()}":"${(new Date()).getMinutes()}`;
}*/
function verificarCasillas() {
    let origenDestino = ['Interno', 'Externo'];
    let prioridad = ['Alto', 'Medio', 'Bajo'];
    let nivelCriticidad = ['Alto', 'Media', 'Baja'];
    let clasificacionIncidente = ['ps', 'pei', 'smfs', 'eh', 'ipp'];
    let contenido = document.getElementById('interno').value;
    let contenido2 = document.getElementById('externo').value;
}
//inicializarValoresCabecera();
