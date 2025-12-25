// Elements to indicate
var buttons = document.querySelectorAll(".kt_button");

// Handle button click event
buttons.forEach(function(button) {
    button.addEventListener("click", function() {
        // Disable button
        button.disabled = true;

        // Activate indicator
        button.setAttribute("data-kt-indicator", "on");

        // Disable indicator and enable button after 3 seconds
        setTimeout(function() {
            button.removeAttribute("data-kt-indicator");
            button.disabled = false;
        }, 3000);
    });
});
