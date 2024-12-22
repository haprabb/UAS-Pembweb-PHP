document.addEventListener("DOMContentLoaded", function () {
    const searchInput = document.querySelector("#liveSearch");
    const dropdownList = document.querySelector("#dropdownResults");

    searchInput.addEventListener("input", function () {
        const searchTerm = searchInput.value;

        if (searchTerm.trim() === "") {
            dropdownList.innerHTML = ""; // Clear results if input is empty
            return;
        }

        // Fetch data from the server
        fetch(`../query-db/search.php?term=${encodeURIComponent(searchTerm)}`)
            .then(response => response.json())
            .then(data => {
                // Clear previous dropdown results
                dropdownList.innerHTML = "";

                if (data.error) {
                    console.error(data.error);
                    return;
                }

                // Populate dropdown with new data
                data.forEach(item => {
                    const listItem = document.createElement("a");
                    listItem.href = `destinasi.php?id=${item.id}`;
                    listItem.className = "list-group-item list-group-item-action";
                    listItem.textContent = item.name;
                    dropdownList.appendChild(listItem);
                });
            })
            .catch(err => console.error("Error fetching data:", err));
    });
});
