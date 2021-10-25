
dataLayer.push({
    'event': 'ecomEvent',               // The event name in order for Google Tag Manager to listen for data
    'ecommerce': {
      'currencyCode': 'NOK',
      'purchase': {
        'actionField': {
          'id': 'ORDERID12345',         // Unique ID for the purchase
          'affiliation': 'OC Webshop',
          'revenue': '12789'            // Total sum of purchase
        },
        'products': [
          {
            'name': 'iPhone Xs Max 64 GB Gull',
            'id': 'ID12345',
            'price': '12690',
            'brand': 'Apple',
            'category': 'Phones/Hardware/Mobile Phones/New', // Including condition of the product - Ny (new) / NestenNy (refurbished)
            'quantity': 1,
            'sku': 'SKU12345',
            'newCustomer': 'false',     // 'newCustomer' - Signifies if the purchase resulted in a new customer or not.
            'coupon': ''                // Leave blank if no coupon is used
          },
          {
            'name': 'PrøveKjøp',
            'id': 'ID12345',
            'price': '99',
            'brand': 'OneCall',
            'category': 'Abonnement/Mobilabonnement/Enkeltbruker',
            'quantity': 1,
            'sku': 'SKU12345',
            'newCustomer': 'true',
            'coupon': ''
          },
          {
            'name': 'Smarttelefonforsikring',
            'id': 'ID12345',
            'price': '0',
            'brand': 'OneCall',
            'category': 'Tilleggstjenester',
            'quantity': 1,
            'sku': 'SKU12345',
            'newCustomer': 'false',
            'coupon': 'GRATIS_TILVALG'  // Populate with campaign ID
          }]
      }
    }
  });