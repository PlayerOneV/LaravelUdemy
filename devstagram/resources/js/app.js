//Importamos Dropzone después de haberlo instalado
import Dropzone from "dropzone"; MIDIAccess

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