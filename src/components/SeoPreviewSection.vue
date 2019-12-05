<template>
    <section class="k-seopreview-section">
        <header class="k-section-header">
            <k-headline>{{ headline }}</k-headline>
        </header>
        <div class="seo-preview">
            <h3>{{ seotitle }}</h3>
            <p class="link">{{ url }}</p>
            <p>{{ seodescription }}</p>
        </div>
    </section>
</template>

<script>
export default {
    data() {
        return {
            headline:           null,
            issue:              null,
            url:                null,
            siteTitle:          null,
            pageTitle:          null,
            isSite:             null,

            titleField:         null,
            defaultTitle:       null,
            separator:          null,
            baseTitle:          null,

            descriptionField:   null,
            defaultDescription: null,
        };
    },
    created() {
        this.load()
        .then(response => {
            this.headline           = response.headline;
            this.url                = response.url;
            this.siteTitle          = response.siteTitle;
            this.pageTitle          = response.pageTitle;
            this.isSite             = response.isSite;

            this.titleField         = response.titleField;
            this.defaultTitle       = response.seoDefaultTitle;
            this.separator          = response.separator;
            this.baseTitle          = response.seoBaseTitle;

            this.descriptionField   = response.descriptionField;
            this.defaultDescription = response.seoDefaultDescription;
        })
        .catch (error => {
            this.issue = error;
        });
    },
    computed: {
        seotitle() {
            if(this.isSite) {
                return (this.separator != '' ? '...' + this.separator : ' ') + (this.$store.getters["content/values"]()[this.titleField] || this.siteTitle);
            } else {
                return (this.$store.getters["content/values"]()[this.titleField] || this.defaultTitle) + this.separator + this.baseTitle;
            }
        },
        seodescription() {
            if(this.isSite) {
                return this.$store.getters["content/values"]()[this.descriptionField];
            } else {
                return this.$store.getters["content/values"]()[this.descriptionField] || this.defaultDescription;
            }
        }
    }
};
</script>

<style lang="scss">
.seo-preview {
    padding: 1.5rem;
    color: #444;
    line-height: 1.5rem;
    background: rgba(255,255,255,.25);
    border: none;
    box-shadow: 0 0 8px rgba(0,0,0,.1);
}
.seo-preview h3 {
    color: #0f70b7;
    font-size: 1.1rem;
    margin-bottom: 0;
    font-weight: normal;
}
.seo-preview .link {
    color: green;
    text-decoration: none;
}
</style>
