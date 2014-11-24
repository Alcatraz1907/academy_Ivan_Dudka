/**
 * Created by Іван on 31.10.14.
 */
function proverka(input) {
    var value = input.value;
    var reg = new RegExp("","");
    var rep = /[-\.;":'a-zA-Zа-яА-Я]/;
    if (rep.test(value)) {
        value = value.replace(rep, '');
        input.value = value;
    }
}