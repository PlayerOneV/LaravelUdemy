//Importamos Dropzone después de haberlo instalado
import Dropzone, { SUCCESS } from "dropzone"; MIDIAccess

//Indicamos que nosotros vamos a controlar el dropzone
Dropzone.autoDiscover = false;

//Instanciamos nuestra importación, la enlazamos con el dropzone en create.blade.php (un form) y establecemos sus propiedades
const dropzone = new Dropzone('#dropzone', {
    dictDefaultMessage: 'Sube aquí tu imagen',
    acceptedFiles: '.png,.jpg,.jpeg,.gif',
    addRemoveLinks: true,
    dictRemoveFile: 'Borrar archivo',
    maxFiles: 1,
    uploadMultiple: false,
});

dropzone.on('sending', function (file, xhr, formData) {
    console.log(file);
});

dropzone.on('success', function (file, response) {
    console.log(response);
});

dropzone.on('error', function (file, message) {
    console.log(message);
});

dropzone.on('removedfile', function () {
    console.log('archivo eliminado');
});

