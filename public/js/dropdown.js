$("#nivel").change(event => {
    $.get(`carreras/${event.target.value}`,function (res,sta){
        $("#carrera").empty();
        res.forEach(element => {
            $("#carrera").append(`<option value=${res.id}> ${res.nombre}</option>`);
        });
    });
});