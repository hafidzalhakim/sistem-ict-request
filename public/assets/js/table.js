const rows = document.querySelectorAll(".request");
for (let i = 0; i < rows.length; i++) {
  const statusElement = rows[i].querySelector(".status");
  if (statusElement !== null) {
    const status = statusElement.textContent.trim();
    switch (status) {
      case "onprogress":
        rows[i].classList.add("ongo");
        break;
      case "done":
        rows[i].classList.add("don");
        break;
      // Tambahkan kasus lainnya jika diperlukan
      default:
        break;
    }
  } else {
    console.error("Elemen .status tidak ditemukan dalam elemen", rows[i]);
  }
}
