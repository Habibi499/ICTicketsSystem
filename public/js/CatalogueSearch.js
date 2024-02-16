document.addEventListener("DOMContentLoaded", function () {
    // Get the input element and services cards
    var searchInput = document.getElementById('serviceSearch');
    var serviceCards = document.querySelectorAll('.card');

    // Add an event listener to the search input
    searchInput.addEventListener('input', function () {
        var searchQuery = this.value.toLowerCase();

        // Loop through each service card
        serviceCards.forEach(function (card) {
            var cardText = card.querySelector('.card-body p').textContent.toLowerCase();

            // Toggle a 'hidden' class based on the search query
            if (cardText.includes(searchQuery)) {
                card.classList.remove('hidden');
            } else {
                card.classList.add('hidden');
            }
        });
    });
});