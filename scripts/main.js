let search = false;
const box = document.getElementById('searchBox');
const txt = document.getElementById('searchText');
const btn = document.getElementById('searchBtn');

box.addEventListener("mouseenter", function () {
    box.style.background = "white";
    box.style.boxShadow = "1px 1px 5px #999";
    txt.style.width = "150px";
    txt.style.padding = "0 6px";
    txt.style.background = "white";
    btn.style.background = "greenyellow";
    btn.style.color = "#507c5c";
    btn.style.boxShadow = "1px 1px 5px #999";
});
box.addEventListener("mouseleave", function () {
    if (!search) {
        box.style.background = "#507c5c";
        box.style.boxShadow = "none";
        txt.style.width = "0";
        txt.style.padding = "0";
        txt.style.background = "#507c5c";
    }
    btn.style.background = "#cff09e";
    btn.style.color = "white";
    btn.style.boxShadow = "none";
});
txt.addEventListener("focus", function () {
    box.style.background = "white";
    box.style.boxShadow = "1px 1px 5px #999";
    txt.style.width = "150px";
    txt.style.padding = "0 6px";
    txt.style.background = "white";
    txt.style.color = "#2f3640";
    search = true;
});
txt.addEventListener("focusout", function () {
    box.style.background = "#507c5c";
    box.style.boxShadow = "none";
    txt.style.width = "0";
    txt.style.padding = "0";
    txt.style.background = "#507c5c";
    txt.style.color = "#adadad";

    btn.style.background = "#cff09e";
    btn.style.color = "white";
    btn.style.boxShadow = "none";
    search = false;
});

//lab1
function showPrice() {
    document.getElementById('price1').addEventListener('change', () => {
        document.getElementById('showPrice1').textContent = document.getElementById('price1').value;
    });
    document.getElementById('price2').addEventListener('change', () => {
        document.getElementById('showPrice2').textContent = document.getElementById('price2').value;
    });
}

//lab5
const task1 = "Выбрать из списка путей файлов, файлы, которые имеют расширение, указанное  в input.";
const task2 = "Регулярное выражение, убирающее протокол из адреса ссылки.";
function regular() {
    let numberTask = document.getElementById('numberTask');
    let task = document.getElementById('task');

    numberTask.addEventListener('change', () => {
        task.textContent = numberTask.value === "Task№1" ? task1 : task2;
    });
}