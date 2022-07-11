window.onload = () => {
    const group = document.getElementById("group");
    const teacher = document.getElementById("teacher");
    const auditorium = document.getElementById("auditorium");

    group.addEventListener("submit", function (event) {
        event.preventDefault();

        const thisGroup = new FormData(this);
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "lesson_list.php");
        xhr.responseType = 'text';
        xhr.send(thisGroup);

        xhr.onload = () => {
            document.getElementById("1").innerHTML = xhr.responseText;
        }
    });

    teacher.addEventListener("submit", function (event) {
        event.preventDefault();

        const thisTeacher = new FormData(this);
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "lesson_list.php");
        xhr.responseType = 'json';
        xhr.send(thisTeacher);

        xhr.onload = () => {
            document.getElementById("2").innerHTML = xhr.response;
        }
    });

    auditorium.addEventListener("submit", function (event) {
        event.preventDefault();

        const thisAuditorium = new FormData(this);
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "lesson_list.php");
        xhr.responseType = 'document';
        xhr.send(thisAuditorium);

        xhr.onload = () => {
            document.getElementById("3").innerHTML = xhr.responseXML.body.innerHTML;
        }
    });
}


