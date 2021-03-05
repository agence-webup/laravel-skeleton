# [Nom du projet]

# Checklist

À vérifier lors de la mise en ligne :

## Technique

- [ ] les sessions PHP sont configurées pour utiliser REDIS
- [ ] la variable APP_ENV est configurée sur `production` 
- [ ] le cache busting est fonctionnel pour tous les assets (Gulp, Mix et NPM)
- [ ] les commandes de build prennent en compte l'environnement de production (`npm run prod` et `gulp --production`)
- [ ] les backups sont configurées avec ping sur Healtcheck
- [ ] updown est configuré
- [ ] le dns est configuré avec un sous domaine pour les assets
- [ ] l'outil de mails transactionnel est configuré avec DKIM et SPF
- [ ] les cron sont monitorés sur healthcheck
- [ ] le SSL est vérifié https://www.ssllabs.com/ssltest/analyze.html

## SEO

- [ ] la balise canonical est fonctionnelle sur toutes les pages
- [ ] la version www/non-www est correctement redirigée
- [ ] la strcuture des URLs est propre
- [ ] les routes dynamiques ne permettent pas l'utilisation d'accents ou de majuscules
- [ ] les balises `<title>` et `<meta name="description">` sont uniques sur chaque page
- [ ] les listing disposent de balise <prev> et <next>
- [ ] le site est indexable (retirer le noindex de la version pre-prod)

## Comment lancer ce projet ?

1) Ce projet nécessite un environnement docker + docker-compose (https://docs.docker.com/compose/install/)
2) `cp .env.example .env` puis modifier les valeurs
3) `cp docker-compose.override.sample.yml docker-compose.override.yml`, modifier les valeurs (mot de passe MySQL, etc)
4) `docker-compose up -d`
