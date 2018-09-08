$(document).ready(function() {

    $("#fiszker").css("transition", "none");
    $("#fiszker").css("width", "250px");
    setTimeout(function() {
        $("#fiszker").css("transition", "all 0.8s");
    }, 10);

    $("#fiszker").click(function() {
        location.href="../";
    });

    $('#ls_cate').click(function() {
        $('#selected').html($(this).text());
        location.href="?ls_cate";
    });

    $('#ls_card').click(function() {
        $('#selected').html($(this).text());
        $('form').html('<input type="hidden" name="type" value="ls_card" /><input type="text" placeholder="Nazwa kategorii" name="cate_name"/><br/><input type="submit" value="ZATWIERDŹ"/>');
    });

    $('#add_cate').click(function() {
        $('#selected').html($(this).text());
        $('form').html('<input type="hidden" name="type" value="add_cate" /><input type="text" placeholder="Nazwa nowej kateogrii" name="cate_new_name"/><br/><input type="submit" value="ZATWIERDŹ"/>');
    });

    $('#add_card').click(function() {
        $('#selected').html($(this).text());
        $('form').html('<input type="hidden" name="type" value="add_card" /><input type="text" placeholder="Nazwa kategorii" name="cate_name"/><br/><textarea name="page1" placeholder="Strona1"></textarea><br/><textarea name="page2" placeholder="Strona2"></textarea><br/><textarea name="descr" placeholder="Opis kategorii (Wypełnij jeżeli to pierwsza fiszka)"></textarea><br/><input type="submit" value="ZATWIERDŹ"/>');
    });

    $('#edit_card').click(function() {
        $('#selected').html($(this).text());
        $('form').html('<input type="hidden" name="type" value="edit_card" /><input type="text" placeholder="Nazwa kategorii" name="cate_name"/><br/><input type="text" placeholder="ID" name="id"/><br/><textarea name="page1" placeholder="Nowa strona1"></textarea><br/><textarea name="page2" placeholder="Nowa strona2"></textarea><br/><textarea name="descr" placeholder="Opis kategorii (Wypełnij jeżeli to pierwsza fiszka)"></textarea><br/><input type="submit" value="ZATWIERDŹ"/>');
    });

    $('#edit_cate').click(function() {
        $('#selected').html($(this).text());
        $('form').html('<input type="hidden" name="type" value="edit_cate" /><input type="text" placeholder="Nazwa kategorii" name="cate_name"/><br/><input type="text" placeholder="Nowa nazwa kategorii" name="cate_new_name"/><br/><textarea name="new_descr" placeholder="Nowy opis kategorii (zostaw pusty, jezeli ma zostac ten sam)"></textarea><br/><input type="submit" value="ZATWIERDŹ"/>');
    });

    $('#del_cate').click(function() {
        $('#selected').html($(this).text());
        $('form').html('<input type="hidden" name="type" value="del_cate" /><input type="text" placeholder="Nazwa kategorii" name="cate_name"/><br/><input type="submit" value="ZATWIERDŹ"/>');
    });

});
