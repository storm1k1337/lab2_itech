const processor = document.getElementById('processor');
const processorList = document.getElementById('processor-list');
const software = document.getElementById('software');
const softwareList = document.getElementById('software-list');
const expired = document.getElementById('expired');
const expiredList = document.getElementById('expired-list');
const storage = window.localStorage;
const send = async function(data) {
    return await fetch('/controller.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(data)
    })
    .then(response => { return response.json() });
}

processor.onchange = function(e) {
    e.preventDefault();
    send({event: 'processor', processor: e.target.value})
    .then(val => processorList.innerHTML = val);
}

software.onchange = function(e) {
    e.preventDefault();

    storage.setItem('software', e.target.value);

    send({event: 'software', software: e.target.value})
    .then(val => softwareList.innerHTML = val);
}

expired.onclick = function(e) {
    e.preventDefault();
    send({event: 'expired', expired: Date.now() / 1000})
    .then(val => expiredList.innerHTML = val);
}

if (storage.getItem('software')) {
    software.value = storage.getItem('software');
    software.dispatchEvent(new Event('change'));
}