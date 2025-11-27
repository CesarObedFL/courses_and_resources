document.addEventListener('DOMContentLoaded', function () {
    // 1. Seleccionar todos los botones de cierre que tienen la clase 'close'
    var closeButtons = document.querySelectorAll('.alert-dismissible .close');

    // 2. Iterar sobre cada botón de cierre
    Array.prototype.forEach.call(closeButtons, function (button) {
        // 3. Añadir el listener de evento 'click'
        button.addEventListener('click', function (e) {
            e.preventDefault();

            // Encontrar el contenedor principal del alert.
            // .closest('.alert') busca el ancestro más cercano que tenga la clase 'alert'.
            var alertElement = button.closest('.alert');

            // 4. Si se encuentra el alert, se inician los efectos de cierre
            if (alertElement) {
                // Paso A: Iniciar la transición de "fade out" (Bootstrap lo hace con la clase 'fade' y quitando 'show')
                alertElement.classList.remove('show');
                
                // Paso B: Esperar a que termine la transición (generalmente 300-500ms para 'fade')
                // Usamos un setTimeout para simular la transición de 'fade' antes de eliminar el elemento.
                setTimeout(function () {
                    // 5. Eliminar el alert del DOM
                    if (alertElement.parentNode) {
                        alertElement.parentNode.removeChild(alertElement);
                    }
                }, 300); // 300ms es el tiempo estándar de transición de fade de Bootstrap
            }
        });
    });
});