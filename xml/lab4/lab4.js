let objDom;
objDom = new ActiveXObject("MSXML.DOMDocument");
objDom.async = false;
objDom.load("lab4.xml");
let objNodeList;
objNodeList = objDom.getElementsByTagName("type");

function refresh() {
    let xmlDiv = document.getElementById('xmlDiv');
    xmlDiv.innerHTML = '<xmp>' + objDom.xml + '</xmp>';
    objNodeList = objDom.getElementsByTagName("type");
}

function buildTable() {
    let text =
        '<table>' +
        '<caption>База данных</caption>' +
        '<tr>' +
        '<td>Сезон</td>' +
        '<td>Пол</td>' +
        '<td>Модель</td>' +
        '<td>ID</td>' +
        '<td>Название модели</td>' +
        '<td>Ссылка на фото</td>' +
        '<td>Вес</td>' +
        '<td>Длина</td>' +
        '<td>Ширина</td>' +
        '<td>Высота</td>' +
        '<td>Цена</td>' +
        '<td>Цвет</td>' +
        '<td>Описание</td>' +
        '<td>Опции</td>' +
        '</tr>';

    let season;
    let gender;
    let model;
    let type;
    let modelName;
    let image;
    let weight;
    let height;
    let width;
    let topTop;
    let price;
    let color;
    let description;
    for (let i = 0; i < objNodeList.length; ++i) {
        season = '<td>' + objNodeList.item(i).parentNode.parentNode.parentNode.getAttribute('name') + '</td>';
        gender = '<td>' + objNodeList.item(i).parentNode.parentNode.getAttribute('sex') + '</td>';
        model = '<td>' + objNodeList.item(i).parentNode.getAttribute('name') + '</td>';
        type = '<td>' + objNodeList.item(i).getAttribute('id') + '</td>';
        modelName =
            '<td>' +
            '<input type="text" id="modelName' + i + '" value="' + objNodeList.item(i).childNodes.item(0).firstChild.nodeValue + '">' +
            '</td>';
        image =
            '<td>' +
            '<input type="text" id="image' + i + '"  value="' + objNodeList.item(i).childNodes.item(1).firstChild.nodeValue + '">' +
            '</td>';
        weight =
            '<td>' +
            '<input type="text" id="weight' + i + '" value="' + objNodeList.item(i).childNodes.item(2).firstChild.nodeValue + '">' +
            '</td>';
        height =
            '<td>' +
            '<input type="text" id="height' + i + '" value="' + objNodeList.item(i).childNodes.item(3).childNodes.item(0).firstChild.nodeValue + '">' +
            '</td>';
        width =
            '<td>' +
            '<input type="text" id="width' + i + '" value="' + objNodeList.item(i).childNodes.item(3).childNodes.item(1).firstChild.nodeValue + '">' +
            '</td>';
        topTop =
            '<td>' +
            '<input type="text" id="topTop' + i + '" value="' + objNodeList.item(i).childNodes.item(3).childNodes.item(2).firstChild.nodeValue + '">' +
            '</td>';
        price =
            '<td>' +
            '<input type="text" id="price' + i + '"  value="' + objNodeList.item(i).childNodes.item(4).firstChild.nodeValue + '">' +
            '</td>';
        color =
            '<td>' +
            '<input type="text" id="color' + i + '"  value="' + objNodeList.item(i).childNodes.item(5).firstChild.nodeValue + '">' +
            '</td>';
        description =
            '<td>' +
            '<input type="text" id="description' + i + '"  value="' + objNodeList.item(i).childNodes.item(6).firstChild.nodeValue + '">' +
            '</td>';

        text +=
            '<tr>'
            + season + gender + model + type + modelName + image + weight + height + width + topTop + price + color + description +
            '<td>' +
            '<input type="button" value="Изменить" onclick="change(' + i + ')">' +
            '<input type="button" value="Удалить" onclick="del(' + i + ')">' +
            '</td>' +
            '</tr>';
    }
    text += '</table>';
    document.getElementById('tableDiv').innerHTML = text;
}

function del(num) {
    let elem = objNodeList.item(num);
    elem.parentNode.removeChild(elem);
    refresh();
    buildTable();
}

function change(num) {
    let elem = objNodeList.item(num);
    let newElem = elem.cloneNode(true);

    let modelName = document.getElementById('modelName' + num).value;
    let image = document.getElementById('image' + num).value;
    let weight = document.getElementById('weight' + num).value;
    let height = document.getElementById('height' + num).value;
    let width = document.getElementById('width' + num).value;
    let topTop = document.getElementById('topTop' + num).value;
    let price = document.getElementById('price' + num).value;
    let color = document.getElementById('color' + num).value;
    let description = document.getElementById('description' + num).value;

    newElem.childNodes.item(0).firstChild.nodeValue = modelName;
    newElem.childNodes.item(1).firstChild.nodeValue = image;
    newElem.childNodes.item(2).firstChild.nodeValue = weight;
    newElem.childNodes.item(3).childNodes.item(0).nodeValue = height;
    newElem.childNodes.item(3).childNodes.item(1).nodeValue = width;
    newElem.childNodes.item(3).childNodes.item(2).nodeValue = topTop;
    newElem.childNodes.item(4).firstChild.nodeValue = price;
    newElem.childNodes.item(5).firstChild.nodeValue = color;
    newElem.childNodes.item(6).firstChild.nodeValue = description;

    elem.parentNode.replaceChild(newElem, elem);
    refresh();
    buildTable();
}

