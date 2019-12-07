# Kirby SEO Preview Section

![GitHub release](https://img.shields.io/github/v/release/REHvision/kirby-seo-preview-section?include_prereleases&sort=semver) ![License](https://img.shields.io/github/license/mashape/apistatus.svg) ![Kirby Version_3](https://img.shields.io/badge/Kirby-v3-black.svg)

Configurable & interactive SEO preview section for the Panel in Kirby 3+.

![seo-preview-section](https://user-images.githubusercontent.com/2584674/70377486-386e9400-1915-11ea-8542-69ef67e28412.gif)

--------------------------------------------------------------------------------

## Installation

Choose one of the following installation methods:

**Manually**

[Download](https://github.com/REHvision/kirby-seo-preview-section/archive/master.zip) and copy this repository to `/site/plugins/seo-preview-section`.

**Git submodule**

```shell
git submodule add https://github.com/REHvision/kirby-seo-preview-section.git site/plugins/seo-preview-section
```

**Composer**

```shell
composer require reh/kirby-seo-preview-section
```

--------------------------------------------------------------------------------

## Setup

After installing this plugin, you can add the `seopreview` section to your blueprints.

The easiest way to use it in multiple page blueprints is a tab blueprint (e.g. `site/blueprints/tabs/meta.yml`):

```yml
# site/blueprints/tabs/meta.yml

label: SEO
icon: search
columns:

  - width: 1/2
    fields:

      metatitle:
        label: Meta title
        type: text

      metadescription:
        label: Meta description
        type: textarea

  - width: 1/2
    sections:

      seopreview:
        type:                seopreview

#       options:             defaults:
        headline:            SEO preview

        titleField:          metatitle        # field key reference
        defaultTitle:        page.title       # query (e.g: page.myCustomSeoTitle)
        separator:           " "
        baseTitle:           site.title       # query (e.g. site.metatitle)

        descriptionField:    metadescription  # field key reference
        defaultDescription:  page.text        # query (e.g: page.text.blocks.html when using the editor)
```

that can be reused in the tab definition of `site` and any `page` blueprints:

```yml
tabs:

    # just use meta.yml
    meta: tabs/meta

    # or extend/overwrite it in this blueprint/template
    meta:
        extends: tabs/meta
        defaultDescription: page.text.blocks.html
```

**NOTE: This plugin only provides a preview and does not generate any meta tags!**

So make sure to wire the fields you use for meta tag generation and that the output of the preview mimics your actual meta tags!

--------------------------------------------------------------------------------

## Status & Development

**STATUS:**

first public release _(only yet tested with Kirby 3.3.1 in single-language setup)_

**IMPORTANT:**

Although this plugin should not be able to break anything, please always test it in your dev-environment before using it in production!

**FEEDBACK:**

I'm happy to receive feedback _(bugs, optimization suggestions or in general)_

**TODO:**

- [x] ~~Add composer compatibility~~
- [ ] Test with multi-language setups
- [ ] Document the plugin options
- [ ] Add instructions on how to help working on the plugin

--------------------------------------------------------------------------------

## License

MIT
