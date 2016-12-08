<!DOCTYPE html>
<html>
<head lang="fr">
    <meta charset="UTF-8">
    <title>Ma super facture</title>
    <!--[if lt IE 9]>
    <meta name="viewport" content="initial-scale=1">
    <script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <style>
        body {
          padding: 1cm;
          color: #000;
          font-size: 7pt;
          font-family: "Open Sans", Helvetica, Arial, sans-serif;
        }

        * {
          box-sizing: border-box;
        }

        p {
          line-height: 10pt;
        }

        strong {
          font-weight: bold;
        }

        table {
          text-align: left;
          line-height: 9pt;
        }

        table td {
          min-height: 10pt;
        }

        a,
        a:visited,
        a:hover,
        a:active {
          color: #000;
          text-decoration: underline;
        }

        /* ----------------------------------------------------------- */
        /* == helpers */
        /* ----------------------------------------------------------- */

        .clear {
          clear: both;
          border: 0;
          background: none;
        }

        .left {
          float: left;
          overflow: hidden;
          white-space: nowrap;
        }

        .right {
          float: right;
          overflow: hidden;
          white-space: nowrap;
        }

        .vmiddle {
          vertical-align: middle;
        }

        .txtright {
          text-align: right;
        }

        .w100 {
          width: 100%;
        }

        .mt1 {
          margin-top: 1cm;
        }

        .mb1 {
          margin-bottom: 1cm;
        }

        .mb2 {
          margin-bottom: 2cm;
        }

        .mb05 {
          margin-bottom: .5rem;
        }

        .pt1 {
          padding-top: 1cm
        }
        .pb1 {
          padding-bottom: 1cm;
        }

        /* ----------------------------------------------------------- */
        /* == Layout */
        /* ----------------------------------------------------------- */

        .layoutTable {
          width: 100%;
          border: none;
          table-layout: fixed;
        }

        /* ----------------------------------------------------------- */
        /* == Modules */
        /* ----------------------------------------------------------- */

        /* Box
        -------------------------------------------------------------- */

        .box {
          border: .05cm solid #000;
        }

        .box__head {
          padding: .05cm;
          background: #000;
          color: #fff;
          text-align: center;
          font-weight: bold;
        }

        /* Tables
        -------------------------------------------------------------- */

        .table {
          width: 100%;
          border: .9pt solid #000;
          border-collapse: collapse;
          font-size: 6.5pt;
        }

        .table--auto {
          width: auto;
        }

        .table td,
        .table tr {
          padding: .05cm .3cm;
          border: .9pt solid #000;
        }

        .table td:empty {
          height: .5cm;
          border: none;
        }

        .table thead {
          padding: .05cm;
          background: #000;
          color: #fff;
          text-align: center;
          font-weight: bold;
        }

        .table thead {
          width: auto;
        }

        /* Footer
        -------------------------------------------------------------- */

        .footer {
          margin-top: 1cm;
          padding-top: .2cm;
          text-align: center;
        }

        .footer hr {
          margin-bottom: .25cm;
          height: .025cm;
          border: none;
          background-color: #000;
        }

    </style>

</head>
<body>
    <table class="layoutTable">
        <tr class="vmiddle">
            <td>
                <h1 class="header__logo">Mon super nom</h1>
            </td>
            <td class="txtright">
                <h2>Facture n° FA21978</h2>
            </td>
        </tr>
    </table>
    <table class="layoutTable mt1 mb1">
        <tr>
            <td>
                <table class="layoutTable">
                    <tr>
                        <td>
                            <strong>Numéro de commande</strong>
                        </td>
                        <td>16785HWE</td>
                    </tr>
                    <tr>
                        <td>Numéro facture</td>
                        <td>FA21978</td>
                    </tr>
                    <tr>
                        <td>Date commande</td>
                        <td>14/12/2016</td>
                    </tr>
                </table>
            </td>
            <td>
                <div class="box">
                    <div class="box__head">
                        Informations de paiement
                    </div>
                    <div class="box__content">
                        <table>
                            <tr>
                                <td>Mode de paiement : </td>
                                <td>carte bancaire</td>
                            </tr>
                            <tr>
                                <td>Date de paiement : </td>
                                <td>14/12/2016</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </td>
        </tr>
    </table>
    <table class="layoutTable mb1">
        <tr>
            <td>
                <h3>Adresse de livraison</h3>
                Chuck Norris<br />
                12 rue des Licones<br />
                72450 Roundhouse-Kick<br />
                Tél : 06 55 56 57 58<br />
            </td>
            <td>
                <h3>Adresse de facturation</h3>
                Chuck Norris<br />
                12 rue des Licones<br />
                72450 Roundhouse-Kick<br />
                Tél : 06 55 56 57 58<br />
            </td>
        </tr>
        <tr>
            <td colspan="2">
                Note : Portail bleu au fond à droite
            </td>
        </tr>
    </table>
    <table class="table mb05">
        <thead>
            <tr>
                <td>Réf.</td>
                <td class="w100">Description</td>
                <td>Prix&nbsp;unitaire&nbsp;TTC</td>
                <td>Quantité</td>
                <td>Total&nbsp;TTC</td>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>412354B</td>
                <td>Costume Armani Sportswear - L - Bleu or</td>
                <td class="txtright">14.50&nbsp;€</td>
                <td class="txtright">1</td>
                <td class="txtright">11&nbsp;414.50&nbsp;€</td>
            </tr>
            <tr>
                <td>35687M</td>
                <td>Polo Lacauste - M - Jaune anthracite</td>
                <td class="txtright">8.00&nbsp;€</td>
                <td class="txtright noborder">2</td>
                <td class="txtright">16.00&nbsp;€</td>
            </tr>
            <tr>
                <td colspan="5"></td>
            </tr>
            <tr>
                <td colspan="4">Promo Noël -50% sur l’article le moins cher</td>
                <td class="txtright">- 4.00&nbsp;€</td>
            </tr>
            <tr>
                <td colspan="5"></td>
            </tr>
            <tr>
                <td colspan="4">Frais de port (Colissimo 48h chrono)</td>
                <td class="txtright">5.50&nbsp;€</td>
            </tr>
        </tbody>
    </table>

    <div class="right">
        <table class="table table--auto">
            <tr>
                <td><strong>Total TTC</strong></td>
                <td class="txtright"><strong>32.00&nbsp;€</strong></td>
            </tr>
            <tr>
                <td>dont TVA (20,00%)</td>
                <td class="txtright">6.40&nbsp;€</td>
            </tr>
        </table>
    </div>
    <div class="clear"></div>

    <div class="mt1">
        <p>
            Les conditions générales de vente (CGV) applicables à votre commande et acceptées lors de son enregistrement sont disponibles sur notre site web.<br />
            Les conditions de garantie et de service après-vente sont généralement indiquées dans nos CGV et/ou sur la fiche produit.
        </p>
        <p>Pour davantage d’informations, contactez-nous via la page Contact de notre site.</p>
    </div>

    <div class="footer">
        <hr />
        Ocelo, SARL au capital de 0,50 €  —  74, Boulevard Decathlon - 24876 Ste Rozana<br />
        Téléphone&nbsp;:&nbsp;+33(0)6 21 22 23 24  -  Site&nbsp;web&nbsp;:&nbsp;<a href="http://www.ocelo-sportswear-perso-deluxe.com">http://www.ocelo-sportswear-perso-deluxe.com</a>  - E&#8209;mail&nbsp;:&nbsp;<a href="mailto:magnesium@ocelo.com">magnesium@ocelo.com</a>
    </div>
</body>
</html>
