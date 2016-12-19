class CartService {
    constructor(url, csrfToken) {
        this.url = url;
        this.csrfToken = csrfToken;
    }

    get() {
        return new Promise((resolve, reject) => {
            const xhr = new XMLHttpRequest();
            xhr.open('GET', this.url, true);
            xhr.onreadystatechange = function() {
                if (xhr.readyState == XMLHttpRequest.DONE && xhr.status == 200) {
                    const data = JSON.parse(xhr.response);
                    resolve(data);
                } else if (xhr.readyState == XMLHttpRequest.DONE) {
                    reject();
                }
            };
            xhr.setRequestHeader('Accept', 'application/json');
            xhr.send();
        });
    }

    add(id, quantity) {
        return new Promise((resolve, reject) => {
            const xhr = new XMLHttpRequest();
            xhr.open('POST', this.url + '/products', true);
            xhr.onreadystatechange = function() {
                if (xhr.readyState == XMLHttpRequest.DONE && xhr.status == 200) {
                    resolve();
                } else if (xhr.readyState == XMLHttpRequest.DONE) {
                    reject();
                }
            };
            xhr.setRequestHeader('Accept', 'application/json');
            xhr.setRequestHeader("Content-Type", "application/json");
            xhr.send(JSON.stringify({
                _token: this.csrfToken,
                id: id,
                quantity: quantity,
            }));
        });
    }

    update(id, quantity) {
        return new Promise((resolve, reject) => {
            const xhr = new XMLHttpRequest();
            xhr.open('PUT', this.url + '/products/' + id, true);
            xhr.onreadystatechange = function() {
                if (xhr.readyState == XMLHttpRequest.DONE && xhr.status == 200) {
                    resolve();
                } else if (xhr.readyState == XMLHttpRequest.DONE) {
                    reject();
                }
            };
            xhr.setRequestHeader('Accept', 'application/json');
            xhr.setRequestHeader("Content-Type", "application/json");
            xhr.send(JSON.stringify({
                _token: this.csrfToken,
                quantity: quantity,
            }));
        });
    }

    remove(id) {
        return new Promise((resolve, reject) => {
            const xhr = new XMLHttpRequest();
            xhr.open('DELETE', this.url + '/products/' + id, true);
            xhr.onreadystatechange = function() {
                if (xhr.readyState == XMLHttpRequest.DONE && xhr.status == 200) {
                    resolve();
                } else if (xhr.readyState == XMLHttpRequest.DONE) {
                    reject();
                }
            };
            xhr.setRequestHeader('Accept', 'application/json');
            xhr.setRequestHeader("Content-Type", "application/json");
            xhr.send(JSON.stringify({
                _token: this.csrfToken,
            }));
        });
    }
}
