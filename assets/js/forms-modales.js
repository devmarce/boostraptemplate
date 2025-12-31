jQuery(document).ready(function($) {
  // ==== JS-COTIZAR-DELICIA ==== levantar modal y setear datos
  $(document).on('click', '.js-cotizar-delicia', function(e) {
    e.preventDefault();

    // Capturamos el modelo desde el botón
    var deliciaName  = $(this).data('model-name');

    // Insertamos el nombre en el título del modal
    $('#cotizarDelicia .modal-title-destac').text(deliciaName);

    // Dispara el modal
    $('#cotizarDelicia').modal('show');

    // Seteamos el valor en el hidden delicia (CF7)
    $('input[name="delicia"]').val(deliciaName);

    // Mantener el select funcionando como respaldo visual
    const selectModelo = document.querySelector('select[name="delicia"]');
    if (selectModelo) {
      // Resetear al placeholder primero
      selectModelo.selectedIndex = 0;

      // Buscar si existe la opción con ese valor
      const optionToSelect = Array.from(selectModelo.options).find(opt => opt.value === deliciaName);
      if (optionToSelect) {
        optionToSelect.selected = true;
      }
    }
  });
});


document.addEventListener('DOMContentLoaded', function() {
    // Selecciona el select de CF7 por su name
    const selectDelicias = document.querySelector('select[name="delicia"]');

    if (selectDelicias && typeof deliciasData !== 'undefined') {
        // Limpia opciones iniciales
        selectDelicias.innerHTML = '';

        // Opción placeholder
        const placeholder = document.createElement('option');
        placeholder.value = '';
        placeholder.textContent = 'Selecciona una de las Delicias';
        placeholder.disabled = true;
        placeholder.selected = true;
        selectDelicias.appendChild(placeholder);

        // Agregar modelos dinámicamente
        deliciasData.delicias.forEach(delicias => {
            const option = document.createElement('option');
            option.value = delicias;
            option.textContent = delicias;
            selectDelicias.appendChild(option);
        });
    }
});
