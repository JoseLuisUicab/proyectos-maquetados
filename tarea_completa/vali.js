function valida_envia() {
  if (document.formulario.n.value.length == 0){
      Swal.fire("escriba  su nombre")
      document.formulario.nombre.focus()
    return 0;
  }
  if (document.formulario.a.value.length == 0){
    Swal.fire("escriba sus apellidos")
    document.formulario.ape.focus()
  return 0;
}
if (document.formulario.m.value.length == 0){
  Swal.fire("escoja su sexo")
  document.formulario.telefono.focus()
return 0;
}
if (document.formulario.f.value.length == 0){
  Swal.fire("elija una fecha valida")
  document.formulario.area.focus()
return 0;
}

}