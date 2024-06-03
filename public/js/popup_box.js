

document.getElementById('cityCarLink').addEventListener('click', function(event) {
    event.preventDefault(); // Mencegah tindakan default dari link
    showPopup('City Car', 'Mulai dari Rp. 400.000/hari', 'Tahun: 2022', 'Kapasitas Penumpang: 4', 'Deskripsi: Mobil compact ideal untuk berkendara di dalam kota. Hemat bahan bakar dan mudah parkir. Dilengkapi dengan fitur infotainment yang modern.');
});

document.getElementById('suvLink').addEventListener('click', function(event) {
    event.preventDefault(); // Mencegah tindakan default dari link
    showPopup('SUV', 'Mulai dari Rp. 700.000/hari', 'Tahun: 2023', 'Kapasitas Penumpang: 5', 'Deskripsi: Mobil SUV tangguh yang cocok untuk petualangan di luar kota. Ruang interior yang luas dan fitur keamanan modern. Dilengkapi dengan sistem penggerak empat roda untuk menghadapi medan berat.');
});

document.getElementById('mpvLink').addEventListener('click', function(event) {
    event.preventDefault(); // Mencegah tindakan default dari link
    showPopup('MPV', 'Mulai dari Rp. 1.250.000/hari', 'Tahun: 2021', 'Kapasitas Penumpang: 7', 'Deskripsi: Mobil MPV keluarga dengan kenyamanan tinggi. Dilengkapi dengan fitur hiburan dan koneksi yang canggih. Ruang kabin yang lapang dan fleksibel, cocok untuk perjalanan jarak jauh bersama keluarga.');
});

function showPopup(type, price, year, capacity, description) {
    const popupContent = `
        <div class="popup-background" onclick="closePopup()"></div>
        <div class="popup">
            <span class="close" onclick="closePopup()">&times;</span>
            <div class="popup-content">
                <h2>Informasi Mobil</h2>
                <p>Tipe: ${type}</p>
                <p>Harga: ${price}</p>
                <p>${year}</p>
                <p>${capacity}</p>
                <p>${description}</p>
            </div>
        </div>
    `;
    document.body.insertAdjacentHTML('beforeend', popupContent);
}

function closePopup() {
    const popup = document.querySelector('.popup');
    const background = document.querySelector('.popup-background');
    popup.remove();
    background.remove();
}
