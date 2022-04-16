$(document).ready(function () {

    $("#botaoModal").click(function () {
        $("#modal").hide();
    });

    $('#botao').click(function (object) {

        $("#modal").show();
    });

    $('input[name="tptid"]').change(function (object) {

        var texto = object.target.alt;
        var value = object.target.value;

        var html = '';
        html += '<tr><td>';
        html += '<div class="br-checkbox hidden-label">';
        html += '<input id="checkbox' + value + '" name="checkbox[' + value + ']" type="checkbox"/>';
        html += '<label for="checkbox' + value + '">' + texto + '</label>';
        html += '</div>';
        html += '</td>';

        html += '<td data-th="Título coluna 1">' + texto + '</td>';

        html += '<td data-th="Título coluna 2">' +
            '<div class="col-sm-6 col-md-12">' +
            '<div class="br-datetimepicker" data-mode="single" data-type="text">' +
            '<div class="br-input has-icon">' +
            '<label for="simples-input"></label>' +
            '<input class="has-icon" style="background-color: #ffffff !important; color: #000000;" id="prazoSus' + value + '" type="text" name="prazoSus[' + value + ']" placeholder="dd/mm/aaaa" data-input="data-input"/>' +
            '<button class="br-button circle small" type="button" aria-label="Abrir Timepicker" data-toggle="data-toggle" id="simples-input-btn">' +
            '<i class="fas fa-calendar-alt" aria-hidden="true"></i>' +
            '</button>' +
            '</div>' +
            '</div>' +
            '</div>' +
            '</td>';

        html += '<td data-th="Título coluna 3">' +
            '<div class="br-input col-md-6">' +
            '<input id="valPrazoSus' + value + '" name="valPrazoSus[' + value + ']" type="text" disabled="disabled"/>' +
            '</div>' +
            '</td>';

        html += '<td data-th="Título coluna 4">' +
            '<div class="d-inline-block mr-5">' +
            '<div class="br-checkbox">' +
            '<input id="checkPrazoSus' + value + '" name="checkPrazoSus[' + value + ']" type="checkbox"/>' +
            '<label for="checkPrazoSus' + value + '"></label>' +
            '</div>' +
            '</div>' +
            '</td>';

        html += '<tr>';

        $('#tabela').append(html);
        $("#modal").hide();
    });
    $('#salvar').click(function () {
        var serializeDados = $('#formTeto').serialize();
        console.log(serializeDados);

        $.ajax({
            url: "teto/register",
            method: "POST",
            data: serializeDados,
            success: function (data) {
                if (data.success === true) {
                    alert('Operação realizada com sucesso');
                }
                if (data.error) {
                    alert(data.error);
                }
            }
        });

    });
});
