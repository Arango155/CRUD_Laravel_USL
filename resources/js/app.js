require('./bootstrap');
import Swal from 'sweetalert';


function mostrarMensaje(mensaje){
    Swal.fire({
        icon: 'success',
        title: mensaje,
        showConfirmButton: false,
        timer: 1500
    })
}