function add() {

    let season = document.getElementById('seasonAdd').value;
    let gender = document.getElementById('genderAdd').value;
    let model = document.getElementById('modelAdd').value;
    let type = document.getElementById('typeAdd').value;
    let modelName = document.getElementById('modelNameAdd').value;
    let image = document.getElementById('imageAdd').value;
    let weight = document.getElementById('weightAdd').value;
    let height = document.getElementById('heightAdd').value;
    let width = document.getElementById('widthAdd').value;
    let top = document.getElementById('topAdd').value;
    let price = document.getElementById('priceAdd').value;
    let color = document.getElementById('colorAdd').value;
    let description = document.getElementById('descriptionAdd').value;

    let seasons = objDom.getElementsByTagName("season");
    if (season === 'summer')
        seasons = objDom.getElementsByTagName("season")[0];
    else if (season === 'winter')
        seasons = objDom.getElementsByTagName("season")[1];
    else
        seasons = objDom.getElementsByTagName("season")[2];

    let genders = seasons.getElementsByTagName("gender");
    if (gender === 'male')
        genders = seasons.getElementsByTagName("gender")[0];
    else
        genders = seasons.getElementsByTagName("gender")[1];

    let root = genders;

    let modelFl = 0;

    let models = genders.getElementsByTagName("model");
    for (let i = 0; i < models.length; i++)
        if (models.item(i).getAttribute("name") === model) {
            modelFl = 1;
            root = models.item(i);
            break;
        }


    let elem = null;

    let newElement;
    let a;
    let b;
    let c;
    let d;
    let text;
    let e;
    let f;
    let g;
    let k;
    let l;
    if (modelFl === 0) {

        elem = objDom.createElement("model");
        elem.setAttribute("name", model);

        newElement = objDom.createElement("type");
        newElement.setAttribute("id", type);

        a = objDom.createElement("modelName");
        text = objDom.createTextNode(modelName);
        a.appendChild(text);

        b = objDom.createElement("image");
        text = objDom.createTextNode(image);
        b.appendChild(text);

        c = objDom.createElement("weight");
        text = objDom.createTextNode(weight);
        c.appendChild(text);

        d = objDom.createElement("height");
        text = objDom.createTextNode(height);
        d.appendChild(text);

        e = objDom.createElement("width");
        text = objDom.createTextNode(width);
        e.appendChild(text);

        f = objDom.createElement("top");
        text = objDom.createTextNode(top);
        f.appendChild(text);

        g = objDom.createElement("price");
        text = objDom.createTextNode(price);
        g.appendChild(text);

        k = objDom.createElement("color");
        text = objDom.createTextNode(color);
        k.appendChild(text);

        l = objDom.createElement("description");
        text = objDom.createTextNode(description);
        l.appendChild(text);

        newElement.appendChild(a);
        newElement.appendChild(b);
        newElement.appendChild(c);
        newElement.appendChild(d);
        newElement.appendChild(e);
        newElement.appendChild(f);
        newElement.appendChild(g);
        newElement.appendChild(k);
        newElement.appendChild(l);
        elem.appendChild(newElement);

        root.appendChild(elem);
    } else {

        newElement = objDom.createElement("type");
        newElement.setAttribute("id", type);

        a = objDom.createElement("modelName");
        text = objDom.createTextNode(modelName);
        a.appendChild(text);

        b = objDom.createElement("image");
        text = objDom.createTextNode(image);
        b.appendChild(text);

        c = objDom.createElement("weight");
        text = objDom.createTextNode(weight);
        c.appendChild(text);

        d = objDom.createElement("height");
        text = objDom.createTextNode(height);
        d.appendChild(text);

        e = objDom.createElement("width");
        text = objDom.createTextNode(width);
        e.appendChild(text);

        f = objDom.createElement("top");
        text = objDom.createTextNode(top);
        f.appendChild(text);

        g = objDom.createElement("price");
        text = objDom.createTextNode(price);
        g.appendChild(text);

        k = objDom.createElement("color");
        text = objDom.createTextNode(color);
        k.appendChild(text);

        l = objDom.createElement("description");
        text = objDom.createTextNode(description);
        l.appendChild(text);

        newElement.appendChild(a);
        newElement.appendChild(b);
        newElement.appendChild(c);
        newElement.appendChild(d);
        newElement.appendChild(e);
        newElement.appendChild(f);
        newElement.appendChild(g);
        newElement.appendChild(k);
        newElement.appendChild(l);

        root.appendChild(newElement);
    }
    refresh();
    buildTable();
}

refresh();
buildTable();
