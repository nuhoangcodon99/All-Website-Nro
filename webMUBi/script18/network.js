async function _post(url, data) {
    try {
        const response = await fetch(url, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
            body: JSON.stringify(data)
        });
        
        if (!response.ok) {
            return JSON.stringify({ error: 99 });
        }
        const responseData = await response.json();
            return JSON.stringify({ error: 0 , data : responseData});
        } catch (error) {
            return JSON.stringify({ error: 99 });
        }
    }
    
async function _get(url, data) {
    if (data == null) {
        return new Promise((resolve, reject) => {
            var xhr = new XMLHttpRequest();
            xhr.open("GET", url, true);
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4) {
                    if (xhr.status === 200) {
                        resolve(JSON.parse(xhr.responseText)); 
                    } else {
                        reject(new Error(`HTTP error: ${xhr.status}`));
                    }
                }
            };
            xhr.send();
        });
    } else {
        var params = new URLSearchParams({
            data: JSON.stringify(data)
        }).toString();

        try {
            const response = await fetch(url + "?" + params);
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            const responseData = await response.json();
            return responseData; 
        } catch (error) {
            console.error('There was a problem with the fetch operation:', error);
            throw error; 
        }
    }
}


async function _file(file, data, url) {
    if (!file) {
        return JSON.stringify({error: 99, message: 'No file selected' });
    }

    const formData = new FormData();
    formData.append('file', file);
    for (const [key, value] of Object.entries(data)) {
        formData.append(key, value);
    } 
    try {
        const response = await fetch(url, {
            method: 'POST',
            body: formData
        });
        const result = await response.text();
            return (result);
    } catch (error) {
        return JSON.stringify({ error: 99, message: error.message });
    }
}



function ktdb(text) {
    const specialCharRegex = /[!@#$%^&*(),.?":{}|<>]/;
    return specialCharRegex.test(text);
}    