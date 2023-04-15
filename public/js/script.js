
// mask pagina cadastra

$(document).ready(function(){
    $('#nartigos').mask('00')
    $('#telefone').mask('(00) 00000-0000')
})

//visualizar senha

$(document).ready(function(){
    let oculta_senha = false
    $('.eye-senha').on('click', function(){
        oculta_senha = !oculta_senha

        if(oculta_senha){

            $('#password').attr('type', 'text')
            $('.eye-senha i').removeClass('fa-solid fa-eye').addClass('fa-solid fa-eye-slash')

        }else{
            $('#password').attr('type', 'password')
            $('.eye-senha i').removeClass('fa-solid fa-eye-slash').addClass('fa-solid fa-eye')
        }
    })
})

$(document).ready(function(){
    let oculta_password = false

    $('.eye-confirm').on('click', function(){

        oculta_password = !oculta_password

        if(oculta_password){

            $('#cad-confirmpassword, #edit-confirmpassword, #login #password').attr('type', 'text')
            $('.eye-confirm i').removeClass('fa-solid fa-eye').addClass('fa-solid fa-eye-slash')
        }else{
            $('#cad-confirmpassword, #edit-confirmpassword, #login #password').attr('type', 'password')
            $('.eye-confirm i').removeClass('fa-solid fa-eye-slash').addClass('fa-solid fa-eye')
        }
    })
})


$('#out-searchmenu').css('display', 'none');
$('#search').keypress(function(e){
    var search = $(this).val()

    $.post('/search', {psearch: search}, (result)=>{

        //$('#outsearch').html(result);
        $('#out-searchmenu').html(result)
        $('#out-searchmenu').css('display', 'block')

        $('body').click(function(){
            $('#out-searchmenu').css('display', 'none');
        })
    })
})
