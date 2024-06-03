document.addEventListener("DOMContentLoaded", function() {
    var openbtn = document.getElementById("openbtn");
    var sidebar = document.getElementById("sidebar");
    
    openbtn.addEventListener("click", function() {
        toggleSidebar();
    });

    // Tambahkan event listener untuk menutup sidebar ketika klik di luar sidebar
    document.addEventListener("click", function(event) {
        var target = event.target;
        if (target !== sidebar && !sidebar.contains(target) && target !== openbtn) {
            sidebar.style.width = "0";
            openbtn.style.marginLeft = "0";
        }
    });

    function toggleSidebar() {
        if (sidebar.style.width === "250px") {
            sidebar.style.width = "0";
            openbtn.style.marginLeft = "0";
        } else {
            sidebar.style.width = "250px";
            openbtn.style.marginLeft = "250px";
        }
    }
});
