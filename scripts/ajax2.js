document.addEventListener("DOMContentLoaded", function () {
    const destinationContainer = document.getElementById("destinationCards");

    // Fetch destinations from API
    fetch("../api/get_destinations.php")
        .then((response) => response.json())
        .then((data) => {
            if (data.error) {
                destinationContainer.innerHTML = `<p class="text-danger">${data.error}</p>`;
                return;
            }

            // Populate destination cards
            data.forEach((destination) => {
                const card = document.createElement("div");
                card.className = "card col-lg-4 col-md-6 col-sm-12 mb-4";
                card.innerHTML = `
                    <img src="${destination.image}" class="card-img-top" alt="${destination.name}" style="height: 200px; object-fit: cover;">
                    <div class="card-body">
                        <h5 class="card-title">${destination.name}</h5>
                        <p class="card-text">${destination.description}</p>
                        <p class="text-primary">Harga: Rp ${destination.price.toLocaleString()}</p>
                        <a href="destinasi-detail.php?id=${destination.id}" class="btn btn-primary">Lihat Detail</a>
                    </div>
                `;
                destinationContainer.appendChild(card);
            });
        })
        .catch((error) => {
            console.error("Error fetching destinations:", error);
            destinationContainer.innerHTML = `<p class="text-danger">Gagal memuat destinasi. Silakan coba lagi.</p>`;
        });
});
