function showRequestDetails(id_request, id_assign) {
  fetch(
    `<?= base_url('request/getRequestData') ?>?id_request=${id_request}&id_assign=${id_assign}`
  )
    .then((response) => response.json())
    .then((data) => {
      if (data.error) {
        document.getElementById("requestData").innerText = data.error;
      } else {
        document.getElementById("requestData").innerHTML = `
                    <p>ID Request: ${data.request.id_request}</p>
                    <p>Jenis Permintaan: ${data.request.jpermintaan}</p>
                    <p>Kode Barang: ${data.request.kode_barang}</p>
                    <p>Date Approve: ${data.request.date_approve}</p>
                    <p>Description: ${data.request.description}</p>
                    <p>Nama Pengguna: ${data.request.nama_pengguna}</p>
                    <p>Divisi: ${data.request.divisi}</p>
                    <p>Solusi: ${data.request.solusi}</p>
                    <hr>
                    <p>ID Assign: ${data.assignment.id_assign}</p>
                    <p>Date Assign: ${data.assignment.date_assign}</p>
                    <p>Status Request: ${data.assignment.status_request}</p>
                    <p>Status Pengerjaan: ${data.assignment.status_pengerjaan}</p>
                    <p>Assigned: ${data.assignment.assigned}</p>
                    <p>Date Complete: ${data.assignment.date_complete}</p>
                `;
      }
      $("#requestModal").modal("show");
    });
}
