document.addEventListener('DOMContentLoaded', function() {
    var forms = document.getElementsByClassName('needs-validation');

    Array.prototype.filter.call(forms, function(form) {
        form.addEventListener('submit', function(event) {
            if (form.checkValidity() === false) {
                event.preventDefault();
                event.stopPropagation();
            } else {
                event.preventDefault();

                if (form.id === 'agenda-citas-form') {
                    alert('Cita agendada correctamente');
                } else if (form.id === 'contacto-form') {
                    var nombre = document.getElementById('nombre').value;
                    var email = document.getElementById('email').value;
                    var asunto = document.getElementById('asunto').value;
                    var mensaje = document.getElementById('mensaje').value;

                    alert('Gracias, ' + nombre + '. Hemos recibido tu mensaje.');
                }

                form.reset();
                form.classList.remove('was-validated');
            }
            form.classList.add('was-validated');
        }, false);
    });
});
