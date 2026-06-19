const translations = {
  es: {
    inicio: "Inicio",
    nosotros: "Sobre nosotros",
    transparencia: "Transparencia",
    donaciones1: "Donaciones",
    servi0: "Nuestros Servicios",
    servi1: "Atención médica a cargo de especialistas",
    servi2: "Entrega de medicamentos",
    servi3: "Pago de escuelas especializadas",
    servi4: "Entrega de silla de ruedas",
    servi5: "Cirugías de pie bot",
    servi6: "Pago de traslado de pacientes",
    servi7: "Tratamientos para sordos",
    servi8: "Atención, tratamiento y cirugías de problemas oftalmológicos",
    servi9: "Cirugías de ano imperforado",
    serviA: "Cirugías de labio leporino y fisura palatina",
    serviB: "Rehabilitación, estimulación temprana, ortodoncia, en el H.P.M.",
    descripcion:
      "Asociación de Padres y Amigos del Impedido Mental y Físico de las Colonias Unidas. Desde 1982. Asociación civil sin fines de lucro, administrada por los propios padres y personas de buena voluntad, que no tienen carácter político, religioso o sectario alguno.",
    contacto: "APADEM Colonias Unidas. Telefono: 071720524 – 0983 533111",
  },
  en: {
    inicio: "Start",
    nosotros: "About Us",
    transparencia: "Transparency",
    donaciones1: "Donations",
    servi0: "Our services",
    servi1: "Special Medical Attention",
    servi2: "Medicine Delivery",
    servi3: "Payment of special institutions",
    servi4: "Wheelchair delivery",
    servi5: "Prosthetic leg surgery",
    servi6: "Payment of pacient displacement",
    servi7: "Treatment for the deaf",
    servi8: "Attention, treatment and surgery related to ophthalmology issues",
    servi9: "Imperforated anal surgery",
    serviA: "Cleft lip and palate surgeries",
    serviB: "Rehabilitation, early stimulation, orthodontics, at the MPH",
    descripcion:
      "APADEM. Parents and Friends Association of Mental and Physical Handicap of Colonias Unidas. Established since 1982. Managed by our good volunteers and parents with no political, religious or sectary character.",
    contacto: "APADEM Colonias Unidas. Phone Number: 071720524 – 0983 533111",
  },
};

const selector = document.getElementById("lang-selector");
const htmlRoot = document.getElementById("html-root");

// Function to update the page text
function changeLanguage(lang) {
  // Update the HTML lang attribute for accessibility/SEO
  htmlRoot.setAttribute("lang", lang);

  // Find all elements with a data-key attribute
  document.querySelectorAll("[data-key]").forEach((element) => {
    const key = element.getAttribute("data-key");
    if (translations[lang] && translations[lang][key]) {
      element.textContent = translations[lang][key];
    }
  });

  // Save selection to local storage
  localStorage.setItem("preferredLang", lang);
}

// Listen for dropdown selection changes
selector.addEventListener("change", (e) => {
  changeLanguage(e.target.value);
});

// Check for stored preference on page load
window.addEventListener("DOMContentLoaded", () => {
  const savedLang = localStorage.getItem("preferredLang") || "es";
  selector.value = savedLang;
  changeLanguage(savedLang);
});
