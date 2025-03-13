import './bootstrap';


const sidebar = document.getElementById("sidebar");
const toggleButton = document.getElementById("toggleButton");
const sidebarTexts = document.querySelectorAll(".sidebar-text");
const tooltipElements = document.querySelectorAll(".tooltip-element");
let isCollapsed = true;

const toggleTooltips = (show) => {
    tooltipElements.forEach((tooltip) => {
        if (show) {
            tooltip.classList.remove("hidden");
            tooltip.classList.add("block");
        } else {
            tooltip.classList.add("hidden");
            tooltip.classList.remove("block");
        }
    });
};

toggleTooltips(true);

toggleButton.addEventListener("click", () => {
    isCollapsed = !isCollapsed;

    if (isCollapsed) {
        sidebar.classList.remove("w-64");
        sidebar.classList.remove("overflow-y-auto");
        sidebar.classList.add("w-16");
        toggleButton.innerHTML = '<i class="fas fa-chevron-right"></i>';
        sidebarTexts.forEach((text) => text.classList.add("hidden"));
        toggleTooltips(true);
    } else {
        sidebar.classList.remove("w-16");
        sidebar.classList.add("w-64");
        sidebar.classList.add("overflow-y-auto");
        toggleButton.innerHTML = '<i class="fas fa-chevron-left"></i>';
        sidebarTexts.forEach((text) => text.classList.remove("hidden"));
        toggleTooltips(false);
    }
});

// categories
 
 const openModalBtn = document.getElementById("openModalBtn");
 const closeModalBtn = document.getElementById("closeModalBtn");
 const categoryModal = document.getElementById("categoryModal");


 openModalBtn.addEventListener("click", () => {
     categoryModal.classList.remove("hidden");
     categoryModal.classList.add("flex")
 });

 closeModalBtn.addEventListener("click", () => {
     categoryModal.classList.add("hidden");
 });


 categoryModal.addEventListener("click", (e) => {
     if (e.target === categoryModal) {
         categoryModal.classList.add("hidden");
     }
 });

 
 