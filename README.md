<img src="https://contao.org/files/contao/logo/contao-logo-corporate.svg" alt="Contao Open Source CMS Logo">

# Contao Show #24

Hier findest du meine Beispiele aus der Contao Show #24 vom 25.02.2026.

Die Show findest du hier auf YouTube: https://to.contao.org/tv/show/24

## Beispiel TWIG Filter

### Zufälliges Emoji

randomEmoji

```
    {%- block headline_inner -%}
        {{ headline.text|insert_tag_raw|randomEmoji }}
    {%- endblock -%}
```

   
### Hervorgehobene Nachrichten mit ⭐️ markieren

isFeatured

```
    <h2>{{ linkHeadline|sanitize_html('contao')|isFeatured(featured)|raw }}</h2>
```

   
### Text sinnvoll kürzen

smartTruncate

```
    {{ teaser|default|sanitize_html('contao')|csp_inline_styles|insert_tag_raw|smartTruncate(120)|raw }}
```

![Die Contao Show (Folge 24) – Hallo Contao 5.7](docs/contao-show-episode-024.jpg)