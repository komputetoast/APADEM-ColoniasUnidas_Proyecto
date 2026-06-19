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
    de: {
    inicio: "Start",
    nosotros: "Über uns",
    transparencia: "Transparenz",
    donaciones1: "Spenden",
    servi0: "Unsere Leistungen",
    servi1: "Spezialmedizinische Versorgung",
    servi2: "Kostenübernahme durch spezielle Einrichtungen",
    servi3: "Rollstuhlversorgung",
    servi4: "Beinprothesenversorgung",
    servi5: "Kostenübernahme für den Patiententransport",
    servi6: "Behandlung für Gehörlose",
    servi7: "Betreuung, Behandlung und Operationen im Bereich der Augenheilkunde",
    servi8: "Operationen bei Analatresie",
    servi9: "Operationen bei Lippen- und Gaumenspalten",
    serviA: "Medikamentenlieferung",
    serviB: "Rehabilitation, Frühförderung, Kieferorthopädie im MPH (Medizinisches Kinderkrankenhaus)",
    descripcion:
      "APADEM. Eltern- und Freundeskreis für Menschen mit geistiger und körperlicher Behinderung in Colonias Unidas. Gegründet im Jahr 1982. Der Verein wird von unseren engagierten ehrenamtlichen Helfern und Eltern geleitet und ist weder politisch noch religiös oder sektenhaft ausgerichtet.",
    contacto: "APADEM Colonias Unidas. Telefonnummer: 071720524 – 0983 533111",
    },
    ja: {
    inicio: "ホーム",
    nosotros: "当団体について",
    transparencia: "透明性",
    donaciones1: "寄付",
    servi0: "当社のサービス",
    servi1: "特別な医療ケア",
    servi2: "医薬品の配達",
    servi3: "特別施設への支払い",
    servi4: "車椅子の配達",
    servi5: "義足手術",
    servi6: "患者の移送費の支払い",
    servi7: "聴覚障害者の治療",
    servi8: "眼科関連の診療、治療、手術",
    servi9: "肛門閉鎖症の手術",
    serviA: "口唇口蓋裂の手術",
    serviB: "MPH（小児医療病院）におけるリハビリテーション、早期刺激療法、矯正歯科治療",
    descripcion:
      "コロニアス・ウニダスにおける知的・身体障がい者の保護者・支援者協会（APADEM）。1982年設立。非営利の市民団体であり、保護者や善意ある人々自身によって運営されており、政治的、宗教的、あるいは宗派的な性格を一切有していない。",
    contacto: "APADEM Colonias Unidas. 電話番号: 071720524 – 0983 533111",
    },
};

const selector = document.getElementById("lang-selector");
const htmlRoot = document.getElementById("html-root");

// Actualizar el texto de la pagina
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

// Menu de seleccion
selector.addEventListener("change", (e) => {
  changeLanguage(e.target.value);
});

// Preferencia guardada
window.addEventListener("DOMContentLoaded", () => {
  const savedLang = localStorage.getItem("preferredLang") || "es";
  selector.value = savedLang;
  changeLanguage(savedLang);
});
