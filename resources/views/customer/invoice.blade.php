<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Facture</title>
    <style>

    body {
        font-family: "Helvetica Neue",Helvetica,Arial,sans-serif
    }

    .print {
        text-align: right;
        margin-bottom: 10px;
    }

    .number {
        text-align: right;
    }

    .logo {
        width: 200px;
        margin-bottom: 20px;
    }

    .logo svg > * {
        fill: #000;
    }

    .container {
        max-width: 800px;
        margin: 20px auto;
    }

    ul {
        list-style-type: none;
        padding: 0;
    }

    .body {
        margin-top: 30px;
    }

    .header__left {
        width: 50%;
        float: left;
    }

    .header__right {
        float: right;
    }

    .clear {
        clear: both;
    }

    table {
        table-layout: fixed;
        width: 100%;
        text-align: left;
        border-spacing: 0;
        border-collapse: collapse
    }

    table thead tr {
        border-bottom: 1px solid #000;
    }

    table td {
        padding: 5px 0;
    }

    .summary {
        float: right;
        width: 30%;
        margin-top: 20px;
        text-align: right;
    }

    .txtright {
        text-align: right;
    }

    @media print {
        button {
            display: none;
        }

        .container {
            width: auto;
        }
    }


    </style>
</head>
<body>
    <div class="container">
        <div class="print">
            <button onclick="window.print()">Imprimer cette facture</button>
        </div>
        <div class="number">
            Facture n° 0000
        </div>
        <div class="logo">
            logo
        </div>
        <div class="header">
            <div class="header__left">
                <ul>
                    <li>De</li>
                    <li>Fun Society</li>
                    <li>3027 West 12th Street</li>
                    <li>NY 11224 Brooklyn</li>
                    <li>United States</li>
                    <li>SIRET : 00000000000000</li>
                    <li>SARL au capital de 100 000,00 €</li>
                    <li>N° TVA FR00000000000</li>
                </ul>
            </div>
            <div class="header__right">
                <ul>
                    <li>societe</li>
                    <li>nom prenom</li>
                    <li>adresse</li>
                    <li>codePostal ville</li>
                    <li>pays</li>
                </ul>
            </div>
        </div>
        <div class="clear"></div>
        <div class="body">
            <table class="bill-content">
                <thead>
                    <tr>
                        <th>Articles</th>
                        <th class="txtright">Quantité</th>
                        <th class="txtright">Prix</th>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <td>article</td>
                        <td class="txtright">1</td>
                        <td class="txtright">100€</td>
                    </tr>
                </tbody>
            </table>

            <table class="summary">
                <tr>
                    <th>Total HT</th>
                    <td>100 €</td>
                </tr>
                <tr>
                    <th>TVA 20.0 %</th>
                    <td>20 €</td>
                </tr>
                <tr>
                    <th>Total TTC</th>
                    <td>120 €</td>
                </tr>
            </table>
        </div>
    </div>
</body>
</html>
