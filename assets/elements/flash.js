import Swal from 'sweetalert2';

export default class Flash extends HTMLElement
{
    async connectedCallback(){
        await Swal.fire({
        title: "Drag me!",
        icon: "success",
        draggable: true
});
    }
}