function verificarCaracter(teclaPresionada:any)
{
    teclaPresionada.value="X";
}

function inicializarValoresCabecera():void
{
    (document.getElementById('oficina') as HTMLInputElement).value = `${(new Date()).getHours()}":"${(new Date()).getMinutes()}` ;
}
function verificarCasillas<uno>():void
{
    let origenDestino:Array<string>=['Interno', 'Externo'];
    let prioridad:Array<string>=['Alto', 'Medio', 'Bajo'];
    let nivelCriticidad:Array<string>=['Alto', 'Media', 'Baja'];
    let clasificacionIncidente:Array<string>=['ps', 'pei', 'smfs', 'eh', 'ipp'];
    
    let contenido= (document.getElementById('interno') as HTMLInputElement).value;
    let contenido2= (document.getElementById('externo')as HTMLInputElement).value;    
}

inicializarValoresCabecera()