const flashData = $('.flash-data').data('flashdata');
const flashDataErrors = $('.flash-data-errors').data('flashdata');


if( flashData ) {
  swal({
    title: "Data Berhasil " + flashData,
    icon: "success",
    button: "Ok",
    });
} else if (flashDataErrors) {
  swal(flashDataErrors, {
    icon: "error",  
  });
}

$('.tombol-hapus').on('click', function(e){
  e.preventDefault(); //cancel default action

  //Recuperate href value
  var href = $(this).attr('href');
  var message = $(this).data('confirm');

  //pop up
  swal({
      title: "Yakin Menghapus Data ini?",
      icon: "warning",
      buttons: true,
      dangerMode: true,
  })
  .then((willDelete) => {
    if (willDelete) {
        document.location.href = href;  
    }else {
      swal("Data Batal Dihapus", {
        icon: "error",  
      });
    } 
  });
});



