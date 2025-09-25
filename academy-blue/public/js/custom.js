function remove() {
    let x = confirm("¿Está seguro de que desea eliminar el registro?");
    if (x)
        return true;
    else
        return false;
}