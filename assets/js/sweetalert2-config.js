$(document).ready(function() {
	$('.btn-delete').on('click', function(e){
		e.preventDefault();

		const href = $(this).attr('href');
		const nama 	= $(this).data('nama');

		Swal.fire({
		  title: 'Apakah Kamu Yakin?',
		  text: "Ingi menghapus " + nama,
		  icon: 'warning',
		  showCancelButton: true,
		  cancelButtonColor: '#3085d6',
		  confirmButtonColor: '#d33',
		  confirmButtonText: 'Hapus!'
		}).then((result) => {
		  if (result.value) {
		    document.location.href = href;
		  }
		});
	});
});