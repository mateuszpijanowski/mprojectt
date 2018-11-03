// JS SCRIPT by MATEUSZ PIJANOWSKI

// AUTORUN
window.onload = variables;

// MAIN FUNCTION
function variables()
{
    let space = "<span style='margin-left: 450px;'</span>"
    let space2 = "<span style='margin-left: 379px;'</span>"
    let space3 = "<span style='margin-left: 425px;'</span>"
    let space4 = "<span style='margin-left: 446px;'</span>"
    let space5 = "<span style='margin-left: 374px;'</span>"
    let space6 = "<span style='margin-left: 465px;'</span>"
    let space7 = "<span style='margin-left: 392px;'</span>"
    let space8 = "<span style='margin-left: 455px;'</span>"
    let space9 = "<span style='margin-left: 383px;'</span>"
    let space10 = "<span style='margin-left: 420px;'</span>"
    let space11 = "<span style='margin-left: 348px;'</span>"
    let space12 = "<span style='margin-left: 455px;'</span>"
    let space13 = "<span style='margin-left: 440px;'</span>"
    let space14 = "<span style='margin-left: 394px;'</span>"

    let gen_variables = document.getElementById("variables");

    //GENERATOR
    gen_variables.innerHTML = "<br />bool"+space+"1B<br />char"+space+"1B<br />unsigned char"+space2+"1B<br />wchar_t"+space3+"4B<br />short"+space4+"2B<br />unsigned short"+space5+"2B<br />int"+space6+"4B<br />unsigned int"+space7+"4B<br />long"+space8+"8B<br />unsigned long"+space9+"8B<br />long long"+space10+"8B<br />unsigned long long"+space11+"8B<br />float"+space12+"4B<br />double"+space13+"8B<br />long double"+space14+"16B";
}
