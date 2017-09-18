# laravel-skeleton

## Features

* Laravel 5.5.x
* Development environment with docker
* Simpler forms [(laravel-form)](https://github.com/agence-webup/laravel-form)
* Robust SEO [(seotools)](https://github.com/artesaos/seotools)
* Minimalist CSS framework [(Higgcss)](https://github.com/robinparisi/higgcss)
* Complete workflow with gulp (images, LESS, scripts) and ES6 support
* Base template with configurable Analytics
* Fake SMTP [(maildev)](http://danfarrelly.nyc/MailDev/)
* Cache busting strategy [(laravel-cachebuster)](https://github.com/TheMonkeys/laravel-cachebuster) + Nginx conf
* CSS syntax with CSSComb (Needs this [atom package](https://atom.io/packages/css-comb))

## Requirements

### Linux

You just need to install Docker and Docker Compose:

* [docker](https://docs.docker.com/compose/install/)
* [docker-compose](https://docs.docker.com/compose/install/)

### OSX

You need to install docker-machine:

```shell
brew install docker
brew install docker-compose
brew install docker-machine
brew tap caskroom/cask
brew cask install virtualbox
docker-machine create --driver=virtualbox default
curl -s https://raw.githubusercontent.com/adlogix/docker-machine-nfs/master/docker-machine-nfs.sh |\
  sudo tee /usr/local/bin/docker-machine-nfs > /dev/null && \\
  sudo chmod +x /usr/local/bin/docker-machine-nfs
docker-machine-nfs default
eval $(docker-machine env)
```

Don't forget to enable NFS for better performance:

```shell
docker-machine-nfs default -f --mount-opts="noacl,async,nolock,vers=3,udp,noatime,actimeo=2"
```

###

## Credits

Developed by [Agence Webup](https://github.com/agence-webup)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
