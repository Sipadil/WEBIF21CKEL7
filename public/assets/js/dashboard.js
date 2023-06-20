var loginDateElement = document.querySelector('.login_date_profile');

  // Mendapatkan waktu login saat ini
  var loginDate = new Date();

  // Mengatur teks konten elemen dengan waktu login
  loginDateElement.textContent = loginDate.toLocaleString(); 