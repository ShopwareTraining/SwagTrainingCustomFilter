# SwagExample Custom Filter plugin

**This Shopware plugin shows how to add a custom filter to the filter panel on product listing pages, which then selects on a Custom Field called `custom_product_foobar`.**

### Installation
```bash
bin/console plugin:refresh
bin/console plugin:install --activate SwagExampleCustomFilter
```

### Setup
Create a new Custom Field set that is assigned to **Product** entities. Add a new Custom Field to it with technical name `custom_product_foobar` and of type **Active Switch** (so that it saves a boolean to the database). Modify a couple of products to have the Custom Field value enabled.