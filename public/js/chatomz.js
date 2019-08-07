$(document).ready(function() {
    $('#data-table').DataTable({
        responsive: true
    });
});

function notif_delete() {
	tanya = confirm("Anda yakin akan Menghapus Data?");
	if (tanya == true) {
		return true;
	} else {
		return false;
	}
}

function notif_logout() {
	tanya = confirm("Anda yakin akan Keluar ?");
	if (tanya == true) {
		return true;
	} else {
		return false;
	}
}