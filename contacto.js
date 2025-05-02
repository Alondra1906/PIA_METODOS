document.getElementById('contact-form').addEventListener('submit', function(e) {  
    e.preventDefault();  
    const respuesta = document.getElementById('respuesta').value.trim();  
    if (respuesta == '6') {  
        alert('Formulario enviado con éxito!');  
        // Aquí puedes agregar la lógica para enviar los datos al servidor  
        this.reset();  
    } else {  
        alert('Respuesta incorrecta. Por favor, intenta nuevamente.');  
    }  
});