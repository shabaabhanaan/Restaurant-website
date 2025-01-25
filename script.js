// Filter by Price Function
function filterByPrice() {
    const range = document.getElementById("price-range").value;
    const items = document.querySelectorAll(".menu-item");

    items.forEach(item => {
        const price = parseFloat(item.getAttribute("data-price"));

        // Apply filtering logic based on price range
        if (
            range === "all" ||
            (range === "low" && price < 10) ||
            (range === "medium" && price >= 10 && price <= 15) ||
            (range === "high" && price > 15)
        ) {
            item.style.display = "block"; // Show items within the selected price range
        } else {
            item.style.display = "none"; // Hide items outside the selected price range
        }
    });
}

// Contact Form Submit Handler
document.getElementById("contact-form").addEventListener("submit", function (event) {
    event.preventDefault(); // Prevent the page from reloading

    const name = document.getElementById("name").value;
    const email = document.getElementById("email").value;
    const message = document.getElementById("message").value;

    // Simple alert confirmation (you can replace this with backend handling later)
    alert(`Thank you, ${name}! Your message has been sent.`);
    console.log(`Name: ${name}, Email: ${email}, Message: ${message}`);

    // Reset the form after submission
    document.getElementById("contact-form").reset();
});
