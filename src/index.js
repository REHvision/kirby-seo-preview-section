import SeoPreviewSection from "./components/SeoPreviewSection.vue";

panel.plugin("reh/seo-preview-section", {
  sections: {
    seopreview: {
      extends: SeoPreviewSection,
    }
  }
});
